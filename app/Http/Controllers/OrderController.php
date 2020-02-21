<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\Menu;
use App\Model\Plan;
use App\Mail\OrderStatus;
use Response;
use Excel;
use PDF;
use Mail;
class OrderController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Admin');
    }

      public function index()
    {
    	$orders = Order::GetAllOrder();
    	// dd($orders->toArray());
    	// $order_items = OrderItem::GetAllOrderItem();
        return view('admin.orders.index',compact('orders'));
    }
    public function edit(Request $request,$id)
    {
        $orders = Order::GetOrder($id);
        $order_items =OrderItem::GetOrderItem($id);
        // dd($order_items);
         return view('admin.orders.edit',compact('orders','order_items'));
    }
    public function ChangeOrderStatus(Request $request){
        if($request->ajax()){
         $order = OrderItem::where('item_id',$request->orderid)->first()->toArray();
         $order_email = Order::with(['user'])->where('order_id',$order['order_id'])->first();
          // dd($order_email);
         $update = OrderItem::where('item_id', $request->orderid)
               ->update([
                   'order_status' => $request->order_status
                ]);

            if($update){
                $orders = OrderItem::where('item_id',$request->orderid)->first()->toArray();
                
                $orders['email'] = $order_email['user']['email'] ?? '';
                // dd($orders);
                   // Mail::to('sdeve9@gmail.com')->send(new OrderStatus($order));
               $img = json_decode($orders['item_thumb'],true);
                if(!empty($orders)){
                     $mail_data  = array(
                    'order_id'=>$orders['order_id'],
                    'item_name'=>$orders['item_name'],
                    'image'=>$img[0],
                    'item_sort_desc'=>$orders['item_sort_desc'],
                    'delivery_date'=>$orders['delivery_date'],
                    'order_status'=>$orders['order_status'],
                    'user_name'=>$order_email['user']['name'],
                    'email'=>$order_email['user']['email']
              );
              Mail::send('emails.order_status', $mail_data, function ($message) use ($mail_data) {
                $message->from('info@cookforme.ch', 'cookforme');
                $message->to($mail_data['email']);
                $message->subject('Order Status Updated');
           });
            return Response::json(['success' => 'Order status changed'], 201);
            }else{
                response()->json(['error' => 'invalid', 401]);
            }
        }
        }
    }
    public function ChangePaymentStatus(Request $request){
        if($request->ajax()){
         $order = Order::where('order_id',$request->orderid)->get();
         $update = Order::where('order_id', $request->orderid)
               ->update([
                   'payment_status' => $request->payment_status
                ]);

            if($update){
                return Response::json([
                            'success' => 'Payment status changed'
                        ], 201);
            }else{
                response()->json(['error' => 'invalid', 401]);
            }
        }
    }

    public function GetOrderByDate(Request $request){
            $orders = Order::GetAllOrderByDate($request);
            return view('admin.orders.index',compact('orders'));
    }

    public function DownloadCsvData(Request $request){
         if($request->all()){
             $orders = Order::GetAllOrderData($request);
            if(!empty($orders)){
                header("Content-type: text/csv");
                header("Content-Disposition: attachment; filename=file.csv");
                header("Pragma: no-cache");
                header("Expires: 0");
                $columns = array('S No.', 'Order Id','Order Status','Order Date','Customer Name', 'Address','City','State', 'ZipCode', 'Mobile', 'Order Total');

                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $i= 1;
                foreach($orders as $key => $order) {
                    fputcsv($file, array($i,$order->order_id,$order->order_status,$order->order_date,$order->user->first_name .' '.$order->user->last_name,$order->user->address_line_1.' '.$order->user->address_line_2,$order->user->city,$order->user->state,$order->user->zip_code,$order->user->phone,$order->order_total));
                    $i++;
                }
                exit();
            }
        }
    }

    /*********** function download orders in pdf file */
    public function DownloadDataPdf(Request $request){
        if($request->all()){
             $orders = Order::GetAllOrderData($request);
            if(!empty($orders)){
                $pdf = PDF::loadView('admin.orders.order_pdf',compact('orders'));
                return $pdf->download('orders.pdf');
            }
        }
       
    }




}

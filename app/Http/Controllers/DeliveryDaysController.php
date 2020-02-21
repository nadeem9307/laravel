<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DeliveryDays;
use App\Http\Requests\DeliveryDayRequest;

class DeliveryDaysController extends Controller
{
   
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$deliverydays = DeliveryDays::paginate(12);
        return view('admin.deliverydays.index',compact('deliverydays'));
    }
     public function create()
    {
        return view('admin.deliverydays.create');
    }
    public function store(DeliveryDayRequest $request, DeliveryDays $deliverydays)
    {  

    	$deliverydays->order_day_check=$request->order_day_check ?? '';
        $deliverydays->order_before_time=$request->order_before_time ?? '';
        $deliverydays->delivery_day=$request->delivery_day ?? '';
    	
    	// $deliverydays->devliery_before_time=intval($request->devliery_before_time) < '12:00' ? $request->devliery_before_time.' AM' : $request->devliery_before_time.' PM' ?? '';
    	if($deliverydays->save()){
            return redirect()->route('deliverydays.index')->withStatus(__('Delivery Slot successfully created.'));
    	} 
    }
    public function edit(DeliveryDays $deliveryday)
    {
         return view('admin.deliverydays.edit',compact('deliveryday'));
    }

    public function update(DeliveryDayRequest $request, DeliveryDays $deliveryday){
        $deliveryday->update([
           'order_day_check' => $request->order_day_check ?? '',
           'order_before_time' =>$request->order_before_time ?? '',
           'delivery_day' =>$request->delivery_day ?? ''
        ]);
        return redirect()->route('deliverydays.index')->withStatus(__('Delivery Slot successfully updated.'));
    }
    public function destroy(deliverydays $deliveryday)
    {
        $deliveryday->delete();

        return redirect()->route('deliverydays.index')->withStatus(__('Delivery Slot successfully deleted.'));
    }
}

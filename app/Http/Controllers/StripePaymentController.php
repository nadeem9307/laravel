<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Front;
use App\Model\GiftCard;
use Illuminate\Support\Facades\Hash;
use Mail;
use Cart;
use Illuminate\Support\Facades\Auth;

class StripePaymentController extends Controller
{
    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe(Request $request)

    {

        $details = array(
            'f_name' => $request->f_name,
            'email'=>$request->email,
            'l_name'=>$request->l_name,
            'password'=>$request->password,
            'fullname'=>$request->fullname,
            'address1'=>$request->address1,
            'address2'=>$request->address2,
            'city'=>$request->city,
            'state'=>$request->state,
            'zip'=>$request->zip,
            'contact'=>$request->contact,
            'deliverydate'=>$request->deliverydate,
            'planid'=>$request->planid,
            'menus'=>$request->menus,
            'order_total'=>$request->order_total,
        );

        return view('front.stripe',compact('details'));
    }

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request){
        $secret_key = Front::getSecretKey();
        \Stripe\Stripe::setApiKey($secret_key[0]);

        try {
            \Stripe\Charge::create ([

                "amount" => $request->order_total * 100,

                "currency" => "CHF",

                "source" => $request->stripeToken,

                "description" => "Payment from cookforme." 

            ]);
            $success = 1;
            $paymentProcessor="Credit card (www.stripe.com)";
        } catch(Stripe_CardError $e) {
            $error1 = $e->getMessage();
        } catch (Stripe_InvalidRequestError $e) {
            // Invalid parameters were supplied to Stripe's API
         $error2 = $e->getMessage();
     } catch (Stripe_AuthenticationError $e) {
            // Authentication with Stripe's API failed
         $error3 = $e->getMessage();
     } catch (Stripe_ApiConnectionError $e) {
            // Network communication with Stripe failed
        $error4 = $e->getMessage();
    } catch (Stripe_Error $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
        $error5 = $e->getMessage();
    } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
        echo  $error6 = $e->getMessage();
    }
        //echo $success; die;
    if ($success!=1)
    {
        $_SESSION['error1'] = $error1;
        $_SESSION['error2'] = $error2;
        $_SESSION['error3'] = $error3;
        $_SESSION['error4'] = $error4;
        $_SESSION['error5'] = $error5;
        $_SESSION['error6'] = $error6;
        \Session::flash('success', $_SESSION);
        return back();
    }else{
        \Session::flash('success', 'Payment successful! wait...');
        $user_id = '';
        if(!Auth::user()){
            $user_data = array(
                'first_name' => $request->f_name,
                'email'=>$request->email,
                'last_name'=>$request->l_name,
                'password'=>Hash::make($request->password),
                'name'=>$request->fullname,
                'address_line_1'=>$request->address1,
                'address_line_2'=>$request->address2,
                'city'=>$request->city,
                'state'=>$request->state,
                'zip_code'=>$request->zip,
                'phone'=>$request->contact,
            );
            $emailexist = Front::validatEmailExist($request->email);
            if(!empty($emailexist) && ($emailexist !=null)){
                $user_id = $emailexist;
            }else{
                $user_id = Front::insertuserdetails($user_data);
                            // dd($user_id);
            }
        }else{
            $user_id = Auth::user()->id;
        }
        $order_data = array(
            'customer_id'=>$user_id,
            'order_status'=>'Pending',
            'order_date'=> date('Y-m-d'),
            'full_name'=>$request->fullname,
            'address_line_1'=>$request->address1,
            'address_line_2'=>$request->address2,
            'city'=>$request->city,
            'state'=>$request->state,
            'zip_code'=>$request->zip,
            'phone'=>$request->contact,
            'card_details' => $request->cardno,
            'order_total'=>$request->order_total,
            'payment_status'=>'Completed'
            
            // 'delivery_date'=>$request->deliverydate,
        );
        $orderid = Front::insertorderdetails($order_data);
        $order_item = Front::SaveOrderItem($orderid);    

        //Front::insertorderitemsdetails($order_items);
        /*email template*/
        if($order_item){
            $to = '';
            if(!Auth::user()){
                $to = $request->email;
            }else{
                $to = Auth::user()->email;
            }
            $mail_data  = array(

                'to' => $to,
                'from'=> 'info@cookforme.ch',
                'user_name' => $request->f_name.' '.$request->l_name,
                'fullname' => $request->fullname,
                'phone' => $request->comments,
                'orderid' => $orderid,
                'address_line_1'=>$request->address1,
                'address_line_2'=>$request->address2,
                'city'=>$request->city,
                'state'=>$request->state,
                'zip_code'=>$request->zip,
                'orders' => Cart::getContent()
            );
            Mail::send('front.emails.order_shiped', $mail_data, function ($message) use ($mail_data) {
                $message->from('info@cookforme.ch', 'cookforme');
                $message->to($mail_data['to']);
                $message->cc('info@cookforme.ch');
                $message->subject('Order Created');
            });
            Cart::clear();
            return view('front.thank-you');
        }

    }
    /*email template closed */
}
public function StripePostGift(Request $request)
{
   // dd($request->all());
    $giftcard = new GiftCard;
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    $stripe = \Stripe\Charge::create ([
        'source' => $request->get('tokenId'),
        'currency' => 'CHF',
        'amount' => $request->get('amount') * 100,
        'description' => "Payment from cookforme." 
    ]);
    $recipient_email = $request->rec_email;  
    if($stripe['status']=='succeeded'){
        $coupon_code = "CFM".$request->amount;
        $giftcard->recipient_email = $recipient_email ?? '';
        $giftcard->coupon_code = $coupon_code ?? '';
        $giftcard->coupon_amt = $request->amount ?? '';
        $giftcard->coupon_status = 'not redeem';    
        $giftcard->sender_email = $stripe['source']['name'] ?? ''; 
        if($giftcard->save()){
            $response = array(
                'status' => 'Success',
                'message' => 'Coupon Sent Successfully!'
            );
            $mail_data  = array(
                'coupon_code' => $coupon_code,
                'to' => $recipient_email
            );
            Mail::send('front.emails.coupon_layout', $mail_data, function ($message) use ($mail_data){
                $message->from('info@cookforme.ch', 'cookforme');
                $message->to($mail_data['to']);
                $message->cc('info@cookforme.ch');
                $message->subject('Cookforme Gift Coupon');
            });
            return response()->json($response);
        }   
    }else{
        $response = array(
            'status' => 'Failed',
            'message' => 'Trasaction Failed!'
        );
        return response()->json($response);
    }
}


}

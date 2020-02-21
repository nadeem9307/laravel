<!DOCTYPE html>
<html lang="en">


<head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,600,700,900&display=swap" rel="stylesheet">
</head>


<body style="font-family: 'Titillium Web', sans-serif;">

  <section style="max-width: 100%;margin: 0 auto;padding: 10px;background-color: #efefef52;border: 1px solid #e2e2e2;">

    <div style="text-align: right;">
     <h1 style="margin: 0;font-size: 20px;font-weight: 500;">Shipping Confirmation</h1>
     <p style="margin: 0; margin-top: 10px; color: #51bfd7;"><b style="margin-right: 4px; font-weight: 600; color: #000;">Order #</b>{{$orderid}}</p>
   </div>

   <div style="margin-top: 12px;">
    <h2 style="margin: 0;font-size: 18px;color: #61cde8;">Hello {{$user_name}}</h2>
    <p style="margin: 4px 0;">Thanks for choosing Cookforme!</p>  
  </div>

  <div style="background-color: #efefef;padding: 24px;border-top: 2px solid #d86a67;margin-top: 24px;">

    

    <div style="width: 50%; display: inline-block;">
     <p style="margin: 0;font-size: 15px;font-weight: 600;">Your food was sent to:</p>
     <p style="margin: 0;margin-top: 10px;">{{$fullname}}</p>
     <p style="margin: 0;margin-top: 6px;">
      {{$address_line_1}}
      <br>
      {{$address_line_2}}
      <br>
      {{$city}}{{$state}}{{$zip_code}}

    </p>
  </div>

</div>
<p></p>

<div>
  <h2 style="padding: 13px 0;border-bottom: 1px solid #cccaca;font-size: 17px;color: #d85730;">Shipment Details</h2>
  <table class="table" style="width: 100%;">
   <tbody>     
  @php
  $cart_items =  Cart::getContent();
  
  @endphp

  @if(isset($cart_items))
  @foreach($cart_items as $key => $item)
 
 @php
  $attributes = $item->attributes; 
  
  if($item->attributes->has('menu_thumb') ){
    $selected_img_array = json_decode($attributes->menu_thumb,true);
  }
    $sort_description = $attributes->sort_description;
    $delivery_date = $attributes->delivery_date;
  
  @endphp
      <tr>
       <th style="vertical-align: top; width: 7%; padding-top: 10px;">1</th>
       <td style="vertical-align: top;">
         <img style="width: 90px; vertical-align: top;" src="{{asset('public/uploads/menus')}}/{{$selected_img_array[0]}}" alt="image">
       </td>
       <td style="vertical-align: top; width: 70%; padding-bottom: 30px;">
        <p style="margin: 0;max-width: 90%;">{{$sort_description}}</p>   
        <p style="margin: 4px 0;color: #908c8c;font-weight: 500;">{{$item['name']}}</p>
      </td>
      <td style="vertical-align: top;"><b>CHF {{$item['price']}}</b></td>
      <td>
      <div style="width: 48%;float: left;">
      <h2 style="font-size: 14px; margin: 0;">Arriving</h2>
      @php
        $nameOfDay = date('D', strtotime($delivery_date));
      @endphp
      <h4 style="margin: 5px 0; color: #d8572a;">{{$nameOfDay}}, {{date('d-m-Y',strtotime($delivery_date))}}</h4>
    </div>
  </td>
    </tr>
   
    @endforeach
    @endif
    
</tbody>
</table>

</div>


</section>

</body>

</html>
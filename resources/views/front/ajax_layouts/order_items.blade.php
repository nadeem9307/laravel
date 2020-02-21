<div class="modal-dialog"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">  {{__('messages.My_Dishes')}} </h4>
    </div>
    <div class="modal-body">
      <div class="table-responsive">
        <table class="table">
          <tbody>
            <th>{{__('messages.image')}}</th>
            <th>{{__('messages.name')}}</th>
            <th>{{__('messages.meal_status')}}</th>
            <th>{{__('messages.Delivery_Date')}}</th>
            <th>{{__('messages.qty')}}</th>
            <th>{{__('messages.price')}}</th>
            @if(isset($items) && !empty($items))
            @foreach($items as $item)
            @php $str = json_decode($item->item_thumb,true); 
            @endphp
            <tr class="img_pro__cl_maj">
              <td class="img_wit__ss"><img class="img-responsive" src="{{asset('public/uploads/menus/')}}/{{$str[0]}}" alt="image">
              </td>
              <td>{{$item->item_name}}</td>
              <td>{{$item->order_status}}</td>
              <td>{{date("d-m-Y", strtotime($item->delivery_date))}}</td>
              <td>{{$item->item_quantity}}</td>
              <td>CHF {{$item->item_price}}</td>
            </tr>
            @endforeach
            @endif
            <tr class="deli_bver">
              <td colspan="1"></td>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
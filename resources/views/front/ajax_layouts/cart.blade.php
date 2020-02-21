          
  @php
  
  $cartCollection =  Cart::getContent();
   $cart_items = $cartCollection->sort();
   $delivery_date = App\Model\Front::getDeliveryDays();
 

  @endphp

  @if(isset($cart_items))
  @foreach($cart_items as $key => $item)
 
 @php
  $attributes = $item->attributes; 
  
  if($item->attributes->has('menu_thumb') ){
    $selected_img_array = json_decode($attributes->menu_thumb,true);
  }
    $sort_description = $attributes->sort_description;
    $selected_date = $attributes->delivery_date;
  
  @endphp
    <li class="here_list_added_product parent_image">
            <div class="review-meal-item-row" data-test="review-meal-item-row-697043">
                <div class="review-meal-controls">
                    <button type="button" class="btn btn-link btn-add add-to-order add_qty" title="Add" data-fe="add-button" menu-id="{{$item['id'] ?? ''}}" menu-thumb="{{$selected_img_array[0] ?? ''}}" menu-name="{{$item['name'] ?? ''}}" price="{{$item['price'] ?? ''}}"  menu-quantity="1" action='plus'>
                        <span class="fas fa-plus" aria-hidden="true" aria-label="Increase"></span>
                    </button>
                    <div class="txt-regular-m qnty-{{$item['quantity']}}" >{{$item['quantity']}}</div>

                    <button type="button" menu-id="{{$item['id']}}" class="btn btn-link btn-reduce" title="Reduce" data-fe="reduce-button" action='minus'>
                        <span class="fas fa-minus" aria-hidden="true" aria-label="Reduce" ></span>
                    </button>
                </div>
                <div class="review-meal-image">
                    <img data-resizable-image="true" src="{{ asset('public/uploads') }}/menus/{{$selected_img_array[0] ?? ''}}">
                </div>
                <div class="review-meal-description">
                    <div class="h5 review-meal-heading text-uppercase">
                       {{$item['name'] ?? ''}}
                    </div>
                    <div class="txt-side-dish-s">
                        {{substr($sort_description, 0, 30)}}
                    </div>
                </div>
                <div class="remove-all-btn-wrapper">
                    <div>
                        <button type="button" menu-id="{{$item['id']}}" menu-price="{{$item['price']}}" class="btn btn-link link-gray remove-meal" title="Remove" data-fe="remove-all-button">
                            <span class="fas fa-times" aria-hidden="true" aria-label="Remove All"></span>
                        </button>
                    </div>
                </div>

            </div>
        
        <div class="new_delivery_date_new_cl"> 
            <small><i class="far fa-calendar-alt"></i> {{__('messages.Choos_Del_Date')}}:</small>
            <select class="form-control delivery_day" name="delivery_day[]" menu-id="{{$item['id']}}" required="true">
              <option value="">Choose Delivery Date</option>
                @if(isset($delivery_date) && !empty($delivery_date))
                @php 
                $i=1;
                @endphp
                @foreach($delivery_date as $key=>$date)
                <option value="{{$date ?? ''}}" @if($selected_date==$date) selected="true" @endif>{{$date ?? ''}} , {{date('l', strtotime($date))}} </option>
               
                 @php 
                $i++;
                @endphp
                @endforeach

                @endif

            </select>
        </div>
        
        </li>
        @endforeach
        @endif
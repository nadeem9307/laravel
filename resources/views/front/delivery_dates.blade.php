
     @include('front/layout/header')

         <section class="delivery_datas_panel">
             <div class="container">
                 <div class="here_wed_crum_cl">
                    <ul class="list-inline"> 
                       <li><a href="#">Plan</a></li>
                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        <li class="active_cl">Day</li>
                         <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                         <li><span>Meals</span></li>
                         <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                         <li><span>Checkout</span></li>
                    </ul>
                 </div>
                 <form id="del_form" method="post" action="{{ route('choose-meal') }}" autocomplete="off">
                        @csrf
                 <input type="hidden" name="email" value={{$email}}>
                 <input type="hidden" name="zip" value={{$zip}}>
                 <input type="hidden" name="plan_id" value={{$plan_id}}>
                 <div class="list_dates_cl">
                     <h5></h5>
                     <div class="matcj_hieght_cl">
                   <ul class="list-unstyled here_um_smjd">
                   @foreach($delivery_dates as $dd)
                       <li class="datesdays" id="{{$dd->date}}" day="{{$dd->day}}">
                          <b>{{$dd->day}}</b>
                          <span>{{$dd->date}}</span>   
                          <!-- <small><i class="fa fa-fire" aria-hidden="true"></i></small>    -->
                       </li>
                    @endforeach
                   </ul>
                </div>         
                     <div class="scroll_for_more">
                       <p>Scroll for more delivery dates</p>
                        <h5><i class="fa fa-angle-down" aria-hidden="true"></i></h5> 
                     </div>
                     <div class="btn_dei_dat">
                        <a href="#" class="btn" id="sub_btn_next">Next</a>
                        <p id="firstdel"><b>First Delivery Date:</b> {{$delivery_dates{0}->day}} {{$delivery_dates{0}->date}} </p> 
                        <input type="hidden" id="del_date" name="del_date" value="{{$delivery_dates{0}->date}}">
                        <input type="hidden" id="del_day" name="del_day" value="{{$delivery_dates{0}->day}}">
                     </div>
</form>
                 </div>
                 
             </div>
         </section>
    <section class="partner_her_sldi">
        <div class="container">
            <ul class="partner_logo list-inline">
                 <li>
                 <a href="#">  <img src="{{ asset('public/front') }}/img/par_1.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                     <a href="#">   <img src="{{ asset('public/front') }}/img/par_2.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                      <a href="#"><img src="{{ asset('public/front') }}/img/par_3.png" class="img-responsive" alt="Image"></a> 
                 </li>
                 <li>
                      <a href="#"><img src="{{ asset('public/front') }}/img/par_4.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                      <a href="#"> <img src="{{ asset('public/front') }}/img/par_5.png" class="img-responsive" alt="Image"></a>
                 </li>
                 <li>
                      <a href="#"><img src="{{ asset('public/front') }}/img/par_3.png" class="img-responsive" alt="Image"></a>
                 </li>
            </ul>
        </div>
    </section>
    
    @include('front/layout/footer')
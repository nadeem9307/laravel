
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
        
            
             
            <div class="scroll_for_more">
              <p>Scroll for more delivery dates</p>
               <h5><i class="fa fa-angle-down" aria-hidden="true"></i></h5> 
            </div>
            <div class="btn_dei_dat">
               <a href="choose-meals.html" class="btn">Next</a>
               <p id="firstdel"><b>First Delivery Date:</b> {{$delivery_dates{0}->day}} {{$delivery_dates{0}->date}} </p> 

            </div>
        </div>
        
    </div>
</section>
<section class="partner_her_sldi">
<div class="container">
   <ul class="partner_logo list-inline">
        <li>
        <a href="#">  <img src="{{ asset('front') }}/img/par_1.png" class="img-responsive" alt="Image"></a>
        </li>
        <li>
            <a href="#">   <img src="{{ asset('front') }}/img/par_2.png" class="img-responsive" alt="Image"></a>
        </li>
        <li>
             <a href="#"><img src="{{ asset('front') }}/img/par_3.png" class="img-responsive" alt="Image"></a> 
        </li>
        <li>
             <a href="#"><img src="{{ asset('front') }}/img/par_4.png" class="img-responsive" alt="Image"></a>
        </li>
        <li>
             <a href="#"> <img src="{{ asset('front') }}/img/par_5.png" class="img-responsive" alt="Image"></a>
        </li>
        <li>
             <a href="#"><img src="{{ asset('front') }}/img/par_3.png" class="img-responsive" alt="Image"></a>
        </li>
   </ul>
</div>
</section>

@include('front/layout/footer')
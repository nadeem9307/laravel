@include('front/layout/header')

<section class="thank_you_panle">    
    
<div class="container">    
 <div class="site-header">
		<h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
     <p>Thanks for ordering your meals! Kindly login to view your order details.</p>
	</div>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
	
	</div>

     <div class="back_to_home">
       <a href="{{route('index')}}"><i class="fas fa-arrow-left"></i> Back to Home</a>
    </div>
  </div>  
  </section>  
    
    
  @include('front/layout/footer')
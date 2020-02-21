    @include('front/layout/header')    

    <div class="food-menu-area simple default-padding bg-gray">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="step1-div">
            <div class="gift_form_wrap_here">
              <div class="first_gift_wrap">

                <div class="head_gift_one">
                  <h1>
                    <i class="fa fa-gift" aria-hidden="true"></i>
                    <span>1</span> <a href="javascript:void(0)" id="edit-first-step">{{__('messages.edit')}}</a>
                  </h1>
                  <h3>{{__('messages.step1_title')}} </h3>    
                  <p>{{__('messages.step1_subtitle')}}</p>    
                </div>

                <form class="form_cl_make">
                 <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <div class="form-group">
                     <label for="email">{{__('messages.recp_email_add')}}</label>
                     <input type="email" class="form-control" id="email" required="">
                   </div>
                 </div>
                 <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                   <label for="amt">{{__('messages.amt')}}</label>
                   <input type="text" class="form-control" id="amt" required="">
                 </div>
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <button type="button" name="submit" id="first-step-submit">
                    {{__('messages.countinue')}}
                  </button>
                </div>
                <p class="by_clickning_cl">{{__('messages.step1footer')}}</p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hidden" id="step2-div">
      <div class="second_gift_wrpa">
       <div class="head_gift_one">
        <h1>
         <i class="fa fa-cart-plus" aria-hidden="true"></i>
         <span>2</span>
       </h1>
       <h3>{{__('messages.step2_title')}}</h3>    
       <div id="checkout-div">

       </div>
     </div>

     <div class="btn_frshly_cl">
       <div class="form-group">
         <button type="submit" name="submit" id="strip-btn" disabled="" onclick="pay()">
          {{__('messages.pay_with_cr_card')}}
         </button>
       </div>
     </div>
   </div>
 </div>
 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hidden" id="step3-div">
   <div class="third_gift_wrap">
     <div class="head_gift_one">
      <h1>
       <i class="fa fa-envelope" aria-hidden="true"></i>
       <span>3</span>
     </h1>
     <h3 id="step3-status"></h3>    
   </div>
 </div>
</div>
</div>
</div>
</div>
@include('front/layout/footer')
<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
  $("#first-step-submit").click(function(e) {
    var isValid = true;
    $("#step2-div").removeClass("hidden");
    $('#amt,#email').each(function () {
     if ($.trim($(this).val()) == '') {
      isValid = false;
      $(this).css({
        "border": "1px solid red",
        "background": "#FFCECE"
      });
    }
    else {
      $(this).css({
        "border": "",
        "background": ""
      });
      $("#strip-btn").prop("disabled",false);
      $("#step1-div :input").attr("disabled", true);
      $("#first-step-submit").prop("disabled",true);
      $("#checkout-div").html("<h4>"+$("#email").val()+"</h4><h5>CHF"+$("#amt").val()+"</h5>");
      $("#step2-div").removeClass("hidden");
    }
  });
    if (isValid == false)
      e.preventDefault();
  })
  $("#edit-first-step").click(function() {
    $("#step1-div :input").attr("disabled", false);
    $("#first-step-submit").prop("disabled",false);
    $("#step2-div").addClass("hidden");
    $("#step3-div").addClass("hidden");
  })
</script>
<script type="text/javascript">
  $(document).ready(function () {  
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  });

  function pay() {
    $("#strip-btn").prop("disabled",true);
    var amount = $("#amt").val();
    var recep_email = $("#email").val();
    var handler = StripeCheckout.configure({
      key: 'pk_test_CFWvGvAOi7IbuOhdE3QP8EPl',
      locale: 'auto',
      token: function (token) {
        // You can access the token ID with `token.id`.
        // Get the token ID to your server-side code for use.
        ///console.log('Token Created!!');
        //console.log(token)
        $('#token_response').html(JSON.stringify(token));
        $.ajax({
          url: '{{ url("stripe-gift") }}',
          method: 'post',
          data: { tokenId: token.id, amount: amount, rec_email:recep_email },
          success: (response) => {
            $("#step3-status").html(response.message);
            $("#step3-div").removeClass("hidden");
            $("#amt").val('');
            $("#email").val('');
            $("#step1-div :input").attr("disabled", false);
            $("#first-step-submit").prop("disabled",false);
              $("#step3-div").removeClass("hidden");
          },
          error: (error) => {
            console.log(error);
            alert('Oops! Something went wrong')
          }
        })
      }
    });

    handler.open({
      name: 'STRIPE PAYMENT',
      description: 'Cookforme Gift',
      amount: amount * 100
    });
  }
</script>
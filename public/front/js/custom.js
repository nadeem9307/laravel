$( document ).ready(function() {
    $('.list-unstyled').on('click', 'li', function() {
        $("#firstdel").html("<b>First Delivery Date:</b> "+$(this).text());
        $('.list-unstyled li.actives_datas').removeClass('actives_datas');
        $(this).addClass('actives_datas');
        $('#del_date').val($(this).attr('id'));
        $('#del_day').val($(this).attr('day'));
    });
    $("#sub_btn_next").click(function(){
        $("#del_form").submit();
    });
    $(".weekly_menu_sections_id").click(function() {
        var id =  $(this).attr('menuid');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            /* the route pointing to the post function */
            url: APP_URL + "/postajaxcategory",
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: { _token: CSRF_TOKEN, message: $(this).attr('menuid') },
            dataType: 'JSON',
            /* remind that 'data' is the response of the FrontController */
            success: function(data) {
                $(".tab-pane").removeClass("in active");
                if (data.subject.length === 0) {
                    console.log("out")
                    $("#cat_"+id).addClass("in active");
                    $("#cat_"+id).html("<p>Menu not availale!")
                }else{

                    $("#cat_"+id).addClass("in active");
                    $("#cat_"+id).html(data.subject);
                }
            }
        });
    });
    
    $(document).on( "click", ".view-modal-plans", function(e) {
        var me = $(this);
        var mealid = me.attr('mealid');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: APP_URL +"/postajaxmenumodal",
            type: 'POST',
            data: { _token: CSRF_TOKEN, message: mealid },
            dataType: 'JSON',
            success: function(data) {
                console.log(data);
                $(".model_section_content_wrpa").html(data.subject);
                $('.bs-example-modal-lg').modal('show');
            }
            
        });
    });
    $(document).on( "click", ".order_modal", function(e) {
        var me = $(this);
        var itemid = me.attr('itemid');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: APP_URL +"/ordermodalprofile",
            type: 'POST',
            data: { _token: CSRF_TOKEN, message: itemid },
            dataType: 'JSON',
            success: function(data) {
               $("#myModal_order").html(data.subject);
                $('#myModal_order').modal('show');
            }
            
        });
    });
    $(".review_click").click(function(){
        $(".modal-title").html("Rete your order here for ORDER ID# "+$(this).attr('orderid'));
        //data-toggle="modal"data-target="#myModal_review"
        $('#myModal_review').modal('show');
        $('input[name="orderid"]').val($(this).attr('orderid'));
    });
    $( "#rate-submit" ).click(function( event ) {
      if ($('input[name="rating"]:checked').length == 0) {
        $( "#rate-required" ).text( "Please Rate!" ).show().fadeOut( 1500 );
        event.preventDefault();
      }else{
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: APP_URL +"/rate-order",
            type: 'POST',
            data: { _token: CSRF_TOKEN, rate_star: $('input[name="rating"]:checked').val(), description:$('textarea[name="desc"]').val(), orderid:$('input[name="orderid"]').val() },
            dataType: 'JSON',
            success: function(data) {
               $('#myModal_review').modal('toggle');
               location.reload();
            }
        });
      }
    });



    
});
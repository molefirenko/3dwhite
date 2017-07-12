jQuery(document).ready(function ($) {
	$(".tbl").click(function() {
		$(".tbl").addClass("active");
		$(".tbl-block").addClass("show");
		$(".line-block").removeClass("show");
		$(".tbl-block").removeClass("hidden");
		$(".line-block").addClass("hidden");
		$(".line").removeClass("active");
	});
	$(".line").click(function() {
		$(".line").addClass("active");
		$(".line-block").addClass("show");
		$(".tbl-block").removeClass("show");
		$(".line-block").removeClass("hidden");
		$(".tbl-block").addClass("hidden");
		$(".tbl").removeClass("active");
	});

	 $('#owl-carusel').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1.5
                }
            }
        });

      $('#owl-main').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            responsive:{
                0:{
                    items:1,
                    margin:5
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });

        close = 1

        $(".marg-a .close").click(function() {
            if (close) {
                $(".marg-a").fadeOut(0);
                $("#map").css({"position":"relative"})
                close = 0
            } else {
                $("#map").css({"position":"absolute"})
                close = 1
            }

        });

        $("label").click(function () {
            $(this).addClass("a-label");
            $(this).next("textarea.form-control").css({"height":"150px"})
        });



        $("input[type='tel'], #tel").mask("+7(999) 999-9999");

        $("input[type='tel'], #tel").on('keydown',function(e){
          if ( $(this).val() == '+7(___) ___-____' && e.key=='8' ) {
            return false;
          }
        });


        $(".owl-item a").click(function() {
            $(".owl-item a").removeClass("active");
            $(this).addClass("active");
        });

        $(".act").click(function() {
            if ($("#optionsRadios1").prop("checked")) {
                $(".vis").removeClass("hidden");
                $(".dil").addClass("hidden");
                $(".dil").removeClass("open");
								$("#options").prop("checked",true);
            } else {
                $(".dil").removeClass("hidden");
                $(".vis").addClass("hidden");
                $(".dil").addClass("open");
								$("#options").prop("checked",false);
            }
        });

        $('#feedback_form').submit(function(e){
          e.preventDefault();
            var data = {
              action: 'sendFeedback',
              nonce: myajax.nonce,
              form: $(this).serialize()
            };
          $.post(
            myajax.url,
            data,
            function (response) {
              if (response == 'Ok') {
                $('#modal-one').find('.block-form').addClass('hidden');
                $('#modal-one').find('.block-thx').removeClass('hidden');
              } else {
                if (response == 'No captcha' || response == 'Wrong captcha') {
                  $('#captcha4').addClass('red');
                }
              }
            }
          );
        });

        $('#callback_form').submit(function(e){
          e.preventDefault();
            var data = {
              action: 'sendCallBack',
              nonce: myajax.nonce,
              form: $(this).serialize()
            };
          $.post(
            myajax.url,
            data,
            function (response) {
              if (response == 'Ok') {
                $('#modal-three').find('.block-form').addClass('hidden');
                $('#modal-three').find('.block-thx').removeClass('hidden');
              } else {
                if (response == 'No captcha' || response == 'Wrong captcha') {
                  $('#captcha3').addClass('red');
                }
              }
            }
          );
        });

        $('.btn-buy').click(function(){
          var id = $(this).attr('data-id');
          cartadd(id);
        });

        $('#order-form').submit(function(e){
          e.preventDefault();
          var data = {
            action: 'orderSubmit',
            nonce: myajax.nonce,
            form: $(this).serialize()
          };
          $.post(
            myajax.url,
            data,
            function (response) {
              $('#modal-two').html(response);
              $('#modal-two').modal('show');
            }
          );
        });

        $('.form.callback').submit(function(e){
          e.preventDefault();
          var data = {
            action: 'sendCallForm',
            nonce: myajax.nonce,
            form: $(this).serialize()
          };
          $.post(
            myajax.url,
            data,
            function (response) {
              if (response == 'Ok') {
                $('.form.callback').addClass('hidden');
                $('.form.callback').siblings('.block-thx').removeClass('hidden');
              } else {
                if (response == 'No captcha' || response == 'Wrong captcha') {
                  $('#captcha1').addClass('red');
                }
              }
            }
          );
        });

        $('.form.callquestion').submit(function(e){
          e.preventDefault();
          var data = {
            action: 'sendCallForm',
            nonce: myajax.nonce,
            form: $(this).serialize()
          };
          $.post(
            myajax.url,
            data,
            function (response) {
              if (response == 'Ok') {
                $('.form.callquestion').addClass('hidden');
                $('.form.callquestion').siblings('.block-thx').removeClass('hidden');
              } else {
                if (response == 'No captcha' || response == 'Wrong captcha') {
                  $('#captcha2').addClass('red');
                }
              }
            }
          );
        });
})

function cartadd(id) {
  var data = {
    action: 'addCart',
    nonce: myajax.nonce,
    id: id
  };
  jQuery.post(
    myajax.url,
    data,
    function (response) {
      window.location.href=myajax.carturl;
    }
  );
}

function cartsub(id) {
  var data = {
    action: 'subCart',
    nonce: myajax.nonce,
    id: id
  };
  jQuery.post(
    myajax.url,
    data,
    function (response) {
      window.location.href=myajax.carturl;
    }
  );
}

function cartrem(id) {
  var data = {
    action: 'remCart',
    nonce: myajax.nonce,
    id: id
  };
  jQuery.post(
    myajax.url,
    data,
    function (response) {
      window.location.href=myajax.carturl;
    }
  );
}

function buy(cart) {
  var data = {
    action: 'Buy',
    nonce: myajax.nonce,
    data: cart
  };
  jQuery.post(
    myajax.url,
    data,
    function (response) {
      $('#modal-two').modal('show');
    }
  );
}

function change_city(id) {
  var data = {
    action: 'ChangeCity',
    nonce: myajax.nonce,
    data: id
  };
  jQuery.post(
    myajax.url,
    data,
    function (response) {
      location.reload();
    }
  );
}

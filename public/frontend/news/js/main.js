
/*full carousel slider*/
$(document).ready(function() {
    $('#adaptive').lightSlider({
        adaptiveHeight:true,
        auto:true,
        item:1,
        slideMargin:0,
        loop:true
    });
});
 
 /*features slider*/
   $(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
  });

/*****slider2 */
 $(document).ready(function() {
    $('#autoWidth1').lightSlider({
        autoWidth1:true,
        auto: true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth1').removeClass('cS-hidden');
        } 
    });  
  });

$("li").click(function(){
    $("li").css("background-color","");
    $("this").css("background-color","black");
})

/*login and sign - up form*/
$('.my-account, .already-account').on( "click", function () {
    $('.form').addClass('login-active').removeClass('sign-up-active')
});

$('.show-account-cancel').on( "click", function () {
    $('.form').removeClass('login-active')
});


/*sign up*/

$('.sign-up-btn').on( "click", function () {
    $('.form').addClass('sign-up-active').removeClass('login-active')
});

$('.show-account-cancel').on( "click", function () {
    $('.form').removeClass('login-active').removeClass('sign-up-active')
});




  /* for fix menu when scroll*/

  $(window).scroll(function(){
    if($(document).scrollTop() > 50){
        $('.navigation').addClass('fix-nav');
    }
    else{
        $('.navigation').removeClass('fix-nav');
    }
});

/*showbar*/
$('.categories-bars').on( "click", function () {
    $('.showbars').addClass('showbaractive')
});
$('.show-side-bar-cancel').on( "click", function () {
    $('.showbars').removeClass('showbaractive')
});


/*show-cart*/
$('.buy-now').on( "click", function () {
    $('.showcart').addClass('showcartactive')
});
$('.show-cardbody-cancel').on( "click", function () {
    $('.showcart').removeClass('showcartactive')
});


  /* for fix menu when scroll*/

  $(window).scroll(function(){
      if($(document).scrollTop() > 50){
          $('.navigation').addClass('fix-nav');
      }
      else{
          $('.navigation').removeClass('fix-nav');
      }
      // click to scroll top
    $('.move-up span').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    })

    // AOS Instance
    AOS.init();
  });


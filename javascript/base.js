$(window).scroll(function () {
  if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
    $('#return-to-top').fadeIn(200);
    $('#return-to-top').css("display", "flex");  // Fade in the arrow
  } else {
    $('#return-to-top').fadeOut(200);   // Else fade out the arrow
  }
});

$("#return-to-top").click(function () {
  $('html, body').animate({ scrollTop: 0 }, '300');
  document.documentElement.scrollTop = 0;
});





$(".sidebar-mobile li").click(function () {
  $(".sidebar-mobile").animate({ right: '-288px' });
  $(".slide-black").hide();
});



$(".table-price .card").click(function () {
  $(".table-price .card").removeClass("active");
  $(this).addClass("active");
});

$(".slide-black").click(function () {
  $(".sidebar-mobile").animate({ right: '-288px' });
  $(".slide-black").hide();
  // $("#hinhAnhdialog").hide();
});

$("#buttom-slide").click(function () {
  $(".sidebar-mobile").animate({ right: '0px' });
  $(".slide-black").show();
  // $("#hinhAnhdialog").hide();
});







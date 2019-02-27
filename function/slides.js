$(function() {
   $(window).scroll(function () {
      if ($(this).scrollTop() > 400) {
         $('.about').addClass('animated fadeInDown slow')
      }
      if ($(this).scrollTop() < 400) {
         $('.about').removeClass('animated fadeInDown slow')
      }

      if ($(this).scrollTop() > 1800) {
         $('.meetic').addClass('animated fadeInDown slow')
      }
      if ($(this).scrollTop() < 1800) {
         $('.meetic').removeClass('animated fadeInDown slow')
      }

      if ($(this).scrollTop() > 3000) {
         $('.twitter').addClass('animated fadeInDown slow')
      }
      if ($(this).scrollTop() < 3000) {
         $('.twitter').removeClass('animated fadeInDown slow')
      }

      if ($(this).scrollTop() > 4500) {
         $('.spotify').addClass('animated fadeInDown slow')
      }
      if ($(this).scrollTop() < 4500) {
         $('.spotify').removeClass('animated fadeInDown slow')
      }

      if ($(this).scrollTop() > 5500) {
         $('.connect').addClass('animated fadeInDown slow')
      }
      if ($(this).scrollTop() < 5500) {
         $('.connect').removeClass('animated fadeInDown slow')
      }

   });
});
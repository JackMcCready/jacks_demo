$(document).ready(function() {
  $( ".menu-items h2" ).click(function() {  
    var findAttr= $(this).attr('gallery');  
    $('.gallery-images .gallery-show:visible').hide(800);
    $('.gallery-images .gallery-show[gallery='+findAttr+ ']').show(1000);
  });
  $('.mobile-nav').click(function(){
    $('#navigation').toggleClass('active');
  });

  if ( $(window).width() < 1024) {
   $('.navbar').removeClass('col-md-10');
 }

 $('.inFlex img').on('click',function(link){
  link.preventDefault();
  $('.lightbox-show').toggleClass('hidden');
  var image = $(this).attr('src');
  $('.lightbox-show img').attr('src', image);
  $('.lightbox-show img').attr('src', image.replace('-150x150', ''));
});

 $('.close-text').on('click', function() {
  $('.lightbox-show').toggleClass('hidden');
  $('.lightbox-show img').attr('src', '#');
});

 $('.inFlex img').click(function(e) {
  $('body,html').toggleClass('overflow');
});

 $('.close-text').click(function(e) {
  $('body,html').toggleClass('overflow');
});

 if ($('body').hasClass('Gallery-Page')) {
  $('.footer-section-1').removeClass('col-md-offset-1 col-md-5');
  $('.footer-section-2,.footer-section-3').removeClass('col-md-3');
  $('.footer-section-1,.footer-section-2,.footer-section-3').addClass('col-md-4');
}

if ($('body').hasClass('About-Page')) {
  $('.footer-section-1').removeClass('col-md-offset-1 col-md-5');
  $('.footer-section-2,.footer-section-3').removeClass('col-md-3');
  $('.footer-section-1,.footer-section-2,.footer-section-3').addClass('col-md-4');
}

if ($('body').hasClass('Contact')) {
  $('.banner-subtext').css('display', 'none');
  $('.contact-usshow').css('display', 'block');
  $('.estimate-link').css('display', 'none');
}

if ($('body').hasClass('Testimonials-Page')) {
  $('.banner-subtext').css('display', 'none');
  $('.testimonialsshow').css('display', 'block');
  $('.estimate-link').css('display', 'none');
}

if ($('body').hasClass('News-Page')) {
  $('.banner-subtext').css('display', 'none');
}

$(function() {
  $(".about-grid-1").mouseenter(function(){
    $('.one').css('width', '70%');
  });
  $(".about-grid-2").mouseenter(function(){
    $('.two').css('width', '70%');
  });
  $(".about-grid-3").mouseenter(function(){
    $('.three').css('width', '70%');
  });
  $(".about-grid-4").mouseenter(function(){
    $('.four').css('width', '70%');
  });
  $(".about-grid-1").mouseleave(function(){
    $('.one').css('width', '55%');
  });
  $(".about-grid-2").mouseleave(function(){
    $('.two').css('width', '55%');
  });
  $(".about-grid-3").mouseleave(function(){
    $('.three').css('width', '55%');
  });
  $(".about-grid-4").mouseleave(function(){
    $('.four').css('width', '55%');
  });
});

$(window).resize(function() {
  if ($(window).width() < 1024) {
   $('.navbar').removeClass('col-md-10');
 }
 else {$('.navbar').addClass('col-md-10');}
});
console.log('jQuery Working');
});
(jQuery);
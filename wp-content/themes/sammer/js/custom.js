// JavaScript Document

function preloader() {
	try {
		document.body.onload = function () {
			setTimeout(() => {
				AOS.init();
			}, 500);
		};
	} catch {
		console.error();
	}
}
preloader();


let burger_btn = document.querySelector(".header__burger-btn");
let burger_btn_close = document.querySelector(".header__burger-btn_close");
let mobileMenu = document.querySelector(".mobile-menu");
let burger_menu = document.querySelector(".header__modal");
let menuBody = document.querySelector("body");

burger_btn.addEventListener("click", toggleMenu);
burger_btn_close.addEventListener("click", toggleMenu);

function toggleMenu() {
  burger_menu.classList.toggle("active");
  burger_btn.classList.toggle("active");
  mobileMenu.classList.toggle("active");
  menuBody.classList.toggle("_active1");
}

var $item = $('.footer_menu_mob_wrap .menu-item-has-children a');
$item.first().on("click", function (e) {
  e.preventDefault();
  var $this = $(this);
  $(".sub-menu").toggleClass("sub-menu_active");
  $(".menu-item-has-children a").toggleClass("menu-item-has-children_active");
});


$(".postItem-cpt_wrap .btn_circle, .postItem-cpt_wrap .item-name, .postItem-cpt_wrap .leistungen-img").on("click", function (e) {
  e.preventDefault();
  var $this = $(this);
  var i = 0;
  if ($this.parents(".postItem-cpt").hasClass("post_active")) {
    i = 1;
  }
  $(".postItem-cpt").removeClass("post_active");
  $(".postItem-cpt_wrap .btn_circle").removeClass("btn_circle_active");
  if (i == 1) {
    $this.parents(".postItem-cpt").addClass("post_active");
    $(".post_active .btn_circle").addClass("btn_circle_active");
  }
  if ($this.parents(".postItem-cpt").hasClass("post_active")) {
    $(".post_active .btn_circle").removeClass("btn_circle_active");
    $this.parents(".postItem-cpt").removeClass("post_active");
  } else {
    $this.parents(".postItem-cpt").addClass("post_active");
    $(".post_active .btn_circle").addClass("btn_circle_active");
  }
  $(".wrapper-show").removeClass("wrapper-show_active");
  $(".post_active .wrapper-show").toggleClass("wrapper-show_active");
});


$(".postItem-references_wrap .btn_circle, .postItem-references_wrap .item-name, .postItem-references_wrap .leistungen-img").on("click", function (e) {
  e.preventDefault();
  var $this = $(this);

  /*nice =   $(".wrapper-show_active .wrapper-show-content").niceScroll({
    cursorcolor:"#6dc0c8", 
    background:"#ecedee", 
    autohidemode:"false", 
    cursorborder:"none", 
    cursorwidth: "5px",
    cursorborderradius:"none"
  });*/

 // $("#ascrail2000").addClass('scroll scroll-372');
 // console.log('aaa');
  var i = 0;
  if ($this.parents(".postItem-references").hasClass("post_active")) {
    i = 1;
  }
  $(".postItem-references").removeClass("post_active");
  $(".postItem-references_wrap .btn_circle").removeClass("btn_circle_active");
 // $("#ascrail2000").removeClass("scroll_active");
  //nice.hide();
  if (i == 1) {
    $this.parents(".postItem-references").addClass("post_active");
    $(".post_active .btn_circle").addClass("btn_circle_active");
   // $("#ascrail2000").addClass("scroll_active");
  }
  if ($this.parents(".postItem-references").hasClass("post_active")) {
    $(".post_active .btn_circle").removeClass("btn_circle_active");
   // $("#ascrail2000").removeClass("scroll_active");
    $this.parents(".postItem-references").removeClass("post_active");
  } else {
    $this.parents(".postItem-references").addClass("post_active");
    $(".post_active .btn_circle").addClass("btn_circle_active");
  //  $("#ascrail2000").addClass("scroll_active");
  }
  $(".wrapper-show").removeClass("wrapper-show_active");
  $(".post_active .wrapper-show").toggleClass("wrapper-show_active");
});
  

$(document).ready(function() {
  $('.slider-numbers .slides-wrap').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      arrows: true,
      prevArrow: $('.btn__swiper-prev-1'),
      nextArrow: $('.btn__swiper-next-1'),
      draggable: true,
      asNavFor: '.list-title'
  });

  $('.list-title').slick({
      slidesToShow: 4,
      asNavFor: '.slider-numbers .slides-wrap',
      dots: false,
      arrows: false,  
      infinite: false,
      focusOnSelect: true,
  });

  $('.slider-image-text .slides-wrap').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    arrows: true,
    prevArrow: $('.btn__swiper-prev-1'),
    nextArrow: $('.btn__swiper-next-1'),
    dots: false,
    draggable: true,
});

$('.top-page-banner .slides-wrap').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: true,
  autoplay:true,
  arrows: true,
  prevArrow: $('.btn__swiper-prev'),
  nextArrow: $('.btn__swiper-next'),
  dots: false,
  draggable: true,
});



});

var btn = document.querySelector(".img-play");
var video = document.getElementById("myVideo");
if (btn) {
    btn.style.visibility = 'hidden';
}
  
function myFunction() {
    if (video.paused) {  
        video.play();
        btn.style.visibility = 'hidden';
    } else {
        video.pause();
        btn.style.visibility = 'visible';
    }
}

var subtitle = document.querySelector(".subtitle");
var title = document.querySelector(".title");
if (!subtitle) {
    title.classList.add("small-title");
}

//header
var header = $('.site-header');
var scrollPrev = 0;
$(window).scroll(function() {
    var scrolled = $(window).scrollTop();

    if ( scrolled > $(window).height()-120) {
        header.addClass('site-header_bg');
    } else {
        header.removeClass('site-header_bg');
    }
    scrollPrev = scrolled;
});

$(window).on('load', function(){
    var scrolled = $(window).scrollTop();

    if ( scrolled > $(window).height()-120) {
        header.addClass('site-header_bg');
    } else {
        header.removeClass('site-header_bg');
    }
    scrollPrev = scrolled;
});

$(document).ready(function(){
  $('.btn_circle').each(function(){
    var $btn = $(this);
    var btnText = $btn.contents().first().text(); 
    $btn.wrapInner('<span></span>'); 
    $btn.find('svg').insertAfter($btn.children('span'));
  });

  $('.sub-menu a').each(function(){
    var $btn = $(this);
    var btnText = $btn.contents().first().text(); 
    $btn.wrapInner('<span></span>'); 
    $btn.find('svg').insertAfter($btn.children('span'));
  });
  
  
  $('.top-menu a').each(function(){
    var text = $(this).text().replace(/\s{2,}/g, ' ').trim();
    $(this).attr('title', text);
  })
  $('.btn_circle span').each(function(){
    var text = $(this).text().replace(/\s{2,}/g, ' ').trim();
    $(this).attr('title', text);
  });


  // Replace position fixed background on safari


  // var isSafari = window.safari !== undefined;

  // if(isSafari) {
  //   $('.wrap-left-image-parallax.wrap-left-mob').css('background-attachment', 'scroll');
  // }

/*var ua = navigator.userAgent.toLowerCase(); 
if (ua.indexOf('safari') != -1) { 
  if (ua.indexOf('chrome') > -1) {
    $('.wrap-left-image-parallax.wrap-left-mob').css('background-attachment', 'fixed');
  } else {
    $('.wrap-left-image-parallax.wrap-left-mob').css('background-attachment', 'scroll');
  }
}*/

if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) 
{
  if ($(window).width() <= 1024) {
  $('.wrap-left-image-parallax').css('background-attachment', 'scroll');   
  }
}

});


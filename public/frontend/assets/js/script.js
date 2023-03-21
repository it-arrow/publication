(function ($) {

	"use strict";

	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if ($('.preloader').length) {
			$('.preloader').delay(200).fadeOut(500);
		}
	}


	//Update Header Style and Scroll to Top
	function headerStyle() {
		if ($('.main-header').length) {
			var windowpos = $(window).scrollTop();
			var siteHeader = $('.main-header');
			var scrollLink = $('.scroll-to-top');
			if (windowpos >= 250) {
				siteHeader.addClass('fixed-header');
				scrollLink.fadeIn(300);
			} else {
				siteHeader.removeClass('fixed-header');
				scrollLink.fadeOut(300);
			}
		}
	}

	headerStyle();


	//Submenu Dropdown Toggle
	if ($('.main-header .navigation li.dropdown ul').length) {
		$('.main-header .navigation li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');

		//Dropdown Button
		$('.main-header .navigation li.dropdown .dropdown-btn').on('click', function () {
			$(this).prev('ul').slideToggle(500);
		});

		//Disable dropdown parent link
		$('.navigation li.dropdown > a').on('click', function (e) {
			e.preventDefault();
		});
	}


	//Fact Counter + Text Count
	if ($('.count-box').length) {
		$('.count-box').appear(function () {

			var $t = $(this),
				n = $t.find(".count-text").attr("data-stop"),
				r = parseInt($t.find(".count-text").attr("data-speed"), 10);

			if (!$t.hasClass("counted")) {
				$t.addClass("counted");
				$({
					countNum: $t.find(".count-text").text()
				}).animate({
					countNum: n
				}, {
					duration: r,
					easing: "linear",
					step: function () {
						$t.find(".count-text").text(Math.floor(this.countNum));
					},
					complete: function () {
						$t.find(".count-text").text(this.countNum);
					}
				});
			}

		}, {
			accY: 0
		});
	}


	//Custom Seclect Box
	if ($('.custom-select-box').length) {
		$('.custom-select-box').selectmenu().selectmenu('menuWidget').addClass('overflow');
	}


	//Tabs Box
	if ($('.tabs-box').length) {
		$('.tabs-box .tab-buttons .tab-btn').on('click', function (e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));

			if ($(target).is(':visible')) {
				return false;
			} else {
				target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
				target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
				$(target).fadeIn(300);
				$(target).addClass('active-tab');
			}
		});
	}


	//Single Item Carousel
	if ($('.single-item-carousel').length) {
		$('.single-item-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: true,
			smartSpeed: 700,
			autoplay: 5000,
			navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 1
				},

				768: {
					items: 1
				},

				800: {
					items: 1
				},
				960: {
					items: 1
				},
				1024: {
					items: 1
				}
			}
		});
	}


	//Four Item Carousel
	if ($('.four-item-carousel').length) {
		$('.four-item-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: true,
			smartSpeed: 700,
			autoplay: 5000,
			navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 1
				},

				768: {
					items: 2
				},

				800: {
					items: 3
				},
				960: {
					items: 3
				},
				1024: {
					items: 3
				},
				1100: {
					items: 4
				}
			}
		});
	}


	// our Carousel
	if ($('.our-carousel').length) {
		$('.our-carousel').owlCarousel({
			loop: true,
			margin: 10,
			nav: true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 2
				},
				600: {
					items: 4
				},
				800: {
					items: 5
				},
				1024: {
					items: 6
				}
			}
		});
	}


	//Single Image Vertical Carousel
	if ($('.single-verticle-carousel').length) {
		$('.single-verticle-carousel').slick({
			dots: false,
			autoplay: true,
			loop: true,
			autoplaySpeed: 5000,
			infinite: true,
			responsive: true,
			slidesToShow: 1,
			margin: 10,
			vertical: true,
			slidesToScroll: 1
		});
	}


	//Product Tabs
	if ($('.project-tab').length) {
		$('.project-tab .product-tab-btns .p-tab-btn').on('click', function (e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));

			if ($(target).hasClass('actve-tab')) {
				return false;
			} else {
				$('.project-tab .product-tab-btns .p-tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				$('.project-tab .p-tabs-content .p-tab').removeClass('active-tab');
				$(target).addClass('active-tab');
			}
		});
	}


	//Services Carousel
	if ($('.services-carousel').length) {
		$('.services-carousel').owlCarousel({
			loop: true,
			margin: 10,
			nav: true,
			smartSpeed: 700,
			autoplay: 5000,
			navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				800: {
					items: 1
				},
				1024: {
					items: 1
				},
				1200: {
					items: 1
				},
				1400: {
					items: 1
				}
			}
		});
	}


	//Product Carousel
	if ($('.project-carousel').length) {
		$('.project-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: true,
			smartSpeed: 700,
			autoplay: 5000,
			navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				800: {
					items: 3
				},
				1024: {
					items: 3
				},
				1200: {
					items: 4
				},
				1400: {
					items: 5
				}
			}
		});
	}

	//Two Item Carousel
	if ($('.two-item-carousel').length) {
		$('.two-item-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: true,
			smartSpeed: 700,
			autoplay: 5000,
			navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 1
				},
				600: {
					items: 1
				},
				800: {
					items: 2
				},
				1024: {
					items: 2
				},
				1100: {
					items: 2
				}
			}
		});
	}


	//Accordion Box
	if ($('.accordion-box').length) {
		$(".accordion-box").on('click', '.acc-btn', function () {

			var outerBox = $(this).parents('.accordion-box');
			var target = $(this).parents('.accordion');

			if ($(this).hasClass('active') !== true) {
				$(outerBox).find('.accordion .acc-btn').removeClass('active');
			}

			if ($(this).next('.acc-content').is(':visible')) {
				return false;
			} else {
				$(this).addClass('active');
				$(outerBox).children('.accordion').removeClass('active-block');
				$(outerBox).find('.accordion').children('.acc-content').slideUp(300);
				target.addClass('active-block');
				$(this).next('.acc-content').slideDown(300);
			}
		});
	}


	//Jquery Spinner / Quantity Spinner
	if ($('.quantity-spinner').length) {
		$("input.quantity-spinner").TouchSpin({
			verticalbuttons: true
		});
	}



	//Price Range Slider
	if ($('.price-range-slider').length) {
		$(".price-range-slider").slider({
			range: true,
			min: 0,
			max: 90,
			values: [8, 85],
			slide: function (event, ui) {
				$("input.property-amount").val(ui.values[0] + " - " + ui.values[1]);
			}
		});

		$("input.property-amount").val($(".price-range-slider").slider("values", 0) + " - $" + $(".price-range-slider").slider("values", 1));
	}


	//Gallery Filters
	if ($('.filter-list').length) {
		$('.filter-list').mixItUp({});
	}

	//LightBox / Fancybox
	if ($('.lightbox-image').length) {
		$('.lightbox-image').fancybox({
			openEffect: 'fade',
			closeEffect: 'fade',
			helpers: {
				media: {}
			}
		});
	}


	//Contact Form Validation
	/* if($('#contact-form').length){
		$('#contact-form').validate({
			rules: {
				username: {
					required: true
				},
				subject: {
					required: true,
				},
				email: {
					required: true,
					email:true
				},
				phone: {
					required: true
				},
				message: {
					required: true
				}
			}
		});
	}
	 */

	// Scroll to a Specific Div
	if ($('.scroll-to-target').length) {
		$(".scroll-to-target").on('click', function () {
			var target = $(this).attr('data-target');
			// animate
			$('html, body').animate({
				scrollTop: $(target).offset().top
			}, 1000);

		});
	}


	// Elements Animation
	if ($('.wow').length) {
		var wow = new WOW({
			boxClass: 'wow', // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset: 0, // distance to the element when triggering the animation (default is 0)
			mobile: false, // trigger animations on mobile devices (default is true)
			live: true // act on asynchronously loaded content (default is true)
		});
		wow.init();
	}

	/* ==========================================================================
	   When document is Scrollig, do
	   ========================================================================== */

	$(window).on('scroll', function () {
		headerStyle();
	});

	/* ==========================================================================
	   When document is loaded, do
	   ========================================================================== */

	$(window).on('load', function () {
		handlePreloader();
	});

})(window.jQuery);


$(function () {
	function c() {
		p();
		var e = h();
		var r = 0;
		var u = false;
		l.empty();
		while (!u) {
			if (s[r] == e[0].weekday) {
				u = true
			} else {
				l.append('<div class="blank"></div>');
				r++
			}
		}
		for (var c = 0; c < 42 - r; c++) {
			if (c >= e.length) {
				l.append('<div class="blank"></div>')
			} else {
				var v = e[c].day;
				var m = g(new Date(t, n - 1, v)) ? '<div class="today">' : "<div>";
				l.append(m + "" + v + "</div>")
			}
		}
		var y = o[n - 1];
		a.css("background-color", y).find("h1").text(i[n - 1] + " " + t);
		f.find("div").css("color", y);
		l.find(".today").css("background-color", y);
		d()
	}

	function h() {
		var e = [];
		for (var r = 1; r < v(t, n) + 1; r++) {
			e.push({
				day: r,
				weekday: s[m(t, n, r)]
			})
		}
		return e
	}

	function p() {
		f.empty();
		for (var e = 0; e < 7; e++) {
			f.append("<div>" + s[e].substring(0, 3) + "</div>")
		}
	}

	function d() {
		var t;
		var n = $("#calendar").css("width", e + "px");
		n.find(t = "#calendar_weekdays, #calendar_content").css("width", e + "px").find("div").css({
			width: e / 7 + "px",
			height: e / 7 + "px",
			"line-height": e / 7 + "px"
		});
		n.find("#calendar_header").css({
			height: e * (1 / 7) + "px"
		}).find('i[class^="icon-chevron"]').css("line-height", e * (1 / 7) + "px")
	}

	function v(e, t) {
		return (new Date(e, t, 0)).getDate()
	}

	function m(e, t, n) {
		return (new Date(e, t - 1, n)).getDay()
	}

	function g(e) {
		return y(new Date) == y(e)
	}

	function y(e) {
		return e.getFullYear() + "/" + (e.getMonth() + 1) + "/" + e.getDate()
	}

	function b() {
		var e = new Date;
		t = e.getFullYear();
		n = e.getMonth() + 1
	}
	var e = 480;
	var t = 2013;
	var n = 9;
	var r = [];
	var i = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];
	var s = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
	var o = ["#16a085", "#1abc9c", "#c0392b", "#27ae60", "#FF6860", "#f39c12", "#f1c40f", "#e67e22", "#2ecc71", "#e74c3c", "#d35400", "#2c3e50"];
	var u = $("#calendar");
	var a = u.find("#calendar_header");
	var f = u.find("#calendar_weekdays");
	var l = u.find("#calendar_content");
	b();
	c();
	a.find('i[class^="icon-chevron"]').on("click", function () {
		var e = $(this);
		var r = function (e) {
			n = e == "next" ? n + 1 : n - 1;
			if (n < 1) {
				n = 12;
				t--
			} else if (n > 12) {
				n = 1;
				t++
			}
			c()
		};
		if (e.attr("class").indexOf("left") != -1) {
			r("previous")
		} else {
			r("next")
		}
	})
})

$(document).ready(function(){
	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
	  mainClass: 'mfp-with-zoom', 
	  gallery:{
				enabled:true
			},
	
	  zoom: {
		enabled: true, 
	
		duration: 300, // duration of the effect, in milliseconds
		easing: 'ease-in-out', // CSS transition easing function
	
		opener: function(openerElement) {
	
		  return openerElement.is('img') ? openerElement : openerElement.find('img');
	  }
	}
	
	});
	
	});
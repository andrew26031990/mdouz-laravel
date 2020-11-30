;
$(function () {
	$('.owl-carousel.banner-slider').owlCarousel({
		autoplaySpeed: 1000,
		smartSpeed: 1000,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		loop: false,
		center: true,
		margin: 10,
		dots: false,
		nav: true,
		URLhashListener: true,
		autoplayHoverPause: true,
		items: 1,
		navContainer: '.banner-navs',
		navText: ['<span class="icon-arrow-up"></span>', '<span class="icon-arrow-thin-down"></span>'],
		onInitialize: animation,
		onInitialized: animation,
		onTranslate: animation,
		onTranslated: animation,
		mouseDrag: false,
		touchDrag: false,
		pullDrag: false,
	});

	$('.owl-carousel.services-slider').owlCarousel({
		autoplaySpeed: 1000,
		smartSpeed: 1000,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		loop: false,
		center: true,
		margin: 10,
		dots: false,
		nav: false,
		URLhashListener: true,
		autoplayHoverPause: true,
		items: 1,
		mouseDrag: false,
		touchDrag: false,
		pullDrag: false,
	});

	$('.owl-carousel.about-slider').owlCarousel({
		autoplaySpeed: 1000,
		smartSpeed: 1000,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		loop: true,
		center: true,
		margin: 10,
		dots: true,
		nav: false,
		autoplayHoverPause: true,
		items: 1,
	});
	$('.owl-carousel.pressa-slider').owlCarousel({
		autoplaySpeed: 1000,
		smartSpeed: 1000,
		loop: true,
		margin: 50,
		dots: true,
		nav: true,
		navContainer: '.pressa-slider-controls',
		dotsContainer: '.pressa-slider-controls-dots',
		navText: ['<span class="icon-arrow-thin-left"></span>', '<span class="icon-arrow-thin-right"></span>'],
		autoplayHoverPause: true,
		items: 3,
		slideBy: 1,
		dotsEach: true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:3
			}
		}
	});



	function animation() {
		var text1 = $('.owl-item .banner-slider-title');
		var text2 = $('.owl-item .banner-slider-text');
		var activeText1 = $('.owl-item.active .banner-slider-title');
		var activeText2 = $('.owl-item.active .banner-slider-text');
		text1.css('display', 'none');
		text2.css('display', 'none');
		text1.removeClass('animated fadeInLeft');
		text2.removeClass('animated fadeInRight');
		activeText1.css('display', 'block');
		activeText2.css('display', 'block');
		activeText1.addClass('animated fadeInLeft');
		activeText2.addClass('animated fadeInRight');
	}


	function setActiveDots() {
		var atrib = $('.owl-item.active').find('.banner-slider-block').attr('data-atrib');
		var dots = $('.banner-controls-dot');
		dots.removeClass('active');
		dots.each(function (index, elem) {
			if (elem.getAttribute('href') === atrib) {
				this.classList.add('active');
			}
		});
	}

	function setActiveDots2() {
		var atrib = $('.owl-item.active').find('.services-slider-block').attr('data-atrib');
		var dots = $('.services-controls-dot');
		dots.removeClass('active');
		dots.each(function (index, elem) {
			if (elem.getAttribute('href') === atrib) {
				this.classList.add('active');
			}
		});
	}

	$('.owl-next, .owl-prev').click(setActiveDots);
	$('.banner-controls-dot').click(function (e) {
		e.stopPropagation();
		$('.banner-controls-dot').removeClass('active');
		$(this).addClass('active');
	});
	$('.services-controls-dot').click(function (e) {
		e.stopPropagation();
		$('.services-controls-dot').removeClass('active');
		$(this).addClass('active');
	});

	$(document).ready(setActiveDots);
	$(document).ready(setActiveDots2);


	$('#burger').click(function (e) {
		e.preventDefault();
		e.stopPropagation();
		var menuBlock = $('.header-block .main-menu');

		$(this).toggleClass('open');
		menuBlock.toggleClass('show');
	});


	$('#burger2').click(function (e) {
		e.preventDefault();
		e.stopPropagation();
		$(this).toggleClass('open');
		$('.find-serach-mobile-content-wrap').toggleClass('show');
	});
	$(document).click(function (e) {
		var target = e.target;
		if (target.tagName !== 'LI' && target.tagName !== 'A' && target.tagName !== 'SPAN' && target.tagName !== 'LI' && $('.header-block .main-menu').hasClass('show')) {
			e.preventDefault();
			$('.header-block .main-menu').removeClass('show');
			$('.lang-menu').removeClass('show');
			$('.burger').removeClass('open');
		}
	});

	$('.active-lang').click(function (e) {
		$('.lang-menu').toggleClass('show');
	});

	if ($('.to-top-btn').length) {
		$('.to-top-btn').on('click', function (e) {
			e.preventDefault();
			$('html, body').animate({
				scrollTop: 0
			}, 700);
		});
	};

	$('.find-filters-range').on('change mousemove', function () {
		var val = $(this).val();
		$(this).parent().find('.find-filters-range-text').html(val);
	});

    $('.find-results-content').on( "click", '.find-results-title', function(e) {
		e.preventDefault();
		if ($(window).width() < 768) {
			$('.find-card').addClass('show');
		} else {
			$('.find-card-block').css('display', 'block');
		}
	});

	$('.icon-close').click(function (e) {
		e.preventDefault();
		if ($(window).width() < 768) {
			$('.find-card').removeClass('show');
		} else {
			$('.find-card-block').css('display', 'none');
		}

	});
	$('.find-filters-open').click(function (e) {
		e.preventDefault();
		$('.find-filters').toggleClass('fadeblock');
		$('.find-filters-container').toggleClass('show');
	});


	$("#min_price,#max_price").on('change input', function () {
		var salaryMin = parseInt($("#min_price").val());
		var salaryMax = parseInt($("#max_price").val());
		var steps = parseInt($("#max_price").attr('step'));

		if (salaryMin > salaryMax) {

			$('#max_price').val(salaryMin);
		}
		if (salaryMin == salaryMax) {
			salaryMax = salaryMin + steps;

			$("#min_price").val(salaryMin);
			$("#max_price").val(salaryMax);
		}

		$("#slider-range").slider({
			values: [salaryMin, salaryMax]
		});
	});

	var salaryMin = parseInt($("#max_price").attr('min'));
	var salaryMax = parseInt($("#max_price").attr('max'));
	var minVal = parseInt($("#min_price").val());
	var maxVal = parseInt($("#max_price").val());
	var steps = parseInt($("#max_price").attr('step'));
	$("#slider-range").slider({
		range: true,
		orientation: "horizontal",
		min: salaryMin,
		max: salaryMax,
		values: [minVal, maxVal],
		step: steps,

		slide: function (event, ui) {
			if (ui.values[0] == ui.values[1]) {
				return false;
			}

			$("#min_price").val(ui.values[0]);
			$("#max_price").val(ui.values[1]);
		}
	});


});
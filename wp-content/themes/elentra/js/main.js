(function($) {
    "use strict"; 

    /* ============= Preloader ============= */

    $(window).on('load', function () {
        $('#loader-wrapper').fadeOut();
    });
/*--
	Menu Sticky
-----------------------------------*/
var windows = $(window);
var sticky = $('.header-sticky , .header-dark')
windows.on('scroll', function() {
	var scroll = windows.scrollTop();
	if (scroll < 250) {
		sticky.removeClass('stick');
	}else{
		sticky.addClass('stick');
	}
});

/*--
	Mobile Menu
------------------------*/
var multiPageMenu = $('.multi-page-menu');
multiPageMenu.meanmenu({
    meanScreenWidth: '991',
    meanMenuContainer: '.mobile-menu.multi-page',
    meanMenuClose: '<i class="fa fa-times  fa-1"></i>',
    meanMenuOpen: '<i class="fa fa-bars fa-1"></i>',
    meanRevealPosition: 'right',
    meanMenuCloseSize: '30px',
});
var onePageMenu = $('.one-page-menu');
onePageMenu.meanmenu({
    meanScreenWidth: '991',
    meanMenuContainer: '.mobile-menu.one-page',
    meanMenuClose: '<i class="fa fa-times  fa-1"></i>',
    meanMenuOpen: '<i class="fa fa-bars fa-1"></i>',
    meanRevealPosition: 'right',
    meanMenuCloseSize: '30px',
    onePage: true,
});



/*-- 
    Menu Toggle
-----------------------------------*/
var menuSection = $('.menu-section');
var menuToggle = $('.menu-toggle');
menuToggle.on('click', function(){
    if( headerSection.hasClass('menu-open') ) {
        headerSection.removeClass('menu-open');
        $(this).html('<i class="ion-android-menu"></i>');
        menuSection.removeClass('active');
    }else{
        headerSection.addClass('menu-open');
        $(this).html('<i class="ion-android-close"></i>');
        menuSection.addClass('active');
    }
});

/*-- 
    Creative Menu Close On Link Click
-----------------------------------*/
$('.cr-menu ul li a').on('click', function(){
    if( headerSection.hasClass('menu-open') ) {
        headerSection.removeClass('menu-open');
        menuToggle.html('<i class="ion-android-menu"></i>');
        menuSection.removeClass('active');
    }
});

/*-- 
    Search Toggle
-----------------------------------*/
var headerSearch = $('.header-search');
var searchToggle = $('.search-toggle');
searchToggle.on('click', function(){
    if( headerSearch.hasClass('open') ) {
        headerSearch.removeClass('open');
        $(this).html('<i class="ion-android-search"></i>');
    }else{
        headerSearch.addClass('open');
        $(this).html('<i class="ion-android-close"></i>');
    }
});




    
/*-- 
    ScrollUp
-----------------------------------*/
$.scrollUp({
    scrollText: '<i class="fa fa-angle-up"></i>',
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade'
});
    
/*--
	Magnific Popup
-----------------------------------*/

/*-- Image --*/
var imagePopup = $('.image-popup');
imagePopup.magnificPopup({
	type: 'image',
});
/*-- Gallery --*/
var galleryPopup = $('.gallery-popup');
galleryPopup.magnificPopup({
	type: 'image',
	gallery:{
        enabled:true,
        navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    }
    	
});




    
   

})(jQuery);





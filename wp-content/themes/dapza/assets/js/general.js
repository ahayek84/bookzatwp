// JavaScript Document
jQuery(document).ready(function() {
	
	var dapzaViewPortWidth = '',
		dapzaViewPortHeight = '';

	function dapzaViewport(){

		dapzaViewPortWidth = jQuery(window).width(),
		dapzaViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( dapzaViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var dapzaSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var dapzaSiteHeaderWidth = jQuery('.site-header').width();
			var dapzaSiteHeaderPadding = ( dapzaSiteHeaderWidth * 2 )/100;
			var dapzaMenuHeight = jQuery('.menu-container').height();
			
			var dapzaMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var dapzaMenuPadding = ( dapzaSiteHeaderHeight - ( (dapzaSiteHeaderPadding * 2) + dapzaMenuHeight ) )/2;
			var dapzaMenuButtonsPadding = ( dapzaSiteHeaderHeight - ( (dapzaSiteHeaderPadding * 2) + dapzaMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':dapzaMenuPadding});
			jQuery('.site-buttons').css({'padding-top':dapzaMenuButtonsPadding});
			
		}else{

			jQuery('.menu-container, .site-buttons').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		dapzaViewport();
		
	});
	
	dapzaViewport();
	
	jQuery('.site-branding .search-button').on('click', function(){
		
		if( dapzaViewPortWidth > 1200 ){

			jQuery('.fullSearchContainer').css({'height':dapzaSiteHeaderHeight,'position':'fixed','top':'0','left':'0'}).fadeIn(500);
		
		}else{
			jQuery('.main-navigation').slideToggle();
		}	
		
				
	});

	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( dapzaViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

	jQuery('.site-branding .account-button').on('click', function(){
		
		if( dapzaViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}		
				
	});

	jQuery('.site-buttons .search-button').on('click', function(){

		if( dapzaViewPortWidth > 1200 ){

		
			jQuery('.fullSearchContainer').css({'height':dapzaViewPortHeight,'position':'fixed','top':'0','left':'0','z-index':'99'}).fadeIn(500, function(){
				
				var fullSearchContainerHeight = jQuery('.fullSearchFieldContainer').height();
				var fullSearchContainerPadding = ( dapzaViewPortHeight - fullSearchContainerHeight ) / 2;
			
			
				jQuery('.fullSearchFieldContainer').css({'padding-top':fullSearchContainerPadding}).fadeIn(1000);				
				
			});
		
		}else{
			
		}	
		
				
	});	
	
	jQuery('.fullSearchContainerClose').on('click', function(){
		
		if( dapzaViewPortWidth > 1200 ){

			jQuery('.fullSearchContainer').fadeOut(1000, function(){
				jQuery('.fullSearchContainer, .fullSearchFieldContainer').removeAttr('style');
			});
		
		}else{
			
		}	
		
				
	});
	
    var owl = jQuery("#dapza-owl-basic");
         
    owl.owlCarousel({
             
      	slideSpeed : 300,
      	paginationSpeed : 400,
      	singleItem:true,
		navigation : true,
      	pagination : false,
      	navigationText : false,
         
    });	
	
});		
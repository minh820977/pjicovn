$(function(){
	$('.insurrance .accordion').click(function() {
		$('.insurrance .accordion').removeClass('active');
		$('.insurrance .panel').removeClass('show');
	});
	 $('.bxslider').bxSlider({
		 controls:false,
		 auto:true,
	 });
	 
	  $('#myTab').tab('show');
	  $('.fancybox-media')
		.attr('rel', 'media-gallery')
		.fancybox({
			openEffect : 'none',
			closeEffect : 'none',
			prevEffect : 'none',
			nextEffect : 'none',

			arrows : false,
			helpers : {
				media : {},
				buttons : {}
			}
		});
	var acc = document.getElementsByClassName("accordion");
	var i;
	for (i = 0; i < acc.length; i++) {
		acc[i].onclick = function(){
			this.classList.toggle("active");
			this.nextElementSibling.classList.toggle("show");
	  }
	}
	//tab
	$('#back-top').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });		
		$('.toggle-menu').click(function(){		
			$('.mobile-menu').slideToggle();	
			return false;	});		
			$('.mega-menu-wrap .mega-menu > li.mega-menu-item-has-children > a.mega-menu-link ').click(function(){	
				if(!($(this).hasClass('active'))){	
					$(this).parent().find('>ul').fadeIn();				
					$(this).addClass('active');			
					return false;		
				}else{		
					$(this).removeClass('active');	
					return true;
				}	
			});
			$('.features-area .row .block-item .inner').matchHeight({	
				byRow:true,	});
			$('.footer-bar-menu ul li a').matchHeight({	
				byRow:true,
			});	
			$('.footer-bar-area .footer-bar-item').matchHeight({
				byRow:true,
			});
			$('.looking-for .search-icon').click(function(){
				$(this).parent().find('.search-input').slideToggle();
				return false;
			});
			$('#header li ul.mega-sub-menu .wrap-text-line img').addClass('hvr-push');
})
$(window).load(function(){
	  $('#myTab >li').removeClass('active');
	  $('#myTab >li:first-child').addClass('active');
	  $('.tab-content>.tab-pane').removeClass('active');
	  $('.tab-content>.tab-pane:first-child').addClass('active');
});
$(window).scroll(function() {
	if($(window).width() > 767) {
		if($('.check-fixed').is(":visible")) {
			var offset = $('.check-fixed').offset().top;
			var sc = $(window).scrollTop();
			var back = $('.back-wrap').offset().top - 200;
			if(sc > offset) {
				
				if(sc+100 > back) {
					$('#sidebar .services').removeClass('sidebar-fixed');
					$('#sidebar .services').addClass('sidebar-bottom');
				} else {
					$('#sidebar .services').addClass('sidebar-fixed');
					$('#sidebar .services').removeClass('sidebar-bottom');
				}
			} else $('#sidebar .services').removeClass('sidebar-fixed');
		}
	}
});


(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element

*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}
function add_marker_people( map, lat, lng ) {

	// var
	var latlng = new google.maps.LatLng( lat, lng );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

}
/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map

*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}
}
function move_map( map, lat, lng ) {

	// vars
	var bounds = new google.maps.LatLngBounds();
	
	var latlng = new google.maps.LatLng( lat, lng );
	bounds.extend( latlng );
	map.setCenter( bounds.getCenter() );
	map.setZoom( 16 );
	
}
/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*/
function getCurrentpos(map) {
	if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){
			var lat = position.coords.latitude;
			var lng = position.coords.longitude;
			add_marker_people(map, lat, lng);
			move_map(map, lat, lng);
		});
    } else { 
        alert("Trình duyệt không hỗ trợ.");
    }
}
// global var
var map = null;

$(document).ready(function(){
	$('.acf-map').each(function(){
		// create map
		map = new_map( $(this) );
		
		return map;
	});
	$('.ten-chinhanh').click(function(){
		var lat = $(this).attr('lat');
		var lng = $(this).attr('lng');
		
		move_map( map, lat, lng );
		
	});
});

})(jQuery);

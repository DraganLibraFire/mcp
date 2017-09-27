<?php
/**
 * Template name: Contact
 */

get_header(); ?>

	<div class="container">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<section id="" class="clearfix section-contact-us">
					<div class="clearfix section-contact-us-inner">
						<div class="row">
							<div class="col-xs-12">
								<p class="section-heading">
									<?php the_title();?>
								</p>
								<p class="section-subheading">
									<?php the_field('subtitle');?>
								</p>
							</div>

						</div>
					</div>

					<div class="main-content-wrapper">

						<div class="contact-us-content-wrapper">
							<?php the_content(); ?>
						</div>

						<div class="clearfix city-boxes-wrapper">
							<?php

							// check if the repeater field has rows of data
							if( have_rows('locations') ):
								// loop through the rows of data
								while ( have_rows('locations') ) : the_row();


									?>
									<div class="pull-left single-locations-box">
										<div class="single-lcations-box-inner" style="background-image: url(<?php the_sub_field('location_image'); ?>)">
											<div class="front-box">
												<div class="box-content-wrapper">
													<div class="box-content-wrapper-inner">
														<div class="siluete-image">
															<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-siluete.png" alt="">
														</div>
														<div class="location-name">
															<?php the_sub_field('location_name');?>
														</div>
													</div>
												</div>
											</div>
											<div class="back-box" style="background-image: url(<?php the_sub_field('location_image'); ?>)">
												<div class="box-content-wrapper">
													<div class="box-content-wrapper-inner">
														<?php the_sub_field('location_text_content');?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
								endwhile;

							else :

								// no rows found

							endif;

							?>
						</div>

						<div class="clearfix find-us-here-wrapper">
							<p class="section-heading">
								<?php _e( 'Vind ons hier', 'mcp' ); ?>
							</p>
							<div class="tabs-main-wrapper">
								<div class="find-us-here-header">
									<?php

									// check if the repeater field has rows of data
									if( have_rows('locations') ):
										$index = 1;
										?><ul class="nav nav-tabs maps-marker-filter"><?php

										while ( have_rows('locations') ) : the_row();

											?>
											<li class="pull-left single-locations-box <?php echo $index == 1 ? 'active' : ''; ?>">
												<a class="location-name-link" href="#l-<?php echo $index; ?>">
													<?php the_sub_field('location_name');?>
												</a>
											</li>
											<?php
											$index++;
										endwhile;

										?></ul><?php
									endif;

									?>

								</div>
								<div class="find-us-here-content">
									<?php

									// check if the repeater field has rows of data
									if( have_rows('locations') ):
										$index = 1;
										?><ul class="nav tab-controll tabs-content-wrapper-inner maps-content"><?php

										while ( have_rows('locations') ) : the_row();


											?>
											<li id="l-<?php echo $index; ?>" class="<?php echo $index == 1 ? 'active ': ''; ?>single-locations-content-box">
												<?php

												$location = get_sub_field('location_marker');

												if( !empty($location) ):
													?>
													<div class="acf-map">
														<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"><?php echo $location['address']; ?></div>
													</div>
												<?php endif; ?>
											</li>
											<?php

											$index++;
										endwhile;

										?></ul><?php

									endif; ?>
								</div>
							</div>
						</div>
					</div>

				</section><!-- #post-## -->


			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQilzeY4HHSm9_2Gfml01G5D8shVjelAQ"></script>
<?php $image_marker = get_stylesheet_directory_uri() . '/images/map-marker.png'; ?>
<script>

	(function($) {
		window.maps = [];
		/*
		 *  new_map
		 *
		 *  This function will render a Google Map onto the selected jQuery element
		 *
		 *  @type	function
		 *  @date	8/11/2013
		 *  @since	4.3.0
		 *
		 *  @param	$el (jQuery element)
		 *  @return	n/a
		 */

		function new_map( $el ) {

			// var
			var $markers = $el.find('.marker');


			// vars
			var args = {
				zoom		: 16,
				center		: new google.maps.LatLng(0, 0),
				mapTypeId	: google.maps.MapTypeId.ROADMAP,
				styles		: [
					{
						"featureType": "administrative.locality",
						"elementType": "all",
						"stylers": [
							{
								"hue": "#2c2e33"
							},
							{
								"saturation": 7
							},
							{
								"lightness": 19
							},
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "landscape",
						"elementType": "all",
						"stylers": [
							{
								"hue": "#ffffff"
							},
							{
								"saturation": -100
							},
							{
								"lightness": 100
							},
							{
								"visibility": "simplified"
							}
						]
					},
					{
						"featureType": "poi",
						"elementType": "all",
						"stylers": [
							{
								"hue": "#ffffff"
							},
							{
								"saturation": -100
							},
							{
								"lightness": 100
							},
							{
								"visibility": "off"
							}
						]
					},
					{
						"featureType": "road",
						"elementType": "geometry",
						"stylers": [
							{
								"hue": "#bbc0c4"
							},
							{
								"saturation": -93
							},
							{
								"lightness": 31
							},
							{
								"visibility": "simplified"
							}
						]
					},
					{
						"featureType": "road",
						"elementType": "labels",
						"stylers": [
							{
								"hue": "#bbc0c4"
							},
							{
								"saturation": -93
							},
							{
								"lightness": 31
							},
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "road.arterial",
						"elementType": "labels",
						"stylers": [
							{
								"hue": "#bbc0c4"
							},
							{
								"saturation": -93
							},
							{
								"lightness": -2
							},
							{
								"visibility": "simplified"
							}
						]
					},
					{
						"featureType": "road.local",
						"elementType": "geometry",
						"stylers": [
							{
								"hue": "#e9ebed"
							},
							{
								"saturation": -90
							},
							{
								"lightness": -8
							},
							{
								"visibility": "simplified"
							}
						]
					},
					{
						"featureType": "transit",
						"elementType": "all",
						"stylers": [
							{
								"hue": "#e9ebed"
							},
							{
								"saturation": 10
							},
							{
								"lightness": 69
							},
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "water",
						"elementType": "all",
						"stylers": [
							{
								"hue": "#e9ebed"
							},
							{
								"saturation": -78
							},
							{
								"lightness": 67
							},
							{
								"visibility": "simplified"
							}
						]
					}
				]
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

		$(document).on('map_tab_changed', function(){

			for( var i = 0; i < window.maps.length; i++ ){

				google.maps.event.trigger(window.maps[i], 'resize');
				center_map( window.maps[i] );

			}

		});

		/*
		 *  add_marker
		 *
		 *  This function will add a marker to the selected Google Map
		 *
		 *  @type	function
		 *  @date	8/11/2013
		 *  @since	4.3.0
		 *
		 *  @param	$marker (jQuery element)
		 *  @param	map (Google Map object)
		 *  @return	n/a
		 */

		function add_marker( $marker, map ) {

			// var
			var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

			// create marker
			var marker = new google.maps.Marker({
				position	: latlng,
				map			: map,
				icon        	: "<?php echo $image_marker; ?>"
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

				// show info window when marker is clicked
				google.maps.event.addListener(marker, 'click', function() {

					infowindow.open( map, marker );

				});
			}

		}

		/*
		 *  center_map
		 *
		 *  This function will center the map, showing all markers attached to this map
		 *
		 *  @type	function
		 *  @date	8/11/2013
		 *  @since	4.3.0
		 *
		 *  @param	map (Google Map object)
		 *  @return	n/a
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

		/*
		 *  document ready
		 *
		 *  This function will render each map when the document is ready (page has loaded)
		 *
		 *  @type	function
		 *  @date	8/11/2013
		 *  @since	5.0.0
		 *
		 *  @param	n/a
		 *  @return	n/a
		 */
// global var

		$(document).ready(function(){

			$('.acf-map').each(function(){

				// create map
				window.maps.push(new_map( $(this) ));

			});

		});

	})(jQuery);
</script>
<?php get_footer(); ?>

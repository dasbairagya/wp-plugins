 <!-- Footer Type-1 -->
      <footer class="footer footer-type-1">
        <div class="container">
          <div class="footer-widgets">
            <div class="row">

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="widget footer-about-us">
                   <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                </div>
              </div> <!-- end about us -->

              <div class="col-md-2 col-md-offset-1 col-sm-6 col-xs-12">
                <div class="widget footer-links">
                  <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                </div>
              </div>

              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="widget footer-links">
                   <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
                </div>
              </div>

              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="widget footer-links">
                 <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
                </div>
              </div>

              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="widget footer-links">
                  <?php dynamic_sidebar( 'fifth-footer-widget-area' ); ?>
                </div>
              </div>

            </div>
          </div>    
        </div> <!-- end container -->

        <div class="bottom-footer">
          <div class="container">
            <div class="row">

              <div class="col-sm-6 copyright sm-text-center">
                <span>
                  © 2017 All Rights Reserved  I SAVED A SOUL
                </span>
              </div>

              <div class="col-sm-6 col-xs-12 footer-payment-systems text-right sm-text-center mt-sml-10">
              Designed & Developed By : <a  href="http://www.goigi.com/"
target="_blank"> GOIGI.COM</a>
              </div>

            </div>
          </div>
        </div> <!-- end bottom footer -->
      </footer> <!-- end footer -->

      <div id="back-to-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
      </div>

    </div> <!-- end content wrapper -->
  </main> <!-- end main wrapper -->

  <!-- jQuery Scripts -->
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>  
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
  
  <?php if(is_page('add-kiss')) { ?>
  <script>
                 $(document).ready(function(){
                  $("#btn_sub").click(function(){
                    var name =$("#title").val();
                    var address =$("#address").val();
                    var lat =$("#lat").val();
                    var lng = $("#lng").val();
                    var cat = $("#cat").val();
                    var story = $("#story").val();
                    // Returns successful data submission message when the entered information is stored in database.
                    var dataString = 'name='+ name + '&address='+ address + '&lat='+ lat + '&lng='+ lng + '&type='+ cat + '&story='+ story;
                    if(name==''||cat==''||story==''){
                    alert("Please Fill All Fields"); 
                    }
                   else{

                  $.ajax({
                         type: "POST",
                         url: "<?php echo get_template_directory_uri(); ?>/template-parts/save.php/",
                         data: dataString,
                         cache: false,
                         success: function(result){
                            $('#msg').html(result);
                            document.forms['form-search'].reset();
                            window.location = "<?php echo site_url();?>/show-kiss";

                         }
                    });
                 
                }
                   return false;
                   });
                });
                </script>
  
  
  <script type="text/javascript">
      var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

      function initialize() {
      var myOptions = {
                center: new google.maps.LatLng(22.917922, 79.804687 ),
                zoom: 2,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });

            var marker;
            function placeMarker(location) {
                if(marker){ //on vérifie si le marqueur existe
                    marker.setPosition(location); //on change sa position
                }else{
                    marker = new google.maps.Marker({ //on créé le marqueur
                        position: location, 
                        map: map
                    });
                }
                document.getElementById('lat').value=location.lat();
                document.getElementById('lng').value=location.lng();
                getAddress(location);
            }

      function getAddress(latLng) {
        geocoder.geocode( {'latLng': latLng},
          function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
              if(results[0]) {
                document.getElementById("address").value = results[0].formatted_address;
                document.getElementById("cform").style.display="block";
              }
              else {
                document.getElementById("address").value = "No results";
              }
            }
            else {
              document.getElementById("address").value = status;
            }
          });
        }
      }
      google.maps.event.addDomListener(window, 'load', initialize);


</script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYwzmTe-P960g7bRYKItyxa2zSLzqc9B8&callback=initialize">
    </script>
<?php } ?>
      
  
<?php if ( is_page('show-kiss')) { 
?>
	<script>
				var iconBase = '';
						var customLabel = {
								restaurant: {
										label: iconBase + 'H',
										color:'#00FFFF'
								},
								bar: {
										label: iconBase + 'Br',
										color:'#FF00FF'
								},
									green: {
										label: iconBase + 'G',
										color:'green'
								},
								blue: {
										label: iconBase + 'B',
										color:'blue'
								},
								red: {
										label: iconBase + 'R',
										color: 'red'
								},
								yellow: {
										label: iconBase + 'Y',
										color:'yellow'
								},
								purple: {
										label: iconBase + 'P',
										color: '#800080'
								}
						};
							
				function pinSymbol(color) {
							return {
									path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z',
									fillColor: color,
									fillOpacity: 1,
									strokeColor: '#000',
									strokeWeight: 1,
									scale: 1
									
							};
			}
			function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
					center: new google.maps.LatLng(26.666202, 29.515270),
					zoom: 2
			});
			var infoWindow = new google.maps.InfoWindow;

					// Change this depending on the name of your PHP or XML file
					downloadUrl('<?php echo site_url();?>/database/', function(data) {
							var xml = data.responseXML;
							var markers = xml.documentElement.getElementsByTagName('marker');
							Array.prototype.forEach.call(markers, function(markerElem) {
									var name = markerElem.getAttribute('name');
									var address = markerElem.getAttribute('address');
									var type = markerElem.getAttribute('type');
									var point = new google.maps.LatLng(
													parseFloat(markerElem.getAttribute('lat')),
													parseFloat(markerElem.getAttribute('lng')));

									var infowincontent = document.createElement('div');
									var strong = document.createElement('strong');
									strong.textContent = name
									infowincontent.appendChild(strong);
									infowincontent.appendChild(document.createElement('br'));

									var text = document.createElement('text');
									text.textContent = address
									infowincontent.appendChild(text);
									var icon = customLabel[type] || {};
									var rong = icon.color;
									var marker = new google.maps.Marker({
											map: map,
											position: point,
											label: icon.label,
											icon: pinSymbol(rong),
											animation:  google.maps.Animation.DROP

											// icon: icons[customLabel.type].icon
									});
									marker.addListener('click', function() {
											infoWindow.setContent(infowincontent);
											infoWindow.open(map, marker);
											if (marker.getAnimation() != null) {
													marker.setAnimation(null);
											} else {
													marker.setAnimation(google.maps.Animation.BOUNCE);
											}
									});
							});
					});
			}



						function downloadUrl(url, callback) {
								var request = window.ActiveXObject ?
												new ActiveXObject('Microsoft.XMLHTTP') :
												new XMLHttpRequest;
										request.onreadystatechange = function() {
													if (request.readyState == 4) {
															request.onreadystatechange = doNothing;
															callback(request, request.status);
													}
											};

											request.open('GET', url, true);
											request.send(null);
						}

						function doNothing() {}
				</script>
				<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYwzmTe-P960g7bRYKItyxa2zSLzqc9B8&callback=initMap">
				</script>
<?php
}

?>
  <?php wp_footer(); ?>  
</body>
</html>
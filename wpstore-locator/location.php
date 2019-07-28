<?php 
/*
*Plugin Name: Frontend Map Post
*Description: This is a map location which specific locate the post of each location
*Author: Gopal & Kundan by goigi
*/

//registering javascript and css
function map_init_method() {
wp_register_style ('bootcss', plugins_url ( 'css/boot.min.css', __FILE__ ) );
wp_enqueue_style('bootcss');
wp_register_style ('mystyle1', plugins_url ( 'css/style.css', __FILE__ ) );
wp_enqueue_style('mystyle1');
wp_register_style ('fontawesome', plugins_url ( 'css/font-awesome.css', __FILE__ ) );
wp_enqueue_style('fontawesome');

wp_register_script('bootjs', plugins_url ( 'js/boot.min.js', __FILE__ ) );
wp_enqueue_script('bootjs');
wp_register_script('jqueryjs', plugins_url ( 'js/jquery.min.js', __FILE__ ));
wp_enqueue_script('jqueryjs');
wp_register_script('myscript', plugins_url ( 'js/myscript.js', __FILE__ ));
wp_enqueue_script('myscript'); 
wp_register_script('scripts', plugins_url ( 'js/script.js', __FILE__ ));
wp_enqueue_script('scripts');   
}
add_action('init', 'map_init_method');
add_action('admin_menu', 'frontent_map');
function frontent_map(){
    add_menu_page(__('Frontend Map Post', 'menu-map'), __('Frontend Map Post', 'menu-map'), 'manage_options', 'add-map', 'add_map',plugin_dir_url( __FILE__ ) . 'images/cityscape.png');
}
function add_map(){     
 ?>
 <div class="container">
    <div class="page-header">
        <h1>Frontend Map Post<span class="pull-right label label-default">:)</span></h1>
    </div>
    <div class="row">
    	<div class="col-md-12">
            <div class="panel with-nav-tabs panel-warning">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">All Vegan</a></li>
                            <li><a href="#tab2default" id="tabshow"  data-toggle="tab">Show Vegan</a></li>
                            <li><a href="#tab3default" id="tabhide" data-toggle="tab">Add Vegan</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">

                        <div class="table-responsive">
			              <table id="mytable" class="table table-bordred table-striped">
			                   <thead>
			                   
			                   <th><input type="checkbox" id="checkall" /></th>
			                   <th>Name</th>
			                    <th>Address</th>
			                     <th>Lat</th>
			                     <th>Lng</th>
			                     <th>Cat</th>
			                     <th>Story</th>
			                      <th>Edit</th>
			                      
			                       <th>Delete</th>
			                   </thead>
						    <tbody>
						    <?php global $wpdb;  
               				$results = $wpdb->get_results( "SELECT * FROM markers" ); 
                             foreach ($results as $result) { 
                            
                              ?> 
						    
						    <tr id="row<?php echo $result->id;?>">
						    <td><input type="checkbox" class="checkthis" /></td>
						    <td><?php echo $result->name;?></td>
						    <td><?php echo $result->address;?></td>
						    <td><?php echo $result->lat;?></td>
						    <td><?php echo $result->lng;?></td>
						    <td><?php echo $result->cat;?></td>
						    <td><?php echo $result->story;?></td>
						    <td id="edit-<?php echo $result->id;?>"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="editUser(<?php echo $result->id;?>)"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
						    <td id="delete-<?php echo $result->id;?>"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="deleteUser(<?php echo $result->id;?>)"><span class="glyphicon glyphicon-trash"></span></button></p></td>
						    </tr>

						    <?php  } ?> 
						    </tbody>
						        
						</table>
						</div><!-- end table-responsive -->
						


						<!-- modal for edit start-->

						<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
						<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
						<h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
						</div>
						<form>
						<div class="modal-body" id="edit-modal">
						

						
						<div class="form-group">
						<input class="form-control " type="text" name="title" value="">
						</div>
						<div class="form-group">
						<input class="form-control " type="text" name="address" value="">
						</div>
						<div class="form-group">
						<input class="form-control " type="text" name="lat" value="">
						</div>
						<div class="form-group">
						<input class="form-control " type="text" name="lng" value="">
						</div>
						<div class="form-group">
						<select name="type" id="cat" class="form-control" >
                            <option value="">Select a category</option>
                            <option value="green">First kisses</option>
                            <option value="blue">Last kisses</option>
                            <option value="red">Hot 'n Heavy</option>
                            <option value="yellow">Friends and Family</option>
                            <option value="perple">All other kisses</option>                    
                            
                        </select>
						</div>
						
						<div class="form-group">
						<textarea rows="2" class="form-control" name="story" value=""></textarea>
						</div>


						</div>
						<div class="modal-footer">
						<button id="btnUpdate" type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
						</div>
						</form>
						</div>
						<!-- /.modal-content --> 
						</div>
						<!-- /.modal-dialog --> 
						</div>
						<!-- modal for edit end-->
						<!-- modal for delete start-->
						<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
						<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
						<h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
						</div>
						<div class="modal-body">

						<div class="alert alert-danger" id="del-response"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
						<input type="hidden" name="del-id" id="del-id">

						</div>
						<div class="modal-footer ">
						<button type="button" id="btn-yes" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign" onclick="deleteUser1(document.getElementById('del-id').value)"></span> Yes</button>
						<button type="button" id="btn-no" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
						</div>
						</div>
						<!-- /.modal-content --> 
						</div>
						<!-- /.modal-dialog --> 
						</div>

						<!-- modal for delete end-->

                        </div><!-- end tab1-default -->



                        <div class="tab-pane fade" id="tab2default">
                        <div id="map" style="position:initial; margin-left:130px; height:400px;margin-top: 20px; width: 76%;"></div>
                       </div><!-- end tab2-default -->


                        <div class="tab-pane fade" id="tab3default">
                        <div id="cform">
						    <div class="row">
						        <div class="col-md-8 col-md-offset-2">
						            <div class="well well-sm">
						               <form id="form-search">
						                <div class="row">
						                    <div class="col-md-6">
						                        <div class="form-group">
						                            <label for="name">
						                                Story Title</label>
						                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Story Title Here"  />
						                        </div>
						                      
						                        <div class="form-group">
						                            <label for="subject">
						                                Kiss Category</label>
						                            <select name="type" id="cat" class="form-control" >
						                                <option value="">Select a category</option>
						                                <option value="green">First kisses</option>
						                                <option value="blue">Last kisses</option>
						                                <option value="red">Hot 'n Heavy</option>
						                                <option value="yellow">Friends and Family</option>
						                                <option value="perple">All other kisses</option>                    
						                                
						                            </select>
						                        </div>  
						                    </div>
						                    <div class="col-md-6">
						                        <div class="form-group">
						                            <label for="name">
						                                Your Story (max. 500 characters)</label>
						                            <textarea name="story" id="story" class="form-control" rows="9" cols="25" 
						                                placeholder="Message"></textarea>
						                        </div>
						                    </div>

						                    <input type="hidden" id="address" name="address">
						                    <input type="hidden" id="lat" name="lat">
						                    <input type="hidden" id="lng" name="lng">

						                    <div class="col-md-12">
						                    <input id="btn_sub" type="submit" name="submit" value="Map your Kiss" class="btn btn-primary pull-right">
						                      
						                    </div>
						                </div>
						                </form>
						                <div id="msg"></div>
						            </div>
						        </div>      <!-- end col-md-offset-2 -->
						    </div>
						</div><!-- end div id="cform"-->
                         <div id="map_canvas" style="position:initial; height:400px;margin-top: 20px; margin-left:130px; width:76%"></div>
                        </div><!-- end tab3-default -->






                    </div><!-- end tab-content -->
                </div><!-- end panel body -->
            </div><!-- end panel -->
        </div><!-- end col-md-12-->
	</div><!-- end main row -->
</div><!-- end main container -->

<!-- script for all vegan -->
<!-- <script type="text/javascript">
	$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});

</script> -->

<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.27&key=AIzaSyBYwzmTe-P960g7bRYKItyxa2zSLzqc9B8&callback=loadmaps">
    </script>
<!-- script for show show vegan -->
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
          center: new google.maps.LatLng(-33.863276, 151.207977),
          zoom: 2
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://localhost/research/database/', function(data) {
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
		   $('#tabshow').on('mouseleave', function () { 
			    google.maps.event.trigger(map, 'resize'); 
			    console.log('fired'); 
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
   <!--  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYwzmTe-P960g7bRYKItyxa2zSLzqc9B8&callback=initMap">
    </script> -->

    <!-- script for add vegan -->
    <script type="text/javascript">
     

      function initialize() {

      var myOptions = {
                center: new google.maps.LatLng(22.917922, 79.804687 ),
                zoom: 6,
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
        $('#tabhide').on('mouseleave', function () { 
	    google.maps.event.trigger(map, 'resize'); 
	    console.log('fired'); 
	  }); 
       
      }
      // google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type="text/javascript">
function loadmaps(){
    initialize();
    initMap();  
}
</script>

            
<!-- script for processing add location -->
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

        // $(document).on('click','#btnContactUs',function(e) {
      // var data = $("#form-search").serialize(); 
      console.log(cat); 
     
      $.ajax({
             type: "POST",
             url: "<?php echo get_template_directory_uri(); ?>/template-parts/save.php/",
             data: dataString,
             cache: false,
             success: function(result){
                $('#msg').html(result);
                document.forms['form-search'].reset();

                  // alert("Data Save: " + data);
             }
        });
     
    }
       return false;
       });
    });
    </script>


    <!-- script for edit -->
		<script>
	    	function editUser(str) {
	    		// console.log(str);
				document.getElementById("edit-modal").innerHTML = '';
				var url = "http://localhost/hotel/database/";
			    if (str == "") {
			        document.getElementById("edit-modal").innerHTML = "";
			        return;
			    } else { 
			        if (window.XMLHttpRequest) {
			            // code for IE7+, Firefox, Chrome, Opera, Safari
			            xmlhttp = new XMLHttpRequest();
			        } else {
			            // code for IE6, IE5
			            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			        }
			        xmlhttp.onreadystatechange = function() {
			            if (this.readyState == 4 && this.status == 200) {
			                document.getElementById("edit-modal").innerHTML = this.responseText;
			            }
			            else{
			            	document.getElementById("edit-modal").innerHTML = this.responseText;
			            }
			        };
			        xmlhttp.open("GET","http://localhost/research/fetch/?q="+str,true);//put your site url and specify the database file.
			        xmlhttp.send();
			    }
			}
	    </script>

<!-- script for update -->
<script type="text/javascript">
$(document).ready(function(){
$('#btnUpdate').click(function(){
	console.log('btnUpdate fired');
	 	var name =$("#title1").val();
        var address =$("#address1").val();
        var lat =$("#lat1").val();
        var lng = $("#lng1").val();
        var cat1 = $("#veg").val();
        var story = $("#story1").val();
        var city_id = $("#city-id").val();
        var myData = 'name='+ name + '&address='+ address + '&lat='+ lat + '&lng='+ lng + '&type1='+ cat1 + '&story='+ story+ '&city_id='+ city_id;
         // console.log(cat);

         if(name==''||address==''||city_id=='')
		    {
		    alert("Please Fill All Fields");
		    }
		    else
		    {
           $.ajax({
             type: "POST",
             url: "<?php echo get_template_directory_uri(); ?>/template-parts/update.php/",
             data: myData,
             cache: false,
             success: function(result){
             	document.getElementById("edit-modal").innerHTML = result;
             	$('#btnUpdate').hide();

                // console.log(result);
             }
        });
       }
       return false;
          
	});
})
</script>


<!-- script for delete -->
		<script>

function deleteUser(id){
	document.getElementById('del-id').value =id;
}


	    	function deleteUser1(str) {
	    		console.log(str);
				document.getElementById("edit-modal").innerHTML = '';
				var url = "http://localhost/hotel/database/";
			    if (str == "") {
			        document.getElementById("del-response").innerHTML = "";
			        return;
			    } else { 
			        if (window.XMLHttpRequest) {
			            // code for IE7+, Firefox, Chrome, Opera, Safari
			            xmlhttp = new XMLHttpRequest();
			        } else {
			            // code for IE6, IE5
			            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			        }
			        xmlhttp.onreadystatechange = function() {
			            if (this.readyState == 4 && this.status == 200) {
			                document.getElementById("del-response").innerHTML = this.responseText;
			                document.getElementById("btn-yes").style.display = 'none';
			                document.getElementById("btn-no").style.display = 'none';
			               
			            }
			            else{
			            	document.getElementById("del-response").innerHTML = this.responseText;
			            }
			        };
			        xmlhttp.open("GET","http://localhost/research/delete/?q="+str,true);//put your site url and specify the database file.
			        xmlhttp.send();
			    }
			}
	    </script>




 <?php } 

add_shortcode('adding_map','add_map');


 ?>
<?php 
/*
*Plugin Name: Frontend Map Post
*Description: This is a map location which specific locate the post of each location
*Author: Gopal & Kundan by goigi
*/

//registering javascript and css
function map_init_method() {

wp_register_style ('mystyle1', plugins_url ( 'css/style.css', __FILE__ ) );
wp_enqueue_style('mystyle1');
wp_register_script('myscript', plugins_url ( 'js/myscript.js', __FILE__ ));
wp_enqueue_script('myscript'); 
if(is_page('vegan-details')){
wp_register_script('jquerymin', plugins_url ( 'js/jquery.min.js', __FILE__ ));
wp_enqueue_script('jquerymin'); 
}
  
}
add_action('init', 'map_init_method');
add_action('admin_menu', 'frontent_map');
function frontent_map(){
    add_menu_page(__('Frontend Map Post', 'menu-map'), __('Frontend Map Post', 'menu-map'), 'manage_options', 'vegan-details', 'vegan_details',plugin_dir_url( __FILE__ ) . 'images/cityscape.png');
    add_submenu_page('vegan-details', 'Show Vegan', 'show vegan', 'manage_options', 'show-vegan','show_vegan' );
    add_submenu_page('vegan-details', 'Create vegan', 'create vegan', 'manage_options','create-vegan','create_vegan' );
}
function vegan_details(){ ?>

<style type="text/css">
	* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
  color: #333;
}

table {
  text-align: left;
  line-height: 40px;
  border-collapse: separate;
  border-spacing: 0;
  border: 2px solid #ed1c40;
  width: 100%;
  margin: 50px auto;
  border-radius: .25rem;
}

thead tr:first-child {
  background: #ed1c40;
  color: #fff;
  border: none;
}

th:first-child,
td:first-child {
  padding: 0 15px 0 20px;
}

thead tr:last-child th {
  border-bottom: 3px solid #ddd;
}

tbody tr:hover {
  background-color: rgba(237, 28, 64, .1);
  cursor: default;
}

tbody tr:last-child td {
  border: none;
}

tbody td {
  border-bottom: 1px solid #ddd;
}

td:last-child {
  text-align: right;
  padding-right: 10px;
}

.button {
  color: #aaa;
  cursor: pointer;
  vertical-align: middle;
}

.edit:hover {
  color: #0a79df;
}

.delete:hover {
  color: #dc2a2a;
}

/* fallback */
@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: local('Material Icons'), local('MaterialIcons-Regular'), url(https://fonts.gstatic.com/s/materialicons/v21/2fcrYFNaTjcS6g4U3t-Y5ZjZjT5FdEJ140U2DJYC3mY.woff2) format('woff2');
}

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}


/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 26px;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 50%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
.model-form01{width:50%; margin:0 auto;}
.model-form01 input { width: 100%; margin:10px;}
.model-form01 textarea { width: 100%;}
.model-form01 button { background: #ff0000; color:#fff; padding: 10px 15px; border: 0px; transition: .5s; cursor: pointer;}
.model-form01 button:hover { background: green;  }

</style>
 
	<table>
  <thead>
    <tr>
      <th colspan="15">Frontend Show map</th>
    </tr>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Address</th>
      <th>latitude</th>
      <th>longitude</th>
      <th>Type</th>
      <th colspan="2">Story</th>
    </tr>
  </thead>
  <tbody>
  <?php global $wpdb;  
	$results = $wpdb->get_results( "SELECT * FROM markers" ); 
 	foreach ($results as $result) { 

  ?> 
    <tr id="row<?php echo $result->id;?>">
      <td><?php echo $result->id;?></td>
      <td><?php echo $result->name;?></td>
      <td><?php echo $result->address;?></td>
      <td><?php echo $result->lat;?></td>
      <td><?php echo $result->lng;?></td>
      <td><?php echo $result->cat;?></td>
      <td><?php echo $result->story;?></td>
      <td>
        <i class="material-icons button edit" onclick="edit(<?php echo $result->id;?>)">edit</i>
        <i class="material-icons button delete" id="delete_button<?php echo $result->id;?>" onclick="delete_row('<?php echo $result->id;?>');">delete</i>
      </td>
    </tr>
    <?php  } ?> 
  </tbody>
</table>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Modal Header</h2>
    </div>
    <div class="modal-body">
 	<div class="model-form01" id="edit-fomr">
      <div class="form-control">
      <input type="text" name="address" value="">
      </div>
      <div class="form-control">
      <input type="text" name="address" value="">
      </div><div class="form-control">
      <input type="text" name="address" value="">
      </div><div class="form-control">
      <input type="text" name="address" value="">
      </div>
      <div class="form-control">
      <input type="text" name="address" value="">
      </div>
	</div>

    </div>
    <div class="modal-footer">
    <div class="model-form01" id="data-update"><button>Update</button></div>
      
    </div>
  </div>

</div>

<script>
jQuery.noConflict();
// script for edit
function edit(id){
	document.getElementById("edit-fomr").innerHTML = '';
		var url = "http://localhost/hotel/database/";
	    if (id == "") {
	        document.getElementById("edit-fomr").innerHTML = "";
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
	                document.getElementById("edit-fomr").innerHTML = this.responseText;
	                console.log('ok');
	            }
	            else{
	            	document.getElementById("edit-fomr").innerHTML = this.responseText;
	            }
	        };
	        xmlhttp.open("GET","http://localhost/isavedasoulwp/fetch/?q="+id,true);//put your site url and specify the database file.
	        xmlhttp.send();
	    }
					    // Get the modal
		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		// btn.onclick = function() {
		    modal.style.display = "block";
		// }

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
}
// script for update

jQuery(document).ready(function(){
jQuery('#data-update').click(function(){
	console.log('data-update fired');
	 	var name =jQuery("#title1").val();
        var address =jQuery("#address1").val();
        var lat =jQuery("#lat1").val();
        var lng = jQuery("#lng1").val();
        var cat1 = jQuery("#veg").val();
        var story = jQuery("#story1").val();
        var city_id = jQuery("#city-id").val();
        var myData = 'name='+ name + '&address='+ address + '&lat='+ lat + '&lng='+ lng + '&type1='+ cat1 + '&story='+ story+ '&city_id='+ city_id;
         // console.log(cat);

         if(name==''||address==''||city_id=='')
		    {
		    alert("Please Fill All Fields");
		    }
		    else
		    {
           jQuery.ajax({
             type: "POST",
             url: "<?php echo get_template_directory_uri(); ?>/template-parts/update.php/",
             data: myData,
             cache: false,
             success: function(result){
             	document.getElementById("edit-fomr").innerHTML = result;
             	jQuery('#data-update').hide();

                // console.log(result);
             }
        });
       }
       return false;
          
	});
})

// script for delete
function delete_row(id) {
	console.log('delete_row fired');
            var lnk = "http://localhost/isavedasoulwp/delete";
            if(confirm("Are you sure you want to delete this Record?")){
                jQuery.ajax
                ({
                    type:'post',
                    url:lnk,
                    data:{
                        delete_row:'delete_row',
                        row_id:id
                    },
                    success:function(data) {
                            jQuery("#row" + id).remove();
                    }
                });
            }
        }

</script>

<?php }


function create_vegan(){ ?>	
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
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.27&key=AIzaSyBYwzmTe-P960g7bRYKItyxa2zSLzqc9B8&callback=initialize">
</script>

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



<?php }



function show_vegan(){ 
 ?>
 
<div id="map" style="position:initial; margin-left:130px; height:400px;margin-top: 20px; width: 76%;"></div>
                      
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.27&key=AIzaSyBYwzmTe-P960g7bRYKItyxa2zSLzqc9B8&callback=initMap">
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
          downloadUrl('http://localhost/isavedasoulwp/database/', function(data) {
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
     
 <?php } ?>
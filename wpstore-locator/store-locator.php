<?php
/*
*Template Name: Sote Locator
*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Store Locator</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--   <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script> -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js "></script> -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/myscript.js"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYwzmTe-P960g7bRYKItyxa2zSLzqc9B8&callback=initialize">
    </script>

	<style type="text/css">
		html, body, #map_canvas { margin: 0; padding: 0; height: 100% }
		#cform{
			display: none;
		}
    #map_canvas{
      text-align: center;
      margin:20px 0px 0px 30px; 
      width: 60%;height: 60%;
    }
    .jumbotron {
background: #358CCE;
color: #FFF;
border-radius: 0px;
}
.jumbotron-sm { padding-top: 24px;
padding-bottom: 24px; }
.jumbotron small {
color: #FFF;
}
.h1 small {
font-size: 24px;
}
	</style>
</head>
<body>

<!-- <input type="text" id="address" size="30"><br>
<input type="text" id="lat" size="10">
<input type="text" id="lng" size="10"> -->

<div class="container">
<div id="cform">
    <div class="row">
        <div class="col-md-8">
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
                       <!--  <button type="submit" class="btn btn-primary pull-right" id="btn_sub">
                            Map Your Kiss</button> -->
                    </div>
                </div>
                </form>
                <div id="msg"></div>
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
                
            </div>
        </div>
        <div class="col-md-4">
        
            
        </div>
    </div>
</div>
</div>
<div id="map_canvas" ></div>




<script type="text/javascript">
      var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

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
      }
      google.maps.event.addDomListener(window, 'load', initialize);


</script>
 

</body>
</html>
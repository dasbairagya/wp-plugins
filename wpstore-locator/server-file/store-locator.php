<?php
/*
*Template Name: Sote Locator
*/
get_header();
?>

	<style type="text/css">
		html, body, #map_canvas { margin: 0; padding: 0; height: 100% }
		#cform{
			display: none;
		}
    #map_canvas{
      text-align: center;
      margin:20px 0px 0px 30px; 
      width: 60%;
      height: 80%;
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
.well.well-sm {
    width: 890px;
    margin-left: 128px;
}
	</style>
<div id="primary" class="container" style="height:100%">


  
    
        <div class="row">
        <div id="cform">
            <div class="well well-sm" style="margin-top:20px">
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
                            <textarea name="story" id="story" class="form-control" rows="6" cols="25" 
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
                
                
            </div>
        </div>
        </div>
          <div class="row">
     <!--<div class="col-md-12">-->
        <div id="map_canvas" style="position:initial; height:400px;margin-top: 20px; margin-left:130px; width:76%"></div>
            
        </div>
       
    
</div>


</div>
<?php get_footer();?>



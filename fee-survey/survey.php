<?php 
/*
*Plugin Name: Fee survey
*Description: Fee Survey is simple fees update plugin made by goigi.com
*Author: Gopal Dasbairagya
*/

//registering javascript and css
function map_init_method() {

wp_register_style ('mystyle1', plugins_url ( 'css/create_student.css', __FILE__ ) );
wp_enqueue_style('mystyle1'); 
if(is_page('fee-survey')){
wp_register_script('jquerymin', plugins_url ( 'js/jquery.min.js', __FILE__ ));
wp_enqueue_script('jquerymin'); 
}
  
}
add_action('init', 'map_init_method');
add_action('admin_menu', 'update_fee_survey');
function update_fee_survey(){
    add_menu_page(__('Fee Survey', 'menu-map'), __('Fee Survey', 'menu-map'), 'manage_options', 'fee-survey', 'fee_survey',plugin_dir_url( __FILE__ ) . 'images/tution.png');

    add_submenu_page('fee-survey', 'Create Student', 'create student', 'manage_options','create-student','create_student');
     }

function fee_survey(){ ?>

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
    border: 5px solid #00c4ff;
    width: 100%;
    margin: 50px auto;
    border-radius: .25rem;
    background: rgba(196, 196, 196, 0.42);
}
table th {
    text-transform: uppercase;
}
thead tr:first-child {
    background: #006799;
    color: #fff;
    border: none;
}

th:first-child,
td:first-child {
  padding: 0 15px 0 20px;
}

thead tr:last-child th {
  border-bottom: 3px solid rgb(0, 196, 255);
}

tbody tr:hover {
    background-color: rgba(0, 196, 255, 0.42);
    cursor: default;
}
i.material-icons.button.edit {
    background: #fafafa;
    border-color: #006799 !important;
    color: #006799;
    position: relative;
    top: 6px;
}

i.material-icons.button.delete {
    position: relative;
    top: 6px;
    background: #fafafa;
    border-color: #006799 !important;
    color: #006799;
}
tbody tr:last-child td {
  border: none;
}

tbody td {
  border-bottom: 1px solid #00c4ff;
}

/*td:last-child {*/
/*  text-align: right;*/
/*  padding-right: 10px;*/
/*}*/

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
    background-color: #006799;
    color: white;
}
.modal-header h2 {
    color: #fff;
}
.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #006799;
    color: white;
}
.model-form01{width:50%; margin:0 auto;}
.model-form01 input { width: 100%; margin:10px;}
.model-form01 textarea { width: 100%;}
.model-form01 button { 
background: #00c4ff;
    color: #fff;
    padding: 10px 15px;
    border: 0px;
    transition: .5s;
    cursor: pointer;
}
.model-form01 button:hover { background: #0089ff;  }
/*STYLE FOR LOADER*/
.circle {
    display:none;
  background-color: rgba(0,0,0,0);
  border:5px solid #139613;
  opacity:.9;
  border-right:5px solid rgba(0,0,0,0);
  border-left:5px solid rgba(0,0,0,0);
  border-radius:50px;
  box-shadow: 0 0 15px #21e72b; 
  width:50px;
  height:50px;
  margin:0 auto;
  -moz-animation:spinPulse 1s infinite ease-in-out;
  -webkit-animation:spinPulse 1s infinite linear;
}
#circle1 {
    display:none;
  background-color: rgba(0,0,0,0);
  border:5px solid rgba(0,183,229,0.9);
  opacity:.9;
  border-left:5px solid rgba(0,0,0,0);
  border-right:5px solid rgba(0,0,0,0);
  border-radius:50px;
  box-shadow: 0 0 15px #2187e7;  
  width:30px;
  height:30px;
  margin:0 auto;
  position:relative;
  top:-40px;
  -moz-animation:spinoffPulse 1s infinite linear;
  -webkit-animation:spinoffPulse 1s infinite linear;
}

@-moz-keyframes spinPulse {
  0% { -moz-transform:rotate(160deg); opacity:0; box-shadow:0 0 1px #2187e7;}
  50% { -moz-transform:rotate(145deg); opacity:1; }
  100% { -moz-transform:rotate(-320deg); opacity:0; }
}
@-moz-keyframes spinoffPulse {
  0% { -moz-transform:rotate(0deg); }
  100% { -moz-transform:rotate(360deg);  }
}
@-webkit-keyframes spinPulse {
  0% { -webkit-transform:rotate(160deg); opacity:0; box-shadow:0 0 1px #2187e7; }
  50% { -webkit-transform:rotate(145deg); opacity:1;}
  100% { -webkit-transform:rotate(-320deg); opacity:0; }
}
@-webkit-keyframes spinoffPulse {
  0% { -webkit-transform:rotate(0deg); }
  100% { -webkit-transform:rotate(360deg); }
}
</style>
 
	<table>
  <thead>
    <tr>
      <th colspan="15">Fee Survey of 2017-18 </th>
    </tr>
    <tr>
      <th>Sl.NO</th>
      <th>Student Name</th>
      <th>Month</th>
      <th>FeesAmount</th>
      <th>Status</th>
      <th>Email</th>
      <th class="action">Action</th>
    </tr>
  </thead>
  <!-- <div id="fee_status"></div> -->
  <tbody>
  <?php global $wpdb;  
	$results = $wpdb->get_results( "SELECT * FROM fee_survey" ); 
 	foreach ($results as $result) { 
   $std_id= $result->id;

  ?> 
    <tr id="row<?php echo $result->id;?>">
      <td><?php echo $result->id;?></td>
      <td><?php echo $result->name;?></td>
      <!-- <td><?php echo $result->month;?></td> -->
      <td><select id="selMonth<?php echo $result->id;?>" onchange="selectMonth(this.value,<?php echo $std_id;?>)" >
        <option value="Jan">Jan</option>
        <option value="Feb">Feb</option>
        <option value="Mar">Mar</option>
        <option value="Apr">Apr</option>
        <option value="May">May</option>
        <option value="Jun">Jun</option>
        <option value="Jul">Jul</option>
        <option value="Aug">Aug</option>
        <option value="Sep">Sep</option>
        <option value="Oct">Oct</option>
        <option value="Nov">Nov</option>
        <option value="Dec">Dec</option>
      </select></td>
      <?php $queries = $wpdb->get_results( "SELECT * FROM survey_month WHERE std_id=$std_id");
      ?>
      <td id="fee_amount<?php echo $std_id;?>"><?php echo $queries[0]->amount;?></td>
      <td id="fee_status<?php echo $std_id;?>"><?php echo $queries[0]->status;?></td>
   
      <td><?php echo $result->email;?></td>
      
      <td>
        <i class="material-icons button edit" onclick='edit(<?php echo $std_id;?>,document.getElementById("selMonth<?php echo $std_id;?>").value);'>edit</i>
        <i class="material-icons button delete" id="delete_button<?php echo $result->id;?>" onclick="delete_row(<?php echo $result->id;?>);">delete</i>
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
      <h2>Student Details:</h2>
    </div>
    <div class="modal-body">
 	<div class="model-form01" id="edit-fomr">
  
	</div>
  <div class="circle"></div>
    <div id="circle1"></div>
    </div>
    <div class="modal-footer">
    <div class="model-form01" id="data-update"><button>Update</button></div>
      
    </div>
  </div>

</div>

<script>
jQuery.noConflict();

// script for live month-pament fetching
function selectMonth(month,std_id){
  console.log("month="+month,"And student id="+std_id);
  console.log('response ok');
  
  if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
           xmlhttp.onreadystatechange = function() {
            
              if (this.readyState == 4 && this.status == 200) {
                var parts = this.responseText.split('|')
                console.log(parts);
                
                  document.getElementById("fee_status"+std_id).innerHTML = parts[0];
                  document.getElementById("fee_amount"+std_id).innerHTML = parts[1];
                  // console.log(responseText);
              }
              else{
             
             document.getElementById("fee_status"+std_id).innerHTML = "";
                  document.getElementById("fee_amount"+std_id).innerHTML = "";
              }
          };
          xmlhttp.open("GET","http://wp.goigi.biz/sunshinedaycare/month/?m="+month+"&std_id="+std_id,true);//put your site url and specify the database file.
          xmlhttp.send();
}

// script for edit
function edit(id,month){
    console.log("student id="+id,"And month="+month);
    
    document.getElementsByClassName('circle')[0].style.display = "block";
    document.getElementById('circle1').style.display = "block";
	document.getElementById("edit-fomr").innerHTML = '';
		
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
                document.getElementsByClassName('circle')[0].style.display = "none";
                    document.getElementById('circle1').style.display = "none";
	                document.getElementById("edit-fomr").innerHTML = this.responseText;
	                console.log('response ok');
	            }
	            else{
	            	document.getElementById("edit-fomr").innerHTML = this.responseText;
	            }
	        };
	        xmlhttp.open("GET","http://wp.goigi.biz/sunshinedaycare/fetch/?q="+id+"&month="+month,true);//put your site url and specify the database file.
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
  
 	    var uname =jQuery("#name1").val();
        var umonth =jQuery("#month1").val();
        var uamount =jQuery("#amount1").val();
        var ustatus = jQuery("#status1").val();
        var pemail = jQuery("#email1").val();
        var uid = jQuery("#std-id").val();
        var myData = 'uname='+ uname +'&pemail='+ pemail + '&umonth='+ umonth + '&uamount='+ uamount + '&ustatus='+ ustatus + '&uid='+ uid;
          console.log(uid,uname,umonth,uamount,ustatus,pemail);
         if(uname==''||umonth==''||uamount==''||ustatus==''||pemail=='')
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
           
               window.location = "<?php echo admin_url('admin.php?page=fee-survey', 'http' )?>";

                // console.log(result);
             }
        });
       }
       return false;
          
	});
});

// script for delete
function delete_row(id) {
	console.log('delete_row fired',id);
	
            var lnk = "<?php echo site_url();?>/delete";
            
            console.log(lnk);
            if(confirm("Are you sure you want to delete this Record?")){
                jQuery.ajax({
                    type:'post',
                    url:lnk,
                    data:{
                        delete_row:'delete_row',
                        row_id:id
                    },
                    success:function(data) {
                        console.log(data);
                            jQuery("#row" + id).remove();
                    }
                });
            }
        }

</script>

<?php }


function create_student(){ ?>	
<style type="text/css">
  
</style>
<div id="cform1">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="well well-sm">
           <form id="form-search">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="stu_cr" for="name">
                            Student Name</label>
                        <input type="text" class="form-control" name="std_name" id="std-name" placeholder="Enter Student Name Here"  />
                    </div>
                    <div class="form-group">
                        <label class="pr_cr" for="name">
                            parent's Email</label>
                        <input type="text" class="form-control" name="prnt_email" id="prnt_email" placeholder="Enter Parent's Email Here"  />
                    </div>
                  
                 <!--    <div class="form-group">
                        <label for="subject">
                            Months</label>
                        <select name="month" id="month" class="form-control" >
                            <option value="">Select a Month</option>
                            <option value="Jan">Jan</option>
                            <option value="Feb">Feb</option>
                            <option value="Mar">Mar</option>
                            <option value="Apr">Apr</option>
                            <option value="May">May</option>                    
                            <option value="Jun">Jun</option>                    
                            <option value="Jul">Jul</option>                    
                            <option value="Aug">Aug</option>                    
                            <option value="Sep">Sep</option>                    
                            <option value="Oct">Oct</option>                    
                            <option value="Nov">Nov</option>                    
                            <option value="Dec">Dec</option>                    
                            
                        </select>
                    </div>  
                </div>
              <div class="form-group">
                        <label for="name">
                            Amount</label>
                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Fees Amount Here"  />
                    </div>
                  <div class="form-group">
                        <label for="subject">
                            Status</label>
                        <select name="month" id="month" class="form-control" >
                            <option value="">Select Payment Status</option>
                            <option value="Paid">Paid</option>
                            <option value="Pending">Pending</option>
                        
                        </select>
                    </div> -->
                <div class="col-md-12">
                <input id="btn_subm" type="submit" name="submit" value="Add Student" class="btn btn-primary pull-right">
                  
                </div>
            </div>
            </form>
            <div id="msg"></div>
        </div>
    </div>      <!-- end col-md-offset-2 -->
</div>
</div><!-- end div id="cform"-->
	     
<!-- script for processing add location -->
<script>
     jQuery(document).ready(function(){
      jQuery("#btn_subm").click(function(){
        console.log("btn_subm fired");
        var name =jQuery("#std-name").val();
        var month =jQuery("#month").val();
        var amount =jQuery("#amount").val();
        var status = jQuery("#status").val();
        var pemail = jQuery("#prnt_email").val();
        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'name2='+ name + '&month2='+ month + '&amount2='+ amount + '&status2='+ status + '&pemail='+pemail;
        if(name==''||month==''||amount==''||status==''||pemail==''){
        alert("Please Fill All Fields"); 
        }
       else{

      jQuery.ajax({
             type: "POST",
             url: "<?php echo get_template_directory_uri(); ?>/template-parts/save.php/",
             data: dataString,
             cache: false,
             success: function(result){
                jQuery('#msg').html(result);
                document.forms['form-search'].reset();

                
             }
        });
     
    }
       return false;
       });
    });
    </script>


<?php } ?>

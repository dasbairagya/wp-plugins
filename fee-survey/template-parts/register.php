<?php
/**
 * Template Name: Register
 */
get_header(); 
$x=$_GET['x'];
?>
<div class="container">
    <div class="row">
        <div class="custom-margin">
        <div class="col-md-6 panel panel-danger" style="margin-top: 20px;">
                <div class="panel-heading">
                    <h3 class="panel-title">Registration Here</h3>
                    </div>
            <div class="panel-body">
                    <form id="signup-form"  method="post" class="s-form wow zoomInUp" data-wow-delay="0.5s">
                        <div class="form-group col-md-12">
                            <label class="control-label" for="name">Enter Name: </label>
                            <input type="text" placeholder="FULL NAME" value="" name="name" id="name" class="form-control"  />
                        </div>
                        <div class="form-group col-md-12">
                            <label class=" control-label" for="name">Email Address: </label>
                            <input type="email" placeholder="EMAIL ID" value="" name="email" id="email" class="form-control" />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label" for="name">Phone Number: </label>
                            <input type="number" placeholder="PHONE NO" value="" name="phone" id="phone" class="form-control" />
                            </div>
                        <div class="form-group col-md-12">
                            <label class=" control-label" for="name">Enter Password:</label>
                            <input type="password" placeholder="PASSWORD" value="" name="password" id="password" class="form-control" />
                            </div>
                        <input type="button" name="btn_submit" class="btn  btn-danger" id="btn_submit1" value="Submit" style="float:right;margin-right: 17px;background-color:#ee8323;border-color:#ee8323;border-radius:0px;">

                    </form>
            </div>
        </div>

        <div class="col-md-6 panel panel-danger" style=" margin-top: 20px;">
            <div class="panel-heading">
                <h3 class="panel-title">Login Here</h3>
            </div>
            <p style="color:red;margin-left:10px;margin-top:10px"><?php echo $x; ?><p>
            <form id="login" class="s-form wow zoomInUp" name="form" action="<?php echo home_url(); ?>/login/" method="post">
                <div class="form-group col-md-12">
                    <label class="control-label" for="name">Enter Email: </label>
                <input type="text" placeholder="Enter Username" value="" name="username" id="username" class="form-control" required/>
              </div>
                <div class="form-group col-md-12">
                    <label class="control-label" for="name">Enter Password: </label>
                <input type="password" placeholder="Password" value="" name="password" id="password" class="form-control" required/>
              </div>
                    <input id="submit" class="btn btn btn-danger" type="submit" name="submit" value="Login" style="float:right;margin-right: 17px;margin-bottom: 10px;background-color:#ee8323;border-color:#ee8323;border-radius:0px;">
            </form>


                <!--                                                 <label for="chk" style="color:#026466">-->
                <p style="float:right;margin-right:10px;"><input type="checkbox" id="chk1" style="height:12px;margin-top:10px;width:20px;"><span style="margin-left:5px;">Forgot Password?</span></p>


            <div class="col-md-12" id="list1">
                <form name="lostpasswordform" id="lostpasswordform" action="<?php echo wp_lostpassword_url(); ?>" method="post">
                    <p>
                        <label class="control-label" for="name" style="color:#888;">Username or E-mail:<br>   </label>
                        <input type="text" name="user_login" id="user_login" class="form-control" value=""  placeholder="Username or E-mail" required>
                    </p>
                    <input type="hidden" name="redirect_to" value="<?php echo $redirect ?>">

                        <input type="submit" name="wp-submit" id="wp-submit" class="btn btn btn-danger" value="Get New Password"  style="float:right;margin-bottom: 10px;background-color:#ee8323;border-color:#ee8323;border-radius:0px;">
                </form>
            </div>

        </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<script>
    $(function () {
        // Get the form fields and hidden div
        var checkbox = $("#chk1");
        var hidden = $("#list1");
        hidden.hide();
        checkbox.change(function () {
            if (checkbox.is(':checked')) {
                hidden.show();
            } else {
                hidden.hide();
                // $("#list").val("");
            }
        });
    });
</script>

<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
<script type="text/javascript">
    $(function() {
        $('#btn_submit1').click(function() {
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var password = $('#password').val();
            if (name == "") {
                swal(" Full Name is a required field");
                return false;
            }
            if (email == "") {
                swal("Email is a required field");
                return false;
            }
            if (phone == "") {
                swal("Phone is a required field");
                return false;
            }
            if (password == "") {
                swal("Password is a required field");
                return false;
            }
            var data = {
                'action': 'create_user',
                'name': name,
                'email': email,
                'phone': phone,
                'password': password
            };
            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: data,
                success: function (response) {
                	swal(response, "Thank you for connecting with us!", "success");
                    // swal(response);
                    $("#signup-form")[0].reset();
                   
                },
                error: function (data) {
                	swal("Oops...", "Something went wrong!", "error");
                	// console.log(data);
                    // alert(response);
                    $("#signup-form")[0].reset()
                },
            });
        });
    });
</script>
jQuery.noConflict();
jQuery('.fliper-btn').click(function(){

    jQuery('.flip').find('.card').toggleClass('flipped');
});

// jQuery("#bg-click").click(function(){
//   alert(1);
//   if(jQuery('#bg-click').is(":checked"){
//       jQuery("#alrl-bg").show();
//     }
//   else{
//       jQuery("#alrl-bg").hide();
//     }
    
// });
function valueChanged(){
    if(jQuery('#bgclick').is(":checked"))   
        jQuery("#alrlbg").show();
    else
        jQuery("#alrlbg").hide();
}

function on() {
    document.getElementById("overlay").style.display = "block";
     document.getElementById("loadersmall").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("loadersmall").style.display = "none";
}

function forgot(){
  document.getElementById("login-form").style.display = "none";
  document.getElementById("list1").style.display = "block";
}
function back_to_login(){
  document.getElementById("login-form").style.display = "block";
  document.getElementById("list1").style.display = "none";
}
function back_to_reg(){
  document.getElementById("login-form").style.display = "none";
  document.getElementById("register-form").style.display = "block ";
}

// The "Upload" button
jQuery('.upload_image_button').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;
    var button = jQuery(this);
    wp.media.editor.send.attachment = function(props, attachment) {
        jQuery(button).parent().prev().attr('src', attachment.url);
        jQuery(button).prev().val(attachment.id);
        wp.media.editor.send.attachment = send_attachment_bkp;
    }
    wp.media.editor.open(button);
    return false;
});

// The "Remove" button (remove the value from input type='hidden')
jQuery('.remove_image_button').click(function() {
    var answer = confirm('Are you sure?');
    if (answer == true) {
        var src = jQuery(this).parent().prev().attr('data-src');
        jQuery(this).parent().prev().attr('src', src);
        jQuery(this).prev().prev().val('');
    }
    return false;
});


// script for profile page    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                jQuery('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    jQuery(".file-upload").on('change', function(){
        readURL(this);
    });

jQuery('.fliper-btn').click(function(){
    jQuery('.flip').find('.card').toggleClass('flipped');
});
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

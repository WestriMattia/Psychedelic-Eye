// Get the modal
var lmodal = document.getElementById("login-modal");
var rmodal = document.getElementById("register-modal");
var sideNav = document.getElementById("mySidenav");
var sideNav2 = document.getElementById("mySidenav2");

// Get the button that opens the modal
var lbtn = document.getElementById("login-button");

// Get the <span> element that closes the modal
var lspan = document.getElementsByClassName("lclose")[0];

// When the user clicks on the button, open the modal
lbtn.onclick = function() {
  lmodal.style.display = "block";
  rmodal.style.display = "none";
  sideNav.style.width = "0";
  sideNav2.style.width = "0";
}

// When the user clicks on <span> (x), close the modal
lspan.onclick = function() {
  lmodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == lmodal) {
    lmodal.style.display = "none";
  }
}
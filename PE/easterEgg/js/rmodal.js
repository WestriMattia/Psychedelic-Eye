// Get the modal
var rmodal = document.getElementById("register-modal");
var lmodal = document.getElementById("login-modal");
var sideNav =document.getElementById("mySidenav");

// Get the button that opens the modal
var rbtn = document.getElementById("register-button");

// Get the <span> element that closes the modal
var rspan = document.getElementsByClassName("rclose")[0];

// When the user clicks on the button, open the modal
rbtn.onclick = function() {
  rmodal.style.display = "block";
  lmodal.style.display = "none";
  sideNav.style.width = "0";
}

// When the user clicks on <span> (x), close the modal
rspan.onclick = function() {
  rmodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == rmodal) {
    rmodal.style.display = "none";
  }
}
/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

var taglia = document.getElementById('taglia');
var qta = document.getElementById('quantita');

taglia.addEventListener('change', function(){
  fetch("http://localhost:81/disponibilita.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: ``
  })
})
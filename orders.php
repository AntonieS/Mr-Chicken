<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "tut");
 require('connect.php');
if (isset($_POST['username']) and isset($_POST['password'])){

$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = md5($_POST['password']);

$query = "SELECT * FROM `login` WHERE username='$username' and password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){
$_SESSION['username'] = $username;
}else{

$fmsg = "Invalid Login Credentials.";
}
}

if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
}else{
}

?>


<!DOCTYPE html>
<html>
<title>Mr Chicken - Orders</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body onload="startTime()">
<!-- Navbar -->
<div class="w3-top w3-right">
  <div class="w3-bar color w3-card-2 w3-right">
    <a class="w3-hover-black w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#home" class=" w3-hover-black w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">HOME</a>
    <a href="#avatar" class=" w3-hover-white w3-bar-item w3-button w3-hide-small w3-left"><img src="img/img_avatar2.png" class="w3-bar-item " style="width:50px "></a>
    <a href="#username" class=" w3-hover-white w3-bar-item w3-button w3-hide-small w3-left" style="padding-top: 12px; padding-left: 12px;"><?php echo $smsg = "Logged in as: " . $username . "";?></a>
	<a href="#time" class=" w3-hover-white w3-bar-item w3-button w3-padding-large w3-hide-small w3-left"><div id="txt"></div></a>
	<a href='logout.php' class=" w3-hover-white w3-bar-item w3-button w3-hide-small w3-left" style="padding-top: 12px; padding-left: 5px;"><?php echo "Logout";?></a>
</p>
   </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class=" w3-bar-block color w3-hide w3-hide-large w3-hide-medium w3-top w3-right" style="margin-top:46px">
  <a href="#avatar" class=" w3-hover-white w3-bar-item w3-button w3-hide-small w3-left"><img src="img/img_avatar2.png" class="w3-bar-item " style="width:50px "></a>
    <a href="#username" class=" w3-hover-white w3-bar-item w3-button w3-hide-small w3-left" style="padding-top: 12px; padding-left: 12px;"><?php echo $smsg = "Logged in as: " . $username . "";?></a>
	<a href="#time" class=" w3-hover-white w3-bar-item w3-button w3-padding-large w3-hide-small w3-left"><div id="txt"></div></a>
	<a href='logout.php' class=" w3-hover-white w3-bar-item w3-button w3-hide-small w3-left" style="padding-top: 12px; padding-left: 5px;"><?php echo "Logout";?></a>

</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:0px">

  <!-- The Menu Section -->
  <div class="w3-black" id="menu">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h3 class="w3-wide w3-center">Current Orders</h3>
	  
		<table class="w3-table w3-border">
			<tr>
				<td>Order #</td>
				<td>Name</td>
				<td>Surname</td>
				<td>Order Type</td>
				<td>Time In</td>
				<td>Time Out</td>
				<td>Completed</td>
			</tr>
			<tr>
				<td>1</td>
				<td>Jo</td>
				<td>Jones</td>
				<td>Burger + Chips</td>
				<td>7:15</td>
				<td>7:25</td>
				<td>Yes</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Phil</td>
				<td>Low</td>
				<td>Strips</td>
				<td>8:12</td>
				<td>8:20</td>
				<td>Yes</td>
			</tr>
			<tr>
				<td>3</td>
				<td>Rob</td>
				<td>Thomas</td>
				<td>500ml Coke</td>
				<td>8:35</td>
				<td>8:36</td>
				<td>Yes</td>
			</tr>
		</table>
	</div>
  </div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <a href="https://www.facebook.com/MrChickenEmpangeni/?ref=br_rs" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></a></i>
  <a href="https://www.instagram.com/mr_chicken_empangeni/" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></a></i>
  <p class="w3-medium">Developed by Antonie Sander</p>
</footer>

<script>
//Current date and time 
//time
function startTime() {
    var today = new Date();
	var d = today.getDate();
	var mnt = today.getMonth();
	var y = today.getFullYear();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    d + "/" + mnt + "/" + y + " || " + h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

//date
function myFunction() {
    var d = new Date();
    var n = d.toLocaleDateString();
    document.getElementById("demo").innerHTML = n;
}

// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>

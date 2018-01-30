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
<title>Mr Chicken</title>
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
    <a href="#contact" class="w3-hover-black w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">CONTACT</a>
    <a href="#about" class=" w3-hover-black w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">ABOUT</a>
    <a href="#menu" class=" w3-hover-black w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">MENU</a>
    <a href="#home" class=" w3-hover-black w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">HOME</a>
  <button onclick="document.getElementById('id01').style.display='block'" class=" w3-hover-black w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">CART</button>

  <div id="id01" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>CURRENT CART</h2>
      </header>
      <div class="table-responsive">
		<table class="table table-bordered">
			<tr>
				<th width="40%">Product Name</th>
				<th width="10%">Quantity</th>
				<th width="20%">Price Details</th>
				<th width="15%">Order Total</th>
				<th width="5%">Action</th>
			</tr>
			<?php
			if(!empty($_SESSION["cart"]))
			{
				$total = 0;
				foreach ($_SESSION["cart"] as $keys => $values) 
				{
					?>
					<tr>
						<td>
							<?php echo $values["item_name"]; ?>
						</td>
						<td><?php echo $values["item_quantity"]?></td>
						<td>R <?php echo $values["product_price"]; ?></td>
						<td>R <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></td>
						<td><a href="shop.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="text-danger">X</span></a></td>
					</tr>

					<?php
					$total = $total + ($values["item_quantity"] * $values["product_price"]);
				}
				?>
				<tr>
				<td colspan="3" align="right">Total</td>
				<td align="right">R <?php echo number_format($total, 2); ?></td>
				<td></td>
				</tr>
				<?php	
			}
			?>
		</table>
	</div>
      <footer class="w3-container w3-teal">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>
    <a href="#avatar" class=" w3-hover-white w3-bar-item w3-button w3-hide-small w3-left"><img src="img/img_avatar2.png" class="w3-bar-item " style="width:50px "></a>
    <a href="#username" class=" w3-hover-white w3-bar-item w3-button w3-hide-small w3-left" style="padding-top: 12px; padding-left: 12px;"><?php echo $smsg = "Logged in as: " . $username . "";?></a>
	<a href="#time" class=" w3-hover-white w3-bar-item w3-button w3-padding-large w3-hide-small w3-left"><div id="txt"></div></a>
	<a href='logout.php' class=" w3-hover-white w3-bar-item w3-button w3-hide-small w3-left" style="padding-top: 12px; padding-left: 5px;"><?php echo "Logout";?></a>
	
</p>
   </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class=" w3-bar-block color w3-hide w3-hide-large w3-hide-medium w3-top w3-right" style="margin-top:46px">
  <a href="#home" class="w3-hover-black w3-bar-item w3-button w3-padding-large">HOME</a>
  <a href="#menu" class="w3-hover-black w3-bar-item w3-button w3-padding-large">MENU</a>
  <a href="#about" class="w3-hover-black w3-bar-item w3-button w3-padding-large">ABOUT</a>
  <a href="#contact" class="w3-hover-black w3-bar-item w3-button w3-padding-large">CONTACT</a>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:0px">

<!-- Background Images -->
  <div class="w3-display-container w3-center" id="home">
    <img src="img/back.jpeg" style="width:100%">
	<div class="center w3-display-container w3-center"><img src="img/heroT.png" style="width:100%"></div>
  </div>

  <!-- Info Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h3 class="w3-wide">WE DON'T CUT CORNERS, WE ONLY REMOVE FEATHERS.</h3>
    <p class="w3-opacity"><i>Customers can expect fresh food all day long as we do not compromise on quality.</i></p>
    <div class="w3-row w3-padding-32">
      <div class="w3-third">
		<i class="fa fa-cutlery"></i>
        <h4>Fresh Food?</h4>
		<p>Yes please</p>
      </div>
      <div class="w3-third">
	  <i class="fa fa-money"></i>
        <h4>Affordable Prices?</h4>
		<p>Of course</p>
      </div>
      <div class="w3-third">
	  <i class="fa fa-thumbs-o-up"></i>
        <h4>Satisfied Clients?</h4>
		<p>Always</p>
      </div>
    </div>
  </div>

  <!-- The Menu Section -->
  <div class="w3-black" id="menu">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h3 class="w3-wide w3-center">MENU</h3>
      <p class="w3-opacity w3-center"><i>While stocks last!</i></p><br>
      <?php
	$query = "SELECT * FROM products ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while ($row = mysqli_fetch_array($result)) 
		{
			?>
			<table class="w3-table w3-border">
				<form method="post" action="shop.php?action=add&id=<?php echo $row["id"];?>">
				<tr>
				<td class="text-info"><?php echo $row["p_name"];?></td>
				<td class="text-danger">R <?php echo $row["price"]; ?></td>
				<td><input type="text" name="quantity" class="form-control" value="1"></td>
				<td><input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>"></td>
				<td><input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>"></td>
				<td><button type="submit" name="add" class="w3-button w3-teal w3-small" value="Add to Cart">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
				</form>
			</table>
			<?php
		}
	}
	?>
	<div style="clear: both"></div>
	<!--
		<table class="w3-table w3-border">
			<tr>
				<td>Burger + Chips</td>
				<td>R 30.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>Add Cheese</td>
				<td>R 4.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>Chicken Piece</td>
				<td>R 14.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>4 Twings + Chips</td>
				<td>R 25.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>4 Strips + Sauce</td>
				<td>R 30.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>5 Nuggets + Sauce</td>
				<td>R 30.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td class="menuColor">TOASTED SANDWICHES</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Chicken & Mayo</td>
				<td>R 25.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>Cheese & Tomato</td>
				<td>R 20.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td class="menuColor">COMBOS</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>1 Pce Chicken & Chips</td>
				<td>R 18.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>2 Pce Chicken & Chips + Roll</td>
				<td>R 30.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>4 Pce Chicken & Chips</td>
				<td>R 50.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>9 Pce Chicken & Large Chips</td>
				<td>R 110.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>15 Pce Chicken & 2 Large Chips</td>
				<td>R 175.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td class="menuColor">FRIES</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Small</td>
				<td>R 10.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>Russian</td>
				<td>R 15.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>Hot Dog</td>
				<td>R 10.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>Large</td>
				<td>R 20.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td class="menuColor">BEVERAGES</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Coke Cans</td>
				<td>R 10.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>Buddy 500ml</td>
				<td>R 11.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>Water 500ml</td>
				<td>R 9.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td class="menuColor">EXTRAS</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Rolls</td>
				<td>R 2.50</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td>Clover Cheese 25g</td>
				<td>R 5.00</td>
				<td><button class="w3-button w3-teal w3-small">Add to cart</button></td>
				<td><button class="w3-button w3-red w3-small"><i class="fa fa-heart" aria-hidden="true"></i></button></td>
			</tr>
			<tr>
				<td class="menuColor">*PLATTERS PREPARED ON REQUEST*</br></br>*INDIAN CUISINE AVAILABLE ON SELECTED DAYS*</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		-->
	</div>
  </div>
  
  <!-- About Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="about">
    <h3 class="w3-wide">HOW OUR EGG WAS HATCHED</h3>
    <p class="w3-opacity">Mr. Chicken began when the owner, Mr. Kishen Singh was on college break back home in Empangeni and realized that he would not be doing much during this time, 
	usually students go out and find jobs for some extra pocket money but Mr. Singh couldn’t do this as, <i>“I was the job. I was the boss”</i> he said.</br></br>
	The idea of finding a job did not excite him but the idea of running his own business and providing jobs gave him a rush!
	Viewing the small town of Empangeni he searched for what was lacking and soon realized that it was a food outlet that prepared 
	fresh food on demand at an affordable price that attracted not one specific market but rather any individual looking to give their 
	taste buds a great deal of satisfaction.</br></br>
	Knowing exactly what he wanted Mr. Singh confided his business plans with a close friend whom was already a well-established business man 
	which saw potential in the idea and provided the capital needed for start-up.</br> After that Mr. Singh sourced out the necessary equipment, 
	many hours of research and a few motivated individuals to set in motion his dream fried chicken joint.</br></br>
	<i>“It is not easy working in the kitchen all day long, at Mr. Chicken we work with smiles and our quality never falls.” – Kishen Singh, 
	Owner & Founder of Mr. Chicken</i></br></br>
	Three months later, he finds himself owning a business that holds endless growth potential as no one else has taken on this kind of 
	core food, fried chicken.</p>
    <h3></h3>
  </div>
  <div class="w3-blue">
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="contact">
    <h3 class="w3-wide">CONTACT US</h3>
    <div class="w3-row w3-padding-32">
      <div class="w3-third">
		<i class="fa fa-phone"></i>
        <h4>Call Us</h4>
		<p>035 787 0548<p>
      </div>
      <div class="w3-third">
	  <i class="fa fa-envelope-o"></i>
        <h4>Email Us</h4>
		<p>Coming Soon</p>
      </div>
      <div class="w3-third">
	  <i class="fa fa-map-marker"></i>
        <h4>Find Us</h4>
		<p>1 Steelway @ Shell Garage (Next To Aqua Tap) Empangeni Rail</p>
      </div>
    </div>
  </div>
  </div>
 
<!-- End Page Content -->
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

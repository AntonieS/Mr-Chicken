<?php
session_start();
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
header("refresh:0;url=welcome.php") ;

//echo $smsg = "Hi " . $username . " ";
//echo "This is the Members Area";
//echo "<a href='welcome.php'>welcome</a>";


 
}else{
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Login in PHP & MySQL </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
        <link rel="stylesheet" href="styles.css" >
 
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    <body>

    <!-- Background Images -->
  <div class="w3-display-container w3-center" id="home">
    <img src="img/backS.jpg" style="width:100%">

    <div class="center w3-display-container w3-center">

    <form class="form-signin" method="POST">
      <a class="btn" style="color: white" href="index.html">back to home page</a>
        <h2 class="form-signin-heading" style="color: white">Please Login</h2>
        <div class="input-group">
           <span class="input-group-addon" id="basic-addon1">@</span>
           <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
          
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
          
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: yellow; color: black">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="register.php" style="background-color: yellow; color: black">Register</a>
      </form>

      </div>
  </div>

    <div class="container">
        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?></div> 
        <?php } ?>
        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?></div> 
        <?php } ?>
        
     
        </div>
    </body>
</html>
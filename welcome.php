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
header( "refresh:2;url=signedInIndex.php" );

}else{
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
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
      
        <h2 class="form-signin-heading" style="color: white"><?php echo $smsg = "Welcome back  " . $username . " !";?></h2> 

      </div>

  </div>
    </body>
</html>
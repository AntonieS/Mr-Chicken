<?php
require_once('connect.php');
if(isset($_POST) & !empty($_POST)){
    
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = md5($_POST['password']); 
    $sql = "INSERT INTO `login` (username, email, password) VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($connection, $sql);
    if($result){
        $smsg = "user Registration successful";
    }else{
        $fmsg = "user registration failed";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Registration in PHP & MySQL </title>
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
        <h2 class="form-signin-heading" style="color: white">Please Register</h2>
        <div class="input-group">
           <span class="input-group-addon" id="basic-addon1">@</span>
           <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>

        <label for="inputEmail" class="sr-only">Email Address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email Address" required autofocus>
          
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
          
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: yellow; color: black">Register</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php" style="background-color: yellow; color: black">Login</a>
      </form>

      </div>

      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?></div> 
        <?php } ?>
        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?></div> 
        <?php } ?>

  </div>
    </body>
</html>
<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?version=3">
    <link rel="stylesheet" href="./bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <title>Login Form</title>
</head>

<body>
    <div class="main1" style="margin:40px auto;height:65vh;">
    <form method="post">
      <h1 id="main">SIGN IN</h1>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <h5>Don't have an account? <a href="index.php">Sign up</a></h5>
        <?php
         if(isset($_POST['submit']))
         {
           $email=$_POST['email'];
           $pass=$_POST['pass'];
           $emailverify="SELECT * FROM `registration` WHERE `email` LIKE '$email' AND `pass` LIKE '$pass'";
           $query=mysqli_query($con,$emailverify);
           $emailcount=mysqli_num_rows($query);
           if($emailcount>0)
           {
               header('location:./website1/index.html');
           }
           else
           {
            ?>
            <script>
              alert("PLease Enter valid entry..");
          </script>
        <?php
           }
         }
   
        ?>
        <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
      </form>
    </div>
 
</body>
</html>
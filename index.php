<?php

include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?version=3">
    <link rel="stylesheet" href="./bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <title>Sign in</title>
</head>

<body>
    <div class="main1">
    <form method="post">
      <h1 id="main">SIGN UP</h1>
      <div class="row">
        <div class="col-md-6">
          <label for="firstname">First name</label>
          <input type="text" name="fname" class="form-control" placeholder="First name" required>
        </div>
        <div class="col-md-6">
          <label for="lastname">Last name</label>
          <input type="text" name="lname" class="form-control" placeholder="Last name" required>
        </div>
      </div>
      
      <div class="form-group">
        <label for="exampleInputPassword1">Mobile Number</label>
        <input type="phnno" name="phone" class="form-control"  placeholder="Mobile number" required>
      </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Confirm Password</label>
          <input type="password" name="cpass" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
         
        </div>
        <h5>Already registered? <a href="login.php">Sign in</a></h5>
        <?php
      if(isset($_POST['submit']))
      {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $phnno=$_POST['phone'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $cpass=$_POST['cpass'];
        $emailverify="SELECT * FROM `registration` WHERE `email` LIKE '$email'";
        $query=mysqli_query($con,$emailverify);
        $emailcount=mysqli_num_rows($query);

        if($emailcount>0)
        {
          ?>
          <script>
            alert("Email exists already");
        </script>
      <?php
        }
        else
        {
          if($pass==$cpass)
          {
            $insert="INSERT INTO `registration` (`srno`, `fname`, `lname`, `email`, `phn`, `pass`, `cpass`) VALUES (NULL, '$fname', '$lname', '$email', '$phnno', '$pass', '$cpass')";
            $res=mysqli_query($con,$insert);
            if($res)
            {
              ?>
                  <script>
                    alert("Register Successfully");
                </script>
              <?php
            
            }
            else
            {
              ?>
              <script>
                alert("Not Register Successfully");
            </script>
          <?php
            }
          }
          else
          {
            echo "Password not matching..";
          }
        }
      
      }
    ?>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
 
</body>
</html>
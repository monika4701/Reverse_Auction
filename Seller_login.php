<?php
 session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/Form.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Seller Login</title>
  </head>
  <body>
    <div class="container">
        <h3>Seller Login</h3>
        <div class="card">
            <img src="undraw_profile.svg" alt="" class="card-img-top">
            <div class="form-group">
            <form action="" method="post">
                <label for="uname">User Name:</label>
                <input type="text" name="uname" class="form-control">
                <label for="pwd">Password:</label>
                <input type="password" name="pwd" class="form-control">
                <button type="submit" name="submit" class="btn btn-primary submit">Sign In</button>
            </form> 
            </div>
            
        </div>
        <h6>New to this?<a href="Seller_Signup.html">Sign Up</a></h6>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<?php
include('connection.php');
if(isset($_POST['submit'])){
    $uname=$_POST['uname'];
    $password=$_POST['pwd'];
    $query=mysqli_query($connection,"select * from seller_login where Uname='$uname' and Password='$password'");
    if($query){
        if(mysqli_num_rows($query)>0){
            $_SESSION['uname']=$uname;
            header('location:Seller_Dashboard.php');
            
        }
        else{
            echo "<script> alert('Invalid Username or Password');</script>";
        }
    }
}
?>
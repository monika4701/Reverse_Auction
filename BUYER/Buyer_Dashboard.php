<?php
session_start();
if ( $_SESSION['uname']==true) {
  # code...
}else
header('location:Buyer_login.php');
$page=$_GET['C_Name'];
include('Buyer_Structure.php');
?>
 <main class="col-md mx-auto mt-2 ms-sm-auto col-lg-9 text-center">
        <div class="container text-center">
        <h1> <b>Welcome Back <?php echo $_SESSION['uname'];?></b></h1>
            <hr class="col-sm-5 mx-auto">
        </div>
        <?php
          include('connection.php');
          $cname=$_GET['C_Name'];
          $query=mysqli_query($connection,"Select * from items where C_Name='$cname'");
          if(mysqli_num_rows($query)>0){
          while($row=mysqli_fetch_array($query)){?>
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img height="150" width="150"src="../img/<?php echo $row['img_fname']?>" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><b><?php echo $row['name'];?></b></h5>
                    <p class="card-text"><b><?php echo $row['description']?>.</b></p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
          <?php            
          }}
          else{?>
          <div class="card bg-danger">
              <div class="card-body">
                <i><?php echo"No Products Available"?></i>
              </div>
          </div>
        <?php
          }
        ?>
</main>

 <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  -->
</body>
</html>
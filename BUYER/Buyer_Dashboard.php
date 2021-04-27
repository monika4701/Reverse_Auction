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
        <h1> <b>Welcome Back <i><?php echo $_SESSION['uname'];?></i></b></h1>
            <hr class="col-sm-5 mx-auto">
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
          include('connection.php');
          if($_GET['C_Name']=='none'){
            $query=mysqli_query($connection,"Select * from items");
            while($row=mysqli_fetch_array($query)){?>
              
                <div class="col">
                  <div class="card shadow h-100">
                    <img src="../img/<?php echo $row['img_fname']?>" height=200 class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['name'];?></b></h5>
                      <p class="card-text"><?php echo $row['description'];?></b></p>
                    </div>
                    <div class="card-footer">                      
                      <div class="d-grid gap-2">
                        <button type="button" class="btn btn-info">Bid</button>
                      </div>
                    </div>

                  </div>
                </div>
              
            <?php }
          }
           else{
          $cname=$_GET['C_Name'];
          $query=mysqli_query($connection,"Select * from items where C_Name='$cname'");
          if(mysqli_num_rows($query)>0){
          while($row=mysqli_fetch_array($query)){?>
                          <div class="col">
                  <div class="card shadow h-100">
                    <img src="../img/<?php echo $row['img_fname']?>" height=200 class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['name'];?></b></h5>
                      <p class="card-text"><?php echo $row['description'];?></b></p>
                    </div>
                    <div class="card-footer">                      
                      <div class="d-grid gap-2">
                        <button type="button" class="btn btn-info">Bid</button>
                      </div>
                    </div>

                  </div>
                </div>
                
          <?php            
          }}
          else{?>
          </div>
          <div class="card bg-danger my-5">
            <div class="card-body ">
              <i><?php echo"No Products Available"?></i>
            </div>
          </div>
         

          </div>
        <?php
          }}
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
<?php
session_start();
if ( $_SESSION['uname']==true) {
  # code...
}else
header('location:Buyer_login.php');
$page=$_GET['C_Name'];
include('Buyer_Structure.php');
?>
 <main class="col-md mx-auto mt-2 ms-sm-auto col-lg-9">
        <div class="container text-center">
        <h1> <b>Welcome Back <i><?php echo $_SESSION['uname'];?></i></b></h1>
            <hr class="col-sm-5 mx-auto">
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 my-3">
        <?php
          include('connection.php');
          if($_GET['C_Name']=='none'){
            $query=mysqli_query($connection,"Select * from items order by name");
            $c=0;
            while($row=mysqli_fetch_array($query)){
              $c=$c+1;
              ?>
              
                <div class="col">
                  <div class="card shadow h-100">
                    <img src="../img/<?php echo $row['img_fname']?>" height=200 class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['name'];?></b></h5>
                      <p class="card-text"><?php echo $row['C_Name'];?></b></p>
                      <p class="card-text"><?php echo $row['description'];?></b></p>
                    </div>
                    <div class="card-footer">                      
                      <div class="d-grid gap-2">
                      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#i<?php echo$c?>">View</button>
                        <!-- Modal -->
                        <div class="modal fade" id="i<?php echo$c?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <div class="card-body">
                              <form method="post">
                              <div class="container-sm">
                                <img src="../img/<?php echo $row['img_fname']?>" class="img-thumbnail" alt="...">
                              </div>
                              <input type="number" style="display:none"class="form-control text-right" name="id" value="<?php echo $row['id']?>">
                                <h5 class="card-title"><b>Name: </b><?php echo $row['name'];?></h5>
                                <p class="card-text"><b>Category: </b><?php echo $row['C_Name'];?></p>
                                <p class="card-text"><b>Description: </b><?php echo $row['description'];?></p>
                                
                                <div class="form-group">
                                  <label for="" class="control-label"><b>Bid Amount</b></label>
                                  <input type="number" class="form-control text-right" name="bid_amount" >
                                </div>
                              </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit"class="btn btn-success">Bid</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              
            <?php }
          }
           else{
          $cname=$_GET['C_Name'];
          $query=mysqli_query($connection,"Select * from items where C_Name='$cname' order by name ");
          $w=0;
          if(mysqli_num_rows($query)>0){
          while($row=mysqli_fetch_array($query)){
            $w=$w+1;
            ?>

                          <div class="col">
                  <div class="card shadow h-100">
                    <img src="../img/<?php echo $row['img_fname']?>" height=200 class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['name'];?></b></h5>
                      <p class="card-text"><?php echo $row['C_Name'];?></b></p>
                      <p class="card-text"><?php echo $row['description'];?></b></p>
                    </div>
                    <div class="card-footer">                      
                      <div class="d-grid gap-2">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#c<?php echo $w;?>">View</button>
                        <!-- Modal -->
                        <div class="modal fade" id="c<?php echo $w?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="card-body">
                                <div class="container-sm">
                                  <img src="../img/<?php echo $row['img_fname']?>"  class="img-thumbnail" height=100 alt="...">
                                </div>
                                
                                  <h5 class="card-title"><b><?php echo $row['name'];?></b></h5>
                                  <p class="card-text"><b><?php echo $row['C_Name'];?></b></p>
                                  <p class="card-text"><b><?php echo $row['description'];?></b></p>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>


                
          <?php            
          }}
          else{?>
          </div>
          <div class="card bg-danger my-3">
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
<?php
  include('connection.php');
  if(isset($_POST['submit'])){
    $bid=$_POST['bid_amount'];
    $id=$_POST['id'];
    $uname=$_SESSION['uname'];
    if($bid>0){

      $check=mysqli_query($connection,"Select * from bids where product_id =$id and uname='$uname'");
      if(mysqli_num_rows($check)>0){
        echo "<script> alert('Your bid already placed')</script>";
      }
      else{
      $query=mysqli_query($connection,"INSERT INTO `bids`(`product_id`, `bid_amount`,`uname`) VALUES ($id,$bid,'$uname')");
      if($query){
        echo "<script> alert('Bid Placed')</script>";
      }
    }
    }
    else{
      echo "<script> alert('Please Fill the bid amount')</script>";
    }
  }
?>
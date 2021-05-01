<?php
session_start();
if ( $_SESSION['uname']==true) {
  # code...
}else
header('location:Seller_login.php');
$page='Bids';
include('Seller_Structure.php');
?>
 <main class="col-md mx-auto mt-2 ms-sm-auto col-lg-9">
        <div class="container text-center">
        <h1> <b>Bids on your product</b></h1>
            <hr class="col-sm-5 mx-auto">
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-sm">
            <thead class="table-dark">
              <tr class="text-center">
              <th>SNo.</th>
                <th>Product</th>
                <th>Name</th>
                <th>Bid Amount</th>
                <th>Status</th>
                <th>Details</th>
              </tr>
            </thead>
            <tbody>
            <?php
                include('connection.php');
                $index=1;
                $uname=$_SESSION['uname'];
                $query=mysqli_query($connection,"SELECT * FROM `bids`,`items` WHERE seller_name='$uname' and items.id=bids.product_id");
                while($row=mysqli_fetch_array($query)){
            ?>
              <tr>
                <td  class="text-center" ><?php echo $index; $index++;?></td>
                <td  class="text-center" ><?php echo "Name : ".$row['name'];?></td>
                <td  class="text-center" ><?php echo $row['uname'];?></td>
                <td  class="text-center" ><?php echo $row['bid_amount'];?></td>
                <td  class="text-center" ><?php echo $row['uname'];?></td>
                <td>
                    <!-- Button trigger modal -->
                    <div class="text-center">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $index?>">
                    Details
                    </button>
                </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $index?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-left">
                            <?php
                                include('connection.php');
                                $uname=$row['uname'];
                                $details_query=mysqli_query($connection,"select * from buyer_login where Uname='$uname'");
                                $detail=mysqli_fetch_array($details_query);?>
                                <p><b>Name:</b><?php echo $detail['Uname'];?></p>
                                <p><b>Email:</b><?php echo $detail['Email'];?></p>
                                <p><b>Contact Number:</b><?php echo $detail['Phone_number'];?></p>
                        </div>
                        </div>
                    </div>
                    </div>
                </td>
                <!-- Button trigger modal -->


              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
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
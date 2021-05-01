<?php
session_start();
include("connection.php");
if ( $_SESSION['uname']==true) {
  # code...
}else
header('location:Seller_login.php');
$page='Categories';
include('Seller_Structure.php');
?>
    <main class="col-md mx-auto mt-2 ms-sm-auto col-lg-9 text-center">
        <div class="container text-center">
            <h2><b>Categories</b></h2>
            <hr class="col-sm-5 mx-auto">
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-sm">
            <thead class="table-dark">
                <tr><th colspan="6"><a href="Add_Category.php" style="margin-bottom:1%"><i style="padding:0.4rem"class="fa fa-plus"></i>Add Category</a> </th></tr>   
              <tr>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php
                include('connection.php');
                $query=mysqli_query($connection,"select * from pcategories");
                while($row=mysqli_fetch_array($query)){
            ?>
              <tr>
                <td><?php echo $row['C_Name'];?></td>
                <td><button class="btn"><b><a style="color:#2ecc71"href="Edit_Category.php?Id=<?php echo $row['C_Id']; ?>"><i title="Edit"class="far fa-edit"></i></a></b></td>
                <td><button class="btn"><b><a style="color:#e74c3c"href="Delete_Category.php?Id=<?php echo $row['C_Id']; ?>" ><i title="Delete"class="far fa-trash"></i></a></b></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>

      </main>
    </div>
    </div>
    
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
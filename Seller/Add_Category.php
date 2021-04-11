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
            <h2><b>Add Categories</b></h2>
            <hr class="col-sm-5 mx-auto">
        </div>
        <form method="post" name="categoryform" onsubmit=" return validateform() ">
            <div class="form-group">
                <label> Category:</label>
                <input type="text" placeholder="Enter Category Name " name="category" class="form-control">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
        </form>
        <script>
            function validateform() {
                var x = document.forms['categoryform']['category'].value;
                if (x == "") {
                    alert('Category Must Be Filled Out !');
                    return false;
                }
            }
        </script>
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
<?php
include('connection.php');
if (isset($_POST['submit'])) {   
    $category_name=$_POST['category'];
    $query = mysqli_query($connection,"select * from pcategories where C_Name='$category_name' ");
    if (mysqli_num_rows($query)>0) {
        echo "<script> alert('Category Name Already Be taken !!')</script>";
    exit();
    }
    $query=mysqli_query($connection,"insert into pcategories(C_Name)values('$category_name')");
    if($query){
        echo "<script> alert('Category Add Successfully')</script>";
        header('location:Categories.php');
    }else{
        echo "<script> alert('Please try Again')</script>";
    }
 }
?>
<?php
session_start();
if ( $_SESSION['uname']==true) {
  # code...
}else
header('location:Seller_login.php');
$page='Items';
include('Seller_Structure.php');
?>
 <main class="col-md mx-auto mt-2 ms-sm-auto col-lg-9">
        <div class="container text-center">
        <h1> <b>Add Item</b></h1>
            <hr class="col-sm-5 mx-auto">
        </div>
        <div class="form-control">
        <form method="post">            
            <div class="mb-3">
                <label for="" class="form-label">Item Name</label>
                <input type="text" name="item_name" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Item Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="input-group-text">
                <select class="form-select form-select-sm" name="category"aria-label=".form-select-sm ">
                <?php
                    include('connection.php');
                    $query=mysqli_query($connection,"select * from pcategories");
                    while($row=mysqli_fetch_array($query)){
                    ?>
                    <option value="<?php echo $row['C_Name'];?>"><?php echo $row['C_Name'];?></option>
                        <?php } ?>
                </select>   
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label my-2">Item Image</label>
                <input class="form-control" name="img" type="file" id="formFile">
            </div>
            <input class="form-control btn btn-success" name="submit" type="submit" value='Submit'>
        </form>
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
<?php
include('connection.php');
if(isset($_POST['submit'])){
    $item_name=$_POST['item_name'];
    $category_name=$_POST['category'];
    $description=$_POST['description'];
    $img=$_POST['img'];
    $query=mysqli_query($connection,"Insert into items (name,description,C_Name,img_fname) values('$item_name','$description','$category_name','$img')");

    if($query){
        echo "<script> alert('Added Successfully')</script>";
        header('location:Items.php');
    }else{
        echo "<script> alert('Please try Again')</script>";
    }
}
?>
<?php
 include('connection.php');
 $id=$_GET['Id'];
 $query=mysqli_query($connection,"delete  from pcategories where C_Id='$id'");
  if ($query) {
  	echo "<script> alert('Category deleted !')</script> ";
  	echo "<script >window.location='http://localhost:8080/Reverse_Auction/Seller/Categories.php' ;</script>";

  }else{
  	echo "Please Try again";
  }


?>
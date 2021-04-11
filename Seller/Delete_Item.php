<?php
 include('connection.php');
 $id=$_GET['Id'];
 $query=mysqli_query($connection,"delete  from items where id='$id'");
  if ($query) {
  	echo "<script> alert('Item deleted !')</script> ";
  	echo "<script >window.location='http://localhost/Reverse_Auction/Seller/Items.php' ;</script>";

  }else{
  	echo "Please Try again";
  }


?>
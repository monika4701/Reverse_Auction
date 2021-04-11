<?php

session_start();
session_destroy();
header('location:Buyer_Dashboard.php');

?>
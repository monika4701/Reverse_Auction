<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<!-- font family -->
<link rel="stylesheet" href="Categories.css">
<!-- /font-family -->
    <title>Buyer</title>
  </head>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
    #sidebarMenu ul{
      height: 98vh;
    }
    *{
    padding:0;margin:0;
    }
    body{
      font-family: Arial, Helvetica, sans-serif;
    }
    
    header{
      background-image: radial-gradient(#18dcff 5%, #3498db 105%,#2980b9  10%);


    }
    nav{
      background-color:
    }
      
      a {color:black}
      a:hover{
        color:white
      }
         li {

            margin: 10px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: black;            
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
          }

          li:hover {
            background-position: right center;background-color:skyblue;color:white;            text-decoration: none;
          }        
          table thead{
            background-color:#20bf6b
          }
          .fa-trash{
            color:#e74c3c
          }
  </style>
  <body>
      <header class="p-3 mb-0 border-bottom bg-light">
        <button class="navbar-toggler position-absolute d-md-none collapsed col-sm-auto me-sm-auto justify-content-center mb-md-0" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""><i class="fas fa-bars"></i></span>
        </button>
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          </a>
          
          <ul class="nav col-12 col-sm-auto me-lg-auto justify-content-center mb-md-0">
            <h3 class="text-center"><b>Reverse Auction</b></h3>
          </ul>
          
          <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="undraw_profile.svg" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" ><?php echo $_SESSION['uname'];?> </a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="Logout.php">Sign out</a></li>
            </ul>
          </div>
        </div>
      </div>
    </header>

    <div class="container-fluid">
      <div class="row">
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar text-center collapse">
    <div class="2pt-3">
      <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item ">
          <a class="nav-link my-3 <?php if($page=='none'){echo 'active';} ?>" aria-current="page" href="Buyer_Dashboard.php?C_Name=none">
          All
          </a>
        </li> 
      <?php
       include('connection.php');
       $query=mysqli_query($connection,"select * from pcategories");
       while($row=mysqli_fetch_array($query)){?>
        <li class="nav-item ">
          <a class="nav-link my-1 <?php if($page==$row['C_Name']){echo 'active';} ?>" aria-current="page" href="Buyer_Dashboard.php?C_Name=<?php echo $row['C_Name'];?>">
          <?php echo $row['C_Name'];?>
          </a>
        </li> 
        <?php } ?>
      </ul>
    </div>
  </nav>
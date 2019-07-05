<?php 
ob_start();

session_start();
// to check user can have access to this page
if (!isset($_SESSION['mycaregiverid'])) {
  // redirect to login page
  header("Location: http://localhost/getcare/login.php");
  exit;
}
 ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>GetCaregiver | <?php echo $pagetitle; ?></title>
        <meta name="description" content="Official website of getCaregiver we are #1 website for all caregivers in nigeria where families/companies get to hire experienced caregivers for their loved ones or elderly">
        <meta name= 'keywords' content='caregiver,care,nurse,health,hospital,clinic,home health, lagos Nigeria,'>
        <meta name='author' content='Adesanya Olanrewaju'>
        
        <!-- Place favicon.ico in the root directory -->

        <link rel='stylesheet' href='fonts/css/all.css'>
        <link rel="shortcut icon" type="image/png" href="medfavicon.ico">

        <!-- External Css link and Bootstrap -->

        <link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.css'>
        <link rel="stylesheet" type="text/css" href="css/project.css">

        <style type="text/css">
          a{
            color: black;
          }

          #display{
                  position: absolute;
                 width: 440px;
                                
                background-color: white;
                z-index: 10;
            }

          h1,h2,h3,h4,h5,h6,th,b{
            color: rgb(0,64,128);
            font-family:Tahoma;

          }

          p,label,td{
            color: rgb(0,128,128); 
            font-size:16px; 
            font-family: verdana;
          }

        </style>
       
    </head>
    <body>

      
        
          <div class="container-fluid">
<div class="row">
                <div class="col-md-5">
                <nav class="navbar navbar-expand-md navbar-light" >
            <a class="navbar-brand log" href="dashboardemployee.php" ><i style="color:rgb(128,255,0);">get</i><i style="color: rgb(0,64,128);">Caregiver</i></a>
          </nav>
            </div>
                    <div class="col-md-7">
                        <nav class="navbar navbar-expand-md navbar-light" >
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                       </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav" >
                        <li class="nav-item">
                          <a class="nav-link" href="dashboardemployee.php" style='color:white; background-color: rgb(0,64,128); '><i class="fas fa-home"></i> My Dashboard</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="joblisting.php" style='color:white; background-color: rgb(0,64,128);'> <i class="fas fa-search"></i> Job Search</a>
                        </li>
                         <li class="nav-item dropdown">
                            <div class="input-group-mb-3">
                            <div class="input-group-prepend">
                            <a class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; background-color: rgb(0,64,128);"><?php echo $_SESSION['caregiver_fname']; ?></a>
                            <div class="dropdown-menu">
                                 <a class="dropdown-item" href="#"><i class="fas fa-envelope"></i> <?php echo $_SESSION['caregiver_email']; ?></a>
                                 <a class="dropdown-item" href="dcaregiver2.php"><i class="fas fa-user"></i> Profile</a>
                                 
                                 <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                            </div> 
                        
                         </div>
                     </div>
                         </li>
             <li class="nav-item">
                            <a class="nav-link" href="#" style='color:black;'><?php 

          //var_dump($_SESSION); 
          if (empty($_SESSION['profilephoto'])) {
          ?>
          <img src="images/avatar.png" alt="profile photo" class="img-fluid" width="30" height="30" > 
          
        <?php
            }else{
          ?>
          <img src="<?php echo $_SESSION['profilephoto'] ?> " class="img-fluid rounded-circle" style=" border-radius: 5px; width: 40px; height: 30px;" alt="profile photo">
        <?php
          }
          ?></a>
                         </li>
                      </ul>
                    </div>
                 </nav>
                  </div>

             </div>
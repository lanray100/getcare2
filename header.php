<?php session_start(); ?>
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

          h1,h2,h3,h4,h5,h6,th{
            color: rgb(0,64,128);
            font-family:Tahoma;

          }

          p,label,td{
            color: rgb(0,128,128); 
            font-size:17px; 
            font-family: verdana;
          }

        </style>
       
    </head>
    <body>
        
            <div class="container-fluid">
                
<nav class="navbar fixed-top navbar-expand-md navbar-light bg-info" >
						<a class="navbar-brand log" href="index.php" ><i style="color:rgb(128,255,0);">get</i><i style="color: rgb(0,64,128);">Caregiver</i></a>
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                       </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav" >
                        <li class="nav-item">
                          <a class="nav-link" href="index.php" style='color:white;'>Home</a>
                        </li>
						<li class="nav-item">
                          <a class="nav-link" href="employer.php" style='color:white;'>For Employers</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="caregiver.php" style='color:white;'>For Caregivers/Nurses</a>
                        </li>
                         <li class="nav-item dropdown">
                            <div class="input-group-mb-3">
                            <div class="input-group-prepend">
                            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign Up</button>
                            <div class="dropdown-menu">
                                 <a class="dropdown-item" href="employerform.php">For Employer</a>
                                 <a class="dropdown-item" href="caregiverform.php">For Caregiver/Nurses</a>
                            </div> 
                        
                         </div>
                     </div>
                         </li>
						 <li class="nav-item">
                            <a class="nav-link" href="login.php" style='color:white;'>Log In</a>
                         </li>

                         <li class="nav-item">
                            <a class="nav-link" href="employerform.php" style='color:white;'>Post a Job</a>
                         </li>
                      </ul>
                    </div>
                 </nav>
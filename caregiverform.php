                <?php 
                $pagetitle = "Sign Up";
                include ('userauth.php'); ?>
        		   <?php
                        include ('header.php');


                        $err_msg = array();

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            
                            $email = Authentication::sanitizeInput($_POST['emailaddress']);
                            $pswd = Authentication::sanitizeInput($_POST['password']);
                            $confirmpswd = Authentication::sanitizeInput($_POST['confirmpassword']);
                            $firstname = Authentication::sanitizeInput($_POST['fname']);
                            $lastname = Authentication::sanitizeInput($_POST['lname']);
                            $username = Authentication::sanitizeInput($_POST['username']);
                            $gender = Authentication::sanitizeInput($_POST['gender']);
                            




                            if (empty($firstname)) {
                                
                                $err_msg['fname'] = "<small class='form-text text-danger'>Firstname field is required</small>";

                            }
                            if (empty($lastname)) {
                                
                                $err_msg['lname'] = "<small class='form-text text-danger'>Lastname field is required</small>";

                            }
                            if (empty($username)) {
                                
                                $err_msg['username'] = "<small class='form-text text-danger'>Username field is required</small>";

                            }

                            if (empty($email)) {
                                
                                    $err_msg['emailaddress'] = "<small class='form-text text-danger'>Email Address Field is required*</small>";
                            }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    
                                    $err_msg['emailaddress'] = "<small class='form-text text-danger'>Incorrect Email Address!</small>";
                            }

                            if (empty($pswd) || empty($confirmpswd) ) {
                                    
                                    $err_msg['password'] = "<small class='form-text text-danger'>Password Fields are required*</small>";
                            }elseif (strlen($pswd) < 6 ) {
                                
                                $err_msg['password'] = "<small class='form-text text-danger'>Password is less than 6 minimum character!</small>";
                            }elseif ($pswd != $confirmpswd) {
                                $err_msg['password'] = "<small class='form-text text-danger'>Password did not match!</small>";
                            }
                        


                            // check if there is no error
                            if (count($err_msg) == 0) {
                                    
                                    $regobj = new Authentication;
                                    $regobj->registerCaregiver($lastname,$firstname,$username,$email,$pswd,
                                        $gender);
                                  
                            }
                            
                        }

                    ?>


                 <div class="container-fluid">
								<div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        
                               <form method='post' action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="for1">
                                <p style="font-size: 40px; color: rgb(0,64,128); text-align: center;">Caregiver/Nurse Registration</p>
                                <p align="center">Wants to be an employer instead?<a href="employerform.php" style="color: rgb(0,64,128);"> Click here</a> </p>
                                <p style="font-size: 60px; color: rgb(128,255,0); text-align: center;"><i class="fas fa-user-nurse"></i></p>
                                <small id="say1" style="color: red;"></small>
                                
                                        <div class="form-group">
                                            <label>Your Name</label>
                            <input type="text" class="form-control"  placeholder="First Name" name="fname" id="fname" value="<?php if(isset($_POST['fname'])){ echo $_POST['fname'];} ?>"><br>
                            <?php
                                                if (isset($err_msg['fname'])) {
                                                    echo $err_msg['fname'];
                                                }
                                            ?>
                            <input type="text" class="form-control"  placeholder="Last Name" name="lname" value="<?php if(isset($_POST['lname'])){ echo $_POST['lname'];} ?>" id="lname">
                            <?php
                                                if (isset($err_msg['lname'])) {
                                                    echo $err_msg['lname'];
                                                }
                                            ?>
                                    
                                    </div>
                                    <div class="form-group">
                                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])){ echo $_POST['username'];} ?>" id="user">
                            <?php
                                                if (isset($err_msg['username'])) {
                                                    echo $err_msg['username'];
                                                }
                                            ?>
                                    
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                            <input type="email" class="form-control" name="emailaddress" placeholder="Email Address" id="email" value="<?php if(isset($_POST['emailaddress'])){ echo $_POST['emailaddress'];} ?>">
                                    <small class="form-text text-danger"> </small>
                                    <?php
                                                if (isset($err_msg['emailaddress'])) {
                                                    echo $err_msg['emailaddress'];
                                                }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Create Password" id="pswd1" value="">
                                    <small class="form-text text-danger"> </small>
                                    
                                            </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" id="pswd2" value="">
                                    <small class="form-text text-danger" id="did"> </small>
                                    
                                            </div>
                                            <?php
                                                if (isset($err_msg['password'])) {
                                                    echo $err_msg['password'];
                                                }
                                            ?>
                            <div class="form-group">
                                            <label>Gender</label>
                                <input type="radio"  value="male" name="gender" <?php if(isset($_POST['gender']) && $_POST['gender'] =='male'){ echo 'checked'; } ?> />Male
                                <input type="radio"  value="female" name="gender" <?php if(isset($_POST['gender']) && $_POST['gender']=='female'){ echo 'checked' ;} ?> />Female
                                   
                                        </div>

                                    
                                <div class="form-group">
                                        <label>By registering you confirm that you accept the <a href='#' data-toggle="modal" data-target="#mode" style="color: rgb(0,64,128);">Terms & Conditions
                                            </a> and <a href="privacy.php" style="color: rgb(0,64,128);">Privacy Policy</a></label>
                                    </div>
                            <button type="submit" class="btn btn-success" style="margin-bottom: 20px;">Get Started</button>

                                    
                                </form>
                                    </div>
                                    <div class="col-md-3"></div> 
						  </div>	 
							</div>
                </div>

           <?php
                        include ('footer.php');

                    ?>

          <script type="text/javascript">
             
                $(document).ready(function(){
                    $("form").submit(function(e){
                        var email = $("#email").val();
                        var pswd = $("#pswd1").val();
                        var pass = $("#pswd2").val();
                        var name1 = $("#fname").val();
                        var name2 = $("#lname").val();
                        var user = $("#user").val();

                       
                    if ((name1 == "") || (name2 == "") || (user == "") )
                         {
                            $('#say1').html("Fill in the required fields*");

                            e.preventDefault(); 
                    }else if ((email =="") && (pass == "") && (pswd == "")){
                       
                       $('#say1').html("Fill in the required fields*");

                        e.preventDefault();
                    }

                    else if ((email!="" && pswd != "") && pass == ""){
                        $("#pswd2").css("border", "2px solid red");

                        e.preventDefault();
                    }else if (email!="" && pswd != pass){
                        $("#did").html("Password did not match");

                        e.preventDefault();
                    }

                    else if ((email!="" && pass != "") && pswd == ""){
                        $("#pswd1").css("border", "2px solid red");

                        e.preventDefault();
                    }

                    else if ((pswd!="" && pass != "") && email == ""){
                        $("#email").css("border", "2px solid red");

                        e.preventDefault();
                    }

                    else if ((pswd =="" && pass == "") && email != ""){
                        $("#pswd1").css("border", "2px solid red");
                        $("#pswd2").css("border", "2px solid red");

                        e.preventDefault();
                    }

                    else if ((email =="" && pass == "") && pswd != ""){
                        $("#email").css("border", "2px solid red");
                        $("#pswd2").css("border", "2px solid red");

                        e.preventDefault();
                    }

                    else if ((email =="" && pswd == "") && pass != ""){
                        $("#email").css("border", "2px solid red");
                        $("#pswd1").css("border", "2px solid red");

                        e.preventDefault();
                    }else{
                            alert('submit')
                        }

                    });
                });



         </script>
         
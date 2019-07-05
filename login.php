          <?php
          $pagetitle = "Log In";
                  include ('header.php');

                  include ('userauth.php');

                  $err_msg = array();
                  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                      
                      $email = $_POST['emailaddress'];
                      $pswd = $_POST['password'];

                      // validating email address

                      if (empty($email)) {

                          $err_msg['emailaddress'] = "<small class='form-text text-danger'>Email Address Field is required*</small>";

                      }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                          $err_msg['emailaddress'] = "<small class='form-text text-danger'>Incorrect Email Address!</small>";
                      }

                      // validating password

                      if (empty($pswd)) {

                        $err_msg['password'] = "<small class='form-text text-danger'>Password Field is required*</small>";

                      }elseif (strlen($pswd) < 6 ) {
                        
                        $err_msg['password'] = "<small class='form-text text-danger'>Password is less than 6 minimum character!</small>";
                      }

                      if (count($err_msg) == 0) {
                        // create authentication class object and make use of loginEmployer()
                                $authobj = new Authentication;

                                $get = $_POST['getcare'];

                              if ($get == 'employer') {
                                // reference login method
                                $output = $authobj->loginEmployer($email,$pswd);
                              }elseif($get == 'caregiver'){
                                // reference login method
                                $output = $authobj->loginCaregiver($email,$pswd);
                              }else{
                                 $result = "Choose either as an Employer or Caregiver";
                              }
                            
                      }
                  }

              ?>


                 <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
						   <img src="images/health3.jpg" class="d-block w-100" alt="images" id='images'>
						   <div class="carousel-caption d-md-block h-100 justify-content-center" >
                        <div class="row">
								              <div class="col-md-3"></div>
                              <div class="col-md-6">
                               <form method='post' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="for">
                                <p style="font-size: 40px;" class="sty">Login</p>
                                <?php
                                      if(isset($output)){ 
                                        echo $output;

                                        }
                                      ?>
                                        <div class="form-group">
                                            <label style="color: white">Email</label>
                            <input type="text" class="form-control" name="emailaddress" placeholder="Email/Username" id="user" value="<?php if(isset($_POST['emailaddress'])){ echo $_POST['emailaddress'];} ?>">
                                    <small id="say1" class="form-text text-danger"> </small>
                                    <?php
                                        if (isset($err_msg['emailaddress'])) {
                                              echo $err_msg['emailaddress'];
                                        }
                                    ?>
                                        </div>
                                        <div class="form-group">
                                            <label style="color: white">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" id="pswd" value="">
                                    <small id="say2" class="form-text text-light"></small>
                                      <?php
                                        if (isset($err_msg['password'])) {
                                              echo $err_msg['password'];
                                        }
                                    ?>
                                            </div>
                                          <div class="form-group" style="color: rgb(128,255,0);">
                                            <label style="color: white">Login as an </label>
                                <input type="radio"  value="employer" name="getcare"  />Employer Or
                                <input type="radio"  value="caregiver" name="getcare"  />Caregiver 
                                    </div>
                                    <div style="color: red;">
                                      <?php
                                        if (isset($result)) {
                                              echo $result;
                                        }
                                    ?>
                                        </div>
                                        <div>
                            <button type="submit" class="btn btn-success">Log In</button>
                                    </div>
                                </form>
                                  </div>
                                  <div class="col-md-3"></div> 
								        </div>
							</div>
						</div>
						
						
					</div>
				 
				</div>
        </div>
            <?php
                        include ('footer.php');

                    ?>

      


          <script type="text/javascript">
          
          $(document).ready(function(){

            $("form").submit(function(e){
              var username = $("#user").val();
              var pass = $("#pswd").val();

              if (username == "" && pass == "") {
                $("#user").css("border","2px solid red");
                $("#pswd").css("border","2px solid red");
                e.preventDefault();
            }else if (username == "" && pass != ""){
                 $("#user").css("border","2px solid red");
                 e.preventDefault();
            }else if (username != "" && pass == ""){
              $("#pswd").css("border","2px solid red");
              e.preventDefault();
            }else{
                $result = 'Submitted';
            }
                return $result;
            });

          });

        </script>

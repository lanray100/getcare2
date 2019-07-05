        

        <?php $pagetitle = "Edit Profile";

        include ('userauth.php'); ?>
        		   <?php
                        include ('demphead.php');

                        

                        $err_msg = array();

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                            //var_dump($_POST);
                            
                            $phone = Authentication::sanitizeInput($_POST['phonenumber']);
                            $city = Authentication::sanitizeInput($_POST['city']);
                            $stateid = Authentication::sanitizeInput($_POST['stateid']);
                            $employerid = Authentication::sanitizeInput($_REQUEST['employerid']);




                            if (empty($phone)) {
                                
                                $err_msg['phonenumber'] = "<small class='form-text text-danger'>Phone number field is required</small>";

                            }
                            if (empty($city)) {
                                
                                $err_msg['city'] = "<small class='form-text text-danger'>City field is required</small>";

                            }
                            if (empty($stateid)) {
                                
                                $err_msg['stateid'] = "<small class='form-text text-danger'>Choose a state </small>";

                            }
                        


                            // check if there is no error
                            if (count($err_msg) == 0) {
                                    
                                    $regobj = new Authentication;
                                   $output = $regobj->updateEmployer($phone,$city,$stateid,$employerid);
                                  
                            }
                            
                        }

                    ?>


                 <div class="container-fluid">
								<div class="row">
                                    <div class="col-md-3">
                                        
                                        <?php include_once ('sidedashboard.php'); ?>

                                    </div>

                                    <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                             <?php
                                        $empobj = new Authentication;
                                        $emp = $empobj->getEmployer($_SESSION['myemployerid']);

                                        // var_dump($emp);

                                        ?>
                                            <h1>Edit Profile</h1>
                                            <?php 
                                                if (isset($output)) {
                                                   
                                                   echo $output;
                                                }
                                             ?>
                               <form method='post' action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']."?employerid=".$_SESSION['myemployerid']); ?>" class="for1">
                                   
                                    <div class="form-group">
                                            <label>Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phonenumber" value="<?php if(isset($emp['employer_phone'])){ echo $emp['employer_phone'];} ?>">
                                <?php
                                                if (isset($err_msg['phonenumber'])) {
                                                    echo $err_msg['phonenumber'];
                                                }
                                            ?>
                                            </div>

                                    <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city" value="<?php if(isset($emp['employer_city'])){ echo $emp['employer_city'];} ?>" id="city">
                                            <?php
                                                if (isset($err_msg['city'])) {
                                                    echo $err_msg['city'];
                                                }
                                            ?>
                                    
                                            </div>

                                            <?php
                                                $stateobj = new Authentication;
                                                $state = $stateobj->getState();

                                                ?>
                                    
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">State</label>
                                            <select class="form-control" name="stateid" id="exampleFormControlSelect1">
                                                <option value="">Select a state</option>
                                                <?php
                                                    foreach ($state as $key => $value) {
                                                        $stateid = $value['state_id'];
                                                        $statename = $value['state_name'];
                                                        if ($_POST['stateid']) {
                                                        echo "<option value=\"$stateid\" selected='selected'>$statename</option>";

                                                    }else{
                                                        echo "<option value=\"$stateid\">$statename</option>";
                                                    }

                                                    }

                                                    ?>
                                                
                                          </select> 
                                          <?php
                                                if (isset($err_msg['stateid'])) {
                                                    echo $err_msg['stateid'];
                                                }
                                            ?>     
                                </div>
                                
                            <button type="submit" class="btn btn-success" style="margin-bottom: 20px;">Update</button>

                                    
                        </form>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                                    </div> 
						  </div>	 
							</div>
                </div>

           <?php
                        include ('dempfoot.php');

                    ?>

          <script type="text/javascript">
             
                $(document).ready(function(){
                    $("form").submit(function(e){
                        var email = $("#email").val();
                        var name1 = $("#fname").val();
                        var name2 = $("#lname").val();
                        var phone = $("#phone").val();
                        var city = $("#city").val();
                        var state = $("#exampleFormControlSelect1").val();

                    if ((name1 == "") || (name2 == "") || (phone == "") || (city == "") || (state== ""))
                         {
                            $('#say1').html("Fill in the required fields*");

                            e.preventDefault(); 
                        }

                    });
                });



         </script>
         
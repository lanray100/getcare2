                    <?php 
            $pagetitle = "Dashboard";

          include ('dcarehead.php');

                include ('userauth.php'); ?>

             <?php 
                $errmsg = "";
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                      
                  
                      $available = Authentication::sanitizeInput($_POST['available']);
                      $work = Authentication::sanitizeInput($_POST['work']);
                      $past = Authentication::sanitizeInput($_POST['past']);
                      $worktype = Authentication::sanitizeInput($_POST['worktype']);
                      $stateid = Authentication::sanitizeInput($_POST['stateid']);
                      $phone = Authentication::sanitizeInput($_POST['phonenumber']);
                      $verify = Authentication::sanitizeInput($_POST['identification']);
                      $idnumber = Authentication::sanitizeInput($_POST['idnumber']);
                      $city = Authentication::sanitizeInput($_POST['city']);
                      $caregiverid = Authentication::sanitizeInput($_REQUEST['caregiverid']); // from the query

                      if (empty($available) || empty($work) || empty($past) || empty($worktype) || empty($phone) || empty($verify) || empty($city) || empty($stateid) || empty($idnumber) ) {
                        $errmsg = "<small class='form-text text-danger'>Fill in the required input field</small>";
                      }

                      // checking if ther is no error
                      if (empty($errmsg)) {
                        
                        $detailsobj = new Authentication;
                        $output = $detailsobj->updateCaregiver($available,$past,$work,$worktype,$phone,$verify,
                          $city,$idnumber,$stateid,$caregiverid);

            

                      }
                      
              }

           ?>

             <div class="row">
                <div class="col-md-3">
                  <?php include ('sidedashcare.php');  ?>

                </div>

                <div class="col-md-9">
                      <?php
                      $detailsobj = new Authentication;
                      $careinfo = $detailsobj->getcaregiverDetails($_SESSION['mycaregiverid']);

                      ?>

                	
                      <div class="row">
                            <div class="col-12">
                              <?php 
                              if (isset($output)) {
                                echo $output;
                              }

                              ?>
                              <small id="say1" style="color: red;"></small>
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?caregiverid=".$_SESSION['mycaregiverid']); ?>">
                                  <?php
                                          if (isset($available) || isset($work) || isset($past) || isset($worktype) 
                                            || isset($phone) || isset($verify) || isset($city) || isset($stateid) ) {
                                            
                                            echo $errmsg;
                                          }
                                      ?>
                                    <div class="row">
                                  
                                <div class="col-md-6">
                                  <h5>Availability and Experience</h5> 
                                <div class="form-group">
                                <label>How many days are you available to work weekly</label><br>
                            <input type="text" class="form-control" id="avail" name="available" value="<?php if(isset($careinfo['caregiverinfo_available'])){ echo $careinfo['caregiverinfo_available'];} ?>">
                              </div>
                              <div class="form-group">
                            <label>Where do you work presently</label> <br>
                            <input type="text" class="form-control" id="avail1" name="work" value="<?php if(isset($careinfo['caregiverinfo_work'])){ echo $careinfo['caregiverinfo_work'];} ?>"> 
                              </div>
                            <h5>Previous Work Experience</h5>
                            <div class="form-group">
                            <label>What is the company/family name of your former employer</label><br>
                            <input type="text" class="form-control" id="avail2" name="past" value="<?php if(isset($careinfo['caregiverinfo_past'])){ echo $careinfo['caregiverinfo_past'];} ?>">
                          </div>
                          <div class="form-group">
                            <label>What type of work did you do </label> <br>
                            <input type="text" class="form-control" id="avail3" name="worktype" value="<?php if(isset($careinfo['caregiverinfo_worktype'])){ echo $careinfo['caregiverinfo_worktype'];} ?>">
                          </div>

                              </div> 

                      <div class="col-md-6">
                        <h5>Profile details</h5>
                            <div class="form-group">
                                          <label>Phone Number</label>
                                        <input type="text" class="form-control" id="phone" name="phonenumber" value="<?php if(isset($careinfo['caregiverinfo_phone'])){ echo $careinfo['caregiverinfo_phone'];} ?>">
                                                    </div>

                                <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                            <label>Identification Number</label>
                                            <input type="text" class="form-control" name="identification" id="verif" value="<?php if(isset($careinfo['caregiverinfo_idnumber'])){ echo $careinfo['caregiverinfo_idnumber'];} ?>">
                                            </div>
                                            
                                                <div class="col-md-6">
                                                    <label>Type of Identification</label>
                                            <select class="form-control" name="idnumber">
                                                    <option value="" >Select identification Type</option>
                                                    <option value="Internationalpassport">International Passport</option>
                                                    <option value="DriverLicense">Driver License</option>
                                                    <option value="NationalidCard">National Identification Card</option>
                                               
                                            </select>
                                                </div>
                                            </div>
                                    </div>
                                <div class="form-group">
                                          <label>City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="<?php if(isset($careinfo['caregiverinfo_city'])){ echo $careinfo['caregiverinfo_city'];} ?>">
                                          
                                                    </div> 
                                            <?php
                                                $stateobj = new Authentication;
                                                $state = $stateobj->getState();

                                                ?>

                        <label for="exampleFormControlSelect1">State</label>
                                            <select class="form-control" name="stateid" id="exampleFormControlSelect1">
                                                <option value="">Select a state</option>
                                                <?php
                                                    foreach ($state as $key => $value) {
                                                        $stateid = $value['state_id'];
                                                        $statename = $value['state_name'];
                                                        if ($careinfo['stateid']==$stateid) {
                                                        echo "<option value=\"$stateid\" selected='selected'>$statename</option>";

                                                    }else{
                                                        echo "<option value=\"$stateid\">$statename</option>";
                                                    }

                                                    }

                                                    ?>
                                                
                                          </select>
            
              </div> 
                    
        </div>

  
                                          <button type="submit" class="btn btn-success">Save Changes</button>
                                  </form>
                          </div>

                                  

                    </div>
        
        
                              
                        

        

      </div>
  
  </div>

             

<?php
    
    include ('dcarefoot.php');
?>


<script type="text/javascript">
             
                $(document).ready(function(){
                    $("form").submit(function(e){
                        var detail = $("#avail").val();
                        var detail1 = $("#avail1").val();
                        var detail2 = $("#avail2").val();
                        var detail3 = $("#avail3").val();
                        var detail4 = $("#avail4").val();
                        var detail5 = $("#phone").val();
                        var detail8 = $("#city").val();
                        var detail6 = $("#verif").val();
                        var detail7 = $("#exampleFormControlSelect1").val();

                       
                    if ((detail == "") || (detail1 == "") || (detail2 == "") || (detail3 == "") || (detail4 == "") || (detail5 == "")
                     || (detail6 == "") || (detail7 == "") || (detail8 == "") )
                         {
                            $('#say1').html("Fill in the required fields*");

                            e.preventDefault(); 
                    }

                    });
                });



         </script>



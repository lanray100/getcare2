        <?php
            
            include ('admindashhead.php');

            include ('userauth.php');

          ?>

          <div class="container-fluid">
          <div class="row" >
              <div class="col-md-3">
                  <?php
                      include ('adminsidedashboard.php');

                    ?>

              </div>

                <div class="col-md-9">
                    <div class="container-fluid">

                      <div class="row">
                          <div class="col-md-12">
                            <?php
                              if (isset($_GET['msg'])) {
                                echo $_GET['msg'];
                              }
                              
                            ?>
                            <table class='table table-bordered table-striped table-hover'>

                                      <tr>
                                          <th>S/N</th>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Username</th>
                                          <th>Gender</th>
                                          <th>Email</th>
                                          <th>Date</th>
                                          <th>Action</th>
                                          
                                      </tr>
                                      
                                      <?php 

                                        $serial = 1;

                                        $detailobj = new Authentication;
                                        $detail = $detailobj->getallCaregivers();

                                        foreach ($detail as $key => $value) {

                                       ?>
                                          
                                          
                                          <tr>
                                          <td><?php echo $serial; ?></td>
                                          <td><?php echo $value['caregiver_fname']; ?></td>
                                          <td><?php echo $value['caregiver_lname']; ?></td>
                                          <td><?php echo $value['caregiver_username']; ?></td>
                                          <td><?php echo $value['caregiver_gender']; ?></td>
                                          <td><?php echo $value['caregiver_email']; ?></td>
                                          <td><?php echo date('D,jS M Y', strtotime($value['caregiver_dateregistered'])); ?></td>
                                          <td>
                                                <a href="admindeletecaregiver.php?caregiverid=<?php echo $value['caregiver_id'] ?>&name=<?php echo $value['caregiver_fname'] ?>">Delete</a>
                                          </td>
                                          </tr>
                                          
                                  

                                          

                                    <?php
                                      $serial++;
                                      }

                                      ?>



                                    </table>

                          </div>

                      </div>

           
                  </div>

                </div>

             

          </div>
    </div>


    <?php
        include ('admindashfoot.php');

      ?>
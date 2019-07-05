          <?php 

              include ('admindashhead.php');

              include ('userauth.php');

           ?>
    <div class="container-fluid">
          <div class="row" >
              <div class="col-md-3">
                  <?php include ('adminsidedashboard.php');  ?>

              </div>

                <div class="col-md-9">
                    <div class="container">

                      <div class="row">
                         <div class="col-md-12">
                          <div>
                              <h3>Applied Caregivers History</h3>
                            <table class='table table-bordered table-striped table-hover'>

                                      <tr>
                                          <th>S/N</th>
                                          <th>Applied Email</th>
                                          <th>Resume</th>
                                          <th>Date Applied</th>
                                          
                                          
                                      </tr>
                                      
                                      <?php 

                                        $serial = 1;

                                        $detailobj = new Post;
                                        $detail = $detailobj->appliedadminDash();

                                        foreach ($detail as $key => $value) {

                                       ?>
                                          
                                          
                                          <tr>
                                          <td><?php echo $serial; ?></td>
                                          <td><?php echo $value['applied_email']; ?></td>
                                          <td><?php echo $value['applied_resume']; ?></td>
                                          <td><?php echo date('D, jS M Y', strtotime($value['applied_date'])); ?></td>
                                          
                                          </tr>
                                          
                                  

                                          

                                    <?php
                                      $serial++;
                                      }

                                      ?>



                                    </table>
                            <p style="text-align: right;"><a href="tableforappliedcaregiver.php">View more <i class="fas fa-arrow-right"></i></a></p>
                          </div>
                      </div>


                    </div>
                       <div class="row">
                         <div class="col-md-12">
                          <div>
                              <h3>Employers History</h3>
                            <table class='table table-bordered table-striped table-hover'>

                                      <tr>
                                          <th>S/N</th>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Company</th>
                                          <th>Gender</th>
                                          <th>Email</th>
                                          <th>Date</th>
                                          <th>City</th>
                                          
                                          
                                      </tr>
                                      
                                      <?php 

                                        $serial = 1;

                                        $detailobj = new Authentication;
                                        $detail = $detailobj->getallemployerDash();

                                        foreach ($detail as $key => $value) {

                                       ?>
                                          
                                          
                                          <tr>
                                          <td><?php echo $serial; ?></td>
                                          <td><?php echo $value['employer_fname']; ?></td>
                                          <td><?php echo $value['employer_lname']; ?></td>
                                          <td><?php echo $value['employer_company']; ?></td>
                                          <td><?php echo $value['employer_gender']; ?></td>
                                          <td><?php echo $value['employer_email']; ?></td>
                                          <td><?php echo date('D, jS M Y', strtotime($value['employer_date'])); ?></td>
                                          <td><?php echo $value['employer_city'] ?></td>
                                         
                                          </tr>
                                          
                                  

                                          

                                    <?php
                                      $serial++;
                                      }

                                      ?>



                                    </table>
                            <p style="text-align: right;"><a href="tableforemployers.php">View more <i class="fas fa-arrow-right"></i></a></p>
                          </div>
                      </div>

                       <div class="row">
                         <div class="col-md-12">
                          <div>
                              <h3>Caregivers History</h3>
                            <table class='table table-bordered table-striped table-hover'>

                                      <tr>
                                          <th>S/N</th>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Username</th>
                                          <th>Gender</th>
                                          <th>Email</th>
                                          <th>Date</th>
                                          
                                          
                                      </tr>
                                      
                                      <?php 

                                        $serial = 1;

                                        $detailobj = new Authentication;
                                        $detail = $detailobj->getallcaregiversDash();

                                        foreach ($detail as $key => $value) {

                                       ?>
                                          
                                          
                                          <tr>
                                          <td><?php echo $serial; ?></td>
                                          <td><?php echo $value['caregiver_fname'] ?></td>
                                          <td><?php echo $value['caregiver_lname'] ?></td>
                                          <td><?php echo $value['caregiver_username'] ?></td>
                                          <td><?php echo $value['caregiver_gender'] ?></td>
                                          <td><?php echo $value['caregiver_email'] ?></td>
                                          <td><?php echo date('D, jS M Y', strtotime($value['caregiver_dateregistered'])) ?></td>
                                         
                                          </tr>
                                          
                                  

                                          

                                    <?php
                                      $serial++;
                                      }

                                      ?>



                                    </table>
                            <p style="text-align: right;"><a href="tablesforcaregivers.php">View more <i class="fas fa-arrow-right"></i></a></p>
                          </div>
                      </div>

                     
                       <div class="row">
                         <div class="col-md-12">
                          <div>
                              <h3>Job History</h3>
                            <table class='table table-bordered table-striped table-hover'>

                                      <tr>
                                          <th>S/N</th>
                                          <th>Title</th>
                                          <th>City</th>
                                          <th>Desc</th>
                                          <th>Req</th>
                                          <th>Employer id</th>
                                          <th>OpenDate</th>
                                          <th>CloseDate</th>
                                          <th>Date</th>
                                          <th>State Name</th>
                                          <th>Post Id</th>
                                          
                                          
                                      </tr>
                                      
                                      <?php 

                                        $serial = 1;

                                        $detailobj = new Post;
                                        $detail = $detailobj->getpostDash();

                                        foreach ($detail as $key => $value) {

                                       ?>
                                          
                                          
                                          <tr>
                                          <td><?php echo $serial; ?></td>
                                          <td><?php echo $value['post_title']; ?></td>
                                          <td><?php echo $value['post_city']; ?></td>
                                          <td><?php echo $value['post_description']; ?></td>
                                          <td><?php echo $value['post_requirement']; ?></td>
                                          <td><?php echo $value['post_employerid']; ?></td>
                                          <td><?php echo date('D, jS M Y', strtotime($value['post_open'])); ?></td>
                                          <td><?php echo date('D, jS M Y', strtotime($value['post_close'])); ?></td>
                                          <td><?php echo date('D, jS M Y', strtotime($value['post_date'])); ?></td>
                                          <td><?php echo $value['state_name']; ?></td>
                                          <td><?php echo $value['post_id']; ?></td>
                                          
                                          </tr>
                                          
                                  

                                          

                                    <?php
                                      $serial++;
                                      }

                                      ?>



                                    </table>
                            <p style="text-align: right;"><a href="tableforjobs.php">View more <i class="fas fa-arrow-right"></i></a></p>
                          </div>  

                </div>

             

          </div>
    </div>

     <?php 

              include ('admindashfoot.php');

              

           ?>

  

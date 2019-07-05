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
                                          <th>Company</th>
                                          <th>Gender</th>
                                          <th>Email</th>
                                          <th>Date</th>
                                          <th>City</th>
                                          <th>Action</th>
                                          
                                      </tr>
                                      
                                      <?php 

                                        $serial = 1;

                                        $detailobj = new Authentication;
                                        $detail = $detailobj->getallEmployer();

                                        foreach ($detail as $key => $value) {

                                       ?>
                                          
                                          
                                          <tr>
                                          <td><?php echo $serial; ?></td>
                                          <td><?php echo $value['employer_fname']; ?></td>
                                          <td><?php echo $value['employer_lname']; ?></td>
                                          <td><?php echo $value['employer_company']; ?></td>
                                          <td><?php echo $value['employer_gender']; ?></td>
                                          <td><?php echo $value['employer_email']; ?></td>
                                          <td><?php echo date('D,jS M Y', strtotime($value['employer_date'])); ?></td>
                                          <td><?php echo $value['employer_city'] ?></td>
                                          <td>
                                                <a href="admindeleteemployer.php?employerid=<?php echo $value['employer_id'] ?>&name=<?php echo $value['employer_fname'] ?>">Delete</a>
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
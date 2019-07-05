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
                                          <th>Applied Email</th>
                                          <th>Resume</th>
                                          <th>Date Applied</th>
                                          <th>Action</th>
                                          
                                      </tr>
                                      
                                      <?php 

                                        $serial = 1;

                                        $detailobj = new Post;
                                        $detail = $detailobj->appliedcaregiverAdmin();

                                        foreach ($detail as $key => $value) {

                                       ?>
                                          
                                          
                                          <tr>
                                          <td><?php echo $serial; ?></td>
                                          <td><?php echo $value['applied_email']; ?></td>
                                          <td><?php echo $value['applied_resume']; ?></td>
                                          <td><?php echo date('D,jS M Y', strtotime($value['applied_date'])); ?></td>
                                          <td>
                                                <a href="admindeleteapplied.php?appliedid=<?php echo $value['applied_id'] ?>">Delete</a>
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
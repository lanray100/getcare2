        <?php
            
            include ('admindashhead.php');

            include ('userauth.php');

          ?>
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
                                          <th>Action</th>
                                          
                                      </tr>
                                      
                                      <?php 

                                        $serial = 1;

                                        $detailobj = new Post;
                                        $detail = $detailobj->getPost();

                                        foreach ($detail as $key => $value) {

                                       ?>
                                          
                                          
                                          <tr>
                                          <td><?php echo $serial; ?></td>
                                          <td><?php echo $value['post_title']; ?></td>
                                          <td><?php echo $value['post_city']; ?></td>
                                          <td><?php echo $value['post_description']; ?></td>
                                          <td><?php echo $value['post_requirement']; ?></td>
                                          <td><?php echo $value['post_employerid']; ?></td>
                                          <td><?php echo date('D,jS M Y', strtotime($value['post_open'])); ?></td>
                                          <td><?php echo date('D,jS M Y', strtotime($value['post_close'])); ?></td>
                                          <td><?php echo date('D,jS M Y', strtotime($value['post_date'])); ?></td>
                                          <td><?php echo $value['state_name']; ?></td>
                                          <td><?php echo $value['post_id']; ?></td>
                                          <td>
                                                <a href="admindeletejob.php?postid=<?php echo $value['post_id'] ?>&title=<?php echo $value['post_title'] ?>">Delete</a>
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
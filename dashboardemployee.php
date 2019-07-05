              <?php
                $pagetitle = "Dashboard ";
                  include ('userauth.php');
                ?>

             <?php

                include ('dcarehead.php');

             ?>


             <div class="row">
                <div class="col-md-3">
                  <?php include ('sidedashcare.php');  ?>

                </div>

                <div class="col-md-9">
                  <?php
                      if (isset($_GET['msg'])) {
                        echo $_GET['msg'];
                      }
                      
                    ?>
                      <div>
                          <h1>Explore more with our Job search</h1>
                          <p>Kindly use our job search bar to see more opportunities</p>

                          <h1>Share your experience(s) <br> with your employer</h1>
                          <p>Show all your experience and let the right employer or family reach out to you </p>

                      </div>
                </div>

                
            </div>

            <?php

                include ('dcarefoot.php');

             ?>
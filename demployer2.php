

             <?php
                  $pagetitle = "Dashboard";

                include ('demphead.php');

                  include ('userauth.php');

             ?>

             <?php

              $stateobj = new Authentication;
              $state = $stateobj->getState();

             ?>

             <div class="row">
                <div class="col-md-3">
                  <?php include ('sidedashboard.php');  ?>

                </div>

                 <div class="col-md-9">
                  <?php
                   $empobj = new Authentication;
                   $emp = $empobj->getEmployer($_SESSION['myemployerid']);

                    // var_dump($emp);

                    ?>
                    <div class="row">
      <div class="col-12">
    <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home" style="text-align: center;">View Profile</a>
    </div>
      </div>
  </div>

  <div class="row">
  <div class="col-12">
   
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="card card-body">
            <form>
                  <div>
                      <h3>Profile</h3>
                    <form>
                        <h5>Names </h5><p> <?php echo $emp['employer_fname']." ".$emp['employer_lname'];  ?></p>
                        <h5>Company Name </h5><p> <?php echo $emp['employer_company'];  ?></p>
                        <h5>Gender </h5><p> <?php echo $emp['employer_gender'];  ?></p>
                        <h5>Phone Number </h5><p> <?php echo $emp['employer_phone'];  ?></p>
                        <h5>City </h5><p> <?php echo $emp['employer_city'];  ?></p>
                            
                            </form>
                          </div>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
        
    
            <?php

                include ('dempfoot.php');

             ?>

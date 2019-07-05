                <?php include ('userauth.php')  ?>

                <style type="text/css">
                    #display{
                                position: absolute;
                                width: 440px;
                                
                                background-color: white;
                                z-index: 10;
                            }
                </style>

        		   <?php
                   $pagetitle = "Jobs Listing";
                        include ('header.php');

                    ?>


            </div>

		   	<div class="container-fluid">
        		<div class="row">
        			<div class="col-md-12">
        				<div class="for" style="background-color:rgb(0,64,128); text-align: center; padding: 20px; ">
					 		<h3 style="color: white"> Available Jobs</h3>
					 	</div>

        			</div>
        			

        		</div>

            
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group" style="padding: 20px;">
                            <input type="text" class="form-control" id="search" placeholder="SERACH FOR JOBS" >
                            <div id="display"></div>
                        </div>
                        
                    </div>

                    <div class="col-md-5">
                        <?php
                                $stateobj = new Authentication;
                                $state = $stateobj->getState();

                                ?>
                            <div class="form-group">
                                <div style="margin-top: 20px;">
                            <select class="form-control" name="stateid" id="stateid" id="exampleFormControlSelect1">
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
                            </div>
                        </div>
                        
                </div>

                <div class="col-md-2">
                    <button class="btn btn-outline-success" id="search2" style="margin-top: 20px;">Search Jobs</button>
                </div>

            </div>


                <div id="post">
                    

                </div>
        		
        		
        		
        	</div>


            <?php
                        include ('footer.php');

                    ?>

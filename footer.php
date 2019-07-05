</div>
<div class="container-fluid">
<div class="row bg-info">
                    <div class="container">
                        <div class="row">
                            <div class="col-mid-3">
                                <div class="foot">
                                    <h4 style="color: white;">For Employers</h4>
                                    <p><a href="employer.php">How it works</a></p>
                                    <p><a href="employerform.php">Try it Free</a></p>

                                </div>

                            </div>

                            <div class="col-mid-3">
                                <div class="foot">
                                    <h4 style="color: white;"> For Caregivers/Nurses</h4>
                                    <p><a href="caregiverform.php">Create a Profile</a></p>
                                </div>

                            </div>

                            <div class="col-mid-3">
                                <div class="foot">
                                    <h4 style="color: white;">Help</h4>
                                    <p><a href="contact.php">Contact</a></p>
                                    <p><a href="privacy.php">Privacy Policy</a></p>

                                </div>

                            </div>

                            <div class="col-mid-3">
                                <div class="foot">
                                    <h4 style="color: white;">Connect with us</h4>
                                   <div>
                                    <span> <a href='https://www.skype.com' target="_blank" ><img src="images/skype-icon.png" style="width: 20px; height: 20px;"></a></span>
                                       <span> <a href='https://www.twitter.com' target="_blank" ><img src="images/twitter-icon.jpg" style="width: 20px; height: 20px;"></a></span>
                                    <span> <a href='https://www.linkedin.com' target="_blank" ><img src="images/facebook.png" style="width: 20px; height: 20px;"></a></span>
                                     
                                    </div>

                                </div>

                            </div>
                            

                    </div>
                        
                        <hr style="border:5px solid white;">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="foot1">
                                    <h3 style="color: white;">getCaregiver</h3>
                                    <i>Copyright &copy 2019. All rights reserved.</i>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
</div>

<?php include ('modalterms.php'); ?>

 <!-- jquery  -->
          <script type='text/javascript' src='bootstrap/js/jquery-3.3.1.js'> </script>
          
          <!-- popper    -->
          <script type='text/javascript' src='bootstrap/js/popper.min.js'> </script>
          
          <!-- bootstrap js  -->
         <script type='text/javascript' src='bootstrap/js/bootstrap.min.js'> </script>

         <script type="text/javascript">
         $(document).ready(function() {

         // display all once this page load $.get method
        $.get("displayjobindex.php", function(data){
            //console.log(data);
            document.getElementById('post').innerHTML = data;
              });

        // display 4 when the page loads $.get method
        $.get("display4.php", function(data){
            //console.log(data);
            document.getElementById('post4').innerHTML = data;
              });

        $.get("displayjoblatest.php", function(data){
            //console.log(data);
            document.getElementById('post2').innerHTML = data;
              });

        //$('#display').hide();

        // to search for jobs in the index pages
        $('#search').keyup(function(){
            
            var mysearch = $(this).val();

            $.post("searchindex.php",{find: mysearch}, function(response){
                console.log(response);
                document.getElementById('display').innerHTML = response;
            });
        });

         // to search for jobs using the search button
        $('#search2').click(function(){

          var mysearch = $('#search').val();

          $.post("searchdisplayindex.php",{find : mysearch}, function(response){

              console.log(response);
            document.getElementById('post').innerHTML = response;
              
          })

        });


        // display 12 jobs once you change the value of state dropdown box
        $('#stateid').change(function(){

            // get state value
            var state = $('#stateid').val();
            // send the parameters to displayjobindex.php using $.ajax method
            $.ajax({
                type: "POST",
                url : "displayjobindex.php",
                data : "mystateid=" + state,
                success : function(response){
                    console.log(response);
                    document.getElementById('post').innerHTML = response;
                }
            });
        })

          });
        </script>
    </body>
</html>
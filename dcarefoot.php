</div>

        <!-- jquery  -->
          <script type='text/javascript' src='bootstrap/js/jquery-3.3.1.js'> </script>
          
          <!-- popper    -->
          <script type='text/javascript' src='bootstrap/js/popper.min.js'> </script>
          
          <!-- bootstrap js  -->
         <script type='text/javascript' src='bootstrap/js/bootstrap.min.js'> </script>

         <script type="text/javascript">
         $(document).ready(function() {

         // display all once this page load $.get method
        $.get("dashjobdisplay.php", function(data){
            //console.log(data);
            document.getElementById('post').innerHTML = data;
              });

        $('#search').keyup(function(){
            
            var mysearch = $(this).val();

            $.post("search.php",{find: mysearch}, function(response){
                console.log(response);
                document.getElementById('display').innerHTML = response;
            });
        });

        $('#search1').click(function(){

          var mysearch = $('#search').val();

          $.post("searchdisplay.php",{find : mysearch}, function(response){

              console.log(response);
              document.getElementById('post').innerHTML = response;
          })

        });

        


        // display 12 jobs once you change the value of state dropdown box
        $('#stateid').change(function(){

            // get state value
            var state = $('#stateid').val();
            // send the parameters to dashjobdisplay.php using $.ajax method
            $.ajax({
                type: "POST",
                url : "dashjobdisplay.php",
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

    <?php

        ob_end_flush();
    ?>

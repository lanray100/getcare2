

             <?php
             $pagetitle = "Dashboard";

                include ('demphead.php');

                include ('userauth.php');

                  
             ?>

             <div class="row">
                <div class="col-md-3">
                  <?php include ('sidedashboard.php');  ?>

                </div>

                <div class="col-md-9">
                    <div class="row">
                    <div class="col-md-12">
                        <div style="margin-bottom: 15px;">
                            <table style="text-align: center;">
                                <tr>
                                    <td></td>
                                    <td>Bronze</td>
                                    <td>Silver</td>
                                    <td>Gold</td>

                                </tr>

                                <tr>
                                    <td>Price</td>
                                    <td>#5,000</td>
                                    <td>#25,000</td>
                                    <td>#47,000</td>
                                </tr>

                                <tr>
                                    <td>Connect with Caregivers/Nurses</td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    
                                </tr>

                                <tr>
                                    <td>Email Connection</td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    
                                </tr>

                                <tr>
                                    <td>Job Post</td>
                                    <td> 2/month</td>
                                    <td>10/month</td>
                                    <td>30/month</td>
                                    
                                </tr>

                                <tr>
                                   <td>Features</td>
                                   <td></td>
                                   <td></td>
                                   <td></td> 
                                    
                                </tr>

                                <tr>
                                    <td>New Candidate Notifications</td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    
                                </tr>

                                <tr>
                                   <td>Support Options</td>
                                   <td><i class="fas fa-check"></i></td>
                                   <td><i class="fas fa-check"></i></td>
                                   <td><i class="fas fa-check"></i></td> 
                                    
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><button type="button" onclick="payWithPaystack($price ='5000')">Get Started</button></td>
                                    <td><button type="button" onclick="payWithPaystack()">Get Started</button></td>
                                    <td><button type="button" onclick="payWithPaystack()">Get Started</button></td>
                                    
                                </tr>

                            </table>


                        </div>
                        

                    </div>
                     

                 </div>
                      
                </div>

                </div>
  
  <?php

                include ('dempfoot.php');

             ?>


  <script src="https://js.paystack.co/v1/inline.js"></script> 
</form>
 
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_86d32aa1nV4l1da7120ce530f0b221c3cb97cbcc',
      email: 'customer@email.com',
      amount: 10000,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>
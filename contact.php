

        		   <?php
                   $pagetitle = "Contact Us";
                        include ('header.php');

                    ?>

                 <div class="row">
                    <div class="col-md-12">
                        <div style="margin-top: 100px; text-align: center;">
                            <h2 class="sty">Contact</h2>
                            <p>Have a getCaregiver account? Please login before contacting us.</p>
                        </div>
                        
                    </div>
                     
                 </div>
                 <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                     <form method='post' action="#" >
                                        <div class="form-group">
                                            <label>Name</label>
                            <input type="text" class="form-control"  name="fullname">
                                    <small class="form-text text-danger"> </small>
                                        </div>
                                        <div class="form-group">
                                            <label>Email address</label>
                                <input type="email" class="form-control" name="emailaddress" >
                                    <small class="form-text text-danger"> </small>
                                            </div>
                                        <div class="form-group">
                                            <label>Subject</label>
                                <input type="text" class="form-control" name="subject" >
                                    <small class="form-text text-danger"> </small>
                                            </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea cols="30" rows="12" class="form-control"></textarea>
                                    </div>
                            <button type="button" class="btn btn-success" style="margin-bottom: 10px;">Send</button>

                                    
                                </form> 
                     </div>
                     <div class="col-md-3"></div>
                 </div>
                 
        </div>

            <?php
                        include ('footer.php');

                    ?>
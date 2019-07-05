<!-- Modal -->
<div class="modal fade" id="job" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Create A Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <div>
      <form>
    <label>Job Title</label><br>
    <input type="text" name="jobtitle"> <br>

    <label>Job Description</label><br>
    <textarea cols="30" rows="10" class="form-control"></textarea><br>

    <label>Job Requirement</label><br>
    <textarea cols="30" rows="10" class="form-control"></textarea><br>

                        <label>City</label> <br>
                        <input type="text" name="city"> <br>

                        <label for="exampleFormControlSelect1">State</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option value="">Select a state</option>
                                                <option value="lagos">Lagos</option>
                                                
                                                
                                          </select>  <br>
                    </form>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Post</button>
      </div>
    </div>
  </div>
</div>

  <!-- Delete -->
<div class="modal fade" id="deleteEval">
    <div class="modal-dialog">
          <div class="modal-content">
          	<div class="modal-header">
            	<h4 class="modal-title"><b><span>Delete</span></b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          	</div>
            <div class="modal-body">

            	<form class="form-horizontal" method="POST" action="function/evaluation_delete.php">
            		<input type="text" id="eid" name="id">
            		<div class="text-center">
	                	<label>Are you sure you want to delete this performance evaluation record? </label>
                    <div class="text-center text-danger" >
                      <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                      <label> Note: This process cannot be undone</label>
                      <hr>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label req">Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="pass" class="form-control border border-secondary" required="" placeholder="Please enter your password for verification"  />
                        </div>
                      </div>
                    </div>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
            </div>
          </div>
    </div>
</div>


  <!-- view -->
<div class="modal fade" id="viewEval">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title"><b><span>View Task</span></b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="col-lg-12">
                  <div class="row">
                    <div class="col-md-6">
                      <dl>
                        <dt><b class="border-bottom border-success">Task</b></dt>
                        <dd id="Task"></dd>
                      </dl>
                      <dl>
                        <dt><b class="border-bottom border-success">Assign To</b></dt>
                        <dd id="Assign"></dd>
                      </dl>
                      <dl>
                        <dt><b class="border-bottom border-success">Date Evaluated</b></dt>
                        <dd id="Date"></dd>
                      </dl>
                      <dl>
                      <dt><b class="border-bottom border-success">Remarks</b></dt>
                      <dd id="Remarks"></dd>
                      </dl>
                    </div>
                    <div class="col-md-6">
                      <b>Ratings:</b>
                      <dl>
                        <dt><b class="border-bottom border-success">Efficiency</b></dt>
                        <dd id="Efficiency"></dd>
                      </dl>
                      <dl>
                        <dt><b class="border-bottom border-success">Timeliness</b></dt>
                        <dd id="Timeliness"></dd>
                      </dl>
                      <dl>
                        <dt><b class="border-bottom border-success">Quality</b></dt>
                        <dd id="Quality"></dd>
                      </dl>
                      <dl>
                        <dt><b class="border-bottom border-success">Accuracy</b></dt>
                        <dd id="Accuracy"></dd>
                      </dl>
                      <dl>
                        <dt><b class="border-bottom border-success">Performance Average</b></dt>
                        <dd id="pa"></dd>
                      </dl>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>


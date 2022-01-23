<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	
            	<h4 class="modal-title"><b>Add Benefit</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="function/benefits_add.php">

              <div class="form-group row">
                <label class="col-2 float-label req">Title</label>
                <div class="col-10">
                  <input type="text" name="title" class="form-control border border-secondary" required="">
                </div>
              </div>

              <div class="form-group row">
                  <label class="col-2 float-label req">Description</label>
                  <div class="col-10">
                    <textarea class="form-control border border-secondary" required="" name='description' rows="8"></textarea>
                  </div>
              </div>
                
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>




<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	
            	<h4 class="modal-title"><b>Edit Benefit</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          	</div>

          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="function/benefits_edit.php">
            		<input type="hidden" id="beneid" name="id">

                <div class="form-group row">
                  <label class="col-2 float-label req">Title</label>
                  <div class="col-10">
                    <input type="text" name="title" class="form-control border border-secondary edit_title" required="">
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-2 float-label req">Description</label>
                  <div class="col-10">
                    <textarea class="form-control border border-secondary edit_description" required=""  rows="8" name='description'></textarea>
                  </div>
                </div>

          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-save"></i> Save Changes</button>
            	</form>
          	</div>
        </div>
    </div>
</div>



<!-- View -->
<div class="modal fade" id="view_desc">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title"><b>View Benefit</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">

                <div class="form-group row">
                  <label class="col-2 float-label">Title</label>
                  <div class="col-10">
                    <input type="text"  class="form-control border border-secondary edit_title" readonly>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-2 float-label">Description</label>
                  <div class="col-10">
                    <textarea class="form-control border border-secondary edit_description" readonly rows="8" ></textarea>
                  </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>







<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	
            	<h4 class="modal-title"><b>Delete</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="function/benefits_delete.php">
            		<input type="hidden" id="del_beneid" name="id">
            		<div class="text-center">
	                	<p>Are you sure you want to delete this benefit record(s)?</p>
	                	<h2 id="del_benefit" class="bold"></h2>
                    <hr>
                    <div class="form-group row">
                      <label class="col-3 float-label req">Password</label>
                      <div class="col-9">
                        <input type="password" name="pass" class="form-control border border-secondary" placeholder="Please enter your password for verification" required>
                      </div>
                    </div>
                    <div class="text-center text-danger" >
                      <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                      <label> Note: You can't delete a benefit that is currently applied in employee records.</label>
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




     
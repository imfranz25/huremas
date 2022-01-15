<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	
            	<h4 class="modal-title"><b>Add Designation</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="function/position_add.php">

          		  <div class="form-group row">
                  	<label for="title" class="col-sm-3 control-label req">Title</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control border border-secondary" id="title" name="title" required>
                  	</div>
                </div>

                <div class="form-group row">
                    <label for="rate" class="col-sm-3 control-label req">Rate per Hr</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control border border-secondary" id="rate" name="rate" min='0' step="100" required>
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
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	
            	<h4 class="modal-title"><b>Update Designation</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="function/position_edit.php">
            		<input type="hidden" id="posid" name="id">
                <div class="form-group row">
                    <label for="edit_title" class="col-sm-3 control-label req">Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary" id="edit_title" name="title" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="edit_rate" class="col-sm-3 control-label req">Rate per Hr</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control border border-secondary" id="edit_rate" name="rate" min='0' step="100"  required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
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
            	<form class="form-horizontal" method="POST" action="function/position_delete.php">
            		<input type="hidden" id="del_posid" name="id">
            		<div class="text-center">
	                	<p>Are you sure you want to delete this designation record(s)?</p>
	                	<h2 id="del_position" class="bold"></h2>
                        <div class="form-group row">
                        <label for="pass" class="col-sm-3 control-label req">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control border border-secondary" id="pass" name="pass" placeholder="Please enter your password for verification" required>
                        </div>
                    </div>
                    <div class="text-center text-danger" >
                      <label><i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i> Note: You can't delete a position record if its currently applied in employee record</label>
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


<!-- DEPARTMENT -->



<!-- Add -->
<div class="modal fade" id="addnew2">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title"><b>Add Department</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/department_add.php">

                <div class="form-group row">
                    <label for="title" class="col-sm-3 control-label req">Title</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary" id="" name="title" required>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="rate" class="col-sm-3 control-label req">Code</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary" id="" name="code" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Set to Default</button>
              <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title"><b>Update Department</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/department_edit.php">
                <input type="hidden" id="posid2" name="id">
                <div class="form-group row">
                    <label for="edit_title" class="col-sm-3 control-label req">Title</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary" id="edit_title2" required name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="edit_rate" class="col-sm-3 control-label req">Code</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary" id="edit_code2" required name="code">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title"><b>Delete</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/department_delete.php">
                <input type="hidden" id="del_posid2" name="id">
                <div class="text-center">
                    <p>Are you sure you want to delete this department record(s)?</p>
                    <h2 id="del_position2" class="bold"></h2>
                    <div class="form-group row">
                        <label for="pass" class="col-sm-3 control-label req">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control border border-secondary" id="pass" name="pass" placeholder="Please enter your password for verification" required>
                        </div>
                    </div>
                    <div class="text-center text-danger" >
                      <label><i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i> Note: You can't delete a department record if its curretly applied in employee record</label>
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


          
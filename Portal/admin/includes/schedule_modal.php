<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
      	<h4 class="modal-title"><b>Add Schedule</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <form class="form-horizontal" method="POST" action="function/schedule_add.php">
      	<div class="modal-body">
    		  <div class="form-group">
          	<label for="time_in" class="col-sm-3 control-label">Time In</label>
          	<div class="col-sm-9">
              <div class="bootstrap-timepicker">
            	 <input type="time" class="form-control timepicker" id="time_in" name="time_in" required>
              </div>
          	</div>
          </div>
          <div class="form-group">
            <label for="time_out" class="col-sm-3 control-label">Time Out</label>
            <div class="col-sm-9">
              <div class="bootstrap-timepicker">
                <input type="time" class="form-control timepicker" id="time_out" name="time_out" required>
              </div>
            </div>
          </div>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        	<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
      	</div>
      </form>
    </div>
  </div>
</div>


<!-- Edit -->
<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
      	<h4 class="modal-title"><b>Update Schedule</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <form class="form-horizontal" method="POST" action="function/schedule_edit.php">
        <input type="hidden" id="timeid" name="id">
      	<div class="modal-body">
          <div class="form-group">
            <label for="edit_time_in" class="col-sm-3 control-label">Time In</label>
            <div class="col-sm-9">
              <div class="bootstrap-timepicker">
                <input type="time" class="form-control timepicker" id="edit_time_in" name="time_in">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_time_out" class="col-sm-3 control-label">Time out</label>
            <div class="col-sm-9">
              <div class="bootstrap-timepicker">
                <input type="time" class="form-control timepicker" id="edit_time_out" name="time_out">
              </div>
            </div>
          </div>
    	  </div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
      	</div>
      </form>
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
          <span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <form class="form-horizontal" method="POST" action="function/schedule_delete.php">
        <input type="hidden" id="del_timeid" name="id">
      	<div class="modal-body">
      		<div class="text-center">
          	<p>Are you sure you want to delete this schedule record(s)?</p>
          	<h2 id="del_schedule" class="bold"></h2>
            <div class="text-center text-danger" >
              <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
              <label> Note: This process cannot be undone</label>
            </div>
        	</div>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
      	</div>
      </form>
    </div>
  </div>
</div>


     
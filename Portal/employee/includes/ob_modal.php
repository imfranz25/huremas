
<!-- Add Overtime-->
<div class="modal fade" id="addOT">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Add New Official Business</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/ob_add.php" >
                <input type="hidden" name="eid" value="<?php echo $id; ?>">
                <!--date-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Date</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="date" required="">
                </div>
                 
                </div>
                <!--time-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Start Time</label>
                    <div class="col-sm-9 bootstrap-timepicker">
                        <input type="time" class="form-control timepicker" id="" name="start" required>
                    </div>
                </div>
                <!--time-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">End Time</label>
                    <div class="col-sm-9 bootstrap-timepicker">
                        <input type="time" class="form-control timepicker" id="" name="end" required>
                    </div>
                </div>

                <!--OT reason-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Details</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" rows="8"  name="details" required=""></textarea>
                  </div>
                </div>
            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
             
              <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add Overtime **End**-->





  <!-- Delete -->
<div class="modal fade" id="deleteOT">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">

            	<h4 class="modal-title"><b><span>Delete Official Business Request</span></b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">

            	<form class="form-horizontal" method="POST" action="function/ob_delete.php">
            		<input type="hidden" id="overtime_id" name="id">
            		<div class="text-center">
	                	<label>Are you sure you want to delete this official business request ? </label>
                    <div class="text-center text-danger" >
                      <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                      <label> Note: This process cannot be undone</label>
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



<!-- Edit Overtime-->
<div class="modal fade" id="editOT">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Edit Official Business</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/ob_edit.php" >
                <input type="hidden" name="otid" id="otid">
                <!--date-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Date</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="date" name="date" required="">
                </div>
                 
                </div>
                <!--time-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Start Time</label>
                    <div class="col-sm-9 bootstrap-timepicker">
                        <input type="time" class="form-control timepicker" id="start" name="start" required>
                    </div>
                </div>
                <!--time-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">End Time</label>
                    <div class="col-sm-9 bootstrap-timepicker">
                        <input type="time" class="form-control timepicker" id="end" name="end" required>
                    </div>
                </div>

                <!--OT reason-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Details</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" rows="8" id="reason" name="reason" required=""></textarea>
                  </div>
                </div>
            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
             
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add Overtime **End**-->




<!-- VIEW Overtime-->
<div class="modal fade" id="viewOT">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>View Official Business</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">

                <!--date-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label ">Date</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control" id="date_view" name="" readonly="" >
                  </div>

                  <label class="col-sm-2 col-form-label ">Status</label>
                  <div class="col-sm-4" id="status_view">

                  </div>
                 
                </div>
                <!--time-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label ">Start Time</label>
                    <div class="col-sm-4 bootstrap-timepicker">
                        <input type="time" class="form-control timepicker" id="start_view" name="" readonly>
                    </div>


                  <label class="col-sm-2 col-form-label ">Evaluated By</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="eval_by" name="" readonly="" >
                  </div>
                </div>
                <!--time-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label ">End Time</label>
                    <div class="col-sm-4 bootstrap-timepicker">
                        <input type="time" class="form-control timepicker" id="end_view" name="" readonly>
                    </div>

                    <label class="col-sm-2 col-form-label ">Allowance Given</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="ot_type" name="" readonly="" >
                  </div>
                </div>

                <!--OT reason-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label ">Details</label>
                  <div class="col-sm-4">
                    <textarea class="form-control border border-secondary" rows="8" id="reason_view" name="" readonly=""></textarea>
                  </div>

                  <label class="col-sm-2 col-form-label ">Evaluator Notes</label>
                  <div class="col-sm-4">
                    <textarea class="form-control border border-secondary" rows="8" id="notes_view" name="" readonly=""></textarea>
                  </div>
                </div>
            </div>


            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add Overtime **End**-->




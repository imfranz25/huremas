
<!-- Add DTR-->
<div class="modal fade" id="addDTR">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>New Attendance</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/dtr_add.php" >
                <!--Code & Status-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Employee</label>
                  <div class="col-sm-6">
                    <select name="employee_id" class="form-control form-control-sm" required="">
                      <option>Select Employee</option>
                            <?php 
                            $employees = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM employees order by concat(lastname,', ',firstname,' ',middlename) asc");
                            while($row=$employees->fetch_assoc()):
                            ?>
                            <option value="<?php echo $row['employee_id'] ?>"><?php echo $row['name'] ?></option>
                            <?php endwhile; ?>
                          </select>
                  </div>
                </div>
                <!--OT Names-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Time-in</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="" name="timein" required="">
                  </div>
                </div>
                <!--OT Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Time-out</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="" name="timeout" required="">
                  </div>
                </div>
                <!--OT Rate-->
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
<div class="modal fade" id="deleteDTR">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">

            	<h4 class="modal-title"><b><span id="DTR_title"></span></b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">

            	<form class="form-horizontal" method="POST" action="function/dtr_delete.php">
            		<input type="hidden" id="DTR_id" name="id">
            		<div class="text-center">
	                	<label>Are you sure you want to delete this attendance record ? </label>
                    <div class="text-center text-danger" >
                      <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                      <label> Note: This process cannot be undone</label>
                    </div>
                    <hr>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label req">Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="pass" class="form-control border border-secondary" required="" placeholder="Please enter your password for verification"  />
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




<!-- EDIT DTR-->
<div class="modal fade" id="editDTR">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Edit Attendance</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/dtr_edit.php" >
                <input type="hidden" name="aid" id="edit_id">
                <!--Code & Status-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Employee</label>
                  <div class="col-sm-6">
                     <input type="text" class="form-control border border-secondary" name="name" id="name_edit" readonly/>
                  </div>
                </div>
                <!--OT Names-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Time-in</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="timein" name="timein" required="">
                  </div>
                </div>
                <!--OT Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Time-out</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="timeout" name="timeout" required=""> 
                  </div>
                </div>
                <!--OT Rate-->
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

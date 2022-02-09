<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
      	<h4 class="modal-title"><b>New Payroll Coverage</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <form class="form-horizontal" method="POST" action="function/pc_add.php">
      	<div class="modal-body">
          <h5 for="" class="col-sm-12 control-label text-center">Period Covered</h5>
          <hr>
    		  <div class="form-group row">
            <label class="col-sm-3 col-form-label req">Start Date</label>
            <div class="col-sm-8">
              <input type="date" id="" name="Sdate" > 
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">End Date</label>
            <div class="col-sm-8">
              <input type="date" id="" name="Edate" > 
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">Payment Date</label>
            <div class="col-sm-8">
              <input type="date" id="" name="pDate" > 
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
      	<h4 class="modal-title"><b>Update Payroll Coverage</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <form class="form-horizontal" method="POST" action="function/schedule_edit.php">
        <input type="hidden" id="pcc" name="id">
    	  <div class="modal-body">
          <h5 for="" class="col-sm-12 control-label text-center">Period Covered</h5>
          <hr>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">Start Date</label>
            <div class="col-sm-8">
              <input type="date" id="Sdate" name="Sdate" > 
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">End Date</label>
            <div class="col-sm-8">
              <input type="date" id="Edate" name="Edate" > 
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">Payment Date</label>
            <div class="col-sm-8">
              <input type="date" id="pDate" name="pDate" > 
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
        <input type="hidden" id="pcode" name="id">
        <div class="modal-body">
      		<div class="text-center">
          	<p>Are you sure you want to delete this payroll record(s)?</p>
          	<h2 id="name" class="bold"></h2>
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


     

<!-- Add Overtime-->
<div class="modal fade" id="addOT">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-md">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>New Overtime</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Modal Header **End**-->
      <form class="form-horizontal" method="POST" action="function/overtime_add.php" oninput="percent.value=rate.value">
        <!--Modal Body-->
        <div class="modal-body">
          <!--OT Names-->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">Name</label>
            <div class="col-sm-5">
              <input type="text" class="form-control border border-secondary" name="name" autocomplete="off" required pattern="[a-zA-Z\s]+" title="Please enter overtime name using letter only" />
            </div>
            <div class="col-sm-2">
              <label class="h-100 d-flex align-items-center" for="OTcheck"><input  type="checkbox"  id="OTcheck" class="mr-1" name="status" value="active" checked />Active</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">(+ %Rate)</label>
            <div class="col-sm-8">
              <input type="number" class="form-control border border-secondary" id="rate" name="rate" step="any" min=".1" value="0" required />
              <div class="input-group-append">
                <span class="input-group-text"><strong class="text-danger">Addtional Rate :</strong> Rate per Hour &times; 
                <output id="percent">0</output>%</span>
              </div>
            </div>
          </div>
        </div>
        <!--Modal Body **End**-->
        <!--Modal Footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="reset" class="btn btn-default btn-flat pull-left"><i class="fa fa-window-restore"></i> Set to Default</button>
          <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
        </div>
        <!--Modal Footer **End**-->
      </form>
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
      	<h4 class="modal-title"><b><span id="overtime_title"></span></b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <form class="form-horizontal" method="POST" action="function/overtime_delete.php">
        <input type="hidden" id="overtime_id" name="id">
    	 <div class="modal-body">	
      		<div class="text-center">
          	<label>Are you sure you want to delete this overtime record(s) ? </label>
          	<h2 class="bold" id="overtime_name"></h2>
            <hr>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label req">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control border border-secondary" name="pass" placeholder="Please enter your password for verification" required />
              </div>
            </div>
            <div class="text-center text-danger" >
              <label><i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i> Note: You can't delete a overtime category if its currently applied in overtime records</label>
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


<!-- Edit Overtime-->
<div class="modal fade" id="updateOT">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-md">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>Update Overtime</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Modal Header **End**-->
      <form class="form-horizontal" method="POST" id="updateform" action="function/overtime_edit.php" oninput="edit_percent.value=edit_rate.value">
        <!--OT id-->
        <input type="hidden" id="OT_id" name="OT_id">
        <!--Modal Body-->
        <div class="modal-body">
          <!--OT Names-->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">Name</label>
            <div class="col-sm-5">
              <input type="text" class="form-control border border-secondary" id="edit_name" name="edit_name" autocomplete="off" required pattern="[a-zA-Z\s]+" title="Please enter overtime name using letter only" />
            </div>
            <div class="col-sm-2">
              <label class="h-100 d-flex align-items-center"><input type="checkbox" class="mr-1" name="edit_status" value="active" id="edit_status" checked />Active</label>
            </div>
          </div> 
          <!--OT Rate-->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">(+ %Rate)</label>
            <div class="col-sm-8">
              <input type="number" class="form-control border border-secondary" id="edit_rate" name="edit_rate" step="any" min=".1" value="0" required />
              <div class="input-group-append">
                <span class="input-group-text"><strong class="text-danger">Addtional Rate :</strong> Rate per Hour &times; 
                <output id="edit_percent"></output>%</span>
              </div>
            </div>
          </div>
        </div>
        <!--Modal Body **End**-->
        <!--Modal Footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-save"></i> Save</button>
        </div>
        <!--Modal Footer **End**-->
      </form>
    </div>
    <!--Modal Content **end**-->
  </div>
  <!--Modal Dialog **end**-->
</div>
<!-- Add Overtime **End**-->



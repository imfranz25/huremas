
<!-- progres Task-->
<div class="modal fade" id="addProg">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-lg">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>New Progress for: <span id="title"></span></b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>
      <!--Modal Header **End**-->
      <form class="form-horizontal" method="POST" action="function/progress_add.php" >
        <!--Modal Body-->
        <input type="hidden" name="task_id" id="ttid" >
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <br>
                <label class="bold">Progress Description</label>
                <textarea name="progress" id="" cols="60" rows="10" class="form-control" required=""></textarea>
              </div>
              <div class="form-group clearfix">
                <div class="icheck-primary d-inline">
                  <input type="checkbox" name="is_complete" value="1">
                  <b><label for="is_complete">Task Completed</label></b>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!--Modal Body **End**-->
        <!--Modal Footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
    <!--Modal Footer **End**-->
  </div>
  <!--Modal Content **end**-->
</div>
<!-- Add progres **End**-->


<!-- Delete -->
<div class="modal fade" id="deleteProg">
  <div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
      	<h4 class="modal-title"><b><span>Delete</span></b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    	</div>
      <form class="form-horizontal" method="POST" action="function/progress_delete.php">
        <div class="modal-body">
      		<input type="hidden" id="delid" name="id">
          <input type="hidden" id="deltid" name="tid">
          <input type="hidden" id="delstats" name="stats">
      		<div class="text-center">
          	<label>Are you sure you want to delete this progress record? </label>
            <div class="text-center text-danger" >
              <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
              <label> Note: This process cannot be undone</label>
            </div>
        	</div>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default btn-flat pull-left closeModal" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- edit Task-->
<div class="modal fade" id="updateTask">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-lg">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>Edit Task</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>
      <!--Modal Header **End**-->
      <form class="form-horizontal" method="POST" action="function/progress_edit.php" >
        <!--Modal Body-->
        <input type="hidden" id="tid2" name="id">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label for="">Task</label>
                <input type="text" class="form-control form-control-sm" name="task" id="task1" required>
              </div>
              <div class="form-group">
                <label for="">Assign To</label>
                <b><label id="employee_id"></label></b>
              </div>
              <div class="form-group">
                <label for="">Due Date</label>
                <input type="date" class="form-control form-control-sm" name="due_date" id="due_date" required>
              </div>
            </div>
            <div class="col-md-7">
              <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="decs" cols="30" rows="10" class="summernote form-control"></textarea>
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
      </form>
    </div>
    <!--Modal Footer **End**-->
  </div>
  <!--Modal Content **end**-->
</div>
<!-- Add edit **End**-->


<!-- view -->
<div class="modal fade" id="viewTask">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b><span>View Task</span></b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-6">
              <dl>
                <dt><b class="border-bottom border-success"> Task</b></dt>
                <dd id="task"></dd>
              </dl>
              <dl>
                <dt><b class="border-bottom border-success"> Assign To</b></dt>
                <dd id="name"></dd>
              </dl>
            </div>
            <div class="col-md-6">
              <dl>
                <dt><b class="border-bottom border-success"> Due Date</b></dt>
                <dd id="due"></dd>
              </dl>
              <dl>
                <dt><b class="border-bottom border-success"> Status</b></dt>
                <dd id="status"></dd>
              </dl>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <dl>
              <dt><b class="border-bottom border-success"> Description</b></dt>
              <dd id="desc"></dd>
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



<!-- view progress -->
<div class="modal fade" id="viewProg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b><span id="viewtitle"></span></b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:right;">
        <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body" id="VP" style="overflow:auto;max-height: 480px;">
        <!-- body start -->
      </div>
      <!-- body end -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>
  </div>
</div>


<!-- edit progress-->
<div class="modal fade" id="EditProg">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-lg">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b><span id="Ptitle"></span></b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>
      <!--Modal Header **End**-->
      <!--Modal Body-->
      <form class="form-horizontal" method="POST" action="function/progress_edit.php" >
        <input type="hidden" name="pid" id="pid" >
        <input type="hidden" name="tid" id="taskids" >
         <div class="col-lg-12">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <br>
                  <label class="bold">Progress Description</label>
                  <textarea name="progress" id="edit_progress" cols="60" rows="10" class="form-control" required=""></textarea>
                </div>
                <div class="form-group clearfix">
                  <div class="icheck-primary d-inline">
                    <input type="checkbox" name="is_complete" value="1" id="compCheckbox">
                    <b><label for="is_complete">Task Completed</label></b>
                    </div>
                </div>
              </div>
            </div>
          </div>
        <!--Modal Body **End**-->
        <!--Modal Footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left closeModal" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="editprogs"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
    <!--Modal Footer **End**-->
  </div>
  <!--Modal Content **end**-->
</div>
<!-- edit progress **End**-->

<script>
$(document).ready(function(){
  $('#employee_id').select2({
    placeholder:'Select Employee',
    width:'100%'
  });
});
</script>

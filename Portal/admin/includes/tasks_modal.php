
<!-- Add Task-->
<div class="modal fade" id="addTask">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>New Task</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <form class="form-horizontal" method="POST" action="function/tasks_add.php" >
                 <div class="col-lg-12">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="">Task</label>
                          <input type="text" class="form-control form-control-sm" name="task" required>
                        </div>
                        <div class="form-group">
                          <label for="">Assign To</label>
                          <select name="employee_id" class="form-control form-control-sm" required="">
                            <?php 
                            $employees = $conn->query("SELECT *,concat(lastname,' ',suffix,', ',firstname,' ',middlename) as name FROM employees order by concat(lastname,' ',suffix,', ',firstname,' ',middlename) asc");
                            while($row=$employees->fetch_assoc()):
                            ?>
                            <option value="<?php echo $row['employee_id'] ?>"><?php echo $row['name'] ?></option>
                            <?php endwhile; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">Due Date</label>
                          <input type="date" class="form-control form-control-sm" name="due_date"  required>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group">
                          <label for="">Description</label>
                          <textarea name="description" id="" cols="30" rows="10" class="summernote form-control"></textarea>
                        </div>
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
        </div>
            <!--Modal Footer **End**-->
    </div>
        <!--Modal Content **end**-->
</div>
    <!--Modal Dialog **end**-->

<!-- Add task **End**-->





  <!-- Delete -->
<div class="modal fade" id="deleteOT">
    <div class="modal-dialog">
          <div class="modal-content">
          	<div class="modal-header">
            	<h4 class="modal-title"><b><span>Delete</span></b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          	</div>
            <div class="modal-body">

            	<form class="form-horizontal" method="POST" action="function/tasks_delete.php">
            		<input type="hidden" id="tid" name="id">
            		<div class="text-center">
	                	<label>Are you sure you want to delete this task record? </label>
                    <h4><b><span id="taskname"></span></b></h4>
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
            <!--Modal Body-->
            <form class="form-horizontal" method="POST" action="function/tasks_edit.php" >
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
              </form>
            </div>
        </div>
            <!--Modal Footer **End**-->
    </div>
        <!--Modal Content **end**-->
</div>
    <!--Modal Dialog **end**-->

<!-- Add edit **End**-->



  <!-- view -->
<div class="modal fade" id="viewTask">
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
                        <dd id="status">
                         
                        </dd>
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




<script>
  $(document).ready(function(){

  $('#employee_id').select2({
    placeholder:'Select Employee',
    width:'100%'
  })


</script>



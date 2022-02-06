
<!-- Add Course-->
<div class="modal fade" id="courseNew">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Add Course</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/course_add.php" >
                <!--Course Code-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Course Code</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="code" autocomplete="off" minlength="5" required />
                  </div>
                </div>
                <!--Course Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Course Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="title" autocomplete="off" required />
                  </div>
                </div>

                <!--Details-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Details</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" required="" autocomplete="off" rows="8" name='details'></textarea>
                  </div>
                </div>
            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="reset" class="btn btn-default btn-flat pull-left"><i class="fa fa-window-restore"></i> Set to Default</button>
              <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add Course **End**-->


<!-- Edit Course-->
<div class="modal fade" id="courseEdit">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Edit Course</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/course_edit.php" >
                <input type="hidden" name="id" class="course_id">
                <!--Course Code-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Course Code</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary course_code" name="code" pattern=".{5,}" title="Minimum of 5 character code" autocomplete="off" required />
                  </div>
                </div>
                <!--Course Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Course Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary course_title" name="title" autocomplete="off" required />
                  </div>
                </div>

                <!--Details-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Details</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary course_details" required="" autocomplete="off" rows="8" name='details'></textarea>
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
<!-- Edit Course **End**-->


<!-- View Course-->
<div class="modal fade" id="courseView">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>View Course Details</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
                <!--Course Code-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Course Code</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary course_code" readonly="" />
                  </div>
                </div>
                <!--Course Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Course Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary course_title" readonly="" />
                  </div>
                </div>

                <!--Details-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Details</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary course_details" readonly="" rows="8" ></textarea>
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
<!-- Edit Course **End**-->

<!-- Delete Course -->
<div class="modal fade" id="courseDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Delete</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/course_delete.php">
                <input type="hidden" class="course_id" name="id">
                <div class="text-center">
                    <label>Are you sure you want to delete the following course title?</label>
                    <h2 id="del_course" class="bold"></h2>
                    <label id="del_code"></label>
                    <hr>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control border border-secondary" name="pass" required placeholder="Please enter your password for verification" />
                      </div>
                    </div>
                    <div class="text-center text-danger" >
                      <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                      <label> Note: You can't delete a course record if its currently applied in training list</label>
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







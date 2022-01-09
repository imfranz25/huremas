
<!-- Add DTR-->
<div class="modal fade" id="addIn">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Time-In</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/dtr_add.php" >
                <input type="hidden" name="empid" value="<?php echo $eid; ?>">
                <!--Code & Status-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Employee ID </label>
                  <div class="col-sm-6">
                    <input type="text" id="" class="form-control border border-secondary" name="eid" />
                  </div>
                </div>
            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="addIn"><i class="fa fa-save"></i> Submit</button>
              </form>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add Overtime **End**-->


<!-- Add DTR OUT-->
<div class="modal fade" id="addOut">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Time-Out</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/dtr_add.php" >
                <input type="hidden" name="empid" value="<?php echo $eid; ?>">
                <input type="hidden" id="timeouts" name="aid" >
                <!--Code & Status-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Employee ID </label>
                  <div class="col-sm-6">
                    <input type="text" id="" class="form-control border border-secondary" name="eid" />
                  </div>
                </div>
            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="addOut"><i class="fa fa-save"></i> Submit</button>
              </form>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add Overtime **End**-->






<!-- EDIT DTR-->
<div class="modal fade" id="editDTR">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Request Time Correction</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/dtr_edit.php" >
                <input type="hidden" name="aid" id="edit_id">
                <!--OT Names-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Time-in</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="timein" name="timein" >
                  </div>
                </div>
                <!--OT Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Time-out</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="timeout" name="timeout" > 
                  </div>
                </div>
                 <!--Trainer Details-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Reason</label>
                  <div class="col-sm-10">
                    <textarea class="form-control border border-secondary" rows="8"  name="reason" required=""></textarea>
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



<!-- view req -->

<div class="modal fade" id="viewReq">
    <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b><span >Request List</span></b></h4>
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






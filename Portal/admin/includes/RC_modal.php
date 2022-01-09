
<!-- RC Request Review-->
<div class="modal fade" id="review_req">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Review Time Record Correction Request</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form action="function/RC_review.php" method="POST">
                <input type="hidden" name="id" id="RC_id">
                <input type="hidden" name="aid" id="A_id">

                <!--CA Account-->
                <center><h5>Current Record</h5></center><br>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label ">Time-in</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="timein" name="" readonly="">
                  </div>
                </div>
                <!--OT Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label ">Time-out</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="timeout" name="" readonly> 
                  </div>
                </div>

                <hr class="divider" />
                <center><h5>Change Request</h5></center><br>

                <!--Amount-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label ">Time-in</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="timein2" name="timein" readonly >
                  </div>
                </div>
                <!--OT Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label ">Time-out</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="timeout2" name="timeout" readonly> 
                  </div>
                </div>

               
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label ">Reason</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary RC_reason" name="reason" rows="5" readonly="" id="RC_reason" ></textarea>
                  </div>
                </div>   
              
            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="reject"><i class="fa fa-thumbs-o-down"></i> Reject</button>
              <button type="submit" class="btn btn-success btn-flat" name="approve" formnovalidate><i class="fa fa-thumbs-o-up"></i> Approve</button>
            </div>
            <!--Modal Footer **End**-->

            </form>
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!--CA Request Review **End**-->




<!-- RC Request Review-->
<div class="modal fade" id="view">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>View Time Record Correction Request</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">

                <!--CA Account-->
                <center><h5>Current Record</h5></center><br>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label ">Time-in</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="timeina" name="" readonly="">
                  </div>
                </div>
                <!--OT Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label ">Time-out</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="timeouta" name="" readonly> 
                  </div>
                </div>

                <hr class="divider" />
                <center><h5>Change Request</h5></center><br>

                <!--Amount-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label ">Time-in</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="timeinb" name="" readonly >
                  </div>
                </div>
                <!--OT Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label ">Time-out</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" id="timeoutb" name="" readonly> 
                  </div>
                </div>

               
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label ">Reason</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary RC_reason" name="reason" rows="5" readonly="" id="RC_reasonc" ></textarea>
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
<!--CA Request Review **End**-->




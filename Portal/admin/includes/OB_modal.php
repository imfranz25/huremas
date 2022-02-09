
<!-- RC Request Review-->
<div class="modal fade" id="review_req">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-lg">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>Review Official Business Request</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Modal Header **End**-->
      <form action="function/OB_review.php" method="POST">
        <input type="hidden" name="id" id="OT_id">
        <!--Modal Body-->
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Employee</label>
            <div class="col-sm-9">
              <input type="text" id="name" class="form-control form-control-sm" name="" readonly="">
            </div>
          </div>
          <!--date-->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Date</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="date" name="date" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label ">Start Time</label>
            <div class="col-sm-9 bootstrap-timepicker">
              <input type="time" class="form-control timepicker" id="startTime" name="start" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label ">End Time</label>
            <div class="col-sm-9 bootstrap-timepicker">
              <input type="time" class="form-control timepicker" id="endTime" name="end" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label ">Details</label>
            <div class="col-sm-9">
              <textarea class="form-control border border-secondary " name="reason" rows="3" readonly="" id="OT_reason" ></textarea>
            </div>
          </div>   
          <hr class="divider" />
          <!--select option-->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">Evaluation</label>
            <div class="col-sm-9">
              <select id="Status" name="Status" class="form-control border border-secondary" required>
                <option value="0">--Select--</option>
                <option value="1">Approved</option>
                <option value="2">Rejected</option>
              </select>
            </div>
          </div>
          <div class="form-group row" id="ottype" style="display: none;">
            <label class="col-sm-3 col-form-label req">Allowance</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm"  id="type" name="type" required>
            </div>
          </div>
          <div class="form-group row" id="notes" style="display: none;">
            <label class="col-sm-3 col-form-label ">Notes</label>
            <div class="col-sm-9">
              <textarea class="form-control border border-secondary " name="notes" rows="3" id="note" ></textarea>
            </div>
          </div>   
        </div>
        <!--Modal Body **End**-->
        <!--Modal Footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="submit" formnovalidate><i class="fa fa-save"></i> Save</button>
        </div>
        <!--Modal Footer **End**-->
      </form>
    </div>
    <!--Modal Content **end**-->
  </div>
  <!--Modal Dialog **end**-->
</div>
<!--CA Request Review **End**-->


<!-- OT View-->
<div class="modal fade" id="view">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-lg">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>View Official Business</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Modal Header **End**-->
      <!--Modal Body-->
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Employee</label>
          <div class="col-sm-9">
            <input type="text" id="name1" class="form-control form-control-sm" name="" readonly="">
          </div>
        </div>
        <!--date-->
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Date</label>
          <div class="col-sm-9">
            <input type="date" class="form-control" id="date1" name="date" readonly="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label ">Start Time</label>
          <div class="col-sm-9 bootstrap-timepicker">
            <input type="time" class="form-control timepicker" id="startTime1" name="start" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label ">End Time</label>
          <div class="col-sm-9 bootstrap-timepicker">
            <input type="time" class="form-control timepicker" id="endTime1" name="end" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label ">Details</label>
          <div class="col-sm-9">
            <textarea class="form-control border border-secondary " name="reason" rows="3" readonly="" id="OT_reason1" ></textarea>
          </div>
        </div>   
        <hr class="divider" />
        <!--select option-->
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Evaluated By</label>
          <div class="col-sm-9">
            <input type="text" id="evalby" class="form-control form-control-sm" name="task" readonly="">
          </div>
        </div>
        <div class="form-group row" id="ottype1">
          <label class="col-sm-3 col-form-label">Allowance</label>
          <div class="col-sm-9">
            <input type="text" id="type1" class="form-control form-control-sm" name="" readonly="">
          </div>
        </div>
        <div class="form-group row" id="notes1" >
          <label class="col-sm-3 col-form-label ">Notes</label>
          <div class="col-sm-9">
            <textarea class="form-control border border-secondary " name="notes" rows="3" id="note1" readonly ></textarea>
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
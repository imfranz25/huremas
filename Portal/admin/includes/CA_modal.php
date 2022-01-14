
<!-- CA Request Review-->
<div class="modal fade" id="review_req">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Review Cash Advance Request</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form action="function/ca_review.php" method="POST">
                <input type="hidden" name="id" id="CA_id">
                 <!--Date Request-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Date Requested</label>
                  <div class="col-sm-9">
                    <input type="text" id="CA_date" class="form-control border border-secondary edit_CA_date" readonly="" />
                  </div>
                </div>

                <!--CA Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">CA Type</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_CA_type" readonly="" />
                  </div>
                </div>

                <!--Amount-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Amount</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_CA_amount" readonly="" />
                  </div>
                </div>

                <!--Tax Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Reason</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary edit_CA_reason" name="reason" rows="5" readonly="" ></textarea>
                  </div>
                </div>

                <hr class="divider" />

                <!--CA Note-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Add Note</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" name="notes" rows="5" required="" ></textarea>
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





<!-- CA Request View-->
<div class="modal fade" id="view_req">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>View Cash Advance</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
                 <!--Date Request-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Date Requested</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_CA_date" readonly="" />
                  </div>
                </div>

                <!--CA Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">CA Type</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_CA_type" readonly="" />
                  </div>
                </div>

                <!--Amount-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Amount</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_CA_amount" readonly="" />
                  </div>
                </div>

                <!--Tax Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Reason</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary edit_CA_reason"  rows="5" readonly="" ></textarea>
                  </div>
                </div>

                <div id="note_section">
                  <hr class="divider" />
                  <!--CA Note-->
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Note</label>
                    <div class="col-sm-9">
                      <textarea class="form-control border border-secondary edit_CA_notes" rows="5" readonly="" ></textarea>
                    </div>
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





<!----============================================CA Request============================-------------->


<!-- CA Request-->
<div class="modal fade" id="reqCA">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Request Cash Advance</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" id="form_tax" method="POST" action="function/CA_add.php">

                 <!--Date Request-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Date Request</label>
                  <div class="col-sm-9">
                    <input type="text" id="CA_date" class="form-control border border-secondary" readonly="" value="<?php echo date('F d, Y'); ?>" >
                  </div>
                </div>

                <!--CA Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">CA Type</label>
                  <div class="col-sm-9">
                    <select name="type" class="form-control border border-secondary" required>
                      <option value="" selected>--Select Type--</option>
                      <option value="Cash">Cash</option>
                      <option value="Cheque">Cheque</option>
                    </select>
                  </div>
                </div>

                <!--Amount-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Amount</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control border border-secondary" step="1" required="" min="1" max="99999" name="amount"  />
                  </div>
                </div>

                <!--Tax Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Reason</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" name="reason" rows="5" required=""></textarea>
                  </div>
                </div>

              
            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="reset" class="btn btn-default btn-flat pull-left" id="reset_adeduc"><i class="fa fa-window-restore"></i> Set to Default</button>
              <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Request CA **End**-->


<!-- CA Request Edit-->
<div class="modal fade" id="edit_req">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Edit Cash Advance Request</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" id="form_tax" method="POST" action="function/CA_edit.php">
                <input type="hidden" id="CA_id" name="id" >
                 <!--Date Request-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Date Requested</label>
                  <div class="col-sm-9">
                    <input type="text" id="CA_date" class="form-control border border-secondary edit_CA_date" readonly="" >
                  </div>
                </div>

                <!--CA Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">CA Type</label>
                  <div class="col-sm-9">
                    <select name="type" class="form-control border border-secondary edit_CA_type" required>
                      <option value="Cash">Cash</option>
                      <option value="Cheque">Cheque</option>
                    </select>
                  </div>
                </div>

                <!--Amount-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Amount</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control border border-secondary edit_CA_amount" step="1" required="" min="1" max="99999" name="amount"  />
                  </div>
                </div>

                <!--Tax Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Reason</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary edit_CA_reason" name="reason" rows="5" required=""></textarea>
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
<!-- CA Request Edit **End**-->



<!-- CA Request View-->
<div class="modal fade" id="view_req">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Cash Advance Request Details</b></h4>
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
<!-- CA Request View **End**-->





<!-- Delete CA -->
<div class="modal fade" id="cancelCA">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Delete</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/CA_delete.php">
                <input type="hidden" id="cancel_CA" name="id">
                <div class="text-center">
                    <label>Are you sure you want to cancel this Cash Advance request?</label>
                    <h2 id="cancel_ref" class="bold"></h2>
                    <div class="text-center text-danger" >
                      <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                      <label> Note: This process cannot be undone</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Cancel Request</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!--======================Status CA===============================-->
  <!-- CA Request Review-->
<div class="modal fade" id="status_req">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Review Cash Advance Status</b></h4>
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

                <!--CA Status-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Reviewed By</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_CA_review" readonly="" />
                  </div>
                </div>

                <!--CA Status-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Status</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_CA_status" readonly="" />
                  </div>
                </div>

                <!--CA Note-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Internal Note</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary edit_CA_notes" name="notes" rows="5" readonly=""></textarea>
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

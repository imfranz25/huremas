
<!-- Employee Document Request-->
<div class="modal fade" id="emp_request" style="background:rgba(0, 0, 0, .7);">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Request Document</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="function/document_request_add.php">

                <!--Owner-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Request Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary" name="name" autocomplete="off" minlength="4" required   />
                     </div>
                </div>

                <!--Internal Note-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Internal Note</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" required rows="8" name='details'></textarea>
                  </div>
                </div>


            </div>
            <!--Modal Body **End**-->
            
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal" ><i class="fa fa-close"></i> Close</button>
              <button type="submit" name="add" class="btn btn-success btn-flat pull-left"><i class="fa fa-save"></i> Save</button>
            </div>
            <!--Modal Footer **End**-->
            </form>
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add Employee Request END-->



<!-- Employee Document Request Edit-->
<div class="modal fade" id="emp_request_edit" style="background:rgba(0, 0, 0, .7);">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b> Edit Document Request</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="function/document_request_edit.php">
                <input type="hidden" name="reference_id" class="request_id" />

                <!--Owner-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Request Date</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_date" readonly   />
                     </div>
                </div>

                <!--Owner-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Request Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_name" name="name" autocomplete="off" minlength="4" required   />
                     </div>
                </div>

                <!--Internal Note-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Internal Note</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary view_request_details" required rows="8" name='details'></textarea>
                  </div>
                </div>

            </div>
            <!--Modal Body **End**-->
            
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal" ><i class="fa fa-close"></i> Close</button>
              <button type="submit" name="edit" class="btn btn-success btn-flat pull-left"><i class="fa fa-save"></i> Update</button>
            </div>
            <!--Modal Footer **End**-->
            </form>
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Edit Employee Request END-->



<!-- Employee Document Review -->
<div class="modal fade" id="emp_request_review" style="background:rgba(0, 0, 0, .7);">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Review Document Request</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">

                <!--Owner-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Request Date</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_date" readonly   />
                     </div>
                </div>

                <!--Status-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Request Status</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_status" readonly   />
                     </div>
                </div>

                <!--Owner-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Request Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_name" readonly  />
                     </div>
                </div>

                <!--Internal Note-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Internal Note</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary view_request_details" readonly rows="8" ></textarea>
                  </div>
                </div>

                <hr class="divider" />

                <!--File-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Requested File</label>
                    <div class="col-sm-9">
                      <a href="" target="_blank" class="view_request_file form-control"></a>
                     </div>
                </div>

                <!--Comment-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Comment</label>
                    <div class="col-sm-9">
                        <textarea class="form-control border border-secondary view_request_comment" rows="8"  readonly ></textarea>
                     </div>
                </div>


            </div>
            <!--Modal Body **End**-->
            
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal" ><i class="fa fa-close"></i> Close</button>

            </div>
            <!--Modal Footer **End**-->

        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Review Employee Request END-->





<!-- CANCEL REQUEST -->
<div class="modal fade" id="cancelreq" style="background: rgba(0, 0, 0, .7);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Cancel Request</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/document_request_delete.php">
                <input type="hidden" class="request_id" name="reference_id">
                <div class="text-center">
                    <label>Are you sure you want to cancel this request?</label>
                    <h2 class="req_name_cancel bold"></h2>
                    <label class="req_date_cancel"></label>
                    <div class="text-center text-danger" >
                      <label><i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i> Once this request is cancelled, it can't be undone.</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-ban"></i> Cancel Request</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- ADMIN Document Request REVIEW-->
<div class="modal fade" id="admin_request_review" style="background:rgba(0, 0, 0, .7);">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Review HR's Document Request</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" id="review_form" enctype="multipart/form-data" action="function/document_request_edit.php">
                <input type="hidden" name="reference_id" class="request_id" />

                <!--Date-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Request Date</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_date" readonly   />
                     </div>
                </div>

                <!--Status-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Request Status</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_status" readonly   />
                     </div>
                </div>

                <!--Title-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Request Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_name" readonly />
                     </div>
                </div>

                <!--Internal Note-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Internal Note</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary view_request_details" rows="8" readonly></textarea>
                  </div>
                </div>

                <hr class="divider my-4" />

                <!--File-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">File</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control border border-secondary request_file_upload d-none" name="file" />
                      <!-- INFO FOR FILE -->
                      <div class="input-group-append d-none" id="file_info_change">
                        <span class="input-group-text text-info" >
                          <i class="fa fa-info-circle"></i>
                          <strong>Leave upload file to default if you dont wish to change the document file</strong>
                        </span>
                      </div>
                      <a href="" target="_blank" class="view_request_file form-control"></a>
                     </div>
                </div>

                <!--Comment-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Comment</label>
                    <div class="col-sm-9">
                      <textarea class="form-control border border-secondary view_request_comment" rows="8" name="comment" readonly required></textarea>
                     </div>
                </div>

            </div>
            <!--Modal Body **End**-->
            
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal" ><i class="fa fa-close"></i> Close</button>
              <button type="button" name="reply" class="btn btn-warning text-dark btn-flat pull-left validated_reply edit_btn"><i class="fa fa-save"></i> Edit</button>
              <button type="button" class="btn btn-danger btn-flat pull-left edit_reply validated_reply d-none" id="cancel_edit"><i class="fa fa-ban"></i> Cancel</button>
              <button type="submit" name="reply" class="btn btn-success btn-flat pull-left edit_reply validated_reply d-none"><i class="fa fa-save"></i> Save</button>
            </div>
            <!--Modal Footer **End**-->
            </form>
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Edit Employee Request END-->
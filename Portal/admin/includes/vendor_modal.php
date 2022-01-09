<!----============================================Vendor============================-------------->
<!-- Add Vendor-->
<div class="modal fade" id="vendorNew">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Add Vendor</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/vendor_add.php" >
                <!--Vendor Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="name" autocomplete="off" required />
                  </div>
                </div>
                <!--Vendor ID-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Account ID</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="acc_id" autocomplete="off" required />
                  </div>
                </div>
                <!--Vendor Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Type</label>
                  <div class="col-sm-9">
                    <select id="type" name="type" class="form-control border border-secondary" required>
                      <option value="" selected>--Select Type--</option>
                      <option value="Local">Local</option>
                      <option value="Private" >Private</option>
                      <option value="Government">Government</option>
                      <option value="International">International</option>
                    </select>
                  </div>
                </div>
                <!--Vendor Address-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Address</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" required="" autocomplete="off" name='address'></textarea>
                  </div>
                </div>
                <!--Vendor Details-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Details</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" required="" autocomplete="off" rows="5" name='details'></textarea>
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
<!-- Add Vendor **End**-->


<!-- Edit Vendor-->
<div class="modal fade" id="vendorEdit">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Update Vendor</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/vendor_edit.php" >
                <input type="hidden" name="vendor_id" id="vendor_id" />
                <!--Vendor Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_vname"  name="name" autocomplete="off" required />
                  </div>
                </div>
                <!--Vendor ID-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Account ID</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_acc_id" name="acc_id" autocomplete="off" required />
                  </div>
                </div>
                <!--Vendor Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Type</label>
                  <div class="col-sm-9">
                    <select name="type" class="form-control border border-secondary edit_vtype" required>
                      <option value="Local">Local</option>
                      <option value="Private" >Private</option>
                      <option value="Government">Government</option>
                      <option value="International">International</option>
                    </select>
                  </div>
                </div>
                <!--Vendor Address-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Address</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary edit_vadd" required="" autocomplete="off" name='address'></textarea>
                  </div>
                </div>
                <!--Vendor Details-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Details</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary edit_vdetails" required="" autocomplete="off" rows="5" name='details'></textarea>
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
<!-- Edit Vendor **End**-->


<!-- Delete Vendor -->
<div class="modal fade" id="vendorDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Delete</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/vendor_delete.php">
                <input type="hidden" id="del_vendor" name="id">
                <div class="text-center">
                    <label>Are you sure you want to delete this vendor record(s)?</label>
                    <h2 id="del_vname" class="bold"></h2>
                    <div class="text-center text-danger" >
                      <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                      <label> Note: This process cannot be undone</label>
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




<!--====================================View Vendor=========================-->


<!-- Edit Vendor-->
<div class="modal fade" id="view_desc">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>View Vendor Details</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
                <!--Vendor Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_vname" readonly />
                  </div>
                </div>
                <!--Vendor ID-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Account ID</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_acc_id" readonly />
                  </div>
                </div>
                <!--Vendor Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Type</label>
                  <div class="col-sm-9">
                    <input type="text"  class="form-control border border-secondary edit_vtype" readonly>
                  </div>
                </div>
                <!--Vendor Address-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary edit_vadd" readonly></textarea>
                  </div>
                </div>
                <!--Vendor Details-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Details</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary edit_vdetails" readonly rows="5"></textarea>
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
<!-- Edit Vendor **End**-->

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
              <form class="form-horizontal" method="POST" action="function/training_vendor_add.php" >
                <!--Vendor Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Vendor Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="name" autocomplete="off" required />
                  </div>
                </div>
                <!--Email-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control border border-secondary" name="email" autocomplete="off" required />
                  </div>
                </div>
                <!--Contact-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Contact</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="contact" autocomplete="off" pattern="[0-9]+" title="User number format" required />
                  </div>
                </div>
                <!--Contact Person-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Contact Person</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="c_person" autocomplete="off"  required />
                  </div>
                </div>
                <!--Experience-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Experience</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" required="" rows="8" name="exp"></textarea>
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
              <h4 class="modal-title"><b>Edit Vendor</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/training_vendor_edit.php" >
                <input type="hidden" name="id" class="vendor_id">
                <!--Vendor Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Vendor Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary vendor_name" name="name" autocomplete="off" required />
                  </div>
                </div>
                <!--Email-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control border border-secondary vendor_email" name="email" autocomplete="off" required />
                  </div>
                </div>
                <!--Contact-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Contact</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary vendor_contact" name="contact" autocomplete="off" pattern="[0-9]+" title="User number format" required />
                  </div>
                </div>
                <!--Contact Person-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Contact Person</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary vendor_cperson" name="c_person" autocomplete="off"  required />
                  </div>
                </div>
                <!--Experience-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Experience</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary vendor_exp" required="" rows="8" name="exp"></textarea>
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
              <form class="form-horizontal" method="POST" action="function/training_vendor_delete.php">
                <input type="hidden" class="vendor_id" name="id">
                <div class="text-center">
                    <label>Are you sure you want to delete the following training vendor(s)?</label>
                    <h2 id="del_vendor" class="bold"></h2>
                    <label id="del_code"></label>
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







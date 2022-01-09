


<!----============================================Deduction============================-------------->


<!-- Add Deduction-->
<div class="modal fade" id="deducNew">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Add Deduction</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" id="form_deduc" method="POST" action="function/deduction_add.php" oninput="deduc_amt.value=amount.value" >

                <!--Deduction Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="name" autocomplete="off" required />
                  </div>
                </div>

                <!--Deduction Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Type</label>
                  <div class="col-sm-9">
                    <select id="type" name="type" class="form-control border border-secondary alltype" required>
                      <option value="" selected>--Select Type--</option>
                      <option value="Fixed Amount">Fixed Amount</option>
                      <option value="Hour Amount">Hour Amount</option>
                      <option value="Hour Percent">Hour Percent</option>
                      <option value="Gross Percent">Gross Percent</option>
                    </select>
                  </div>
                </div>

                <!--Deduction Vendor-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Vendor</label>
                  <div class="col-sm-9">
                    <select id="vendor" name="vendor" class="form-control border border-secondary" required>
                      <option value="" selected>--Select Vendor--</option>
                       <?php
                          $sql = "SELECT * FROM deduction_vendor";
                          $query = $conn->query($sql);
                          while($vrow = $query->fetch_assoc()){
                            echo "
                              <option value='".$vrow['id']."'>".$vrow['vendor_name']."</option>
                            ";
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <!--Deduction Amount-->
                <div class="form-group row deduc_amt">
                  <label class="col-sm-3 col-form-label amt_title req">Amount</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control num_valid border border-secondary" name="amount" step=".01" min="0" required autocomplete="off" max="99999" onKeyPress="if(this.value.length==8) return false;" />
                    <div class="input-group-append">
                      <span class="input-group-text"><strong class="text-danger">Formula :</strong>
                        <label class="type_title"></label> 
                        <output id="deduc_amt"></output>
                        <label class="unit"></label>
                      </span>
                    </div>
                  </div>
                </div>

                <!--Deduction Limit-->
                <div class="form-group row limit d-none">
                  <label class="col-sm-3 col-form-label">Limit</label>
                  <div class="col-sm-6">
                    <input type="number" class="form-control border border-secondary"  name="limit" min="0" step="any" value="0"/>
                  </div>
                  <!--Deduction Period-->
                  <div class="col-sm-3">
                    <select name="period" class="custom-select border border-secondary w-100">
                      <option value="None" selected>None</option>
                      <option value="Weekly">Weekly</option>
                      <option value="Period">Period</option>
                      <option value="Annual">Annual</option>
                    </select>
                  </div>
                  <!--Note-->
                  <div class="col-sm-3"></div>
                  <div class="input-group-append col-sm-8">
                    <div class="text-info" >
                      <i class="fa fa-info mx-1" aria-hidden="true"></i>
                      <label>(Optional) Maximum limit for this deduction</label>
                    </div>
                  </div>
                </div>

                <!--Deduction Description-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" required="" rows="4" autocomplete="off" name='desc'></textarea>
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
<!-- Add Deduction **End**-->



<!-- Edit Deduction-->
<div class="modal fade" id="deducEdit">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Update Deduction</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" id="edit_form_deduc" method="POST" action="function/deduction_edit.php" oninput="edit_deduc_amt.value=amount.value" >
                <input type="hidden" id="edit_did" name="id">
                <!--Deduction Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" id="edit_dname" name="name" autocomplete="off" required />
                  </div>
                </div>

                <!--Deduction Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Type</label>
                  <div class="col-sm-9">
                    <select id="type" name="type" class="form-control border border-secondary alltype" required>
                      <option value="Fixed Amount">Fixed Amount</option>
                      <option value="Hour Amount">Hour Amount</option>
                      <option value="Hour Percent">Hour Percent</option>
                      <option value="Gross Percent">Gross Percent</option>
                    </select>
                  </div>
                </div>

                <!--Deduction Vendor-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Vendor</label>
                  <div class="col-sm-9">
                    <select id="edit_dvendor" name="vendor" class="form-control border border-secondary" required>
                       <?php
                          $sql = "SELECT * FROM deduction_vendor";
                          $query = $conn->query($sql);
                          while($vrow = $query->fetch_assoc()){
                            echo "
                              <option value='".$vrow['id']."'>".$vrow['vendor_name']."</option>
                            ";
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <!--Deduction Amount-->
                <div class="form-group row deduc_amt">
                  <label class="col-sm-3 col-form-label amt_title req">Amount</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control border border-secondary edit_damt num_valid" name="amount" step=".01" min="0" required autocomplete="off" max="99999" onKeyPress="if(this.value.length==8) return false;" />
                    <div class="input-group-append">
                      <span class="input-group-text"><strong class="text-danger">Formula :</strong>
                        <label class="type_title"></label> 
                        <output id="edit_deduc_amt"></output>
                        <label class="unit"></label>
                      </span>
                    </div>
                  </div>
                </div>

                <!--Deduction Limit-->
                <div class="form-group row limit">
                  <label class="col-sm-3 col-form-label">Limit</label>
                  <div class="col-sm-6">
                    <input type="number" class="form-control border border-secondary" id="edit_dlimit"  name="limit" min="0" step="any" value="0"/>
                  </div>
                  <!--Deduction Period-->
                  <div class="col-sm-3">
                    <select name="period" id="edit_dperiod" class="custom-select border border-secondary w-100">
                      <option value="None" selected>None</option>
                      <option value="Weekly">Weekly</option>
                      <option value="Period">Period</option>
                      <option value="Annual">Annual</option>
                    </select>
                  </div>
                  <!--Note-->
                  <div class="col-sm-3"></div>
                  <div class="input-group-append col-sm-9">
                    <div class="text-info" >
                      <i class="fa fa-info mx-1" aria-hidden="true"></i>
                      <label>(Optional) Maximum limit for this deduction</label>
                    </div>
                  </div>
                </div>

                <!--Deduction Description-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" id="edit_ddesc" required="" rows="4" autocomplete="off" name='desc'></textarea>
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
<!-- Edit Deduction **End**-->


<!-- Delete Deduction -->
<div class="modal fade" id="deducDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Delete</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/deduction_delete.php">
                <input type="hidden" id="del_deduc" name="id">
                <div class="text-center">
                    <label>Are you sure you want to delete this deduction record(s)?</label>
                    <h2 id="del_dname" class="bold"></h2>
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










<!----===================================Tax============================-------------->


<!-- Add Tax-->
<div class="modal fade" id="taxNew">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-lg">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>Add Tax</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>
      <!--Modal Header **End**-->
      <form class="form-horizontal" id="form_tax" method="POST" action="function/tax_add.php" oninput="tax_amt.value=amount.value" >
        <!--Modal Body-->
        <div class="modal-body">
          <!--Tax Name-->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control border border-secondary" name="name" autocomplete="off" required />
            </div>
            <div class="col-sm-2">
              <label class="h-100 d-flex align-items-center" for="Tcheck"><input  type="checkbox"  id="Tcheck" class="mr-2" name="status" value="active" checked />Active</label>
            </div>
          </div>
          <!--Tax Vendor-->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">Vendor</label>
            <div class="col-sm-9">
              <select id="vendor" name="vendor" class="form-control border border-secondary" required>
                <option value="" selected>--Select Vendor--</option>
                 <?php
                    $sql = "SELECT * FROM deduction_vendor";
                    $query = $conn->query($sql);
                    while($vrow = $query->fetch_assoc()){
                      echo "<option value='".$vrow['id']."'>".$vrow['vendor_name']."</option>";
                    }
                  ?>
              </select>
            </div>
          </div>
          <!--Tax Type-->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">Type</label>
            <div class="col-sm-9">
              <select id="type" name="type" class="form-control taxstype border border-secondary" required>
                <option value="" selected>--Select Type--</option>
                <option value="Fixed Amount">Fixed Amount</option>
                <option value="Percentage">Percentage</option>
              </select>
            </div>
          </div>
          <!--Tax Amount-->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label amt_title req">Amount</label>
            <div class="col-sm-9">
              <input type="number" class="form-control tax_valid border border-secondary" name="amount" step=".01" min="0" required autocomplete="off" max="999999" onKeyPress="if(this.value.length==8) return false;" />
              <div class="input-group-append d-none for_class">
                <span class="input-group-text"><strong class="text-danger">Formula :</strong>
                  <label class="for_title"></label> 
                  <output id="tax_amt"></output>
                  <label class="tax_unit"></label>
                </span>
              </div>
            </div>
          </div>

            <!--Tax From-->
            <div class="form-group row">
              <label class="col-sm-3 col-form-label req">From Gross Pay Amount (Minimum)</label>
              <div class="col-sm-9">
                <input type="number" class="form-control tax_from border border-secondary" name="from" step=".01" required autocomplete="off" max="999999" onKeyPress="if(this.value.length==9) return false;" />
              </div>
            </div>

                <!--Tax To-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">To Gross Pay Amount (Maximum)</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control tax_to border border-secondary" name="to" step=".01" required autocomplete="off" max="999999" onKeyPress="if(this.value.length==9) return false;" />
                  </div>
                </div>

                <!--Tax Effective-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Effective From <label class="text-info">(Optional)</label></label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control border border-secondary start_date" name="start">
                  </div>
                </div>

                <!--Tax End-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Effective Until <label class="text-info">(Optional)</label></label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control border border-secondary end_date" name="end" disabled>
                  </div>
                </div>

                <!--Tax Description-->
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
<!-- Add Tax **End**-->



<!----=======================================Edit Tax============================-------------->


<!-- Edit Tax-->
<div class="modal fade" id="taxEdit">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Update Tax</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" id="edit_form_tax" method="POST" action="function/tax_edit.php" oninput="edit_output.value=edit_amount.value" >
                <input type="hidden" id="edit_tid" name="id">
                <!--Tax Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Name</label>
                  <div class="col-sm-7">
                    <input type="text" id="edit_tname" class="form-control border border-secondary" name="name" autocomplete="off" required />
                  </div>
                  <div class="col-sm-2">
                    <label class="h-100 d-flex align-items-center" for="edit_Tcheck"><input  type="checkbox"  id="edit_Tcheck" class="mr-2" name="status" value="active" checked />Active</label>
                  </div>
                </div>

                <!--Tax Vendor-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Vendor</label>
                  <div class="col-sm-9">
                    <select id="edit_tvendor" name="vendor" class="form-control border border-secondary" required>
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

                <!--Tax Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Type</label>
                  <div class="col-sm-9">
                    <select id="edit_ttype" name="type" class="form-control taxstype border border-secondary" required>
                      <option value="" selected>--Select Type--</option>
                      <option value="Fixed Amount">Fixed Amount</option>
                      <option value="Percentage">Percentage</option>
                    </select>
                  </div>
                </div>


                <!--Tax Amount-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label amt_title req">Amount</label>
                  <div class="col-sm-9">
                    <input type="number" id="edit_amount" class="form-control tax_valid border border-secondary" name="amount" step=".01" min="0" required autocomplete="off" max="999999" onKeyPress="if(this.value.length==8) return false;" />
                    <div class="input-group-append d-none for_class">
                      <span class="input-group-text"><strong class="text-danger">Formula :</strong>
                        <label class="for_title"></label> 
                        <output id="edit_output"></output>
                        <label class="tax_unit"></label>
                      </span>
                    </div>
                  </div>
                </div>

                <!--Tax From-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">From Gross Pay Amount (Minimum)</label>
                  <div class="col-sm-9">
                    <input type="number" id="edit_from" class="form-control tax_from border border-secondary" name="from" step=".01" required autocomplete="off" max="999999" onKeyPress="if(this.value.length==9) return false;" />
                  </div>
                </div>

                <!--Tax To-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">To Gross Pay Amount (Maximum)</label>
                  <div class="col-sm-9">
                    <input type="number" id="edit_to" class="form-control tax_to border border-secondary" name="to" step=".01" required autocomplete="off" max="999999" onKeyPress="if(this.value.length==9) return false;" />
                  </div>
                </div>

                <!--Tax Effective-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Effective From <label class="text-info">(Optional)</label></label>
                  <div class="col-sm-9">
                    <input type="date" id="edit_start" class="form-control border border-secondary start_date" name="start">
                  </div>
                </div>

                <!--Tax End-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Effective Until <label class="text-info">(Optional)</label></label>
                  <div class="col-sm-9">
                    <input type="date" id="edit_end" class="form-control border border-secondary end_date" name="end" disabled>
                  </div>
                </div>

                <!--Tax Description-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" id="edit_desc" required="" rows="4" autocomplete="off" name='desc'></textarea>
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
<!-- Edit Tax **End**-->


<!-- Delete Tax -->
<div class="modal fade" id="taxDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Delete</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/tax_delete.php">
                <input type="hidden" id="del_tax" name="id">
                <div class="text-center">
                    <label>Are you sure you want to delete this tax record(s)?</label>
                    <h2 id="del_tname" class="bold"></h2>
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



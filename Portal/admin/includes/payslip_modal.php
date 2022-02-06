
<!-- VIEW -->
<div class="modal fade" id="view">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	
            	<h4 class="modal-title"><b>Cavite State University - Imus Campus</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body" id="modalbody" >
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label ">Payment Date:</label>
                  <label class="col-sm-3 col-form-label " id="pday"></label>
              </div>
              
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label ">Period Covered:</label>
                  <label class="col-sm-3 col-form-label " id="pcovered"></label>
              </div>
              
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label ">Employee Name:</label>
                  <label class="col-sm-3 col-form-label " id="ename"></label>
                  <input type="hidden" name="" id="tg">
              </div>
              <hr>
              <div class="form-group row">
                  <div class="col-md-6 border-bottom">
                        <h4>EARNINGS</h4>
                  </div>
              </div>
              <div class="form-group">
                  <table  class="table table-bordered table-striped">
                    <tr id="earnings"></tr>
                    <tr id="numdays"></tr>
                    <tr id="total_salary"></tr>
                    <tr>
                      <td><label class='col-sm-12 col-form-label'>Adjustments:</label></td>
                    </tr>
                    <tr id="adjust"></tr>
                    <tr id="total"></tr>

                  </table>
              </div>
              <div class="form-group row">
                  <div class="col-md-6 border-bottom">
                        <h4>DEDUCTIONS</h4>
                  </div>
              </div>
              <div class="form-group" id="deduct">  
              </div>

              <div class="form-group row">
                  <div class="col-md-6 border-bottom">
                        <h4>NET EARNINGS</h4>
                  </div>
              </div>

              <div class="form-group">
                  <table  class="table table-bordered table-striped">
                    <tr id="netsalary"></tr>
                  </table>
              </div>


    
          	</div>
          	<div class="modal-footer">
          	    <button type="button" onClick="printDiv2()" class="btn btn-mat waves-effect waves-light btn-success" ><i class="fa fa-print"></i>Print</button>
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

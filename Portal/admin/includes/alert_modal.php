<style>
  /* CUSTOMIZE ALERT MODAL FOR MOVING APPLICANTS */
  .modal-confirm .modal-content {
    padding: 20px;
    font-size: 16px;
    border-radius: 5px;
    border: none;
  }
  .modal-confirm .modal-header {
    border-bottom: none;   
    position: relative;
    text-align: center;
    margin: -20px -20px 0;
    border-radius: 5px 5px 0 0;
    padding: 35px;
  }
  .modal-confirm h4 {
    text-align: center;
    font-size: 36px;
    margin: 10px 0;
  }
  .modal-confirm .form-control, .modal-confirm .btn {
    min-height: 40px;
    border-radius: 3px; 
  }
  .modal-confirm .close {
    position: absolute;
    top: 15px;
    right: 15px;
    color: #fff;
    text-shadow: 2px 1px black;
    opacity: 0.5;
  }
  .modal-confirm .close:hover {
    opacity: 0.8;
  }
  .modal-confirm .icon-box {
    color: #fff;    
    width: 95px;
    height: 95px;
    display: inline-block;
    border-radius: 50%;
    z-index: 9;
    padding: 15px;
    text-align: center;
  }
  .modal-confirm .icon-box i {
    font-size: 64px;
    margin: -4px 0 0 -4px;
  }
  .modal-confirm.modal-dialog {
    margin-top: 80px;
  }

</style>

<!--===============Success======================== -->

<div id="successModal" class="modal fade" style="background: rgb(0,0,0,.7);">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header justify-content-center bg-success">
        <div class="icon-box">
          <i class="fa fa-check-circle-o"></i>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body text-center">
        <h4>Success</h4> 
        <label id="success_msg"></label><br>
        <button class="btn btn-warning" data-dismiss="modal"><span>Continue</span> <i class="fa fa-arrow-circle-right ml-1"></i></button>
      </div>
    </div>
  </div>
</div> 


<!--===============Error======================== -->
<div id="errorModal" class="modal fade" style="background: rgb(0,0,0,.7);">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header justify-content-center bg-danger">
        <div class="icon-box">
          <i class="fa fa-times-circle-o"></i>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body text-center">
        <h4>Failed</h4> 
        <label id="error_msg"></label><br>
        <button class="btn btn-warning" data-dismiss="modal"><span>Continue</span> <i class="fa fa-arrow-circle-right ml-1"></i></button>
      </div>
    </div>
  </div>
</div> 


<!--===============Warning======================== -->
<div id="fullModal" class="modal fade" style="background: rgb(0,0,0,.7);">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header justify-content-center bg-warning">
        <div class="icon-box">
          <i class="fa fa-exclamation-triangle"></i>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body text-center">
        <h4>Opps</h4> 
        <label id="warn_msg"></label><br>
        <button class="btn btn-warning" data-dismiss="modal"><span>Continue</span> <i class="fa fa-arrow-circle-right ml-1"></i></button>
      </div>
    </div>
  </div>
</div> 



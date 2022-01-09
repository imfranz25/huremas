

<!-- default styles -->
  <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />

  <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />

  <!-- important mandatory libraries -->
  <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/locales/LANG.js"></script>


<!-- Review Training-->
<div class="modal fade" id="trainingRev" style="background: rgb(0, 0, 0,.7);">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
          <form method="POST" action="function/training_rate.php">
            <input type="hidden" class="ref_review" name="ref_review">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Review Training</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
                <!--Title-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_title" readonly="" />
                  </div>
                </div>

                <!--Course-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Course</label>
                  <div class="col-sm-10">
                    <input type="text" class="training_course_view border border-secondary form-control" readonly="">
                  </div>
                </div>


                <!--Training Mode-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Mode</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_mode" readonly>
                  </div>
                </div>

                <!--Trainer-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Trainer</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_trainer" readonly />
                  </div>
                </div>

                <hr class="divider" />

                <!--Rate-->
                <div class="form-group row">
                  <label for="rate_star" class="col-sm-2 col-form-label">Rate</label>
                  <div class="col-sm-10 mx-auto">
                    <input id="rate_star" name="rate" required class="rating rating-loading" data-min="0" data-max="5" data-step="1">
                  </div>
                </div>

                <!--Trainer-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Comment</label>
                  <div class="col-sm-10">
                    <textarea class="form-control border border-secondary" rows="8" required name="comment"> </textarea>
                  </div>
                </div>

            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" name="save" class="btn btn-warning btn-flat pull-left text-dark"><i class="fa fa-star"></i> Save</button>
            </div>
            <!--Modal Footer **End**-->
            </form>
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- View Training **End**-->




<!-- Review Training-->
<div class="modal fade" id="trainingRev_edit" style="background: rgb(0, 0, 0,.7);">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
          <form method="POST" action="function/training_rate.php">
            <input type="hidden" class="ref_review" name="ref_review">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Edit Review</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
                <!--Title-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_title" readonly="" />
                  </div>
                </div>

                <!--Course-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Course</label>
                  <div class="col-sm-10">
                    <input type="text" class="training_course_view border border-secondary form-control" readonly="">
                  </div>
                </div>


                <!--Training Mode-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Mode</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_mode" readonly>
                  </div>
                </div>

                <!--Trainer-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Trainer</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_trainer" readonly />
                  </div>
                </div>

                <hr class="divider" />

                <!--Rate-->
                <div class="form-group row">
                  <label for="input-9" class="col-sm-2 col-form-label">Rate</label>
                  <div class="col-sm-10 mx-auto">
                    <input id="input-9" name="rate" required class="rating rating-loading" data-min="0" data-max="5" data-step="1">
                  </div>
                </div>

                <!--Trainer-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Comment</label>
                  <div class="col-sm-10">
                    <textarea class="form-control border border-secondary" rows="8" required name="comment" id="text_comment"> </textarea>
                  </div>
                </div>

            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" name="save" class="btn btn-warning btn-flat pull-left text-dark"><i class="fa fa-star"></i> Save</button>
            </div>
            <!--Modal Footer **End**-->
            </form>
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- View Training **End**-->



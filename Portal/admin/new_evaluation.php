<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="function/evaluation_add.php" id="manage_evaluation" method="POST">
				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">Employee</label>
							<select name="employee_id" id="employee_id" class="form-control form-control-sm select2">
								<option value=""></option>
								<?php 
  								$employees = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM employees order by concat(lastname,', ',firstname,' ',middlename) asc");
  								while($row=$employees->fetch_assoc()):
								?>
								<option value="<?php echo $row['employee_id'] ?>"><?php echo $row['name'] ?></option>
								<?php endwhile; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Task</label>
							<select name="task_id" id="task_id" class="form-control form-control-sm" required>
								<option value="" disabled="" selected="">Please Select Employee First.</option>
							</select>
						</div>
						<div class="row " id="ratings-field" style="display: none">
							<div class="col-md-12">
							<label for="" class="control-label">Ratings</label>
							</div>
							<hr>
							<div class="col-md-6">
								<div class="form-group">
									<label for="" class="control-label">Efficiency</label>
									<select name="efficiency" id="efficiency" class="form-control form-control-sm" required>
										<?php 
										  for($i = 5; $i >= 0;$i--):
										?>
										<option ><?php echo $i ?></option>
										<?php endfor; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="" class="control-label">Timeliness</label>
									<select name="timeliness" id="timeliness" class="form-control form-control-sm" required>
										<?php 
										  for($i = 5; $i >= 0;$i--):
										?>
										<option ><?php echo $i ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="" class="control-label">Quality</label>
									<select name="quality" id="quality" class="form-control form-control-sm" required>
										<?php 
										  for($i = 5; $i >= 0;$i--):
										?>
										<option ><?php echo $i ?></option>
										<?php endfor; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="" class="control-label">Accuracy</label>
									<select name="accuracy" id="accuracy" class="form-control form-control-sm" required>
										<?php 
										  for($i = 5; $i >= 0;$i--):
										?>
										<option ><?php echo $i ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="form-group col-md-12">
								<label for="" class="control-label">Remarks</label>
								<textarea name="remarks" id="remarks" cols="30" rows="3" class="form-control"></textarea>
							</div>
						</div>
						
					</div>
					<div class="col-md-6">
						<div id="post-field">
							<div><center><i>Select Task First</i></center></div>
						</div>
					</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2" name="add">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'performance_eval.php?page=evaluation'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div id="clone_progress" class="d-none">
	<div class="post">
    <div class="user-block">
      <img class="img-circle img-bordered-sm avatar" src="" alt="user image" style='border:solid gray 2px ;padding:1px;max-width: 40px;height: auto;'>
      <span class="username">
        <a href="#" class="nf"></a>
      </span>
      <span class="description">
      	<span class="fa fa-calendar-day"></span>
      	<span><b class="date"></b></span>
  	 </span>
    </div>
    <div class="pdesc">
      <!-- Description here -->
    </div>
    <p></p>
  </div>
</div>

<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
	#post-field{
		max-height: 70vh;
		overflow: auto;
	}
</style>

<script>

  function displayImg(input,_this) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#cimg').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  function update_emp(id){
    $('#task_id').html('')
    $.ajax({
      url:'function/new_evaluation_row.php',
      method:'POST',
      data:{employee_id:id},
      error:(err)=>{
        alert_toast("An error occured",'error')
        console.log(err)
      },
      success:function(resp){
        resp = JSON.parse(resp)
           var opt = $('<option value=""></option>')
           if(Object.keys(resp).length > 0){
              var oc = opt.clone()
              $('#task_id').append(oc)
            Object.keys(resp).map(k=>{
              var oc = opt.clone()
              oc.text(resp[k].task)
              oc.attr('value',resp[k].id)
              var task_id ="" ;
              if(task_id == resp[k].id)
                oc.attr('selected',true)
              $('#task_id').append(oc)
            })
           }else{
              $('#task_id').html('')
            var oc = opt.clone()
              oc.text("Employee is not assign to any task yet.")
              oc.attr({'disabled':'disabled','selected':'selected'})
              $('#task_id').append(oc)
           }
      },
      complete:function(){
        $('#task_id').select2({
          placeholder:'Please select task here',
          width:'100%'
        })
      }
    })
  }

  function task_update(task_id){
    $.ajax({
      url:'function/get_progress_row.php',
      method:'POST',
      data:{task_id:task_id},
      error:(err)=>{
        alert_toast("An error occured",'error')
        console.log(err)
      },
      success:function(resp){
        if(resp && typeof JSON.parse(resp) === 'object'){
          resp = JSON.parse(resp)
          if(Object.keys(resp).length > 0){
            $('#post-field').html('')
            Object.keys(resp).map(k=>{
              var _progress = $('#clone_progress .post').clone()
              _progress.find('.pdesc').append(resp[k].progress)
              _progress.find('.avatar').attr('src','uploads/profile/'+resp[k].photo)
              _progress.find('.nf').text(resp[k].uname)
              _progress.find('.date').text(resp[k].date_created)

              $('#post-field').append(_progress)
            })
            $('#ratings-field').show()
          }else{
            $('#ratings-field').hide()
          }
        }
      },
      complete:function(){
      }
    })
  }

	$(document).ready(function(){

		if('<?php echo isset($id) ?>' == 1){
			update_emp();
		}

    $('#employee_id').change(function(){
    var id = $(this).val();
    update_emp(id);
    });

    $('#task_id').change(function(){
      var id = $(this).val();
      task_update(id);
    });

	});
	

</script>
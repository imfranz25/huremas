<?php
?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<h5 class="m-b-10">Edit Evaluation</h5><br>
			<form action="function/evaluation_edit.php" id="manage_evaluation" method="POST">

				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">Employee</label>
								<?php 
								$rid = $_GET['id'];
								$sql = $conn->query("SELECT r.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,t.task FROM ratings r left join employees e on r.employee_id= e.employee_id left join task t on r.task_id=t.id WHERE r.id='$rid'");
								while($row=$sql->fetch_assoc()):
								?>
								<input type="text" class="form-control"  name="employee_id" id="employee_id" value="<?php echo $row['name'] ?>" readonly>

						</div>
						<div class="form-group">
							<input type="hidden" name="" id="taskid" value="<?php echo $row['task_id']; ?>">
							<input type="hidden" name="rid" value="<?php echo $rid; ?>">
							<label for="" class="control-label">Task</label>
							<input type="text" class="form-control"  name="task" id="task" value="<?php echo $row['task'] ?>" readonly>
								
						</div>
						<div class="row " id="ratings-field">
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
										<option <?php if($i==$row['efficiency']){echo "selected";}?> value=<?php echo $i;?>><?php echo $i ?></option>
										<?php endfor; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="" class="control-label">Timeliness</label>
									<select name="timeliness" id="timeliness" class="form-control form-control-sm" required>
										<?php 
										for($i = 5; $i >= 0;$i--):
										?>
										<option <?php if($i==$row['timeliness']){echo "selected";}?> value=<?php echo $i;?> ><?php echo $i ?></option>
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
										<option <?php if($i==$row['quality']){echo "selected";}?> value=<?php echo $i;?>><?php echo $i ?></option>
										<?php endfor; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="" class="control-label">Accuracy</label>
									<select name="accuracy" id="accuracy" class="form-control form-control-sm" required>
										<?php 
										for($i = 5; $i >= 0;$i--):
										?>
										<option <?php if($i==$row['accuracy']){echo "selected";}?> value=<?php echo $i;?>><?php echo $i ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="form-group col-md-12">
								<label for="" class="control-label">Remarks</label>
								<textarea name="remarks" id="remarks" cols="30" rows="3" class="form-control"><?php echo $row['remarks']; ?></textarea>
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
					<button class="btn btn-primary mr-2" name="update">Update</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'performance_eval.php?page=evaluation'">Cancel</button>
					<?php endwhile; ?>
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
              
              </div>

              <p>
              </p>
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
	$(document).ready(function(){
		if('<?php echo isset($rid) ?>'){
			var id = $("#taskid").val();
			task_update(id);
		}
	})
	

	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
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
							_progress.find('.avatar').attr('src','/Portal/admin/images/'+resp[k].photo)
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


</script>
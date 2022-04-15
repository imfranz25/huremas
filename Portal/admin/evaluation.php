
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
				<h5>
          <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Employee Task Evaluation </a>
        </h5>
				<a href="performance_eval.php?page=new_evaluation" class="float-right">
          <button type="button" class="btn btn-mat waves-effect waves-light btn-success" >
            <i class="fa fa-plus"></i>New
          </button>
        </a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Task</th>
						<th>Employee Name</th>
						<th width="15%">Performance Average</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
  					$i = 1;
  					$qry = $conn->query("SELECT r.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,t.task,((((r.efficiency + r.timeliness + r.quality + r.accuracy)/4)/5) * 100) as pa FROM ratings r inner join employees e on e.employee_id = r.employee_id inner join task t on t.id = r.task_id order by concat(e.lastname,', ',e.firstname,' ',e.middlename) asc");
  					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ($row['task']) ?></b></td>
						<td><b><?php echo ucwords($row['name']) ?></b></td>
						<td><b><?php echo number_format($row['pa'],2)."%" ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                Action
              </button>
              <div class="dropdown-menu" style="">
                <a class="dropdown-item view_evaluation" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><i class="fa fa-eye"></i>View</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="performance_eval.php?page=edit_evaluation&id=<?php echo $row['id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item delete_evaluation text-danger" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i>Delete</a>
              </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>

$(document).ready(function() {
  // to avoid the re-initialization of datatable
  if ( ! $.fn.DataTable.isDataTable( '#list' ) ) {
    $('#list').DataTable();
  }//**end**
});

</script>

<div class="card">
  <div class="card-header">
    <h5>
       <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Employee List</a>
    </h5>
    <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right" data-toggle="modal" data-target="#addnew">
      <i class="fa fa-plus"></i>New
    </button>
  </div>
  <div class="box-body">
    <div class="card-block table-border-style">
      <div class="table-responsive">
        <table id="table1" class="table table-striped table-bordered">
          <thead>
          	<tr>
              <th>#</th>
              <th>Employee ID</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Department</th>
              <th>Position</th>
              <th>Type</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="tbody">
            <?php
           		$adds ="order by e.lastname DESC ";
           		$sel = "";
            	if(isset($_POST['depts'])) { 
            	 	if ($_POST['depts']!="") {
            	 		$adds = "WHERE e.department_id = '".$_POST['depts']."' order by e.lastname DESC";
            	   }else{
            	 		$adds ="order by e.lastname DESC";
            	 	}
            	 	$sel = $_POST['depts'];
            	}

              $sql = "SELECT *, e.employee_id AS eid, e.id AS empid,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name 
              FROM employees e LEFT JOIN position p ON p.id=e.position_id 
              LEFT JOIN department_category dc ON dc.id = e.department_id 
              LEFT JOIN admin ON admin.employee_id = e.employee_id   $adds";
              $query = $conn->query($sql);
              $count=1;

                while($row = $query->fetch_assoc()):
                  $type ="CNT";
                  if($row['category_id']==2){
                      $type ="JO";
                  }
                  if ($row['employee_archive']==1) {
                     continue;
                  }
            ?>

            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $row['eid']; ?></td>
              <td class="text-center"><img src="uploads/profile/<?php echo (!empty($row['photo']))?$row['photo']:'profile.jpg'; ?>" width="45px" height="45px"> </td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['code']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $type; ?></td>
              <td class="text-center">
                <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  Action
                </button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item view" href="javascript:void(0)" data-id="<?php echo $row['empid'] ?>" data-eid="<?php echo $row['eid'] ?>" ><i class="fa fa-eye"></i>View Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item viewBenefits" href="javascript:void(0)" data-id="<?php echo $row['empid'] ?>" data-eid="<?php echo $row['eid'] ?>"><i class="ti-briefcase"></i>View Benefits</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['empid'] ?>" data-eid="<?php echo $row['eid'] ?>"><i class="fa fa-edit"></i>Edit</a>
                  <?php 
                    if ($row['type']=='employee' || $row['type']==''):
                  ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item delete" href="javascript:void(0)" data-id="<?php echo $row['empid'] ?>"><i class="fa fa-archive"></i>Archive</a>
                  <?php endif; ?>
                </div>
              </td>
            </tr>
            <?php
              $count++;
              endwhile;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



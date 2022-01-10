  <!-- Main-body start -->

<a href="employee.php?page=new_employee"><button type="button" class="btn btn-mat waves-effect waves-light btn-success" ><i class="fa fa-plus"></i>New</button></a>
<button type="button" class="btn btn-mat waves-effect waves-light btn-inverse" data-toggle="modal" data-target="#"><i class="fa fa-plus"></i>Import</button>                         

<div class="card">
<div class="card-header">
                    <h5>Employee Table</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                        </ul>
                    </div>
                </div>
<div class="box-body">
<div class="card-block table-border-style">

<div class="table-responsive">
<table id="table1" class="table table-striped table-bordered" style="width:100%">
    <thead>
    	<tr>
        <th width="10%">Employee ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Position</th>
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
        $sql = "SELECT *,e.employee_id AS eid, e.id AS empid,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name FROM employees e LEFT JOIN position p ON p.id=e.position_id LEFT JOIN department_category dc ON dc.id = e.department_id  LEFT JOIN schedules s ON s.id=e.schedule_id LEFT JOIN admin ON admin.employee_id = e.employee_id  $adds";
        $query = $conn->query($sql);
        while($row = $query->fetch_assoc()){
           if ($row['employee_archive']==1) {
               continue;
           }
        ?>
            <tr>
            <td><?php echo $row['eid']; ?></td>
            <td class="text-center"><img src="<?php echo (!empty($row['photo']))? 'images/'.$row['photo']:'images/profile.jpg'; ?>" width="45px" height="45px"> </td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>

    

            <td class="text-center">
                      <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                  Action
                        </button>
                        <div class="dropdown-menu" style="">
                        <div class="dropdown-divider"></div>
                          <a class="dropdown-item view" href="javascript:void(0)" data-id="<?php echo $row['empid'] ?>"><i class="fa fa-eye"></i>View Profile</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['empid'] ?>"><i class="fa fa-edit"></i>Edit</a>
                          <?php 
                            if ($row['type']=='employee' || $row['type']=='') { 
                          ?>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item delete" href="javascript:void(0)" data-id="<?php echo $row['empid'] ?>"><i class="fa fa-archive"></i>Archive</a>
                          <?php } ?>
                        </div>
            </td>
            </tr>
        <?php
        }
    ?>
    </tbody>
</table>
    </div>
    </div>
</div>
</div>


<!-- Main-body end -->
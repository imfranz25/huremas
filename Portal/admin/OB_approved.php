
<div class="card" style="min-height: 400px;">
  <div class="card-header">
    <h5>Official Business Approved List</h5>
  </div>
  <div class="box-body">
    <div class="card-block table-border-style">
      <div class="table-responsive">
        <table id="table2" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th width="5%">Employee</th>
              <th width="5%">Date</th>
              <th width="5%">Time Start</th>
              <th width="5%">Time End</th>
              <th>Details</th>
              <th width="5%">Status</th>
              <th width="10%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT orec.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) 
                      AS name,orec.id AS oids FROM allowance orec 
                      LEFT JOIN employees e ON e.employee_id=orec.employee_id 
                      WHERE orec.status = '1' ORDER BY orec.date DESC ";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
            ?>
            <tr>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo date('M d, Y',strtotime($row['date'])); ?></td>
              <td><?php echo date('h:i A',strtotime($row['start'])); ?></td>
              <td><?php echo date('h:i A',strtotime($row['end'])); ?></td>
              <td><?php echo $row['details']; ?></td>
              <td>
                <?php if($row['status']=='0'){?>
                <span class='badge badge-info'>Pending</span>
                <?php }else if($row['status']=='1'){?>
                <span class='badge badge-success'>Approved</span>
                <?php }else{?>
                <span class='badge badge-danger'>Rejected</span>
                <?php } ?>
              </td>
              <td class="text-center">
                <button class='btn btn-success btn-sm view btn-round' data-id="<?php echo $row['id']; ?>"><i class='fa fa-edit'></i> View</button>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


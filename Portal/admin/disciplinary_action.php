
<div class="card">
  <div class="card-header">
    <h5>
      <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Disciplinary Action List</a>
    </h5>
    <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right mx-2" data-toggle="modal" data-target="#addnew"><i class="fa fa-plus"></i>New</button>
  </div>
  <div class="box-body">
    <div class="card-block table-border-style">
      <div class="table-responsive">
        <table id="table1" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Reference</th>
              <th>Employee</th>
              <th>Issued</th>
              <th>Reason</th>
              <th>State</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM disciplinary_action LEFT JOIN disciplinary_category ON disciplinary_category.id=disciplinary_action.reason LEFT JOIN employees ON  employees.employee_id=disciplinary_action.employee_id ORDER BY issued_date DESC";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                if ($row['state']=='Draft') {
                  $badge = 'badge-info';
                }else if ($row['state']=='Reviewed') {
                  $badge = 'badge-success';
                }else{
                  $badge = 'badge-warning text-dark';
                }
            ?>
            <tr>
              <td><?php echo $row['reference_id']; ?></td>
              <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
              <td>
                <?php echo (new DateTime($row['issued_date']))->format('F d, Y'); ?>
              </td>
              <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 250px;'>
                <a href='#view_action' data-toggle='modal' class='pull-right view_DA' data-id='<?php echo $row['reference_id']; ?>'>
                  <span class='fa fa-eye ml-5'></span>
                </a><?php echo $row['title']; ?>
              </td>
              <td>
                <span class='badge <?php echo $badge; ?>'>
                  <?php echo $row['state']; ?>
                </span>
              </td>
              <td class="d-flex justify-content-center">
                <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">   Action
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item edit_DA" href="javascript:void(0)" data-id="<?php echo $row['reference_id'] ?>"><i class="fa fa-edit"></i>Review</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item delete_DA text-danger" href="javascript:void(0)" data-id="<?php echo $row['reference_id'] ?>"><i class="fa fa-trash"></i>Delete</a>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


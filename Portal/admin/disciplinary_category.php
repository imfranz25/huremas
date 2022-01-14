

<div class="card-header">
  <h5>
    <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Disciplinary Category List</a>
  </h5>
  <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right" data-toggle="modal" data-target="#addnewCAT">
    <i class="fa fa-plus"></i>New
  </button>
</div>
<div class="box-body">
  <div class="card-block table-border-style">
    <div class="table-responsive">
      <table id="table2" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Type</th>
            <th style="width: 200px;">Details</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $sql = "SELECT * FROM disciplinary_category";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['cat_type']; ?></td>
            <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;'>
              <a href='#viewCAT' data-toggle='modal' class='pull-right view_DCAT' data-id='<?php echo $row['id']; ?>'><span class='fa fa-eye ml-5'></span></a>
              <?php echo $row['details']; ?>
            </td>
            <td>
              <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">   Action
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item edit_DCAT" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item delete_DCAT" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i>Delete</a>
              </div>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



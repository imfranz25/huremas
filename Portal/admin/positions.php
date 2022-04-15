

<div class="card">
  <div class="card-header">
    <h5>
      <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Designation List</a>
    </h5>
     <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right" data-toggle="modal" data-target="#addnew">
      <i class="fa fa-plus"></i>New
    </button>
  </div>
  <div class="box-body">
    <div class="card-block table-border-style">
      <div class="table-responsive">
        <table id="table1" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th width="3%">#</th>
              <th width="30%">Designation Title</th>
              <th width="5%">Type</th>
              <th>Rate per Hour/<br>Basic Salary</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM position";
              $query = $conn->query($sql);
              $count=1;
              while($row = $query->fetch_assoc()){
                $tt="CNT";
                if($row['type']==1){
                    $tt="CNT";
                }else{
                    $tt="JO";
                }
            ?>

            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $tt; ?></td>
              <td><?php echo number_format($row['rate'], 2); ?></td>
              <td class="text-center">
                <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  Action
                </button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">
                    <i class="fa fa-edit"></i>Edit
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item delete text-danger" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">
                    <i class="fa fa-trash"></i>Delete
                  </a>
                </div>
              </td>
            </tr>        

            <?php
              $count ++; }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
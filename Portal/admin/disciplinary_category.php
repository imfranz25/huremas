
    <button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#addnewCAT"><i class="fa fa-plus"></i>New</button>
    <button type="button" class="btn btn-mat waves-effect waves-light btn-danger" data-toggle="modal" data-target="#"><i class="fa fa-plus"></i>Remove</button>

    <br>

        <div class="card-header">
            <h5>Disciplinary Category List</h5>
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
                    <table id="table2" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style='max-width:100px;'>
                                    <div class='custom-control custom-checkbox m-0 p-0'>
                                        <input type='checkbox' class='custom-control-input toggle-check'  id='DC_all' />
                                        <label class='custom-control-label d-flex align-items-center' for='DC_all'>&nbsp;Select All</label>
                                    </div>
                                </th>
                                <th>Code</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                                        <?php
                                            $sql = "SELECT * FROM disciplinary_category";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                            echo "
                                                <tr>
                                                <td style='max-width:100px;'>
                                                        <div class='custom-control custom-checkbox m-0 p-0'>
                                                          <input type='checkbox' class='custom-control-input toggle-check' data-id='".$row['id']."' id='v".$row['id']."' />
                                                          <label class='custom-control-label d-flex align-items-center' for='v".$row['id']."'>&nbsp;</label>
                                                        </div>
                                                    </td>
                                                <td>".$row['code']."</td>
                                                <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 290px;'>
                                                <a href='#view_desc' data-toggle='modal' class='pull-right desc' data-id='".$row['id']."'><span class='fa fa-eye ml-5'></span></a>
                                                
                                                ".$row['title']."
                                                
                                                
                                                </td>
                                                </tr>
                                            ";
                                            }
                                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



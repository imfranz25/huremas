
<button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#addnew"><i class="fa fa-plus"></i>New</button>
<button type="button" class="btn btn-mat waves-effect waves-light btn-danger" ><i class="fa fa-trash"></i>Remove</button>
                            <br>
                            <div class="card">
                            <div class="card-header">
                                                <h5>Disciplinary Action List</h5>
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
                                        <th>
                                            <div class='custom-control custom-checkbox m-0 p-0'>
                                                <input type='checkbox' class='custom-control-input toggle-check' id='da_all' />
                                                <label class='custom-control-label d-flex align-items-center' for='da_all'>&nbsp;</label>
                                            </div>
                                        </th>
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
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class='custom-control custom-checkbox m-0 p-0'>
                                                            <input type='checkbox' class='custom-control-input toggle-check' data-id='<?php echo $row['reference_id']; ?>' id='da<?php  echo $row['reference_id']; ?>' />
                                                            <label class='custom-control-label d-flex align-items-center' for='da<?php  echo $row['reference_id']; ?>'>&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row['reference_id']; ?></td>
                                                    <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                                                    <td><?php echo (new DateTime($row['issued_date']))->format('F d, Y'); ?></td>
                                                    <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 250px;'>
                                                        <a href='#view_action' data-toggle='modal' class='pull-right view_DA' data-id='<?php echo $row['reference_id']; ?>'><span class='fa fa-eye ml-5'></span></a>
                                                        <?php echo $row['title']; ?>
                                                    </td>
                                                    <td><?php echo $row['state']; ?></td>
                                                    <td class="d-flex justify-content-center">
                                                        <button class='btn btn-success btn-sm mr-1 edit_DA btn-round' data-id='<?php echo  $row['reference_id']; ?>'><i class='fa fa-edit'></i> Edit</button>
                                                        <button class='btn btn-danger btn-sm delete_DA btn-round' data-id='<?php echo  $row['reference_id']; ?>'><i class='fa fa-trash'></i> Delete</button>
                                                    </td>
                                                </tr>
                                        <?php } ?>
                                        </tbody>
                                </table>
                                    </div>
                                    </div>
                                </div>
                                </div>


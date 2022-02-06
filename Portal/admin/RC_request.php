
                            <br>
                            <div class="card" style="min-height: 400px;">
                            <div class="card-header">
                                                <h5>Time Record Correction Request List</h5>
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
                                        <th class="text-center" width="8%">#</th>
                                        <th width="15%">Request Date</th>
                                        <th>Employee Name</th>
                                        <th class="text-center" width="15%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT ac.*,a.employee_id as eid, concat(e.lastname,', ',e.firstname,' ',e.middlename) as name FROM attendance_correction ac inner join attendance a on ac.attendance_id=a.id inner join employees e on a.employee_id=e.employee_id WHERE ac.status = '0' ";
                                            $query = $conn->query($sql);
                                            $i=0;

                                            while($row = $query->fetch_assoc()){
                                                $i++;

                                        ?>
                                            <tr>
                                                <td class="d-flex justify-content-center"><?php echo $i; ?>
                                                </td>
                                                <td><?php echo (new Datetime($row['date_created']))->format('F d, Y'); ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td class="text-center">
                                                      <button class='btn btn-success btn-sm evaluate btn-round' data-id="<?php echo $row['id']; ?>"><i class='fa fa-edit'></i> Evaluate</button>
                                                </td>


                                            </tr>

                                        <?php } ?>
                                        </tbody>
                                </table>
                                    </div>
                                    </div>
                                </div>
                                </div>


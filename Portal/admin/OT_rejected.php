                            <br>
                            <div class="card" style="min-height: 400px;">
                            <div class="card-header">
                                                <h5>Overtime Rejected List</h5>
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
                                <table id="table3" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th width="5%">Employee</th>
                                        <th width="5%">Date</th>
                                        <th width="5%">Time Start</th>
                                        <th width="5%">Time End</th>
                                        <th width="2%">No. of<br>Hours</th>
                                        <th>Reason</th>
                                        <th width="5%">Status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT orec.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,orec.id as oids FROM overtime_request orec LEFT JOIN employees e ON e.employee_id=orec.employee_id WHERE orec.status = '2' ORDER BY orec.date DESC ";
                                            
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo date('M d, Y',strtotime($row['date'])); ?></td>
                                                    <td><?php echo date('h:i A',strtotime($row['start'])); ?></td>
                                                    <td><?php echo date('h:i A',strtotime($row['end'])); ?></td>
                                                    <td><?php
                                                  $t1 = strtotime( $row['start'] );
                                                  $t2 = strtotime( $row['end'] );
                                                  $diff = $t2 - $t1;
                                                  $hours = $diff / 3600 ;
                                               echo round($hours,2) ?></td>
                                                    <td><?php echo $row['reason']; ?></td>
                                                    <td><?php if($row['status']=='0'){?>
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




                            <br>
                            <div class="card">
                            <div class="card-header">

                                <h5>
                                    <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Deduction Type List</a>
                                </h5>
                                <button type="button" class="btn btn-mat waves-effect waves-light btn-danger float-right" data-toggle="modal" id="deleteAlltax"><i class="fa fa-trash"></i>Delete</button>
                                <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right mx-2" id="add_tax" data-toggle="modal" data-target="#taxNew"><i class="fa fa-plus"></i>New</button>





                                                <!-- <h5>Tax List</h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                    </ul>
                                                </div> -->
                                            </div>
                            <div class="box-body">
                            <div class="card-block table-border-style">
             
                                <div class="table-responsive">
                                <table id="table3" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input" id="globalcheck" />
                                                <label class="custom-control-label d-flex align-items-center text-center" for="globalcheck"></label>
                                            </div>
                                        </th>
                                        <th>Tax Code</th>
                                        <th>Name</th>
                                        <th>Vendor</th>
                                        <th>Amount/Rate</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody_tax">
                                        <?php
                                     
                                            $sql = "SELECT *, tax.id as tid FROM tax LEFT JOIN deduction_vendor ON deduction_vendor.id=tax.tax_vendor";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                                if ($row['tax_type'] =="Fixed Amount") {
                                                    $amt_rate = "&#8369; ".number_format($row['tax_amount'],2);
                                                }else{$amt_rate = $row['tax_amount']."%";}
                                              
                                           ?>
                                                <tr>
                                                    <td>
                                                        <div class='custom-control custom-checkbox m-0 p-0'>
                                                          <input type='checkbox' class='custom-control-input toggle-check' data-id='<?php echo $row['tid']; ?>' id='<?php echo 't'.$row['tid']; ?>' />
                                                          <label class='custom-control-label d-flex align-items-center' for='<?php echo 't'.$row['tid']; ?>'>&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row['tax_code']; ?></td>
                                                    <td><?php echo ucfirst($row['tax_name']); ?></td>
                                                    <td><?php echo $row['vendor_name']; ?></td>
                                                    <td class='text-center'><?php echo $amt_rate; ?></td>
                                                    <td><?php echo ucfirst($row['tax_status']); ?></td>
                                                    <td>

                                                      <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                                                        </button>

                                                        <div class="dropdown-menu" style="">
                                                          <a class="dropdown-item edittax" href="javascript:void(0)" data-id="<?php echo $row['tid'] ?>"><i class="fa fa-edit"></i>Edit</a>
                                                          <div class="dropdown-divider"></div>
                                                          <a class="dropdown-item deletetax text-danger" href="javascript:void(0)" data-id="<?php echo $row['tid'] ?>"><i class="fa fa-trash"></i>Delete</a>
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


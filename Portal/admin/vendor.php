

                            <br>
                            <div class="card">
                            <div class="card-header">
                                                <!-- <h5>Vendor List</h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                    </ul>
                                                </div> -->


                              <h5>
                                <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Vendor List</a>
                              </h5>
                              <button type="button" class="btn btn-mat waves-effect waves-light btn-danger float-right" data-toggle="modal" id="deleteAllvendor"><i class="fa fa-trash"></i>Delete</button>
                              <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right mx-2" data-toggle="modal" data-target="#vendorNew"><i class="fa fa-plus"></i>New</button>
                                




                                            </div>
                            <div class="box-body">
                            <div class="card-block table-border-style">
             
                                <div class="table-responsive">
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input" id="globalcheck" />
                                                <label class="custom-control-label d-flex align-items-center text-center" for="globalcheck"></label>
                                            </div>
                                        </th>
                                        <th>Vendor Code</th>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody_vendor">
                                        <?php
                                            $sql = "SELECT * FROM deduction_vendor";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                                ?>

                                                <tr>
                                                    <td>
                                                        <div class='custom-control custom-checkbox m-0 p-0'>
                                                          <input type='checkbox' class='custom-control-input toggle-check' data-id='<?php echo $row['id']; ?>' id='<?php echo 'v'.$row['id']; ?>' />
                                                          <label class='custom-control-label d-flex align-items-center' for='<?php echo 'v'.$row['id']; ?>'>&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row['vendor_code']; ?></td>
                                                    <td><?php echo $row['vendor_name']; ?></td>
                                                    <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 290px;'>
                                                    <a href='#view_desc' data-toggle='modal' class='pull-right desc' data-id='<?php echo $row['id']; ?>'><span class='fa fa-eye ml-5'></span></a><?php echo $row['vendor_details']; ?>
                                                    </td>
                                                    <td><?php echo $row['vendor_type']; ?></td>
                                                    <td>



                                                      <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                                                    </button>

                                                    <div class="dropdown-menu" style="">
                                                      <a class="dropdown-item editvendor" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                                                      <div class="dropdown-divider"></div>
                                                      <a class="dropdown-item deletevendor text-danger" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i>Delete</a>
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


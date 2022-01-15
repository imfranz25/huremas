
                            <div class="card">
                            <div class="card-header">

                                       
                                               
                                <h5>
                                  <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Designation List</a>
                                </h5>
                                 <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right" data-toggle="modal" data-target="#addnew"><i class="fa fa-plus"></i>New</button>
                            

                            </div>
                            <div class="box-body">
                            <div class="card-block table-border-style">
             
                                <div class="table-responsive">
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                    <th>Designation Title</th>
                                    <th>Rate per Hour</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM position";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                             ?>

                                                <tr>
                                                <td><?php echo $row['description']; ?></td>
                                                <td> &#8369;<?php echo ' '.number_format($row['rate'], 2); ?></td>
                                                <td>

                                                     <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                                                    </button>

                                                    <div class="dropdown-menu" style="">
                                                      <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                                                      <div class="dropdown-divider"></div>
                                                      <a class="dropdown-item delete text-danger" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i>Delete</a>
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
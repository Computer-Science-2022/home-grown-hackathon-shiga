<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title" style="color: <?php echo $color_pri;?>">Subscribers</h4> </div>
                </div>
                
                <!--/.row -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <h3 class="box-title">Users</h3> -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <!-- <th>Name</th> -->
                                            
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Join Date</th>
                                            <th>Action</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $this->db->order_by('timestamp', 'DESC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get('subscriber')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <!-- <td><?php echo $row['name'];?></td> -->
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php if($row['status'] == 0){echo "Inactive";}elseif($row['status'] == 1){echo "Activated";} ?></td>
                                        <td><?php echo $row['timestamp'];?></td>
                                        <td>
                                            <?php if($row['status'] == 0){?>


                                                <a href="<?php echo base_url().'admin/users/approve/'.$row['id'].'/1';?>"><button class="btn btn-danger aog-btn-r">Approve?</button></a>

                                        <?php }elseif($row['status'] == 1){?> <a href="<?php echo base_url().'admin/users/approve/'.$row['id'].'/0';?>"><button class="btn btn-danger aog-btn-r">Disapprove?</button></a> <?php } ?>
                                        </td>
                                        <td><a href="<?php echo base_url().'admin/users/delete/'.$row['id'];?>"><button class="btn btn-danger aog-btn-r">Delete</button></a></td>
                                    </tr>
                                <?php endforeach;?>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               
                
            </div>
            <!-- /.container-fluid -->
            
        </div>
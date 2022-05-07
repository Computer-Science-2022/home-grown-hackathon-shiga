<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Users</h4> </div>
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
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Join Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $this->db->order_by('timestamp', 'DESC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get('user')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['phone'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php echo date('M d, Y', strtotime($row['timestamp']));?></td>
                                        <td>
                                            <?php if($row['status'] == 0){?>


                                                <a href="<?php echo base_url().'admin/users/approve/'.$row['id'].'/1';?>"><button class="btn btn-danger aog-btn-r">Approve?</button></a>

                                        <?php }elseif($row['status'] == 1){echo "Already Confirmed";} ?>
                                        </td>
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
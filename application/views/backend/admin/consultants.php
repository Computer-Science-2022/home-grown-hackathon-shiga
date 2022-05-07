<div class="row">
    <div class="white-box">
        <strong>
            <span class="page-title">Manage Consultants</span>
            <a href="<?php echo base_url();?>admin/addconsultant" style="float: right;"> <button type="button"
                    class="btn btn-secondary aog-btn">Add
                    Consultant</button> </a>
        </strong>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Join Date</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                                    $this->db->order_by('id', 'DESC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get('consultant')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php if($row['status'] == 0){echo "Inactive";}elseif($row['status'] == 1){echo "Activated";} ?>
                    </td>
                    <td><?php echo $row['date'];?></td>
                    <td>
                        <?php if($row['status'] == 0){?>


                        <a href="<?php echo base_url().'admin/consultants/approve/'.$row['id'].'/1';?>"><button
                                class="btn btn-danger aog-btn-r">Approve?</button></a>

                        <?php }elseif($row['status'] == 1){?> <a
                            href="<?php echo base_url().'admin/consultants/approve/'.$row['id'].'/0';?>"><button
                                class="btn btn-danger aog-btn-r">Disapprove?</button></a> <?php } ?>
                    </td>
                    <td><a href="<?php echo base_url().'admin/consultants/delete/'.$row['id'];?>"><button
                                class="btn btn-danger aog-btn-r">Delete</button></a></td>
                </tr>
                <?php endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
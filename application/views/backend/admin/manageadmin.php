<div class="row">
    <div class="white-box">
        <strong>
        <span class="page-title">Manage Admin</span>
            <a href="<?php echo base_url();?>admin/addadmin" style="float: right;"> <button type="button" class="btn btn-secondary aog-btn">Add
                    Admin</button> </a>
        </strong>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Date Added</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                                    $this->db->order_by('status', 'DESC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get_where('admin')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td>
                        <?php if($row['status'] == 0){?>
                        <a href="<?php echo base_url().'admin/adminApprove/'.$row['admin_id'];?>"><button
                                class="btn btn-secondary aog-btn-r">Activate?</button></a>

                        <?php }elseif($row['status'] == 1 && $row['admin_id']!=1){?>
                        <a href="<?php echo base_url().'admin/adminDisapprove/'.$row['admin_id'];?>"><button
                                class="btn btn-danger aog-btn-r">Deactivate?</button></a>
                        <?php }else{ ?>
                            <span style="color: <?php echo $color_pri;?>;">Can't be edited</span>
                            <?php }?>
                    </td>
                    <td>
                        <?php if($row['admin_id']!=1):?>
                        <a href="<?php echo base_url().'admin/adminDelete/'.$row['admin_id'];?>"
                            class="btn btn-danger text-white aog-btn-r">
                            Delete</a>
                        <?php else: ?>
                            <span style="color: <?php echo $color_pri;?>;">Can't be deleted</span>
                        <?php endif;?>
                        </td>
                </tr>
                <?php endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
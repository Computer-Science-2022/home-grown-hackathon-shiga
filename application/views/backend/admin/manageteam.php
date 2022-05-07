<div class="row">
    <div class="white-box">
        <strong>
        <span class="page-title">Manage Teams</span>
            <!-- <a href="<?php echo base_url();?>admin/support"
                class="btn d-grid btn-danger text-white" target="_blank">
                Add Project</a> -->
           
            <a href="<?php echo base_url();?>admin/addteam" style="float: right;"> <button type="button" class="btn btn-secondary aog-btn">Add Team Member</button> </a>

        </strong>
        <hr>
        <!-- <div class="white-box"> -->
        <!-- <h3 class="box-title">Users</h3> -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Job Description</th>
                        <th>Edit</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                                    $this->db->order_by('id', 'ASC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get('team')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo substr($row['description'],0,100); if(strlen($row['description'])>100){echo "...";}?></td>
                    <td><?php if($row['status']==0){echo "Disabled";}elseif($row['status']==1){echo "Enabled"; }?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><a href="<?php echo base_url().'admin/teamsEdit/'.$row['id'];?>"
                            class="btn d-grid btn-secondary text-white aog-btn-r">
                            Edit</a></td>
                    <td>
                        <?php if($row['status'] == 0){?>


                        <a href="<?php echo base_url().'admin/teamApprove/'.$row['id'].'/1';?>"><button
                                class="btn btn-secondary aog-btn-r">Enable?</button></a>

                        <?php }elseif($row['status'] == 1){?><a href="<?php echo base_url().'admin/teamApprove/'.$row['id'].'/0';?>"><button
                                class="btn btn-secondary aog-btn-r">Disable?</button></a><?php } ?>
                    </td>
                    <td><a href="<?php echo base_url().'admin/teamDelete/'.$row['id'];?>"
                            class="btn btn-danger text-white aog-btn-r">
                            Delete</a></td>
                </tr>
                <?php endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
<div class="row">
    <div class="white-box">
        <strong>
            <span class="page-title">Manage Services</span>
            <!-- <a href="<?php echo base_url();?>admin/support"
                class="btn d-grid btn-danger text-white" target="_blank">
                Add Project</a> -->
                
                <a href="<?php echo base_url();?>admin/addservice" style="float: right;"> <button type="button" class="btn btn-secondary aog-btn">Add Services</button> </a>

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
                        <th>Short Description</th>
                        <th>Status</th>
                        <th>Add Date</th>
                        <th>Edit</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                                    $this->db->order_by('id', 'DESC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get('services')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo substr($row['shortDesc'],0,100);?><?php if(strlen($row['shortDesc'])>100){echo "...";}?></td>
                    <td><?php if($row['status'] == 0){echo "Disabled";}elseif($row['status'] == 1){echo "Enabled";}?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><a href="<?php echo base_url().'admin/serviceEdit/'.$row['id'];?>"
                class="btn d-grid btn-secondary text-white aog-btn-r">
                Edit</a></td>
                    <td>
                        <?php if($row['status'] == 0){?>


                        <a href="<?php echo base_url().'admin/serviceApprove/'.$row['id'].'/1';?>"><button
                                class="btn btn-secondary aog-btn-r"
                                style="border-radius: 50px; padding: 0px 20px; color: white;">Enable?</button></a>

                        <?php }elseif($row['status'] == 1){?>
                            <a href="<?php echo base_url().'admin/serviceApprove/'.$row['id'].'/0';?>"><button
                                class="btn btn-secondary aog-btn-r"
                                style="border-radius: 50px; padding: 0px 20px; color: white;">Disable?</button></a>
                        <?php } ?>
                    </td>
                    <td><a href="<?php echo base_url().'admin/serviceDelete/'.$row['id'];?>"
                class="btn d-grid btn-danger text-white aog-btn-r">
                Delete</a></td>
                </tr>
                <?php endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
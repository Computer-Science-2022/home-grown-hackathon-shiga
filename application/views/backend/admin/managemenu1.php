<div class="row">
    <div class="white-box">
        <strong>
        <span class="page-title">Programmes Menu</span>
            <!-- <a href="<?php echo base_url();?>admin/support"
                class="btn d-grid btn-danger text-white" target="_blank">
                Add Project</a> -->
             
                <a href="<?php echo base_url();?>admin/addmenu1" style="float: right;"> <button type="button" class="btn btn-secondary aog-btn">Add Menu</button> </a>

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
                        <th>Price</th>
                        <th>Remaining</th>
                        <th>Status</th>
                        <th>Show Remaining</th>
                        <th>Edit</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                    $this->db->order_by('id', 'DESC');
                    // $this->db->limit(5);
                    $users = $this->db->get_where('menu', array('categoryName' => "programmes"))->result_array();
                    $i = 1;
                    foreach($users as $row):
                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo substr($row['description'],0,100); if(strlen($row['description'])>100){echo "...";}?></td>
                    <td><?php echo $row['price'];?></td>
                    <td><?php echo $row['remain'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td>
                        <?php if($row['showRemain'] == 0){?>


                        <a href="<?php echo base_url().'admin/showRemain1/'.$row['id'];?>"><button
                                class="btn btn-secondary aog-btn-r">Show</button></a>

                        <?php }elseif($row['status'] == 1){ ?> <a href="<?php echo base_url().'admin/hideRemain1/'.$row['id'];?>"><button
                                class="btn btn-danger"
                                style="border-radius: 50px; padding: 0px 20px; color: white;">Hide</button></a> <?php } ?>
                    </td>
                    <td><a href="<?php echo base_url().'admin/menuEdit1/'.$row['id'];?>"
                class="btn d-grid btn-secondary text-white aog-btn-r">
                Edit</a></td>
                    <td>
                        <?php if($row['status'] == 0){?>


                        <a href="<?php echo base_url().'admin/menuApprove1/'.$row['id'];?>"><button
                                class="btn btn-secondary aog-btn-r">Activate?</button></a>

                        <?php }elseif($row['status'] == 1){echo "Already Activated";} ?>
                    </td>
                    <td><a href="<?php echo base_url().'admin/menuDelete1/'.$row['id'];?>"
                class="btn d-grid btn-danger text-white aog-btn-r">
                Delete</a></td>
                </tr>
                <?php endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
<div class="row">
    <div class="white-box">
        <strong>
        <span class="page-title">Manage Carousel</span>
            <!-- <a href="<?php echo base_url();?>admin/support"
                class="btn d-grid btn-danger text-white" target="_blank">
                Add Project</a> -->
                
                <a href="<?php echo base_url();?>admin/addcarousel" style="float: right;"> <button type="button" class="btn btn-secondary aog-btn">Add Carousel</button> </a>

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
                        <th>Date Added</th>
                        <th>Edit</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                                    $this->db->order_by('id', 'DESC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get_where('carousel')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['description'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><a href="<?php echo base_url().'admin/carouselEdit/'.$row['id'];?>"
                class="btn d-grid btn-secondary text-white aog-btn-r">
                Edit</a></td>
                    <td>
                        <?php if($row['status'] == 0){?>
                        <a href="<?php echo base_url().'admin/carouselApprove/'.$row['id'];?>"><button
                                class="btn btn-secondary aog-btn-r">Activate</button></a>

                        <?php }elseif($row['status'] == 1){?><a href="<?php echo base_url().'admin/carouselDispprove/'.$row['id'];?>"><button
                                class="btn btn-danger aog-btn-r">Disactivate</button></a><?php } ?>
                    </td>
                    <td><a href="<?php echo base_url().'admin/carouselDelete/'.$row['id'];?>"
                class="btn d-grid btn-danger text-white aog-btn-r">
                Delete</a></td>
                </tr>
                <?php endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
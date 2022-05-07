<div class="row">
    <div class="white-box">
        <strong>
        <span class="page-title">Testimonials</span>
            <!-- <a href="<?php echo base_url();?>admin/support"
                class="btn d-grid btn-danger text-white" target="_blank">
                Add Project</a> -->
            <hr>
            <!-- <a href="<?php echo base_url();?>admin/addprogrammes"> <button type="button" class="btn btn-secondary">Add Programmes</button> </a> -->
        </strong>
        <!-- <hr> -->
        <!-- <div class="white-box"> -->
        <!-- <h3 class="box-title">Users</h3> -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Testimonial</th>
                        <th>Edit</th>
                        <th>Status</th>
                        <th>Add Date</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                                    $this->db->order_by('id', 'DESC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get('testimonial')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo substr($row['testimonial'],0,200) ;?>...</td>
                    <td><a href="<?php echo base_url().'admin/testimonialEdit/'.$row['id'];?>"
                            class="btn btn-secondary text-white aog-btn-r">
                            Edit</a></td>
                    <td><?php if($row['status'] == 0){echo "Disabled";}elseif($row['status'] == 1){echo "Enabled";}?></td>
                    <td><?php echo date('Y-m-d', strtotime($row['date']));?></td>
                    <td>
                        <?php if($row['status'] == 0){?>
                        <a href="<?php echo base_url().'admin/testimonialApprove/'.$row['id'].'/1';?>"><button
                                class="btn btn-secondary text-white aog-btn-r">Enable?</button></a>
                        <?php }elseif($row['status'] == 1){?>
                            <a href="<?php echo base_url().'admin/testimonialApprove/'.$row['id'].'/0';?>"><button
                                class="btn btn-secondary text-white aog-btn-r">Disable?</button></a>
                        <?php } ?>
                    </td>
                    <td><a href="<?php echo base_url().'admin/testimonialDelete/'.$row['id'];?>"
                            class="btn d-grid btn-danger text-white aog-btn-r">
                            Delete</a></td>
                </tr>
                <?php endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
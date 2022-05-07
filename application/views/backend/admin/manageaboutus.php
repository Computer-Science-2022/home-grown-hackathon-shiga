<div class="row">
    <div class="white-box">
        <!-- <strong>
            <span class="page-title"  style="color: <?php echo $color_pri;?>">Manage About Us</span>
                
                <a href="<?php echo base_url();?>admin/addaboutus" style="float: right;"> <button type="button" class="btn btn-secondary" style="background-color: <?php echo $color_pri;?>; color: #fff; border: 0px;">Add About Us</button> </a>

        </strong> -->
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Short Description</th>
                        <th>Date Added</th>
                        <th>Edit</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                                    $this->db->order_by('id', 'DESC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get_where('aboutus')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo substr($row['description'],0,100);?><?php if(strlen($row['description'])>100){echo "...";}?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><a href="<?php echo base_url().'admin/aboutusEdit/'.$row['id'];?>"
                class="aog_btn_r">Edit </a></td>
                    <td>
                        <?php if($row['status'] == 0){?>


                        <a href="<?php echo base_url().'admin/aboutusApprove/'.$row['id'].'/1';?>"><button
                                class="btn btn-secondary"
                                style="border-radius: 50px; padding: 0px 20px; color: white;">Enable?</button></a>

                        <?php }elseif($row['status'] == 1){?>
                            <a href="<?php echo base_url().'admin/aboutusApprove/'.$row['id'].'/0';?>"><button
                                class="btn btn-secondary aog-btn-r"
                                style="border-radius: 50px; padding: 0px 20px; color: white;">Disable?</button></a>
                             <?php } ?>
                    </td>
                    <td><a href="<?php echo base_url().'admin/aboutusDelete/'.$row['id'];?>"
                class="btn d-grid btn-danger aog_btn_r">
                Delete</a></td>
                </tr>
                <?php endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
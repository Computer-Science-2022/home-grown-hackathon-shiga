<div class="row">
    <div class="white-box">
        <strong>
        <span class="page-title">Manage Notifications</span></h3>
               
                <a href="<?php echo base_url();?>admin/addpopup" style="float: right;"> <button type="button" class="btn btn-secondary aog-btn">Add Notifications</button> </a>

        </strong>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                    $this->db->order_by('id', 'DESC');
                    // $this->db->limit(5);
                    $users = $this->db->get_where('popup')->result_array();
                    $i = 1;
                    foreach($users as $row):
                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['popup'];?></td>
                    <td><?php echo $row['date_from'];?></td>
                    <td><?php echo $row['date_to'];?></td>
                    <td>
                        <?php if($row['status'] == 0){?>
                        <a href="<?php echo base_url().'admin/popUpApprove/'.$row['id'];?>"><button
                                class="btn btn-secondary"
                                style="border-radius: 50px; padding: 0px 20px; color: white;">Activate</button></a>

                        <?php }elseif($row['status'] == 1){?><a href="<?php echo base_url().'admin/popUpDispprove/'.$row['id'];?>"><button
                                class="btn btn-danger aog-btn-r">Disactivate</button></a><?php } ?>
                    </td>
                    <td><a href="<?php echo base_url().'admin/popUpDelete/'.$row['id'];?>"
                class="btn btn-danger text-white aog-btn-r">
                Delete</a></td>
                </tr>
                <?php endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
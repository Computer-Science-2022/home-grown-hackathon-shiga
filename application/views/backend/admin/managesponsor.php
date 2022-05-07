<div class="row">
    <div class="white-box">
        <strong>
        <span class="page-title">Manage Sponsor</span></h3>
               
                <a href="<?php echo base_url();?>admin/addsponsor" style="float: right;"> <button type="button" class="btn btn-secondary aog-btn">Add Sponsor</button> </a>

        </strong>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Date Added</th>
                        <th>Edit</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                    $this->db->order_by('id', 'DESC');
                    // $this->db->limit(5);
                    $users = $this->db->get_where('sponsor')->result_array();
                    $i = 1;
                    foreach($users as $row):
                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><a href="<?php echo base_url().'admin/sponsorEdit/'.$row['id'];?>"
                class="btn d-grid btn-secondary text-white aog-btn-r">
                Edit</a></td>
                    <td>
                        <?php if($row['status'] == 0){?>
                        <a href="<?php echo base_url().'admin/sponsorApprove/'.$row['id'];?>"><button
                                class="btn btn-secondary"
                                style="border-radius: 50px; padding: 0px 20px; color: white;">Activate</button></a>

                        <?php }elseif($row['status'] == 1){?><a href="<?php echo base_url().'admin/sponsorDispprove/'.$row['id'];?>"><button
                                class="btn btn-danger aog-btn-r">Disactivate</button></a><?php } ?>
                    </td>
                    <td><a href="<?php echo base_url().'admin/sponsorDelete/'.$row['id'];?>"
                class="btn btn-danger text-white aog-btn-r">
                Delete</a></td>
                </tr>
                <?php endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
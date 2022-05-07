<div class="row">
    <div class="white-box">
        <strong>
        <span class="page-title">Manage Appointments</span>
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
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Reason</th>
                        <th>Consultant</th>
                        <th>Appointment Time</th>
                        <th>Appointment Date</th>
                        <th>Date</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                                    $this->db->order_by('id', 'DESC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get('appointment')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php $brandname = $this->db->get_where('patients', array('id' => $row['userId']))->result_array();
    foreach($brandname as $rows):
        $brName = $rows['name'];
    endforeach; echo $brName; ?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['reason'];?></td>
                    <td>
                        <?php if($row['consultant'] == NULL){?>
                        None Assigned
                        <?php }else{ echo "Assigned to ";
                        $consultantName = $this->db->get_where('consultant', array('id' => $row['consultant']))->result_array();
    foreach($consultantName as $rows):
        $conName = $rows['name'];
    endforeach; 
    echo $conName;} ?>
                    </td>
                    <td><?php echo $row['appointmenttime'];?></td>
                    <td><?php echo $row['appointmentdate'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td>
                        <?php if($row['consultant'] == NULL){?>
                        <a href="<?php echo base_url().'admin/bookApprove/'.$row['id'];?>"><button
                                class="btn btn-secondary aog-btn-r">Assign Consultant</button></a>
                        <?php }else{ ?> <a href="<?php echo base_url().'admin/bookchange/'.$row['id'];?>"><button
                                class="btn btn-secondary aog-btn-r">Change Consultant</button></a> <?php } ?>
                    </td>
                    <td><a href="<?php echo base_url().'admin/bookDelete/'.$row['id'];?>"
                class="btn d-grid btn-danger text-white aog-btn-r">
                Delete</a></td>
                </tr>
                <?php endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

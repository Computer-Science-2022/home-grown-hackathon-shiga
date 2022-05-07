<div class="row">
    <div class="white-box">
        <strong>
        <span class="page-title">Manage Contact Us</span>
            <!-- <a href="<?php echo base_url();?>admin/addproject"> <button type="button" class="btn btn-secondary">Add Project</button> </a> -->

        </strong>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Send Date</th>
                        <th>Reply Sent</th>
                        <th>Reply Date</th>
                    </tr>
                </thead>
                <?php
                                    $this->db->order_by('id', 'DESC');
                                    $users = $this->db->get('contactus')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo substr($row['message'], 0, 200)."...";?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php if ($row['reply'] == NULL){ ?> <a
                            href="<?php echo base_url().'admin/contactusreply/'.$row['id'];?>"><button
                                class="btn btn-secondary aog-btn-r">Reply?</button></a>
                        <?php } else { echo $row['reply']; } ?></td>
                    <td><?php if ($row['replydate'] == NULL){ echo "Not Replied Yet"; } else { echo $row['replydate']; } ?></td>
                </tr>
                <?php endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
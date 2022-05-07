<div class="row">
    <div class="white-box">
        <strong>
        <span class="page-title">SMS Campaign</span>
           
            <a href="<?php echo base_url();?>admin/addsmscampaign" style="float: right;"> <button type="button" class="btn btn-secondary aog-btn">Send SMS
                    Campaign</button> </a>
        </strong>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Recipients</th>
                        <th>Date Sent</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                                    $this->db->order_by('id', 'DESC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get_where('smscampaign')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['subject'];?></td>
                    <td><?php echo $row['message'];?></td>
                    <td><?php echo $row['recipients'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><a href="<?php echo base_url().'admin/smsDelete/'.$row['id'];?>"
                            class="btn d-grid btn-danger text-white aog-btn-r">
                            Delete</a></td>
                </tr>
                <?php endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
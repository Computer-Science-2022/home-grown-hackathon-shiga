<div class="row">
    <div class="white-box">
        <strong>
            <h3><span style="color: #59A8DD;">Manage Transactions</span></h3>
        </strong>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Description</th>
                        <th>Transaction ID</th>
                        <th>Payment Method</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Amount Paid</th>
                        <th>Declare Payment</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <?php
                                    $this->db->order_by('id', 'DESC');
                                    $users = $this->db->get_where('sales')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                        if ($row['amount_paid'] < $row['totalprice']){
                                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php $roomname = $this->db->get_where('patients', array('id' => $row['user_id']))->result_array();
    foreach($roomname as $rows):
        $roomName = $rows['name'];
    endforeach; echo $roomName; ?></td>
                    <td><?php echo $row['products'];?></td>
                    <td><?php echo $row['transaction_id'];?></td>
                    <td><?php echo $row['payment_method'];?></td>
                    <td><?php echo $row['buyeremail'];?></td>
                    <td><?php echo $row['totalprice'];?></td>
                    <td><?php echo $row['amount_paid'];?></td>
                    <td>
                    <a href="<?php echo base_url().'admin/paymentDeclaration/'.$row['id'];?>"><button
                                class="btn btn-secondary"
                                style="border-radius: 50px; padding: 0px 20px; color: white;">Declare</button></a>
                    </td>
                    <td><?php echo $row['date'];?></td>
                </tr>
                <?php } endforeach;?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
<div class="row">
    <div class="white-box">
        <strong>
        <span class="page-title">View Donations</span>
        </strong>
        <hr>
        <div class="table-responsive" style="height: 63vh; overflow: scroll;"> 
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Currency</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                                    $this->db->order_by('payment_id', 'DESC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get_where('payment')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['currency'];?></td>
                    <td><?php echo $row['amount'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td><?php echo $row['date'];?></td>      
                </tr>
                <?php endforeach;?>

                </tbody>
            </table>
        </div>
    </div>
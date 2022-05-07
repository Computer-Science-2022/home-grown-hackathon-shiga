<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title" style="color: <?php echo $color_pri;?>">Medical Kit Payments</h4>
            </div>
        </div>

        <!--/.row -->

        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <!-- <h3 class="box-title">Users</h3> -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Unit</th>
                                    <th>Product Price Per Unit</th>
                                    <th>Product Purchase Price</th>
                                    <th>Payment Method</th>
                                    <th>Date</th>
                                    <th>Total Purchase Price</th>
                                    <th>Buyer Contact</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <?php
              $sales = $this->db->get_where('sales')->result_array();
              foreach($sales as $sale):
              ?>
                            <tr>
                                <td><?php echo $sale['products'];?></td>
                                <td><?php echo $sale['unit'];?></td>
                                <td><?php echo $sale['subprice'];?></td>
                                <td><?php echo $sale['price'];?></td>
                                <td><?php echo $sale['payment_method'];?></td>
                                <td><?php echo $sale['date'];?></td>
                                <td><?php echo $sale['totalprice'];?></td>
                                <td><?php echo $sale['buyercontact'];?></td>
                                <td><?php echo $sale['paymentstatus'];?></td>
                            </tr>
                            <?php endforeach;?>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
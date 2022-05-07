<div id="page-wrapper">
    <div class="container-fluid" style="height: 80vh; overflow: scroll;">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title" style="color: <?php echo $color_pri;?>">Dashboard</h4>
            </div>
            <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                </ol>
            </div> -->
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- Different data widgets -->
        <!-- ============================================================== -->
        <!-- .row -->
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-xs-6 col-6">
                <a href="<?php echo base_url();?>admin/users">
                    <div class="white-box analytics-info">
                        <h3 class="box-title" style="color: <?php echo $color_pri;?>">Employees</h3>
                        <ul class="list-inline two-part">
                            <li>
                                <div id="sparklinedash"></div>
                            </li>
                            <li class="text-right"><span class="counter text-success"
                                    style="font-size: 4em; font-weight: normal;"><?php echo number_format($this->db->get_where('employees')->num_rows());?></span>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-sm-6 col-xs-6 col-6">
                <a href="<?php echo base_url();?>admin/testimonial">
                    <div class="white-box analytics-info">
                        <h3 class="box-title" style="color: <?php echo $color_pri;?>">Active Employees</h3>
                        <ul class="list-inline two-part">
                            <li>
                                <div id="sparklinedash2"></div>
                            </li>
                            <li class="text-right"> <span class="counter text-purple"
                                    style="font-size: 4em; font-weight: normal;"><?php echo number_format($this->db->get_where('employees', array('status'=> 1))->num_rows());?></span>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
            
            <!-- <div class="col-lg-3 col-sm-6 col-xs-6 col-6">
                <a href="<?php echo base_url();?>admin/contactus">
                    <div class="white-box analytics-info">
                        <h3 class="box-title" style="color: <?php echo $color_pri;?>">Total Consultants</h3>
                        <ul class="list-inline two-part">
                            <li>
                                <div id="sparklinedash3"></div>
                            </li>
                            <li class="text-right"> <span
                                    class="counter text-info" style="font-size: 4em; font-weight: normal;"><?php echo number_format($this->db->get('consultant')->num_rows());?></span>
                            </li>
                        </ul>
                    </div>
                </a>
            </div> -->
        </div>
        <!--/.row -->

        <div class="row">
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title" style="color: <?php echo $color_pri;?>">Latest Inquires</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <?php
                                    $this->db->order_by('id', 'DESC');
                                    $this->db->limit(5);
                                    $movies = $this->db->get_where('contactus')->result_array();
                                    $i = 1;
                                    foreach($movies as $row):
                                    ?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['phone'];?></td>
                                <td><?php echo date('M d, Y', strtotime($row['date']));?></td>
                            </tr>
                            <?php endforeach;?>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title" style="color: <?php echo $color_pri;?>">Latest Employees</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <?php
                                    $this->db->order_by('id', 'DESC');
                                    $this->db->limit(5);
                                    $movies = $this->db->get_where('users')->result_array();
                                    $i = 1;
                                    foreach($movies as $row):
                                    ?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo date('M d, Y', strtotime($row['date']));?></td>
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
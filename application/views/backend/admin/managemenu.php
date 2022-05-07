<div id="page-wrapper">
    <div class="container-fluid" style="height: 80vh; overflow: scroll;">
        <div class="row bg-title">
            <strong>
                <span class="page-title">Manage Employees</span>

                <a href="<?php echo base_url();?>admin/addmenu" style="float: right;"> <button type="button"
                        class="btn btn-secondary aog-btn">Add Employee</button> </a>

            </strong>
            <br>
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
            <div class="col-lg-12 col-sm-12 col-xs-12 col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Plan Coverage</th>
                                <th>Date Added</th>
                                <th>Edit</th>
                                <th>Action</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php
                                    $this->db->order_by('id', 'DESC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get_where('employees')->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['phone'];?></td>
                            <td><?php echo $row['worklocation'];?></td>
                            <td><?php echo $row['plancoverage'];?></td>
                            <td><?php echo $row['date'];?></td>
                            <td><a href="<?php echo base_url().'admin/menuEdit/'.$row['id'];?>"
                                    class="btn d-grid btn-danger text-white aog-btn-r">
                                    Edit</a></td>
                            <td>
                                <?php if($row['status'] == 0){?>


                                <a href="<?php echo base_url().'admin/menuApprove/'.$row['id'];?>"><button
                                        class="btn d-grid btn-danger text-white aog-btn-r"
                                        style="border-radius: 50px; padding: 0px 20px; color: white;">Activate?</button></a>

                                <?php }elseif($row['status'] == 1){echo "Already Activated";} ?>
                            </td>
                            <td><a href="<?php echo base_url().'admin/menuDelete/'.$row['id'];?>"
                                    class="btn d-grid btn-danger text-white aog-btn-r">
                                    Delete</a></td>
                        </tr>
                        <?php endforeach;?>
                        <tbody>

                        </tbody>
                    </table>
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




    </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
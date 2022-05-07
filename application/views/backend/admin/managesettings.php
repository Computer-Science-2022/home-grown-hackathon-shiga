<div id="page-wrapper">
    <div class="container-fluid" style="height: 80vh; overflow: scroll;">
        <div class="row bg-title">
          
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
        <div class="row">
            <div class="white-box">
                <strong>
                    <span class="page-title">System Settings</span>
                    <!-- <hr> -->
                    <!-- <a href="<?php echo base_url();?>admin/addsmscampaign"> <button type="button" class="btn btn-secondary">Send SMS
                    Campaign</button> </a> -->
                </strong>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Setting Name</th>
                                <th>Setting Value</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <?php
                                    $this->db->order_by('settings_id', 'DESC');
                                    // $this->db->limit(5);
                                    $users = $this->db->get_where('settings', array('nicename !=' => ''))->result_array();
                                    $i = 1;
                                    foreach($users as $row):
                                    ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $row['nicename'];?></td>
                            <form class="form-horizontal form-material" method="POST"
                                action="<?php echo base_url();?>admin/changesetting" enctype="multipart/form-data">
                                <td>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input type="hidden" class="form-control p-0 border-0" name="type"
                                            value="<?php echo $row['type'];?>" autofocus>
                                        <?php if($row['type'] == "skin"){?>
                                        <select name="description" id="" class="form-control p-0 border-0">
                                            <option value="1" <?php if ($row['description']==1){echo "selected";}?>>
                                                Neutral</option>
                                            <option value="2" <?php if ($row['description']==2){echo "selected";}?>>Red
                                            </option>
                                            <option value="3" <?php if ($row['description']==3){echo "selected";}?>>Blue
                                            </option>
                                            <option value="4" <?php if ($row['description']==4){echo "selected";}?>>
                                                Green</option>
                                        </select>

                                        <?php }else{?>
                                        <input type="text" class="form-control p-0 border-0" name="description"
                                            required="" value="<?php echo $row['description']; ?>" autofocus
                                            placeholder="<?php echo $row['description']; ?>">
                                        <?php   }?>

                                    </div>
                                </td>
                                <td><button class="btn btn-primary aog-btn">Edit Setting</button></td>
                            </form>
                        </tr>
                        <?php endforeach;?>
                        <tbody>

                        </tbody>
                    </table>
                </div>
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
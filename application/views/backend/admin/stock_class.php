<?php
$user = $this->db->get_where('shareholder', array('shareholder_id' => $this->session->userdata('login_user_id')));
?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- /.row -->
                <!-- .row -->
 
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'stocks')" onload="makePayment()" id="defaultOpen">Stock Subscription</button>
  <button class="tablinks" onclick="openCity(event, 'purchase')">Stock Packages</button>
  <button class="tablinks" onclick="openCity(event, 'pay')">Add New Stock Package</button>
</div>

<div id="stocks" class="tabcontent" id="defaultOpen">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Stock Subscription</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Package </th>
                                            <th>Subscription</th>
                                            <th>Paid</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $this->db->order_by('shareholder_id', 'DESC');
                                        $shareholders = $this->db->get('shareholder')->result_array();
                                        $i = 1;
                                        foreach($shareholders as $row):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $this->db->get_where('country', array('id'=> $row['country']))->row()->nicename;?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['phone'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!--End tab 1-->
            <div id="purchase" class="tabcontent">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Stock Packages</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Package Name</th>
                                            <th>Shares</th>
                                            <th>Minimum Shares</th>
                                            <th>Subscribed</th>
                                            <th>Paid</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $this->db->order_by('id', 'DESC');
                                        $packages = $this->db->get('package')->result_array();
                                        $i = 1;
                                        foreach($packages as $row):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo number_format($row['shares'],1,'.',',');?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><a href="<?php echo base_url().'admin/stock_class/edit/'.$row['id'];?>" data-toggle="tooltip" data-original-title="Edit Package"><i class="fa fa-pencil"></i></a></td>
                                            <td><a href="<?php echo base_url().'admin/stock_class/delete/'.$row['id'];?>" data-toggle="tooltip" data-original-title="Delete Package"><i class="fa fa-trash danger"></i></a></td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="pay" class="tabcontent">
         <div class="col-md-12col-xs-12">
            <div class="white-box">
            <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/stock_class/add">
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Package Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-line" name="name" required="" value="" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Total Shares</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="shares" required="" value="" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Minimum Shares</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="minimum" required="" value="" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Discount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="discount" required="" value="" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Package Status</label>
                        <div class="col-sm-9">
                            <select name="status" class="form-control" required="">
                                <option value="1" selected="">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <center><button class="btn-1">Add Package</button></center>
            </form>
        </div>

                <!-- <div class="col-sm-6">
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Name'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" required="" value="" autofocus>
                        </div>
                    </div>
                </div> -->
                
            </div>

        </div><!-- end all tabs-->
                <!-- /.row -->
            </div>
        </div>
        <!-- /#page-wrapper -->

</html>




<!-- Tab  -->
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>





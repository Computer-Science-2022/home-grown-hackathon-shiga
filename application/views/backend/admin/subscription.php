<div id="page-wrapper">
            <div class="container-fluid">
                <!-- /.row -->
                <!-- .row -->
 
<div class="tab">
  <button class="btn btn-primary" onclick="openCity(event, 'stocks')" onload="makePayment()" id="defaultOpen">Subscriptions</button>
  <button class="btn btn-primary" onclick="openCity(event, 'purchase')">Declare Subscription</button>
</div>

<div id="stocks" class="tabcontent" id="defaultOpen">

                <div class="row" style="height: 80vh; overflow: scroll;">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Subscriptions</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Package</th>
                                            <th>Amount (US$)</th>
                                            <th>Subscription Date</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $this->db->order_by('subscription_date', 'DESC');
                                    // $this->db->limit(20);
                                    $subscription = $this->db->get_where('subscription', array('status' => 'successful'))->result_array();
                                    $i = 1;
                                    foreach($subscription as $row):
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $this->db->get_where('user', array('id' => $row['user_id']))->row()->name;?></td>
                                        <td style="text-transform: capitalize;"><?php echo $row['package'];?></td>
                                        <td><?php echo number_format($row['paid']*$this->db->get_where('currency', array('name' => 'USD'))->row()->rate,1,'.',',');?></td>
                                        <td><?php echo date('M d, Y', strtotime($row['subscription_date']));?></td>
                                        <td></td>
                                    </tr>
                                <?php endforeach;?>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!--End tab 1-->
            <div id="purchase" class="tabcontent">
                <div class="row">
                    <div class="white-box">
                        <strong><h3><span style="color: #59A8DD;">Declare new subscription</span></h3></strong><hr>
                        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/subscription/declare" enctype="multipart/form-data">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <select name="user_id" class="form-control p-0 border-0">
                                    <option disabled="" selected="">Select User</option>
                                    <?php $this->db->order_by('id', 'DESC');
                                    $users = $this->db->get_where('user', array('status' => 1))->result_array();
                                    foreach($users as $user_row):?>
                                    <option value="<?php echo $user_row['id'];?>"><?php echo $user_row['name'].' ('.$user_row['phone'].')';?></option>
                                <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <select name="package" class="form-control p-0 border-0">
                                    <option disabled="" selected="">Select Package</option>
                                    <option value="basic">Basic</option>
                                    <option value="gold">Gold</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control p-0 border-0" name="description" required="" value="" autofocus placeholder="Description" label="description">
                            </div>
                            <button class="btn btn-primary">Declare</button>
                        </form>

                    </div>
                </div>
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





<div id="page-wrapper">
            <div class="container-fluid">
                <!-- /.row -->
                <!-- .row -->
 
<div class="tab">
  <button class="btn btn-primary" onclick="openCity(event, 'stocks')" onload="makePayment()" id="defaultOpen">Series</button>
  <button class="btn btn-primary" onclick="openCity(event, 'purchase')">New Serie</button>
</div>

<div id="stocks" class="tabcontent" id="defaultOpen">

                <div class="row" style="height: 80vh; overflow: scroll;">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Series</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Added Date</th>
                                            <th>Episodes</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $this->db->order_by('timestamp', 'ASC');
                                    // $this->db->limit(20);
                                    $series = $this->db->get('serie')->result_array();
                                    $i = 1;
                                    foreach($series as $row):
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo date('M d, Y', strtotime($row['timestamp']));?></td>
                                        <td><?php echo number_format($this->db->get_where('movie', array('serie_id' => $row['id'], 'status' => 1))->num_rows(),0,'.',','); ?></td>
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
                        <strong><h3><span style="color: #59A8DD;">Create new Serie</span></h3></strong><hr>
                        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/series/create" enctype="multipart/form-data">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control p-0 border-0" name="name" required="" value="" autofocus placeholder="Movie title" label="Category Name">
                            </div>
                            <button class="btn btn-primary">Create</button>
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





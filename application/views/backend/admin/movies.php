<div id="page-wrapper">
            <div class="container-fluid">
                <!-- /.row -->
                <!-- .row -->
 
<div class="tab">
  <button class="btn btn-primary" onclick="openCity(event, 'stocks')" onload="makePayment()" id="defaultOpen">All Movies</button>
  <button class="btn btn-primary" onclick="openCity(event, 'purchase')">Add Movie Link</button>
  <button class="btn btn-primary" onclick="openCity(event, 'pay')">Upload Movie</button>
</div>

<div id="stocks" class="tabcontent" id="defaultOpen">

                <div class="row" style="height: 80vh; overflow: scroll;">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Latest Videos</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Added Date</th>
                                            <th>Views</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $this->db->order_by('timestamp', 'DESC');
                                    // $this->db->limit(20);
                                    $movies = $this->db->get_where('movie', array('status' => '1'))->result_array();
                                    $i = 1;
                                    foreach($movies as $row):
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $row['title'];?></td>
                                        <td><?php echo date('M d, Y', strtotime($row['added_date']));?></td>
                                        <td><?php echo number_format($this->db->get_where('views', array('video_id' => $row['id']))->num_rows(),0,'.',','); ?></td>
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
                        <strong><h3><span style="color: #59A8DD;">Add an uploaded movie</span></h3></strong><hr>
                        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/movies/add" enctype="multipart/form-data">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control p-0 border-0" name="title" required="" value="" autofocus placeholder="Movie title" label="Movie title">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control p-0 border-0" name="description" required="" value="" autofocus placeholder="Description" label="Description">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control p-0 border-0" name="actors" required="" value="" autofocus placeholder="Main actors" label="Actors">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <select class="form-control p-0 border-0" name="category">
                                    <option disabled="" selected="">Select category</option>
                                    <?php 
                                    $categories = $this->db->get('category')->result_array();
                                    foreach($categories as $category):
                                    ?>
                                    <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                                      <?php endforeach;?>
                                    </select>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <select class="form-control p-0 border-0" name="serie">
                                    <option disabled="" selected="">Serie</option>
                                    <option value="0">Ending movie</option>
                                    <?php 
                                    $series = $this->db->get('serie')->result_array();
                                    foreach($series as $serie):
                                    ?>
                                    <option value="<?php echo $serie['id'];?>"><?php echo $serie['name'];?></option>
                                      <?php endforeach;?>
                                    </select>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control p-0 border-0" name="video_url" required="" value="" autofocus placeholder="Video URL (name of uploaded file)" label="Movie title">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control p-0 border-0" name="trailer_url" required="" value="" autofocus placeholder="Trailer URL (name of uploaded file)" label="Trailer URL">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control p-0 border-0" name="poster_url" required="" value="" autofocus placeholder="Poster URL (name of uploaded file)" label="Poster URL">
                            </div>
                            <center><button class="btn btn-primary">Proceed to upload movie</button></center>
                        </form>

                    </div>
                </div>

            </div>
            <div id="pay" class="tabcontent">
                <div class="row">
                    <div class="white-box">
                        <strong><h3><span style="color: #59A8DD;">Upload movie here</span></h3></strong><hr>
                        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/movies/create" enctype="multipart/form-data">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control p-0 border-0" name="title" required="" value="" autofocus placeholder="Movie title" label="Movie title">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control p-0 border-0" name="description" required="" value="" autofocus placeholder="Description" label="Description">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control p-0 border-0" name="actors" required="" value="" autofocus placeholder="Main actors" label="Actors">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <select class="form-control p-0 border-0" name="category">
                                    <option disabled="" selected="">Select category</option>
                                    <?php 
                                    $categories = $this->db->get('category')->result_array();
                                    foreach($categories as $category):
                                    ?>
                                    <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                                      <?php endforeach;?>
                                    </select>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <select class="form-control p-0 border-0" name="serie">
                                    <option disabled="" selected="">Serie</option>
                                    <option value="0">Ending movie</option>
                                    <?php 
                                    $series = $this->db->get('serie')->result_array();
                                    foreach($series as $serie):
                                    ?>
                                    <option value="<?php echo $serie['id'];?>"><?php echo $serie['name'];?></option>
                                      <?php endforeach;?>
                                    </select>
                            </div>
                            <center><button class="btn btn-primary">Proceed to upload movie</button></center>
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





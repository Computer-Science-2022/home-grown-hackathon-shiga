<div id="page-wrapper">
    <div class="container-fluid" style="height: 80vh; overflow: scroll;">
        <div class="row bg-title">
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
        <style>
.aog-title {
    font-size: 1.2em;
    /* color: green; */
}
</style>

<?php
  $product = $this->db->get_where('employees', array('id' => $project_id))->result_array();
  foreach($product as $row):
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $worklocation = $row['worklocation'];
    $plancoverage = $row['plancoverage'];
  endforeach;
?>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;" style="height: 80vh; overflow: scroll;">
    <div class="row" style="height: 80vh; overflow: scroll;">
        <span class="page-title">Edit Employee: <?php echo $name;?></span><br>

        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/menus/update"
            enctype="multipart/form-data">
            <div class="white-box">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input type="hidden" class="form-control p-0 border-0" name="id" value="<?php echo $id; ?>"
                        autofocus placeholder="" label="Name"><br>
                    <br><span style="font-style: italic; color: grey;">Name</span>
                    <input type="text" class="form-control p-0 border-0" name="name" value="<?php echo $name; ?>"
                        autofocus placeholder="Item name (English)" label="Name">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><span style="font-style: italic; color: grey;">Email</span>
                    <input type="text" class="form-control p-0 border-0" name="email" value="<?php echo $email; ?>"
                        autofocus placeholder="Email" label="Email">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><span style="font-style: italic; color: grey;">Phone</span>
                    <input type="text" class="form-control p-0 border-0" name="phone" value="<?php echo $phone; ?>"
                        autofocus placeholder="Phone" label="Phone">
                </div>
            </div><br>
            <div class="row white-box">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3 class="box-title">Primary Work Location</h3>
                    <input type="text" class="form-control p-0 border-0" name="worklocation" required="" value="<?php echo $worklocation; ?>"
                        autofocus placeholder="Primary Work Location" label="Primary Work Location">
                </div>
            </div>
            <div class="row white-box">
                <br>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3 class="box-title">Select Coverage For Employee</h3>
                    <select required class="form-control p-0 border-0" name="plancoverage">
                        <option value="coverage not selected" selected>Select Coverage For Employee</option>
                        <option value="Africa">Africa</option>
                        <option value="Europe, Middle East, and Africa(EMEA)">Europe, Middle East, and Africa(EMEA)
                        </option>
                        <option value="Europe">Europe</option>
                        <option value="Asia">Asia</option>
                        <option value="North America">North America</option>
                        <option value="South America">South America</option>
                        <option value="World Wide">World Wide</option>
                    </select>
                </div>
            </div>
            <center><button class="btn btn-primary aog-btn">Proceed to Update Employee Details</button></center>
        </form>

    </div>
</div>
<br>
<script>
CKEDITOR.replace('descriptionEng');
</script>

<script>
CKEDITOR.replace('descriptionFre');
</script>

<script>
CKEDITOR.replace('descriptionKin');
</script>

           
            
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
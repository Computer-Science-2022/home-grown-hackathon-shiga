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
        <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;" style="height: 80vh; overflow: scroll;">
    <div class="row">
        <span class="page-title">Add Medical Kit</span>
        <hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/menus/create"
            enctype="multipart/form-data">
            <div class="white-box">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- <h3 class="box-title">Name</h3> -->
                    <input type="text" class="form-control p-0 border-0" name="name" required="" value="" autofocus
                        placeholder="Name" label="Name">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- <h3 class="box-title">Name</h3> -->
                    <input type="text" class="form-control p-0 border-0" name="email" required="" value="" autofocus
                        placeholder="Email" label="Email">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- <h3 class="box-title">Name</h3> -->
                    <input type="text" class="form-control p-0 border-0" name="phone" required="" value="" autofocus
                        placeholder="Phone" label="Phone">
                </div>
            </div>
            <div class="row white-box">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- <h3 class="box-title">Remaining Stock</h3> -->
                    <input type="text" class="form-control p-0 border-0" name="worklocation" required="" value=""
                        autofocus placeholder="Primary Work Location" label="Primary Work Location">
                </div>
            </div>
            <div class="row white-box">
                <br>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- <h3 class="box-title">Remaining Stock</h3> -->
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

            <center><button class="btn btn-primary">Add Employee</button></center>
        </form>

    </div>
</div>
<br>
<script>
CKEDITOR.replace('descriptionEng');
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
<div class="row">
    <div class="white-box">
    <span class="page-title">Add Consultant</span><hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/consultants/create" enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- <h3 class="box-title" style="color: black;">Admin Name</h3> -->
                <input type="text" class="form-control p-0 border-0" name="name" required="" value="" autofocus placeholder="Name" label="Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- <h3 class="box-title" style="color: black;">Admin Username</h3> -->
                <input type="text" class="form-control p-0 border-0" name="username" required="" value="" autofocus placeholder="Username" label="Username">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- <h3 class="box-title" style="color: black;">Password</h3> -->
                <input type="password" class="form-control p-0 border-0" name="password" required="" value="" autofocus placeholder="Password" label="Password">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- <h3 class="box-title" style="color: black;">Confirm Password</h3> -->
                <input type="password" class="form-control p-0 border-0" name="confirmpassword" required="" value="" autofocus placeholder="Confirm Password" label="Confirm Password">
            </div>
            <center><button class="btn btn-primary aog-btn">Add an admin</button></center>
        </form>

    </div>
</div>
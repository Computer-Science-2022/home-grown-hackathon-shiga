<div class="row">
    <div class="white-box">
        <span class="page-title">Add Partner</span>
        <hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/sponsors/create"
            enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title" style="color: black;">Partner Name</h3>
                <input type="text" class="form-control p-0 border-0" name="name" required="" value="" autofocus
                    placeholder="Name" label="Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title" style="color: black;">Partner Image</h3>
                <input type="file" name="image"
                    style="width: 100%; background-color: #eef1f5; margin-bottom: 20px; height: 35px; border: solid .5px grey; padding-left: 20px;"
                    accept="image/*" required="">
            </div>
            <center><button class="btn btn-primary">Proceed to add Partner</button></center>
        </form>

    </div>
</div>
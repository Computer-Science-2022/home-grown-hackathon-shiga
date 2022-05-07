<div class="row">
    <div class="white-box">
    <span class="page-title">Add Project</span><hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/movies/create" enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="text" class="form-control p-0 border-0" name="name" required="" value="" autofocus placeholder="Name" label="Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="text" class="form-control p-0 border-0" name="description" required="" value="" autofocus placeholder="Description" label="Description">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="file" name="image" required="" placeholder="image" placeholder="Image">
            </div>

            <center><button class="btn btn-primary">Proceed to Upload Project</button></center>
        </form>

    </div>
</div>
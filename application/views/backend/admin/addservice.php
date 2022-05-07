<style>
    .aog-title{
        font-size: 1.4em;
    }
</style>


<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;">
    <div class="row" style="height: 80vh; overflow: scroll;">
        <strong>
            <span class="page-title">Add Service</span>
        </strong>
        <hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/service/create"
            enctype="multipart/form-data">
            <div class="row white-box">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- <h3 class="box-title aog-title">English Name</h3> -->
                <input type="text" class="form-control p-0 border-0" name="name" required="" value="" autofocus
                    placeholder="Service name (English)" label="Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- <h3 class="box-title aog-title" style="color: black;">French Name</h3> -->
                <input type="text" class="form-control p-0 border-0" name="nameFre" required="" value="" autofocus
                    placeholder="Service name (French)" label="French Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- <h3 class="box-title aog-title" style="color: black;">Kinyarwanda Name</h3> -->
                <input type="text" class="form-control p-0 border-0" name="nameKin" required="" value="" autofocus
                    placeholder="Service name (Kinyarwanda)" label="Kinyarwanda Name">
            </div>
            </div>
            <div>
            <br>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h3 class="page-title aog-title" style="color: black;">English Short Description</h3>
                    <textarea name="shortDesc"></textarea>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h3 class="page-title aog-title" style="color: black;">English Full Description</h3>
                    <textarea name="descriptionEng"></textarea>
                </div>
            </div><br>

            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h3 class="page-title aog-title" style="color: black;">French Short Description</h3>
                    <textarea name="shortDescFre"></textarea>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h3 class="page-title aog-title" style="color: black;">French Full Description</h3>
                    <textarea name="descriptionFre"></textarea>
                </div>
            </div><br>

            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h3 class="page-title aog-title" style="color: black;">Kinyarwanda Short Description</h3>
                    <textarea name="shortDescKin"></textarea>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h3 class="page-title aog-title" style="color: black;">Kinyarwanda Full Description</h3>
                    <textarea name="descriptionKin"></textarea>
                </div>
            </div>
            <div class="white-box">
            <h3 class="page-title aog-title" style="color: black;">Add Image</h3>
            <input type="file" name="image" placeholder="image" placeholder="Image">
            </div>
            <br>
            <center><button class="btn btn-primary aog-btn">Proceed to Upload Service</button></center>
        </form>

    </div>
</div>
<br>

<script>
CKEDITOR.replace('descriptionKin');
</script>

<script>
CKEDITOR.replace('descriptionFre');
</script>

<script>
CKEDITOR.replace('descriptionEng');
</script>

<script>
CKEDITOR.replace('shortDesc');
</script>

<script>
CKEDITOR.replace('shortDescFre');
</script>

<script>
CKEDITOR.replace('shortDescKin');
</script>
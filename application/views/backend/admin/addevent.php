<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;">
    <div class="row">
        <strong>
            <span class="page-title">Add Health Tip</span>
        </strong>
        <hr>
        <form class="form-horizontal form-material" method="POST"
            action="<?php echo base_url();?>admin/eventsupdates/create" enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title">English Name</h3>
                <input type="text" class="form-control p-0 border-0" name="name" required="" value="" autofocus
                    placeholder="Name" label="Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title" style="color: black;">Kinyarwanda Name</h3>
                <input type="text" class="form-control p-0 border-0" name="nameKin" required="" value="" autofocus
                    placeholder="Kinyarwanda Name" label="Kinyarwanda Name">
            </div>
            <br>
            <h3 class="box-title" style="color: black;">English Short Description</h3>
            <textarea name="shortDesc"></textarea>
            <br>
            <h3 class="box-title" style="color: black;">Kinyarwanda Short Description</h3>
            <textarea name="shortDescKin"></textarea>
            <br>
            <h3 class="box-title" style="color: black;">English Description</h3>
            <textarea name="descriptionEng"></textarea>
            <br>
            <h3 class="box-title" style="color: black;">Kinyarwanda Description</h3>
            <textarea name="descriptionKin"></textarea>
            <br>
            <h3 class="box-title" style="color: black;">Add Image</h3>
            <input type="file" name="image" placeholder="image" placeholder="Image">
            <br>
            <center><button class="btn btn-primary">Add to health tips</button></center>
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
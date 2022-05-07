<style>
    .aog-title{
        font-size: 1.4em;
    }
</style>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;">
    <div class="row" style="height: 80vh; overflow: scroll;">
        <strong>
            <h3 class="page-title"><span  style="color: <?php echo $color_pri;?>">Add About Us</span></h3>
        </strong>
        <hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/aboutus/create"
            enctype="multipart/form-data">
            <div class="white-box">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- <h3 class="box-title aog-title">English Name</h3> -->
                <input type="text" class="form-control p-0 border-0" name="name" required="" value="" autofocus
                    placeholder="English name..." label="Name">
            </div>
          
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- <h3 class="box-title aog-title" style="color: black;">Kinyarwanda Name</h3> -->
                <input type="text" class="form-control p-0 border-0" name="nameKin" required="" value="" autofocus
                    placeholder="Kinyarwanda name..." label="Kinyarwanda Name">
            </div>
            </div>
            <br>
            <h3 class="box-title aog-title" style="color: black;">English Description</h3>
            <textarea name="descriptionEng"></textarea>
            <br>
           
            <h3 class="box-title aog-title" style="color: black;">Kinyarwanda Description</h3>
            <textarea name="descriptionKin"></textarea>

            <br>
            <center><button class="btn btn-primary aog-btn">Add</button></center><br>
        </form>

    </div>
</div>

<script>
CKEDITOR.replace('descriptionKin');
</script>

<script>
CKEDITOR.replace('descriptionFre');
</script>

<script>
CKEDITOR.replace('descriptionEng');
</script>
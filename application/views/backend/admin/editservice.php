<?php
  $product = $this->db->get_where('services', array('id' => $project_id))->result_array();
  foreach($product as $row):
    $id = $row['id'];
    $name = $row['name'];
    $nameFre = $row['nameFre'];
    $nameKin = $row['nameKin'];
    $description = $row['description'];
    $descriptionFre = $row['descriptionFre'];
    $descriptionKin = $row['descriptionKin'];
    $shortDesc = $row['shortDesc'];
    $shortDescFre = $row['shortDescFre'];
    $shortDescKin = $row['shortDescKin'];
    $image = $row['image'];
  endforeach;
?>

<style>
    .aog-title{
        font-size: 1.4em;
    }
</style>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;" style="height: 80vh; overflow: scroll;">
    <div class="row" style="height: 80vh; overflow: scroll;">
        <strong>
            <span class="page-title">Edit Service</span>
        </strong>
        <hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/service/update"
            enctype="multipart/form-data">
            <div class="white-box">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" class="form-control p-0 border-0" name="id" value="<?php echo $id; ?>" autofocus
                    placeholder="" label="Name">
                <h3 class="box-title aog-title">English Name</h3>
                <input type="text" class="form-control p-0 border-0" name="name" value="<?php echo $name; ?>" autofocus
                    placeholder="<?php echo $name; ?>" label="Name">
            </div>
            <br>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title aog-title" style="color: black;">French Name</h3>
                <input type="text" class="form-control p-0 border-0" name="nameFre" required=""
                    value="<?php echo $nameFre; ?>" autofocus placeholder="<?php echo $nameFre; ?>" label="French Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title aog-title" style="color: black;">Kinyarwanda Name</h3>
                <input type="text" class="form-control p-0 border-0" name="nameKin" required=""
                    value="<?php echo $nameKin; ?>" autofocus placeholder="<?php echo $nameKin; ?>"
                    label="Kinyarwanda Name">
            </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h3 class="page-title aog-title">English Short Description</h3>
                <textarea name="shortDesc"><?php echo $shortDesc; ?></textarea>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h3 class="page-title aog-title">English Full Description</h3>
                <textarea name="descriptionEng"><?php echo $description; ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h3 class="box-title aog-title" style="color: black;">French Short Description</h3>
                <textarea name="shortDescFre"><?php echo $shortDescFre; ?></textarea>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h3 class="box-title aog-title" style="color: black;">French Full Description</h3>
                <textarea name="descriptionFre"><?php echo $descriptionFre; ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h3 class="box-title aog-title" style="color: black;">Kinyarwanda Short Description</h3>
                <textarea name="shortDescKin"><?php echo $shortDescKin; ?></textarea>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h3 class="box-title aog-title" style="color: black;">Kinyarwanda Description</h3>
                <textarea name="descriptionKin"><?php echo $descriptionKin; ?></textarea>
                </div>
            </div>
            
            
            <div class="white-box">
            <h3 class="box-title aog-title" style="color: black;">Current Image</h3>
            <div class="col-md-3">
                <img src="<?php echo $this->Crud_model->get_services_image_url($image);?>" width="100%">
            </div>
            <br>
            <h3 class="box-title aog-title" style="color: black;">Update Image</h3>
            <input type="file" name="image" placeholder="image" placeholder="Image">
            </div>
            <center><button class="btn btn-primary aog-btn">Proceed to Update Service</button></center>
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
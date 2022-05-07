<?php
  $product = $this->db->get_where('events', array('id' => $project_id))->result_array();
  foreach($product as $row):
    $id = $row['id'];
    $name = $row['name'];
    $nameKin = $row['nameKin'];
    $description = $row['description'];
    $descriptionKin = $row['descriptionKin'];
    $shortDesc = $row['shortDesc'];
    $shortDescKin = $row['shortDescKin'];
    $image = $row['image'];
  endforeach;
?>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;">
    <div class="row">
        <strong><h3><span style="color: #59A8DD;">Edit Health Tip</span></h3></strong><hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/eventsupdates/update" enctype="multipart/form-data">
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" class="form-control p-0 border-0" name="id" value="<?php echo $id; ?>" autofocus
                    placeholder="" label="Name">
                <h3 class="box-title">English Name</h3>
                <input type="text" class="form-control p-0 border-0" name="name" value="<?php echo $name; ?>" autofocus
                    placeholder="<?php echo $name; ?>" label="Name">
            </div>
            <br>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title" style="color: black;">Kinyarwanda Name</h3>
                <input type="text" class="form-control p-0 border-0" name="nameKin" required=""
                    value="<?php echo $nameKin; ?>" autofocus placeholder="<?php echo $nameKin; ?>"
                    label="Kinyarwanda Name">
            </div>
            <br>
            <h3 class="box-title" style="color: black;">English Description</h3>
            <textarea name="descriptionEng"><?php echo $description; ?></textarea>
            <br>
            <h3 class="box-title" style="color: black;">Kinyarwanda Description</h3>
            <textarea name="descriptionKin"><?php echo $descriptionKin; ?></textarea>
            <br>
            <h3 class="box-title" style="color: black;">English Short Description</h3>
            <textarea name="shortDesc"><?php echo $shortDesc; ?></textarea>
            <br>
            <h3 class="box-title" style="color: black;">Kinyarwanda Short Description</h3>
            <textarea name="shortDescKin"><?php echo $shortDescKin; ?></textarea>
            <br>
            <h3 class="box-title" style="color: black;">Current Image</h3>
            <div class="col-md-3">
                <img src="<?php echo $this->Crud_model->get_event_image_url($image);?>" width="100%">
            </div>
            <br>
            <h3 class="box-title" style="color: black;">Update Image</h3>
            <input type="file" name="image" placeholder="image" placeholder="Image">
            <center><button class="btn btn-primary">Proceed to Update Health Tip</button></center>
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
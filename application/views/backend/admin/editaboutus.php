<?php
  $product = $this->db->get_where('aboutus', array('id' => $project_id))->result_array();
  foreach($product as $row):
    $id = $row['id'];
    $name = $row['name'];
    $nameKin = $row['nameKin'];
    $description = $row['description'];
    $descriptionKin = $row['descriptionKin'];
  endforeach;
?>
<style>
    .aog-title{
        font-size: 1.4em;
    }
</style>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div class="row" style="height: 80vh; overflow: scroll;">
    <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/aboutus/update"
        enctype="multipart/form-data">
        <div style="margin-left: 2%; margin-right: 2%;">
        <!-- <div class="white-box"> -->
            <strong>
                <span class="page-title">Add About Us</span>
            </strong>
            <hr>

            <div class="white-box">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" class="form-control p-0 border-0" name="id" value="<?php echo $id; ?>" autofocus
                    placeholder="" label="Name">
                    <h3 class="box-title aog-title" >English Name</h3>
                <input type="text" class="form-control p-0 border-0" name="name" value="<?php echo $name; ?>" autofocus
                    placeholder="<?php echo $name; ?>" label="Name">
            </div>
            <br>
           
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title aog-title" style="color: black;">Kinyarwanda Name</h3>
                <input type="text" class="form-control p-0 border-0" name="nameKin" required=""
                    value="<?php echo $nameKin; ?>" autofocus placeholder="<?php echo $nameKin; ?>"
                    label="Kinyarwanda Name">
            </div>
            </div>
        </div>
        <br>
        <div style="margin-left: 2%; margin-right: 2%;">
        <h3 class="box-title aog-title" style="color: black;">English Description</h3>
        <textarea name="descriptionEng"><?php echo $description; ?></textarea>
        <br>
        <h3 class="box-title aog-title" style="color: black;">Kinyarwanda Description</h3>
        <textarea name="descriptionKin"><?php echo $descriptionKin; ?></textarea>
        <br>
        <center><button class="btn btn-primary aog-btn">Update Content</button></center>
    </form>
</div>
</div>
<br>



<!-- <script>
  CKEDITOR.replace('description');
</script> -->
<script>
CKEDITOR.replace('descriptionKin');
</script>

<script>
CKEDITOR.replace('descriptionEng');
</script>
<?php
  $product = $this->db->get_where('team', array('id' => $project_id))->result_array();
  foreach($product as $row):
    $id = $row['id'];
    $name = $row['name'];
    $description = $row['description'];
    $descriptionKin = $row['descriptionKin'];
    $job = $row['job'];
    $phone = $row['phone'];
    $email = $row['email'];
    $image = $row['image'];
  endforeach;
?>

<style>
    .aog-title{
        font-size: 1.4em;
    }
</style>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;">
    <div class="row">
        <strong>
            <span class="page-title">Edit Team Member</span>
        </strong>
        <hr>
        <form class="form-horizontal form-material" method="POST"
            action="<?php echo base_url();?>admin/teamEngine/update" enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title aog-title" style="color: black;">Name</h3>
                <input type="hidden" class="form-control p-0 border-0" name="id" value="<?php echo $id; ?>" autofocus
                    placeholder="" label="Name">
                <input type="text" class="form-control p-0 border-0" name="name" value="<?php echo $name; ?>" autofocus
                    placeholder="<?php echo $name; ?>" label="Name">
            </div>
            <br>
            <h3 class="box-title aog-title" style="color: black;">English Description</h3>
            <textarea name="descriptionEng"><?php echo $description; ?></textarea>
            <br>
            <h3 class="box-title aog-title" style="color: black;">Kinyarwanda Description</h3>
            <textarea name="descriptionKin"><?php echo $descriptionKin; ?></textarea>
            <br>
            <div class="white-box">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title aog-title" style="color: black;">Position</h3>
                <input type="text" class="form-control p-0 border-0" name="job" value="<?php echo $job; ?>" autofocus
                    placeholder="<?php echo $job; ?>" label="Job">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title aog-title" style="color: black;">Phone Number</h3>
                <input type="text" class="form-control p-0 border-0" name="phone" value="<?php echo $phone; ?>"
                    autofocus placeholder="<?php echo $phone; ?>" label="Phone">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title aog-title" style="color: black;">Email</h3>
                <input type="text" class="form-control p-0 border-0" name="email" value="<?php echo $email; ?>"
                    autofocus placeholder="<?php echo $email; ?>" label="Email">
            </div>
            <br>
            <h3 class="box-title aog-title" style="color: black;">Current Image</h3>
            <div class="col-md-3">
                <img src="<?php echo $this->Crud_model->get_team_image_url($image);?>" width="100%">
            </div>
            <br>
            <h3 class="box-title aog-title" style="color: black;">Update Image</h3>
            <input type="file" name="image" placeholder="image" placeholder="Image">
            <br>
            </div>

            <center><button class="btn btn-primary aog-btn">Proceed to Edit Team Member</button></center>
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
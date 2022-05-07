<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<?php
  $product = $this->db->get_where('testimonial', array('id' => $project_id))->result_array();
  foreach($product as $row):
    $id = $row['id'];
    $name = $row['name'];
    $type = $row['type'];
    $testimonial = $row['testimonial'];
    $image = $row['image'];
  endforeach;
?>

<div class="row white-box">
    <!-- <div class="white-box"> -->
        <strong>
            <span class="page-title">Edit Testimonial</span>
        </strong>
        <hr>
        <div class="">
        <form class="form-horizontal form-material" method="POST"
            action="<?php echo base_url();?>admin/testimonial/update" enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" class="form-control p-0 border-0" name="id" value="<?php echo $id; ?>" autofocus
                    placeholder="" label="Name">
                    <h3 class="box-title">Name</h3>
                <input type="text" class="form-control p-0 border-0" name="name" value="<?php echo $name; ?>" autofocus
                    placeholder="<?php echo $name; ?>" label="Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Select Program/Service/Project</h3>
                <select class="form-control p-0 border-0" name="type" style="width:100%; height: 38px;">
                    <option selected>Program/Service/Project</option>
                    <?php
                                                    $categories = $this->db->get_where('services')->result_array();
                                                    foreach($categories as $category):
                                                    ?>

                    <option value="<?php echo $category['name'];?>">
                        <?php echo $category['name'];?></option>
                    <?php endforeach; ?>
                    <?php
                                                    $categories1 = $this->db->get_where('programmes')->result_array();
                                                    foreach($categories1 as $category):
                                                    ?>

                    <option value="<?php echo $category['name'];?>">
                        <?php echo $category['name'];?></option>
                    <?php endforeach; ?>
                    <?php
                                                    $categories2 = $this->db->get_where('projects')->result_array();
                                                    foreach($categories2 as $category):
                                                    ?>

                    <option value="<?php echo $category['name'];?>">
                        <?php echo $category['name'];?></option>
                    <?php endforeach; ?>
                </select>
                <!-- <input type="text" class="form-control p-0 border-0" name="type" value="" autofocus placeholder="<?php echo $type; ?>" label="Type"> -->
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Testimonial</h3>
                <textarea class="form-control p-0 border-0" name="testimonial" value="<?php echo $testimonial; ?>" autofocus
                    placeholder="<?php echo $testimonial; ?>" label="testimonial"><?php echo $testimonial; ?></textarea>
            </div>
            <br>
            <h3 class="box-title" style="color: black;">Current Image</h3>
            <div class="col-md-3">
                <img src="<?php echo $this->Crud_model->get_testimonial_image_url($image);?>" width="50%">
            </div>
            <br>
            <h3 class="box-title" style="color: black;">Update Image</h3>
            <input type="file" name="image" placeholder="image" placeholder="Image">
            <br>

            </div>
            <center><button class="btn btn-primary aog-btn">Update</button></center>
        </form>

    <!-- </div> -->
</div>

<script>
    CKEDITOR.replace('testimonial');
    </script>
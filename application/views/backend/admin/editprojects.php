<?php
  $product = $this->db->get_where('projects', array('id' => $project_id))->result_array();
  foreach($product as $row):
    $id = $row['id'];
    $name = $row['name'];
    $description = $row['description'];
  endforeach;
?>

<div class="row">
    <div class="white-box">
        <strong><h3><span style="color: #59A8DD;">Edit Project</span></h3></strong><hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/movies/update" enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <input type="hidden" class="form-control p-0 border-0" name="id" value="<?php echo $id; ?>" autofocus placeholder="" label="Name">

                <input type="text" class="form-control p-0 border-0" name="name"  value="" autofocus placeholder="<?php echo $name; ?>" label="Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="text" class="form-control p-0 border-0" name="description" value="" autofocus placeholder="<?php echo $description; ?>" label="Description">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="file" name="image" required="" placeholder="image" placeholder="Image">
            </div>

            <center><button class="btn btn-primary">Proceed to Update Project</button></center>
        </form>

    </div>
</div>
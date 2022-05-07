<?php
  $product = $this->db->get_where('sponsor', array('id' => $project_id))->result_array();
  foreach($product as $row):
    $id = $row['id'];
    $name = $row['name'];
  endforeach;
?>

<div class="row">
    <div class="white-box">
        <strong>
            <h3><span style="color: #59A8DD;">Edit Partner</span></h3>
        </strong>
        <hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/sponsors/update"
            enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title" style="color: black;">Partner Name</h3>
                <input type="hidden" class="form-control p-0 border-0" name="id" value="<?php echo $id; ?>" autofocus
                    placeholder="" label="Name">

                <input type="text" class="form-control p-0 border-0" name="name" value="<?php echo $name; ?>" autofocus
                    placeholder="<?php echo $name; ?>" label="Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title" style="color: black;">Partner Image</h3>
                <input type="file" name="image"
                    style="width: 100%; background-color: #eef1f5; margin-bottom: 20px; height: 35px; border: solid .5px grey; padding-left: 20px;"
                    accept="image/*" required="">
            </div>
            <center><button class="btn btn-primary">Proceed to Update Partner</button></center>
        </form>

    </div>
</div>
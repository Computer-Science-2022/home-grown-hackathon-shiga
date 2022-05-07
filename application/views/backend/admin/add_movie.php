<div class="row">
    <div class="white-box">
        <span class="page-title">Add movie</span><hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/movies/create" enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="text" class="form-control p-0 border-0" name="title" required="" value="" autofocus placeholder="Movie title" label="Movie title">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="text" class="form-control p-0 border-0" name="description" required="" value="" autofocus placeholder="Description" label="Description">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="text" class="form-control p-0 border-0" name="actors" required="" value="" autofocus placeholder="Main actors" label="Actors">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <select class="form-control p-0 border-0" name="category">
                    <option disabled="" selected="">Select category</option>
                    <?php 
                    $categories = $this->db->get('category')->result_array();
                    foreach($categories as $category):
                    ?>
                    <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                      <?php endforeach;?>
                    </select>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <select class="form-control p-0 border-0" name="serie">
                    <option disabled="" selected="">Serie</option>
                    <option value="0">Ending movie</option>
                    <?php 
                    $series = $this->db->get('serie')->result_array();
                    foreach($series as $serie):
                    ?>
                    <option value="<?php echo $serie['id'];?>"><?php echo $serie['name'];?></option>
                      <?php endforeach;?>
                    </select>
            </div>
            <center><button class="btn btn-primary">Proceed to upload movie</button></center>
        </form>

    </div>
</div>
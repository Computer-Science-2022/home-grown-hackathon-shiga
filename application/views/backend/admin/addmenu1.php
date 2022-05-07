<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;" style="height: 80vh; overflow: scroll;">
    <div class="row" style="height: 80vh; overflow: scroll;">
        <strong>
        <span class="page-title">Add Menu Item</span>
        </strong>
        <hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/menus1/create"
            enctype="multipart/form-data">
            <div class="white-box">
                <input type="hidden" name="categoryName" value="programmes">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- <h3 class="box-title">Name</h3> -->
                    <input type="text" class="form-control p-0 border-0" name="name" required="" value="" autofocus placeholder="Name (English)" label="Name">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- <h3 class="box-title">Name (French)</h3> -->
                    <input type="text" class="form-control p-0 border-0" name="nameFre" required="" value="" autofocus placeholder="Name (French)" label="Name">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- <h3 class="box-title">Name (Kinyarwanda)</h3> -->
                    <input type="text" class="form-control p-0 border-0" name="nameKin" required="" value="" autofocus placeholder="Name (Kinyarwanda)" label="Name">
                </div>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Description (English)</h3>
            <textarea name="descriptionEng"></textarea>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Description (French)</h3>
            <textarea name="descriptionFre"></textarea>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Description (Kinyarwanda)</h3>
            <textarea name="descriptionKin"></textarea>
            </div>

            <div class="white-box">
                <div class="row">
                    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <!-- <h3 class="box-title">Remaining Stock</h3> -->
                        <input type="number" class="form-control p-0 border-0" name="remain" required="" value="" autofocus placeholder="Remaining in stock" label="Description">
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <!-- <h3 class="box-title">Price (RWF)</h3> -->
                        <input type="number" class="form-control p-0 border-0" name="price" required="" value="" autofocus placeholder="Price (RWF)" label="Description">
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <!-- <h3 class="box-title">Service Category Name</h3> -->
                        <select required class="form-control p-0 border-0" name="subCategory" required>
                            <option selected value="" disabled>Select programme category</option>
                            <?php
                        $categories = $this->db->get_where('programmes')->result_array();
                        foreach($categories as $category):
                        ?>
                            <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
            </div>






            
            <div class="row">
                <div class="white-box col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <span class="page-title">English</span>
                    <div class="form-group col-12">
                        <input type="text" class="form-control p-0 border-0" name="paymentDuration" required="" value="" autofocus placeholder="Subscription Duration (Include Per Month/Year/Once)" label="Description">
                        <input type="text" class="form-control p-0 border-0" name="feature" required="" value="" autofocus placeholder="Feature 1" label="Description">
                        <input type="text" class="form-control p-0 border-0" name="feature1" required="" value="" autofocus placeholder="Feature 2" label="Description">
                        <input type="text" class="form-control p-0 border-0" name="feature2" value="" autofocus placeholder="Feature 3" label="Description">
                        <input type="text" class="form-control p-0 border-0" name="feature3" value="" autofocus placeholder="Feature 4" label="Description">
                        <input type="text" class="form-control p-0 border-0" name="feature4" value="" autofocus placeholder="Feature 5" label="Description">
                        <input type="text" class="form-control p-0 border-0" name="feature5" value="" autofocus placeholder="Feature 6" label="Description">

                    </div>
                </div>

                <div class="white-box col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <span class="page-title">French</span>
                    <div class="form-group col-12">
                    <input type="text" class="form-control p-0 border-0" name="paymentDurationFre" required="" value="" autofocus placeholder="Subscription Duration (French)" label="Description">
                    <input type="text" class="form-control p-0 border-0" name="featureFre" required="" value="" autofocus placeholder="Feature 1 (French)" label="Description">
                    <input type="text" class="form-control p-0 border-0" name="feature1Fre" required="" value="" autofocus placeholder="Feature 2 (French)" label="Description">
                    <input type="text" class="form-control p-0 border-0" name="feature2Fre" value="" autofocus placeholder="Feature 3 (French)" label="Description">
                    <input type="text" class="form-control p-0 border-0" name="feature3Fre" value="" autofocus placeholder="Feature 4 (French)" label="Description">
                    <input type="text" class="form-control p-0 border-0" name="feature4Fre" value="" autofocus placeholder="Feature 5 (French)" label="Description">
                    <input type="text" class="form-control p-0 border-0" name="feature5Fre" value="" autofocus placeholder="Feature 6 (French)" label="Description">
                    </div>
                </div>

                <div class="white-box col-lg-4 col-md-4 col-sm-12 col-xs-12" style="border-left: <?php echo $color_pri;?> 1px;">
                <span class="page-title">Kinyarwanda</span>
                    <div class="form-group col-12">
                    <input type="text" class="form-control p-0 border-0" name="paymentDurationKin" required="" value="" autofocus placeholder="Subscription Duration (Kinyarwanda)" label="Description">
                    <input type="text" class="form-control p-0 border-0" name="featureKin" required="" value="" autofocus placeholder="Feature 1 (Kinyarwanda)" label="Description">
                    <input type="text" class="form-control p-0 border-0" name="feature1Kin" required="" value="" autofocus placeholder="Feature 2 (Kinyarwanda)" label="Description">
                    <input type="text" class="form-control p-0 border-0" name="feature2Kin" value="" autofocus placeholder="Feature 3 (Kinyarwanda)" label="Description">
                    <input type="text" class="form-control p-0 border-0" name="feature3Kin" value="" autofocus placeholder="Feature 4 (Kinyarwanda)" label="Description">
                    <input type="text" class="form-control p-0 border-0" name="feature4Kin" value="" autofocus placeholder="Feature 5 (Kinyarwanda)" label="Description">
                    <input type="text" class="form-control p-0 border-0" name="feature5Kin" value="" autofocus placeholder="Feature 6 (Kinyarwanda)" label="Description">      
                    </div>
                </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 white-box">
                    <h3 class="box-title">Image</h3>
                        <input type="file" name="image" required="" placeholder="image" placeholder="Image">
                    </div>
            </div>
            <center><button class="btn btn-primary">Add menu item</button></center>
        </form>

    </div>
</div>
<br>
<script>
CKEDITOR.replace('descriptionEng');
</script>

<script>
CKEDITOR.replace('descriptionFre');
</script>

<script>
CKEDITOR.replace('descriptionKin');
</script>
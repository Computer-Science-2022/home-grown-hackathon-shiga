<?php
  $product = $this->db->get_where('menu', array('id' => $project_id))->result_array();
  foreach($product as $row):
    $id = $row['id'];
    $name = $row['name'];
    $nameFre = $row['nameFre'];
    $nameKin = $row['nameKin'];
    $remain = $row['remain'];
    $description = $row['description'];
    $descriptionFre = $row['descriptionFre'];
    $descriptionKin = $row['descriptionKin'];
    $price = $row['price'];
    $paymentDuration = $row['paymentDuration'];
    $paymentDurationFre = $row['paymentDurationFre'];
    $paymentDurationKin = $row['paymentDurationKin'];
    $subCategory = $row['subCategory'];
    $feature = $row['feature'];
    $featureFre = $row['featureFre'];
    $featureKin = $row['featureKin'];
    $feature1 = $row['feature1'];
    $feature1Fre = $row['feature1Fre'];
    $feature1Kin = $row['feature1Kin'];
    $feature2 = $row['feature2'];
    $feature2Fre = $row['feature2Fre'];
    $feature2Kin = $row['feature2Kin'];
    $feature3 = $row['feature3'];
    $feature3Fre = $row['feature3Fre'];
    $feature3Kin = $row['feature3Kin'];
    $feature4 = $row['feature4'];
    $feature4Fre = $row['feature4Fre'];
    $feature4Kin = $row['feature4Kin'];
    $feature5 = $row['feature5'];
    $feature5Fre = $row['feature5Fre'];
    $feature5Kin = $row['feature5Kin'];
    $image = $row['image'];

  endforeach;
  $product = $this->db->get_where('programmes', array('id' => $subCategory))->result_array();
  foreach($product as $row):
    $subCategory = $row['name'];
  endforeach;
?>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;" style="height: 80vh; overflow: scroll;">
    <div class="row" style="height: 80vh; overflow: scroll;">
        <strong>
            <span class="page-title">Edit programme menu: <?php echo $name;?></span>
        </strong>
        <hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/menus1/update"
            enctype="multipart/form-data">
            <div class="white-box">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" class="form-control p-0 border-0" name="id" value="<?php echo $id; ?>" autofocus
                    placeholder="" label="Name"><br>
                    <br><span style="font-style: italic; color: grey;">Name (English)</span>
                <input type="text" class="form-control p-0 border-0" name="name" value="<?php echo $name; ?>" autofocus
                    placeholder="Item name (English)" label="Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <br><span style="font-style: italic; color: grey;">Name (French)</span>
                <input type="text" class="form-control p-0 border-0" name="nameFre" value="<?php echo $nameFre; ?>" autofocus
                    placeholder="Item name (French)" label="Name (French)">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <br><span style="font-style: italic; color: grey;">Name (Kinyarwanda)</span>
                <input type="text" class="form-control p-0 border-0" name="nameKin" value="<?php echo $nameKin; ?>" autofocus
                    placeholder="Item name (Kinyarwanda)" label="Name (Kinyarwanda)">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <br><span style="font-style: italic; color: grey;">Stock Remaining</span>
                <input type="number" class="form-control p-0 border-0" name="remain" value="<?php echo $remain; ?>" autofocus
                    placeholder="Remaining stock" label="Description">
            </div>
            </div><br>
            <h3 class="page-title aog-title">Description</h3>
            <textarea name="descriptionEng"><?php echo $description; ?></textarea>
            <br>
            <h3 class="page-title aog-title">Description (French)</h3>
            <textarea name="descriptionFre"><?php echo $descriptionFre; ?></textarea>
            <br>
            <h3 class="page-title aog-title">Description (Kinyarwanda)</h3>
            <textarea name="descriptionKin"><?php echo $descriptionKin; ?></textarea>
            <br>
            <!-- </div> -->
            <div class="row white-box">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h3 class="page-title aog-title">Price</h3>
                <input type="text" class="form-control p-0 border-0" name="price" value="<?php echo $price; ?>" autofocus
                    placeholder="<?php echo $price; ?>" label="Description">
            </div>
            
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h3 class="page-title aog-title">Programme Category Name</h3>
                <select required class="form-control p-0 border-0" name="subCategory">
                    <?php
                $categories = $this->db->get_where('services')->result_array();
                foreach($categories as $category):
                ?>
                    <option value="<?php echo $category['id']; if($subCategory == $category['name']){echo 'selected';}?>"><?php echo $category['name'];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="background-color: white; padding: 40px 20px;">
                <div class="page-title" style="font-size: 1.2em; margin-bottom: 20px; padding-bottom: 10px; border-bottom: solid 1px">Features (English)</div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Payment Duration</span>
                <input type="text" class="form-control p-0 border-0" name="paymentDuration" value="<?php echo $paymentDuration; ?>" autofocus
                    placeholder="<?php echo $paymentDuration; ?>" label="Description">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 1</span>
                    <input type="text" class="form-control p-0 border-0" name="feature" value="<?php if($feature!=""){echo $feature;}?>" autofocus
                        placeholder="<?php if($feature!=""){echo $feature;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 2</span>
                    <input type="text" class="form-control p-0 border-0" name="feature1" value="<?php if($feature1!=""){echo $feature1;}?>" autofocus
                        placeholder="<?php if($feature1!=""){echo $feature1;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 3</span>
                    <input type="text" class="form-control p-0 border-0" name="feature2" value="<?php if($feature2!=""){echo $feature2;}?>" autofocus
                        placeholder="<?php if($feature2!=""){echo $feature2;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 4</span>
                    <input type="text" class="form-control p-0 border-0" name="feature3" value="<?php if($feature3!=""){echo $feature3;} ?>" autofocus
                        placeholder="<?php if($feature3!=""){echo $feature3;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 5</span>
                    <input type="text" class="form-control p-0 border-0" name="feature4" value="<?php if($feature4!=""){echo $feature4;} ?>" autofocus
                        placeholder="<?php if($feature4!=""){echo $feature4;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 6</span>
                    <input type="text" class="form-control p-0 border-0" name="feature5" value="<?php if($feature5!=""){echo $feature5;} ?>" autofocus
                        placeholder="<?php if($feature5!=""){echo $feature5;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="background-color: rgb(255,255,255,.68); padding: 40px 20px;">
                <div class="page-title" style="font-size: 1.2em; margin-bottom: 20px; padding-bottom: 10px; border-bottom: solid 1px">Features (French)</div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Payment Duration (French)</span>
                <input type="text" class="form-control p-0 border-0" name="paymentDurationFre" value="<?php echo $paymentDurationFre; ?>" autofocus
                    placeholder="<?php echo $paymentDurationFre; ?>" label="Description (French)">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 1 (French)</span>
                    <input type="text" class="form-control p-0 border-0" name="featureFre" value="<?php if($featureFre!=""){echo $featureFre;} ?>" autofocus
                        placeholder="<?php if($featureFre!=""){echo $featureFre;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 2 (French)</span>
                    <input type="text" class="form-control p-0 border-0" name="feature1Fre" value="<?php if($feature1Fre!=""){echo $feature1Fre;} ?>" autofocus
                        placeholder="<?php if($feature1Fre!=""){echo $feature1Fre;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 3</span>
                    <input type="text" class="form-control p-0 border-0" name="feature2" value="<?php if($feature2!=""){echo $feature2;} ?>" autofocus
                        placeholder="<?php if($feature2!=""){echo $feature2;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 4 (French)</span>
                    <input type="text" class="form-control p-0 border-0" name="feature3Fre" value="<?php if($feature3Fre!=""){echo $feature3Fre;} ?>" autofocus
                        placeholder="<?php if($feature3Fre!=""){echo $feature3Fre;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 5 (French)</span>
                    <input type="text" class="form-control p-0 border-0" name="feature4Fre" value="<?php if($feature4Fre!=""){echo $feature4Fre;} ?>" autofocus
                        placeholder="<?php if($feature4Fre!=""){echo $feature4Fre;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 6 (French)</span>
                    <input type="text" class="form-control p-0 border-0" name="feature5Fre" value="<?php if($feature5Fre!=""){echo $feature5Fre;} ?>" autofocus
                        placeholder="<?php if($feature5Fre!=""){echo $feature5Fre;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="background-color: white; padding: 40px 20px;">  
                <div class="page-title" style="font-size: 1.2em; margin-bottom: 20px; padding-bottom: 10px; border-bottom: solid 1px">Features (Kinyarwanda)</div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Payment Duration (Kinyarwanda)</span>
                <input type="text" class="form-control p-0 border-0" name="paymentDurationKin" value="<?php echo $paymentDurationKin; ?>" autofocus
                    placeholder="<?php echo $paymentDurationKin; ?>" label="Description (Kinyarwanda)">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 1 (Kinyarwanda)</span>
                    <input type="text" class="form-control p-0 border-0" name="featureKin" value="<?php if($featureFre!=""){echo $featureFre;} ?>" autofocus
                        placeholder="<?php if($featureKin!=""){echo $featureKin;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 2 (Kinyarwanda)</span>
                    <input type="text" class="form-control p-0 border-0" name="feature1Kin" value="<?php if($feature1Kin!=""){echo $feature1Kin;} ?>" autofocus
                        placeholder="<?php if($feature1Kin!=""){echo $feature1Kin;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                
            
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 3 (Kinyarwanda)</span>
                    <input type="text" class="form-control p-0 border-0" name="feature2Kin" value="<?php if($feature2Kin!=""){echo $feature2Kin;} ?>" autofocus
                        placeholder="<?php if($feature2Kin!=""){echo $feature2Kin;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 4 (Kinyarwanda)</span>
                    <input type="text" class="form-control p-0 border-0" name="feature3Kin" value="<?php if($feature3Kin!=""){echo $feature3Kin;} ?>" autofocus
                        placeholder="<?php if($feature3Kin!=""){echo $feature3Kin;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 5 (Kinyarwanda)</span>
                    <input type="text" class="form-control p-0 border-0" name="feature4Kin" value="<?php if($feature4Kin!=""){echo $feature4Kin;} ?>" autofocus
                        placeholder="<?php if($feature4Kin!=""){echo $feature4Kin;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><span style="font-style: italic; color: grey;">Feature 6 (Kinyarwanda)</span>
                    <input type="text" class="form-control p-0 border-0" name="feature5Kin" value="<?php if($feature5Kin!=""){echo $feature5Kin;} ?>" autofocus
                        placeholder="<?php if($feature5Kin!=""){echo $feature5Kin;} else{ echo "Empty Field.";} ?>"
                        label="Description">
                </div>
                </div>
            </div>
            <br>
            <div class="white-box">
            <h3 class="box-title aog-title" style="color: black;">Current Image</h3>
            <div class="col-md-3">
                <img src="<?php echo $this->Crud_model->get_menu_image_url($image);?>" width="100%">
            </div>
            <br>
            <h3 class="box-title aog-title" style="color: black;">Update Image</h3>
            <input type="file" name="image" placeholder="image" placeholder="Image">
            </div>
            <br>

            <center><button class="btn btn-primary aog-btn">Proceed to Update Menu</button></center>
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
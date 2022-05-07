<!DOCTYPE html>
<html>
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>

<div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Edit Category</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="#"><?php echo get_phrase('Dashboard');?></a></li>
            <li><a href="#">Categories</a></li>
            <li class="active">Edit Category</li>
          </ol>
        </div>
</div>
<?php 
$category = $this->db->get_where('category', array('id' => $id))->result_array();
foreach ($category as $row):
?>

<div class="tab-content tab-pane box">
                <div class="box-content">
      <div class="white-box col-md-12">
        <div class="col-md-3">
          <img src="<?php echo $this->Crud_model->get_category_image_url($row['id']);?>" width="100%">
        </div>
        <div class="col-md-9">
          <?php echo form_open(base_url() . 'admin/categories/update_profile/'.$row['id'], array('class' => 'form-horizontal form-groups-bordered validate ajax-submit', 'enctype' => 'multipart/form-data'));?>

          <div class="form-group">
            <label class="col-sm-3 control-label">Image</label>
            <div class="col-sm-9">
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-image"></i></div>
              <input type="file" class="form-control" accept="image/*" name="image">
            </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
              <button type="submit" class="btn btn-info"><?php echo get_phrase('Update');?></button>
              <span id="preloader-form"></span>
            </div>
            </div>
             <?php echo form_close();?>

        </div>
      </div>
                  <?php echo form_open(base_url() . 'admin/categories/update/'.$row['id'], array('class' => 'form-horizontal form-groups-bordered validate ajax-submit', 'enctype' => 'multipart/form-data'));?>

        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title m-b-0">Create New Category</h3>
            <br><br>
        <div class="padded">
         
             <div class="form-group">
                    <label class="col-sm-3 control-label">Category Name (Eng)</label>
                    <div class="col-sm-9">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                      <input type="text" class="form-control" required="" name="english" placeholder="English" value="<?php echo $row['english'];?>">
                    </div>
                    </div>
                  </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Description (ENG)</label>
                <div class="col-sm-9">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                  <textarea name="description_eng" placeholder="Description" required=""><?php echo $row['description_eng'];?></textarea>
                </div>
                </div>
              </div>
              <div class="form-group">
                    <label class="col-sm-3 control-label">Caption (ENG)</label>
                    <div class="col-sm-9">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                      <input type="text" class="form-control" required="" name="caption_eng" placeholder="Caption (English)" value="<?php echo $row['caption_eng'];?>">
                    </div>
                    </div>
                  </div>
              <div class="form-group">
                    <label class="col-sm-3 control-label">Category Name (KIN)</label>
                    <div class="col-sm-9">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                      <input type="text" class="form-control" required="" name="kinyarwanda" placeholder="Kinyarwanda" value="<?php echo $row['kinyarwanda'];?>">
                    </div>
                    </div>
                  </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Description (KIN)</label>
                <div class="col-sm-9">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                  <textarea name="description_kin" placeholder="Description" required=""><?php echo $row['description_kin'];?></textarea>
                </div>
                </div>
              </div>

              <div class="form-group">
                    <label class="col-sm-3 control-label">Caption (KIN)</label>
                    <div class="col-sm-9">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                      <input type="text" class="form-control" required="" name="caption_kin" placeholder="Caption (Kinyarwanda)" value="<?php echo $row['caption_kin'];?>">
                    </div>
                    </div>
                  </div>

            <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
              <button type="submit" class="btn btn-info"><?php echo get_phrase('Add');?></button>
              <span id="preloader-form"></span>
            </div>
            </div>
             <?php echo form_close();?>
                    </form>                
                </div>                
      </div>
       </div>                
      </div>
  <?php endforeach;?>
</div>
</div>

</body>
</html>


<script>
        $(document).ready(function () {
            $('.textarea_editor').wysihtml5();
        });
</script>

<script>
  CKEDITOR.replace( 'description_eng' );
</script>
<script>
  CKEDITOR.replace( 'description_kin' );
</script>


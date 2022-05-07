<!DOCTYPE html>
<html>
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>

<div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Edit News</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="#"><?php echo get_phrase('Dashboard');?></a></li>
            <li><a href="#">News</a></li>
            <li class="active">New</li>
          </ol>
        </div>
</div>
<?php 
$post = $this->db->get_where('news', array('id' => $post_id))->result_array();
foreach ($post as $row):
?>

<div class="tab-content">
  <div class="white-box col-md-12">
        <div class="col-md-3">
          <img src="<?php echo $this->Crud_model->get_news_image_url($row['image']);?>" width="100%">
          
        </div>
        <div class="col-md-9">
          <?php echo form_open(base_url() . 'admin/news/update_profile/'.$row['image'], array('class' => 'form-horizontal form-groups-bordered validate ajax-submit', 'enctype' => 'multipart/form-data'));?>

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

    <div class="tab-pane box active" id="list">
      <form method="POST" action="<?php echo base_url().'Admin/news/update/'.$post_id;?>">
          <div class="white-box">
              <h3 class="box-title" style="color: black;">English News</h3>
              <!-- <textarea name="vision" class="textarea_editor form-control" id="text" required=""></textarea>  -->
              <input type="text" name="title_eng" style="width: 100%; background-color: #eef1f5; margin-bottom: 20px; height: 35px; border: solid .5px grey; padding-left: 20px" placeholder="Title (English)" required="" value="<?php echo $row['title_eng'];?>">
              <textarea name="post_eng" required="true"><?php echo $row['project_eng'];?></textarea>
          </div>
          <div class="white-box">
              <h3 class="box-title" style="color: black;">French News</h3>
              <!-- <textarea name="vision" class="textarea_editor form-control" id="text" required=""></textarea>  -->
              <input type="text" name="title_fre" style="width: 100%; background-color: #eef1f5; margin-bottom: 20px; height: 35px; border: solid .5px grey; padding-left: 20px" placeholder="Title (French)" required="" value="<?php echo $row['title_fre'];?>">
              <textarea name="post_fre" required="true"><?php echo $row['project_fre'];?></textarea>
          </div>
          <div class="white-box">
            <h3 class="box-title" style="color: black;">Kinyarwanda News</h3>
              <input type="text" name="title_kin" style="width: 100%; background-color: #eef1f5; margin-bottom: 20px; height: 35px; border: solid .5px grey; padding-left: 20px" placeholder="Title (Kinyarwanda)" required=""  value="<?php echo $row['title_kin'];?>">
              <textarea name="post_kin"><?php echo $row['project_kin'];?></textarea>
          </div>
          
          <div class="white-box">
              <h3 class="box-title" style="color: black;">Status</h3>
              <select name="status" style="width: 100%; background-color: #eef1f5; margin-bottom: 20px; height: 35px; border: solid .5px grey; padding-left: 20px">
                <option value="0"  <?php if($row['status']=='0'){echo "Selected";}?>>Pending</option>
                <option value="1" <?php if($row['status']=='1'){echo "Selected";}?>>Approved</option>
                <option value="2" <?php if($row['status']=='2'){echo "Selected";}?>>Rejected</option>
            </select>
          </div>
          <div class="form-group" style="text-align: center; padding-bottom: 20px;">
              <div class="col-sm-offset-3 col-sm-5">
                  <button type="submit" class="btn btn-info"><?php echo get_phrase('Update');?></button>
              </div>
          </div>
        </form>
    </div>
  <?php endforeach;?>
</div>

</body>
</html>


<script>
        $(document).ready(function () {
            $('.textarea_editor').wysihtml5();
        });
</script>

<script>
  CKEDITOR.replace( 'post_eng' );
</script>
<script>
  CKEDITOR.replace( 'post_kin' );
</script>


<!DOCTYPE html>
<html>
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>

<div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Edit Post</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="#"><?php echo get_phrase('Dashboard');?></a></li>
            <li><a href="#">Posts</a></li>
            <li class="active">New</li>
          </ol>
        </div>
</div>
<?php 
$post = $this->db->get_where('posts', array('id' => $post_id))->result_array();
foreach ($post as $row):
?>

<div class="tab-content">
    <div class="tab-pane box active" id="list">
      <form method="POST" action="<?php echo base_url().'editor/post/update/'.$post_id;?>">
          <div class="white-box">
              <h3 class="box-title" style="color: black;">English Post</h3>
              <!-- <textarea name="vision" class="textarea_editor form-control" id="text" required=""></textarea>  -->
              <input type="text" name="title_eng" style="width: 100%; background-color: #eef1f5; margin-bottom: 20px; height: 35px; border: solid .5px grey; padding-left: 20px" placeholder="Title (English)" required="" value="<?php echo $row['title_eng'];?>">
              <textarea name="post_eng" required="true"><?php echo $row['post_eng'];?></textarea>
          </div>
          <div class="white-box">
            <h3 class="box-title" style="color: black;">Kinyarwanda Post</h3>
              <input type="text" name="title_kin" style="width: 100%; background-color: #eef1f5; margin-bottom: 20px; height: 35px; border: solid .5px grey; padding-left: 20px" placeholder="Title (Kinyarwanda)" required=""  value="<?php echo $row['title_kin'];?>">
              <textarea name="post_kin"><?php echo $row['post_kin'];?></textarea>
          </div>
          <div class="white-box">
              <h3 class="box-title" style="color: black;">Category</h3>
              <select name="category" style="width: 100%; background-color: #eef1f5; margin-bottom: 20px; height: 35px; border: solid .5px grey; padding-left: 20px">
                <?php $categories = $this->db->get('category')->result_array();
                foreach ($categories as $row2):
                ?>
                <option value="<?php echo $row2['id'];?>" <?php if($row['category'] == $row2['id']){echo "selected";} ?>><?php echo $row2['english'];?></option>
              <?php endforeach;?>
            </select>
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


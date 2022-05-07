<!DOCTYPE html>
<html>
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>

<div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Reply Inquiry</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="#"><?php echo get_phrase('Dashboard');?></a></li>
            <li><a href="#">Inquiries</a></li>
            <li class="active">Reply Inquiry</li>
          </ol>
        </div>
</div>
<?php 
$inquiries = $this->db->get_where('inquiry', array('id' => $id))->result_array();
foreach ($inquiries as $row):
?>

<div class="tab-content">
    <div class="tab-pane box active" id="list">
      <form method="POST" action="<?php echo base_url().'editor/inquiries/reply/'.$id;?>">
          <div class="white-box">
              <h3 class="box-title" style="color: black;">Inquiry</h3>
              <textarea name="message" readonly=""><?php echo $row['message'];?></textarea>
          </div>
          <div class="white-box">
            <h3 class="box-title" style="color: black;">Reply</h3>
              <textarea name="reply"><?php echo $row['reply'];?></textarea>
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
  CKEDITOR.replace( 'message' );
</script>
<script>
  CKEDITOR.replace( 'reply' );
</script>


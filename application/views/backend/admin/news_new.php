<!DOCTYPE html>
<html>

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>

<body>

    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Add New News</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#"><?php echo get_phrase('Dashboard');?></a></li>
                <li><a href="#">News</a></li>
                <li class="active">New</li>
            </ol>
        </div>
    </div>

    <div class="tab-content">
        <div class="tab-pane box active" id="list">
            <form method="POST" action="<?php echo base_url();?>Admin/news/create/" enctype="multipart/form-data">
                <div class="white-box">
                    <h3 class="box-title" style="color: black;">Image</h3>
                    <!-- <textarea name="vision" class="textarea_editor form-control" id="text" required=""></textarea>  -->
                    <input type="file" name="image"
                        style="width: 100%; background-color: #eef1f5; margin-bottom: 20px; height: 35px; border: solid .5px grey; padding-left: 20px;"
                        accept="image/*" required="">
                </div>
                <div class="white-box">
                    <h3 class="box-title" style="color: black;">English News</h3>
                    <!-- <textarea name="vision" class="textarea_editor form-control" id="text" required=""></textarea>  -->
                    <input type="text" name="title_eng"
                        style="width: 100%; background-color: #eef1f5; margin-bottom: 20px; height: 35px; border: solid .5px grey; padding-left: 20px"
                        placeholder="Title (English)" required="">
                    <textarea name="post_eng" required="true"></textarea>
                </div>

                <div class="white-box">
                    <h3 class="box-title" style="color: black;">French News</h3>
                    <!-- <textarea name="vision" class="textarea_editor form-control" id="text" required=""></textarea>  -->
                    <input type="text" name="title_fre"
                        style="width: 100%; background-color: #eef1f5; margin-bottom: 20px; height: 35px; border: solid .5px grey; padding-left: 20px"
                        placeholder="Title (French)" required="">
                    <textarea name="post_fre" required="true"></textarea>
                </div>

                <div class="white-box">
                    <input type="text" name="title_kin"
                        style="width: 100%; background-color: #eef1f5; margin-bottom: 20px; height: 35px; border: solid .5px grey; padding-left: 20px"
                        placeholder="Title (Kinyarwanda)" required="">
                    <h3 class="box-title" style="color: black;">Kinyarwanda News</h3>
                    <textarea name="post_kin"></textarea>
                </div>

                <div class="form-group" style="text-align: center; padding-bottom: 20px;">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('Add');?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>


<script>
$(document).ready(function() {
    $('.textarea_editor').wysihtml5();
});
</script>

<script>
CKEDITOR.replace('post_eng');
</script>
<script>
CKEDITOR.replace('post_kin');
</script>
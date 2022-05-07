<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div class="row">
    <div class="white-box">
        <span class="page-title">Add Notification</span>
        <hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/popup"
            enctype="multipart/form-data">
                <div>
                    <h3 class="page-title aog-title" style="color: black;">Pop Up</h3>
                    <textarea name="popup"></textarea>
                </div>
                <br>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h3 class="page-title aog-title" style="color: black;">Date From</h3>
                    <input name="date_from" type="date">
                </div>
                <br>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h3 class="page-title aog-title" style="color: black;">Date To</h3>
                    <input name="date_to" type="date">
                </div>

                <center><button class="btn btn-primary">Proceed</button></center>
        </form>

    </div>
</div>

<script>
CKEDITOR.replace('popup');
</script>
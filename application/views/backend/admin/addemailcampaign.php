<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;">
    <div class="row white-box" style="height: 80vh; overflow: scroll;">
    <span class="page-title">Add Email Campaign</span><hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/addEmail" enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Name </h3>
                <input type="text" class="form-control p-0 border-0" name="subject" required="" value="" autofocus placeholder="Subject" label="Subject">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Message</h3>
            <textarea name="message"></textarea> 
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Recipients</h3>
                <select class="form-control p-0 border-0" name="recipients" required="" value="" autofocus placeholder="Recipients" label="Recipient">
                    <option value="" disabled selected>Select recipients list</option>
                    <option value="subscriber">Subscribers</option>
                    <option value="user">Users</option>
                </select>
            </div>
            <center><button class="btn btn-primary aog-btn">Send Email Campaign</button></center>
        </form>

    </div>
</div>
<br>
<script>
CKEDITOR.replace('message');
</script>
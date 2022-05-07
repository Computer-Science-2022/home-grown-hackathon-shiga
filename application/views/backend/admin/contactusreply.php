<?php
  $product = $this->db->get_where('contactus', array('id' => $project_id))->result_array();
  foreach($product as $row):
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $subject = $row['subject'];
    $message = $row['message'];
  endforeach;
?>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;">
    <div class="row">
        <strong>
            <h3><span style="color: #59A8DD;">Contact Us Information</span></h3>
        </strong>
        <hr>
        <form class="form-horizontal form-material" enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" class="form-control p-0 border-0" name="id" value="<?php echo $id; ?>" autofocus
                    placeholder="" label="Name">
                <h3 class="box-title">Name</h3>
                <input type="text" class="form-control p-0 border-0" name="name" value="<?php echo $name; ?>" readonly
                    autofocus placeholder="<?php echo $name; ?>" label="Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title">Email</h3>
                <input type="text" class="form-control p-0 border-0" name="nameFre" required="" readonly
                    value="<?php echo $email; ?>" autofocus placeholder="<?php echo $email; ?>" label="Email">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title">Message</h3>
                <textarea name="message"><?php echo $message; ?></textarea>
                <!-- <input type="text" class="form-control p-0 border-0" name="description" required="" readonly
                    value="<?php echo $message; ?>" autofocus placeholder="<?php echo $message; ?>" label="Description"> -->
            </div>
        </form>
        <br>
        <br>
        <hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/replymessage"
            enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" class="form-control p-0 border-0" name="id" value="<?php echo $id; ?>" autofocus
                    placeholder="" label="Name">
                <input type="hidden" class="form-control p-0 border-0" name="name" value="<?php echo $name; ?>" readonly
                    autofocus placeholder="<?php echo $name; ?>" label="Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" class="form-control p-0 border-0" name="email" required="" readonly
                    value="<?php echo $email; ?>" autofocus placeholder="<?php echo $email; ?>" label="Email">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" class="form-control p-0 border-0" name="message" required="" readonly
                    value="<?php echo $message; ?>" autofocus placeholder="<?php echo $message; ?>" label="Description">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title">Reply</h3>
                <textarea name="reply"></textarea>
                <!-- <input type="textarea" class="form-control p-0 border-0" name="reply" required="" value="" autofocus
                    placeholder="Reply" label="Reply"> -->
            </div>
            <br>
            <center><button class="btn btn-primary">Send Reply</button></center>
        </form>

    </div>
</div>
<br>
<script>
CKEDITOR.replace('message');
</script>

<script>
CKEDITOR.replace('reply');
</script>
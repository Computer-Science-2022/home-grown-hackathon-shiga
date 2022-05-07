<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;" class="white-box">
    <div class="row">
    <span class="page-title">Create SMS Campaign</span><hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/addSMS" enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Subject </h3>
                <input type="text" class="form-control p-0 border-0" name="subject" required="" value="" autofocus placeholder="Subject" label="Subject">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title">Message</h3>
                <textarea onkeyup="countChars(this);" name="message" style="width: 100%; height: 120px; padding: 20px; font-size: 1.2em; color: <?php echo $color_pri;?>;" required></textarea>  
                <p id="charNum">0 characters</p>          
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Recipients (phone with country code)</h3>
                <textarea name="recipients" required="" value="" autofocus placeholder="Separate recipients with comma (,)" label="Recipient" style="width: 100%; height: 120px; padding: 20px; font-size: 1.2em; color: <?php echo $color_pri;?>;"></textarea>
            </div>
            <center><button class="btn btn-primary aog-btn">Send Bulk SMS</button></center>
        </form>

    </div>
</div>
<br>
<script>
// CKEDITOR.replace('recipients');
</script>


<script>
    function countChars(obj){
    document.getElementById("charNum").innerHTML = obj.value.length+' characters';
}
</script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    
                </div>
                <div class="row">
                    <div class="white-box">
                        <h3 style="font-size: 1.5em;">Upload Project Image</h3>
                        <hr>
                        <form id="upload_form" enctype="multipart/form-data" method="post">
                        <div class="row">
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                              <h3 style="font-size: 1.5em;">Image</h3>
                              <input type="file" name="file1" id="file1" class="custom-file-input">
                          </div>
                          
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="text-align: right;">
                              <br>
                              <input type="button" value="Upload Files" onclick="uploadFile()" class="btn btn-info">
                          </div><br><br><br>
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
                              <p id="status" style="font-weight: bold;"></p>
                              <p id="loaded_n_total"></p>
                          </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            
        </div>



<script>
/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
function _(el){
    return document.getElementById(el);
}
function uploadFile(){
    var file = _("file1").files[0];
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    formdata.append("file1", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "<?php echo base_url().'admin/upload_movie_files';?>");
    ajax.send(formdata);
    ajax.open('')
}
function progressHandler(event){
    _("loaded_n_total").innerHTML = "Uploaded "+Math.round(event.loaded/1048576)+" of "+Math.round(event.total/1048576)+" Mbs";
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
    _("status").innerHTML = event.target.responseText;
    _("progressBar").value = 0;
}
function errorHandler(event){
    _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
    _("status").innerHTML = "Upload Aborted";
}
</script>

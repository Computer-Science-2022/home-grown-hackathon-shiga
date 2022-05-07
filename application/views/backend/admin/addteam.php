<head>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"
        integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"
        integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

</head>
<style>
.preview {
    overflow: hidden;
    width: 200px;
    height: 200px;
    margin: 10px;
    border: 1px solid red;
}

.modal-lg {
    max-width: 50% !important;
}

.ui-w-80 {
    width: 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24, 28, 33, 0.1);
    background: rgba(0, 0, 0, 0);
    color: #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #26B4FF;
    background: transparent;
    color: #26B4FF;
}

.btn {
    cursor: pointer;
}

.text-light {
    color: #babbbc !important;
}

.btn-facebook {
    border-color: rgba(0, 0, 0, 0);
    background: #3B5998;
    color: #fff;
}

.btn-instagram {
    border-color: rgba(0, 0, 0, 0);
    background: #000;
    color: #fff;
}

.card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
}

.account-settings-links .list-group-item.active {
    font-weight: bold !important;
}

html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
}

.account-settings-multiselect~.select2-container {
    width: 100% !important;
}

.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}

.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}

.material-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}

.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}

.dark-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
}

.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}

.light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
}

.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.aog-title{
    font-size: 1.4em;
}
</style>


<div class="row" id="image-modal-popup">
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>

                                <br> <br> <br>

                                <button style="margin-left: 10%;" type="button" class="btn btn-secondary"
                                    data-dismiss="modal" id="close_modal">Cancel</button>
                                <button style="margin-left: 10%;" type="button" class="btn btn-success" id="crop"> Crop
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>


    <div class="row">
        <div style="margin-left: 2%; margin-right: 2%;">
            <strong>
                <span class="page-title">Add Team Member</span>
            </strong>
           
            <form class="form-horizontal form-material" method="POST"
                action="<?php echo base_url();?>admin/teamEngine/create" enctype="multipart/form-data">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="white-box">
                    <!-- <h3 class="box-title aog-title">English Name</h3> -->
                    <input type="text" class="form-control p-0 border-0" name="name" required="" value="" autofocus
                        placeholder="Name" label="Name"><br>
                    <!-- <h3 class="box-title aog-title" style="color: black;">Position</h3> -->
                    <input type="text" class="form-control p-0 border-0" name="job" required="" value="" autofocus
                        placeholder="Position" label="Job">
                        <br>

                    <!-- <h3 class="box-title aog-title" style="color: black;">Phone Number</h3> -->
                    <input type="text" class="form-control p-0 border-0" name="phone" required="" value="" autofocus
                        placeholder="Phone Number" label="Phone">
                        <br>

                    <!-- <h3 class="box-title" style="color: black;">Email</h3> -->
                    <input type="text" class="form-control p-0 border-0" name="email" required="" value="" autofocus
                        placeholder="Email" label="Email">
                        <br>
                    <div class="" id="hidden-upload">
                        <h3 class="box-title" style="color: black;">Image</h3>
                        <input type="file" class="form-control image" name="image" id="uploadFile" />
                    </div>
                    </div>
                    

                    <br>
                    <h3 class="box-title aog-title" style="color: black;">Bio (English)</h3>
                    <textarea name="descriptionEng"></textarea>
                    <br>
                    <h3 class="box-title aog-title" style="color: black;">Bio (Kinyarwanda)</h3>
                    <textarea name="descriptionKin"></textarea>
                    <br>

                    <br>
                    <center><button class="btn btn-primary aog-btn">Add Team Member</button></center>
            </form>

        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/cropper/cropper.min.js"></script>


    <script>
    CKEDITOR.replace('descriptionKin');
    </script>

    <script>
    CKEDITOR.replace('descriptionFre');
    </script>

    <script>
    CKEDITOR.replace('descriptionEng');
    </script>

    <script>
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;

    $("body").on("change", ".image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 10,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function() {
        canvas = cropper.getCroppedCanvas({
            width: 500,
            height: 500,
        });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;

                $modal.modal('hide');

                document.getElementById("uploadFile").value = base64data;

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "uploadProfilePic",
                    data: {
                        image: base64data
                    },
                    success: function(data) {
                        $modal.modal('hide');
                        alert("Image uploaded successfully");
                        loadNextPage();

                    }
                });
            }
        });
    })
    </script>

<br>
<div class="row">
    <div class="white-box">
    <span class="page-title">Add Carousel</span><hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/carousels/create" enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">English Name</h3>
                <input type="text" class="form-control p-0 border-0" name="name" required="" value="" autofocus placeholder="Name" label="Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">French Name</h3>
                <input type="text" class="form-control p-0 border-0" name="freName" required="" value="" autofocus placeholder="French Translation of Name" label="French Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Kinyarwanda Name</h3>
                <input type="text" class="form-control p-0 border-0" name="kinName" required="" value="" autofocus placeholder="Kinyarwanda Translation of Name" label="Kinyarwanda Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title"> English Tagline</h3>
                <input type="text" class="form-control p-0 border-0" name="description" required="" value="" autofocus placeholder="Description" label="Description">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title"> French Tagline</h3>
                <input type="text" class="form-control p-0 border-0" name="freDescription" required="" value="" autofocus placeholder="French Translation of Description" label="French Description">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title"> Kinyarwanda Tagline</h3>
                <input type="text" class="form-control p-0 border-0" name="kinDescription" required="" value="" autofocus placeholder="Kinyarwanda Translation of Description" label="Kinyarwanda Description">
            </div>
            <br>
            <h3 class="box-title"> Select Where Carousel Should Lead To </h3>
            <select required class="form-control p-0 border-0" name="link">
                <option value="user/about_us" selected>Select Where Carousel Should Lead To</option>
                <option value="user/our_services">Programmes Page</option>
                <option value="user/about_us">About Us</option>
                <option value="user/team">Our Team</option>
                <option value="user/e_learning">E-Learning</option>
                <option value="user/contactus">Contact Us</option>
                <option value="otherlink">Add Link</option>
                </select>
            <br>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title"> Add Link Here (if "Add Link" option selected above).</h3>
                <input type="text" class="form-control p-0 border-0" name="linkadd"
                    value="" autofocus placeholder="Add link here">
            </div>
            <br>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="file" name="image" required="" placeholder="image" placeholder="Image">
            </div>

            <center><button class="btn btn-primary">Proceed to Upload Carousel</button></center>
        </form>

    </div>
</div>
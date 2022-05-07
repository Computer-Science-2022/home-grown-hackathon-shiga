<?php
  $product = $this->db->get_where('carousel', array('id' => $project_id))->result_array();
  foreach($product as $row):
    $id = $row['id'];
    $name = $row['name'];
    $freName = $row['freName'];
    $kinName = $row['kinName'];
    $description = $row['description'];
    $freDescription = $row['freDescription'];
    $kinDescription = $row['kinDescription'];
    $link = $row['link'];
    $linkadd = $row['linkadd'];
    $image = $row['image'];
  endforeach;
?>

<div class="row">
    <div class="white-box">
        <strong>
            <h3><span style="color: #59A8DD;">Edit Carousel</span></h3>
        </strong>
        <hr>
        <form class="form-horizontal form-material" method="POST"
            action="<?php echo base_url();?>admin/carousels/update" enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" class="form-control p-0 border-0" name="id" value="<?php echo $id; ?>" autofocus
                    placeholder="" label="Name">
                <h3 class="box-title">English Name</h3>
                <input type="text" class="form-control p-0 border-0" name="name" value="<?php echo $name; ?>" autofocus
                    placeholder="<?php echo $name; ?>" label="Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title">French Name</h3>
                <input type="text" class="form-control p-0 border-0" name="freName" value="<?php echo $freName; ?>"
                    autofocus placeholder="<?php echo $freName; ?>" label="French Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title">Kinyarwanda Name</h3>
                <input type="text" class="form-control p-0 border-0" name="kinName" value="<?php echo $kinName; ?>"
                    autofocus placeholder="<?php echo $kinName; ?>" label="Kinyarwanda Name">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title"> English Tagline</h3>
                <input type="text" class="form-control p-0 border-0" name="description"
                    value="<?php echo $description; ?>" autofocus placeholder="<?php echo $description; ?>"
                    label="Description">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title"> French Tagline</h3>
                <input type="text" class="form-control p-0 border-0" name="freDescription"
                    value="<?php echo $freDescription; ?>" autofocus placeholder="<?php echo $freDescription; ?>"
                    label="French Description">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title"> Kinyarwanda Tagline</h3>
                <input type="text" class="form-control p-0 border-0" name="kinDescription"
                    value="<?php echo $kinDescription; ?>" autofocus placeholder="<?php echo $kinDescription; ?>"
                    label="Kinyarwanda Description">
            </div>
            <br>
            <h3 class="box-title"> Select Where Carousel Should Lead To </h3>
            <select id="link" class="form-control p-0 border-0" name="link">
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
                    value="" autofocus placeholder="<?php echo $linkadd; ?>">
            </div>
            <br>
            <h3 class="box-title" style="color: black;">Current Image</h3>
            <div class="col-md-3">
                <img src="<?php echo $this->Crud_model->get_carousel_image_url($image);?>" width="100%">
            </div>
            <br>
            <h3 class="box-title" style="color: black;">Update Image</h3>
            <input type="file" name="image" placeholder="image" placeholder="Image">
            <br>
            <center><button class="btn btn-primary">Proceed to Update Carousel</button></center>
        </form>

    </div>
</div>

<script type="text/javascript">
$("#link").change(function() {
    if ($(this).val() == "otherlink") {
        $('#idNumberDiv').hide();
        $('#passport').removeAttr('required');
        $('#passport').removeAttr('data-error');

        // $('#idNumberDiv').show();
        // $('#idNumber').attr('required', '');
        // $('#idNumber').attr('data-error', 'This field is required.');

        $('#visaDiv').hide();
        $('#visa').removeAttr('required');
        $('#visa').removeAttr('data-error');

    } else if ($(this).val() == "Kenya" || $(this).val() == "Uganda" || $(this).val() == "Tanzania" || $(this)
        .val() == "Burundi" || $(this).val() == "South Sudan") {
        $('#idNumberDiv').hide();
        $('#idNumber').removeAttr('required');
        $('#idNumber').removeAttr('data-error');

        $('#passportDiv').show();
        $('#passport').attr('required', '');
        $('#passport').attr('data-error', 'This field is required.');

        $('#visaDiv').hide();
        $('#visa').removeAttr('required');
        $('#visa').removeAttr('data-error');

    } else {
        $('#idNumberDiv').hide();
        $('#idNumber').removeAttr('required');
        $('#idNumber').removeAttr('data-error');

        $('#passportDiv').show();
        $('#passport').attr('required', '');
        $('#passport').attr('data-error', 'This field is required.');

        $('#visaDiv').show();
        $('#visa').attr('required', '');
        $('#visa').attr('data-error', 'This field is required.');
    }
});
$("#country").trigger("change");

// $("#seeAnotherFieldGroup").change(function() {
//   if ($(this).val() == "yes") {
//     $('#otherFieldGroupDiv').show();
//     $('#otherField1').attr('required', '');
//     $('#otherField1').attr('data-error', 'This field is required.');
//     $('#otherField2').attr('required', '');
//     $('#otherField2').attr('data-error', 'This field is required.');
//   } else {
//     $('#otherFieldGroupDiv').hide();
//     $('#otherField1').removeAttr('required');
//     $('#otherField1').removeAttr('data-error');
//     $('#otherField2').removeAttr('required');
//     $('#otherField2').removeAttr('data-error');
//   }
// });
// $("#seeAnotherFieldGroup").trigger("change");
</script>




<!-- Validating the input field for number of persons -->
<script>
function validateForm() {
    var x = document.forms["form1"]["persons"].value;
    if (x < "<?php echo $this->db->get_where('package', array('id' => $id))->row()->people;?>") {
        alert(
            "The minimum number of persons for this package must be <?php echo $this->db->get_where('package', array('id' => $id))->row()->people;?> people");
        return false;
    }
}
</script>
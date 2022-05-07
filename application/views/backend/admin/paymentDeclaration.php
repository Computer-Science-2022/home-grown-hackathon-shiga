<?php
  $product = $this->db->get_where('sales', array('id' => $project_id))->result_array();
  foreach($product as $row):
    $amount_paid = $row['amount_paid'];
    $amount = $row['totalprice'];

  endforeach;
?>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<div style="margin-left: 2%; margin-right: 2%;">
    <div class="row">
        <strong>
            <h3><span style="color: #59A8DD;">Declare Payment</span></h3>
        </strong>
        <hr>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/updatePayment"
            enctype="multipart/form-data">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input type="hidden" class="form-control p-0 border-0" name="id" value="<?php echo $project_id; ?>"
                        autofocus placeholder="">
                    <input type="hidden" class="form-control p-0 border-0" name="amount"
                        value="<?php echo $amount_paid; ?>" autofocus placeholder="">
                    <h3 class="box-title" style="color: black;">Payment Amount</h3>
                    <input type="number" class="form-control p-0 border-0" name="amount_paid" value="" min="0"
                        max="<?php echo $amount; ?>" autofocus label="Amount Paid">
                        <br>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="box-title">Payment Method</h3>
                        <textarea name="payment_method"></textarea>
                    </div>
                </div>
                <center><button class="btn btn-primary">Submit</button></center>
        </form>

    </div>
</div>
<br>

<script>
CKEDITOR.replace('payment_method');
</script>

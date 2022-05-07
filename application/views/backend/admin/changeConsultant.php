<?php
  $product = $this->db->get_where('appointment', array('id' => $project_id))->result_array();
  foreach($product as $row):
    $id = $row['id'];
    $userId = $row['userId'];
    $appointmentDate = $row['appointmentdate'];
    $appointmentTime = $row['appointmenttime'];
    $phone = $row['phone'];
    $email = $row['email'];
    $reason = $row['reason'];
  endforeach;
?>

<div class="row">
    <div class="white-box">
        <strong>
            <h3><span style="color: #59A8DD;">Change Consultant</span></h3>
        </strong>
        <hr>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title" style="color: black;">Patient Name</h3>
            <input type="text" class="form-control p-0 border-0" readonly name="name" value="<?php $brandname = $this->db->get_where('patients', array('id' => $userId))->result_array();
    foreach($brandname as $rows):
        $brName = $rows['name'];
    endforeach; echo $brName; ?>" autofocus placeholder="<?php $brandname = $this->db->get_where('patients', array('id' => $userId))->result_array();
    foreach($brandname as $rows):
        $brName = $rows['name'];
    endforeach; echo $brName; ?>" label="Name">
            <h3 class="box-title" style="color: black;">Appointment Date</h3>
            <input type="text" class="form-control p-0 border-0" readonly name="name"
                value="<?php echo $appointmentDate; ?>" autofocus placeholder="<?php echo $appointmentDate; ?>"
                label="Name">
            <h3 class="box-title" style="color: black;">Appointment Time</h3>
            <input type="text" class="form-control p-0 border-0" readonly name="name"
                value="<?php echo $appointmentTime; ?>" autofocus placeholder="<?php echo $appointmentTime; ?>"
                label="Name">
            <h3 class="box-title" style="color: black;">Phone</h3>
            <input type="text" class="form-control p-0 border-0" readonly name="name" value="<?php echo $phone; ?>"
                autofocus placeholder="<?php echo $phone; ?>" label="Name">
            <h3 class="box-title" style="color: black;">Email</h3>
            <input type="text" class="form-control p-0 border-0" readonly name="name" value="<?php echo $email; ?>"
                autofocus placeholder="<?php echo $email; ?>" label="Name">
            <h3 class="box-title" style="color: black;">Reason For Appointment</h3>
            <textarea name="reason" id="" readonly cols="30" rows="10"
                class="form-control"><?php echo $reason; ?></textarea>

        </div>
        <br>
        <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/assignConsultant"
            enctype="multipart/form-data">
            <input type="hidden" class="form-control p-0 border-0" readonly name="id" value="<?php echo $id; ?>"
                autofocus placeholder="" label="Name">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title" style="color: black;">Select Consultant</h3>
                <select name="consultant" class="form-control p-0 border-0" id="car-brand">
                    <?php
                $categories = $this->db->get_where('consultant')->result_array();
                foreach($categories as $category):
                ?>
                    <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
<br>
            <center><button class="btn btn-primary">Proceed to Change Consultant</button></center>
        </form>

    </div>
</div>
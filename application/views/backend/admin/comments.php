<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Testimonial</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>admin/admin_dashboard"><?php echo get_phrase('Dashboard');?></a></li>
            <li><a class="active">Testimonials</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <ul class="nav nav-tabs bordered">
      <li class="active">
              <a href="#english" data-toggle="tab">
          English
                </a>
            </li>
    </ul>

<div class="tab-content">
    <div class="tab-pane box active" id="english">
          <div class="white-box">
            <div class="table-responsive">
            <table id="myTable" class="table table-striped">
              <thead>
                <tr>
                  <th style="text-align: center;">#</th>
          <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Email</th>
            <th style="text-align: center;">Message</th>
            <th style="text-align: center;">Date</th>
            <th style="text-align: center;">Approve</th>
            <th style="text-align: center;">Reject</th>
            <th style="text-align: center;">Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php  
    $this->db->order_by('id', 'DESC');
    $comments_eng = $this->db->get_where('testimonial')->result_array();
    $i=0;
    foreach($comments_eng as $row):
    $i++;
    ?>
                <tr>
                  <td><?php echo $i;?></td>
                <td style="text-align: left;"><?php echo $row['name'];?></td>
              <td style="text-align: left;"><?php echo $row['email'];?></td>
              <td style="text-align: left;"><?php echo $row['message'];?></td>
              <td style="text-align: right;"><?php echo date('M d, Y', strtotime($row['posted_date']));?></td>
        
          <?php if($row['status'] != 1){?><td style="text-align: center;" class="text-nowrap"><a href="<?php echo base_url();?>admin/comments/approve/<?php echo $row['id'];?>" data-toggle="tooltip" data-original-title="Approve"><div class="badge badge-info">Approve</div></a> </td><?php }elseif($row['status'] =1){?>
            <td style="text-align: center;">Approved</td>
            <?php } ?>

            <?php if($row['status'] != 2){?><td style="text-align: center;" class="text-nowrap"><a href="<?php echo base_url();?>admin/comments/reject/<?php echo $row['id'];?>" data-toggle="tooltip" data-original-title="Reject"><div class="badge badge-danger">Reject</div></a> </td><?php }elseif($row['status'] =2){?>
            <td style="text-align: center;">Rejected</td>
            <?php } ?>

           <td style="text-align: center;" class="text-nowrap"><a href="#" data-toggle="tooltip" onclick="confirm_modal('<?php echo base_url();?>admin/comments/delete/<?php echo $row['id'];?>' , '<?php echo base_url();?>admin/reload_admin_list');" data-original-title="Delete"> <i class="fas fa-trash text-danger m-r-10"></i> </a></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
            </div>
            </div>
          </div>

  


<script>
    $(document).ready(function(){
      $('#myTable').DataTable();
      $(document).ready(function() {
        var table = $('#example').DataTable({
          "columnDefs": [
          { "visible": false, "targets": 2 }
          ],
          "order": [[ 2, 'asc' ]],
          "displayLength": 25,
          "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
              if ( last !== group ) {
                $(rows).eq( i ).before(
                  '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                  );

                last = group;
              }
            } );
          }
        } );

    $('#example tbody').on( 'click', 'tr.group', function () {
      var currentOrder = table.order()[0];
      if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
        table.order( [ 2, 'desc' ] ).draw();
      }
      else {
        table.order( [ 2, 'asc' ] ).draw();
      }
    });
  });
    });
  </script>
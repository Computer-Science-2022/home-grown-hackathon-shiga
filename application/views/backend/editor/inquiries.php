<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Inquiries</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>editor/editor_dashboard"><?php echo get_phrase('Dashboard');?></a></li>
            <li><a class="active">Inquiries</a></li>
        </ol>
    </div>
</div>

<div class="tab-content">
    <div class="tab-pane box active" id="english">
          <div class="white-box">
            <div class="table-responsive">
            <table id="myTable" class="table table-striped">
              <thead>
                <tr>
                  <th style="text-align: center;">#</th>
          <th style="text-align: center;">Inquiry</th>
            <th style="text-align: center;">Posted By</th>
            <th style="text-align: center;">Email</th>
            <th style="text-align: center;">Phone</th>
            <th style="text-align: center;">Date Posted</th>
            <th style="text-align: center;">Reply</th>
                </tr>
              </thead>
              <tbody>
              <?php  
    $this->db->order_by('id', 'DESC');
    $inquiry = $this->db->get('inquiry')->result_array();
    $i=0;
    foreach($inquiry as $row):
    $i++;
    ?>
                <tr>
                  <td><?php echo $i;?></td>
              <td style="text-align: left;"><?php if(!$row['reply']){?><a href="<?php echo base_url().'editor/reply_inquiry/'.$row['id'];?>" data-toggle="tooltip" data-original-title="Reply this inquiry"><?php echo $row['message'];?></a><?php }else{echo $row['message'];}?></td>
              <td style="text-align: left;"><?php echo $row['name'];?></td>
              <td style="text-align: left;"><?php if($row['email']){echo $row['email'];}else{echo "Not specified";}?></td>
              <td style="text-align: left;"><?php if($row['phone']){echo $row['phone'];}else{echo "Not specified";}?></td>
              <td style="text-align: right;"><?php echo date('M d, Y', strtotime($row['timestamp']));?></td>
              <td style="text-align: left;"><?php if(!$row['reply']){echo "Not replied";}else{echo "Replied on: ".date('M d, Y', strtotime($row['timestamp']))."<br>".$row['reply'];;}?></td>

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
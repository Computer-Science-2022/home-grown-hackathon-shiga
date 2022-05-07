<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Subscribers</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
  		    <li><a href="<?php echo base_url(); ?>editor/editor_dashboard"><?php echo get_phrase('Dashboard');?></a></li>
            <li><a class="active">Subscribers</a></li>
        </ol>
    </div>
</div>

<div class="tab-content">
		<div class="tab-pane box active" id="list">
          <div class="white-box">
            <div class="table-responsive">
            <table id="myTable" class="table table-striped">
              <thead>
                <tr>
          <th style="text-align: center;">#</th>
			      <th style="text-align: center;"><?php echo get_phrase('Email');?></th>
          <th style="text-align: center;">Date Joined</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $i = 1;
    $this->db->order_by('id', 'DESC');
		$subscribers	=	$this->db->get('subscriber' )->result_array();
		foreach($subscribers as $row):
		?>
                <tr>
                <td style="text-align: left;"><?php echo $i++;?></td>
                <td style="text-align: center;"><?php echo $row['email'];?></td>
            	<td style="text-align: center;"><?php echo date('M d, Y - h:i:s a', strtotime($row['timestamp']));?></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
            </div>
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
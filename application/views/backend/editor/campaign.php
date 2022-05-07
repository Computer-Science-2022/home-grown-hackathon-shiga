<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Campaigns</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>editor/editor_dashboard"><?php echo get_phrase('Dashboard');?></a></li>
            <li><a class="active">Campaigns</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <ul class="nav nav-tabs bordered">
      <li class="active">
              <a href="#list" data-toggle="tab">
          Campaigns
                </a>
            </li>
      <li><a href="#add" data-toggle="tab">
          New
              </a>
            </li>
    </ul>

<div class="tab-content">
    <div class="tab-pane box active" id="list">
          <div class="white-box">
            <div class="table-responsive">
            <table id="myTable" class="table table-striped">
              <thead>
                <tr>
                  <th style="text-align: center;">#</th>
          <th style="text-align: center;">Subject</th>
          <th style="text-align: center;">Campaign Body</th>
          <th style="text-align: center;">Date Created</th>
          <th style="text-align: center;">Sent Emails</th>
                </tr>
              </thead>
              <tbody>
              <?php 
    $this->db->order_by('id', 'DESC');
    $campaigns = $this->db->get('campaign' )->result_array();
    $i=0;
    foreach($campaigns as $row):
    $i++;
    ?>
                <tr>
                  <td><?php echo $i;?></td>
              <td style="text-align: left;"><?php echo $row['subject'];?></td>
              <td style="text-align: left;"><?php echo $row['message'];?></td>
              <td style="text-align: right;"><?php echo date('M d, Y', strtotime($row['timestamp']));?></td>
              <td style="text-align: left;"><?php echo $row['emails'];?></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
            </div>
            </div>
          </div>

  <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                  <?php echo form_open(base_url() . 'editor/campaign/create/' , array('class' => 'form-horizontal form-groups-bordered validate ajax-submit', 'enctype' => 'multipart/form-data'));?>

        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title m-b-0">Start New Campaign</h3>
            <br><br>
        <div class="padded">
         
             <div class="form-group">
                    <label class="col-sm-2 control-label">Subject</label>
                    <div class="col-sm-10">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                      <input type="text" name="subject" placeholder="Campaign Subject" class="form-control">
                    </div>
                    </div>
                  </div>
              <div class="form-group">
                    <label class="col-sm-2 control-label">Campaign Message</label>
                    <div class="col-sm-10">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                      <textarea name="message" class="textarea_editor form-control" id="text" required=""></textarea>
                    </div>
                    </div>
              </div>

            <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
              <button type="submit" class="btn btn-info">Send Campaign</button>
              <span id="preloader-form"></span>
            </div>
            </div>
             <?php echo form_close();?>
                    </form>                
                </div>                
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


  <script>
        $(document).ready(function () {
            $('.textarea_editor').wysihtml5();
        });
</script>
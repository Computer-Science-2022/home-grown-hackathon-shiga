<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Categories</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>editor/editor_dashboard"><?php echo get_phrase('Dashboard');?></a></li>
            <li><a class="active">Categories</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <ul class="nav nav-tabs bordered">
      <li class="active">
              <a href="#list" data-toggle="tab">
          Categories
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
                  <th style="text-align: center;">Profile</th>
                  <th style="text-align: center;">Name (Eng)</th>
                  <th style="text-align: center;">Description (Eng)</th>
                  <th style="text-align: center;">Name (Kin)</th>
                  <th style="text-align: center;">Description (Kin)</th>
                  <th style="text-align: center;">Date Created</th>
                  <th style="text-align: center;"># of articles</th>
                  <th style="text-align: center;"><?php echo get_phrase('Edit');?></th>
                  <th style="text-align: center;"><?php echo get_phrase('Delete');?></th>
                </tr>
              </thead>
              <tbody>
              <?php 
    $this->db->order_by('id', 'DESC');
    $categories = $this->db->get('category' )->result_array();
    $i=0;
    foreach($categories as $row):
    $i++;
    ?>
          <tr>
              <td><?php echo $i;?></td>
              <td style="text-align: center;"><img src="<?php echo base_url().'uploads/category/'.$row['id'].'.jpg';?>" width="100px"></td>
              <td style="text-align: left;"><?php echo $row['english'];?></td>
              <td style="text-align: left;"><?php echo $row['description_eng'];?></td>
              <td style="text-align: left;"><?php echo $row['kinyarwanda'];?></td>
              <td style="text-align: left;"><?php echo $row['description_kin'];?></td>
              <td style="text-align: left;"><?php echo date('M d, Y', strtotime($row['timestamp']));?></td>
              <td style="text-align: left;"><?php echo $this->db->get_where('posts', array('category' => $row['id'], 'status' => 1))->num_rows();?></td>
        
          <td style="text-align: center;" class="text-nowrap"><a href="<?php echo base_url();?>editor/view_category/<?php echo $row['id'];?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> </td>

           <td style="text-align: center;" class="text-nowrap"><a href="#" data-toggle="tooltip" onclick="confirm_modal('<?php echo base_url();?>editor/categories/delete/<?php echo $row['id'];?>' , '<?php echo base_url();?>editor/reload_admin_list');" data-original-title="Delete"> <i class="fas fa-trash text-danger m-r-10"></i> </a></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
            </div>
            </div>
          </div>

  <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                  <?php echo form_open(base_url() . 'editor/categories/create/' , array('class' => 'form-horizontal form-groups-bordered validate ajax-submit', 'enctype' => 'multipart/form-data'));?>

        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title m-b-0">Create New Category</h3>
            <br><br>
        <div class="padded">
         
             <div class="form-group">
                    <label class="col-sm-3 control-label">Category Name</label>
                    <div class="col-sm-9">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                      <input type="text" class="form-control" required="" name="english" placeholder="English">
                    </div>
                    </div>
                  </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Description (ENG)</label>
                <div class="col-sm-9">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                  <textarea name="description_eng" placeholder="Description" required=""></textarea>
                </div>
                </div>
              </div>
              <div class="form-group">
                    <label class="col-sm-3 control-label">Category Name</label>
                    <div class="col-sm-9">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                      <input type="text" class="form-control" required="" name="kinyarwanda" placeholder="Kinyarwanda">
                    </div>
                    </div>
                  </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Description (KIN)</label>
                <div class="col-sm-9">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                  <textarea name="description_kin" placeholder="Description" required=""></textarea>
                </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Caption (ENG)</label>
                <div class="col-sm-9">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                  <input type="text" class="form-control" required="" name="caption_eng" placeholder="Caption (English)">
                </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Caption (KIN)</label>
                <div class="col-sm-9">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                  <input type="text" class="form-control" required="" name="caption_kin" placeholder="Caption (Kinyarwanda)">
                </div>
                </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Image</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-image"></i></div>
                    <input type="file" class="form-control" accept="image/*" name="image">
                  </div>
                  </div>
                </div>

            <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
              <button type="submit" class="btn btn-info"><?php echo get_phrase('Add');?></button>
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
  CKEDITOR.replace( 'description_eng' );
</script>
<script>
  CKEDITOR.replace( 'description_kin' );
</script>
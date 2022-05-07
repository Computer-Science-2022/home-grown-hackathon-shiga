<div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Edit Homepage</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="#"><?php echo get_phrase('Dashboard');?></a></li>
            <li><a href="#">Edit Homepage</a></li>
            <li class="active" style="text-transform: capitalize;"><?php echo $site_lan;?></li>
          </ol>
        </div>
</div>

<div class="tab-content">
    <div class="tab-pane box active" id="list">
      <form method="POST" action="<?php echo base_url().'Admin/homepage_edit/do_update/'.$site_lan;?>">
          
          <div class="white-box" id="toolbar">
              <h3 class="box-title" style="color: black;">About Health Spear</h3>
              <textarea name="about" class="textarea_editor form-control" rows="10"><?php echo $this->db->get_where('language', array('phrase' => 'About-Data'))->row()->$site_lan;?></textarea> 
          </div>
          <div class="form-group" style="text-align: center; padding-bottom: 20px;">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('Update');?></button>
                    </div>
                 </div>
        </form>
    </div>
</div>


<script>
        $(document).ready(function () {
            $('.textarea_editor').wysihtml5();
        });
</script>

    


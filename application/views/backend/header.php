<nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part">

                <?php if($this->session->userdata('login_type') == 'admin') : 
                    ?>
                <a class="logo" href="<?php echo base_url(); ?>admin/admin_dashboard">
                <?php endif; ?>
                <?php if($this->session->userdata('login_type') == 'editor') : ?>
                <a class="logo" href="<?php echo base_url(); ?>editor/editor_dashboard">
                <?php endif; ?>
                


                <!-- <b><img src="<?php echo base_url();?>style/images/logoadmin.png" alt="home" width="60px" /></b> -->
                <br>
                <span class="hidden-xs"><strong>&nbsp;&nbsp;&nbsp;KEYA HEALTH</strong></span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="fas fa-braille"></i></a></li>
                    <?php if($this->session->userdata('login_type') == 'admin') : ?>
                    <li>
                     <?php echo form_open(base_url() . 'admin/search' , array('onsubmit' => 'return validate() role="search" class="app-search hidden-xs"')); ?>
                            <input type="text" id="search_input" name="search_key" placeholder="Search..." class="form-control"> <a href="#"><i class="fa fa-search"></i></a> 
                        </form>
                    </li>
                    <?php endif; ?>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                        <?php if($this->session->userdata('login_type') == 'admin') : ?>
                            <li>
                            <a href="<?php echo base_url(); ?>admin/admin_profile/<?php echo $this->session->userdata('login_user_id'); ?>"><i class="fa fa-user"></i> Profile</a>
                            </li>
                        <?php elseif($this->session->userdata('login_type') == 'editor') : ?>
                            <li>
                            <a href="<?php echo base_url(); ?>editor/editor_profile/<?php echo $this->session->userdata('login_user_id'); ?>"><i class="fa fa-user"></i> Profile</a>
                            </li>
                        <?php endif; ?>
                            <li>
                            <a href="<?php echo base_url(); ?>index.php?<?php echo $this->session->userdata('login_type'); ?>/message"><i class="fa fa-envelope"></i> Messages</a></li>
                            <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
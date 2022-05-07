<?php include ('skin.php');?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php echo
"<style>
   .sidebar-nav{
       height: 50vh;
       
   }
   .page-title{
    font-size: 1.5em; 
    font-weight: bolder;
    color: ".$color_pri."; 
   }
</style>";?>

<nav class="sidebar-nav" style="">
    <ul id="sidebarnav"  style="background-color: <?php echo $color_bg;?>; height: 94vh; overflow: scroll;">
        <!-- User Profile-->
        <li class="sidebar-item pt-2">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>admin/admin_dashboard"
                aria-expanded="false" style="color: <?php echo $color_sec;?>;">
                <i class="fas fa-cog fa-spin" aria-hidden="true" style="color: <?php echo $color_sec;?>;"></i>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>admin/menu"
                aria-expanded="false" style="color: <?php echo $color_sec;?>;">
                <i class="fa fa-forward" aria-hidden="true" style="color: <?php echo $color_sec;?>;"></i>
                <span class="hide-menu"> Manage Employees</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>admin/settings"
                aria-expanded="false" style="color: <?php echo $color_sec;?>;">
                <i class="fa fa-cogs" aria-hidden="true" style="color: <?php echo $color_sec;?>;"></i>
                <span class="hide-menu">Settings</span>
            </a>
        </li>
        <li class="text-center p-20 upgrade-btn">
            <a href="<?php echo base_url();?>login/logout"
                class="btn d-grid btn-danger" target="_blank"  style="color: <?php echo $color_bg;?>; background-color: <?php echo $color_sec;?>; border: 0px;">
                Logout</a><br><br>
        </li>
    </ul>

</nav>

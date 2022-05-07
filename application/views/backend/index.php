<?php
    $system_name        =   $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
    $system_title       =   $this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
    $account_type       =   "admin";
    include ('admin/skin.php');
    ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="mutoni, jean, damour, AOG, Rwanda, ngo, support, entrepreneur, investment, shares, shareholder, ecommerce, product, rwanda, service, delivery, VONSUNG, business">
    <meta name="description" content="Welcome to AOG Rwanda. We are thrilled to take your business to the next level">
    <meta name="robots" content="noindex,nofollow">
    <meta name="author" content="VONSUNG">
    <title><?php echo $page_title;?> | <?php echo $system_title;?></title>
    <link rel="canonical" href="<?php echo base_url();?>" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>imgs/logo.jpeg">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/admin/plugins/bower_components/chartist/dist/chartist.min.css"
        rel="stylesheet">
    <link rel="stylesheet"
        href="<?php echo base_url();?>assets/admin/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/admin/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/tab.css">

<?php 
    echo "<style>
    .aog_btn_r{
    border-radius: 50px; 
    padding: 0px 20px;
    color:".$color_sec."; background-color:".$color_pri."; border: 0px;}
    ";

    echo "
    .aog-btn-r{
    border-radius: 50px; 
    padding: 0px 20px;
    color:".$color_sec."; background-color:".$color_pri."; border: 0px;}
    ";

    echo "
    .aog-btn{
    color:".$color_sec."; background-color:".$color_pri."; border: 0px;}
    </style>";
?>


<style>
    <style>
    .aog-title{
        font-size: 1.4em;
    }
    .form-control {
  display: block;
  margin-left: 15px;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 0.875rem;
  font-weight: 400;
  line-height: 1.5;
  color: #4F5467;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #e9ecef;
  border-radius: 2px;
  -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  -o-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out; }
  @media (prefers-reduced-motion: reduce) {
    .form-control {
      -webkit-transition: none;
      -o-transition: none;
      transition: none; } }


.table-responsive{
    height: 63vh;
    overflow: scroll;
} 
</style>




<!-- Style for popup 
============================================= -->
<style>
    .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  z-index: 1000;
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 60%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="<?php echo base_url();?>">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url();?>imgs/logo.jpeg" alt="homepage" width="30%" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->

                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5" style="background-color: <?php echo $color_bg;?>" style="float: right;">

                        <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0" style="border: 1px solid <?php echo $color_sec;?>;">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- <li>
                            <a class="profile-pic" href="#">
                                <img src="<?php echo base_url();?>imgs/user.png" alt="user-img"
                                    class="img-circle" style=" width:36px; height:36px; overflow: hidden; background-color: white; padding: 2px;"><span class="font-medium" style="color: <?php echo $color_sec;?>"><?php echo $this->session->userdata('name');?></span></a>
                        </li> -->
                    </ul>

                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                    <a class="profile-pic nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo base_url();?>imgs/user.png" alt="user-img"
                                    class="img-circle" style=" width:36px; height:36px; overflow: hidden; background-color: white; padding: 2px;"><span class="font-medium" style="color: <?php echo $color_sec;?>"><?php echo $this->session->userdata('name');?></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  onclick="document.getElementById('profile').style.display='block'"  style="cursor: pointer;">
                    Profile</a>
                    <a class="dropdown-item"  onclick="document.getElementById('password').style.display='block'" style="cursor: pointer;">
                    Change Password</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="<?php echo base_url();?>login/logout">Logout</a>
                    </div>
                </li>
                </ul>
                <!-- </div> -->
                    
                    
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6" style="background-color: <?php echo $color_bg;?>;">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <?php include 'admin/navigation.php';?>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <br>
            <?php include $account_type.'/'.$page_name.'.php';?>
            <?php include "footer.php";?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url();?>assets/admin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>assets/admin/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/app-style-switcher.js"></script>
    <script
        src="<?php echo base_url();?>assets/admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js">
    </script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>assets/admin/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>assets/admin/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>assets/admin/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="<?php echo base_url();?>assets/admin/plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script
        src="<?php echo base_url();?>assets/admin/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js">
    </script>
    <script src="<?php echo base_url();?>assets/js/dashboard1.js"></script>
</body>

</html>









<!-- <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                     <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> 
                     <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>


                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="<?php echo base_url();?>admin/admin_dashboard" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>admin/profile" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Profile</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>admin/shareholders" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Shareholders</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>admin/stock_class" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Stock Class</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>admin/stocks" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i>My Stock</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>admin/management" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>Management</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>admin/documents" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i>Documents</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>admin/inquiries" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>Inquiries</a>
                    </li>
                </ul>
            </div>
            
        </div> -->



<!-- Join code generator modal  -->
<div id="profile" class="modal" style="z-index:10000;">

<!-- Modal content -->
<div class="modal-content">
  <span class="close" style="float: right; color: red; text-align: right;" onclick="document.getElementById('profile').style.display='none'" >&times;</span>
  <span class="page-title" style="border-bottom: solid 1px; padding-bottom: 10px;">My Profile</span><br>
  <div class="white-box">
      <?php 
      $user = $this->db->get_where('admin', array('admin_id' => $_SESSION['admin_id']))->row();
      ?>
          <div class="row">
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <strong>Name: </strong><?php echo $user->name; ?>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <strong>Phone:</strong> </strong><?php echo $user->username; ?>
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <strong>Status:</strong> </strong><?php if($user->status == 1){echo "Active";}elseif($user->status == 0){echo "Inactive";} ;?>
              </div>
          </div><br>
          
          <!-- <center><button class="btn btn-primary aog-btn">Submit</button></center> -->

      </div>
</div>

</div>


<div id="password" class="modal" style="z-index: 10000;">

<!-- Modal content -->
<div class="modal-content">
  <span class="close" style="float: right; color: red; text-align: right; z-index: 100000;" onclick="document.getElementById('password').style.display='none'">&times;</span>
  <span class="page-title" style="border-bottom: solid 1px; padding-bottom: 10px;">Change Password</span><br>
  <div class="white-box">
      <form class="form-horizontal form-material" method="POST" action="<?php echo base_url();?>admin/changePassword" enctype="multipart/form-data">
          <div class="row">
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <strong>Current password:</strong> <input class="form-control p-0 border-0" name="currentPwd" label="title" required type="password" placeholder="Your current password">
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <strong>New password:</strong> <input class="form-control p-0 border-0" name="newPwd" label="password" required type="password" placeholder="New password" minlength="5" maxlength="15">
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <strong>Confirm new password:</strong> <input class="form-control p-0 border-0" name="confirmPwd" label="password" required type="password" placeholder="New password" minlength="5" maxlength="15">
              </div>
          </div><br>
          
          <center><button class="btn btn-primary aog-btn">Change Password</button></center>
      </form>

      </div>
</div>

</div>



<script>
    var modal = document.getElementById('password');
    var modal = document.getElementById('profile');
</script>



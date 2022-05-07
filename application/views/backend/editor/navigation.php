        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <div class="navbar-default sidebar widget-sidebar" role="navigation" id="my-sidebar-context">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
        
                            </span> </div>
                    </li>
                    <hr>

                    <li> <a href="<?php echo base_url(); ?>editor/editor_dashboard" class="waves-effect"><i class="fa fa-dashboard"></i> <span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-users"></i> <span class="hide-menu">User account<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url(); ?>editor/editors">Editors</a></li>
                            <li> <a href="<?php echo base_url(); ?>editor/subscribers">Subscribers</a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-info-circle"></i> <span class="hide-menu">Edit Homepage<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url(); ?>editor/homepage_edit/english">English</a></li>
                            <li> <a href="<?php echo base_url(); ?>editor/homepage_edit/kinyarwanda">Kinyarwanda</a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-info-circle"></i> <span class="hide-menu">Posts<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url(); ?>editor/post/all">My Posts</a></li>
                            <li> <a href="<?php echo base_url(); ?>editor/post/pending">Pending Posts</a></li>
                            <li> <a href="<?php echo base_url(); ?>editor/post/new">Add New Post</a></li>
                        </ul>
                    </li>

                    <li> <a href="<?php echo base_url(); ?>editor/categories" class="waves-effect"><i class="fas fa-cog"></i> <span class="hide-menu">Categories</span></a> </li>
                    
                     <li> <a href="<?php echo base_url(); ?>editor/comments" class="waves-effect"><i class="fas fa-cog"></i> <span class="hide-menu">Comments</span></a> </li>

                     <li> <a href="<?php echo base_url(); ?>editor/inquiries" class="waves-effect"><i class="fas fa-cog"></i> <span class="hide-menu">Inquiries</span></a> </li>

                     <li> <a href="<?php echo base_url(); ?>editor/campaign" class="waves-effect"><i class="fas fa-cog"></i> <span class="hide-menu">Email Campaign</span></a> </li>
                    
        </ul>
    </div>
</div>



<script>
    function closeNav() {
    document.getElementById("mySidenav").style.width = "250px";
}
</script>

</html> 

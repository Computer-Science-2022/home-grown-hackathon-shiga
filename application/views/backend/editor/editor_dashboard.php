<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Editor Dashboard</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>editor/editor_dashboard"><?php echo $system_title; ?></a></li>
            <li class="active">Editor Dashboard</li>
        </ol>
    </div>
</div>


<div class="row">
<div class="col-md-12">
<div class="alert alert-info">
        <span style="color: #fff; font-weight: Verdana; font-size: 23px;">
<marquee direction="left" scrollamount="10"><?php echo $this->db->get_where('settings' , array('type' =>'ad'))->row()->description;?></marquee></span>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title">Social</h3>
                            <div class="button-box">
                                <div class="button-list">
                                    <a target="_blank" href="<?php echo $this->db->get_where('settings' , array('type' =>'facebook_url'))->row()->description;?>"><button class="btn btn-facebook waves-effect waves-light" type="button"> <i class="fa fa-facebook"></i> </button></a>
                                    <a target="_blank" href="<?php echo $this->db->get_where('settings' , array('type' =>'twitter_url'))->row()->description;?>"><button class="btn btn-twitter waves-effect waves-light" type="button"> <i class="fa fa-twitter"></i> </button></a>
                                     <a target="_blank" href="<?php echo $this->db->get_where('settings' , array('type' =>'google_url'))->row()->description;?>"><button class="btn btn-googleplus waves-effect waves-light" type="button"> <i class="fa fa-google-plus"></i> </button></a>
                                     <a target="_blank" href="<?php echo $this->db->get_where('settings' , array('type' =>'linkedin_url'))->row()->description;?>"><button class="btn btn-linkedin waves-effect waves-light" type="button"> <i class="fa fa-linkedin"></i> </button></a>
                                    <a target="_blank" href="<?php echo $this->db->get_where('settings' , array('type' =>'instagram_url'))->row()->description;?>"><button class="btn btn-instagram waves-effect waves-light" type="button"> <i class="fa fa-instagram"></i> </button></a>
                                    <a target="_blank" href="<?php echo $this->db->get_where('settings' , array('type' =>'pinterest_url'))->row()->description;?>"><button class="btn btn-pinterest waves-effect waves-light" type="button"> <i class="fa fa-pinterest"></i> </button></a>
                                    <a target="_blank" href="<?php echo $this->db->get_where('settings' , array('type' =>'dribbble_url'))->row()->description;?>"><button class="btn btn-dribbble waves-effect waves-light" type="button"> <i class="fa fa-dribbble"></i> </button></a>
                                    <a target="_blank" href="<?php echo $this->db->get_where('settings' , array('type' =>'youtube_url'))->row()->description;?>"><button class="btn btn-youtube waves-effect waves-light" type="button"> <i class="fa fa-youtube"></i> </button></a>
                                </div>
                            </div>
    </div>
</div>
<div class="col-md-6">
                <div class="alert alert-warning" style="background-color: #105f77;">
                    <div class="icon"><i class="entypo-chart-bar"></i></div>
                    
                    <h4><font color="white">Posts</font></h4>
                    <p>Posted so far: </p>
                    <h3><font color="white"><span class="counter" style="color: white;"><?php echo $this->db->count_all('posts');?></span></font></h3>
                </div>
                
            </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-wrapper p-b-10 collapse in">
                               <div class="card-body card-padding">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                      </ol>

        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="zmdi zmdi-chevron-left" aria-hidden="true"></span>
            <span class="sr-only"><?php echo get_phrase('Prev');?></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="zmdi zmdi-chevron-right" aria-hidden="true"></span>
            <span class="sr-only"><?php echo get_phrase('Next');?></span>
        </a>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                   <div class="white-box" style="background-color: #58930c;">
                        <h3 class="box-title" style="color: white;"><?php echo get_phrase('Admins');?></h3>
                        <ul class="list-inline two-part">
                            <li><i class="fa fa-user text-info" style="color: white;"></i></li>
                            <li class="text-right"><span class="counter" style="color: white;"><?php echo $this->db->count_all('admin');?></span></li>
                        </ul>
                    </div>
                </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="white-box alert-warning" style="background-color: #6da523;">
                        <h3 class="box-title" style="color: white;">Editors</h3>
                        <ul class="list-inline two-part">
                            <li><i class="fas fa-chalkboard-teacher" style="color: white;"></i></li>

                            <li class="text-right"><span class="counter"><?php echo $this->db->count_all('author');?></span></li>
                        </ul>
                    </div>
                </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="white-box alert-warning" style="background-color: #80ad44">
                        <h3 class="box-title" style="color: white;">Subscribers</h3>
                        <ul class="list-inline two-part">
                            <li><i class="fas fa-book-reader text-info" style="color: white;"></i></li>

                            <li class="text-right"><span class="counter"><?php echo $this->db->count_all('subscriber');?></span></li>
                        </ul>
                    </div>
                </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="white-box" style="background-color: #9ab279">
                        <h3 class="box-title" style="color: white;">Inquiries</h3>
                        <ul class="list-inline two-part">
                            <li><i class="fas fa-blind text-info" style="color: white;"></i></li>
                            <li class="text-right"><span class="counter"><font color="white"><?php echo $this->db->count_all('inquiry');?></font></span></li>
                        </ul>
                    </div>
                </div>
</div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title">Latest Posts</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;"><div>Post Title</div></th>
                                <th style="text-align: center;"><div>Posted by</div></th>
                                <th style="text-align: center;"><div>Date Posted</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $counter = 1;
                                        $this->db->where('status' , 1);
                                        $this->db->limit(7);
                                        $this->db->order_by('id' , 'desc');
                                        $posts   =   $this->db->get('posts')->result_array();
                                        foreach($posts as $row):?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $counter++; ?></td>
                                            <td style="text-align: left;">
            <a href="<?php echo base_url();?>admin/post/edit/<?php echo $row['id'];?>" target="_blank"><?php echo substr($row['title_eng'],0, 20);?>...</a>
    </td>
    <td style="text-align: left;"><?php $author = $this->db->get_where('author', array('author_id' => $row['author_id']))->row()->name; echo $author;?>...</td>
    <td style="text-align: center;"><?php echo date('M d, Y', strtotime($row['posted_date'])); ?></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
            </div>
        </div>
    </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
          <div class="white-box">
            <h3 class="box-title">Latest Inquiries</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;"><div>Name</div></th>
                    <th style="text-align: center;"><div>Message</div></th>
                    <th style="text-align: center;"><div>Date</div></th>
                  </tr>
                </thead>
                <tbody>
                 <?php $counter = 1;
                        $this->db->limit(7);
                        $this->db->order_by('id' , 'desc');
                        $inquiry =   $this->db->get('inquiry')->result_array();
                        foreach($inquiry as $row2):?>
                  <tr>
                    <td style="text-align: center;"><?php echo  $counter++;?></td>
                    <td style="text-align: left;"><?php echo $row2['name'];?></td>
                <td style="text-align: left;"><span class="text"><a href="<?php echo base_url().'Admin/reply_inquiry/'.$row2['id'];?>"><?php echo $row2['message'];?></a></td>
                <td style="text-align: center;"><?php echo date('M d, Y', strtotime($row2['timestamp'])); ?></td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
          </div>
        </div>
</div>
</div>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->library('session');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');		
        $this->load->model('Crud_model');
    }

    public function index()
    {
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'Admin/admin_dashboard', 'refresh');
    }

    function projects(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'manageprojects';
        $page_data['page_title'] = 'Manage Projects';
        $this->load->view('backend/index', $page_data);
    }

    function notifications(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'managenotifications';
        $page_data['page_title'] = 'Manage Notifications';
        $this->load->view('backend/index', $page_data);
    }

    function services(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'manageservices';
        $page_data['page_title'] = 'Manage Services';
        $this->load->view('backend/index', $page_data);
    }

    function settings(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'managesettings';
        $page_data['page_title'] = 'Manage Settings';
        $this->load->view('backend/index', $page_data);
    }

    function payments(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'managepayment';
        $page_data['page_title'] = 'Manage Payments';
        $this->load->view('backend/index', $page_data);
    }

    function changesetting(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $data['description'] = $this->input->post('description');
        $data['type'] = $this->input->post('type');
        $this->db->where('type', $this->input->post('type'));
        $this->db->update('settings', $data); 
        // echo '<script>alert("Successfully Modified Setting")</script>';
        // redirect(base_url() . 'admin/settings', 'refresh');
        echo "<script>alert('Updated');
        window.location.href='".base_url()."admin/settings';</script>";
    }

    function contactusreply($param1=" "){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['project_id'] = $param1;
        $page_data['page_name']  = 'contactusreply';
        $page_data['page_title'] = 'Reply Contact Us';
        $this->load->view('backend/index', $page_data);
    }

    function programmes(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'manageprogramme';
        $page_data['page_title'] = 'Manage Programmes';
        $this->load->view('backend/index', $page_data);
    }

    function team(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'manageteam';
        $page_data['page_title'] = 'Manage Team';
        $this->load->view('backend/index', $page_data);
    }

    function addsmscampaign(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addsmscampaign';
        $page_data['page_title'] = 'Manage SMS Campaign';
        $this->load->view('backend/index', $page_data);
    }

    function addemailcampaign(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addemailcampaign';
        $page_data['page_title'] = 'Manage Email Campaign';
        $this->load->view('backend/index', $page_data);
    }

    function managesms(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'managesms';
        $page_data['page_title'] = 'Manage SMS Campaign';
        $this->load->view('backend/index', $page_data);
    }

    function manageemail(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'manageemail';
        $page_data['page_title'] = 'Manage Email Campaign';
        $this->load->view('backend/index', $page_data);
    }

    function managedonations(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'managedonations';
        $page_data['page_title'] = 'Manage Donations';
        $this->load->view('backend/index', $page_data);
    }

    function addSMS(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $recipients = $this->input->post('recipients');
        // $recipients = str_replace('<p> </p>;', ',', $recipients);
        $recipients = explode(',', $recipients);

        // print_r($recipients);


        foreach ($recipients as $recipient){
            $phone_input = $recipient;
            if(strlen($phone_input)==10){
                $phone = "+25".$phone_input;
            }elseif(strlen($phone_input)==9){
                $phone = "+250".$phone_input;
            }else{
            $phone = $phone_input;
            }
            $message = $message;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.mista.io/sms",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'AOG Rwanda','sms' => $message,'unicode' => '0'),
                CURLOPT_HTTPHEADER => array(
                "x-api-key: dmlBPXZGRmRPYk1qc3B6cEZ2enQ="
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
        }
        $data['recipients'] = $this->input->post('recipients');
        $data['message'] = $this->input->post('message');
        $data['subject'] = $this->input->post('subject');
        $data['date'] = date('Y-m-d h:i:s a');
        $this->db->insert('smscampaign', $data);
        // print_r($recipients);
        $page_data['page_name']  = 'managesms';
        $page_data['page_title'] = 'Manage SMS Campaign';
        $this->load->view('backend/index', $page_data);
    }

    function changePassword(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');

        $currentPwd = sha1($this->input->post('currentPwd'));
        $newPwd = sha1($this->input->post('newPwd'));
        $confirmPwd = sha1($this->input->post('confirmPwd'));
        $dbPwd = $this->db->get_where('admin', array('admin_id' => $_SESSION['admin_id']))->row()->password;
        
        if($currentPwd != $dbPwd){
            echo "<script>alert('The current password entered is different from the one we have in our database. Please try to remember your current login password');
            window.location.href='".base_url()."admin';</script>";
        }
        if($newPwd != $confirmPwd){
            echo "<script>alert('Two passwords do not match');
            window.location.href='".base_url()."admin';</script>";
        }elseif($currentPwd == $dbPwd && $newPwd == $confirmPwd){
            $data['password'] = $newPwd;
            $this->db->where('admin_id', $_SESSION['admin_id']);
            $this->db->update('admin', $data);

            echo "<script>alert('Password updated successfully');
            window.location.href='".base_url()."admin';</script>";
        }



    }

    function addEmail(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $recipients = $this->input->post('recipients');

        // if($recipients == 'user'){
        //     $recipients = $this->db->get_where('user', array('status' => 1))->result_array();
        // }
        // if($recipients == 'subscriber'){
        //     $recipients = $this->db->get_where('subscriber', array('status' => 1))->result_array();
        // }
        $recipients = $this->db->get_where($recipients, array('status' => 1))->result_array();

        $data['recipients'] = $recipients;
        
        $data['message'] = $this->input->post('message');
        $data['subject'] = $this->input->post('subject');
        $data['date'] = date('Y-m-d h:i:s a');
        $rec = [];

        foreach ($recipients as $recipient){
            $from_email = "ahmad@vonsung.co.rw";
            $to_email   = $recipient['email']; //.",s.maisiba@alustudent.com"; //info@vonsung.co.rw";
                
            
            $this->load->library('email');
            $this->load->helper('form');
            
            
            $config['useragent'] = 'CodeIgniter';
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'mail.vonsung.co.rw';
            $config['smtp_user'] = 'ahmad@vonsung.co.rw';
            $config['smtp_pass'] = 'vonsung@vonsung';
            $config['smtp_port'] = 587;
                
            $config['smtp_timeout'] = 5;
            $config['wordwrap'] = true;
            $config['wrapchars'] = 76;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['validate'] = false;
            $config['priority'] = 3;
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $config['bcc_batch_mode'] = false;
            $config['bcc_batch_size'] = 200;
            
            $this->email->initialize($config);
                
            $this->email->set_mailtype("html");
            // $this->load->library('encrypt');
            $this->load->library('encryption');
                
            // $this->email->attach('https://vonsung.co.rw/attachement/Advanced_Excel_and_KoBo_Training_Manual.pdf');  //attachement
            $this->email->from($from_email, 'AOG Rwanda');
            $this->email->to($to_email);
            $this->email->subject($subject);
            
            $body = $this->load->view('email_campaign.php', $data, true);
            $this->email->message($body);
            
            
            $this->email->send();
            array_push($rec, $recipient['email']);
            // echo $this->email->print_debugger();
        }
        $data['recipients'] = implode(', ',$rec);
        $data['message'] = $this->input->post('message');
        $data['subject'] = $this->input->post('subject');
        $data['date'] = date('Y-m-d h:i:s a');
        $this->db->insert('emailcampaign', $data);
        // print_r($recipients);
        $page_data['page_name']  = 'manageemail';
        $page_data['page_title'] = 'Manage Email Campaign';
        $this->load->view('backend/index', $page_data);
        
    }

    function replymessage($param1=" "){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');

        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['subject'] = $this->input->post('subject');
        $data['message'] = $this->input->post('message');
        $data['reply'] = $this->input->post('reply');
        $from_email = "ahmad@vonsung.co.rw";
        $to_email   = $this->input->post('email'); //.",s.maisiba@alustudent.com"; //info@vonsung.co.rw";
            
        
        $this->load->library('email');
        $this->load->helper('form');
        
        
        $config['useragent'] = 'CodeIgniter';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.vonsung.co.rw';
        $config['smtp_user'] = 'ahmad@vonsung.co.rw';
        $config['smtp_pass'] = 'vonsung@vonsung';
        $config['smtp_port'] = 587;
            
        $config['smtp_timeout'] = 5;
        $config['wordwrap'] = true;
        $config['wrapchars'] = 76;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['validate'] = false;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['bcc_batch_mode'] = false;
        $config['bcc_batch_size'] = 200;
        
        $this->email->initialize($config);
            
        $this->email->set_mailtype("html");
        // $this->load->library('encrypt');
        $this->load->library('encryption');
            
        // $this->email->attach('https://vonsung.co.rw/attachement/Advanced_Excel_and_KoBo_Training_Manual.pdf');  //attachement
        $this->email->from($from_email, 'AOG Rwanda');
        $this->email->to($to_email);
        $this->email->subject('Reply to your inquiry at AOG Rwanda');
        
        $body = $this->load->view('email_reply.php', $data, true);
        $this->email->message($body);
        
        
        $this->email->send();
        // echo $this->email->print_debugger();

        $dat['reply'] = $this->input->post('reply');
        $dat['replydate'] = date('Y-m-d h:i:s a');
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('contactus', $dat); 
        $page_data['page_name']  = 'managecontactus';
        $page_data['page_title'] = 'Manage Contact Us';
        $this->load->view('backend/index', $page_data);
    }

    function booking(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'managebooking';
        $page_data['page_title'] = 'Manage Booking';
        $this->load->view('backend/index', $page_data);
    }

    function sponsor(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'managesponsor';
        $page_data['page_title'] = 'Manage Sponsor';
        $this->load->view('backend/index', $page_data);
    }

    function carousel(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'managecarousel';
        $page_data['page_title'] = 'Manage Carousel';
        $this->load->view('backend/index', $page_data);
    }

    function contactus(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'managecontactus';
        $page_data['page_title'] = 'Manage Contact Us';
        $this->load->view('backend/index', $page_data);
    }

    function menu(){
        

        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'managemenu';
        $page_data['page_title'] = 'Manage Employees';
        $this->load->view('backend/index', $page_data);
    }

    function testimonial($param1=" "){
        

        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'managetestimonial';
        $page_data['page_title'] = 'Manage Testimonial';
        $this->load->view('backend/index', $page_data);

        if($param1 == "update"){
            $id = $this->input->post('id');
            if($this->input->post('name') != ""){
            $data['name'] = $this->input->post('name');}
            if($this->input->post('type') != ""){
            $data['type'] = $this->input->post('type');}
            if($this->input->post('testimonial') != ""){
                $data['testimonial'] = $this->input->post('testimonial');}
            $data['date'] = date('Y-m-d h:i:s a');
            $curimage = $this->db->get_where('testimonial', array('id' => $id))->row()->image;
            if($curimage == ""){
                $curimage = $this->input->post('image')."".date('dmy_his');
            }else{
                $trim = $_FILES['image']['name'];
                $trim = substr($trim, -4);
                if($trim == ".png"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == ".jpg"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == "jpeg"){
                    $curimage = substr($curimage, 0, -5);}
            }
            if($_FILES['image']['name'] != ""){
                $config = array(
                    'imagename' => "0",
                    'upload_path' => "./uploads/testimonial/", //This is the directory where the file will be uploaded to
                    'allowed_types' => "jpg|png|jpeg",  //this is the acceptable file type
                    'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                    'remove_spaces' => TRUE, //removing space in the name of uploaded file
                    'file_name' => $curimage, //The name of the file
                    'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    );
        
                    $this->load->library('upload', $config);  //initializing the "upload" library
                    $this->upload->initialize($config);   // loading the array for uploading the file
                    if($this->upload->do_upload('image')){
                        $img = $_FILES['image']['name'];
                        $img = substr($img, -4);
                        if($img == ".png"){
                        $data['image'] = $config['file_name'].".png";}
                        elseif($img == ".jpg"){
                            $data['image'] = $config['file_name'].".jpg";}
                        elseif($img == "jpeg"){
                            $data['image'] = $config['file_name'].".jpeg";}
                    } }

            // print_r($data);

            // print_r($_FILES['image']['name'] != "");
            
            $this->db->where('id', $id);
            $this->db->update('testimonial', $data); 
            // echo '<script>alert("Successfully Edited Testimonial")</script>';
            // redirect(base_url() . 'admin/testimonial', 'refresh');
            echo "<script>alert('Updated');
                window.location.href='".base_url()."admin/testimonial';</script>";
        }
    }

    function menu1(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'managemenu1';
        $page_data['page_title'] = 'Manage Programmes Menu';
        $this->load->view('backend/index', $page_data);
    }

    function addproject(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addprojects';
        $page_data['page_title'] = 'Add Projects';
        $this->load->view('backend/index', $page_data);
    }

    function addsponsor(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addsponsor';
        $page_data['page_title'] = 'Add Sponsor';
        $this->load->view('backend/index', $page_data);
    }

    function addpopup(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addpopup';
        $page_data['page_title'] = 'Add Notifications';
        $this->load->view('backend/index', $page_data);
    }

    function addteam(){
        
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addteam';
        $page_data['page_title'] = 'Add Team';
        $this->load->view('backend/index', $page_data);
    }

    function addservice(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addservice';
        $page_data['page_title'] = 'Add Service';
        $this->load->view('backend/index', $page_data);
    }

    function addprogrammes(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addprogramme';
        $page_data['page_title'] = 'Add Programme';
        $this->load->view('backend/index', $page_data);
    }

    function addmenu(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addmenu';
        $page_data['page_title'] = 'Add Menu';
        $this->load->view('backend/index', $page_data);
    }

    function addmenu1(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addmenu1';
        $page_data['page_title'] = 'Add Menu';
        $this->load->view('backend/index', $page_data);
    }

    function aboutusEdit($param1=" "){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['project_id'] = $param1;
        $page_data['page_name']  = 'editaboutus';
        $page_data['page_title'] = 'Edit About Us';
        $this->load->view('backend/index', $page_data);
    }

    function addcarousel(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addcarousel';
        $page_data['page_title'] = 'Add Carousel';
        $this->load->view('backend/index', $page_data);
    }

    function addevent(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addevent';
        $page_data['page_title'] = 'Add Update & Event';
        $this->load->view('backend/index', $page_data);
    }

    function events(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'manageevents';
        $page_data['page_title'] = 'Manage Updates & Events';
        $this->load->view('backend/index', $page_data);
    }

    function add(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'add';
        $page_data['page_title'] = 'Add Menu';
        $this->load->view('backend/index', $page_data);
    }

    function addaboutus(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addaboutus';
        $page_data['page_title'] = 'Add About Us';
        $this->load->view('backend/index', $page_data);
    }

    function addadmin(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'addadmin';
        $page_data['page_title'] = 'Add Admin';
        $this->load->view('backend/index', $page_data);
    }

    function admin(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'manageadmin';
        $page_data['page_title'] = 'Add Admin';
        $this->load->view('backend/index', $page_data);
    }

    function admin_dashboard(){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('Admin-Dashboard');
        $this->load->view('backend/index', $page_data);
        // $this->load->view('backend/admin/navigation');
    }

    function aboutus($param1 = ""){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        if($param1 == ""){
            $page_data['page_name']  = 'manageaboutus';
            $page_data['page_title'] = "Manage About Us";
            $this->load->view('backend/index', $page_data);
        }

        if($param1 == "create"){
            $data['name'] = $this->input->post('name');
            $data['description'] = $this->input->post('descriptionEng');
            $data['nameKin'] = $this->input->post('nameKin');
            $data['descriptionKin'] = $this->input->post('descriptionKin');
            $data['date'] = date('Y-m-d h:i:s a');
            $this->db->insert('aboutus', $data);
            redirect(base_url() . 'admin/aboutus', 'refresh');
        }

        if($param1 == "update"){
            $id = $this->input->post('id');
            if($this->input->post('name') != ""){
            $data['name'] = $this->input->post('name');}
            if($this->input->post('nameKin') != ""){
                $data['nameKin'] = $this->input->post('nameKin');}
            if($this->input->post('descriptionEng') != ""){
                $data['description'] = $this->input->post('descriptionEng');}
            if($this->input->post('descriptionKin') != ""){
                $data['descriptionKin'] = $this->input->post('descriptionKin');}
            $data['date'] = date('Y-m-d h:i:s a');
        
            $this->db->where('id', $id);
            $this->db->update('aboutus', $data); 
            // echo '<script>alert("Successfully About Us Content")</script>';
            // redirect(base_url() . 'admin/aboutus', 'refresh');
            echo "<script>alert('Updated');
                window.location.href='".base_url()."admin/aboutus';</script>";
        }
    }

    function admins($param1 = ""){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        if($param1 == ""){
            $page_data['page_name']  = 'manageaboutus';
            $page_data['page_title'] = "Manage About Us";
            $this->load->view('backend/index', $page_data);
        }

        if($param1 == "create"){
            if($this->input->post('password') != $this->input->post('confirmpassword')){
                // echo '<script>alert("Both Passwords Do Not Match, Please Try Again")</script>';
                // redirect(base_url() . 'admin/admin', 'refresh');
                echo "<script>alert('Both Passwords do not match, Please Try Again');
                window.location.href='".base_url()."admin/admin';</script>";
            }
            $data['name'] = $this->input->post('name');
            $data['username'] = $this->input->post('username');
            $data['password'] = sha1($this->input->post('password'));
            $data['date'] = date('Y-m-d h:i:s a');
            $this->db->insert('admin', $data);
            redirect(base_url() . 'admin/admin', 'refresh');
        }

        if($param1 == "update"){
            $id = $this->input->post('id');
            if($this->input->post('name') != ""){
            $data['name'] = $this->input->post('name');}
            if($this->input->post('nameFre') != ""){
                $data['nameFre'] = $this->input->post('nameFre');}
            if($this->input->post('nameKin') != ""){
                $data['nameKin'] = $this->input->post('nameKin');}
            if($this->input->post('description') != ""){
                $data['description'] = $this->input->post('description');}
            if($this->input->post('descriptionFre') != ""){
                $data['descriptionFre'] = $this->input->post('descriptionFre');}
            if($this->input->post('descriptionKin') != ""){
                $data['descriptionKin'] = $this->input->post('descriptionKin');}
            $data['date'] = date('Y-m-d h:i:s a');
        
            $this->db->where('id', $id);
            $this->db->update('aboutus', $data); 
            // echo '<script>alert("Successfully About Us Content")</script>';
            // redirect(base_url() . 'admin/aboutus', 'refresh');
            echo "<script>alert('Updated');
            window.location.href='".base_url()."admin/aboutus';</script>";
        }
    }


	function uploadProfilePic() {
        $folderPath = 'uploads/';

        $image_parts = explode(";base64,", $_POST['image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file_name = "image"."_".rand(9999, 99999)."_".date('Ymdhi');
        $file = $folderPath . $file_name . '.png';
    
        file_put_contents($file, $image_base64);

        // Insert image to db
        $new_user_info = $this->session->userdata;   
        $this_user = ($new_user_info['logged_in_user']);
        $my_id = $this_user['user_id'];

        $image_to_be_inserted['user_id']=$my_id;
        $image_to_be_inserted['image_url'] = $file_name.'.png';

        $this->db->insert('images', $image_to_be_inserted);        
        // End of inserting image to db

        // Update query
        $this->db->set('user_image', $file_name.'.png');
        $this->db->where('user_id', $my_id);
        $this->db->update('users'); // gives UPDATE `users` SET `user_name` = `$username` WHERE `user_id` = $my_id
        // End of Update query

        echo json_encode(["image uploaded successfully."]);

        }


    function teamEngine($param1 = ""){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        if($param1 == ""){
            $page_data['page_name']  = 'movies';
            $page_data['page_title'] = "Manage movies";
            $this->load->view('backend/index', $page_data);
        }

        if($param1 == "create"){
            $data['name'] = $this->input->post('name');
            $data['description'] = $this->input->post('descriptionEng');
            $data['descriptionKin'] = $this->input->post('descriptionKin');
            $data['job'] = $this->input->post('job');
            $data['phone'] = $this->input->post('phone');
            $data['email'] = $this->input->post('email');
            $data['date'] = date('Y-m-d h:i:s a');
            $config = array(
                'imagename' => "0",
                'upload_path' => "./uploads/team/", //This is the directory where the file will be uploaded to
                'allowed_types' => "png|jpg|jpeg",  //this is the acceptable file type
                'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                'remove_spaces' => TRUE, //removing space in the name of uploaded file
                'file_name' => $this->input->post('imagename')."".date('dmy_his'), //The name of the file
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                );
    
                $this->load->library('upload', $config);  //initializing the "upload" library
                $this->upload->initialize($config);   // loading the array for uploading the file
                if($this->upload->do_upload('image')){
                    $img = $_FILES['image']['name'];
                    $img = substr($img, -4);
                    if($img == ".png"){
                    $data['image'] = $config['file_name'].".png";}
                    elseif($img == ".jpg"){
                        $data['image'] = $config['file_name'].".jpg";}
                    elseif($img == "jpeg"){
                        $data['image'] = $config['file_name'].".jpeg";}
                }
            // print_r($data);
            $this->db->insert('team', $data);
            $id = $this->db->insert_id();
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/team/' . $id . '.png');
            redirect(base_url() . 'admin/team', 'refresh');
        }

        if($param1 == "update"){
            $id = $this->input->post('id');
            if($this->input->post('name') != ""){
            $data['name'] = $this->input->post('name');}
            if($this->input->post('description') != ""){
                $data['description'] = $this->input->post('description');}
            if($this->input->post('descriptionKin') != ""){
                $data['descriptionKin'] = $this->input->post('descriptionKin');}
            if($this->input->post('job') != ""){
                $data['job'] = $this->input->post('job');}
            if($this->input->post('phone') != ""){
                $data['phone'] = $this->input->post('phone');}
            if($this->input->post('email') != ""){
                $data['email'] = $this->input->post('email');}
            $data['date'] = date('Y-m-d h:i:s a');
            $curimage = $this->db->get_where('team', array('id' => $id))->row()->image;
            if($_FILES['image']['name'] != ""){
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/team/' . $id . '.png');
            redirect(base_url() . 'admin/team', 'refresh');
                }
            // print_r($_FILES['image']['name'] != "");
            
            $this->db->where('id', $id);
            $this->db->update('team', $data); 
            // echo '<script>alert("Successfully Updated Team Member Details")</script>';
            // redirect(base_url() . 'admin/team', 'refresh');

            echo "<script>alert('Staff member details updated');
                window.location.href='".base_url()."admin/team';</script>";
        }
    }

    function popup(){
        $data['popup'] = $this->input->post('popup');
        $data['date_from'] = $this->input->post('date_from');
        $data['date_to'] = $this->input->post('date_to');
        $this->db->insert('popup', $data);
        redirect(base_url() . 'admin/notifications', 'refresh');
    }

    function sponsors($param1 = ""){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');

        if($param1 == "create"){
            $data['name'] = $this->input->post('name');
            $data['date'] = date('Y-m-d h:i:s a');
            $config = array(
                'imagename' => "0",
                'upload_path' => "./uploads/sponsor/", //This is the directory where the file will be uploaded to
                'allowed_types' => "png|jpg|jpeg",  //this is the acceptable file type
                'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                'remove_spaces' => TRUE, //removing space in the name of uploaded file
                'file_name' => $this->input->post('imagename')."".date('dmy_his'), //The name of the file
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                );
    
                $this->load->library('upload', $config);  //initializing the "upload" library
                $this->upload->initialize($config);   // loading the array for uploading the file
                if($this->upload->do_upload('image')){
                    $img = $_FILES['image']['name'];
                    $img = substr($img, -4);
                    if($img == ".png"){
                    $data['image'] = $config['file_name'].".png";}
                    elseif($img == ".jpg"){
                        $data['image'] = $config['file_name'].".jpg";}
                    elseif($img == "jpeg"){
                        $data['image'] = $config['file_name'].".jpeg";}
                }
            $this->db->insert('sponsor', $data);
            redirect(base_url() . 'admin/sponsor', 'refresh');
        }

        if($param1 == "update"){
            $id = $this->input->post('id');
            if($this->input->post('name') != ""){
            $data['name'] = $this->input->post('name');}
            $data['date'] = date('Y-m-d h:i:s a');
            $curimage = $this->db->get_where('sponsor', array('id' => $id))->row()->image;
            if($curimage == ""){
                $curimage = $this->input->post('image')."".date('dmy_his');
            }else{
                $trim = $_FILES['image']['name'];
                $trim = substr($trim, -4);
                if($trim == ".png"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == ".jpg"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == "jpeg"){
                    $curimage = substr($curimage, 0, -5);}
            }
            if($_FILES['image']['name'] != ""){
                $config = array(
                    'imagename' => "0",
                    'upload_path' => "./uploads/sponsor/", //This is the directory where the file will be uploaded to
                    'allowed_types' => "jpg|png",  //this is the acceptable file type
                    'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                    'remove_spaces' => TRUE, //removing space in the name of uploaded file
                    'file_name' => $curimage, //The name of the file
                    'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    );
        
                    $this->load->library('upload', $config);  //initializing the "upload" library
                    $this->upload->initialize($config);   // loading the array for uploading the file
                    if($this->upload->do_upload('image')){
                        $img = $_FILES['image']['name'];
                        $img = substr($img, -4);
                        if($img == ".png"){
                        $data['image'] = $config['file_name'].".png";}
                        elseif($img == ".jpg"){
                            $data['image'] = $config['file_name'].".jpg";}
                        elseif($img == "jpeg"){
                            $data['image'] = $config['file_name'].".jpeg";}
                    } }
            // print_r($_FILES['image']['name'] != "");
            
            $this->db->where('id', $id);
            $this->db->update('sponsor', $data); 
            // echo '<script>alert("Successfully Edited Sponsor")</script>';
            // redirect(base_url() . 'admin/sponsor', 'refresh');

            echo "<script>alert('Updated');
                window.location.href='".base_url()."admin/sponsor';</script>";
        }
    }

    function carousels($param1 = ""){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        if($param1 == ""){
            $page_data['page_name']  = 'movies';
            $page_data['page_title'] = "Manage movies";
            $this->load->view('backend/index', $page_data);
        }

        if($param1 == "create"){
            $data['name'] = $this->input->post('name');
            $data['freName'] = $this->input->post('freName');
            $data['kinName'] = $this->input->post('kinName');
            $data['linkadd'] = $this->input->post('linkadd');
            $data['description'] = $this->input->post('description');
            $data['freDescription'] = $this->input->post('freDescription');
            $data['kinDescription'] = $this->input->post('kinDescription');
            $data['link'] = $this->input->post('link');
            $data['date'] = date('Y-m-d h:i:s a');
            $config = array(
                'imagename' => "0",
                'upload_path' => "./uploads/carousel/", //This is the directory where the file will be uploaded to
                'allowed_types' => "png|jpg|jpeg",  //this is the acceptable file type
                'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                'remove_spaces' => TRUE, //removing space in the name of uploaded file
                'file_name' => $this->input->post('imagename')."".date('dmy_his'), //The name of the file
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                );
    
                $this->load->library('upload', $config);  //initializing the "upload" library
                $this->upload->initialize($config);   // loading the array for uploading the file
                if($this->upload->do_upload('image')){
                    $img = $_FILES['image']['name'];
                    $img = substr($img, -4);
                    if($img == ".png"){
                    $data['image'] = $config['file_name'].".png";}
                    elseif($img == ".jpg"){
                        $data['image'] = $config['file_name'].".jpg";}
                    elseif($img == "jpeg"){
                        $data['image'] = $config['file_name'].".jpeg";}
                }
            // print_r($data);
            $this->db->insert('carousel', $data);
            redirect(base_url() . 'admin/carousel', 'refresh');
        }

        if($param1 == "update"){
            $id = $this->input->post('id');
            if($this->input->post('name') != ""){
            $data['name'] = $this->input->post('name');}
            if($this->input->post('freName') != ""){
                $data['freName'] = $this->input->post('freName');}
            if($this->input->post('kinName') != ""){
                $data['kinName'] = $this->input->post('kinName');}
            if($this->input->post('description') != ""){
                $data['description'] = $this->input->post('description');}
            if($this->input->post('linkadd') != ""){
                $data['linkadd'] = $this->input->post('linkadd');}
            if($this->input->post('freDescription') != ""){
                $data['freDescription'] = $this->input->post('freDescription');}
            if($this->input->post('kinDescription') != ""){
                $data['kinDescription'] = $this->input->post('kinDescription');}
            if($this->input->post('link') != ""){
                $data['link'] = $this->input->post('link');}
            $data['date'] = date('Y-m-d h:i:s a');
            $curimage = $this->db->get_where('carousel', array('id' => $id))->row()->image;
            if($curimage == ""){
                $curimage = $this->input->post('image')."".date('dmy_his');
            }else{
                $trim = $_FILES['image']['name'];
                $trim = substr($trim, -4);
                if($trim == ".png"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == ".jpg"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == "jpeg"){
                    $curimage = substr($curimage, 0, -5);}
            }
            if($_FILES['image']['name'] != ""){
                $config = array(
                    'imagename' => "0",
                    'upload_path' => "./uploads/carousel/", //This is the directory where the file will be uploaded to
                    'allowed_types' => "jpg|png|jpeg",  //this is the acceptable file type
                    'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                    'remove_spaces' => TRUE, //removing space in the name of uploaded file
                    'file_name' => $curimage, //The name of the file
                    'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    );
        
                    $this->load->library('upload', $config);  //initializing the "upload" library
                    $this->upload->initialize($config);   // loading the array for uploading the file
                    if($this->upload->do_upload('image')){
                        $img = $_FILES['image']['name'];
                        $img = substr($img, -4);
                        if($img == ".png"){
                        $data['image'] = $config['file_name'].".png";}
                        elseif($img == ".jpg"){
                            $data['image'] = $config['file_name'].".jpg";}
                        elseif($img == "jpeg"){
                            $data['image'] = $config['file_name'].".jpeg";}
                    } }
            // print_r($_FILES['image']['name'] != "");
            
            $this->db->where('id', $id);
            $this->db->update('carousel', $data); 
            // echo '<script>alert("Successfully Edited Carousel")</script>';
            // redirect(base_url() . 'admin/carousel', 'refresh');
            echo "<script>alert('Updated');
                window.location.href='".base_url()."admin/carousel';</script>";
        }
    }
    function gallery($param1 = "", $param2 = "", $param3 = ""){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');

        if($param1 == 'create'){
            $data['name'] = $this->input->post('name');
            $this->db->insert('gallery', $data);
            $id = $this->db->insert_id();
            move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/gallery/' . $id . '.png');
        }
        if($param1 == 'approve'){
            $data['status'] = $param3;
            $this->db->where('id', $param2);
            $this->db->update('gallery', $data);
        }
        if($param1 == 'delete'){
            $data['status'] = $param3;
            $this->db->where('id', $param2);
            $this->db->delete('gallery');
        }
           $page_data['page_name']  = 'gallery';
           $page_data['page_title'] = "Manage gallery";
           $this->load->view('backend/index', $page_data);
    }

    function eventsupdates($param1 = ""){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        if($param1 == ""){
            $page_data['page_name']  = 'movies';
            $page_data['page_title'] = "Manage movies";
            $this->load->view('backend/index', $page_data);
        }

        if($param1 == "create"){
            $data['name'] = $this->input->post('name');
            $data['nameKin'] = $this->input->post('nameKin');
            $data['shortDesc'] = $this->input->post('shortDesc');
            $data['shortDescKin'] = $this->input->post('shortDescKin');
            $data['description'] = $this->input->post('descriptionEng');
            $data['descriptionKin'] = $this->input->post('descriptionKin');
            $data['date'] = date('Y-m-d h:i:s a');
            $config = array(
                'imagename' => "0",
                'upload_path' => "./uploads/events/", //This is the directory where the file will be uploaded to
                'allowed_types' => "png|jpg|jpeg",  //this is the acceptable file type
                'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                'remove_spaces' => TRUE, //removing space in the name of uploaded file
                'file_name' => $this->input->post('imagename')."".date('dmy_his'), //The name of the file
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                );
    
                $this->load->library('upload', $config);  //initializing the "upload" library
                $this->upload->initialize($config);   // loading the array for uploading the file
                if($this->upload->do_upload('image')){
                    $img = $_FILES['image']['name'];
                    $img = substr($img, -4);
                    if($img == ".png"){
                    $data['image'] = $config['file_name'].".png";}
                    elseif($img == ".jpg"){
                        $data['image'] = $config['file_name'].".jpg";}
                    elseif($img == "jpeg"){
                        $data['image'] = $config['file_name'].".jpeg";}
                }
            // print_r($data);
            $this->db->insert('events', $data);
            redirect(base_url() . 'admin/events', 'refresh');
        }

        if($param1 == "update"){
            $id = $this->input->post('id');
            if($this->input->post('nameKin') != ""){
                $data['nameKin'] = $this->input->post('nameKin');}
            if($this->input->post('name') != ""){
                $data['name'] = $this->input->post('name');}
            if($this->input->post('shortDesc') != ""){
                $data['shortDesc'] = $this->input->post('shortDesc');}
            if($this->input->post('shortDescKin') != ""){
                $data['shortDescKin'] = $this->input->post('shortDescKin');}
            if($this->input->post('description') != ""){
            $data['description'] = $this->input->post('description');}
            if($this->input->post('descriptionKin') != ""){
                $data['descriptionKin'] = $this->input->post('descriptionKin');}
            $data['date'] = date('Y-m-d h:i:s a');
            $curimage = $this->db->get_where('events', array('id' => $id))->row()->image;
            if($curimage == ""){
                $curimage = $this->input->post('image')."".date('dmy_his');
            }else{
                $trim = $_FILES['image']['name'];
                $trim = substr($trim, -4);
                if($trim == ".png"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == ".jpg"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == "jpeg"){
                    $curimage = substr($curimage, 0, -5);}
            }
            if($_FILES['image']['name'] != ""){
                $config = array(
                    'imagename' => "0",
                    'upload_path' => "./uploads/events/", //This is the directory where the file will be uploaded to
                    'allowed_types' => "jpg|png|jpeg",  //this is the acceptable file type
                    'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                    'remove_spaces' => TRUE, //removing space in the name of uploaded file
                    'file_name' => $curimage, //The name of the file
                    'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    );
        
                    $this->load->library('upload', $config);  //initializing the "upload" library
                    $this->upload->initialize($config);   // loading the array for uploading the file
                    if($this->upload->do_upload('image')){
                        $img = $_FILES['image']['name'];
                        $img = substr($img, -4);
                        if($img == ".png"){
                        $data['image'] = $config['file_name'].".png";}
                        elseif($img == ".jpg"){
                            $data['image'] = $config['file_name'].".jpg";}
                        elseif($img == "jpeg"){
                            $data['image'] = $config['file_name'].".jpeg";}
                    } }
            
            $this->db->where('id', $id);
            $this->db->update('events', $data); 
            // echo '<script>alert("Successfully Edited Events")</script>';
            // redirect(base_url() . 'admin/events', 'refresh');
            echo "<script>alert('Updated');
                window.location.href='".base_url()."admin/events';</script>";
        }
    }

    function menus($param1 = ""){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        if($param1 == ""){
            $page_data['page_name']  = 'movies';
            $page_data['page_title'] = "Manage movies";
            $this->load->view('backend/index', $page_data);
        }

        if($param1 == "create"){
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['phone'] = $this->input->post('phone');
            $data['worklocation'] = $this->input->post('worklocation');
            $data['plancoverage'] = $this->input->post('plancoverage');
            $data['date'] = date('Y-m-d h:i:s a');
            // print_r($data);
            $this->db->insert('employees', $data);
            redirect(base_url() . 'admin/menu', 'refresh');
        }

        if($param1 == "update"){
            $id = $this->input->post('id');
            if($this->input->post('name') != ""){
                $data['name'] = $this->input->post('name');}
            if($this->input->post('email') != ""){
                $data['email'] = $this->input->post('email');}
            if($this->input->post('phone') != ""){
            $data['phone'] = $this->input->post('phone');}
            if($this->input->post('worklocation') != ""){
                $data['worklocation'] = $this->input->post('worklocation');}
            if($this->input->post('plancoverage') != ""){
                $data['plancoverage'] = $this->input->post('plancoverage');}
            $data['date'] = date('Y-m-d h:i:s a');
            $this->db->where('id', $id);
            $this->db->update('employees', $data); 
            // echo '<script>alert("Successfully Edited Menu")</script>';
            // redirect(base_url() . 'admin/menu', 'refresh');
            echo "<script>alert('Updated');
                window.location.href='".base_url()."admin/menu';</script>";
        }
    }

    function menus1($param1 = ""){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        if($param1 == ""){
            $page_data['page_name']  = 'movies';
            $page_data['page_title'] = "Manage movies";
            $this->load->view('backend/index', $page_data);
        }

        if($param1 == "create"){
            $data['name'] = $this->input->post('name');
            $data['nameFre'] = $this->input->post('nameFre');
            $data['nameKin'] = $this->input->post('nameKin');
            $data['description'] = $this->input->post('descriptionEng');
            $data['descriptionFre'] = $this->input->post('descriptionFre');
            $data['descriptionKin'] = $this->input->post('descriptionKin');
            $data['remain'] = $this->input->post('remain');
            $data['price'] = $this->input->post('price');
            $data['categoryName'] = $this->input->post('categoryName');
            $data['paymentDuration'] = $this->input->post('paymentDuration');
            $data['paymentDurationFre'] = $this->input->post('paymentDurationFre');
            $data['paymentDurationKin'] = $this->input->post('paymentDurationKin');
            $data['subCategory'] = $this->input->post('subCategory');
            $data['feature'] = $this->input->post('feature');
            $data['featureFre'] = $this->input->post('featureFre');
            $data['featureKin'] = $this->input->post('featureKin');
            $data['feature1'] = $this->input->post('feature1');
            $data['feature1Fre'] = $this->input->post('feature1Fre');
            $data['feature1Kin'] = $this->input->post('feature1Kin');
            $data['feature2'] = $this->input->post('feature2');
            $data['feature2Fre'] = $this->input->post('feature2Fre');
            $data['feature2Kin'] = $this->input->post('feature2Kin');
            $data['feature3'] = $this->input->post('feature3');
            $data['feature3Fre'] = $this->input->post('feature3Fre');
            $data['feature3Kin'] = $this->input->post('feature3Kin');
            $data['feature4'] = $this->input->post('feature4');
            $data['feature4Fre'] = $this->input->post('feature4Fre');
            $data['feature4Kin'] = $this->input->post('feature4Kin');
            $data['feature5'] = $this->input->post('feature5');
            $data['feature5Fre'] = $this->input->post('feature5Fre');
            $data['feature5Kin'] = $this->input->post('feature5Kin');
            $data['date'] = date('Y-m-d h:i:s a');
            $config = array(
                'imagename' => "0",
                'upload_path' => "./uploads/menu/", //This is the directory where the file will be uploaded to
                'allowed_types' => "png|jpg|jpeg",  //this is the acceptable file type
                'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                'remove_spaces' => TRUE, //removing space in the name of uploaded file
                'file_name' => $this->input->post('imagename')."".date('dmy_his'), //The name of the file
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                );
    
                $this->load->library('upload', $config);  //initializing the "upload" library
                $this->upload->initialize($config);   // loading the array for uploading the file
                if($this->upload->do_upload('image')){
                    $img = $_FILES['image']['name'];
                    $img = substr($img, -4);
                    if($img == ".png"){
                    $data['image'] = $config['file_name'].".png";}
                    elseif($img == ".jpg"){
                        $data['image'] = $config['file_name'].".jpg";}
                    elseif($img == "jpeg"){
                        $data['image'] = $config['file_name'].".jpeg";}
                }
            // print_r($data);
            $this->db->insert('menu', $data);
            redirect(base_url() . 'admin/menu1', 'refresh');
        }

        if($param1 == "update"){
            $id = $this->input->post('id');
            if($this->input->post('name') != ""){
                $data['name'] = $this->input->post('name');}
            if($this->input->post('nameFre') != ""){
                $data['nameFre'] = $this->input->post('nameFre');}
            if($this->input->post('nameKin') != ""){
                $data['nameKin'] = $this->input->post('nameKin');}
            if($this->input->post('remain') != ""){
            $data['remain'] = $this->input->post('remain');}
            if($this->input->post('descriptionEng') != ""){
                $data['description'] = $this->input->post('descriptionEng');}
            if($this->input->post('descriptionFre') != ""){
                $data['descriptionFre'] = $this->input->post('descriptionFre');}
            if($this->input->post('descriptionKin') != ""){
                $data['descriptionKin'] = $this->input->post('descriptionKin');}
            if($this->input->post('price') != ""){
                $data['price'] = $this->input->post('price');}
            if($this->input->post('paymentDuration') != ""){
                $data['paymentDuration'] = $this->input->post('paymentDuration');}
            if($this->input->post('paymentDurationFre') != ""){
                $data['paymentDurationFre'] = $this->input->post('paymentDurationFre');}
            if($this->input->post('paymentDurationKin') != ""){
                $data['paymentDurationKin'] = $this->input->post('paymentDurationKin');}
            if($this->input->post('subCategory') != ""){
                $data['subCategory'] = $this->input->post('subCategory');}
            if($this->input->post('feature') != ""){
                $data['feature'] = $this->input->post('feature');}
            if($this->input->post('featureFre') != ""){
                $data['featureFre'] = $this->input->post('featureFre');}
            if($this->input->post('featureFreKin') != ""){
                $data['featureKin'] = $this->input->post('featureKin');}
            if($this->input->post('feature1') != ""){
                $data['feature1'] = $this->input->post('feature1');}
            if($this->input->post('feature1Fre') != ""){
                $data['feature1Fre'] = $this->input->post('feature1Fre');}
            if($this->input->post('feature1Kin') != ""){
                $data['feature1Kin'] = $this->input->post('feature1Kin');}
            if($this->input->post('feature2Fre') != ""){
                $data['feature2Fre'] = $this->input->post('feature2Fre');}
            if($this->input->post('feature2Kin') != ""){
                $data['feature2Kin'] = $this->input->post('feature2Kin');}
            if($this->input->post('feature2') != ""){
                $data['feature2'] = $this->input->post('feature2');}
            if($this->input->post('feature3') != ""){
                $data['feature3'] = $this->input->post('feature3');}
            if($this->input->post('feature3Fre') != ""){
                $data['feature3Fre'] = $this->input->post('feature3Fre');}
            if($this->input->post('feature3Kin') != ""){
                $data['feature3Kin'] = $this->input->post('feature3Kin');}
            if($this->input->post('feature4') != ""){
                $data['feature4'] = $this->input->post('feature4');}
            if($this->input->post('feature4Fre') != ""){
                $data['feature4Fre'] = $this->input->post('feature4Fre');}
            if($this->input->post('feature4Kin') != ""){
                $data['feature4Kin'] = $this->input->post('feature4Kin');}
            if($this->input->post('feature5') != ""){
                $data['feature5'] = $this->input->post('feature5');}
            if($this->input->post('feature5Fre') != ""){
                $data['feature5Fre'] = $this->input->post('feature5Fre');}
            if($this->input->post('feature5Kin') != ""){
                $data['feature5Kin'] = $this->input->post('feature5Kin');}
            $data['date'] = date('Y-m-d h:i:s a');
            $curimage = $this->db->get_where('menu', array('id' => $id))->row()->image;
            if($curimage == ""){
                $curimage = $this->input->post('image')."".date('dmy_his');
            }else{
                $trim = $_FILES['image']['name'];
                $trim = substr($trim, -4);
                if($trim == ".png"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == ".jpg"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == "jpeg"){
                    $curimage = substr($curimage, 0, -5);}
            }
            if($_FILES['image']['name'] != ""){
                $config = array(
                    'imagename' => "0",
                    'upload_path' => "./uploads/menu/", //This is the directory where the file will be uploaded to
                    'allowed_types' => "jpg|png|jpeg",  //this is the acceptable file type
                    'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                    'remove_spaces' => TRUE, //removing space in the name of uploaded file
                    'file_name' => $curimage, //The name of the file
                    'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    );
        
                    $this->load->library('upload', $config);  //initializing the "upload" library
                    $this->upload->initialize($config);   // loading the array for uploading the file
                    if($this->upload->do_upload('image')){
                        $img = $_FILES['image']['name'];
                        $img = substr($img, -4);
                        if($img == ".png"){
                        $data['image'] = $config['file_name'].".png";}
                        elseif($img == ".jpg"){
                            $data['image'] = $config['file_name'].".jpg";}
                        elseif($img == "jpeg"){
                            $data['image'] = $config['file_name'].".jpeg";}
                    } }       
                    
            // print_r($data);
            $this->db->where('id', $id);
            $this->db->update('menu', $data); 
            // echo '<script>alert("Successfully Edited Menu")</script>';
            // redirect(base_url() . 'admin/menu1', 'refresh');
            echo "<script>alert('Updated');
            window.location.href='".base_url()."admin/menu1';</script>";
        }
    }


    function service($param1 = ""){
        //if ($this->session->userdata('admin_login') != 1)
   //         redirect(base_url() . 'Login', 'refresh');
        if($param1 == ""){
            $page_data['page_name']  = 'movies';
            $page_data['page_title'] = "Manage movies";
            $this->load->view('backend/index', $page_data);
        }

        if($param1 == "create"){
            $data['name'] = $this->input->post('name');
            $data['nameFre'] = $this->input->post('nameFre');
            $data['nameKin'] = $this->input->post('nameKin');
            $data['shortDesc'] = $this->input->post('shortDesc');
            $data['shortDescFre'] = $this->input->post('shortDescFre');
            $data['shortDescKin'] = $this->input->post('shortDescKin');
            $data['description'] = $this->input->post('descriptionEng');
            $data['descriptionFre'] = $this->input->post('descriptionFre');
            $data['descriptionKin'] = $this->input->post('descriptionKin');
            $data['date'] = date('Y-m-d h:i:s a');
            $config = array(
                'imagename' => "0",
                'upload_path' => "./uploads/services/", //This is the directory where the file will be uploaded to
                'allowed_types' => "png|jpg|jpeg",  //this is the acceptable file type
                'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                'remove_spaces' => TRUE, //removing space in the name of uploaded file
                'file_name' => $this->input->post('imagename')."".date('dmy_his'), //The name of the file
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                );
    
                $this->load->library('upload', $config);  //initializing the "upload" library
                $this->upload->initialize($config);   // loading the array for uploading the file
                if($this->upload->do_upload('image')){
                    $img = $_FILES['image']['name'];
                    $img = substr($img, -4);
                    if($img == ".png"){
                    $data['image'] = $config['file_name'].".png";}
                    elseif($img == ".jpg"){
                        $data['image'] = $config['file_name'].".jpg";}
                    elseif($img == "jpeg"){
                        $data['image'] = $config['file_name'].".jpeg";}
                }
            // print_r($data);
            $this->db->insert('services', $data);
            redirect(base_url() . 'admin/services', 'refresh');
        }

        if($param1 == "update"){
            $id = $this->input->post('id');
            if($this->input->post('nameFre') != ""){
            $data['nameFre'] = $this->input->post('nameFre');}
            if($this->input->post('nameKin') != ""){
                $data['nameKin'] = $this->input->post('nameKin');}
            if($this->input->post('name') != ""){
                $data['name'] = $this->input->post('name');}
            if($this->input->post('shortDesc') != ""){
                $data['shortDesc'] = $this->input->post('shortDesc');}
            if($this->input->post('shortDescFre') != ""){
                $data['shortDescFre'] = $this->input->post('shortDescFre');}
            if($this->input->post('shortDescKin') != ""){
                $data['shortDescKin'] = $this->input->post('shortDescKin');}
            if($this->input->post('descriptionEng') != ""){
            $data['description'] = $this->input->post('descriptionEng');}
            if($this->input->post('descriptionFre') != ""){
                $data['descriptionFre'] = $this->input->post('descriptionFre');}
            if($this->input->post('descriptionKin') != ""){
                $data['descriptionKin'] = $this->input->post('descriptionKin');}
            $data['date'] = date('Y-m-d h:i:s a');
            $curimage = $this->db->get_where('services', array('id' => $id))->row()->image;
            if($curimage == ""){
                $curimage = $this->input->post('image')."".date('dmy_his');
            }else{
                $trim = $_FILES['image']['name'];
                $trim = substr($trim, -4);
                if($trim == ".png"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == ".jpg"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == "jpeg"){
                    $curimage = substr($curimage, 0, -5);}
            }
            if($_FILES['image']['name'] != ""){
                $config = array(
                    'imagename' => "0",
                    'upload_path' => "./uploads/services/", //This is the directory where the file will be uploaded to
                    'allowed_types' => "jpg|png",  //this is the acceptable file type
                    'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                    'remove_spaces' => TRUE, //removing space in the name of uploaded file
                    'file_name' => $curimage, //The name of the file
                    'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    );
        
                    $this->load->library('upload', $config);  //initializing the "upload" library
                    $this->upload->initialize($config);   // loading the array for uploading the file
                    if($this->upload->do_upload('image')){
                        $img = $_FILES['image']['name'];
                        $img = substr($img, -4);
                        if($img == ".png"){
                        $data['image'] = $config['file_name'].".png";}
                        elseif($img == ".jpg"){
                            $data['image'] = $config['file_name'].".jpg";}
                        elseif($img == "jpeg"){
                            $data['image'] = $config['file_name'].".jpeg";}
                    } }
            // print_r($_FILES['image']['name'] != "");
            
            $this->db->where('id', $id);
            $this->db->update('services', $data); 
            // echo '<script>alert("Successfully Edited Service")</script>';
            // redirect(base_url() . 'admin/services', 'refresh');
            echo "<script>alert('Updated');
            window.location.href='".base_url()."admin/services';</script>";
        }
    }


     function programme($param1 = ""){
        //if ($this->session->userdata('admin_login') != 1)
   //         redirect(base_url() . 'Login', 'refresh');
        if($param1 == ""){
            $page_data['page_name']  = 'movies';
            $page_data['page_title'] = "Manage movies";
            $this->load->view('backend/index', $page_data);
        }
        if($param1 == "create"){
            $data['name'] = $this->input->post('name');
            $data['nameFre'] = $this->input->post('nameFre');
            $data['nameKin'] = $this->input->post('nameKin');
            $data['shortDesc'] = $this->input->post('shortDesc');
            $data['shortDescFre'] = $this->input->post('shortDescFre');
            $data['shortDescKin'] = $this->input->post('shortDescKin');
            $data['description'] = $this->input->post('descriptionEng');
            $data['descriptionFre'] = $this->input->post('descriptionFre');
            $data['descriptionKin'] = $this->input->post('descriptionKin');
            $data['date'] = date('Y-m-d h:i:s a');
            $config = array(
                'imagename' => "0",
                'upload_path' => "./uploads/programmes/", //This is the directory where the file will be uploaded to
                'allowed_types' => "png|jpg|jpeg",  //this is the acceptable file type
                'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                'remove_spaces' => TRUE, //removing space in the name of uploaded file
                'file_name' => $this->input->post('imagename')."".date('dmy_his'), //The name of the file
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                );
    
                $this->load->library('upload', $config);  //initializing the "upload" library
                $this->upload->initialize($config);   // loading the array for uploading the file
                if($this->upload->do_upload('image')){
                    $img = $_FILES['image']['name'];
                    $img = substr($img, -4);
                    if($img == ".png"){
                    $data['image'] = $config['file_name'].".png";}
                    elseif($img == ".jpg"){
                        $data['image'] = $config['file_name'].".jpg";}
                    elseif($img == "jpeg"){
                        $data['image'] = $config['file_name'].".jpeg";}
                }
            // print_r($data);
            $this->db->insert('programmes', $data);
            redirect(base_url() . 'admin/programmes', 'refresh');
        }

        if($param1 == "update"){
            $id = $this->input->post('id');
            if($this->input->post('nameFre') != ""){
            $data['nameFre'] = $this->input->post('nameFre');}
            if($this->input->post('nameKin') != ""){
                $data['nameKin'] = $this->input->post('nameKin');}
            if($this->input->post('name') != ""){
                $data['name'] = $this->input->post('name');}
            if($this->input->post('shortDesc') != ""){
                $data['shortDesc'] = $this->input->post('shortDesc');}
            if($this->input->post('shortDescFre') != ""){
                $data['shortDescFre'] = $this->input->post('shortDescFre');}
            if($this->input->post('shortDescKin') != ""){
                $data['shortDescKin'] = $this->input->post('shortDescKin');}
            if($this->input->post('descriptionEng') != ""){
            $data['description'] = $this->input->post('descriptionEng');}
            if($this->input->post('descriptionFre') != ""){
                $data['descriptionFre'] = $this->input->post('descriptionFre');}
            if($this->input->post('descriptionKin') != ""){
                $data['descriptionKin'] = $this->input->post('descriptionKin');}
            $data['date'] = date('Y-m-d h:i:s a');
            $curimage = $this->db->get_where('programmes', array('id' => $id))->row()->image;
            if($curimage == ""){
                $curimage = $this->input->post('image')."".date('dmy_his');
            }else{
                $trim = $_FILES['image']['name'];
                $trim = substr($trim, -4);
                if($trim == ".png"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == ".jpg"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == "jpeg"){
                    $curimage = substr($curimage, 0, -5);}
            }
            if($_FILES['image']['name'] != ""){
                $config = array(
                    'imagename' => "0",
                    'upload_path' => "./uploads/programmes/", //This is the directory where the file will be uploaded to
                    'allowed_types' => "jpg|png",  //this is the acceptable file type
                    'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                    'remove_spaces' => TRUE, //removing space in the name of uploaded file
                    'file_name' => $curimage, //The name of the file
                    'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    );
        
                    $this->load->library('upload', $config);  //initializing the "upload" library
                    $this->upload->initialize($config);   // loading the array for uploading the file
                    if($this->upload->do_upload('image')){
                        $img = $_FILES['image']['name'];
                        $img = substr($img, -4);
                        if($img == ".png"){
                        $data['image'] = $config['file_name'].".png";}
                        elseif($img == ".jpg"){
                            $data['image'] = $config['file_name'].".jpg";}
                        elseif($img == "jpeg"){
                            $data['image'] = $config['file_name'].".jpeg";}
                    } }            
            $this->db->where('id', $id);
            $this->db->update('programmes', $data); 
            // echo '<script>alert("Successfully Edited Programme")</script>';
            // redirect(base_url() . 'admin/programmes', 'refresh');
            echo "<script>alert('Updated');
            window.location.href='".base_url()."admin/programmes';</script>";
        }
    }


    function movies($param1 = ""){
        //if ($this->session->userdata('admin_login') != 1)
   //         redirect(base_url() . 'Login', 'refresh');
        if($param1 == ""){
            $page_data['page_name']  = 'movies';
            $page_data['page_title'] = "Manage movies";
            $this->load->view('backend/index', $page_data);
        }
        if($param1 == 'add'){
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['category'] = $this->input->post('category');
            $data['actors'] = $this->input->post('actors');
            $data['added_date'] = date('Y-m-d h:i:s a');
            $data['serie_id'] = $this->input->post('serie');
            $data['status'] = 1;
            $data['views'] = 0;
            $data['featured'] = 0;
            $data['video_url'] = $this->input->post('video_url');
            $data['trailer_url'] = $this->input->post('trailer_url');
            $data['poster_url'] = $this->input->post('poster_url');

            $chrList = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $chrRepeatMin = 1; // Minimum times to repeat the seed string
            $chrRepeatMax = 10; // Maximum times to repeat the seed string
            $chrRandomLength = 30;
            $data['rand_id'] =  substr(str_shuffle(str_repeat($chrList, mt_rand($chrRepeatMin,$chrRepeatMax))), 1, $chrRandomLength).date('mdyhis');
            // $this->db->insert('movie', $data);
            // redirect(base_url() . 'Admin/movies', 'refresh');
            print_r($data);

        }

        if($param1 == "create"){
            $data['name'] = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $data['date'] = date('Y-m-d h:i:s a');
            $config = array(
                'imagename' => "0",
                'upload_path' => "./uploads/projects/", //This is the directory where the file will be uploaded to
                'allowed_types' => "png|jpg|jpeg",  //this is the acceptable file type
                'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                'remove_spaces' => TRUE, //removing space in the name of uploaded file
                'file_name' => $this->input->post('imagename')."".date('dmy_his'), //The name of the file
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                );
    
                $this->load->library('upload', $config);  //initializing the "upload" library
                $this->upload->initialize($config);   // loading the array for uploading the file
                if($this->upload->do_upload('image')){
                    $img = $_FILES['image']['name'];
                    $img = substr($img, -4);
                    if($img == ".png"){
                    $data['image'] = $config['file_name'].".png";}
                    elseif($img == ".jpg"){
                        $data['image'] = $config['file_name'].".jpg";}
                    elseif($img == "jpeg"){
                        $data['image'] = $config['file_name'].".jpeg";}
                }
            // print_r($data);
            $this->db->insert('projects', $data);
            redirect(base_url() . 'admin/projects', 'refresh');
        }

        if($param1 == "update"){
            $id = $this->input->post('id');
            if($this->input->post('name') != ""){
            $data['name'] = $this->input->post('name');}
            if($this->input->post('description') != ""){
            $data['description'] = $this->input->post('description');}
            $data['date'] = date('Y-m-d h:i:s a');
            $curimage = $this->db->get_where('projects', array('id' => $id))->row()->image;
            if($curimage == ""){
                $curimage = $this->input->post('image')."".date('dmy_his');
            }else{
                $trim = $_FILES['image']['name'];
                $trim = substr($trim, -4);
                if($trim == ".png"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == ".jpg"){
                    $curimage = substr($curimage, 0, -4);}
                elseif($trim == "jpeg"){
                    $curimage = substr($curimage, 0, -5);}
            }
            if($_FILES['image']['name'] != ""){
                $config = array(
                    'imagename' => "0",
                    'upload_path' => "./uploads/projects/", //This is the directory where the file will be uploaded to
                    'allowed_types' => "jpg|png",  //this is the acceptable file type
                    'overwrite' => TRUE,  //In case there exists the file with the same name in the directory, do you want to overwrite it?
                    'remove_spaces' => TRUE, //removing space in the name of uploaded file
                    'file_name' => $curimage, //The name of the file
                    'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    );
        
                    $this->load->library('upload', $config);  //initializing the "upload" library
                    $this->upload->initialize($config);   // loading the array for uploading the file
                    if($this->upload->do_upload('image')){
                        $img = $_FILES['image']['name'];
                        $img = substr($img, -4);
                        if($img == ".png"){
                        $data['image'] = $config['file_name'].".png";}
                        elseif($img == ".jpg"){
                            $data['image'] = $config['file_name'].".jpg";}
                        elseif($img == "jpeg"){
                            $data['image'] = $config['file_name'].".jpeg";}
                    } }
            // print_r($_FILES['image']['name'] != "");
            
            $this->db->where('id', $id);
            $this->db->update('projects', $data); 
            // echo '<script>alert("Successfully Edited Project")</script>';
            // redirect(base_url() . 'admin/projects', 'refresh');
            echo "<script>alert('Updated');
            window.location.href='".base_url()."admin/projects';</script>";
        }
    }

    function upload_movie_files(){
        //if ($this->session->userdata('admin_login') != 1)
   //         redirect(base_url() . 'Login', 'refresh');
        // $max_size = 20480000;
        $fileName = $_FILES["file1"]["name"]; // The file name
        $fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
        $fileType = $_FILES["file1"]["type"]; // The type of file it is
        $fileSize = $_FILES["file1"]["size"]; // File size in bytes
        $fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true

        $fileName2 = $_FILES["file2"]["name"]; 
        $fileTmpLoc2 = $_FILES["file2"]["tmp_name"]; 
        $fileType2 = $_FILES["file2"]["type"]; 
        $fileSize2 = $_FILES["file2"]["size"]; 
        $fileErrorMsg2 = $_FILES["file2"]["error"];

        $fileName3 = $_FILES["file3"]["name"];
        $fileTmpLoc3 = $_FILES["file3"]["tmp_name"]; 
        $fileType3 = $_FILES["file3"]["type"]; 
        $fileSize3 = $_FILES["file3"]["size"];
        $fileErrorMsg3 = $_FILES["file3"]["error"];

        if (!$fileTmpLoc) { // if file not chosen
            echo "Video not selected";
            exit();
        }
        if (!$fileTmpLoc2) { // if file not chosen
            echo "Trailer not selected";
            exit();
        }
        if (!$fileTmpLoc2) { // if file not chosen
            echo "Poster not selected";
            exit();
        }
        if(move_uploaded_file($fileTmpLoc, "uploads/movie/$fileName") && move_uploaded_file($fileTmpLoc2, "uploads/movie/$fileName2") && move_uploaded_file($fileTmpLoc3, "uploads/movie/$fileName3")){

            $data['video_url'] = $fileName;
            $data['trailer_url'] = $fileName2;
            $data['poster_url'] = $fileName3;
            $data['status'] = 1;
            $data['added_date'] = date('Y-m-d h:i:s a');

            $this->db->where('rand_id', $this->session->userdata('rand_id'));
            $this->db->update('movie', $data);

            echo "Video ($fileName), trailer ($fileName2) and poster ($fileName3) uploaded successfuly";
            $this->load->view('backend/admin/video_added');

        } else {
            echo "File upload failed";
        }
    }
    function video_uploaded(){
        //if ($this->session->userdata('admin_login') != 1)
   //         redirect(base_url() . 'Login', 'refresh');
        $page_data['page_name']  = 'video_uploaded';
        $page_data['page_title'] = 'Upload trailer';
        $this->load->view('backend/index', $page_data);
    }

    function add_trailer(){
        //if ($this->session->userdata('admin_login') != 1)
   //         redirect(base_url() . 'Login', 'refresh');
        // $max_size = 20480000;
        $fileName = $_FILES["file2"]["name"]; // The file name
        $fileTmpLoc = $_FILES["file2"]["tmp_name"]; // File in the PHP tmp folder
        $fileType = $_FILES["file2"]["type"]; // The type of file it is
        $fileSize = $_FILES["file2"]["size"]; // File size in bytes
        $fileErrorMsg = $_FILES["file2"]["error"]; // 0 for false... and 1 for true
        if (!$fileTmpLoc) { // if file not chosen
            echo "No file selected";
            exit();
        }
        if(move_uploaded_file($fileTmpLoc, "uploads/movie/$fileName")){
            echo "$fileName uploaded successfuly";
            
            $this->session->set_userdata('filename', $fileName);
            redirect(base_url() . 'admin/movie', 'refresh');

        } else {
            echo "File upload failed";
        }
    }

    function users($param1 = "", $param2 ="", $param3 = ""){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        if($param1 == "approve"){
            $data['status'] = $param3;
            $this->db->where('id', $param2);
            $this->db->update('subscriber', $data);
            redirect(base_url() . 'admin/users', 'refresh');
        }
        if($param1 == "delete"){
            $this->db->where('id', $param2);
            $this->db->delete('subscriber');
            redirect(base_url() . 'admin/users', 'refresh');
        }
        $page_data['page_name']  = 'users';
        $page_data['page_title'] = "Manage Subscribers";
        $this->load->view('backend/index', $page_data);
    }

    function consultants($param1 = "", $param2 ="", $param3 = ""){
        if ($this->session->userdata('admin_login') != 1)
           redirect(base_url() . 'Login', 'refresh');
        if($param1 == "approve"){
            $data['status'] = $param3;
            $this->db->where('id', $param2);
            $this->db->update('consultant', $data);
            redirect(base_url() . 'admin/consultants', 'refresh');
        }
        if($param1 == "delete"){
            $this->db->where('id', $param2);
            $this->db->delete('consultant');
            redirect(base_url() . 'admin/consultants', 'refresh');
        }
        $page_data['page_name']  = 'consultants';
        $page_data['page_title'] = "Manage Consultants";
        $this->load->view('backend/index', $page_data);
    }


    function aboutusDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_aboutus($param1);
        $page_data['page_name']  = 'manageaboutus';
        $page_data['page_title'] = "Manage About Us";
        $this->load->view('backend/index', $page_data);
    }

    function smsDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_sms($param1);
        $page_data['page_name']  = 'managesms';
        $page_data['page_title'] = "Manage SMS";
        $this->load->view('backend/index', $page_data);
    }

    function adminDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_admin($param1);
        $page_data['page_name']  = 'manageadmin';
        $page_data['page_title'] = "Manage Admin";
        $this->load->view('backend/index', $page_data);
    }


    function projectsDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_project($param1);
        $page_data['page_name']  = 'manageprojects';
        $page_data['page_title'] = "Manage Projects";
        $this->load->view('backend/index', $page_data);
    }

    function carouselDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_carousel($param1);
        $page_data['page_name']  = 'managecarousel';
        $page_data['page_title'] = "Manage Carousel";
        $this->load->view('backend/index', $page_data);
    }

    function serviceDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_service($param1);
        $page_data['page_name']  = 'manageservices';
        $page_data['page_title'] = "Manage Services";
        $this->load->view('backend/index', $page_data);
    }

    function testimonialDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_testimonial($param1);
        $page_data['page_name']  = 'managetestimonial';
        $page_data['page_title'] = "Manage Testimonial";
        $this->load->view('backend/index', $page_data);
    }

    function bookDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_booking($param1);
        $page_data['page_name']  = 'managebooking';
        $page_data['page_title'] = "Manage Booking";
        $this->load->view('backend/index', $page_data);
    }


    function serviceApprove($param1 = "", $param2 = ""){
        $data['status'] = $param2;
        $this->db->where('id', $param1);
        $this->db->update('services', $data);
        $page_data['page_name']  = 'manageservices';
        $page_data['page_title'] = 'Manage Services';
        $this->load->view('backend/index', $page_data);
    }

    function testimonialApprove($param1 = "", $param2 = ""){
        $data['status'] = $param2;
        $this->db->where('id', $param1);
        $this->db->update('testimonial', $data);
        $page_data['page_name']  = 'managetestimonial';
        $page_data['page_title'] = 'Manage Testimonial';
        $this->load->view('backend/index', $page_data);
    }

    function sponsorApprove($param1 = ""){
        $data['status'] = 1;
        $this->db->where('id', $param1);
        $this->db->update('sponsor', $data);
        $page_data['page_name']  = 'managesponsor';
        $page_data['page_title'] = 'Manage Sponsor';
        $this->load->view('backend/index', $page_data);
    }

    function sponsorDispprove($param1 = ""){
        $data['status'] = 0;
        $this->db->where('id', $param1);
        $this->db->update('sponsor', $data);
        $page_data['page_name']  = 'managesponsor';
        $page_data['page_title'] = 'Manage Sponsor';
        $this->load->view('backend/index', $page_data);
    }

    function popUpApprove($param1 = ""){
        $data['status'] = 1;
        $this->db->where('id', $param1);
        $this->db->update('popup', $data);
        $page_data['page_name']  = 'managenotifications';
        $page_data['page_title'] = 'Manage Notifications';
        $this->load->view('backend/index', $page_data);
    }

    function assignConsultant(){
        $id= $this->input->post('id');
        $data['consultant'] = $this->input->post('consultant');
        $this->db->where('id', $id);
        $this->db->update('appointment', $data);
        $page_data['page_name']  = 'managebooking';
        $page_data['page_title'] = 'Manage Booking';
        $this->load->view('backend/index', $page_data);
    }

    function popUpDispprove($param1 = ""){
        $data['status'] = 0;
        $this->db->where('id', $param1);
        $this->db->update('popup', $data);
        $page_data['page_name']  = 'managenotifications';
        $page_data['page_title'] = 'Manage Notifications';
        $this->load->view('backend/index', $page_data);
    }

    function bookApprove($param1 = ""){
        $page_data['project_id'] = $param1;
        $page_data['page_name']  = 'assignConsultant';
        $page_data['page_title'] = 'Assign Consultant';
        $this->load->view('backend/index', $page_data);
    }
    
    function carouselApprove($param1 = ""){
        $data['status'] = 1;
        $this->db->where('id', $param1);
        $this->db->update('carousel', $data);
        $page_data['page_name']  = 'managecarousel';
        $page_data['page_title'] = 'Manage Carousel';
        $this->load->view('backend/index', $page_data);
    }

    function carouselDispprove($param1 = ""){
        $data['status'] = 0;
        $this->db->where('id', $param1);
        $this->db->update('carousel', $data);
        $page_data['page_name']  = 'managecarousel';
        $page_data['page_title'] = 'Manage Carousel';
        $this->load->view('backend/index', $page_data);
    }

    function menuApprove($param1 = ""){
        $data['status'] = 1;
        $this->db->where('id', $param1);
        $this->db->update('employees', $data);
        $page_data['page_name']  = 'managemenu';
        $page_data['page_title'] = 'Manage Employees';
        $this->load->view('backend/index', $page_data);
    }

    function showRemain($param1 = ""){
        $data['showRemain'] = 1;
        $this->db->where('id', $param1);
        $this->db->update('menu', $data);
        $page_data['page_name']  = 'managemenu';
        $page_data['page_title'] = 'Manage Services Menu';
        $this->load->view('backend/index', $page_data);
    }

    function hideRemain($param1 = ""){
        $data['showRemain'] = 0;
        $this->db->where('id', $param1);
        $this->db->update('menu', $data);
        $page_data['page_name']  = 'managemenu';
        $page_data['page_title'] = 'Manage Services Menu';
        $this->load->view('backend/index', $page_data);
    }

    function showRemain1($param1 = ""){
        $data['showRemain'] = 1;
        $this->db->where('id', $param1);
        $this->db->update('menu', $data);
        $page_data['page_name']  = 'managemenu1';
        $page_data['page_title'] = 'Manage Programmes Menu';
        $this->load->view('backend/index', $page_data);
    }

    function hideRemain1($param1 = ""){
        $data['showRemain'] = 0;
        $this->db->where('id', $param1);
        $this->db->update('menu', $data);
        $page_data['page_name']  = 'managemenu1';
        $page_data['page_title'] = 'Manage Programmes Menu';
        $this->load->view('backend/index', $page_data);
    }

    function teamApprove($param1 = "", $param2 = " "){
        $data['status'] = $param2;
        $this->db->where('id', $param1);
        $this->db->update('team', $data);
        $page_data['page_name']  = 'manageteam';
        $page_data['page_title'] = 'Manage Team';
        $this->load->view('backend/index', $page_data);
    }

    function eventsApprove($param1 = ""){
        $data['status'] = 1;
        $this->db->where('id', $param1);
        $this->db->update('events', $data);
        $page_data['page_name']  = 'manageevents';
        $page_data['page_title'] = 'Manage Updates & Events';
        $this->load->view('backend/index', $page_data);
    }


    function menuApprove1($param1 = ""){
        $data['status'] = 1;
        $this->db->where('id', $param1);
        $this->db->update('menu', $data);
        $page_data['page_name']  = 'managemenu1';
        $page_data['page_title'] = 'Manage Programmes Menu';
        $this->load->view('backend/index', $page_data);
    }

    function menuDelete1($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_menu($param1);
        $page_data['page_name']  = 'managemenu1';
        $page_data['page_title'] = "Manage Programmes Menu";
        $this->load->view('backend/index', $page_data);
    }

    function sponsorDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_sponsor($param1);
        $page_data['page_name']  = 'managesponsor';
        $page_data['page_title'] = "Manage Sponsor";
        $this->load->view('backend/index', $page_data);
    }

    function popUpDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_popup($param1);
        $page_data['page_name']  = 'managenotifications';
        $page_data['page_title'] = "Manage Notifications";
        $this->load->view('backend/index', $page_data);
    }

    function menuDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_menu($param1);
        $page_data['page_name']  = 'managemenu';
        $page_data['page_title'] = "Manage Employees";
        $this->load->view('backend/index', $page_data);
    }

    function teamDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_teams($param1);
        $page_data['page_name']  = 'manageteam';
        $page_data['page_title'] = "Manage Teams";
        $this->load->view('backend/index', $page_data);
    }

    function eventsDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_events($param1);
        $page_data['page_name']  = 'manageevents';
        $page_data['page_title'] = "Manage Updates & Events";
        $this->load->view('backend/index', $page_data);
    }

    function programmeDelete($param1 = ""){
        $this->load->model("Crud_model");
        $this->Crud_model->delete_programme($param1);
        $page_data['page_name']  = 'manageprogramme';
        $page_data['page_title'] = "Manage Programes";
        $this->load->view('backend/index', $page_data);
    }

    function aboutusApprove($param1 = "", $param2 = ""){
        $data['status'] = $param2;
        $this->db->where('id', $param1);
        $this->db->update('aboutus', $data);
        $page_data['page_name']  = 'manageaboutus';
        $page_data['page_title'] = "Manage About";
        $this->load->view('backend/index', $page_data);
    }

    function programmeApprove($param1 = "", $param2 = ""){
        $data['status'] = $param2;
        $this->db->where('id', $param1);
        $this->db->update('programmes', $data);
        $page_data['page_name']  = 'manageprogramme';
        $page_data['page_title'] = "Manage Programes";
        $this->load->view('backend/index', $page_data);
    }

    function adminApprove($param1 = ""){
        $data['status'] = 1;
        $this->db->where('admin_id', $param1);
        $this->db->update('admin', $data);
        $page_data['page_name']  = 'manageadmin';
        $page_data['page_title'] = "Manage Admin";
        $this->load->view('backend/index', $page_data);
    }

    function adminDisapprove($param1 = ""){
        $data['status'] = 0;
        $this->db->where('admin_id', $param1);
        $this->db->update('admin', $data);
        $page_data['page_name']  = 'manageadmin';
        $page_data['page_title'] = "Manage Admin";
        $this->load->view('backend/index', $page_data);
    }

    function projectsEdit($param1 = ""){
        $page_data['project_id'] = $param1;
        $page_data['page_name']  = 'editprojects';
        $page_data['page_title'] = 'Edit Projects';
        $this->load->view('backend/index', $page_data);
    }

    function sponsorEdit($param1 = ""){
        $page_data['project_id'] = $param1;
        $page_data['page_name']  = 'editSponsor';
        $page_data['page_title'] = 'Edit Sponsor';
        $this->load->view('backend/index', $page_data);
    }

    

    function testimonialEdit($param1 = ""){
        $page_data['project_id'] = $param1;
        $page_data['page_name']  = 'edittestimonial';
        $page_data['page_title'] = 'Edit Testimonial';
        $this->load->view('backend/index', $page_data);
    }

    function carouselEdit($param1 = ""){
        $page_data['project_id'] = $param1;
        $page_data['page_name']  = 'editcarousel';
        $page_data['page_title'] = 'Edit Carousel';
        $this->load->view('backend/index', $page_data);
    }

    function teamsEdit($param1 = ""){
        $page_data['project_id'] = $param1;
        $page_data['page_name']  = 'editTeams';
        $page_data['page_title'] = 'Edit Teams';
        $this->load->view('backend/index', $page_data);
    }

    function menuEdit($param1 = ""){
        $page_data['project_id'] = $param1;
        $page_data['page_name']  = 'editmenu';
        $page_data['page_title'] = 'Edit Menu';
        $this->load->view('backend/index', $page_data);
    }

    function eventsEdit($param1 = ""){
        $page_data['project_id'] = $param1;
        $page_data['page_name']  = 'editevents';
        $page_data['page_title'] = 'Edit Updates & Events';
        $this->load->view('backend/index', $page_data);
    }

    function menuEdit1($param1 = ""){
        $page_data['project_id'] = $param1;
        $page_data['page_name']  = 'editmenu1';
        $page_data['page_title'] = 'Edit Menu';
        $this->load->view('backend/index', $page_data);
    }

    function programmeEdit($param1 = ""){
        $page_data['project_id'] = $param1;
        $page_data['page_name']  = 'editprogramme';
        $page_data['page_title'] = 'Edit Programme';
        $this->load->view('backend/index', $page_data);
    }

    function serviceEdit($param1 = ""){
        $page_data['project_id'] = $param1;
        $page_data['page_name']  = 'editservice';
        $page_data['page_title'] = 'Edit Service';
        $this->load->view('backend/index', $page_data);
    }

    function categories($param1 = ""){
        //if ($this->session->userdata('admin_login') != 1)
   //         redirect(base_url() . 'Login', 'refresh');
        if($param1 == "create"){
            $data['name'] = $this->input->post('name');
            $this->db->insert('category', $data);
            redirect(base_url() . 'admin/categories', 'refresh');
        }
        $page_data['page_name']  = 'categories';
        $page_data['page_title'] = "Manage Categories";
        $this->load->view('backend/index', $page_data);

    }

    function series($param1 = ""){
        //if ($this->session->userdata('admin_login') != 1)
   //         redirect(base_url() . 'Login', 'refresh');
        if($param1 == "create"){
            $data['name'] = $this->input->post('name');
            $this->db->insert('serie', $data);
            redirect(base_url() . 'admin/series', 'refresh');
        }
        $page_data['page_name']  = 'series';
        $page_data['page_title'] = "Manage Series";
        $this->load->view('backend/index', $page_data);

    }
    function subscription($param1 = "", $param2 = ""){
        //if ($this->session->userdata('admin_login') != 1)
   //         redirect(base_url() . 'Login', 'refresh');
        if($param1 == "declare"){
            $package = $this->input->post('package');
            $user_id = $this->input->post('user_id');
            if($package == "basic"){
                $data['credit'] = 7000;
            }
            if($package == "gold"){
                $data['credit'] = 20000;
            }
            $user = $this->db->get_where('user', array('id' => $user_id))->row();

            $this->db->order_by('id', 'DESC');
            $this->db->limit(1);
            $tx_number = ($this->db->get('transaction')->row()->id)+1;

            $data['transaction_id'] = "AF".$this->session->userdata('user_id').''.rand(10,99).''.date('is').$tx_number;
            $chrList = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $chrRepeatMin = 1; // Minimum times to repeat the seed string
            $chrRepeatMax = 10; // Maximum times to repeat the seed string
            $chrRandomLength = 30;
            $data['validation_code'] =  substr(str_shuffle(str_repeat($chrList, mt_rand($chrRepeatMin,$chrRepeatMax))), 1, $chrRandomLength).date('mdyhis');

            $data['status'] = 'successful';
            $data['debit'] = 0;
            $data['user_id'] = $user_id;
            $data['details'] = $user->name." paid a ".$package." subscription."."\r\n"."Details: ".$this->input->post('description');
            $data['ip'] = $_SERVER['REMOTE_ADDR'];
            $data['browser'] = $_SERVER['HTTP_USER_AGENT'];
            $data['package'] = $package;

            $this->db->insert('transaction', $data);

            $sub_data['package'] = $data['package'];
            $sub_data['user_id'] = $data['user_id'];
            $sub_data['paid'] = $data['credit'];
            $sub_data['transaction_id'] = $this->db->get_where('transaction', array('validation_code' => $data['validation_code']))->row()->id;
            $sub_data['status'] = 'successful';
            $sub_data['subscription_date'] = date('Y-m-d h:i:s a');
            $sub_data['description'] = $data['details'];

            $this->db->order_by('id', 'DESC');
            $this->db->limit(1);
            $expiration_date = $this->db->get_where('subscription', array('user_id' => $data['user_id'], 'status' => 'successful'))->row()->expiration_date;
            if($expiration_date){
                $sub_data['expiration_date'] = date('Y-m-d h:i:s a', strtotime($expiration_date. ' + 30 days'));
            }elseif(!$expiration_date){
                $sub_data['expiration_date'] = date('Y-m-d h:i:s a', strtotime(date('Y-m-d h:i:s a'). ' + 30 days'));
            }
            
            $this->db->insert('subscription', $sub_data);

                $user = $this->db->get_where('user', array('id' => $this->session->userdata('user_id')))->row();
                if($user->referrer != ""){
                    $data2['user_id'] = $this->db->get_where('user', array('referral_code' => $user->referrer))->row()->id;
                    $data2['referring'] = $this->session->userdata('user_id');
                    $data2['paid'] = $data['paid'];
                    $data2['referral_amount'] = $data2['paid'] * $this->db->get_where('settings', array('type' => "referral_".$data['package']))->row()->description;

                    // Check subscription of the referrer
                    $subscriptions = $this->db->get_where('subscription', array('user_id' => $data2['user_id'], 'status' => 'successful'));
                    if($subscriptions->num_rows() > 0){
                        $this->db->limit('1');
                        $this->db->order_by('id', 'DESC');
                        $expiration_date = $this->db->get_where('subscription', array('user_id' => $data2['user_id'], 'status' => 'successful'))->row()->expiration_date;
                        $current_subscription = strtotime($expiration_date);
                        $today = strtotime(date('Y-m-d'));
                        if($current_subscription >= $today){
                            $this->db->insert('referral', $data2);
                        } 
                    }  
                }
            }
        $page_data['page_name']  = 'subscription';
        $page_data['page_title'] = "User Subscriptions";
        $this->load->view('backend/index', $page_data);
    }


    // function stock_class($param1 = "", $param2 = ""){
    //     if ($this->session->userdata('admin_login') != 1)
    //         redirect(base_url() . 'Login', 'refresh');
    //     if($param1 == "add"){
    //         $data['name'] = $this->input->post('name');
    //         $data['minimum'] = $this->input->post('minimum');
    //         $data['shares'] = $this->input->post('shares');
    //         $data['discount'] = $this->input->post('discount');
    //         $data['status'] = $this->input->post('status');
    //         $data['remaining'] = $data['shares'];

    //         $this->db->insert('package', $data);
    //         redirect(base_url() . 'Admin/stock_class', 'refresh');
    //     }
    //     $page_data['page_name']  = 'stock_class';
    //     $page_data['page_title'] = 'Stock Class';
    //     $this->load->view('backend/index', $page_data);
    // }

//     function admins($param1 = '' , $param2 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//         {
//             $this->session->set_userdata('last_page' , current_url());
//             redirect(base_url() . 'Login', 'refresh');
//         }
//         if ($param1 == 'create') 
//         {
//             $this->Crud_model->admin_create();
//             redirect(base_url() . 'admin/admins/', 'refresh');
//         }
//         if ($param1 == 'edit') 
//         {
//             $this->Crud_model->admin_edit($param2);
//             redirect(base_url() . 'admin/admin_profile/'.$param2, 'refresh');
//         }
//         if ($param1 == 'delete')
//         {
//             $this->Crud_model->admin_delete($param2);
//         redirect(base_url() . 'admin/admins/', 'refresh');
//         }
//         if ($param1 == 'change_password') 
//         {
//            $this->Crud_model->admin_pass($param2);
//             redirect(base_url() . 'admin/admin_profile/'. $param2, 'refresh');
//         }
//         $page_data['page_name']     = 'admins';
//         $page_data['page_title']    = get_phrase('Admins');
//         $this->load->view('backend/index', $page_data);
//     }
    
//     function admin_profile($admin_id)
//     {
//         if ($this->session->userdata('admin_login') != 1) 
//         {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url() . 'Login', 'refresh');
//         }
//         $page_data['page_name']  = 'admin_profile';
//         $page_data['page_title'] =  get_phrase('Profile');
//         $page_data['admin_id']  =  $admin_id;
//         $this->load->view('backend/index', $page_data);
//     }
    
//     function therapists($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');
//         if ($param1 == 'create') 
//         {   
//             $authors =  $this->db->get('author');
//             $author_id = $authors -> num_rows() + 1;
//             $data['author_id']   = "AUTH".rand()."".$author_id."".date('dm');
//             $data['name']        = $this->input->post('name');
//             $data['username']    = $this->input->post('username');
//             $data['salary']      = $this->input->post('salary');
//             $data['sex']         = $this->input->post('sex');
//             $data['address']     = $this->input->post('address');
//             $data['phone']       = $this->input->post('phone');
//             $data['email']       = $this->input->post('email');
//             $data['password']    = sha1($this->input->post('password'));
//             $data['status']      = $this->input->post('status');

//             $this->db->insert('therapist', $data);
//             $therapist_id = $this->db->insert_id();
//             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/therapist_image/' . $therapist_id . '.jpg');

//             $data2['name'] = $data['name'];
//             $data2['email'] = $data['email'];
//             $data2['phone'] = $data['phone'];
//             $data2['author_id'] = $data['author_id'];
//             $data2['status'] = 1;
//             $data2['user_type'] = "Therapist";
//             $this->db->insert('author', $data2);
//             redirect(base_url() . 'admin/therapists/', 'refresh');
//         }
//         if ($param1 == 'do_update') {
//             $data['name']        = $this->input->post('name');
//             $data['username']        = $this->input->post('username');
//             $data['salary']      = $this->input->post('salary');
//             $data['birthday']        = $this->input->post('birthday');
//             $data['address']     = $this->input->post('address');
//             $data['phone']       = $this->input->post('phone');
//             $data['email']       = $this->input->post('email');
//             $this->db->where('therapist_id', $param2);
//             $this->db->update('therapist', $data);
//             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/therapist_image/' . $param2 . '.jpg');
//             redirect(base_url() . 'admin/therapists/', 'refresh');
//         }
//         if ($param1 == 'change_password') 
//         {
//            $data['new_password'] = sha1($this->input->post('new_password'));
//         $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));
//             if ($data['new_password'] == $data['confirm_new_password']) 
//             {
//                 $this->db->where('therapist_id', $param2);
//                 $this->db->update('therapist', array('password' => $data['new_password']));
//             } 
//             redirect(base_url() . 'admin/therapist_profile/'. $param2, 'refresh');
//         }
//         if ($param1 == 'delete') 
//         {
//             $this->db->where('therapist_id', $param2);
//             $this->db->delete('therapist');
//             redirect(base_url() . 'admin/therapists/', 'refresh');
//         }
//         $page_data['therapists']   = $this->db->get('therapist')->result_array();
//         $page_data['page_name']  = 'therapists';
//         $page_data['page_title'] = get_phrase('Manage-Therapist');
//         $this->load->view('backend/index', $page_data);
//     }

//     function therapist_profile($therapist_id)
//     {
//         if ($this->session->userdata('admin_login') != 1) 
//         {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url() . 'Login', 'refresh');
//         }
//         $page_data['page_name']  = 'therapist_profile';
//         $page_data['page_title'] =  get_phrase('Profile');
//         $page_data['therapist_id']  =  $therapist_id;
//         $this->load->view('backend/index', $page_data);
//     }


//     // Members
//     function users($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');
//         if ($param1 == 'create') 
//         {
//             $data['name']        = $this->input->post('name');
//             $data['username']    = $this->input->post('username');
//             $data['country']     = $this->input->post('address');
//             $data['phone']       = $this->input->post('phone');
//             $data['email']       = $this->input->post('email');
//             $data['password']    = sha1($this->input->post('password'));
//             $data['status']    = $this->input->post('status');
//             $this->db->insert('user', $data);
//             $teacher_id = $this->db->insert_id();
//             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/member_image/' . $teacher_id . '.jpg');
//             redirect(base_url() . 'admin/users/', 'refresh');
//         }
//         if ($param1 == 'do_update') {
//             $data['name']        = $this->input->post('name');
//             $data['username']    = $this->input->post('username');
//             $data['phone']       = $this->input->post('phone');
//             $data['email']       = $this->input->post('email');
//             $data['status']       = $this->input->post('status');
//             $this->db->where('id', $param2);
//             $this->db->update('user', $data);
//             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/users/' . $param2 . '.jpg');
//             redirect(base_url() . 'admin/users/', 'refresh');
//         }
//         if ($param1 == 'change_password') 
//         {
//         $data['new_password'] = sha1($this->input->post('new_password'));
//         $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));
//             if ($data['new_password'] == $data['confirm_new_password']) 
//             {
//                 $this->db->where('id', $param2);
//                 $this->db->update('user', array('password' => $data['new_password']));
//             } 
//             redirect(base_url() . 'admin/user_profile/'. $param2, 'refresh');
//         }
//         if ($param1 == 'delete') 
//         {
//             $this->db->where('id', $param2);
//             $this->db->delete('user');
//             redirect(base_url() . 'admin/users/', 'refresh');
//         }
//         $page_data['users']   = $this->db->get('user')->result_array();
//         $page_data['page_name']  = 'users';
//         $page_data['page_title'] = 'Manage Users';
//         $this->load->view('backend/index', $page_data);
//     }

//     function user_profile($id)
//     {
//         if ($this->session->userdata('admin_login') != 1) 
//         {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url() . 'Login', 'refresh');
//         }
//         $page_data['page_name']  = 'user_profile';
//         $page_data['page_title'] =  get_phrase('Profile');
//         $page_data['id']  =  $id;
//         $this->load->view('backend/index', $page_data);
//     }
//     // Members --end
    

// // accountants

// function accountant_profile($accountant_id)
//     {
//         if ($this->session->userdata('admin_login') != 1) 
//         {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url() . 'Login', 'refresh');
//         }
//         $page_data['page_name']  = 'accountant_profile';
//         $page_data['page_title'] =  get_phrase('Profile');
//         $page_data['accountant_id']  =  $accountant_id;
//         $this->load->view('backend/index', $page_data);
//     }


//  function accountants($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');
//         if ($param1 == 'create') 
//         {
//             $authors =  $this->db->get('author');
//             $author_id = $authors -> num_rows() + 1;
//             $data['author_id']   = "AUTH".rand()."".$author_id."".date('dm');
//             $data['name']        = $this->input->post('name');
//             $data['username']        = $this->input->post('username');
//             $data['salary']        = $this->input->post('salary');
//             $data['sex']         = $this->input->post('sex');
//             $data['address']     = $this->input->post('address');
//             $data['phone']       = $this->input->post('phone');
//             $data['email']       = $this->input->post('email');
//             $data['password']    = sha1($this->input->post('password'));
//             $this->db->insert('accountant', $data);
//             $accountant_id = $this->db->insert_id();
//             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/accountant_image/' . $accountant_id . '.jpg');
//             redirect(base_url() . 'admin/accountant_profile/'.$accountant_id, 'refresh');
//         }
//         if ($param1 == 'do_update') {
//             $data['name']        = $this->input->post('name');
//             $data['username']        = $this->input->post('username');
//             $data['salary']      = $this->input->post('salary');
//             $data['birthday']        = $this->input->post('birthday');
//             $data['address']     = $this->input->post('address');
//             $data['phone']       = $this->input->post('phone');
//             $data['email']       = $this->input->post('email');
//             $this->db->where('accountant_id', $param2);
//             $this->db->update('accountant', $data);
//             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/accountant_image/' . $param2 . '.jpg');
//             redirect(base_url() . 'admin/accountants/', 'refresh');
//         }
//         if ($param1 == 'change_password') 
//         {
//            $data['new_password'] = sha1($this->input->post('new_password'));
//         $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));
//             if ($data['new_password'] == $data['confirm_new_password']) 
//             {
//                 $this->db->where('accountant_id', $param2);
//                 $this->db->update('accountant', array('password' => $data['new_password']));
//             } 
//             redirect(base_url() . 'admin/accountants/', 'refresh');
//         }
//         if ($param1 == 'delete') 
//         {
//             $this->db->where('accountant_id', $param2);
//             $this->db->delete('accountant');
//             redirect(base_url() . 'admin/accountants/', 'refresh');
//         }
//         $page_data['accountants']   = $this->db->get('accountant')->result_array();
//         $page_data['page_name']  = 'accountant';
//         $page_data['page_title'] = get_phrase('Manage-Accountants');
//         $this->load->view('backend/index', $page_data);
//     }


//     // Edit homepage
//     function homepage_edit($param1 = "", $param2 =""){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');

//         if ($param1 == 'do_update') {
             
//             $data[$param2] = $this->input->post('vision');
//             $this->db->where('phrase' , 'Vision-Data');
//             $this->db->update('language' , $data);

//             $data[$param2] = $this->input->post('mission');
//             $this->db->where('phrase' , 'Mission-Data');
//             $this->db->update('language' , $data);

//             $data[$param2] = $this->input->post('stat');
//             $this->db->where('phrase' , 'Stat-Data');
//             $this->db->update('language' , $data);

//             $data[$param2] = $this->input->post('about');
//             $this->db->where('phrase' , 'About-Data');
//             $this->db->update('language' , $data);
        
//             redirect(base_url() . 'Admin/homepage_edit/'.$param2, 'refresh');
//         }

//         $page_data['site_lan']  = $param1;
//         $page_data['page_name']  = 'edit_homepage';
//         $page_data['page_title'] = 'Edit Homepage :: '.$param1;
//         $this->load->view('backend/index', $page_data);
//     }
//     // Edit homepage -- End

//     // Post 
//     function post($param1 = "", $param2 = ""){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');

//         if ($param1 == 'new') {
//             $page_data['page_name']  = 'post_new';
//             $page_data['page_title'] = 'Add New Post';
//             $this->load->view('backend/index', $page_data);
//         }
//         if ($param1 == 'create') {
//             $slug = str_replace(' ', '_', strtolower($this->input->post('title_eng')));
//             $slug = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);
//             $data['title_eng'] = $this->input->post('title_eng');
//             $data['title_kin'] = $this->input->post('title_kin');
//             $data['post_eng']  = $this->input->post('post_eng');
//             $data['post_kin']  = $this->input->post('post_kin');
//             $data['author_id']  = $this->session->userdata('author_id');
//             $data['slug']  = $slug;
//             $data['posted_date']  = date('d/m/Y');
//             $data['status']  = 1;
//             $data['category'] = $this->input->post('category');

//             $this->db->insert('posts', $data);

//             redirect(base_url() . 'Admin/post/all'.$param2, 'refresh');
//         }
//         if ($param1 == 'edit') {
//             $page_data['post_id'] = $param2;
//             $page_data['page_name']  = 'post_edit';
//             $page_data['page_title'] = 'Edit Posts';
//             $this->load->view('backend/index', $page_data);
//         }
//         if ($param1 == 'update') 
//         {
//             $this->Crud_model->post_edit($param2);
//             redirect(base_url() . 'admin/post/all/', 'refresh');
//         }
//         if ($param1 == 'delete')
//         {
//             $this->Crud_model->post_delete($param2);
//         redirect(base_url() . 'admin/post/all', 'refresh');
//         }
//         if ($param1 == 'all') {
//             $page_data['page_name']  = 'post_all';
//             $page_data['page_title'] = 'All Posts';
//             $this->load->view('backend/index', $page_data);
//         }
//         if ($param1 == 'pending') {
//             $page_data['page_name']  = 'post_pending';
//             $page_data['page_title'] = 'Pending Posts';
//             $this->load->view('backend/index', $page_data);
//         }
//     }

//     function video_conference(){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');
//         $page_data['page_name']  = 'video_conference';
//         $page_data['page_title'] = 'Conference';
//         $this->load->view('backend/index', $page_data);
//         // $this->load->view('backend/zoom/index.html');
//         // $this->load->view('backend/video_scaledrone');
//         // redirect(base_url().'application/views/backend/zoom/index.html');
//     }

//     function tours($param1 = "", $param2 = ""){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');
//         if ($param1 == 'public'){
//                 $page_data['page_name']  = 'tours_public';
//                 $page_data['page_title'] = 'Public Tours';
//                 $this->load->view('backend/index', $page_data);
//             }

//         if ($param1 == 'edit'){
//                 $page_data['post_id'] = $param2;
//                 $page_data['page_name']  = 'tour_edit';
//                 $page_data['page_title'] = 'Edit Tour';
//                 $this->load->view('backend/index', $page_data);
//             }
//         if ($param1 == 'update') 
//         {
//             $this->Crud_model->tour_edit($param2);
//             redirect(base_url() . 'admin/tours/public/', 'refresh');
//         }
//         if ($param1 == 'delete') 
//         {
//             $this->Crud_model->tour_delete($param2);
//             redirect(base_url() . 'admin/tours/public/', 'refresh');
//         }
//         if ($param1 == 'add') {
//             $query = $this->db->get('tours');
//             $records = $query->num_rows()+1;
//             $data['tour_id'] = "TR".$records."".date(my);
//             $data['title']         =   $this->input->post('title');
//             $data['description']     =   $this->input->post('description');
//             $data['date']        =   $this->input->post('date');
//             $data['status']        =   $this->input->post('status');
//             $data['price']        =   $this->input->post('price');
//             $data['price_eac']        =   $this->input->post('price_eac');
//             $data['price_international']        =   $this->input->post('price_international');


//             $config = array(
//                     'upload_path' => "./uploads/tour/",
//                     'allowed_types' => "jpg",
//                     'overwrite' => TRUE,
//                     'remove_spaces' => TRUE,
//                     'file_name' => rand(100,999)."".date('dmy_his'),
//                     'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
//                     );

//                     $data['profile'] = $config['file_name'].".JPG";

//                     $this->load->library('upload', $config);
//                     $this->upload->initialize($config);  
//                     if($this->upload->do_upload('profile')){
//                         $this->db->insert('tours', $data);
//                     }
//             redirect(base_url() . 'admin/tours/public/', 'refresh');
//     }
//     }


//     function packages($param1 = "", $param2 = ""){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');
//         if($param1 == ""){
//             $page_data['page_name']  = 'packages';
//             $page_data['page_title'] = 'Packages';
//             $this->load->view('backend/index', $page_data);
//         }
//         if($param1 == "edit"){
//             $page_data['package_id'] = $param2;
//             $page_data['page_name']  = 'package_edit';
//             $page_data['page_title'] = 'Edit Package';
//             $this->load->view('backend/index', $page_data);
//         }
//         if ($param1 == 'update'){
//             $this->Crud_model->package_edit($param2);
//             redirect(base_url() . 'admin/packages', 'refresh');
//         }
//         if ($param1 == 'add'){
//             $data['title'] = $this->input->post('title');
//             $data['status'] = $this->input->post('status');
//             $data['description'] = $this->input->post('description');
//             $data['days'] = $this->input->post('days');
//             $data['people'] = $this->input->post('people');
//             $data['accommodation'] = $this->input->post('accommodation');
//             $data['itenerary'] = $this->input->post('itenerary');
//             $data['price'] = $this->input->post('price');
//             $data['highlights'] = $this->input->post('highlights');

//             $query = $this->db->get('package');
//             $records = $query->num_rows()+1;
//             $data['package_id'] = "PK".$records."".date(my);

//             $config = array(
//                 'upload_path' => "./uploads/packages/",
//                 'allowed_types' => "jpg",
//                 'overwrite' => TRUE,
//                 'remove_spaces' => TRUE,
//                 'file_name' => $data['package_id'].'.jpg',
//                 'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
//                 );

//                 $this->load->library('upload', $config);
//                 $this->upload->initialize($config);  
//                 $this->upload->do_upload('profile');
//             $data['profile'] = $data['package_id'].'.jpg';

//             $config = array(
//                 'upload_path' => "./uploads/packages/",
//                 'allowed_types' => "jpg",
//                 'overwrite' => TRUE,
//                 'remove_spaces' => TRUE,
//                 'file_name' => $data['package_id'].'_image1.jpg',
//                 'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
//                 );

//                 $this->load->library('upload', $config);
//                 $this->upload->initialize($config);  
//                 $this->upload->do_upload('image1');
//             $data['image1'] = $data['package_id'].'_image1.jpg';

//             $config = array(
//                 'upload_path' => "./uploads/packages/",
//                 'allowed_types' => "jpg",
//                 'overwrite' => TRUE,
//                 'remove_spaces' => TRUE,
//                 'file_name' => $data['package_id'].'_image2.jpg',
//                 'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
//                 );

//                 $this->load->library('upload', $config);
//                 $this->upload->initialize($config);  
//                 $this->upload->do_upload('image2');
//             $data['image2'] = $data['package_id'].'_image2.jpg';

//             $config = array(
//                 'upload_path' => "./uploads/packages/",
//                 'allowed_types' => "jpg",
//                 'overwrite' => TRUE,
//                 'remove_spaces' => TRUE,
//                 'file_name' => $data['package_id'].'_image3.jpg',
//                 'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
//                 );

//                 $this->load->library('upload', $config);
//                 $this->upload->initialize($config);  
//                 $this->upload->do_upload('image3');
//             $data['image3'] = $data['package_id'].'_image3.jpg';


//             $this->db->insert('package', $data);
//             redirect(base_url() . 'admin/packages', 'refresh');
//         }
//         if ($param1 == 'delete'){
//             $this->Crud_model->package_delete($param2);
//             redirect(base_url() . 'admin/packages', 'refresh');
//         }
//     }
//     function places($param1 = "", $param2 = ""){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');
//         if($param1 == ""){
//             $page_data['page_name']  = 'places';
//             $page_data['page_title'] = 'Places to visit';
//             $this->load->view('backend/index', $page_data);
//         }
//         if($param1 == "edit"){
//             $page_data['place_id'] = $param2;
//             $page_data['page_name']  = 'place_edit';
//             $page_data['page_title'] = 'Edit Place';
//             $this->load->view('backend/index', $page_data);
//         }
//         if ($param1 == 'update'){
//             $this->Crud_model->place_edit($param2);
//             redirect(base_url() . 'admin/places', 'refresh');
//         }
//         if ($param1 == 'add'){
//             $data['name'] = $this->input->post('name');
//             $data['description'] = $this->input->post('description');
//             $data['address'] = $this->input->post('address');
//             $data['highlights'] = $this->input->post('highlights');
//             $data['status'] = $this->input->post('status');

//             $query = $this->db->get('places');
//             $records = $query->num_rows()+1;
//             $data['place_id'] = "PL".$records."".date(my);

//             $config = array(
//                 'upload_path' => "./uploads/places/",
//                 'allowed_types' => "jpg",
//                 'overwrite' => TRUE,
//                 'remove_spaces' => TRUE,
//                 'file_name' => $data['place_id'].'.jpg',
//                 'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
//                 );

//                 $this->load->library('upload', $config);
//                 $this->upload->initialize($config);  
//                 $this->upload->do_upload('profile');
//             $data['profile'] = $data['place_id'].'.jpg';

//             $config = array(
//                 'upload_path' => "./uploads/places/",
//                 'allowed_types' => "jpg",
//                 'overwrite' => TRUE,
//                 'remove_spaces' => TRUE,
//                 'file_name' => $data['place_id'].'_image1.jpg',
//                 'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
//                 );

//                 $this->load->library('upload', $config);
//                 $this->upload->initialize($config);  
//                 $this->upload->do_upload('image1');
//             $data['image1'] = $data['place_id'].'_image1.jpg';

//             $config = array(
//                 'upload_path' => "./uploads/places/",
//                 'allowed_types' => "jpg",
//                 'overwrite' => TRUE,
//                 'remove_spaces' => TRUE,
//                 'file_name' => $data['place_id'].'_image2.jpg',
//                 'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
//                 );

//                 $this->load->library('upload', $config);
//                 $this->upload->initialize($config);  
//                 $this->upload->do_upload('image2');
//             $data['image2'] = $data['place_id'].'_image2.jpg';

//             $config = array(
//                 'upload_path' => "./uploads/places/",
//                 'allowed_types' => "jpg",
//                 'overwrite' => TRUE,
//                 'remove_spaces' => TRUE,
//                 'file_name' => $data['place_id'].'_image3.jpg',
//                 'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
//                 );

//                 $this->load->library('upload', $config);
//                 $this->upload->initialize($config);  
//                 $this->upload->do_upload('image3');
//             $data['image3'] = $data['place_id'].'_image3.jpg';


//             $this->db->insert('places', $data);
//             redirect(base_url() . 'admin/places', 'refresh');
//         }
//         if ($param1 == 'delete'){
//             $this->Crud_model->places_delete($param2);
//             redirect(base_url() . 'admin/places', 'refresh');
//         }
//     }

//     function bookings(){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');

//         $page_data['page_name']  = 'bookings';
//         $page_data['page_title'] = 'Bookings';
//         $this->load->view('backend/index', $page_data);
//     }

//     function payment_reminder($param1 = "", $param2 = ""){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');
//         // Begin SMS notification
//             $booking = $this->db->get_where('booking', array('id' => $param1))->result_array();

//             foreach($booking as $row):
//                 $query2 = $this->db->get_where('transactions', array('transaction_ref' => $row['reference_id'], 'status' => 'successful'))->result_array();
//                         $debit = 0;
//                         $credit = 0;
//                         foreach($query2 as $row1):
//                             $debit = $debit + $row1['debit'];
//                             $credit = $credit + $row1['credit'];
//                         endforeach;
//                         endforeach;

//             $name = $this->db->get_where('user', array('id' => $row['user_id']))->row()->name;
//             $phone_input = $this->db->get_where('user', array('id' => $row['user_id']))->row()->phone;
//             if(strlen($phone_input)==10){
//                 $phone = "25".$phone_input;
//             }elseif(strlen($phone_input)==9){
//                 $phone = "250".$phone_input;
//             }else{
            
//             $phone = $phone_input;
//             }

//             $message2 = "Dear ".$name."!"."\r\n"."You are reminded to pay the outstanding balance of USD ".number_format(($debit - $credit) * $this->db->get_where('currency', array('name' => 'USD'))->row()->rate,1, '.', ',')."\r\n"."Invoice no: ".$row['reference_id']."\r\n"."\r\n"."Kimomo Safaris Team"."\r\n"."Contact: ".$this->db->get_where('settings', array('type' => 'phone'))->row()->description;
        
        
//              $curl = curl_init();
//             curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//             curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

//             curl_setopt_array($curl, array(
//               CURLOPT_URL => "https://api.mista.io/sms",
//               CURLOPT_RETURNTRANSFER => true,
//               CURLOPT_ENCODING => "",
//               CURLOPT_MAXREDIRS => 10,
//               CURLOPT_TIMEOUT => 0,
//               CURLOPT_FOLLOWLOCATION => false,
//               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//               CURLOPT_CUSTOMREQUEST => "POST",
//               CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'K-Safaris','sms' => $message2,'unicode' => '1'),
//               CURLOPT_HTTPHEADER => array(
//                 "x-api-key: dmlBPXZGRmRPYk1qc3B6cEZ2enQ="
//               ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//             // End SMS notification

            

//             echo "<script>alert('Reminder sent successfully');
//                 window.location.href='https://kimomosafaris.com/admin/bookings';</script>";

//     }

//     function invoices(){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');

//         $page_data['page_name']  = 'invoices';
//         $page_data['page_title'] = 'Invoices';
//         $this->load->view('backend/index', $page_data);
//     }
//     function invoicePaymentReminder($param1 = "", $param2 = ""){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');
//         // Begin SMS notification
//             $invoice = $this->db->get_where('invoice', array('id' => $param1))->result_array();

//             foreach($invoice as $row):
//                 $query2 = $this->db->get_where('transactions', array('transaction_ref' => $row['invoice_id'], 'status' => 'successful'))->result_array();
//                         $debit = 0;
//                         $credit = 0;
//                         foreach($query2 as $row1):
//                             $debit = $debit + $row1['debit'];
//                             $credit = $credit + $row1['credit'];
//                         endforeach;
//                         endforeach;

//             $name = $this->db->get_where('user', array('id' => $row['user_id']))->row()->name;
//             $phone_input = $this->db->get_where('user', array('id' => $row['user_id']))->row()->phone;
//             if(strlen($phone_input)==10){
//                 $phone = "25".$phone_input;
//             }elseif(strlen($phone_input)==9){
//                 $phone = "250".$phone_input;
//             }else{
            
//             $phone = $phone_input;
//             }

//             $message2 = "Dear ".$name."!"."\r\n"."You are reminded to pay the outstanding balance of USD ".number_format(($debit - $credit) * $this->db->get_where('currency', array('name' => 'USD'))->row()->rate,1, '.', ',')."\r\n"."Invoice no: ".$row['invoice_id']."\r\n"."\r\n"."Kimomo Safaris Team"."\r\n"."Contact: ‭".$this->db->get_where('settings', array('type' => 'phone'))->row()->description;
        
        
//              $curl = curl_init();
//             curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//             curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

//             curl_setopt_array($curl, array(
//               CURLOPT_URL => "https://api.mista.io/sms",
//               CURLOPT_RETURNTRANSFER => true,
//               CURLOPT_ENCODING => "",
//               CURLOPT_MAXREDIRS => 10,
//               CURLOPT_TIMEOUT => 0,
//               CURLOPT_FOLLOWLOCATION => false,
//               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//               CURLOPT_CUSTOMREQUEST => "POST",
//               CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'K-Safaris','sms' => $message2,'unicode' => '1'),
//               CURLOPT_HTTPHEADER => array(
//                 "x-api-key: dmlBPXZGRmRPYk1qc3B6cEZ2enQ="
//               ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//             // End SMS notification

            

//             echo "<script>alert('Reminder sent successfully');
//                 window.location.href='https://kimomosafaris.com/admin/invoices';</script>";

//     }

//     function transactions(){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');

//         $page_data['page_name']  = 'transactions';
//         $page_data['page_title'] = 'Transactions';
//         $this->load->view('backend/index', $page_data);
//     }
//     function payments(){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');

//         $page_data['page_name']  = 'payments';
//         $page_data['page_title'] = 'Payments';
//         $this->load->view('backend/index', $page_data);
//     }
//     function quotations(){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');

//         $page_data['page_name']  = 'quotations';
//         $page_data['page_title'] = 'Quotations';
//         $this->load->view('backend/index', $page_data);
//     }
//     function quotation_edit($param1 = ""){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');

//         $page_data['page_name']  = 'quotation_edit';
//         $page_data['page_title'] = 'Quotations';
//         $page_data['id']         = $param1;
//         $this->load->view('backend/index', $page_data);
//     }
//     function edit_quotation($param1 = ""){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');
//         if($this->input->post('status') ==2){
//             echo "Celos";
//         }
//         if($this->input->post('status') == 1){
//                 $data['comment']            = $this->input->post('comment');
//                 $data['actual_budget']      = $this->input->post('actual_budget');
//                 $data['status']             = 1;

//                 $this->db->where('id', $param1);
//                 $this->db->update('quotation', $data);

//                 $user_id = $this->db->get_where('quotation', array('id' => $param1))->row()->user_id;

//                 $data1['amount']        = $this->input->post('actual_budget')/($this->db->get_where('currency', array('name' => 'USD'))->row()->rate);
//                 $data1['user_id']       = $user_id;
//                 $data1['type']          = "Quotation confirmed";
//                 $data1['invoice_name']  = "Quotation (destination: ".$this->db->get_where('places', array('place_id' => $this->db->get_where('quotation', array('id' => $param1))->row()->place_code))->row()->name.")";


//                 $query = $this->db->get('invoice');
//                 $records = $query->num_rows()+1;
//                 $data1['invoice_id'] = "QT".$records."".date('my');

//                 $this->db->insert('invoice', $data1);

//                 $user = $this->db->get_where('user', array('id' => $user_id))->result_array();
//                 foreach($user as $row):
//                     $data2['transaction_ref']   = $data1['invoice_id'];
//                     $data2['transaction_id']     = rand(100,999)."".date('my');
//                     $data2['payer']             = $row['name'];
//                     $data2['email']             = $row['email'];
//                     $data2['phone']             = $row['phone'];
//                     $data2['debit']             = $data1['amount'];
//                     $data2['credit']            = "";
//                     $data2['user_id']           = $user_id;
//                     $data2['invoice']           = $data1['invoice_id'];
//                     $data2['description']       = $data1['invoice_name'];
//                     $data2['status']            = "successful";

//                     $chrList = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//                     $chrRepeatMin = 1; // Minimum times to repeat the seed string
//                     $chrRepeatMax = 10; // Maximum times to repeat the seed string
//                     $chrRandomLength = 30;
//                     $data2['rand_id'] =  substr(str_shuffle(str_repeat($chrList, mt_rand($chrRepeatMin,$chrRepeatMax))), 1, $chrRandomLength).date('mdyhis');

//                     $this->db->insert('transactions', $data2);


//                     // Begin SMS notification
//             $phone_input = $row['phone'];
//             if(strlen($phone_input)==10){
//                 $phone = "25".$phone_input;
//             }elseif(strlen($phone_input)==9){
//                 $phone = "250".$phone_input;
//             }else{
            
//             $phone = $phone_input;
//             }
//             $message2 = "Dear ".$data2['payer']."!"."\r\n"."Your quotation for ".$data1['invoice_name']." has been placed. Your invoice ID: ".$data2['invoice']." (USD".$this->input->post('actual_budget').")"."\r\n"."Check your email for more details"."\r\n"."\r\n"."Kimomo Safaris Team"."\r\n".$this->db->get_where('settings', array('type' => 'phone'))->row()->description;
        
        
//              $curl = curl_init();
//             curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//             curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

//             curl_setopt_array($curl, array(
//               CURLOPT_URL => "https://api.mista.io/sms",
//               CURLOPT_RETURNTRANSFER => true,
//               CURLOPT_ENCODING => "",
//               CURLOPT_MAXREDIRS => 10,
//               CURLOPT_TIMEOUT => 0,
//               CURLOPT_FOLLOWLOCATION => false,
//               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//               CURLOPT_CUSTOMREQUEST => "POST",
//               CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'K-Safaris','sms' => $message2,'unicode' => '1'),
//               CURLOPT_HTTPHEADER => array(
//                 "x-api-key: dmlBPXZGRmRPYk1qc3B6cEZ2enQ="
//               ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//             // End SMS notification

//                 endforeach;
//             }
//         redirect(base_url() . 'Admin/quotations', 'refresh');
//     }

//     function create_invoice(){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');

//         $page_data['page_name']  = 'invoice_create';
//         $page_data['page_title'] = 'Create Invoice';
//         $this->load->view('backend/index', $page_data);
//     }
//     function invoice_create($param1 = ""){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');

//         $user = $this->db->get_where('user', array('id' => $param1))->result_array();
//         foreach($user as $row):
//             $data['payer']              = $row['name'];
//             $data['email']              = $row['name'];
//             $data['phone']              = $row['name'];
//         endforeach;

//             $chrList = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//             $chrRepeatMin = 1; // Minimum times to repeat the seed string
//             $chrRepeatMax = 10; // Maximum times to repeat the seed string
//             $chrRandomLength = 30;
//             $data['rand_id'] =  substr(str_shuffle(str_repeat($chrList, mt_rand($chrRepeatMin,$chrRepeatMax))), 1, $chrRandomLength).date('mdyhis');

//             $query = $this->db->get('invoice');
//             $records = $query->num_rows()+1;
//             $data['invoice'] = "INV".$records."".date('my');

//             $data['transaction_ref']    = $data['invoice'];
//             $data['transaction_id']     = rand(100000,999999)."".date('dm');
//             $data['user_id']            = $param1;
//             $data['status']             = "successful";
//             $data['description']        = $this->input->post('description');
//             $data['debit']              = $this->input->post('debit');
//             $data['credit']             = "";

//             $this->db->insert('transactions', $data);


//             $data1['amount']        = $data['debit'];
//             $data1['user_id']       = $data['user_id'];
//             $data1['invoice_id']    = $data['invoice'];
//             $data1['type']          = 'Generated by Admin';
//             $data1['invoice_name']  = $data['description'];

//             $this->db->insert('invoice', $data1);

//             $phone_input = $row['phone'];
//             if(strlen($phone_input)==10){
//                 $phone = "25".$phone_input;
//             }elseif(strlen($phone_input)==9){
//                 $phone = "250".$phone_input;
//             }else{
            
//             $phone = $phone_input;
//             }
//             $amount_usd = $data['debit'] * $this->db->get_where('currency', array('name' => 'USD'))->row()->rate;
//             $message = "Dear ".$data['payer']."!"."\r\n"."An invoice has been created for your account."."\r\n"."Invoice #: ".$data['invoice']."\r\n"."Amount: RWF".$data['debit']." (US$".$amount_usd.")"."\r\n"."\r\n"."Kimomo Safaris Team"."\r\n".$this->db->get_where('settings', array('type' => 'phone'))->row()->description;
        
        
//              $curl = curl_init();
//             curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//             curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

//             curl_setopt_array($curl, array(
//               CURLOPT_URL => "https://api.mista.io/sms",
//               CURLOPT_RETURNTRANSFER => true,
//               CURLOPT_ENCODING => "",
//               CURLOPT_MAXREDIRS => 10,
//               CURLOPT_TIMEOUT => 0,
//               CURLOPT_FOLLOWLOCATION => false,
//               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//               CURLOPT_CUSTOMREQUEST => "POST",
//               CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'K-Safaris','sms' => $message,'unicode' => '1'),
//               CURLOPT_HTTPHEADER => array(
//                 "x-api-key: dmlBPXZGRmRPYk1qc3B6cEZ2enQ="
//               ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//             // End SMS notification

//             redirect(base_url() . 'admin/invoices', 'refresh');
//     }

//     function declare_payment(){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');

//         $page_data['page_name']  = 'payment_create';
//         $page_data['page_title'] = 'Declare Payment';
//         $this->load->view('backend/index', $page_data);
//     }
//     function payment_declare($param1 = ""){
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'Login', 'refresh');

//         $id = $this->input->post('user_id');
//         $invoice_id = $param1;

//         $user = $this->db->get_where('user', array('id' => $id))->result_array();
//         foreach($user as $row):
//             $data['payer']              = $row['name'];
//             $data['email']              = $row['email'];
//             $data['phone']              = $row['phone'];
//         endforeach;

//             $chrList = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//             $chrRepeatMin = 1; // Minimum times to repeat the seed string
//             $chrRepeatMax = 10; // Maximum times to repeat the seed string
//             $chrRandomLength = 30;
//             $data['rand_id'] =  substr(str_shuffle(str_repeat($chrList, mt_rand($chrRepeatMin,$chrRepeatMax))), 1, $chrRandomLength).date('mdyhis');

//             $data['invoice'] = $param1;

//             $data['transaction_ref']    = $data['invoice'];
//             $data['transaction_id']     = rand(100000,999999)."".date('dm');
//             $data['user_id']            = $id;
//             $data['status']             = "successful";
//             $data['description']        = $this->input->post('description');
//             $data['credit']             = $this->input->post('credit');
//             $data['debit']             = "";

//             $this->db->insert('transactions', $data);

//             $phone_input = $row['phone'];
//             if(strlen($phone_input)==10){
//                 $phone = "25".$phone_input;
//             }elseif(strlen($phone_input)==9){
//                 $phone = "250".$phone_input;
//             }else{
            
//             $phone = $phone_input;
//             }
//             $amount_usd = $data['credit'] * $this->db->get_where('currency', array('name' => 'USD'))->row()->rate;
//             $message = "Dear ".$data['payer']."!"."\r\n"."A payment was declared to your account."."\r\n"."Transaction ID: ".$data['transaction_id']."\r\n"."Amount: RWF".$data['credit']." (US$".$amount_usd.")"."\r\n"."\r\n"."Kimomo Safaris Team"."\r\n".$this->db->get_where('settings', array('type' => 'phone'))->row()->description;
        
        
//              $curl = curl_init();
//             curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//             curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

//             curl_setopt_array($curl, array(
//               CURLOPT_URL => "https://api.mista.io/sms",
//               CURLOPT_RETURNTRANSFER => true,
//               CURLOPT_ENCODING => "",
//               CURLOPT_MAXREDIRS => 10,
//               CURLOPT_TIMEOUT => 0,
//               CURLOPT_FOLLOWLOCATION => false,
//               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//               CURLOPT_CUSTOMREQUEST => "POST",
//               CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'K-Safaris','sms' => $message,'unicode' => '1'),
//               CURLOPT_HTTPHEADER => array(
//                 "x-api-key: dmlBPXZGRmRPYk1qc3B6cEZ2enQ="
//               ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//             // End SMS notification

//             redirect(base_url() . 'admin/payments', 'refresh');
//     }





















// // students

//     function add_student()
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         $page_data['page_name']  = 'add_student';
//         $page_data['page_title'] = get_phrase('New-Student');
//         $this->load->view('backend/index', $page_data);
//     }

//     function create_exam($param1 = '', $param2 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');

//         if($param1 == 'create')
//         {
//             $this->Crud_model->create_online_exam();
//             redirect(base_url() . 'index.php?admin/create_exam/', 'refresh');
//         }

//         $page_data['page_name']  = 'create_exam';
//         $page_data['page_title'] = "Add New Online Exam";
//         $this->load->view('backend/index', $page_data);
//     }

//     function exam_detail($param1 = '', $exam_id)
//     {
//         if ($this->session->userdata('admin_login') != 1) 
//         {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url(), 'refresh');
//         }

//         if($param1 == 'questionadd')
//         {
//             $data['exam_id'] = $this->input->post('exam_id');
//             $data['question'] = $this->input->post('question');
//             $data['optiona'] = $this->input->post('optiona');
//             $data['optionb'] = $this->input->post('optionb');
//             $data['optionc'] = $this->input->post('optionc');
//             $data['optiond'] = $this->input->post('optiond');
//             $data['correctanswer'] = $this->input->post('correctanswer');
//             $data['marks'] = $this->input->post('marks');
//             $this->db->insert('questions' , $data);
//             redirect(base_url() . 'index.php?admin/exam_detail/'. $exam_id, 'refresh');
//         }

//         $page_data['page_name']  = 'exam_detail';
//         $page_data['page_title'] =  "Details Exam";
//         $page_data['exam_id']  =  $exam_id;
//         $this->load->view('backend/index', $page_data);
//     }

//     function manage_exams($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');

//        if($param1 == 'edit')
//         {
//             $data['title'] = $this->input->post('title');
//             $data['description'] = $this->input->post('description');
//             $data['availablefrom'] = $this->input->post('availablefrom');
//             $data['availableto'] = $this->input->post('availableto');
//             $data['duration'] = $this->input->post('duration');
//             $data['pass'] = $this->input->post('pass');
//             $data['questions'] = $this->input->post('questions');
//             $this->db->where('exam_id', $param2);
//             $this->db->update('exams', $data);
//             redirect(base_url() . 'index.php?admin/manage_exams/', 'refresh');
//         }
//         if($param1 == 'delete')
//         {
//             $this->db->where('exam_id', $param2);
//             $this->db->delete('exams');
//             redirect(base_url() . 'index.php?admin/manage_exams/', 'refresh');
//         }
       
//         $page_data['exams']   = $this->db->get('exams')->result_array();
//         $page_data['page_name']  = 'manage_exams';
//         $page_data['page_title'] = "Manage Online Exams";
//         $this->load->view('backend/index', $page_data);
//     }

//     function student_bulk($param1 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         if($param1 == 'add_bulk_student') {
//             $names     = $this->input->post('name');
//             $rolls     = $this->input->post('roll');
//             $emails    = $this->input->post('username');
//             $passwords = $this->input->post('password');
//             $date           = strtotime(date("d M,Y"));
//             $phones    = $this->input->post('phone');
//             $genders   = $this->input->post('sex');
//             $student_entries = sizeof($names);
//             for($i = 0; $i < $student_entries; $i++) {
//                 $data['name']     =   $names[$i];
//                 $data['username']    =   $emails[$i];
//                 $data['password'] =   sha1($passwords[$i]);
//                 $data['date']           = strtotime(date("d M,Y"));
//                 $data['phone']    =   $phones[$i];
//                 $data['sex']      =   $genders[$i];
//                 if($data['name'] == '' || $data['username'] == '' || $data['password'] == '')
//                     continue;
//                 $this->db->insert('student' , $data);
//                 $student_id = $this->db->insert_id();
//                 $data2['enroll_code']   =   "EAB" . rand(10*45, 100*98);
//                 $data2['student_id']    =   $student_id;
//                 $data2['class_id']      =   $this->input->post('class_id');
//                 if($this->input->post('section_id') != '') {
//                     $data2['section_id']    =   $this->input->post('section_id');
//                 }
//                 $data2['roll']          =   1;
//                 $data2['date_added']    =   strtotime(date("Y-m-d H:i:s"));
//                 $data2['year']          =   $this->db->get_where('settings' , array(
//                                                 'type' => 'running_year'
//                                             ))->row()->description;
//                 $this->db->insert('enroll' , $data2);
//             }
//             redirect(base_url() . 'index.php?admin/students_area/' . $this->input->post('class_id') , 'refresh');
//         }           
//         $page_data['page_name']  = 'student_bulk';
//         $page_data['page_title'] = get_phrase('Student-Bulk');
//         $this->load->view('backend/index', $page_data);
//     }

//     function student_portal($student_id, $param1='')
//     {
//          if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');

//         $class_id     = $this->db->get_where('enroll' , array(
//             'student_id' => $student_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
//         ))->row()->class_id;

//         $student_name = $this->db->get_where('student' , array('student_id' => $student_id))->row()->name;
//         $class_name   = $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;
//         $system = $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;

//         $page_data['page_name']  = 'student_portal';
//         $page_data['page_title'] =  get_phrase('Student-Portal') . " - " . $system;
//         $page_data['student_id']  =  $student_id;
//         $page_data['class_id']   =   $class_id;

//         $this->load->view('backend/index', $page_data);
//     }

//     function get_sections($class_id)
//     {
//         $page_data['class_id'] = $class_id;
//         $this->load->view('backend/admin/student_bulk_sections' , $page_data);
//     }

//     function manage_pages($param1 = "", $page_id = "")
//     {
//         if ($this->session->userdata('admin_login') != 1)
//         {
//             $this->session->set_userdata('last_page' , current_url());
//             redirect(base_url(), 'refresh');
//         }       

//         if ($param1 == "delete")
//         {
//             $this->Crud_model->delete_page($page_id);
//             redirect(base_url() . 'index.php?admin/manage_pages');
//         }
//         $data['pages_info']             = $this->Crud_model->get_pages();
//         $data['page_name']              = 'manage_pages';
//         $data['page_title']             = "Administrar Páginas Estáticas";
//         $this->load->view('backend/index', $data);
//     }

//     function pages_view($param1 = '' , $param2 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1) {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url(), 'refresh');
//         }
//         if ($param1 == 'page_details') 
//         {
//             $page_data['room_page'] = 'page_details';
//             $page_data['page_id'] = $param2;
//         }
//         $page_data['page_name']   = 'page_details'; 
//         $page_data['page_title']  = $this->db->get_where('pages',array('page_id'=>$param2))->row()->title;
//         $this->load->view('backend/index', $page_data);
//     }

//     function static_page_add()
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');

//         $page_data['page_name']  = 'static_page_add';
//         $page_data['page_title'] = get_phrase('NewPage');
//         $this->load->view('backend/index', $page_data);
//     }


//     function pages($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');

        
//         if ($param1 == 'create') 
//         {
//             $data['title']           = $this->input->post('title');
//             $data['description']           = $this->input->post('description');
//             $data['timestamp']              =   strtotime(date("Y-m-d H:i:s"));
//             $this->db->insert('pages', $data);
            
//             redirect(base_url() . 'index.php?admin/manage_pages/', 'refresh');
//         }
//     }


//      function request($param1 = "", $param2 = "")
//     {
//         if ($this->session->userdata('admin_login') != 1)
//         {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url(), 'refresh');
//         }
                
//         if ($param1 == "accept")
//         {
//             $data['status'] = 1;
//             $this->db->update('request', $data, array('request_id' => $param2));
//             redirect(base_url() . 'index.php?admin/request', 'refresh');
//         }
                
//         if ($param1 == "reject")
//         {
//             $data['status'] = 2;
//             $this->db->update('request', $data, array('request_id' => $param2));
//             redirect(base_url() . 'index.php?admin/request', 'refresh');
//         }
        
//         $data['page_name']  = 'request';
//         $data['page_title'] = get_phrase('Lists-Perms');
//         $this->load->view('backend/index', $data);
//     }

//     function request_student($param1 = "", $param2 = "")
//     {
//         if ($this->session->userdata('admin_login') != 1)
//         {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url(), 'refresh');
//         }
                
//         if ($param1 == "accept")
//         {
//             $data['status'] = 1;
//             $this->db->update('students_request', $data, array('request_id' => $param2));
//             redirect(base_url() . 'index.php?admin/request_student', 'refresh');
//         }
                
//         if ($param1 == "reject")
//         {
//             $data['status'] = 2;
//             $this->db->update('students_request', $data, array('request_id' => $param2));
//             redirect(base_url() . 'index.php?admin/request_student', 'refresh');
//         }
        
//         $data['page_name']  = 'request_student';
//         $data['page_title'] = get_phrase('Lists-Perms');
//         $this->load->view('backend/index', $data);
//     }

//     function report_list($param1 = '', $param2 = '', $param3 = '') 
//     {
//         if ($this->session->userdata('admin_login') != 1) 
//         {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url(), 'refresh');
//         }
//         if ($param1 == 'delete')
//             $this->Crud_model->delete_report($param2);
//         $page_data['page_title'] =   get_phrase('Report-Teacher-List');
//         $page_data['page_name']  = 'report_list';
//         $this->load->view('backend/index', $page_data);
//     }

//      function invoice($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
        
//         if ($param1 == 'create') {
//             $data['student_id']         = $this->input->post('student_id');
//             $data['title']              = "School Fees";
//             $data['description']        = $this->input->post('description');
//             $data['amount']             = $this->input->post('amount');
//             $data['amount_paid']        = $this->input->post('amount_paid');
//             $data['due']                = $data['amount'] - $data['amount_paid'];
//                if ($data['amount_paid'] <$data['amount']) {
//            $data['status']             = "Unpaid";
//             }else  {
//                  $data['status']             = "Paid";
//                         // $data['status']             = $this->input->post('status');
//             }
  
//             //$data['status']             = $this->input->post('status');
//             $data['creation_timestamp'] = strtotime($this->input->post('date'));
//             $data['year']               = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
            
//             $this->db->insert('invoice', $data);
//             $invoice_id = $this->db->insert_id();

//             $data2['invoice_id']        =   $invoice_id;
//             $data2['student_id']        =   $this->input->post('student_id');
//           $data['title']              = "School Fees";
//             $data2['description']       =   $this->input->post('description');
//             $data2['payment_type']      =  'income';
//             $data2['method']            =   $this->input->post('method');
//             $data2['amount']            =   $this->input->post('amount_paid');
//             $data2['timestamp']         =   strtotime($this->input->post('date'));
//             $data2['year']              =  $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
//             $this->db->insert('payment' , $data2);
//             redirect(base_url() . 'index.php?admin/payments', 'refresh');
//         }
//         if ($param1 == 'do_update') {
//             $data['student_id']         = $this->input->post('student_id');
//                $data['title']              = "School Fees";
//             $data['description']        = $this->input->post('description');
//             $data['amount']             = $this->input->post('amount');
//             $data['status']             = $this->input->post('status');
//             $data['creation_timestamp'] = strtotime($this->input->post('date'));
            
//             $this->db->where('invoice_id', $param2);
//             $this->db->update('invoice', $data);
//             redirect(base_url() . 'index.php?admin/students_payments', 'refresh');
//         } else if ($param1 == 'edit') {
//             $page_data['edit_data'] = $this->db->get_where('invoice', array(
//                 'invoice_id' => $param2
//             ))->result_array();
//         }

//         if ($param1 == 'delete') {
//             $this->db->where('invoice_id', $param2);
//             $this->db->delete('invoice');
//             redirect(base_url() . 'index.php?admin/students_payments', 'refresh');
//         }
//         $page_data['page_name']  = 'invoice';
//         $this->db->order_by('creation_timestamp', 'desc');
//         $page_data['invoices'] = $this->db->get('invoice')->result_array();
//         $this->load->view('backend/index', $page_data);
//     }

//     function looking_report($report_code = '') 
//     {
//         if ($this->session->userdata('admin_login') != 1) 
//         {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url(), 'refresh');
//         }
//         $page_data['report_code'] = $report_code;
//         $page_data['page_name'] = 'looking_report';
//         $page_data['page_title'] = get_phrase('Viewing-Report');
//         $this->load->view('backend/index', $page_data);
//     }

//     function reload_report_list() 
//     {
//         $this->load->view('backend/admin/report_list');
//     }

//     function reload_looking_report($report_code = '') 
//     {
//         $page_data['ticket_code'] = $ticket_code;
//         $this->load->view('backend/admin/reload_looking_report', $page_data);
//     }

//     function reload_student() 
//     {
//         $this->load->view('backend/admin/students_area');
//     }

// 	function students_area($class_id = '')
// 	{
// 		if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');
// 		$page_data['page_name']  	= 'students_area';
// 		$page_data['page_title'] 	= get_phrase('Students') ." - ".get_phrase('Class')." : ".
// 		$this->Crud_model->get_class_name($class_id);
// 		$page_data['class_id'] 	= $class_id;
// 		$this->load->view('backend/index', $page_data);
// 	}

//     function marks_area($student_id = '') 
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');
//         $class_id     = $this->db->get_where('enroll' , array(
//             'student_id' => $student_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
//         ))->row()->class_id;
//         $student_name = $this->db->get_where('student' , array('student_id' => $student_id))->row()->name;
//         $class_name   = $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;
//         $page_data['page_name']  =   'marks_area';
//         $page_data['page_title'] =   get_phrase('Marks-Of') . ' ' . $student_name;
//         $page_data['student_id'] =   $student_id;
//         $page_data['class_id']   =   $class_id;
//         $this->load->view('backend/index', $page_data);
//     }

//     function student($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');
//         $running_year = $this->db->get_where('settings' , array(
//             'type' => 'running_year'
//         ))->row()->description;
//         if ($param1 == 'create') {
//             $data['name']           = $this->input->post('name');
//             //$data['username']           = $this->input->post('username');
//             $data['birthday']       = $this->input->post('birthday');
//             $data['date']           = strtotime(date("d M,Y"));
//             $data['sex']            = $this->input->post('sex');
//             //$data['address']        = $this->input->post('address');
//             //$data['phone']          = $this->input->post('phone');
//             //$data['email']          = $this->input->post('email');
//             //$data['password']       = sha1($this->input->post('password'));
//             $data['parent_id']      = $this->input->post('parent_id');
//             $data['parent2_id']      = $this->input->post('parent2_id');
//             //$data['dormitory_id']  = $this->input->post('dormitory_id');
//             //$data['transport_id']  = $this->input->post('transport_id');
//             $data['address'] = " ";
//             $data['phone'] = " ";
//             $data['email'] = " ";
//             $data['password'] = " ";
//             $data['parentphone'] = $this->input->post('parentphone');
//             // $data['username'] = " ";
//             $data['aditional_subjects_id'] = " ";
//             $data['student_code'] = " ";
//             $this->db->insert('student', $data);
//             $student_id = $this->db->insert_id();
//             $data2['student_id']     = $student_id;

//             $reg_number     = $this->db->get('student');
//             $students_count = $reg_number->num_rows();
//             $regnumber     = $students_count + 1; 

//             // $data2['enroll_code'] = "EAB$regnumber";


//             $data2['enroll_code']    = substr(md5(rand(0, 1000000)), 0, 7);
//             $data2['class_id']       = $this->input->post('class_id');
//             if ($this->input->post('section_id') != '') {
//                 $data2['section_id'] = $this->input->post('section_id');
//             }
//             // $data2['roll']           = $this->input->post('roll');
//             $data2['roll'] = "EAB$regnumber";
//             $data2['date_added']     = strtotime(date("Y-m-d H:i:s"));
//             $data2['year']           = $running_year;
//             $this->db->insert('enroll', $data2);
//             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $student_id . '.jpg');
//             redirect(base_url() . 'index.php?admin/students/', 'refresh');
//         }
//         if ($param1 == 'do_update') 
//         {
//             $data['name']           = $this->input->post('name');
//             //$data['username']           = $this->input->post('username');
//             $data['parentphone']          = $this->input->post('parentphone');
//             //$data['address']        = $this->input->post('address');
//             $data['parent_id']      = $this->input->post('parent_id');
//             $data['parent2_id']      = $this->input->post('parent2_id');
//             $data['birthday']       = $this->input->post('birthday');
//             //$data['dormitory_id']   = $this->input->post('dormitory_id');
//             //$data['transport_id']   = $this->input->post('transport_id');
//             $data['student_session'] = 1;
//             //$data['email']          = $this->input->post('email');
//             $this->db->where('student_id', $param2);
//             $this->db->update('student', $data);

//             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $param3 . '.jpg');
//             $this->Crud_model->clear_cache();
//             redirect(base_url() . 'index.php?admin/student_portal/' . $param2, 'refresh');
//         }
//     }

//     function email_exists($email)
//     {
        
//     }

//     function student_promotion($param1 = '' , $param2 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');
//         if($param1 == 'promote') {
//             $running_year  =   $this->input->post('running_year');  
//             $from_class_id =   $this->input->post('promotion_from_class_id'); 
//             $students_of_promotion_class =   $this->db->get_where('enroll' , array(
//                 'class_id' => $from_class_id , 'year' => $running_year
//             ))->result_array();
//             foreach($students_of_promotion_class as $row) {
//                 $enroll_data['enroll_code']     =   substr(md5(rand(0, 1000000)), 0, 7);
//                 $enroll_data['student_id']      =   $row['student_id'];
//                 $enroll_data['class_id']        =   $this->input->post('promotion_status_'.$row['student_id']);
//                 $enroll_data['year']            =   $this->input->post('promotion_year');
//                 $enroll_data['date_added']      =   strtotime(date("Y-m-d H:i:s"));
//                 $this->db->insert('enroll' , $enroll_data);
//             } 
//             redirect(base_url() . 'index.php?admin/student_promotion' , 'refresh');
//         }
//         $page_data['page_title']    = get_phrase('Student-Promotion');
//         $page_data['page_name']  = 'student_promotion';
//         $this->load->view('backend/index', $page_data);
//     }

//     function get_students_to_promote($class_id_from , $class_id_to , $running_year , $promotion_year)
//     {
//         $page_data['class_id_from']     =   $class_id_from;
//         $page_data['class_id_to']       =   $class_id_to;
//         $page_data['running_year']      =   $running_year;
//         $page_data['promotion_year']    =   $promotion_year;
//         $this->load->view('backend/admin/student_promotion_selector' , $page_data);
//     }

//     function parent_profile($parent_id)
//     {
//         if ($this->session->userdata('admin_login') != 1) 
//         {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url(), 'refresh');
//         }
//         $page_data['page_name']  = 'parent_profile';
//         $page_data['page_title'] =  get_phrase('Profile');
//         $page_data['parent_id']  =  $parent_id;
//         $this->load->view('backend/index', $page_data);
//     }

//     function parents($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');
//         if ($param1 == 'create') {
//             $data['name']        			= $this->input->post('name');
//             // $data['username']        			= $this->input->post('username');
//             $data['email']       			= $this->input->post('email');
//             $data['password']    			= sha1($this->input->post('password'));
//             $data['phone']       			= $this->input->post('phone');
//             $data['address']     			= $this->input->post('address');
//             $data['profession']  			= $this->input->post('profession');
//             $this->db->insert('parent', $data);
//             $parent_id     =   $this->db->insert_id();
//         	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/parent_image/' . $parent_id . '.jpg');
//             redirect(base_url() . 'index.php?admin/parents/', 'refresh');
//         }
//         if ($param1 == 'edit') 
//         {
//             $data['name']                   = $this->input->post('name');
//             // $data['username']        		= $this->input->post('username');
//             $data['email']                  = $this->input->post('email');
//             $data['phone']                  = $this->input->post('phone');
//             $data['address']                = $this->input->post('address');
//             $data['profession']             = $this->input->post('profession');
//             $this->db->where('parent_id' , $param2);
//             $this->db->update('parent' , $data);
//             redirect(base_url() . 'index.php?admin/parents/', 'refresh');
//         }
//         if ($param1 == 'delete') 
//         {
//             $this->db->where('parent_id' , $param2);
//             $this->db->delete('parent');
//             redirect(base_url() . 'index.php?admin/parents/', 'refresh');
//         }
//         $page_data['page_title'] 	= get_phrase('Manage-Parents');
//         $page_data['page_name']  = 'parents';
//         $this->load->view('backend/index', $page_data);
//     }

//     function students($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');
//         if ($param1 == 'delete') 
//         {
//             $this->db->where('student_id', $param2);
//             $this->db->delete('enroll');
//             redirect(base_url() . 'index.php?admin/students/', 'refresh');
//         }
        
//         $page_data['page_title']    = get_phrase('Manage-Students');
//         $page_data['page_name']  = 'students';
//         $this->load->view('backend/index', $page_data);
//     }

//     function events($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');
//         if ($param1 == 'create') 
//         {
//             $data['title']         = $this->input->post('title');
//             $data['description']   = $this->input->post('description');
//             $data['datefrom']      = $this->input->post('datefrom');
//             $data['dateto']        = $this->input->post('dateto');

//        $this->db->insert('events', $data);
// // 
//         // $query = $this->db->get('parent')->result_array();
//         // $query = $this->db->get('accountant')->result_array();
//         // $query = $this->db->get('teacher')->result_array();

//         $mistarunning_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;

//         $mista_student_id = $this->db->get_where('enroll' , array('year' => $mistarunning_year))->result_array(); 

//         foreach ($mista_student_id as $row) {  
//         $mistastudent_id =  $row['student_id'];   
//         $mista_parentphone = $this->db->get_where('student' , array('student_id' => $mistastudent_id))->row()->parentphone;
//         $message = $data['description'];

// $curl = curl_init();
//  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//  curl_setopt_array($curl, array(
//  CURLOPT_URL => "https://mistasms.com/sms/api",
//  CURLOPT_RETURNTRANSFER => true,
//  CURLOPT_ENCODING => "",
//  CURLOPT_MAXREDIRS => 10,
//  CURLOPT_TIMEOUT => 0,
//  CURLOPT_FOLLOWLOCATION => false,
//  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//  CURLOPT_CUSTOMREQUEST => "POST",
//  CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $mista_parentphone,'from' => 'EAB','sms' => $message,'api_key'=>'dmlBPXZGRmRPYk1qc3B6cEZ2enQ='),
// ));

// curl_setopt( $curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_WHATEVER);
// $response = curl_exec($curl);
// $err = curl_error($curl);
// curl_close($curl);
// if ($err) {
//  echo "cURL Error #:" . $err;
// }
//         }

//         // teacher
//         $query = $this->db->get('teacher')->result_array();
//         foreach ($query as $row) {
//        $phone = $row['phone'];
//        $message = $data['description'];

// $curl = curl_init();
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt_array($curl, array(
//  CURLOPT_URL => "https://mistasms.com/sms/api",
//  CURLOPT_RETURNTRANSFER => true,
//  CURLOPT_ENCODING => "",
//  CURLOPT_MAXREDIRS => 10,
//  CURLOPT_TIMEOUT => 0,
//  CURLOPT_FOLLOWLOCATION => false,
//  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//  CURLOPT_CUSTOMREQUEST => "POST",
//  CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'EAB','sms' => $message,'api_key' => 'dmlBPXZGRmRPYk1qc3B6cEZ2enQ='),
// ));
// curl_setopt( $curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_WHATEVER);
// $response = curl_exec($curl);
// $err = curl_error($curl);
// curl_close($curl);
// if ($err) {
//  echo "cURL Error #:" . $err;
// }
//         }

//         // accountants

//         $query = $this->db->get('accountant')->result_array();
//         foreach ($query as $row) {

//         $phone = $row['phone'];
//         $message = $data['description'];

// $curl = curl_init();
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt_array($curl, array(
//  CURLOPT_URL => "https://mistasms.com/sms/api",
//  CURLOPT_RETURNTRANSFER => true,
//  CURLOPT_ENCODING => "",
//  CURLOPT_MAXREDIRS => 10,
//  CURLOPT_TIMEOUT => 0,
//  CURLOPT_FOLLOWLOCATION => false,
//  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//  CURLOPT_CUSTOMREQUEST => "POST",
//  CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => $phone,'from' => 'EAB','sms' => $message,'api_key'=>'dmlBPXZGRmRPYk1qc3B6cEZ2enQ='),
// ));

// curl_setopt( $curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_WHATEVER);
// $response = curl_exec($curl);
// $err = curl_error($curl);
// curl_close($curl);
// if ($err) {
//  echo "cURL Error #:" . $err;
// }
//         }
//     redirect(base_url() . 'index.php?admin/events/', 'refresh');

//         }

//         if ($param1 == 'edit') 
//         {
//             $data['title']         = $this->input->post('title');
//             $data['description']   = $this->input->post('description');
//             $data['datefrom']      = $this->input->post('datefrom');
//             $data['dateto']        = $this->input->post('dateto');
//             $this->db->where('event_id' , $param2);
//             $this->db->update('events' , $data);
//             redirect(base_url() . 'index.php?admin/events/', 'refresh');
//         }
//         if ($param1 == 'delete') 
//         {
//             $this->db->where('event_id' , $param2);
//             $this->db->delete('events');
//             redirect(base_url() . 'index.php?admin/events/', 'refresh');
//         }
//         $page_data['page_title']    = get_phrase('Events');
//         $page_data['page_name']  = 'events';
//         $this->load->view('backend/index', $page_data);
//     }

//     function courses($param1 = '', $param2 = '' , $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         if ($param1 == 'create') {
//             $data['name']       = $this->input->post('name');
//             $data['maximum']       = $this->input->post('maximum');
//             $data['class_id']   = $this->input->post('class_id');
//             $data['teacher_id'] = $this->input->post('teacher_id');
//             $data['year']       = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
//             $this->db->insert('subject', $data);
//             redirect(base_url() . 'index.php?admin/courses/'.$data['class_id'], 'refresh');
//         }
//         if ($param1 == 'do_update') 
//         {
//             $data['name']       = $this->input->post('name');
//             $data['maximum']       = $this->input->post('maximum');
//             $data['la1']       = $this->input->post('la1');
//             $data['la2']       = $this->input->post('la2');
//             $data['la3']       = $this->input->post('la3');
//             $data['la4']       = $this->input->post('la4');
//             $data['la5']       = $this->input->post('la5');
//             $data['la6']       = $this->input->post('la6');
//             $data['la7']       = $this->input->post('la7');
//             $data['la8']       = $this->input->post('la8');
//             $data['la9']       = $this->input->post('la9');
//             $data['final']       = $this->input->post('final');
//             $data['class_id']   = $this->input->post('class_id');
//             $data['teacher_id'] = $this->input->post('teacher_id');
//             $data['year']       = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
            
//             $this->db->where('subject_id', $param2);
//             $this->db->update('subject', $data);
//             redirect(base_url() . 'index.php?admin/courses/'.$data['class_id'], 'refresh');
//         } else if ($param1 == 'edit') {
//             $page_data['edit_data'] = $this->db->get_where('subject', array(
//                 'subject_id' => $param2
//             ))->result_array();
//         }
//         if ($param1 == 'delete') {
//             $this->db->where('subject_id', $param2);
//             $this->db->delete('subject');
//             redirect(base_url() . 'index.php?admin/courses/'.$param3, 'refresh');
//         }
//         $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
// 		$page_data['class_id']   = $param1;
//         $page_data['subjects']   =  $this->db->get_where('subject', array('class_id' => $param1,'year' => $running_year))->result_array();
//         $page_data['page_name']  = 'courses';
//         $page_data['page_title'] = get_phrase('Manage-Subjects');
//         $this->load->view('backend/index', $page_data);

//         // $page_data['classes']    = $this->db->get('class')->result_array();
//         // $page_data['page_name']  = 'manage_class';
//         // $page_data['page_title'] = get_phrase('Manage-Classes');
//         // $this->load->view('backend/index', $page_data);
//     }
    

//     function manage_classes($param1 = '', $param2 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         if ($param1 == 'create') {
//             $data['name']         = $this->input->post('name');
//             $data['teacher_id']   = $this->input->post('teacher_id');
//             $data['name_numeric']   = $this->input->post('name');
//             $this->db->insert('class', $data);
//             $class_id = $this->db->insert_id();
//             $data2['class_id']  =   $class_id;
//             $data2['name']      =   'A';
//             $this->db->insert('section' , $data2);
//             redirect(base_url() . 'index.php?admin/manage_classes/', 'refresh');
//         }
//         if ($param1 == 'do_update')
//         {
//             $data['name']         = $this->input->post('name');
//             $data['teacher_id']   = $this->input->post('teacher_id');
            
//             $this->db->where('class_id', $param2);
//             $this->db->update('class', $data);
//             redirect(base_url() . 'index.php?admin/manage_classes/', 'refresh');
//         } else if ($param1 == 'edit') 
//         {
//             $page_data['edit_data'] = $this->db->get_where('class', array(
//                 'class_id' => $param2
//             ))->result_array();
//         }
//         if ($param1 == 'delete') 
//         {
//             $this->db->where('class_id', $param2);
//             $this->db->delete('class');
//             redirect(base_url() . 'index.php?admin/manage_classes/', 'refresh');
//         }
//         $page_data['classes']    = $this->db->get('class')->result_array();
//         $page_data['page_name']  = 'manage_class';
//         $page_data['page_title'] = get_phrase('Manage-Classes');
//         $this->load->view('backend/index', $page_data);
//     }

//     function get_subject($class_id) 
//     {
//         $subject = $this->db->get_where('subject' , array(
//             'class_id' => $class_id
//         ))->result_array();
//         foreach ($subject as $row) {
//             echo '<option value="' . $row['subject_id'] . '">' . $row['name'] . '</option>';
//         }
//     }

//     function virtual_library($class_id = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         if ($class_id == '')
//             $class_id           =   $this->db->get('class')->first_row()->class_id;

//         $page_data['page_name']  = 'virtual_library';
//         $page_data['page_title'] = get_phrase('Virtual-Library');
//         $page_data['class_id']   = $class_id;
//         $this->load->view('backend/index', $page_data);
//     }

//     function upload_book()
//     {
//         $data['libro_code'] =   substr(md5(rand(0, 1000000)), 0, 7);
//         $data['nombre']                 =   $this->input->post('nombre');
//         $data['autor']                  =   $this->input->post('autor');
//         $data['description']            =   $this->input->post('description');
//         $data['class_id']               =   $this->input->post('class_id');
//         $data['subject_id']             =   $this->input->post('subject_id');
//         $data['uploader_type']          =   $this->session->userdata('login_type');
//         $data['uploader_id']            =   $this->session->userdata('login_user_id');
//         $data['year']                   =   $this->db->get_where('settings',array('type'=>'running_year'))->row()->description;
//         $data['timestamp']              =   strtotime(date("Y-m-d H:i:s"));
//         $files = $_FILES['file_name'];
//         $this->load->library('upload');
//         $config['upload_path']   =  'uploads/libreria/';
//         $config['allowed_types'] =  '*';
//         $_FILES['file_name']['name']     = $files['name'];
//         $_FILES['file_name']['type']     = $files['type'];
//         $_FILES['file_name']['tmp_name'] = $files['tmp_name'];
//         $_FILES['file_name']['size']     = $files['size'];
//         $this->upload->initialize($config);
//         $this->upload->do_upload('file_name');
//         $data['file_name'] = $_FILES['file_name']['name'];
//         $this->db->insert('libreria', $data);
//         redirect(base_url() . 'index.php?admin/virtual_library/' . $data['class_id'] , 'refresh');
//     }

//     function download_book($libro_code)
//     {
//         $file_name = $this->db->get_where('libreria', array('libro_code' => $libro_code
//         ))->row()->file_name;
//         $this->load->helper('download');
//         $data = file_get_contents("uploads/libreria/" . $file_name);
//         $name = $file_name;
//         force_download($name, $data);
//     }

//     function delete_book($libro_id)
//     {
//         $this->Crud_model->delete_book($libro_id);
//         redirect(base_url() . 'index.php?admin/virtual_library/' . $data['class_id'] , 'refresh');
//     }

//     function section($class_id = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         if ($class_id == '')
//             $class_id           =   $this->db->get('class')->first_row()->class_id;
//         $page_data['page_name']  = 'section';
//         $page_data['page_title'] = get_phrase('Manage-Sections');
//         $page_data['class_id']   = $class_id;
//         $this->load->view('backend/index', $page_data);    
//     }

//     function gallery_category($class_id = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
    
//         $page_data['page_name']  = 'gallery_category';
//         $page_data['page_title'] = get_phrase('Gallery');
//         $this->load->view('backend/index', $page_data);    
//     }

//     function video_detail($category_id = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         if ($category_id == '')
//             $category_id           =   $this->db->get('gallery_category')->first_row()->category_id;
//         $page_data['page_name']  = 'video_detail';
//         $page_data['page_title'] = get_phrase('Gallery');
//         $page_data['category_id']   = $category_id;
//         $this->load->view('backend/index', $page_data);    
//     }

//     function sections($param1 = '' , $param2 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         if ($param1 == 'create') {
//             $data['name']       =   $this->input->post('name');
//             $data['class_id']   =   $this->input->post('class_id');
//             $data['teacher_id'] =   $this->input->post('teacher_id');
//             $this->db->insert('section' , $data);
//             redirect(base_url() . 'index.php?admin/section/' . $data['class_id'] , 'refresh');
//         }
//         if ($param1 == 'edit') {
//             $data['name']       =   $this->input->post('name');
//             $data['class_id']   =   $this->input->post('class_id');
//             $data['teacher_id'] =   $this->input->post('teacher_id');
//             $this->db->where('section_id' , $param2);
//             $this->db->update('section' , $data);
//             redirect(base_url() . 'index.php?admin/section/' . $data['class_id'] , 'refresh');
//         }
//         if ($param1 == 'delete') 
//         {
//             $this->db->where('section_id' , $param2);
//             $this->db->delete('section');
//             redirect(base_url() . 'index.php?admin/section' , 'refresh');
//         }
//     }

//     function gall_category($param1 = '' , $param2 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         if ($param1 == 'create') 
//         {
//             $data['title']         =  $this->input->post('title');
//             $data['embed']          =   $this->input->post('embed');
//             $data['description']  =   $this->input->post('description');
//             $this->db->insert('gallery_category' , $data);
//             $category_id = $this->db->insert_id();
//             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/screen/' . $category_id . '.jpg');
//             redirect(base_url() . 'index.php?admin/gallery_category/', 'refresh');
//         }
//         if ($param1 == 'edit') 
//         {
//             $data['title']       =   $this->input->post('title');
//             $data['embed']          =   $this->input->post('embed');
//             $data['description']   =   $this->input->post('description');
//             $this->db->where('category_id' , $param2);
//             $this->db->update('gallery_category' , $data);
//             redirect(base_url() . 'index.php?admin/gallery_category/', 'refresh');
//         }
//         if ($param1 == 'delete') 
//         {
//             $this->db->where('category_id' , $param2);
//             $this->db->delete('gallery_category');
//             redirect(base_url() . 'index.php?admin/gallery_category' , 'refresh');
//         }
//     }

//     function get_class_section($class_id)
//     {
//         $sections = $this->db->get_where('section' , array('class_id' => $class_id
//         ))->result_array();
//         foreach ($sections as $row) {
//         echo '<option value="' . $row['section_id'] . '">' . $row['name'] . '</option>';
//         }
//     }

//     function get_class_subject($class_id)
//     {
//         $subjects = $this->db->get_where('subject' , array('class_id' => $class_id
//         ))->result_array();
//         foreach ($subjects as $row) 
//         {
//             echo '<option value="' . $row['subject_id'] . '">' . $row['name'] . '</option>';
//         }
//     }

//     function get_class_students($class_id)
//     {
//         $students = $this->db->get_where('enroll' , array(
//             'class_id' => $class_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
//         ))->result_array();
//         foreach ($students as $row) {
//             $name = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;
//             echo '<option value="' . $row['student_id'] . '">' . $name . '</option>';
//         }
//     }

//     function semesters($param1 = '', $param2 = '' , $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         if ($param1 == 'create') 
//         {
//             $data['name']    = $this->input->post('name');
//             $data['comment'] = $this->input->post('comment');
//             $data['year']    = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
//             $this->db->insert('exam', $data);
//             redirect(base_url() . 'index.php?admin/semesters/', 'refresh');
//         }
//         if ($param1 == 'edit' && $param2 == 'do_update') 
//         {
//             $data['name']    = $this->input->post('name');
//             $data['comment'] = $this->input->post('comment');
//             $data['year']    = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
            
//             $this->db->where('exam_id', $param3);
//             $this->db->update('exam', $data);
//             redirect(base_url() . 'index.php?admin/semesters/', 'refresh');
//         } else if ($param1 == 'edit') 
//         {
//             $page_data['edit_data'] = $this->db->get_where('exam', array(
//                 'exam_id' => $param2
//             ))->result_array();
//         }
//         if ($param1 == 'delete') {
//             $this->db->where('exam_id', $param2);
//             $this->db->delete('exam');
//             redirect(base_url() . 'index.php?admin/semesters/', 'refresh');
//         }
//         $page_data['exams']      = $this->db->get('exam')->result_array();
//         $page_data['page_name']  = 'semester';
//         $page_data['page_title'] = get_phrase('Semesters');
//         $this->load->view('backend/index', $page_data);
//     }

//     function upload_marks()
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         $page_data['page_name']  =   'upload_marks';
//         $page_data['page_title'] = get_phrase('Upload-Marks');
//         $this->load->view('backend/index', $page_data);
//     }

//     function marks_upload($exam_id = '' , $class_id = '' , $section_id = '' , $subject_id = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         $page_data['exam_id']    =   $exam_id;
//         $page_data['class_id']   =   $class_id;
//         $page_data['subject_id'] =   $subject_id;
//         $page_data['section_id'] =   $section_id;
//         $page_data['page_name']  =   'marks_upload';
//         $page_data['page_title'] = get_phrase('Upload-Marks');
//         $this->load->view('backend/index', $page_data);
//     }

//     function marks_selector()
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');

//         $data['exam_id']    = $this->input->post('exam_id');
//         $data['class_id']   = $this->input->post('class_id');
//         $data['section_id'] = $this->input->post('section_id');
//         $data['subject_id'] = $this->input->post('subject_id');
//         $data['year']       = $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;
//         $query = $this->db->get_where('mark' , array(
//                     'exam_id' => $data['exam_id'],
//                         'class_id' => $data['class_id'],
//                             'section_id' => $data['section_id'],
//                                 'subject_id' => $data['subject_id'],
//                                     'year' => $data['year']));
//         if($query->num_rows() < 1) 
//         {
//             $students = $this->db->get_where('enroll' , array(
//                 'class_id' => $data['class_id'], 'year' => $data['year']))->result_array();
//             foreach($students as $row) 
//             {
//                 $data['student_id'] = $row['student_id'];
//                 $this->db->insert('mark' , $data);
//             }
//         }
//         redirect(base_url() . 'index.php?admin/marks_upload/' . $data['exam_id'] . '/' . $data['class_id'] . '/' . $data['section_id'] . '/' . $data['subject_id'] , 'refresh');
//     }

//     function marks_update($exam_id = '' , $class_id = '' , $section_id = '' , $subject_id = '')
//     {
//         $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
//         $marks_of_students = $this->db->get_where('mark' , array(
//         'exam_id' => $exam_id, 'class_id' => $class_id,
//         'section_id' => $section_id, 'year' => $running_year,
//         'subject_id' => $subject_id))->result_array();
//         foreach($marks_of_students as $row) {
//             $obtained_marks = $this->input->post('marks_obtained_'.$row['mark_id']);
//             $labouno = $this->input->post('lab_uno_'.$row['mark_id']);
//             // $labodos = $this->input->post('lab_dos_'.$row['mark_id']);
//             // $labotres = $this->input->post('lab_tres_'.$row['mark_id']);
//             // $labocuatro = $this->input->post('lab_cuatro_'.$row['mark_id']);
//             // $labocinco = $this->input->post('lab_cinco_'.$row['mark_id']);
//             // $laboseis = $this->input->post('lab_seis_'.$row['mark_id']);
//             // $labosiete = $this->input->post('lab_siete_'.$row['mark_id']);
//             // $laboocho = $this->input->post('lab_ocho_'.$row['mark_id']);
//             $comment = $this->input->post('comment_'.$row['mark_id']);
//             // $labonueve = $this->input->post('lab_nueve_'.$row['mark_id']);
//             // $labototal = $obtained_marks + $labouno + $labodos + $labotres + $labocuatro + $labocinco + $laboseis + $labosiete + $laboocho + $labonueve;
//             $labototal = $obtained_marks + $labouno;

//             $this->db->where('mark_id' , $row['mark_id']);
//             $this->db->update('mark' , array('mark_obtained' => $obtained_marks , 'labuno' => $labouno, 'comment' => $comment));
//         }
//         redirect(base_url().'index.php?admin/marks_upload/'.$exam_id.'/'.$class_id.'/'.$section_id.'/'.$subject_id , 'refresh');
//     }

//     function tab_sheet($class_id = '' , $exam_id = '') {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
        
//         if ($this->input->post('operation') == 'selection') {
//             $page_data['exam_id']    = $this->input->post('exam_id');
//             $page_data['class_id']   = $this->input->post('class_id');
            
//             if ($page_data['exam_id'] > 0 && $page_data['class_id'] > 0) {
//                 redirect(base_url() . 'index.php?admin/tab_sheet/' . $page_data['class_id'] . '/' . $page_data['exam_id'] , 'refresh');
//             } else {
//                 redirect(base_url() . 'index.php?admin/tab_sheet/', 'refresh');
//             }
//         }
//         $page_data['exam_id']    = $exam_id;
//         $page_data['class_id']   = $class_id;
        
//         $page_data['page_info'] = 'Exam marks';
        
//         $page_data['page_name']  = 'tab_sheet';
//         $page_data['page_title'] = get_phrase('Tabulation');
//         $this->load->view('backend/index', $page_data);
    
//     }

//     function tab_sheet_print($class_id , $exam_id) {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         $page_data['class_id'] = $class_id;
//         $page_data['exam_id']  = $exam_id;
//         $this->load->view('backend/admin/tab_sheet_print' , $page_data);
//     }

//     function marks_get_subject($class_id)
//     {
//         $page_data['class_id'] = $class_id;
//         $this->load->view('backend/admin/marks_get_subject' , $page_data);
//     }

//     function class_routine($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         if ($param1 == 'create') {
//             $data['class_id']       = $this->input->post('class_id');
//             if($this->input->post('section_id') != '') {
//                 $data['section_id'] = $this->input->post('section_id');
//             }
//             $data['subject_id']     = $this->input->post('subject_id');
//             $data['time_start']     = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
//             $data['time_end']       = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
//             $data['time_start_min'] = $this->input->post('time_start_min');
//             $data['time_end_min']   = $this->input->post('time_end_min');
//             $data['day']            = $this->input->post('day');
//             $data['year']           = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
//             $this->db->insert('class_routine', $data);
//             redirect(base_url() . 'index.php?admin/class_routine_add/', 'refresh');
//         }
//         if ($param1 == 'do_update') {
//             $data['class_id']       = $this->input->post('class_id');
//             if($this->input->post('section_id') != '') {
//                 $data['section_id'] = $this->input->post('section_id');
//             }
//             $data['subject_id']     = $this->input->post('subject_id');
//             $data['time_start']     = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
//             $data['time_end']       = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
//             $data['time_start_min'] = $this->input->post('time_start_min');
//             $data['time_end_min']   = $this->input->post('time_end_min');
//             $data['day']            = $this->input->post('day');
//             $data['year']           = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
            
//             $this->db->where('class_routine_id', $param2);
//             $this->db->update('class_routine', $data);
//             redirect(base_url() . 'index.php?admin/class_routine_view/' . $data['class_id'], 'refresh');
//         } else if ($param1 == 'edit') {
//             $page_data['edit_data'] = $this->db->get_where('class_routine', array(
//                 'class_routine_id' => $param2
//             ))->result_array();
//         }
//         if ($param1 == 'delete') {
//             $class_id = $this->db->get_where('class_routine' , array('class_routine_id' => $param2))->row()->class_id;
//             $this->db->where('class_routine_id', $param2);
//             $this->db->delete('class_routine');
//             redirect(base_url() . 'index.php?admin/class_routine_view/' . $class_id, 'refresh');
//         } 
//     }

//     function exam_routine($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         if ($param1 == 'create') {
//             $data['class_id']       = $this->input->post('class_id');
//             if($this->input->post('section_id') != '') {
//                 $data['section_id'] = $this->input->post('section_id');
//             }
//             $data['subject_id']     = $this->input->post('subject_id');
//             $data['time_start']     = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
//             $data['time_end']       = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
//             $data['time_start_min'] = $this->input->post('time_start_min');
//             $data['time_end_min']   = $this->input->post('time_end_min');
//             $data['fecha']          = $this->input->post('fecha');
//             $data['day']            = $this->input->post('day');
//             $data['year']           = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
//             $this->db->insert('horarios_examenes', $data);
//             redirect(base_url() . 'index.php?admin/add_exam_routine/', 'refresh');
//         }
//         if ($param1 == 'do_update') {
//             $data['class_id']       = $this->input->post('class_id');
//             if($this->input->post('section_id') != '') {
//                 $data['section_id'] = $this->input->post('section_id');
//             }
//             $data['subject_id']     = $this->input->post('subject_id');
//             $data['time_start']     = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
//             $data['time_end']       = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
//             $data['time_start_min'] = $this->input->post('time_start_min');
//             $data['time_end_min']   = $this->input->post('time_end_min');
//             $data['fecha']          = $this->input->post('fecha');
//             $data['day']            = $this->input->post('day');
//             $data['year']           = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
//             $this->db->where('horario_id', $param2);
//             $this->db->update('horarios_examenes', $data);
//             redirect(base_url() . 'index.php?admin/looking_routine/' . $data['class_id'], 'refresh');
//         } else if ($param1 == 'edit') 
//         {
//             $page_data['edit_data'] = $this->db->get_where('horarios_examenes', array(
//                 'horaio_id' => $param2))->result_array();
//         }
//         if ($param1 == 'delete') {
//             $class_id = $this->db->get_where('horarios_examenes' , array('horario_id' => $param2))->row()->class_id;
//             $this->db->where('horario_id', $param2);
//             $this->db->delete('horarios_examenes');
//             redirect(base_url() . 'index.php?admin/looking_routine/' . $class_id, 'refresh');
//         }
//     }

//     function looking_routine($class_id)
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         $page_data['page_name']  = 'looking_routine';
//         $page_data['class_id']  =   $class_id;
//         $page_data['page_title'] = "Horarios de evaluaciones";
//         $this->load->view('backend/index', $page_data);
//     }

//     function add_exam_routine()
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         $page_data['page_name']  = 'add_exam_routine';
//         $page_data['page_title'] = get_phrase('Exam-Routine');
//         $this->load->view('backend/index', $page_data);
//     }

//     function videos()
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         $page_data['page_name']  = 'videos';
//         $page_data['page_title'] = get_phrase('GalleryPic');
//         $this->load->view('backend/index', $page_data);
//     }

//     function add_gallery_image()
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         $page_data['page_name']  = 'add_gallery_image';
//         $page_data['page_title'] = get_phrase('GalleryPic');
//         $this->load->view('backend/index', $page_data);
//     }

//     function class_routine_add()
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         $page_data['page_name']  = 'class_routine_add';
//         $page_data['page_title'] = get_phrase('Class-Routine');
//         $this->load->view('backend/index', $page_data);
//     }

//     function class_routine_view($class_id)
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         $page_data['page_name']  = 'class_routine_view';
//         $page_data['class_id']  =   $class_id;
//         $page_data['page_title'] = get_phrase('Class-Routine');
//         $this->load->view('backend/index', $page_data);
//     }

//     function get_class_section_subject($class_id)
//     {
//         $page_data['class_id'] = $class_id;
//         $this->load->view('backend/admin/class_routine_section_subject_selector' , $page_data);
//     }

//     function section_subject_edit($class_id , $class_routine_id)
//     {
//         $page_data['class_id']          =   $class_id;
//         $page_data['class_routine_id']  =   $class_routine_id;
//         $this->load->view('backend/admin/class_routine_section_subject_edit' , $page_data);
//     }

//     function attendance()
//     {
//         if($this->session->userdata('admin_login')!=1)
//             redirect(base_url() , 'refresh');
        
//         $page_data['page_name']  =  'attendance';
//         $page_data['page_title'] =  get_phrase('Attendance');
//         $this->load->view('backend/index', $page_data);
//     }

//     function manage_attendance($class_id = '' , $section_id = '' , $timestamp = '')
//     {
//         if($this->session->userdata('admin_login')!=1)
//             redirect(base_url() , 'refresh');
//         $class_name = $this->db->get_where('class' , array(
//             'class_id' => $class_id
//         ))->row()->name;
//         $page_data['class_id'] = $class_id;
//         $page_data['timestamp'] = $timestamp;
//         $page_data['page_name'] = 'manage_attendance';
//         $section_name = $this->db->get_where('section' , array(
//             'section_id' => $section_id
//         ))->row()->name;
//         $page_data['section_id'] = $section_id;
//         $page_data['page_title'] = get_phrase('Attendance');
//         $this->load->view('backend/index', $page_data);
//     }

//     function get_section($class_id) 
//     {
//           $page_data['class_id'] = $class_id; 
//           $this->load->view('backend/admin/manage_attendance_section_holder' , $page_data);
//     }

//     function attendance_selector()
//     {
//         $data['class_id']   = $this->input->post('class_id');
//         $data['year']       = $this->input->post('year');
//         $data['timestamp']  = strtotime($this->input->post('timestamp'));
//         $data['section_id'] = $this->input->post('section_id');
//         $query = $this->db->get_where('attendance' ,array(
//             'class_id'=>$data['class_id'],
//                 'section_id'=>$data['section_id'],
//                     'year'=>$data['year'],
//                         'timestamp'=>$data['timestamp']));
//         if($query->num_rows() < 1) 
//         {
//             $students = $this->db->get_where('enroll' , array(
//                 'class_id' => $data['class_id'] , 'section_id' => $data['section_id'] , 'year' => $data['year']
//             ))->result_array();
//             foreach($students as $row) {
//                 $attn_data['class_id']   = $data['class_id'];
//                 $attn_data['year']       = $data['year'];
//                 $attn_data['timestamp']  = $data['timestamp'];
//                 $attn_data['section_id'] = $data['section_id'];
//                 $attn_data['student_id'] = $row['student_id'];
//                 $this->db->insert('attendance' , $attn_data);  
//             }
//         }
//         redirect(base_url().'index.php?admin/manage_attendance/'.$data['class_id'].'/'.$data['section_id'].'/'.$data['timestamp'],'refresh');
//     }

//     function attendance_update($class_id = '' , $section_id = '' , $timestamp = '')
//     {
//         $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
//         $attendance_of_students = $this->db->get_where('attendance' , array(
//             'class_id'=>$class_id,'section_id'=>$section_id,'year'=>$running_year,'timestamp'=>$timestamp))->result_array();
//         foreach($attendance_of_students as $row) {
//             $attendance_status = $this->input->post('status_'.$row['attendance_id']);
//             $attendance_comment = $this->input->post('comment_'.$row['attendance_id']);

//             $this->db->where('attendance_id' , $row['attendance_id']);
//             $this->db->update('attendance' , array('status' => $attendance_status, 'comment' => $attendance_comment));
//         }
//         redirect(base_url().'index.php?admin/manage_attendance/'.$class_id.'/'.$section_id.'/'.$timestamp , 'refresh');
//     }

//      function attendance_report() 
//      {
//          $page_data['month']        = date('m');
//          $page_data['page_name']    = 'attendance_report';
//          $page_data['page_title']   = get_phrase('Attendance-Report');
//          $this->load->view('backend/index',$page_data);
//      }

//      function report_attendance_view($class_id = '' , $section_id = '', $month = '') 
//      {
//          if($this->session->userdata('admin_login')!=1)
//             redirect(base_url() , 'refresh');
//         $class_name = $this->db->get_where('class' , array(
//             'class_id' => $class_id
//         ))->row()->name;
//         $page_data['class_id'] = $class_id;
//         $page_data['month']    = $month;
//         $page_data['page_name'] = 'report_attendance_view';
//         $section_name = $this->db->get_where('section' , array(
//             'section_id' => $section_id
//         ))->row()->name;
//         $page_data['section_id'] = $section_id;
//         $page_data['page_title'] = get_phrase('Attendance-Report');
//         $this->load->view('backend/index', $page_data);
//      }

//     function news_view($param1 = '' , $param2 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1) {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url(), 'refresh');
//         }
//         else if ($param1 == 'details') 
//         {
//             $page_data['room_page'] = 'details';
//             $page_data['news_code'] = $param2;
//         }
//         $page_data['page_name']   = 'news_room'; 
//         $page_data['page_title']  = get_phrase('Details');
//         $page_data['page_title'] .=  ": " . $this->db->get_where('news',array('news_code'=>$param2))->row()->title;
//         $this->load->view('backend/index', $page_data);
//     }

//     function news_message($param1 = '', $param2 = '', $param3 = '') 
//     {
//         if ($this->session->userdata('admin_login') != 1) {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url(), 'refresh');
//         }
//         if ($param1 == 'add') 
//         {
//             $this->Crud_model->create_news_message($param2);
//             redirect(base_url() . 'index.php?admin/news_view/details/' . $param2, 'refresh');
//         }
//     }

//     function notice_message($param1 = '', $param2 = '', $param3 = '') 
//     {
//         if ($this->session->userdata('admin_login') != 1) {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url(), 'refresh');
//         }
//         if ($param1 == 'add') 
//         {
//             $this->Crud_model->create_notice_message($param2);
//         }
//     }

//     function reload_comment($news_code = '') 
//     {
//         $page_data['news_code'] =   $news_code;
//         $this->load->view('backend/admin/comment' , $page_data);
//     }

//      function reload_comment_notice($notice_code = '') 
//     {
//         $page_data['notice_code'] =   $notice_code;
//         $this->load->view('backend/admin/comment_notice' , $page_data);
//     }

//     function news($param1 = '', $param2 = '') 
//     {
//         if ($param1 == 'create') 
//         {
//             $news_code = $this->Crud_model->create_news();
//             redirect(base_url() . 'index.php?admin/news_view/details/' . $news_code , 'refresh');
//         }
//         if ($param1 == 'mark_as_archive') 
//         {
//             $this->db->where('news_code' , $param2);
//             $this->db->update('news' , array('news_status' => 0));
//         }
//         if ($param1 == 'delete') 
//         {
//             $this->db->where('news_code' , $param2);
//             $this->db->delete('news');
//             redirect(base_url() . 'index.php?admin/news/', 'refresh');
//         }

//         $page_data['page_name'] = 'news';
//         $page_data['page_title'] = get_phrase('Send-News');
//         $this->load->view('backend/index', $page_data);
//     }

//     function enviar_noticia() 
//     {
//         $page_data['page_name'] = 'enviar_noticia';
//         $page_data['page_title'] = get_phrase('Send-News');
//         $this->load->view('backend/index', $page_data);
//     }

//     function attendance_report_selector()
//     {
//         $data['class_id']   = $this->input->post('class_id');
//         $data['year']       = $this->input->post('year');
//         $data['month']  = $this->input->post('month');
//         $data['section_id'] = $this->input->post('section_id');
//         redirect(base_url().'index.php?admin/report_attendance_view/'.$data['class_id'].'/'.$data['section_id'].'/'.$data['month'],'refresh');
//         $page_data['page_name'] = 'report_attendance_view';
//     }

//     function unit_content($class_id = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         if ($class_id == '')
//             $class_id           =   $this->db->get('class')->first_row()->class_id;
//         $page_data['page_name']  = 'unit_content';
//         $page_data['page_title'] = get_phrase('Semester-Content');
//         $page_data['class_id']   = $class_id;
//         $this->load->view('backend/index', $page_data);
//     }

//     function upload_unit_content()
//     {
//         $data['academic_syllabus_code'] =   substr(md5(rand(0, 1000000)), 0, 7);
//         $data['title']                  =   $this->input->post('title');
//         $data['description']            =   $this->input->post('description');
//         $data['class_id']               =   $this->input->post('class_id');
//         $data['subject_id']             =   $this->input->post('subject_id');
//         $data['uploader_type']          =   $this->session->userdata('login_type');
//         $data['uploader_id']            =   $this->session->userdata('login_user_id');
//         $data['year']                   =   $this->db->get_where('settings',array('type'=>'running_year'))->row()->description;
//         $data['timestamp']              =   strtotime(date("Y-m-d H:i:s"));
//         $files = $_FILES['file_name'];
//         $this->load->library('upload');
//         $config['upload_path']   =  'uploads/syllabus/';
//         $config['allowed_types'] =  '*';
//         $_FILES['file_name']['name']     = $files['name'];
//         $_FILES['file_name']['type']     = $files['type'];
//         $_FILES['file_name']['tmp_name'] = $files['tmp_name'];
//         $_FILES['file_name']['size']     = $files['size'];
//         $this->upload->initialize($config);
//         $this->upload->do_upload('file_name');
//         $data['file_name'] = $_FILES['file_name']['name'];
//         $this->db->insert('academic_syllabus', $data);
//         redirect(base_url() . 'index.php?admin/unit_content/' . $data['class_id'] , 'refresh');
//     }

//     function download_unit_content($academic_syllabus_code)
//     {
//         $file_name = $this->db->get_where('academic_syllabus', array(
//             'academic_syllabus_code' => $academic_syllabus_code
//         ))->row()->file_name;
//         $this->load->helper('download');
//         $data = file_get_contents("uploads/syllabus/" . $file_name);
//         $name = $file_name;
//         force_download($name, $data);
//     }

//     function delete_unit_content($academic_syllabus_id)
//     {
//         $this->Crud_model->delete_unit($academic_syllabus_id);
//         redirect(base_url() . 'index.php?admin/unit_content/' . $data['class_id'] , 'refresh');
//     }

//     function students_payments($param1 = '' , $param2 = '')
//     {
//        if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');
//         $page_data['page_name']  = 'students_payments';
//         $page_data['page_title'] = get_phrase('StudentPayment');
//         $this->db->order_by('creation_timestamp', 'desc');
//         $page_data['invoices'] = $this->db->get('invoice')->result_array();
//         $this->load->view('backend/index', $page_data); 
//     }

//     function expense($param1 = '' , $param2 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');
        
//         $page_data['page_name']  = 'expense';
//         $page_data['page_title'] = get_phrase('Expense');
//         $this->load->view('backend/index', $page_data); 
//     }

//     function expense_category($param1 = '' , $param2 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');

//         if ($param1 == 'create') {
//             $data['name']   =   $this->input->post('name');
//             $this->db->insert('expense_category' , $data);
//             redirect(base_url() . 'index.php?admin/expense');
//         }
//         if ($param1 == 'edit') {
//             $data['name']   =   $this->input->post('name');
//             $this->db->where('expense_category_id' , $param2);
//             $this->db->update('expense_category' , $data);
//             redirect(base_url() . 'index.php?admin/expense');
//         }
//         if ($param1 == 'delete') {
//             $this->db->where('expense_category_id' , $param2);
//             $this->db->delete('expense_category');
//             redirect(base_url() . 'index.php?admin/expense');
//         }
//         $page_data['page_name']  = 'expense';
//         $page_data['page_title'] = get_phrase('Expense-Category');
//         $this->load->view('backend/index', $page_data);
//     }

//     function school_bus($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');
//         if ($param1 == 'create') {
//             $data['route_name']        = $this->input->post('route_name');
//             $data['number_of_vehicle'] = $this->input->post('number_of_vehicle');
//             $data['driver_name'] = $this->input->post('driver_name');
//             $data['driver_phone'] = $this->input->post('driver_phone');
//             $data['route_fare']        = $this->input->post('route_fare');
//             $this->db->insert('transport', $data);
//             redirect(base_url() . 'index.php?admin/school_bus', 'refresh');
//         }
//         if ($param1 == 'do_update') {
//             $data['route_name']        = $this->input->post('route_name');
//             $data['number_of_vehicle'] = $this->input->post('number_of_vehicle');
//             $data['driver_name']       = $this->input->post('driver_name');
//             $data['driver_phone']       = $this->input->post('driver_phone');
//             $data['route_fare']        = $this->input->post('route_fare');
//             $this->db->where('transport_id', $param2);
//             $this->db->update('transport', $data);
//             redirect(base_url() . 'index.php?admin/school_bus', 'refresh');
//         } else if ($param1 == 'edit') {
//             $page_data['edit_data'] = $this->db->get_where('transport', array(
//                 'transport_id' => $param2
//             ))->result_array();
//         }
//         if ($param1 == 'delete') 
//         {
//             $this->db->where('transport_id', $param2);
//             $this->db->delete('transport');
//             redirect(base_url() . 'index.php?admin/school_bus', 'refresh');
//         }
//         $page_data['transports'] = $this->db->get('transport')->result_array();
//         $page_data['page_name']  = 'school_bus';
//         $page_data['page_title'] = get_phrase('Manage-School-Bus');
//         $this->load->view('backend/index', $page_data); 
//     }

//     function classrooms($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');
//         if ($param1 == 'create') 
//         {
//             $data['name']           = $this->input->post('name');
//             $data['number_of_room'] = $this->input->post('number_of_room');
//             $data['description']    = $this->input->post('description');
//             $this->db->insert('dormitory', $data);
//             redirect(base_url() . 'index.php?admin/classrooms', 'refresh');
//         }
//         if ($param1 == 'do_update') {
//             $data['name']           = $this->input->post('name');
//             $data['number_of_room'] = $this->input->post('number_of_room');
//             $data['description']    = $this->input->post('description');
//             $this->db->where('dormitory_id', $param2);
//             $this->db->update('dormitory', $data);
//             redirect(base_url() . 'index.php?admin/classrooms', 'refresh');
//         } else if ($param1 == 'edit') 
//         {
//             $page_data['edit_data'] = $this->db->get_where('dormitory', array(
//                 'dormitory_id' => $param2
//             ))->result_array();
//         }
//         if ($param1 == 'delete') {
//             $this->db->where('dormitory_id', $param2);
//             $this->db->delete('dormitory');
//             redirect(base_url() . 'index.php?admin/classrooms', 'refresh');
//         }
//         $page_data['dormitories'] = $this->db->get('dormitory')->result_array();
//         $page_data['page_name']   = 'classroom';
//         $page_data['page_title']  = get_phrase('Manage-Classrooms');
//         $this->load->view('backend/index', $page_data);
//     }

//     function message($param1 = 'message_home', $param2 = '', $param3 = '') 
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url(), 'refresh');
//         if ($param1 == 'send_new') 
//         {
//             $message_thread_code = $this->Crud_model->send_new_private_message();
//             redirect(base_url() . 'index.php?admin/message/message_read/' . $message_thread_code, 'refresh');
//         }
//         if ($param1 == 'send_reply') 
//         {
//             $this->Crud_model->send_reply_message($param2);
//             redirect(base_url() . 'index.php?admin/message/message_read/' . $param2, 'refresh');
//         }
//         if ($param1 == 'message_read') {
//             $page_data['current_message_thread_code'] = $param2; 
//             $this->Crud_model->mark_thread_messages_read($param2);
//         }
//         $page_data['message_inner_page_name']   = $param1;
//         $page_data['page_name']                 = 'message';
//         $page_data['page_title']                = get_phrase('Private-Messages');
//         $this->load->view('backend/index', $page_data);
//     }

//     function system_settings($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'login', 'refresh');

//         if ($param1 == 'do_update') {
             
//             $data['description'] = $this->input->post('system_name');
//             $this->db->where('type' , 'system_name');
//             $this->db->update('settings' , $data);

//             $data['description'] = $this->input->post('system_title');
//             $this->db->where('type' , 'system_title');
//             $this->db->update('settings' , $data);

//             $data['description'] = $this->input->post('address');
//             $this->db->where('type' , 'address');
//             $this->db->update('settings' , $data);

//             $data['description'] = $this->input->post('phone');
//             $this->db->where('type' , 'phone');
//             $this->db->update('settings' , $data);

//             $data['description'] = $this->input->post('language');
//             $this->db->where('type' , 'language');
//             $this->db->update('settings' , $data);

//             $data['description'] = $this->input->post('currency');
//             $this->db->where('type' , 'currency');
//             $this->db->update('settings' , $data);
 
//             $data['description'] = $this->input->post('paypal_email');
//             $this->db->where('type' , 'paypal_email');
//             $this->db->update('settings' , $data);

//             $data['description'] = $this->input->post('system_email');
//             $this->db->where('type' , 'system_email');
//             $this->db->update('settings' , $data);

//             // $data['description'] = $this->input->post('rtl');
//             // $this->db->where('type' , 'rtl');
//             // $this->db->update('settings' , $data);

//             $data['description'] = $this->input->post('system_name');
//             $this->db->where('type' , 'system_name');
//             $this->db->update('settings' , $data);
        
//             redirect(base_url() . 'admin/system_settings/', 'refresh');
//         }
//         if ($param1 == 'socials') {
             
//             $data['description'] = $this->input->post('facebook_url');
//             $this->db->where('type' , 'facebook_url');
//             $this->db->update('settings' , $data);

//             $data['description'] = $this->input->post('twitter_url');
//             $this->db->where('type' , 'twitter_url');
//             $this->db->update('settings' , $data);

//             $data['description'] = $this->input->post('google_url');
//             $this->db->where('type' , 'google_url');
//             $this->db->update('settings' , $data);

//             $data['description'] = $this->input->post('linkedin_url');
//             $this->db->where('type' , 'linkedin_url');
//             $this->db->update('settings' , $data);

//             $data['description'] = $this->input->post('pinterest_url');
//             $this->db->where('type' , 'pinterest_url');
//             $this->db->update('settings' , $data);

//             $data['description'] = $this->input->post('instagram_url');
//             $this->db->where('type' , 'instagram_url');
//             $this->db->update('settings' , $data);
 
//             $data['description'] = $this->input->post('dribbble_url');
//             $this->db->where('type' , 'dribbble_url');
//             $this->db->update('settings' , $data);

//             $data['description'] = $this->input->post('youtube_url');
//             $this->db->where('type' , 'youtube_url');
//             $this->db->update('settings' , $data);
        
//             redirect(base_url() . 'admin/system_settings/', 'refresh');
//         }
//         if ($param1 == 'upload_logo') 
//         {
//             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
//             redirect(base_url() . 'admin/system_settings/', 'refresh');
//         }
//         if ($param1 == 'ad') {
//             $data['description'] = $this->input->post('ad');
//             $this->db->where('type' , 'ad');
//             $this->db->update('settings' , $data);
        
//             redirect(base_url() . 'admin/system_settings/', 'refresh');
//         }

//         if ($param1 == 'upload_slider') 
//         {
//             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/slider/slider1.png');
//             redirect(base_url() . 'admin/system_settings/', 'refresh');
//         }
//         if ($param1 == 'upload_slider2') 
//         {
//             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/slider/slider2.png');
//             redirect(base_url() . 'admin/system_settings/', 'refresh');
//         }
//         if ($param1 == 'upload_slider3') 
//         {
//             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/slider/slider3.png');
//             redirect(base_url() . 'admin/system_settings/', 'refresh');
//         }
//         if($param1 == 'skin_colour')
//         {
//             $data['description'] = $this->input->post('skin_colour');
//             $this->db->where('type' , 'skin_colour');
//             $this->db->update('settings' , $data);
//             redirect(base_url() . 'admin/system_settings/', 'refresh');
//         }
//         $page_data['page_name']  = 'system_settings';
//         $page_data['page_title'] = 'System Settings';
//         $page_data['settings']   = $this->db->get('settings')->result_array();
//         $this->load->view('backend/index', $page_data);
//     }

//     function academic_settings($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect(base_url() . 'index.php?login', 'refresh');
//         if ($param1 == 'do_update') {
             
//             // $data['description'] = $this->input->post('limit_upload');
//             $data['description'] = 1;
//             $this->db->where('type' , 'limit_upload');
//             $this->db->update('academic_settings' , $data);

//             $data['description'] = $this->input->post('allowed_marks');
//             $this->db->where('type' , 'allowed_marks');
//             $this->db->update('academic_settings' , $data);

//             // $data['description'] = $this->input->post('max_mark');
//             $data['description'] = 100;
//             $this->db->where('type' , 'max_mark');
//             $this->db->update('academic_settings' , $data);

//             $data['description'] = $this->input->post('report_teacher');
//             $this->db->where('type' , 'report_teacher');
//             $this->db->update('academic_settings' , $data);

//             $data['description'] = $this->input->post('minium_mark');
//             $this->db->where('type' , 'minium_mark');
//             $this->db->update('academic_settings' , $data);

//             $data['description'] = $this->input->post('minium_average');
//             $this->db->where('type' , 'minium_average');
//             $this->db->update('academic_settings' , $data);

//             $data['description'] = $this->input->post('teacher_average');
//             $this->db->where('type' , 'teacher_average');
//             $this->db->update('academic_settings' , $data);

//             redirect(base_url() . 'index.php?admin/academic_settings/', 'refresh');
//         }

//         $page_data['page_name']  = 'academic_settings';
//         $page_data['page_title'] = get_phrase('Academic-Settings');
//         $page_data['settings']   = $this->db->get('settings')->result_array();
//         $this->load->view('backend/index', $page_data);
//     }

//     function library($param1 = '', $param2 = '', $param3 = '')
//     {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');
//         if ($param1 == 'create') 
//         {
//             $data['name']        = $this->input->post('name');
//             $data['description'] = $this->input->post('description');
//             $data['price']       = $this->input->post('price');
//             $data['author']      = $this->input->post('author');
//             $data['class_id']    = $this->input->post('class_id');
//             $data['status']    = $this->input->post('status');
//             $this->db->insert('book', $data);
//             redirect(base_url() . 'index.php?admin/library', 'refresh');
//         }
//         if ($param1 == 'do_update') {
//             $data['name']        = $this->input->post('name');
//             $data['description'] = $this->input->post('description');
//             $data['price']       = $this->input->post('price');
//             $data['author']      = $this->input->post('author');
//             $data['status']    = $this->input->post('status');
//             $data['class_id']    = $this->input->post('class_id');
            
//             $this->db->where('book_id', $param2);
//             $this->db->update('book', $data);
//             redirect(base_url() . 'index.php?admin/library', 'refresh');
//         }
//         else if ($param1 == 'edit') 
//          {
//             $page_data['edit_data'] = $this->db->get_where('book', array('book_id' => $param2))->result_array();
//         }
//         if ($param1 == 'delete') 
//         {
//             $this->db->where('book_id', $param2);
//             $this->db->delete('book');
//             redirect(base_url() . 'index.php?admin/library', 'refresh');
//         }
//         $page_data['books']      = $this->db->get('book')->result_array();
//         $page_data['page_name']  = 'library';
//         $page_data['page_title'] = get_phrase('Library');
//         $this->load->view('backend/index', $page_data);
//     }

//      function marks_print_view($student_id , $exam_id) 
//      {
//         if ($this->session->userdata('admin_login') != 1)
//             redirect('login', 'refresh');
//         $class_id     = $this->db->get_where('enroll' , array(
//             'student_id' => $student_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
//         ))->row()->class_id;
//         $class_name   = $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;

//         $page_data['student_id'] =   $student_id;
//         $page_data['class_id']   =   $class_id;
//         $page_data['exam_id']    =   $exam_id;
//         $this->load->view('backend/admin/marks_print_view', $page_data);
//     }

//     function get_session_changer()
//     {
//         $this->load->view('backend/admin/change_session');
//     }

//     function change_session()
//     {
//         $data['description'] = $this->input->post('running_year');
//         $this->db->where('type' , 'running_year');
//         $this->db->update('settings' , $data);
//         redirect(base_url() . 'index.php?admin/dashboard/', 'refresh'); 
//     }

//     function files($task = "", $id_poa = "")
//     {
//         if ($this->session->userdata('admin_login') != 1)
//         {
//             $this->session->set_userdata('last_page' , current_url());
//             redirect(base_url(), 'refresh');
//         }       
//         if ($task == "create")
//         {
//             $this->Crud_model->guardar_poa();
//             redirect(base_url() . 'index.php?admin/files' , 'refresh');
//         }
//         if ($task == "delete")
//         {
//             $this->Crud_model->borrar_poa($id_poa);
//             redirect(base_url() . 'index.php?admin/files');
//         }
//         $data['poa_info']    = $this->Crud_model->obtener_poa();
//         $data['page_name']              = 'files';
//         $data['page_title']             = get_phrase('Documents-Teachers');
//         $this->load->view('backend/index', $data);
//     }

//     function search($search_key = '') 
//     {
//         if ($this->session->userdata('admin_login') != 1) {
//             $this->session->set_userdata('last_page', current_url());
//             redirect(base_url(), 'refresh');
//         }
//         if ( $_POST ) {
//             redirect(base_url() . 'index.php?admin/search/' . $this->input->post('search_key') , 'refresh');
//         }
//         $page_data['search_key']    =   $search_key;
//         $page_data['page_name']     =   'search';
//         $page_data['page_title']    =   get_phrase('Search-Result');
//         $this->load->view('backend/index', $page_data);
//     }

//     function reload_search_result_body() 
//     {
//         $page_data['search_key']    =   $this->input->post('search_key');
//         $this->load->view('backend/admin/search_result', $page_data);
//     }
}
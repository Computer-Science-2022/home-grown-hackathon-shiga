<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Crud_model');
        $this->load->database();
        $this->load->library('session');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2030 05:00:00 GMT");
    }

    public function index() {
        $this->session->set_userdata('admin_login', 1);
        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'Admin/admin_dashboard', 'refresh');
        $this->load->view('backend/login');
        }

    function ajax_login() {
        $response = array();
        $username = $_POST["phoneNumber"];
        $password = $_POST["password"];
        $response['submitted_data'] = $_POST;
        $login_status = $this->validate_login($username, $password);
        $response['login_status'] = $login_status;
        if ($login_status == 'success') {
            $response['redirect_url'] = '';
        }
        // echo json_encode($response);
    }

    function admin_login() {
        $response = array();
        $username = $_POST["phoneNumber"];
        $password = $_POST["password"];
        $response['submitted_data'] = $_POST;
        $login_status = $this->admin_loginEngine($username, $password);
        $response['login_status'] = $login_status;
        if ($login_status == 'success') {
            $response['redirect_url'] = '';
        }
        // echo json_encode($response);
    }

    function register(){
        if($this->input->post('password')!=$this->input->post('confirmpassword')){
            echo "<script>alert('Passwords Do Not Match, Please Try Again.');
            window.location.href='index';</script>";
        }
        date_default_timezone_set('UTC');
        $data['name'] = $this->input->post('name');
        // $data['phone'] = $this->input->post('phone');
        $data['email'] = $this->input->post('email');
        // $data['location'] = $this->input->post('location');
        $data['password'] = sha1($this->input->post('password'));
        $data['date'] = date('Y-m-d');
        // $data['encryption_key'] = random_string(&^)(*&sf465sd4fsd6^%1321^%#, 128);
        $this->load->helper('string');
        // echo $enc;
        $this->db->insert('users', $data);
        $credential = array('phone' => $this->input->post('phone'), 'password' => sha1($this->input->post('password')));
        $query = $this->db->get_where('users', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
        $this->session->set_userdata('admin_id', $row->id);
        $this->session->set_userdata('admin_login', 1);
        $id = $row->id;
        $this->session->set_userdata('name', $row->name);
        $this->session->set_userdata('email', $row->email);
    }
        echo "<script>alert('Registered Succesfully');
            window.location.href='index';</script>";
        // print_r($data);
    }

    function admin_loginEngine($username = '', $password = '') {        
        $credential = array('email' => $username, 'password' => $password);
        $query = $this->db->get('users', $credential);
        // print_r($query->num_rows());
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('admin_id', $row->id);
            $this->session->set_userdata('admin_login', 1);
            $id = $row->id;
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('email', $row->email);
            $var = $this->session->userdata;
            redirect(base_url() . 'admin/index', 'refresh');
        }   
        echo "<script>alert('Incorrect Company Email or Password');                
            window.location.href='".base_url()."';</script>";
    }

    // function validate_login($username = '', $password = '') {
    //     // $credential1 = array('phoneNumber' => $username, 'password' => $password);
        
    //     $credential = array('email' => $username, 'password' => $password);
    //     $query = $this->db->get_where('users', $credential);
    //     if ($query->num_rows() > 0) {
    //         $row = $query->row();
    //         $this->session->set_userdata('userId', $row->id);
    //         $id = $row->id;
    //         $this->session->set_userdata('name', $row->name);
    //         $this->session->set_userdata('email', $row->email);
    //         $this->session->set_userdata('accountType', $row->accounttype);
    //         $var = $this->session->userdata;
    //         redirect(base_url() . 'user/index', 'refresh');
    //     }   
    //     echo "<script>alert('Incorrect Username or Password');                
    //         window.location.href='".base_url()."';</script>";
    // }

    function four_zero_four() {
        $this->load->view('four_zero_four');
    }
	
    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }
}
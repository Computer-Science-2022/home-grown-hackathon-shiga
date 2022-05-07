<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    

    function __construct()
    {
        parent::__construct();
		$this->load->database();
        $this->load->library('session');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
        $this->load->model('Crud_model');	
        $this->load->model('Image_upload');
   
    } 

    function index(){
    $this->load->view('frontend/index');
    }

    function login(){
        $var = $this->session->userdata;
        if(isset($var['userId'])){
          redirect(base_url(), 'refresh');
        }
        $this->load->view('frontend/login');
    }

    function aboutus(){
        $this->load->view('frontend/aboutus');
        }

    function restuarant(){
        $this->load->view('frontend/restuarant');
        }

    function cart(){
        $this->load->view('frontend/cart');
        }

    function orders(){
        $this->load->view('frontend/orders');
        }
    
    function pastorders(){
        $this->load->view('frontend/pastorders');
        }

    function farms(){
        $this->load->view('frontend/farms');
        }

    function profile(){
        $this->load->view('frontend/profile');
        }

    function contact(){
        $this->load->view('frontend/contact');
        }

    function updateprofilefunction(){
        $data['name'] = $this->input->post('name');
        $data['description'] = $this->input->post('description');
        $data['title'] = $this->input->post('title');
        $data['instagram'] = $this->input->post('instagram');
        $data['twitter'] = $this->input->post('twitter');
        $data['linkedin'] = $this->input->post('linkedin');
        $data['facebook'] = $this->input->post('facebook');
        $data['email'] = $this->input->post('email');
        $var = $this->session->userdata;
        $this->db->where('id', $var['userId']);
        $this->db->update('users', $data);
        echo "<script>alert('Successfully Updated Profile.');
        window.location.href='index';</script>";
        // print_r($data);
    }

    function contactForm(){
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        // $data['phone'] = $this->input->post('phone');
        $data['message'] = $this->input->post('message');
        $data['date'] = date('Y-m-d h:i:s a');
        $this->db->insert('contactus', $data);
        echo "<script>alert('Thank you for reaching out to us. Your message has been successfully delivered to BUY WASTE.');
        window.location.href='index';</script>";
    }

    function checkout(){ 
        $var = $this->session->userdata;
        
        $product = $this->db->get_where('users', array('id' => $var['userId']))->result_array();
        foreach($product as $row):
        $name =$row['name'];
        $email = $row['email'];
        endforeach; 
    
        // $this->db->where('id', $var['patient_id']);
        // $data['totalprice'] = $this->cart->total();
        $data['buyer_id'] =  $var['userId'];
        $data['date'] = date('Y-m-d h:i:s a');
        $data['buyername'] = $name;
        $data['buyeremail'] = $email;
        foreach ($this->cart->contents() as $items):
            $products = $items['name'];
            $qty = $items['qty'];
            $price = $items['price'];
            $userId = $items['userId'];
            $data['userId'] = $userId;
            $data['products'] = $products;
            $data['unitprice'] = $price;
            $data['quantity'] = $qty;
            $data['totalprice'] = $qty*$price;
            $this->db->insert('sales', $data);
        endforeach;
        $this->cart->destroy();
        echo "<script>alert('You will recieve an alert with more details about your order.');</script>";
        $this->load->view('frontend/index');
    }

    function register(){
        if($this->input->post('password')!=$this->input->post('confirmpassword')){
            echo "<script>alert('Passwords Do Not Match, Please Try Again.');
            window.location.href='index';</script>";
        }
        date_default_timezone_set('UTC');
        $data['name'] = $this->input->post('name');
        $data['phone'] = $this->input->post('phone');
        $data['email'] = $this->input->post('email');
        $data['password'] = sha1($this->input->post('password'));
        $data['date'] = date('Y-m-d');
        // $data['encryption_key'] = random_string(&^)(*&sf465sd4fsd6^%1321^%#, 128);
        $this->load->helper('string');
        // echo $enc;
        $this->db->insert('user', $data);
        $credential = array('phone' => $this->input->post('phone'), 'password' => sha1($this->input->post('password')));
        $query = $this->db->get_where('user', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
        $this->session->set_userdata('userId', $row->id);
        $id = $row->id;
        $this->session->set_userdata('name', $row->name);
        $this->session->set_userdata('email', $row->email);
    }
        echo "<script>alert('Registered Succesfully, You Can Now Go Ahead To Invest With Your Referral Code');
            window.location.href='user_dashboard';</script>";
        // print_r($data); 

    }

    function updatequantity(){
        if($this->input->post('qty') != NULL){
            $data = array(
                'rowid' => $this->input->post('rowid'),
                'qty'   => $this->input->post('qty'),
                );
        $this->cart->update($data);  
        $this->load->view('frontend/cart');
        }else{
            $this->load->view('frontend/cart');
        }
        
    }

    function deletecart($param4=""){
        $data = array(
                    'rowid' => $param4,
                    'qty'   => 0,
                    );
        $this->cart->update($data);  
        $this->load->view('frontend/cart');
    }

    function addtocart($param2 = ""){
        $product_id = $param2;
        $product = $this->db->get_where('products', array('id' => $product_id))->result_array();
            foreach($product as $row):
            $productprice =  $row['realprice'];
            $productname =$row['name'];
            $userId = $row['userId'];
            endforeach;

        $data = array(
            'id'      => $param2,
            'qty'     => 1,
            'userId'  => $userId,
            'price'   => $productprice,
            'name'    => $productname,
            );
        $this->cart->insert($data);
        $cartdata = $this->cart->contents();
        // print_r($cartdata);
        $this->load->view('frontend/cart');

    }


    function investcheck(){
        $var = $this->session->userdata;
        $credential = array("email" => $var['email']);
        $query = $this->db->get_where('user', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data["userId"] =  $row->id;
            }
        $data['email'] = $var['email'];   
        date_default_timezone_set('UTC');
        $data['date'] = date('Y-m-d');
        $code = $this->input->post('code');
        $credential = array("joinCode" => $code);
        $query = $this->db->get_where('invest', $credential);
        if ($query->num_rows() < 2) {
            $credential = array("userCode" => $code);
            $query = $this->db->get_where('invest', $credential);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $data["joinCode"] =  $row->userCode;
            }
            else{
                echo "<script>alert('No Referral Code Match, Please Try Again With A Correct Referral Code.');
                window.location.href='user_dashboard';</script>";
            }
            
            // echo $id;
            $this->db->insert('invest', $data);
            $rows = $this->db->get_where('invest')->result_array();
            $this->db->order_by("id", "desc");
            foreach($rows as $row):
            $id =  $row['id'];
            endforeach;
            $this->session->set_userdata('userId', $id);
            echo "<script>alert('Registered Succesfully, You Can Now Go Ahead To And Invest When You Have Been Approved');
            window.location.href='registered_dashboard';</script>";
        }
        echo "<script>alert('Referral Code Is Ineligible, Please Try Again With A Correct Referral Code.');
                window.location.href='user_dashboard';</script>";
    }

    function approveUser($param1 = "", $param2 = ""){
        if($param2 == 2){
            $param2 = "approvedTwo";
            $uid = "approveTwoUserId";
            $date = "approveTwoDate";
            $code = "approveTwoUserCode";
        }

        if($param2 == 1){
            $param2 = "approvedOne";
            $uid = "approveOneUserId";
            $date = "approveOneDate";
            $code = "approveOneUserCode";
        }
        $var = $this->session->userdata;
        date_default_timezone_set('UTC');
        $data[$param2] = 1;
        $data[$uid] = $var['userId'];
        $data[$date] = date('Y-m-d');
        $data[$code] = $var['userCode'];
        // print_r($data);
        $this->db->where('id', $param1);
        $this->db->update('invest', $data);

        $credential = array('id' => $param1);
        $query1 = $this->db->get_where('invest', $credential);
        if ($query1->num_rows() > 0) {
            
            $row1 = $query1->row();
            $appOne = $row1->approvedOne;
            $appTwo = $row1->approvedTwo;
            if ($appTwo + $appOne == 2){
                $data['status'] = 1;
                // print_r($data);
                $this->db->where('id', $param1);
                $this->db->update('invest', $data);
            }
        }
        // echo "Done";
        echo "<script>alert('User Has Been Succesfully Approved.');</script>";
        $this->load->view('invest/index');

    }

    function menu($param1 = ""){
        if($this->session->userdata('site_lan')==""){
            $this->session->set_userdata('site_lan', 'english');
        }
        $data['programId'] = $param1;
        $this->load->view('frontend/menu', $data);
    }

    function logout(){
		session_destroy();
		redirect(base_url(), 'refresh');
	}
}
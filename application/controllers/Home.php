<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	 public function __construct()
    {
        parent::__construct();
      
        $this->load->model('User_model');
  
    }
	public function index()
	{
		// if (!$this->session->userdata('contact_modal_shown')) {
        //     // Set the session variable to indicate that the contact modal has been shown
        //     $this->session->set_userdata('contact_modal_shown', true);
        // }

		// $this->load->view('Frontend/index', array(
        //     'contact_modal_shown' => $this->session->userdata('contact_modal_shown')
        // ));

		// Check if the cookie 'modal_shown' exists
        if (!isset($_COOKIE['modal_shown'])) {
            // Set a cookie that lasts for the duration of the session
           // setcookie('modal_shown', '1', time() + (86400 * 30), "/"); // 86400 = 1 day
		   setcookie('modal_shown', '1', time() + 3600, "/"); // 3600 seconds = 1 hour
			//setcookie('modal_shown', '1', time() + 60, "/"); // 60 seconds = 1 minute
            $data['show_modal'] = true;
        } else {
            $data['show_modal'] = false;
        }
        // Load your view and pass the data
		$this->load->view('Frontend/index',$data);
	}
	public function About()
	{
		$this->load->view('Frontend/about');
	}
	public function Cart()
	{
		$this->load->view('Frontend/cart');
	}
	public function Services()
	{
		$this->load->view('Frontend/services');
	}
	public function Ecommerce()
	{
		$this->load->view('Frontend/e-commerce');
	}
     public function ContactUs()
	{
		$this->load->view('Frontend/contact');
	}
	//services
	public function Doctor_appointment()
	{
		$this->load->view('Frontend/doctor-appointments');
	}

	public function Post_Hospital_Care()
	{
		$this->load->view('Frontend/post-hospital-care');
	}
	public function Organizing_heath_record()
	{
		$this->load->view('Frontend/organizing-health-records');
	}
	public function Healthcare_navigation()
	{
		$this->load->view('Frontend/healthcare-navigation');
	}
     public function Health_education_support()
	{
		$this->load->view('Frontend/health-education-and-support');
	} public function helpline()
	{
		$this->load->view('Frontend/24-care-helpline');
	}

	public function Terms_conditions()
	{
		$this->load->view('Frontend/terms-and-condition');
	}
	public function Privacy_policy()
	{
		$this->load->view('Frontend/privacy_policy');
	}
	public function Refund_policy()
	{
		$this->load->view('Frontend/refund_policy');
	}

	
	public function Blog()
	{
		$this->load->view('Frontend/blog');
	}

	
	public function Faq()
	{
		$this->load->view('Frontend/faq');
	}
	public function Packages()
	{
		$this->load->view('Frontend/packages');
	}
	public function HospitalCompanion()
	{
		$this->load->view('Frontend/hospital_companion');
	}
	//Packages
	public function Seniorcare()
	{
		$this->load->view('Frontend/packages/seniorcare');
	}
	public function Post_hospitalCare()
	{
		$this->load->view('Frontend/packages/post_hospital_care');
	}

	public function Maternity_care()
	{
		$this->load->view('Frontend/packages/maternity_care');
	}
	public function Mother_child_care()
	{
		$this->load->view('Frontend/packages/mother_child_care');
	}
	public function Cancer_care()
	{
		$this->load->view('Frontend/packages/cancer_care');
	}
	public function Surgery_care()
	{
		$this->load->view('Frontend/packages/surgery_care');
	}
	public function Critical_care()
	{
		$this->load->view('Frontend/packages/critical_care');
	}
	public function package_checkout()
	{
		$this->load->view('Frontend/checkout/package-checkout');
	}
	public function plans()
	{
		$this->load->view('Frontend/plans');
	}


	
	// New
	function fetch_data()
	{
		sleep(1);

		$sale = $this->input->post('sale');
		$rent = $this->input->post('rent');
		$lease = $this->input->post('lease');
		$city = $this->input->post('city');
		$area = $this->input->post('area');
		$property_type = $this->input->post('property_type');
		$this->load->library("pagination");
		$config = array();
		$config["base_url"] = "#";
		//$config["total_rows"] = $this->User_model->count_all($minimum_price, $maximum_price, $brand, $ram, $storage);
		//$config["total_rows"] = $this->Property_model->count_all($sale, $rent,$lease,$city,$area,$property_type);
		$config["total_rows"] = $this->User_model->count_all($sale, $rent,$lease,$city,$area,$property_type);
		$config["per_page"] = 9;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		
		//new
		$config['full_tag_open'] = '<ul class="pagination">';        
    $config['full_tag_close'] = '</ul>';        
    $config['first_link'] = 'First';        
    $config['last_link'] = 'Last';        
    $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['first_tag_close'] = '</span></li>';        
    $config['prev_link'] = '&laquo';        
    $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['prev_tag_close'] = '</span></li>';        
    $config['next_link'] = '&raquo';        
    $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['next_tag_close'] = '</span></li>';        
    $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['last_tag_close'] = '</span></li>';        
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
    $config['cur_tag_close'] = '</a></li>';        
    $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['num_tag_close'] = '</span></li>';

		$config["num_links"] = 3;
		$this->pagination->initialize($config);
		$page = $this->uri->segment('3');
		$start = ($page - 1) * $config["per_page"];
		
		$output = array(
			'pagination_link'		=>	$this->pagination->create_links(),
			//'product_list'			=>	$this->User_model->fetch_data($config["per_page"], $start, $minimum_price, $maximum_price, $brand, $ram, $storage)
			'product_list'			=>	$this->User_model->fetch_data($config["per_page"], $start,$sale, $rent,$lease,$city,$area,$property_type)
		);
		echo json_encode($output);
	}
	
  //Simgle Propertyy
		public function SingleBlog()
	{
			$id = $this->input->get('I');
	// 		$this->data['property_data'] = $this->User_model->getPropertiesbyid($id);


	// Retrieve time slot details directly in the controller
	$this->db->where('id', $id);
	$query = $this->db->get('blog');
	$timeSlot['data']  = $query->row();

	$timestamp = strtotime( $timeSlot['data']->date);

	// Format the date
   //$d = date('j F Y', $timestamp);
   $timeSlot['d'] = date('j', $timestamp);
   $timeSlot['m']  = date('F', $timestamp);
   $timeSlot['y'] = date('Y', $timestamp);

		$this->load->view('Frontend/blog-single',$timeSlot);
	}


	public function check_login_status() {
        $is_logged_in = $this->session->userdata('user_login_access');
		// if ($this->session->userdata('user_login_access')) {
        //     // Redirect to the appropriate dashboard based on the user's role
        //     $role = $this->session->userdata('url');
        //     redirect(base_url('/').$role, 'refresh');
        // } else {
        //     // User is not authenticated, load the login view
        //     $this->load->view('Backend/login');
        // }
        echo json_encode(['logged_in' => $is_logged_in]);
    }
	 
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require FCPATH .'assets/phpmailer/phpmailer/src/Exception.php';
require FCPATH .'assets/phpmailer/phpmailer/src/PHPMailer.php';
require FCPATH .'assets/phpmailer/phpmailer/src/SMTP.php';

class Navigator extends CI_Controller {

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
	function __construct() {
        parent::__construct();
       $this->load->model('Manager_model');
          $this->load->model('User_model');
           $this->load->model('Admin_model');
             $this->load->model('Doctor_model');
         $this->getNavigatorDetails();
    }
    /* Get admin details */
    private function getNavigatorDetails() {
        $this->checkLogin();
        $Id = $this->session->userdata('user_login_id');
        $userDetails['manager_data'] = $this->Manager_model->getNavigatorDetails($Id);
        $this->load->vars($userDetails); 
    }
	public function index()
	{
		$this->checkLogin();
		$this->load->view('Backend/manager/na-main-page');
	}
	public function Add_Member()
	{
		$this->checkLogin();
		//$data['allmembers'] = $this->Manager_model->getAllMembers();
		$id = $this->session->userdata('user_login_id');
		$data['allmembers'] = $this->Manager_model->getNavigatorMembers($id);
		$this->load->view('Backend/manager/na-add-member',$data);
	}
	// public function All_Members()
	// {
	// 	$this->checkLogin();
	// 	$data['members'] = $this->Manager_model->getAllMembers();
	// 	$this->load->view('Backend/manager/na-all-members',$data);
	// }
	public function My_Members()
	{
		$this->checkLogin();
		$id = $this->session->userdata('user_login_id');
		$data['members'] = $this->Manager_model->getNavigatorMemberslist($id);//new
		$this->load->view('Backend/manager/na-my-members',$data);
	}
	public function Completed_Appointment()
	{
		$this->checkLogin();
				$id = $this->session->userdata('user_login_id');
		$data['members'] = $this->Manager_model->getcompletedMembersbynavigator($id);
		   $data['submembers'] = $this->Manager_model->getSubProfilecompletedMembersbynavigator($id);
		$this->load->view('Backend/manager/na-completed-appointment',$data);
	}
	public function Ongoing_Appointment()
	{
		$this->checkLogin();
				$id = $this->session->userdata('user_login_id');
		$data['members'] = $this->Manager_model->getOngoingMembersbynavigator($id);
		   $data['submembers'] = $this->Manager_model->getSubProfileOngoingMembersbynavigator($id);
		$this->load->view('Backend/manager/na-ongoing-appointment',$data);
	}
	public function Pending_Appointment()
	{
	    $this->checkLogin(); // Add this line to check login
	      $id = $this->session->userdata('user_login_id');
	    $data['members'] = $this->Manager_model->getPendingMembersbynavigator($id);
	    $data['submembers'] = $this->Manager_model->getSubProfilePendingMembersbynavigator($id);
	    $this->load->view('Backend/manager/na-pending-appointment',$data);
	}

   //booking main page
	public function View_members()
	{
		$this->checkLogin();
		  $id = $this->session->userdata('user_login_id');
		$data['members'] = $this->Manager_model->getNavigatorMemberslist($id);//new
		//$data['members'] = $this->Manager_model->getNavigatorMembers($id);
		$this->load->view('Backend/manager/na-book-appointment',$data);
	}
   //booking main page
	public function Subprofile_View_members()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
		$data['members'] = $this->Manager_model->getSubprofile($id);
		$this->load->view('Backend/manager/subprofile-book-appointment',$data);
	}
	// specific appointment view
	public function View_Appointments()
	{
		$this->checkLogin();
		 $id = $this->input->get('id');
		$data['members'] = $this->Manager_model->getAppointmentsMembersbyID($id);
	
		$this->load->view('Backend/manager/na-view-booking',$data);
	}
	// add booking
	public function Book_Appointment()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
			$data['user_data'] = $this->Manager_model->getUserDetails($id);
		$this->load->view('Backend/manager/na-add-appointment',$data);
	}
	public function Sub_Profile()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
		$data['members'] = $this->Manager_model->getSubprofile($id);
		
		$this->load->view('Backend/manager/sub-profile',$data);
	}

	 //check login
	// private function checkLogin()
	// {
	//     if (!$this->session->userdata('user_login_access')) {
	//         redirect(base_url() . 'login'); // Redirect to the login page if not logged in
	//     }
	// }
	private function checkLogin()
	{
	    if (!$this->session->userdata('user_login_access')) {
	        redirect(base_url() . 'login'); // Redirect to the login page if not logged in
	    } else {
	        // Get the requested URL and user's role from the session
	        $requestedUrl = $this->uri->segment(1); // Assuming the role controller is the first segment of the URL
	        $role = $this->session->userdata('url');

	        // Remove the trailing slash from the role if present
              $role = rtrim($role, '/');

                // Convert both the requested URL and the role to lowercase for comparison
		        $requestedUrl = strtolower($requestedUrl);
		        $role = strtolower($role);

	        // Check if the requested URL matches the user's role
	        if ($requestedUrl !== $role) {
	            // Display an error message or take appropriate action
	            echo "<script>alert('Access denied. You do not have permission to access this page')</script>";
	            // Or you can redirect to a specific error page
	             redirect(base_url() . $role);
	            exit; // Stop further execution
	        }
	    }
	}

	    /*Logout method*/
    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('feedback', 'logged_out');
        redirect(base_url().'login');
    }

       //member - user
    public function Add_member_data()
	{
		$this->checkLogin();
		if ($this->session->userdata('user_login_access') != False) {
             //die();
		    	$id = $this->input->post('id');
		    	$name = $this->input->post('name');
				$email = $this->input->post('email');
				$gender = $this->input->post('gender');
				$number = $this->input->post('number');
				$emergency_contact_name = $this->input->post('emergency_contact_name');
				$emergency_contact_relationship = $this->input->post('emergency_contact_relationship');
				$emergency_contact_phone = $this->input->post('emergency_contact_phone');
				$weight = $this->input->post('weight');
				$height = $this->input->post('height');
				$medical_conditions = $this->input->post('medical_conditions');
				$medications = $this->input->post('medications');
				$surgical_history = $this->input->post('surgical_history');
				$family_medical_history = $this->input->post('family_medical_history');
				$immunizations = $this->input->post('immunizations');
				$lifestyle_and_habits = $this->input->post('lifestyle_and_habits');
				$mental_health = $this->input->post('mental_health');
				$employment_status = $this->input->post('employment_status');
				$education_level = $this->input->post('education_level');
				$marital_status = $this->input->post('marital_status');
				$exercise_habits = $this->input->post('exercise_habits');
				$diet_preferences = $this->input->post('diet_preferences');
				$additional_information = $this->input->post('additional_information');
				$address = $this->input->post('address');

					//new
				$code = $this->input->post('code');
				$dob = $this->input->post('dob');
				$bloodgroup = $this->input->post('blood-group');
				$membership = $this->input->post('membership');
                
				$parent_member = $this->input->post('parent_member');
				if($this->input->post('subprofile_checkbox')){

						//getMemberByID
						 $member = $this->Manager_model->getMemberByID($parent_member);
						 $nav = $member->navigator;
						 $doc = $member->doctor;
				 }


		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');
		        //$this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');

		        // Add more validation rules as needed for other fields

                // Generate the new member ID
                $newMemberId = $this->generateUniqueMemberId();
                //password
                //  $password = $number;
                $password = $this->input->post('password');
                  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {
		       
            if ($this->User_model->is_email_duplicate($email) && $this->User_model->is_number_duplicate($number)  && !$this->input->post('subprofile_checkbox')) {
            $response = array(
                'status' => 'error',
                'message' => 'Email address and number already exist'
            );
            echo json_encode($response);
           } elseif ($this->User_model->is_email_duplicate($email)  && !$this->input->post('subprofile_checkbox')) {
	          
	              echo json_encode(array('status' => 'error', 'message' => 'Email address already exists'));
	         } elseif ($this->User_model->is_number_duplicate($number)  && !$this->input->post('subprofile_checkbox')) {
             
                 echo json_encode(array('status' => 'error', 'message' => 'Number already exists'));
            } else {
        	 
			     if($_FILES['file_url']['name']){
	            $file_name = $_FILES['file_url']['name'];
				$fileSize = $_FILES["file_url"]["size"]/1024;
				$fileType = $_FILES["file_url"]["type"];
				$new_file_name='';
	            $new_file_name .= $file_name;

	            $config = array(
	                'file_name' => $new_file_name,
	                'upload_path' => "./assets/uploads/users_profile",
	                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
	                'overwrite' => False,
	                'max_size' => "50720000"
	            );
	            //create directory
	              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	    
	            $this->load->library('Upload', $config);
	            $this->upload->initialize($config);                
	            if (!$this->upload->do_upload('file_url')) {
	                echo $this->upload->display_errors();
	                #redirect("notice/All_notice");
				}
	   
				else {

	                $path = $this->upload->data();
	                $img_url = $path['file_name'];
					if($this->input->post('subprofile_checkbox')){
						$data = array(
							'name' => $name,
						
							'gender' => $gender,
						
							'emergency_contact_name' => $emergency_contact_name,
							'emergency_contact_relationship' => $emergency_contact_relationship,
							'emergency_contact_phone' => $emergency_contact_phone,
							'weight' => $weight,
							'height' => $height,
							
							'employment_status' => $employment_status,
							'education_level' => $education_level,
							'marital_status' => $marital_status,
							
							'additional_information' => $additional_information,
							'address' => $address,
							'profile' => $img_url,
							'member_id' =>$newMemberId,
								'code' =>$code,
								'dob' =>$dob,
							'bloodgroup' =>$bloodgroup,
		
							'membership' =>$membership,
							'member_status'=>'1',
							'isSubprofile'=>"Yes",//new
							'parent_member'=> $parent_member,//new
						);
						 if ($nav) {
				       $data["navigator"] = $nav;
				      } 
				      if ($doc) {
				       $data["doctor"] = $doc;
				      }
					  }else{
				           $data = array(
						    'name' => $name,
						    'email' => $email,
						    'gender' => $gender,
						    'number' => $number,
						    'emergency_contact_name' => $emergency_contact_name,
						    'emergency_contact_relationship' => $emergency_contact_relationship,
						    'emergency_contact_phone' => $emergency_contact_phone,
						    'weight' => $weight,
						    'height' => $height,
				
						    'employment_status' => $employment_status,
						    'education_level' => $education_level,
						    'marital_status' => $marital_status,
						   
						    'additional_information' => $additional_information,
						    'address' => $address,
						    'profile' => $img_url,
						    'member_id' =>$newMemberId,
						    'password' => $hashed_password,
						      'code' =>$code,
						      'dob' =>$dob,
						      'bloodgroup' =>$bloodgroup,
						      'membership' =>$membership,
							  'member_status'=>'1',
							  
						);
					    }

				            
				        }
		      }else{

				if($this->input->post('subprofile_checkbox')){
					$data = array(
						'name' => $name,
					
						'gender' => $gender,
					
						'emergency_contact_name' => $emergency_contact_name,
						'emergency_contact_relationship' => $emergency_contact_relationship,
						'emergency_contact_phone' => $emergency_contact_phone,
						'weight' => $weight,
						'height' => $height,
						
						'employment_status' => $employment_status,
						'education_level' => $education_level,
						'marital_status' => $marital_status,
						
						'additional_information' => $additional_information,
						'address' => $address,
						'member_id' =>$newMemberId,
							'code' =>$code,
							'dob' =>$dob,
						'bloodgroup' =>$bloodgroup,
	
						'membership' =>$membership,
						'member_status'=>'1',
						'isSubprofile'=>"Yes",//new
						  'parent_member'=> $parent_member,//new
					);
					 if ($nav) {
				       $data["navigator"] = $nav;
				      } 
				      if ($doc) {
				       $data["doctor"] = $doc;
				      }
				  }else{
					$data = array(
						'name' => $name,
						'email' => $email,
						'gender' => $gender,
						'number' => $number,
						'emergency_contact_name' => $emergency_contact_name,
						'emergency_contact_relationship' => $emergency_contact_relationship,
						'emergency_contact_phone' => $emergency_contact_phone,
						'weight' => $weight,
						'height' => $height,
						
						'employment_status' => $employment_status,
						'education_level' => $education_level,
						'marital_status' => $marital_status,
						
						'additional_information' => $additional_information,
						'address' => $address,
						'member_id' =>$newMemberId,
							'password' => $hashed_password,
							'code' =>$code,
							'dob' =>$dob,
						'bloodgroup' =>$bloodgroup,
	
						'membership' =>$membership,
						'member_status'=>'1'
					);
				  }
			  
		      }

		      // Save the data to the manager table using your model function
		            $success = $this->Manager_model->SaveMemberData($data,$id);

		            if ($success) {
		            	//Notification
		            	  // Retrieve data from the employee table
			                $admin = $this->Admin_model->getAllAdmin();
			                // Insert data into the notification table for each employee
			                 if($this->input->post('subprofile_checkbox')){
			                 	   $filetitle = 'New subprofile added: <span class="txt-name">'.$name .'-'.$newMemberId.'</span>.';
			                 }else{
			                    $filetitle = 'New member added: <span class="txt-name">'.$name .'-'.$newMemberId.'</span>.';	
			                 }
			             
			                foreach ($admin as $data) {
			                $data = array(
			                'admin_id' => $data->id,
			                'message' => $filetitle,
			                'created_at' => date('Y-m-d H:i:s'),
			                'status' => 'unread',
			                'icon' => 'fa fa-user o',
			                'color' => 'purple-bgcolor',
			                  'url' => 'Admin/All_Members'
			                );
			                $this->db->insert('admin_notifications', $data);
			                }
                           //navigator
			              $navigator = $this->session->userdata('user_login_id');
			             $data1 = array(
		                'manager_id' => $navigator,
		                'message' => $filetitle,
		                'created_at' => date('Y-m-d H:i:s'),
		                'status' => 'unread',
		                'icon' => 'fa fa-user o',
		                'color' => 'purple-bgcolor',
		                 'url' => 'Navigator/My_Members'
		                );
		                $this->db->insert('manager_notifications', $data1);
		            	//Notification
		                echo json_encode(array('status' => 'success', 'message' => 'Member Added successfully'));
		                //send mail
		                   $this->send_mail($name,$email,$number);
		            } else {
		            	
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
		            }


		    }
		    }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
	}
	  public function update_member_data()
	{
		//$this->checkLogin();
		if ($this->session->userdata('user_login_access') != False) {
             //die();
		    	$id = $this->input->post('id');
		    	$name = $this->input->post('name');
				$email = $this->input->post('email');
				$gender = $this->input->post('gender');
				$number = $this->input->post('number');
				$emergency_contact_name = $this->input->post('emergency_contact_name');
				$emergency_contact_relationship = $this->input->post('emergency_contact_relationship');
				$emergency_contact_phone = $this->input->post('emergency_contact_phone');
				$weight = $this->input->post('weight');
				$height = $this->input->post('height');
				$medical_conditions = $this->input->post('medical_conditions');
				$medications = $this->input->post('medications');
				$surgical_history = $this->input->post('surgical_history');
				$family_medical_history = $this->input->post('family_medical_history');
				$immunizations = $this->input->post('immunizations');
				$lifestyle_and_habits = $this->input->post('lifestyle_and_habits');
				$mental_health = $this->input->post('mental_health');
				$employment_status = $this->input->post('employment_status');
				$education_level = $this->input->post('education_level');
				$marital_status = $this->input->post('marital_status');
				$exercise_habits = $this->input->post('exercise_habits');
				$diet_preferences = $this->input->post('diet_preferences');
				$additional_information = $this->input->post('additional_information');
				$address = $this->input->post('address');
				$password = $this->input->post('password');
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                //new
				$code = $this->input->post('code');
				$dob = $this->input->post('dob');
				$bloodgroup = $this->input->post('blood-group');
				$membership = $this->input->post('membership');
				$subprofile = $this->input->post('subprofile');

		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');
				if(!$subprofile){
					$this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
				}
		        // Add more validation rules as needed for other fields

		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {
		        
 
			     if($_FILES['file_url']['name']){
	            $file_name = $_FILES['file_url']['name'];
				$fileSize = $_FILES["file_url"]["size"]/1024;
				$fileType = $_FILES["file_url"]["type"];
				$new_file_name='';
	            $new_file_name .= $file_name;

	            $config = array(
	                'file_name' => $new_file_name,
	                'upload_path' => "./assets/uploads/users_profile",
	                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
	                'overwrite' => False,
	                'max_size' => "50720000"
	            );
	            //create directory
	              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	    
	            $this->load->library('Upload', $config);
	            $this->upload->initialize($config);                
	            if (!$this->upload->do_upload('file_url')) {
	                echo $this->upload->display_errors();
	                #redirect("notice/All_notice");
				}

	   
				else {

	                $path = $this->upload->data();
	                $img_url = $path['file_name'];
		            $data = array(
				    'name' => $name,
				    'email' => $email,
				    'gender' => $gender,
				    'number' => $number,
				    'emergency_contact_name' => $emergency_contact_name,
				    'emergency_contact_relationship' => $emergency_contact_relationship,
				    'emergency_contact_phone' => $emergency_contact_phone,
				    'weight' => $weight,
				    'height' => $height,
				  
				    'employment_status' => $employment_status,
				    'education_level' => $education_level,
				    'marital_status' => $marital_status,
				   
				    'additional_information' => $additional_information,
				    'address' => $address,
				    'profile' => $img_url,
				        // 'code' =>$code,
				      'dob' =>$dob,
				      'bloodgroup' =>$bloodgroup,
				       'membership' =>$membership,
					   'navigator_status'=>'0'
				   
				);
               if ($password) {
				    $data["password"] = $hashed_password;
				}
		            
		        }
		      }else{

		      	$data = array(
					    'name' => $name,
					    'email' => $email,
					    'gender' => $gender,
					    'number' => $number,
					    'emergency_contact_name' => $emergency_contact_name,
					    'emergency_contact_relationship' => $emergency_contact_relationship,
					    'emergency_contact_phone' => $emergency_contact_phone,
					    'weight' => $weight,
					    'height' => $height,
					 
					    'employment_status' => $employment_status,
					    'education_level' => $education_level,
					    'marital_status' => $marital_status,
					   
					    'additional_information' => $additional_information,
					    'address' => $address,
					        // 'code' =>$code,
				      'dob' =>$dob,
				      'bloodgroup' =>$bloodgroup,
				       'membership' =>$membership,
					   'navigator_status'=>'0'
					);
		      	if ($password) {
					    $data["password"] = $hashed_password;
					}
		      }
               
            //  print_r($data);die();

		      // Save the data to the manager table using your model function
		            $success = $this->Manager_model->UpdateMember($data,$id);// print_r($success);die();

		            if ($success) {
						$data["id"] = $id;
		                echo json_encode(array('status' => 'success', 'message' => 'Data Added successfully','member'=>$data));
		            } else {
		            	
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
		            }

		    }
		   // }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
	}



	public function generateUniqueMemberID()
{
    // Get the last member ID from the database
    $lastMemberID = $this->db->select('member_id')
        ->order_by('member_id', 'DESC')
        ->limit(1)
        ->get('members')
        ->row('member_id');

    // Check if a member ID already exists
    if (!empty($lastMemberID)) {
        // Extract the prefix and numeric parts of the last member ID
        $prefix = substr($lastMemberID, 0, 3);
        $numericPart = (int) substr($lastMemberID, 3);

        if ($numericPart < 99) {
            // Increment the numeric part by 1
            $newNumericPart = $numericPart + 1;
            // Generate the new member ID
            $newMemberID = $prefix . str_pad($newNumericPart, 2, '0', STR_PAD_LEFT);
        } else {
            // Increment the prefix and reset the numeric part to 0
            $newPrefix = ++$prefix;
            $newNumericPart = 0;
            // Generate the new member ID
            $newMemberID = $newPrefix . str_pad($newNumericPart, 2, '0', STR_PAD_LEFT);
        }
    } else {
        // If no member ID exists, start with the default value
        $newMemberID = 'AAA00';
    }

    // Check if the new member ID already exists
    $existingMember = $this->db->get_where('members', array('member_id' => $newMemberID))->row();

    if ($existingMember) {
        // If the new member ID already exists, recursively call the function to generate a new one
        return $this->generateUniqueMemberID();
    }

    return $newMemberID;
}


     //appointment edit modal
   public function getMemberAppointmentByID() {
        // Get the ID parameter from the AJAX request
        $id = $this->input->get('id'); //echo $id;
        $member = $this->Manager_model->getMemberAppointmentByID($id);
   
       $response = array(
	    'id' => $member->id,
	    'member_id' => $member->member_id,
	    'name' => $member->name,
	    'email' => $member->email,
	    'password' => $member->password,
	    'gender' => $member->gender,
	    'number' => $member->number,
	    'emergency_contact_name' => $member->emergency_contact_name,
	    'emergency_contact_relationship' => $member->emergency_contact_relationship,
	    'emergency_contact_phone' => $member->emergency_contact_phone,
	    'weight' => $member->weight,
	    'height' => $member->height,
	  
	    'employment_status' => $member->employment_status,
	    'education_level' => $member->education_level,
	    'marital_status' => $member->marital_status,
	   
	    'additional_information' => $member->additional_information,
	    'address' => $member->address,
	    'profile' => $member->profile,
	    'appointment' => $member->appointment,
	    'appointment_date' => $member->appointment_date,
	    'appointment_time' => $member->appointment_time,
	    'comments' => $member->comments,
	    'payment_status' => $member->payment_status,
	    'appointment_status' => $member->appointment_status,
	       'services' => $member->services
	);

        
        // Send the response as JSON
        echo json_encode($response);
    }
    //update modal get data ongoing
   public function getMemberOngoingByID() {
        // Get the ID parameter from the AJAX request
        $id = $this->input->get('id');//echo $id;
   
        $member = $this->Manager_model->getMemberOngoingByID($id);

       $response = array(
	    'id' => $member->id,
	    'member_id' => $member->member_id,
	    'name' => $member->name,
	    'email' => $member->email,
	    'password' => $member->password,
	    'gender' => $member->gender,
	    'number' => $member->number,
	    'emergency_contact_name' => $member->emergency_contact_name,
	    'emergency_contact_relationship' => $member->emergency_contact_relationship,
	    'emergency_contact_phone' => $member->emergency_contact_phone,
	    'weight' => $member->weight,
	    'height' => $member->height,
	  
	    'employment_status' => $member->employment_status,
	    'education_level' => $member->education_level,
	    'marital_status' => $member->marital_status,
	   
	    'additional_information' => $member->additional_information,
	    'address' => $member->address,
	    'profile' => $member->profile,
	    'appointment' => $member->appointment,
	    'appointment_date' => $member->appointment_date,
	    'appointment_time' => $member->appointment_time,
	    'comments' => $member->comments,
	    'payment_status' => $member->payment_status,
	    'appointment_status' => $member->appointment_status,
	       'services' => $member->services
	);

        
        // Send the response as JSON
        echo json_encode($response);
    } 
    //update modal get data completed
   public function getMemberCompletedByID() {
        // Get the ID parameter from the AJAX request
        $id = $this->input->get('id');//echo $id;
        //$member = $this->Manager_model->getMemberByID($id);
        $member = $this->Manager_model->getMemberCompletedByID($id);
        //print_r($member); die();
        // Prepare the response data as an array
       $response = array(
	    'id' => $member->id,
	    'member_id' => $member->member_id,
	    'name' => $member->name,
	    'email' => $member->email,
	    'password' => $member->password,
	    'gender' => $member->gender,
	    'number' => $member->number,
	    'emergency_contact_name' => $member->emergency_contact_name,
	    'emergency_contact_relationship' => $member->emergency_contact_relationship,
	    'emergency_contact_phone' => $member->emergency_contact_phone,
	    'weight' => $member->weight,
	    'height' => $member->height,
	   
	    'employment_status' => $member->employment_status,
	    'education_level' => $member->education_level,
	    'marital_status' => $member->marital_status,
	  
	    'additional_information' => $member->additional_information,
	    'address' => $member->address,
	    'profile' => $member->profile,
	    'appointment' => $member->appointment,
	    'appointment_date' => $member->appointment_date,
	    'appointment_time' => $member->appointment_time,
	    'comments' => $member->comments,
	    'payment_status' => $member->payment_status,
	    'appointment_status' => $member->appointment_status,
	     'services' => $member->services
	);

        
        // Send the response as JSON
        echo json_encode($response);
    }
     //update modal get data ongoing
   public function getMemberPendingByID() {
        // Get the ID parameter from the AJAX request
        $id = $this->input->get('id');//echo $id;
        //$member = $this->Manager_model->getMemberByID($id);
        $member = $this->Manager_model->getMemberPendingByID($id);
       $response = array(
	    'id' => $member->id,
	    'member_id' => $member->member_id,
	    'name' => $member->name,
	    'email' => $member->email,
	    'password' => $member->password,
	    'gender' => $member->gender,
	    'number' => $member->number,
	    'emergency_contact_name' => $member->emergency_contact_name,
	    'emergency_contact_relationship' => $member->emergency_contact_relationship,
	    'emergency_contact_phone' => $member->emergency_contact_phone,
	    'weight' => $member->weight,
	    'height' => $member->height,
	   
	    'employment_status' => $member->employment_status,
	    'education_level' => $member->education_level,
	    'marital_status' => $member->marital_status,
	 
	    'additional_information' => $member->additional_information,
	    'address' => $member->address,
	    'profile' => $member->profile,
	    'appointment' => $member->appointment,
	    'appointment_date' => $member->appointment_date,
	    'appointment_time' => $member->appointment_time,
	    'comments' => $member->comments,
	    'payment_status' => $member->payment_status,
	    'appointment_status' => $member->appointment_status,
	    'services' => $member->services
	);

        
        // Send the response as JSON
        echo json_encode($response);
    } 
    //update modal get getMemberByID
   public function getMemberByID() {
        // Get the ID parameter from the AJAX request
        $id = $this->input->get('id');//echo $id;
        $member = $this->Manager_model->getMemberByID($id);
       		if($member->isSubprofile == 'Yes'){
	
		$p_member = $this->Manager_model->getMemberByID($member->parent_member); 
		$email = $p_member->email;
		$number = $p_member->number;
    
		}else{
		$email = $member->email;
		$number = $member->number;
		}
       $response = array(
	    'id' => $member->id,
	    'member_id' => $member->member_id,
	    'name' => $member->name,
	    'email' => $email,
	    'password' => $member->password,
	    'gender' => $member->gender,
	    'number' => $number,
	    'emergency_contact_name' => $member->emergency_contact_name,
	    'emergency_contact_relationship' => $member->emergency_contact_relationship,
	    'emergency_contact_phone' => $member->emergency_contact_phone,
	    'weight' => $member->weight,
	    'height' => $member->height,
	  
	    'employment_status' => $member->employment_status,
	    'education_level' => $member->education_level,
	    'marital_status' => $member->marital_status,
	    
	    'additional_information' => $member->additional_information,
	    'address' => $member->address,
	    'profile' => $member->profile,
	    'appointment' => $member->appointment,
	    'appointment_date' => $member->appointment_date,
	    'appointment_time' => $member->appointment_time,
	    'comments' => $member->comments,
	    'payment_status' => $member->payment_status,
	    'appointment_status' => $member->appointment_status,
	     //new
	    'dob' => $member->dob,
	    'bloodgroup' => $member->bloodgroup,
	    'doctor' => $member->doctor,
	    
	    'membership' => $member->membership,
	    'isSubprofile' => $member->isSubprofile,
	);

        
        // Send the response as JSON
        echo json_encode($response);
    }


   //Member delete
     public function Memberdelete(){
        if($this->session->userdata('user_login_access') != False) { 
            $id = $this->input->post('id');
            $result_del = $this->Manager_model->Memberdelete($id);//
          if($result_del){
                echo json_encode(array('status'=>'success','message'=> 'Deleted Successfully'));
               
            }else{
                 echo json_encode(array('status'=>'failed','message'=> 'Not deleted'));
             
            }
           
            }
        else{
            redirect(base_url() , 'refresh');
        }       
     } 
       public function AllMemberdelete(){
        if($this->session->userdata('user_login_access') != False) { 
            $id = $this->input->post('id');
            $result_del = $this->Manager_model->AllMemberdelete($id);//
          if($result_del){
                echo json_encode(array('status'=>'success','message'=> 'Deleted Successfully'));
               
            }else{
                 echo json_encode(array('status'=>'failed','message'=> 'Not deleted'));
             
            }
           
            }
        else{
            redirect(base_url() , 'refresh');
        }       
     }
    
     //ongoing status update
      public function update_ongoing_member()
	{
		$this->checkLogin();
		if ($this->session->userdata('user_login_access') != False) {
             //die();
		    	$id = $this->input->post('id');
		    $firstName = $this->input->post('name');
			$address = $this->input->post('address');
			$mobileNumber = $this->input->post('number');
			$appointment = $this->input->post('appointment');
			$appointmentDate = $this->input->post('appointment_date');
			$appointmentTime = $this->input->post('appointment_time');
			$comments = $this->input->post('comments');
			$paymentStatus = $this->input->post('payment_status');
			$appointmentStatus = $this->input->post('appointment_status');

           	$services = $this->input->post('services');
		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		       // $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');
		 

		        
		   
                /*'name' => $firstName,
				    'address' => $address,
				    'number' => $mobileNumber,*/

				    $data = array(
				      'services' => $services,
				    'appointment' => $appointment,
				    'appointment_date' => $appointmentDate,
				    'appointment_time' => $appointmentTime,
				    'comments' => $comments,
				    'payment_status' => $paymentStatus,
				    'appointment_status' => $appointmentStatus
				);

		      
		      
               
              // print_r($data);die();

		      // Save the data to the manager table using your model function
		            $success = $this->Manager_model->UpdateMemberData($data,$id);

		            if ($success) {
						$data["id"] = $id;
		                echo json_encode(array('status' => 'success', 'message' => 'Data Added successfully','member'=>$data));
		            } else {
		            	
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
		            }

		  
		    } else {
		        redirect(base_url(), 'refresh');
		    }
	}
	  public function update_completed_member_data()
	{
		$this->checkLogin();
		if ($this->session->userdata('user_login_access') != False) {
             //die();
		    $id = $this->input->post('id');
		    $firstName = $this->input->post('name');
			$address = $this->input->post('address');
			$mobileNumber = $this->input->post('number');
			$appointment = $this->input->post('appointment');
			$appointmentDate = $this->input->post('appointment_date');
			$appointmentTime = $this->input->post('appointment_time');
			$comments = $this->input->post('comments');
			$paymentStatus = $this->input->post('payment_status');
			$appointmentStatus = $this->input->post('appointment_status');
			$services = $this->input->post('services');

		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');
		      
		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {
		        
		         // if($password){

		         // 	$data["password"] = $hashed_password;
		         // }
 
			     if($_FILES['file_url']['name']){
	            $file_name = $_FILES['file_url']['name'];
				$fileSize = $_FILES["file_url"]["size"]/1024;
				$fileType = $_FILES["file_url"]["type"];
				$new_file_name='';
	            $new_file_name .= $file_name;

	            $config = array(
	                'file_name' => $new_file_name,
	                'upload_path' => "./assets/uploads/completed_invoice",
	                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
	                'overwrite' => False,
	                'max_size' => "50720000"
	            );
	            //create directory
	              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	    
	            $this->load->library('Upload', $config);
	            $this->upload->initialize($config);                
	            if (!$this->upload->do_upload('file_url')) {
	                echo $this->upload->display_errors();
	                #redirect("notice/All_notice");
				}

	   
				else {

	                $path = $this->upload->data();
	                $img_url = $path['file_name'];
		              $data = array(
						    'services' => $services,
				 
				    'appointment_date' => $appointmentDate,
				    'appointment_time' => $appointmentTime,
				    'comments' => $comments,
				    'payment_status' => $paymentStatus,
				    'appointment_status' => $appointmentStatus,
				    'invoice'=>$img_url 
				);
          
		            
		        }
		      }else{

		         $data = array(
				    'services' => $services,
				    'appointment' => $appointment,
				    'appointment_date' => $appointmentDate,
				    'appointment_time' => $appointmentTime,
				    'comments' => $comments,
				    'payment_status' => $paymentStatus,
				    'appointment_status' => $appointmentStatus,
				  
				);
		      
		      }
               
            

		      // Save the data to the manager table using your model function
		            $success = $this->Manager_model->UpdateMemberData($data,$id);

		            if ($success) {
						$data["id"] = $id;
		                echo json_encode(array('status' => 'success', 'message' => 'Data Added successfully','member'=>$data));
		            } else {
		            	
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
		            }

		    }
		   // }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
	}

        /*Medical History */

    // list medical
	public function Member_Medical_history()
	{
		$this->checkLogin();
		// $id = $this->input->get('id');
		// 	$data['members'] = $this->Manager_model->getAllMembers();
		$id = $this->session->userdata('user_login_id');
		//$data['members'] = $this->Manager_model->getNavigatorMembers($id);
		$data['members'] = $this->Manager_model->getNavigatorMemberslist($id);//new
		$this->load->view('Backend/manager/medical-history/na-medical-history-list',$data);
	}  
	public function SubMedical_history()
	{
		$this->checkLogin();
		$nav = $this->session->userdata('user_login_id');
		$id = $this->input->get('id');
		$data['members'] = $this->Manager_model->getNavSubprofile($nav,$id);
		$this->load->view('Backend/manager//medical-history/subprofile-medical-history-list',$data);
	}  
	 // add medical
	public function Add_medical_history()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
	   //$data['user_data'] = $this->Manager_model->getUserDetails($id);
	   $user_data = $this->Manager_model->getUserDetails($id);
        $member_id = $id;
			      // Fetch data from the main Medical History table based on id and member_id
        $medical_history = $this->Admin_model->get_medical_history( $member_id);//
       
	    if ($medical_history) {
	        // Fetch data from child tables based on medical_history_id and member_id
	        $previous_medical_conditions = $this->Admin_model->get_previous_medical_conditions($medical_history->id, $member_id);
	        $surgeries_procedures = $this->Admin_model->get_surgeries_procedures($medical_history->id, $member_id);
	        $allergies = $this->Admin_model->get_allergies($medical_history->id, $member_id);
	        $current_medications = $this->Admin_model->get_current_medications($medical_history->id, $member_id);
	        $family_medical_history = $this->Admin_model->get_family_medical_history($medical_history->id, $member_id);
	        $immunization_history = $this->Admin_model->get_immunization_history($medical_history->id, $member_id);
	        $previous_medical_test_results = $this->Admin_model->get_previous_medical_test_results($medical_history->id, $member_id);
	        $current_symptoms_concerns = $this->Admin_model->get_current_symptoms_concerns($medical_history->id, $member_id);


		//---------------------------------------------New 29.7.24 --------------------------------
		$consultations_1 = $this->Admin_model->get_consultations_1($medical_history->id, $member_id);
		$consultations_2 = $this->Admin_model->get_consultations_2($medical_history->id, $member_id);
	

	//---------------------------------------------New 29.7.24 --------------------------------
		// Prepare data to be sent to the view
		$data = array(
			'member_id' => $member_id,
			'user_data' => $user_data,
			'medical_history' => $medical_history,
			'previous_medical_conditions' => $previous_medical_conditions,
			'surgeries_procedures' => $surgeries_procedures,
			'allergies' => $allergies,
			'current_medications' => $current_medications,
			'family_medical_history' => $family_medical_history,
			'immunization_history' => $immunization_history,
			'previous_medical_test_results' => $previous_medical_test_results,
			'current_symptoms_concerns' => $current_symptoms_concerns,
			'consultations_1' => $consultations_1,//new
			'consultations_2' => $consultations_2//new
		);
		// echo "<pre>";
		// print_r($data); die();
	
  }else{
		  $previous_medical_conditions = '';
		$surgeries_procedures = '';
		$allergies = '';
		$current_medications = '';
		$family_medical_history = '';
		$immunization_history = '';
		$previous_medical_test_results = '';
		$current_symptoms_concerns = '';
		$consultations_1 = '';//new
		$consultations_2 = '';//new
		
	   $data = array(
				'member_id' => $member_id,
			'user_data' => $user_data,
			'medical_history' => $medical_history,
			'previous_medical_conditions' => $previous_medical_conditions,
			'surgeries_procedures' => $surgeries_procedures,
			'allergies' => $allergies,
			'current_medications' => $current_medications,
			'family_medical_history' => $family_medical_history,
			'immunization_history' => $immunization_history,
			'previous_medical_test_results' => $previous_medical_test_results,
			'current_symptoms_concerns' => $current_symptoms_concerns,
			'consultations_1' => $consultations_1,//new
			'consultations_2' => $consultations_2//new
		);
  }
	  $this->load->view('Backend/manager/medical-history/na-add-medical-hoistory',$data);
	}
  /*medical history*/
	public function save_medical_history() {
		$this->checkLogin();
        // Retrieve form data for the Medical History main table
        $physician_name = $this->input->post('physician_name');
        $physician_no = $this->input->post('physician_no');
        $smoking = $this->input->post('smoking');
        $alcohol = $this->input->post('alcohol');
        $exercise_habits = $this->input->post('exercise_habits');
        $insurance_provider = $this->input->post('insurance_provider');
        $policy_number = $this->input->post('policy_no');
        $policy_number = $this->input->post('policy_no');
        $member_id = $this->input->post('member_id');

        
        //update data
        // Check if the member_id already exists in the Medical History table
		$existing_medical_history = $this->Admin_model->get_medical_history_by_member_id($member_id);

		if ($existing_medical_history) {
		    // Member already has a medical history, update the existing records

		    // Update the Medical History main table data
		    $medical_history_data = array(
		        'physician_name' => $physician_name,
		        'physician_no' => $physician_no,
		        'smoking' => $smoking,
		        'alcohol' => $alcohol,
		        'exercise_habits' => $exercise_habits,
		        'insurance_provider' => $insurance_provider,
		        'policy_number' => $policy_number,
		        'member_id' => $member_id
		    );
		    //$this->db->trans_start();//new
		    $update = $this->Admin_model->update_medical_history($existing_medical_history->id, $medical_history_data);
        
		    // Delete existing child records for the member
		    $this->Admin_model->delete_previous_medical_conditions_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_surgeries_procedures_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_allergies_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_current_medications_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_family_medical_history_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_immunization_history_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_previous_medical_test_results_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_current_symptoms_concerns_by_medical_history_id($existing_medical_history->id);

		    //balance deletes
  //---------------------------------------------New 29.7.24 --------------------------------
  $this->Admin_model->delete_consultations_1_by_medical_history_id($existing_medical_history->id);
  $this->Admin_model->delete_consultations_2_by_medical_history_id($existing_medical_history->id);
  // Consultations 1 section
  $treating_doctors = $this->input->post('treating_doctor');
  $hospitals = $this->input->post('hospital');
  $speciality = $this->input->post('speciality');

  if (!empty($treating_doctors)) {
	  foreach ($treating_doctors as $index => $treating_doctor) {
		  if (!empty($treating_doctor) || !empty($hospitals[$index]) || !empty($speciality[$index])) {
			  $consultation1_data = array(
				  'medical_history_id' => $existing_medical_history->id,
				  'member_id' => $member_id,
				  'treating_doctor' => $treating_doctor,
				  'hospital' => $hospitals[$index],
				  'speciality' => $speciality[$index]
			  );
			  $this->Admin_model->insert_consultation1($consultation1_data);
		  }
	  }
  }

  // Consultations 2 section
  // $complaints = $this->input->post('complaints');
  // $investigations = $this->input->post('investigation');
  // $diagnoses = $this->input->post('diagnosis');
  // $advised = $this->input->post('advised');
  // $treatment_dates = $this->input->post('treatment_date');
  // $specialit_detailss = $this->input->post('specialit_details');
  // $remarks = $this->input->post('remarks');

  // if (!empty($complaints)) {
  // 	foreach ($complaints as $index => $complaint) {
  // 		if (!empty($complaint) || !empty($treatment_dates[$index]) || !empty($specialit_detailss[$index]) || !empty($remarks[$index])) {
  // 			$consultation2_data = array(
  // 				'medical_history_id' => $existing_medical_history->id,
  // 				'member_id' => $member_id,
  // 				'complaints' => $complaint,
  // 				'treatment_date' => $treatment_dates[$index],
  // 				'specialit_details' => $specialit_detailss[$index],
  // 				'remarks' => $remarks[$index]
  // 			);
  // 			$this->Admin_model->insert_consultation2($consultation2_data);
  // 		}
  // 	}
  // }
  // $treatment_dates = $this->input->post('treatment_date');
  // $specialit_detailss = $this->input->post('specialist_details');
  // $remarks = $this->input->post('remarks');

  // if (!empty($treatment_dates)) {
  // 	foreach ($treatment_dates as $index => $treatment_date) {
  // 		if (!empty($treatment_date)  || !empty($specialit_detailss[$index]) || !empty($remarks[$index])) {
  // 			$consultation2_data = array(
  // 				'medical_history_id' => $existing_medical_history->id,
  // 				'member_id' => $member_id,
			  
  // 				'treatment_date' => $treatment_date,
  // 				'specialist_details' => $specialit_detailss[$index],
  // 				'remarks' => $remarks[$index]
  // 			);
  // 			$this->Admin_model->insert_consultation2($consultation2_data);
  // 		}
  // 	}
  // }
  // Consultations 2 section
  $treatment_dates = $this->input->post('treatment_date');
  $specialist_details = $this->input->post('specialist_details');
  $remarks = $this->input->post('remarks');

  if (!empty($treatment_dates)) {
	  foreach ($treatment_dates as $index => $treatment_date) {
		  if (!empty($treatment_date) || !empty($specialist_details[$index]) || !empty($remarks[$index])) {
			  //print_r($treatment_date);die();
			  $consultation2_data = array(
				  'medical_history_id' => $existing_medical_history->id,
				  'member_id' => $member_id,
				  'treatment_date' => $treatment_date,
				  'specialist_details' => $specialist_details[$index],
				  'remarks' => $remarks[$index]
			  );
			  $this->Admin_model->insert_consultation2($consultation2_data);
		  }
	  }
  };
  
  //---------------------------------------------New 29.7.24 --------------------------------
		    //child table

		    // Previous Medical Conditions section
		    $medical_conditions = $this->input->post('medical_conditions');
		    $medical_condition_dates = $this->input->post('medical_condition_date');
		    $treatment_received = $this->input->post('treatment_received');

		    // Save data for each record in the Previous Medical Conditions section
		    if (!empty($medical_conditions)) {
		        foreach ($medical_conditions as $index => $condition) {
		            if (!empty($condition) || !empty($medical_condition_dates[$index])) {
		                $condition_data = array(
		                    'medical_history_id' => $existing_medical_history->id,
		                    'member_id' => $member_id,
		                    'condition_name' => $condition,
		                    'diagnosis_date' =>($medical_condition_dates[$index])  ? $medical_condition_dates[$index] : '',//  $medical_condition_dates[$index],
		                    'treatment_received' => $treatment_received[$index]
		                );
		                $this->Admin_model->insert_previous_medical_condition($condition_data);
		            }
		        }
		    }
		     // Surgeries or Procedures section
            $surgeries = $this->input->post('surgeries');
            $surgeries_dates = $this->input->post('surgeries_date');
            $surgeon_names = $this->input->post('Surgeon');

            // Save data for each record in the Surgeries or Procedures section
             if (!empty($surgeries)) {
            foreach ($surgeries as $index => $surgery) {
             if (!empty($surgery) || !empty($surgeries_dates[$index]) || !empty($surgeon_names[$index])) {
                $surgery_data = array(
                    'medical_history_id' => $existing_medical_history->id,
                    'member_id' => $member_id,
                    'procedure_name' => $surgery,
                    'procedure_date' => ($surgeries_dates[$index])  ? $surgeries_dates[$index] : '',//  $surgeries_dates[$index],
                    'surgeon' => $surgeon_names[$index]
                );
                $this->Admin_model->insert_surgery_procedure($surgery_data);
            }
            }
           }

	            // Allergies section
	            $medications = $this->input->post('medications');
	            $food_allergies = $this->input->post('food');
	            $other_allergies = $this->input->post('other');

	            // Save data for each record in the Allergies section
	             if (!empty($medications)) {
	            foreach ($medications as $index => $medication) {
	            	  if (!empty($medication) || !empty($food_allergies[$index]) || !empty($other_allergies[$index])) {
	                $allergy_data = array(
	                    'medical_history_id' =>$existing_medical_history->id,
	                    'member_id' =>$member_id,
	                    'medications' => $medication,
	                    'food' => $food_allergies[$index],
	                    'other' => $other_allergies[$index]
	                );
	                $this->Admin_model->insert_allergy($allergy_data);
	            }
	            }
	        }

	            // Current Medications section
	            $medication_names = $this->input->post('medication_name');
	            $dosages = $this->input->post('medication_dosage');
	            $frequencies = $this->input->post('medication_frequency');

	            // Save data for each record in the Current Medications section
	             if (!empty($medication_names)) {
	            foreach ($medication_names as $index => $medication_name) {
	            	   if (!empty($medication_name) || !empty($dosages[$index]) || !empty($frequencies[$index])) {
	                $medication_data = array(
	                    'medical_history_id' => $existing_medical_history->id,
	                    'member_id' => $member_id,
	                    'medication_name' => $medication_name,
	                    'dosage' => $dosages[$index],
	                    'frequency' => $frequencies[$index]
	                );
	                $this->Admin_model->insert_medication($medication_data);
	            }
	            }
	        }

	            // Family Medical History section
	            $family_conditions = $this->input->post('family_medical_history');
	            $relationship_to_patient = $this->input->post('relationship_to_patient');

	            // Save data for each record in the Family Medical History section
	             if (!empty($family_conditions)) {
	            foreach ($family_conditions as $index => $condition) {
	            	   if (!empty($condition) || !empty($relationship_to_patient[$index])) {
	                $family_data = array(
	                    'medical_history_id' => $existing_medical_history->id,
	                    'member_id' => $member_id,
	                    'condition_name' => $condition,
	                    'relationship_to_patient' => $relationship_to_patient[$index]
	                );
	                $this->Admin_model->insert_family_medical_history($family_data);
	            }
	            }
	        }

	            // Immunization History section
	            $vaccinations = $this->input->post('vaccination');
	            $vaccination_dates = $this->input->post('vaccination_date');

	            // Save data for each record in the Immunization History section
	             if (!empty($vaccinations)) {
	            foreach ($vaccinations as $index => $vaccination) {
	            	     if (!empty($vaccination) || !empty($vaccination_dates[$index])) {
	                $immunization_data = array(
	                    'medical_history_id' => $existing_medical_history->id,
	                    'member_id' => $member_id,
	                    'vaccination' => $vaccination,
	                    'vaccination_date' =>($vaccination_dates[$index])  ? $vaccination_dates[$index] : '',//  $vaccination_dates[$index]
	                );
	                $this->Admin_model->insert_immunization($immunization_data);
	            }
	            }
	        }

	            // Previous Medical Test Results section
	            $medical_tests = $this->input->post('medical_test');

	            // Save data for each record in the Previous Medical Test Results section
	             if (!empty($medical_tests)) {
	            foreach ($medical_tests as $index => $test) {
	            	 if (!empty($test)) {
	                $test_data = array(
	                    'medical_history_id' => $existing_medical_history->id,
	                    'member_id' => $member_id,
	                    'test_name' => $test
	                );
	                $this->Admin_model->insert_medical_test($test_data);
	            }
	            }
	          }

	            // Current Symptoms or Concerns section
	            $symptoms = $this->input->post('symptom');
	            $concerns = $this->input->post('concerns');

	            // Save data for each record in the Current Symptoms or Concerns section
	            // if (!empty($symptoms)) {
	            foreach ($symptoms as $index => $symptom) {
	            	  if (!empty($symptom) || !empty($concerns[$index])) {
	                $symptom_data = array(
	                    'medical_history_id' => $existing_medical_history->id,
	                    'member_id' => $member_id,
	                    'symptom' => $symptom,
	                    'concerns' => $concerns[$index]
	                );
	                $this->Admin_model->insert_symptom($symptom_data);
	                //print_r($symptom_data);

	            }

	            } ///die();
	 
		    if($update){
              echo json_encode(array('status' => 'success', 'message' =>'Updated successfully'));
		    }


        } else {
        //insert data
		
            //---------------------------------------------New 29.7.24 --------------------------------
		// Consultations 1 section
		$treating_doctors = $this->input->post('treating_doctor');
		$hospitals = $this->input->post('hospital');
		$speciality = $this->input->post('speciality');

		if (!empty($treating_doctors)) {
			foreach ($treating_doctors as $index => $treating_doctor) {
				if (!empty($treating_doctor) || !empty($hospitals[$index]) || !empty($speciality[$index])) {
					$consultation1_data = array(
						'medical_history_id' => $existing_medical_history->id,
						'member_id' => $member_id,
						'treating_doctor' => $treating_doctor,
						'hospital' => $hospitals[$index],
						//'treatment_date' => $treatment_dates[$index]
						'speciality' => $speciality[$index]
					);
					$this->Admin_model->insert_consultation1($consultation1_data);
				}
			}
		}

		// Consultations 2 section
		$treatment_dates = $this->input->post('treatment_date');
			$specialist_details = $this->input->post('specialist_details');
			$remarks = $this->input->post('remarks');

			if (!empty($treatment_dates)) {
				foreach ($treatment_dates as $index => $treatment_date) {
					if (!empty($treatment_date) || !empty($specialist_details[$index]) || !empty($remarks[$index])) {
						$consultation2_data = array(
							'medical_history_id' => $existing_medical_history->id,
							'member_id' => $member_id,
							'treatment_date' => $treatment_date,
							'specialist_details' => $specialist_details[$index],
							'remarks' => $remarks[$index]
						);
						$this->Admin_model->insert_consultation2($consultation2_data);
					}
				}
			};
            //---------------------------------------------New 29.7.24 --------------------------------

        // Create an array for the Medical History main table data
        $medical_history_data = array(
            'physician_name' => $physician_name,
            'physician_no' => $physician_no,
            'smoking' => $smoking,
            'alcohol' => $alcohol,
            'exercise_habits' => $exercise_habits,
            'insurance_provider' => $insurance_provider,
            'policy_number' => $policy_number,
            'member_id' => $member_id,

        );

        // Insert the Medical History data into the main table
        $medical_history_id = $this->Admin_model->insert_medical_history($medical_history_data);

        if ($medical_history_id) {
            // Previous Medical Conditions section
            $medical_conditions = $this->input->post('medical_conditions');
            $medical_condition_dates = $this->input->post('medical_condition_date');
            $treatment_received = $this->input->post('treatment_received');

            // Save data for each record in the Previous Medical Conditions section
             if (!empty($medical_conditions)) {
            foreach ($medical_conditions as $index => $condition) {
            if (!empty($condition) || !empty($medical_condition_dates[$index])) {
                $condition_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'condition_name' => $condition,
                    'diagnosis_date' => ($medical_condition_dates[$index])  ? $medical_condition_dates[$index] : '',//$medical_condition_dates[$index],
                    'treatment_received' => $treatment_received[$index]
                );
                $this->Admin_model->insert_previous_medical_condition($condition_data);
            }
            }
           }

            // Surgeries or Procedures section
            $surgeries = $this->input->post('surgeries');
            $surgeries_dates = $this->input->post('surgeries_date');
            $surgeon_names = $this->input->post('Surgeon');

            // Save data for each record in the Surgeries or Procedures section
             if (!empty($surgeries)) {
            foreach ($surgeries as $index => $surgery) {
             if (!empty($surgery) || !empty($surgeries_dates[$index]) || !empty($surgeon_names[$index])) {
                $surgery_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'procedure_name' => $surgery,
                    'procedure_date' => ($surgeries_dates[$index])  ? $surgeries_dates[$index] : '',// $surgeries_dates[$index],
                    'surgeon' => $surgeon_names[$index]
                );
                $this->Admin_model->insert_surgery_procedure($surgery_data);
            }
            }
           }

            // Allergies section
            $medications = $this->input->post('medications');
            $food_allergies = $this->input->post('food');
            $other_allergies = $this->input->post('other');

            // Save data for each record in the Allergies section
             if (!empty($medications)) {
            foreach ($medications as $index => $medication) {
            	  if (!empty($medication) || !empty($food_allergies[$index]) || !empty($other_allergies[$index])) {
                $allergy_data = array(
                    'medical_history_id' =>$medical_history_id,
                    'member_id' =>$member_id,
                    'medications' => $medication,
                    'food' => $food_allergies[$index],
                    'other' => $other_allergies[$index]
                );
                $this->Admin_model->insert_allergy($allergy_data);
            }
            }
        }

            // Current Medications section
            $medication_names = $this->input->post('medication_name');
            $dosages = $this->input->post('medication_dosage');
            $frequencies = $this->input->post('medication_frequency');

            // Save data for each record in the Current Medications section
             if (!empty($medication_names)) {
            foreach ($medication_names as $index => $medication_name) {
            	   if (!empty($medication_name) || !empty($dosages[$index]) || !empty($frequencies[$index])) {
                $medication_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'medication_name' => $medication_name,
                    'dosage' => $dosages[$index],
                    'frequency' => $frequencies[$index]
                );
                $this->Admin_model->insert_medication($medication_data);
            }
            }
        }

            // Family Medical History section
            $family_conditions = $this->input->post('family_medical_history');
            $relationship_to_patient = $this->input->post('relationship_to_patient');

            // Save data for each record in the Family Medical History section
             if (!empty($family_conditions)) {
            foreach ($family_conditions as $index => $condition) {
            	   if (!empty($condition) || !empty($relationship_to_patient[$index])) {
                $family_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'condition_name' => $condition,
                    'relationship_to_patient' => $relationship_to_patient[$index]
                );
                $this->Admin_model->insert_family_medical_history($family_data);
            }
            }
        }

            // Immunization History section
            $vaccinations = $this->input->post('vaccination');
            $vaccination_dates = $this->input->post('vaccination_date');

            // Save data for each record in the Immunization History section
             if (!empty($vaccinations)) {
            foreach ($vaccinations as $index => $vaccination) {
            	     if (!empty($vaccination) || !empty($vaccination_dates[$index])) {
                $immunization_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'vaccination' => $vaccination,
                    'vaccination_date' => ($vaccination_dates[$index])  ? $vaccination_dates[$index] : '',//  $vaccination_dates[$index]
                );
                $this->Admin_model->insert_immunization($immunization_data);
            }
            }
        }

            // Previous Medical Test Results section
            $medical_tests = $this->input->post('medical_test');

            // Save data for each record in the Previous Medical Test Results section
             if (!empty($medical_tests)) {
            foreach ($medical_tests as $index => $test) {
            	 if (!empty($test)) {
                $test_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'test_name' => $test
                );
                $this->Admin_model->insert_medical_test($test_data);
            }
            }
          }

            // Current Symptoms or Concerns section
            $symptoms = $this->input->post('symptom');
            $concerns = $this->input->post('concerns');

            // Save data for each record in the Current Symptoms or Concerns section
             if (!empty($symptoms)) {
            foreach ($symptoms as $index => $symptom) {
             if (!empty($symptom) || !empty($concerns[$index])) {
                $symptom_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'symptom' => $symptom,
                    'concerns' => $concerns[$index]
                );
                $this->Admin_model->insert_symptom($symptom_data);
            }
            }
        }
       

             // echo "All data has been saved successfully.";
              echo json_encode(array('status' => 'success', 'message' =>'All data has been saved successfully'));

           
        } else {
           
                 echo json_encode(array('status' => 'error', 'message' =>'Failed to save'));
            }

        }
        }
        //delete items
       public function delete_items(){
        if($this->session->userdata('user_login_access') != False) { 
            $id = $this->input->post('id');
            $table = base64_decode($this->input->post('table'));
            $result_del = $this->Admin_model->delete_items($id,$table);//
          if($result_del){
                echo json_encode(array('status'=>'success','message'=> 'Deleted Successfully'));
               
            }else{
                 echo json_encode(array('status'=>'failed','message'=> 'Not deleted'));
             
            }
           
            }
        else{
            redirect(base_url() , 'refresh');
        }       
     }
   	 // View Medical history
	public function View_medical_history()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
	   //$data['user_data'] = $this->Manager_model->getUserDetails($id);
	   $user_data = $this->Manager_model->getUserDetails($id);
        $member_id = $id;
			      // Fetch data from the main Medical History table based on id and member_id
        $medical_history = $this->Admin_model->get_medical_history( $member_id);//
       
	    if ($medical_history) {
	        // Fetch data from child tables based on medical_history_id and member_id
	        $previous_medical_conditions = $this->Admin_model->get_previous_medical_conditions($medical_history->id, $member_id);
	        $surgeries_procedures = $this->Admin_model->get_surgeries_procedures($medical_history->id, $member_id);
	        $allergies = $this->Admin_model->get_allergies($medical_history->id, $member_id);
	        $current_medications = $this->Admin_model->get_current_medications($medical_history->id, $member_id);
	        $family_medical_history = $this->Admin_model->get_family_medical_history($medical_history->id, $member_id);
	        $immunization_history = $this->Admin_model->get_immunization_history($medical_history->id, $member_id);
	        $previous_medical_test_results = $this->Admin_model->get_previous_medical_test_results($medical_history->id, $member_id);
	        $current_symptoms_concerns = $this->Admin_model->get_current_symptoms_concerns($medical_history->id, $member_id);
 

			//---------------------------------------------New 29.7.24 --------------------------------
			$consultations_1 = $this->Admin_model->get_consultations_1($medical_history->id, $member_id);
			$consultations_2 = $this->Admin_model->get_consultations_2($medical_history->id, $member_id);
		

		//---------------------------------------------New 29.7.24 -------------------------------

	        // Prepare data to be sent to the view
	        $data = array(
	        	    'member_id' => $member_id,
	            'user_data' => $user_data,
	            'medical_history' => $medical_history,
	            'previous_medical_conditions' => $previous_medical_conditions,
	            'surgeries_procedures' => $surgeries_procedures,
	            'allergies' => $allergies,
	            'current_medications' => $current_medications,
	            'family_medical_history' => $family_medical_history,
	            'immunization_history' => $immunization_history,
	            'previous_medical_test_results' => $previous_medical_test_results,
	            'current_symptoms_concerns' => $current_symptoms_concerns,
				'consultations_1' => $consultations_1,//new
	            'consultations_2' => $consultations_2//new
	        );
	      
		
	  }else{
	  	    $previous_medical_conditions = '';
	        $surgeries_procedures = '';
	        $allergies = '';
	        $current_medications = '';
	        $family_medical_history = '';
	        $immunization_history = '';
	        $previous_medical_test_results = '';
	        $current_symptoms_concerns = '';
	        $consultations_1 = '';//new
	        $consultations_2 = '';//new
	  	 $data = array(
	  	 	    'member_id' => $member_id,
	            'user_data' => $user_data,
	            'medical_history' => $medical_history,
	            'previous_medical_conditions' => $previous_medical_conditions,
	            'surgeries_procedures' => $surgeries_procedures,
	            'allergies' => $allergies,
	            'current_medications' => $current_medications,
	            'family_medical_history' => $family_medical_history,
	            'immunization_history' => $immunization_history,
	            'previous_medical_test_results' => $previous_medical_test_results,
	            'current_symptoms_concerns' => $current_symptoms_concerns,
				'consultations_1' => $consultations_1,//new
	            'consultations_2' => $consultations_2//new
	        );
	  }
	  $this->load->view('Backend/manager/medical-history/na-view-medical-hoistory',$data);
	}
public function Book_member_appoinment()
		{
			$this->checkLogin();
			if ($this->session->userdata('user_login_access') != False) {
	             //die();
			   
			    	$mid = $this->input->post('mid');
			    
					$medical_conditions = $this->input->post('medical_conditions');
					$medications = $this->input->post('medications');
					$surgical_history = $this->input->post('surgical_history');
					$family_medical_history = $this->input->post('family_medical_history');
					$immunizations = $this->input->post('immunizations');
					$lifestyle_and_habits = $this->input->post('lifestyle_and_habits');
					$mental_health = $this->input->post('mental_health');
				
					$exercise_habits = $this->input->post('exercise_habits');
					$diet_preferences = $this->input->post('diet_preferences');
					$additional_information = $this->input->post('additional_information');

					$date = $this->input->post('date');
					$time = date('H:i', strtotime($this->input->post('time')));
				    $services = $this->input->post('services');

				    $appointmentDate = $this->input->post('appointment_date');
				   	$appointmentTime = $this->input->post('appointment_time');

			       $prefix = 'ID_';
                   $uniqueNumber = uniqid($prefix);

                    // $checkdata = array('appointment_date' => $appointmentDate, 'isActive' => 1,'mid'=>$mid);
			        // if (check_field_exists($checkdata, 'appointment')) {
			        //     echo json_encode(array('status' => 'error', 'message' => '<p>Already applied this date</p>'));
			        //     return;
			        // } 
				        

			      
			    	$data = array(
						   
						    'mid' => $mid,
						    'services' => $services,
						    'additional_information' => $additional_information,
						    'Reference_id' =>$uniqueNumber,
						    'appointment_date' =>$appointmentDate,
						    'appointment_time' =>$appointmentTime,
						  
						   
						);

			      // Save the data to the manager table using your model function
			            $success = $this->User_model->BookAppointmentData($data);

			            if ($success) {
			                echo json_encode(array('status' => 'success', 'message' => 'Appointment added successfully'));
			            } else {
			            	
			                echo json_encode(array('status' => 'error', 'message' => 'Failed to save'));
			            }

			
			    } else {
			        redirect(base_url(), 'refresh');
			    }
		}

		        /*New*/
 public function send_mail_manager($name,$email,$number,$password) {
    // $name = $this->input->post('name');
    // $email = $this->input->post('email');
    // $number = $this->input->post('number');
  //  $message = $this->input->post('message');

    // Create the inquiry email
    $Mail = new PHPMailer(true);
    ob_start();
    ?>
    <!-- Inquiry email HTML content -->
  <html>
  <head>
      <meta charset="UTF-8">
      <title></title>
      <style>
          body {
              margin: 0;
              padding: 0;
              font-family: Arial, sans-serif;
          }

          .container {
              max-width: 600px;
              margin: 0 auto;
              padding: 20px;
              background-color: #F5F8FB;
          }

          h1 {
              font-size: 24px;
              margin-top: 0;
          }

          table {
              width: 100%;
          }

          table td {
              padding: 5px;
          }

          .btn {
              display: inline-block;
              padding: 10px 20px;
              background-color: #2196F3;
              color: #ffffff;
              text-decoration: none;
              border-radius: 2px;
              font-weight: bold;
          }

          .caption {
              font-size: 12px;
              color: #616161;
          }

          .signature {
              margin-top: 20px;
              font-size: 12px;
          }

          .logo-image {
              display: inline-block;
              vertical-align: middle;
          }

          .logo-image img {
              max-width: 70px;
              height: auto;
          }

          .unsubscribe-link {
              display: inline-block;
              margin-right: 10px;
              text-decoration: none;
              color: #616161;
          }
      </style>
  </head>
  <body>
      <div class="container">
          <h1>Registration Details</h1>
            <p>Thank you for registering an account. Below is your login information:</p>
          <table>
              <tr>
                  <td><strong>Name</strong></td>
                  <td><?php if(isset($name)) { echo  $name; } ?></td>
              </tr>
              <tr>
                  <td><strong>Email</strong></td>
                    <td><?php if(isset($email)) { echo  $email; } ?></td>
              </tr>
              <tr>
                  <td><strong>Phone</strong></td>
                    <td><?php if(isset($number)) { echo  $number; } ?></td>
              </tr> 
                <tr>
                  <td><strong>Password</strong></td>
                    <td><?php if(isset($password)) { echo  $password; } ?></td>
              </tr> 
          </table>

       <p><a href="<?php echo base_url('login')?>" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #ffffff; text-decoration: none; border-radius: 5px;">Login Our Website</a></p>

          <div class="signature">
              <p>
              Thank you,<br>
             AssisHealth,<br>
              #850,
              3rd Floor,<br>
              opposite Coffee Day,<br>
              RMS Layout, Sahakar Nagar,<br> Bengaluru, Karnataka 560092.</p>
              </p>
             <!--  <p>
                  Support: <a href="mailto:#">info@whello.id</a>
              </p> -->
              <!-- <div class="logo-image">
                  <a href="#" target="_blank">
                      <img src="https://zavoloklom.github.io/material-design-iconic-font/icons/mstile-70x70.png" alt="logo-alt">
                  </a>
              </div> -->
          </div>
      </div>
  </body>
  </html>
    <?php
    $inquiryMessage = ob_get_clean();

    try {
        // Configure and send the inquiry email
        $Mail->isSMTP();
        $Mail->Host = 'smtp.gmail.com';
        $Mail->SMTPAuth = true;
        $Mail->Username = USERNAME;
        $Mail->Password = PASSWORD;
        $Mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $Mail->Port = 465;
        $Mail->setFrom(FROM, FROMNAME);
        $Mail->addAddress($email, $name);
        $Mail->isHTML(true);
        $Mail->Subject = 'Welcome to our website!!!';
        $Mail->Body = $inquiryMessage;

        ?>
  
        <?php
       

        // Send both emails
        if ($Mail->send()) {
           // echo json_encode(array('status' => 'success', 'message' => 'Register Successfully!!'));
        } else {
           // echo json_encode(array('status' => 'error', 'message' => 'Error in sending emails.'));
        }
    } catch (Exception $e) {
        //echo json_encode(array('status' => 'error', 'message' => "An error occurred. {$e->getMessage()}"));
    }
}
        /*Doctors*/

      	//doctors pages
		public function Add_Doctor()
		{
		    $this->checkLogin(); // Add this line to check login
		    
		    $this->load->view('Backend/manager/doctors/add-doctor');
		}

		public function All_Doctors()
		{
		    $this->checkLogin(); // Add this line to check login
		    $navigators = $this->Doctor_model->getDoctors();
	        $data['navigators'] = $navigators;
	      
		    $this->load->view('Backend/manager/doctors/all-doctors',$data);
		}

		public function  Assign_Doctors()
		{
			$this->checkLogin();
			  $id = $this->session->userdata('user_login_id');
				//$data['members'] = $this->Manager_model->getAllMembers();
			//	$data['members'] = $this->Manager_model->getNavigatorMembers($id);
			  $data['members'] = $this->Manager_model->getNavigatorMemberslist($id);//new
			$data['doctors'] = $this->Doctor_model->getAllDoctors();
			$this->load->view('Backend/manager/doctors/assign-doctors',$data);
		}
		public function Subprofile_Assign_Doctors()
		{
			$this->checkLogin();
			$id = $this->input->get('id');
			$data['members'] = $this->Manager_model->getSubprofile($id);
			$data['doctors'] = $this->Doctor_model->getAllDoctors();
			$this->load->view('Backend/manager/doctors/subprofile-assign-doctors',$data);
		}
	//doctors pages

	  public function Save_doctor()
	{
	    if ($this->session->userdata('user_login_access') != False) {
	        $name = $this->input->post('firstname');
	        $email = $this->input->post('email');
	        $gender = $this->input->post('gender');
	        $mobileNo = $this->input->post('number');
	        $languageSpoken = $this->input->post('language');
	      //  print_r($languageSpoken); die();
	        $intro = $this->input->post('address');
	        $password = $this->input->post('password');
	        $qualification = $this->input->post('qualification');
	        $medical_council_no = $this->input->post('medical_council_no');
             // Hash the password
           $hashed_password = password_hash($password, PASSWORD_DEFAULT);
	        $this->load->library('form_validation');
	        $this->form_validation->set_error_delimiters();
	        $this->form_validation->set_rules('firstname', 'Name', 'trim|required|max_length[255]|xss_clean');
	        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
	        // Add more validation rules as needed for other fields

	        if ($this->form_validation->run() == FALSE) {
	            echo validation_errors();
	            // Handle validation errors
	        } else {
	        	// Check if the name already exists in the manager table
		        // $checkdata = array('email' => $email, 'isActive' => 1);
		        // if (check_field_exists($checkdata, 'manager')) {
		        //     echo json_encode(array('status' => 'error', 'message' => '<p>This Email is already exists</p>'));
		        // } else {
			if ($this->Doctor_model->is_email_duplicate($email) && $this->Doctor_model->is_number_duplicate($number) ) {
				$response = array(
					'status' => 'error',
					'message' => 'Email address and number already exist'
				);
				echo json_encode($response);
				} elseif ($this->Doctor_model->is_email_duplicate($email) ) {
					
						echo json_encode(array('status' => 'error', 'message' => 'Email address already exists'));
					} elseif ($this->Doctor_model->is_number_duplicate($number) ) {
					
						echo json_encode(array('status' => 'error', 'message' => 'Number already exists'));
				} else {

		     if($_FILES['file_url']['name']){
            $file_name = $_FILES['file_url']['name'];
			$fileSize = $_FILES["file_url"]["size"]/1024;
			$fileType = $_FILES["file_url"]["type"];
			$new_file_name='';
            $new_file_name .= $file_name;

            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/uploads/doctor_profile",
                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
                'overwrite' => False,
                'max_size' => "50720000"
            );
            //create directory
              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
    
            $this->load->library('Upload', $config);
            $this->upload->initialize($config);                
            if (!$this->upload->do_upload('file_url')) {
                echo $this->upload->display_errors();
                #redirect("notice/All_notice");
			}
   
			else {

                $path = $this->upload->data();
                $img_url = $path['file_name'];
	            $data = array(
	                'name' => $name,
	                'email' => $email,
	                'gender' => $gender,
	                'mobile_no' => $mobileNo,
	                'profile_picture'=>$img_url,
	                'language_spoken' => implode(',', $languageSpoken),
	                'intro' => $intro,
	                'password' => $hashed_password,
	                'qualification' => $qualification,
	                'medical_council_no' => $medical_council_no,

	            );
	            
	        }
	      }else{

	      	 $data = array(
	                'name' => $name,
	                'email' => $email,
	                'gender' => $gender,
	                'mobile_no' => $mobileNo,
	              
	                'language_spoken' => implode(',', $languageSpoken),
	                'intro' => $intro,
	                'password' => $hashed_password,
	                 'qualification' => $qualification,
	                'medical_council_no' => $medical_council_no,
	            );
	      	 

	      }

	       //print_r($data); die();
	            // Save the data to the manager table using your model function
	            $success = $this->Doctor_model->saveDoctorData($data); //Doctor_model

	            if ($success) {
	            	$number = $mobileNo;
	            	$this->send_mail_manager($name,$email,$number,$password);
	                echo json_encode(array('status' => 'success', 'message' =>'Doctor saved successfully'));
	            } else {
	                echo json_encode(array('status' => 'error', 'message' => 'Failed to save manager'));
	            }
	     }
	    }
	    } else {
	        redirect(base_url(), 'refresh');
	    }
	}
	 public function Update_doctor()
		{
		    if ($this->session->userdata('user_login_access') != False) {
		    	$id = $this->input->post('id');
		        $name = $this->input->post('firstname');
		        $email = $this->input->post('email');
		        $gender = $this->input->post('gender');
		        $mobileNo = $this->input->post('number');
		        $languageSpoken = $this->input->post('language');
		      //  print_r($languageSpoken); die();
		        $intro = $this->input->post('address');
		        $password = $this->input->post('password');
	             // Hash the password
	           $hashed_password = password_hash($password, PASSWORD_DEFAULT);
	           	        $qualification = $this->input->post('qualification');
	        $medical_council_no = $this->input->post('medical_council_no');
		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('firstname', 'Name', 'trim|required|max_length[255]|xss_clean');
		        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
		        // Add more validation rules as needed for other fields

		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {
		       

			     if($_FILES['file_url']['name']){
	            $file_name = $_FILES['file_url']['name'];
				$fileSize = $_FILES["file_url"]["size"]/1024;
				$fileType = $_FILES["file_url"]["type"];
				$new_file_name='';
	            $new_file_name .= $file_name;

	            $config = array(
	                'file_name' => $new_file_name,
	                'upload_path' => "./assets/uploads/doctor_profile",
	                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
	                'overwrite' => False,
	                'max_size' => "50720000"
	            );
	            //create directory
	              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	    
	            $this->load->library('Upload', $config);
	            $this->upload->initialize($config);                
	            if (!$this->upload->do_upload('file_url')) {
	                echo $this->upload->display_errors();
	                #redirect("notice/All_notice");
				}
	   
				else {

	                $path = $this->upload->data();
	                $img_url = $path['file_name'];
		            $data = array(
		                'name' => $name,
		                'email' => $email,
		                'gender' => $gender,
		                'mobile_no' => $mobileNo,
		                'profile_picture'=>$img_url,
		                'language_spoken' => implode(',', $languageSpoken),
		                'intro' => $intro,
		                 'qualification' => $qualification,
	                'medical_council_no' => $medical_council_no,
		               // 'password' => $hashed_password
		            );
		              if ($password) {
				    $data["password"] = $hashed_password;
				}

		            
		        }
		      }else{

		      	 $data = array(
		                'name' => $name,
		                'email' => $email,
		                'gender' => $gender,
		                'mobile_no' => $mobileNo,
		               
		                'language_spoken' => implode(',', $languageSpoken),
		                'intro' => $intro,
		               'qualification' => $qualification,
	                'medical_council_no' => $medical_council_no,
		            );
		      	   if ($password) {
				    $data["password"] = $hashed_password;
				}

		      }

		      // Save the data to the manager table using your model function
		            $success = $this->Doctor_model->UpdateDoctorData($data,$id);

		            if ($success) {
		                
		                  $data["id"] = $id;
		                echo json_encode(array('status' => 'success', 'message' => 'Doctor updated successfully','member'=>$data));
		            } else {
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update manager'));
		            }


		    // }
		    }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
		}
	  //update modal get data
	   public function getDoctorByID() {
	        // Get the ID parameter from the AJAX request
	        $id = $this->input->get('id');
	        $navigator = $this->Doctor_model->getDoctorByID($id);
	        
	        // Prepare the response data as an array
	        $response = array(
	            'id' => $navigator->id,
	            'name' => $navigator->name,
	            'email' => $navigator->email,
	            'gender' => $navigator->gender,
	            'mobile_no' => $navigator->mobile_no,
	            'intro' => $navigator->intro,
	            'language_spoken' => $navigator->language_spoken,
	            'profile_picture' => $navigator->profile_picture,
	                'qualification' => $navigator->qualification,
	                'medical_council_no' => $navigator->medical_council_no,
	        );
	        
	        // Send the response as JSON
	        echo json_encode($response);
	    }

	    //Doctor delete
	     public function Doctordelete(){
	        if($this->session->userdata('user_login_access') != False) { 
	            $id = $this->input->post('id');
	            $result_del = $this->Doctor_model->Doctordelete($id);//
	          if($result_del){
	                echo json_encode(array('status'=>'success','message'=> 'Deleted Successfully'));
	               
	            }else{
	                 echo json_encode(array('status'=>'failed','message'=> 'Not deleted'));
	             
	            }
	           
	            }
	        else{
	            redirect(base_url() , 'refresh');
	        }       
	     }
	    //Doctor delete
	    //  public function Doctordelete(){
	    //     if($this->session->userdata('user_login_access') != False) { 
	    //         $id = $this->input->post('id');
	    //         $result_del = $this->Doctor_model->UpdateDoctorData($id);//
	    //       if($result_del){
	    //             echo json_encode(array('status'=>'success','message'=> 'Deleted Successfully'));
	               
	    //         }else{
	    //              echo json_encode(array('status'=>'failed','message'=> 'Not deleted'));
	             
	    //         }
	           
	    //         }
	    //     else{
	    //         redirect(base_url() , 'refresh');
	    //     }       
	    //  }
      public function Add_Assign_Doctors()
	{
		//$this->checkLogin();
		if ($this->session->userdata('user_login_access') != False) {
             //die();
		    	$id = $this->input->post('id');
		    	$name = $this->input->post('name');
				$email = $this->input->post('email');
				$gender = $this->input->post('gender');
				$number = $this->input->post('number');

				$address = $this->input->post('address');
				$password = $this->input->post('password');
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                 $doctor = $this->input->post('doctor');

                 	$member_id = $this->input->post('member_id');

		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');
		        if(!$this->input->post('subprofile')){
					$this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
					}

                 $doctor_data =  $this->Doctor_model->getDoctorDetails($doctor);



		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {
		        
          
		

		      	$data = array(
					    'name' => $name,
					    'email' => $email,
					    'gender' => $gender,
					    'number' => $number,
				        'doctor' => $doctor,
						'doctor_status'=>'1'
					    
					);
		      	if ($password) {
					    $data["password"] = $hashed_password;
					}
		      }
               
            //  print_r($data);die();

		      // Save the data to the manager table using your model function
		            $success = $this->Manager_model->UpdateMember($data,$id);// print_r($success);die();

		            if ($success) {

		            	 /*Notification*/

		                $filetitle = 'New member assignment: <span class="txt-name">'.$name .'-'.$member_id.'</span>.';
		               // foreach ($admin as $data) {
		                 $data = array(
		                'doctor_id' => $doctor,
		                'message' => $filetitle,
		                'created_at' => date('Y-m-d H:i:s'),
		                'status' => 'unread',
		                'icon' => 'fa fa-comments-o',
		                'color' => 'blue-bgcolor',
		                 'url' => 'Doctor/My_Members'
		                );
		                $this->db->insert('doctor_notifications', $data);
		                //}

					      	$data = array(
								    'name' => $name,
								    'email' => $email,
								    'gender' => $gender,
								    'number' => $number,
							
								     'doctor' => $doctor,
								    
								);
			              $data["id"] = $id;
			                $data['manager_name'] =    $doctor_data->name;
		                echo json_encode(array('status' => 'success', 'message' => 'Data Added successfully','member'=>$data));
		                $this->send_mail_assign_memeber($doctor_data->email,$doctor_data->name,$name,$email,$number);
		            } else {
		            	
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
		            }

		   // }
		   // }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
	}
	        //assigning mail
	  public function send_mail_assign_memeber($manageremail,$recivername,$name,$email,$number) {
 

    // Create the inquiry email
    $Mail = new PHPMailer(true);
    ob_start();
    ?>
    <!-- Inquiry email HTML content -->
  <html>
  <head>
      <meta charset="UTF-8">
      <title></title>
      <style>
          body {
              margin: 0;
              padding: 0;
              font-family: Arial, sans-serif;
          }

          .container {
              max-width: 600px;
              margin: 0 auto;
              padding: 20px;
              background-color: #F5F8FB;
          }

          h1 {
              font-size: 24px;
              margin-top: 0;
          }

          table {
              width: 100%;
          }

          table td {
              padding: 5px;
          }

          .btn {
              display: inline-block;
              padding: 10px 20px;
              background-color: #2196F3;
              color: #ffffff;
              text-decoration: none;
              border-radius: 2px;
              font-weight: bold;
          }

          .caption {
              font-size: 12px;
              color: #616161;
          }

          .signature {
              margin-top: 20px;
              font-size: 12px;
          }

          .logo-image {
              display: inline-block;
              vertical-align: middle;
          }

          .logo-image img {
              max-width: 70px;
              height: auto;
          }

          .unsubscribe-link {
              display: inline-block;
              margin-right: 10px;
              text-decoration: none;
              color: #616161;
          }
      </style>
  </head>
  <body>
      <div class="container">
         
            <p>Dear <?=$recivername; ?></p><br>
            <p>I hope this message finds you well. I wanted to inform you that a member has been assigned to you.</p>
            
           <h3>Assigned Member Details:</h3>
          <table>
              <tr>
                  <td><strong>Name</strong></td>
                  <td><?php if(isset($name)) { echo  $name; } ?></td>
              </tr>
              <tr>
                  <td><strong>Email</strong></td>
                    <td><?php if(isset($email)) { echo  $email; } ?></td>
              </tr>
              <tr>
                  <td><strong>Phone</strong></td>
                    <td><?php if(isset($number)) { echo  $number; } ?></td>
              </tr> 
             
          </table>

       <!-- <p><a href="<?php echo base_url('login')?>" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #ffffff; text-decoration: none; border-radius: 5px;">Login Our Website</a></p> -->

          <div class="signature">
              <p>
              Thank you,<br>
             AssisHealth,<br>
              #850,
              3rd Floor,<br>
              opposite Coffee Day,<br>
              RMS Layout, Sahakar Nagar,<br> Bengaluru, Karnataka 560092.</p>
              </p>
             <!--  <p>
                  Support: <a href="mailto:#">info@whello.id</a>
              </p> -->
              <!-- <div class="logo-image">
                  <a href="#" target="_blank">
                      <img src="https://zavoloklom.github.io/material-design-iconic-font/icons/mstile-70x70.png" alt="logo-alt">
                  </a>
              </div> -->
          </div>
      </div>
  </body>
  </html>
    <?php
    $inquiryMessage = ob_get_clean();

    try {
        // Configure and send the inquiry email
        $Mail->isSMTP();
        $Mail->Host = 'smtp.gmail.com';
        $Mail->SMTPAuth = true;
        $Mail->Username = USERNAME;
        $Mail->Password = PASSWORD;
        $Mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $Mail->Port = 465;
        $Mail->setFrom(FROM, FROMNAME);
        $Mail->addAddress($manageremail,$recivername);
        $Mail->isHTML(true);
        $Mail->Subject = ' Member Assignment Notification';
        $Mail->Body = $inquiryMessage;

        ?>
  
        <?php
       

        // Send both emails
        if ($Mail->send()) {
           // echo json_encode(array('status' => 'success', 'message' => 'Register Successfully!!'));
        } else {
            //echo json_encode(array('status' => 'error', 'message' => 'Error in sending emails.'));
        }
    } catch (Exception $e) {
        //echo json_encode(array('status' => 'error', 'message' => "An error occurred. {$e->getMessage()}"));
    }
   }


		
		public function generate_pdf()
		{
			$selectedCheckboxes = $this->input->get('checkboxes');
			// echo  $this->input->get('checkboxes');
			$checkboxValues = explode(',', $selectedCheckboxes);

			/*New */
				$id = $this->input->get('id');
			//$data['user_data'] = $this->Manager_model->getUserDetails($id);
			$user_data = $this->Manager_model->getUserDetails($id);
				$member_id = $id;
						// Fetch data from the main Medical History table based on id and member_id
				$medical_history = $this->Admin_model->get_medical_history($member_id);//
				
				$d_id = $user_data->doctor;
				$doctor = $this->Doctor_model->getDoctorByID($d_id );
				if ($medical_history) {
					// Fetch data from child tables based on medical_history_id and member_id
					$previous_medical_conditions = $this->Admin_model->get_previous_medical_conditions($medical_history->id, $member_id);
					$surgeries_procedures = $this->Admin_model->get_surgeries_procedures($medical_history->id, $member_id);
					$allergies = $this->Admin_model->get_allergies($medical_history->id, $member_id);
					$current_medications = $this->Admin_model->get_current_medications($medical_history->id, $member_id);
					$family_medical_history = $this->Admin_model->get_family_medical_history($medical_history->id, $member_id);
					$immunization_history = $this->Admin_model->get_immunization_history($medical_history->id, $member_id);
					$previous_medical_test_results = $this->Admin_model->get_previous_medical_test_results($medical_history->id, $member_id);
					$current_symptoms_concerns = $this->Admin_model->get_current_symptoms_concerns($medical_history->id, $member_id);

						//---------------------------------------------New 29.7.24 --------------------------------
			$consultations_1 = $this->Admin_model->get_consultations_1($medical_history->id, $member_id);
			$consultations_2 = $this->Admin_model->get_consultations_2($medical_history->id, $member_id);
		

		//---------------------------------------------New 29.7.24 --------------------------------

					// Prepare data to be sent to the view
					$data = array(
						'user_data' => $user_data,
						'medical_history' => $medical_history,
						'previous_medical_conditions' => $previous_medical_conditions,
						'surgeries_procedures' => $surgeries_procedures,
						'allergies' => $allergies,
						'current_medications' => $current_medications,
						'family_medical_history' => $family_medical_history,
						'immunization_history' => $immunization_history,
						'previous_medical_test_results' => $previous_medical_test_results,
						'current_symptoms_concerns' => $current_symptoms_concerns,
						'consultations_1' => $consultations_1, //new
						'consultations_2' => $consultations_2//new
					);
					// echo "<pre>";
					// print_r($data); die();
				
			  }else{
					  $previous_medical_conditions = '';
					$surgeries_procedures = '';
					$allergies = '';
					$current_medications = '';
					$family_medical_history = '';
					$immunization_history = '';
					$previous_medical_test_results = '';
					$current_symptoms_concerns = '';
					$consultations_1 = '';//new
					$consultations_2 = '';//new
				   $data = array(
						'user_data' => $user_data,
						'medical_history' => $medical_history,
						'previous_medical_conditions' => $previous_medical_conditions,
						'surgeries_procedures' => $surgeries_procedures,
						'allergies' => $allergies,
						'current_medications' => $current_medications,
						'family_medical_history' => $family_medical_history,
						'immunization_history' => $immunization_history,
						'previous_medical_test_results' => $previous_medical_test_results,
						'current_symptoms_concerns' => $current_symptoms_concerns,
						'consultations_1' => $consultations_1,//new
						'consultations_2' => $consultations_2//new
					);
			  }
			
			//--------
			$this->load->library('MYPDF1');

			$pdf = new MYPDF1(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);

			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Appointment Confirmation');
			$pdf->SetTitle('Appointment Confirmation');
			$pdf->SetSubject('Appointment Confirmation');
			//$pdf->SetKeywords('TCPDF, PDF, example, test, codeigniter');

			// set default header data
			$pdf->SetHeaderData(PDF_HEADER_LOGO, "", PDF_HEADER_TITLE, PDF_HEADER_STRING);

			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER); 

			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			
			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

			// set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


		  //navigator
		  $navigator_data =  $this->Manager_model->getNavigatorDetails( $user_data->navigator);
		  $pdf->id = $user_data->member_id;
		  $pdf->nav_name = $navigator_data->name;
		  $pdf->nav_no = $navigator_data->mobile_no;
			// print_r($navigator_data);die();

			//navigator


			// add a page
			$pdf->AddPage();


					// Calculate the center position
			$centerX = $pdf->getPageWidth() / 2;
			$centerY = $pdf->getPageHeight() - 130; // Adjust the Y position as needed for spacing
			// Set the line color to black
				
			$data['checkboxValues'] = $checkboxValues;//seected values

			$html =   $this->load->view('Backend/pdf/medical_history_pdf_view', $data, true);
	
		//$pdf->Cell(0, 50,'This is system generated payslip', 0, $ln=0, 'C', 0, '', 0, false,  'T', 'M');
		//$pdf->SetY(50);
		$filename = "Report";
		
		
		

		//$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		// reset pointer to the last page
		// $pdf->lastPage();

		// Check if it's the last page
			if ($pdf->getPage() === $pdf->getNumPages()) {
				// Add a content cell before the footer
				if($doctor->name){
					$pdf->Cell(0, 3, ' '.$doctor->name, 0, 1, 'L');
					$pdf->Cell(0, 3, 'AssistHealth Doctor', 0, 1, 'L');
				}
			
		
		
			}


		ob_end_clean();
		ob_clean();

		
			
			//Close and output PDF document
			$pdf->Output('Medical_History.pdf', 'I');
		}

 
		//new AppointmentConfirmation
	public function AppointmentConfirmation()
	{	$this->checkLogin();
		$id = $this->session->userdata('user_login_id');
        $data['members'] = $this->Manager_model->getOngoingMembersbynavigator($id);
        $data['submembers'] = $this->Manager_model->getSubProfileOngoingMembersbynavigator($id);
		$this->load->view('Backend/manager/confirm-appointment',$data);
	}
	public function Appointmentpdf()
		{

			$name = $this->input->post('name');
			$member_id = $this->input->post('member_id');
			$address = $this->input->post('address');
			$number = $this->input->post('number');
			$services =  ucwords($this->input->post('services'));
			$appointment_date = $this->input->post('appointment_date');
			$appointment_time = $this->input->post('appointment_time');
			$doctor_name = $this->input->post('doctor_name');
			$specialization = $this->input->post('specialization');
			$clinic_name = $this->input->post('clinic_name');
			$clinic_address = $this->input->post('clinic_address');

			// Now you can use these individual variables to handle the form data in CodeIgniter.

			$this->load->library('MYPDF');

			$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);

			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Appointment Confirmation');
			$pdf->SetTitle('Appointment Confirmation');
			$pdf->SetSubject('Appointment Confirmation');
			$pdf->SetKeywords('TCPDF, PDF, example, test, codeigniter');

			// set default header data
			$pdf->SetHeaderData(PDF_HEADER_LOGO, "", PDF_HEADER_TITLE, PDF_HEADER_STRING);

			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

			// set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

			// set font
			// $pdf->SetFont('times', 'BI', 12);
			$pdf->SetMargins(0, 10, 0, 0);
			// Remove footer margin
			$pdf->SetFooterMargin(0);

			// Disable footer printing
			$pdf->setPrintFooter(false);


			$pdf->id = $member_id;

			// add a page
			$pdf->AddPage();

					// Calculate the center position
			$centerX = $pdf->getPageWidth() / 2;
			$centerY = $pdf->getPageHeight() - 130; // Adjust the Y position as needed for spacing
			// Set the line color to black
			$pdf->SetDrawColor(0, 0, 0); // RGB values for black
			// Set the line thickness
		$pdf->SetLineWidth(1);
			// Draw a centered bottom border using Line method
			$pdf->Line($centerX - 30, $centerY, $centerX + 30, $centerY);


			// set some text to print
			$txt = <<<EOD
				<br><br><br><br><br><br>
			<h1 style="text-align: center;text-decoration: underline;">Appointment Confirmation Form</h1>
		
			<br><br>			
			<table>
				<tr>
				<td style="width:10%;"></td>
					<td style="width:10%;font-size:16px;">Dear :</td>
					<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$name</td>
					<td style="width:10%;"></td>
				</tr> <br>
				<tr>
					<td style="width:10%;"></td>
					<td style="width:80%;font-size:15px;">We are pleased to inform you that your doctor appointment has been confirmed. Below are the details of your appointment:</td>
					<td style=""></td>
					<td style="width:10%;"></td>
				</tr>
			
				<br>
				
				<tr>
				<td style="width:10%;"></td>
					<td style="width:30%;font-size:16px;">Appointment Details :</td>
					<td style="width:50%;background-color:#009CB7;font-size:14px;color:white; text-transform: capitalize;">$services</td>
					<td style="width:10%;"></td>
				</tr>
				</table>
				<br><br>
				<table>
				<tr>
				<td style="width:10%;"></td>
					<td style="width:30%;font-size:16px;">Appointment Date :</td>
					<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$appointment_date</td>
					<td style="width:10%;"></td>
				</tr>
				</table>
				<br><br>
				<table>
				<tr>
				<td style="width:10%;"></td>
					<td style="width:30%;font-size:16px;">Appointment Time :</td>
					<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$appointment_time</td>
					<td style="width:10%;"></td>
				</tr>
				</table>
				<br><br>
				<table>
				<tr>
				<td style="width:10%;"></td>
					<td style="width:30%;font-size:16px;">Doctor's Name :</td>
					<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$doctor_name</td>
					<td style="width:10%;"></td>
				</tr>
				</table>
				<br><br>
				<table>
				<tr>
				<td style="width:10%;"></td>
					<td style="width:30%;font-size:16px;">Doctor's Specialization :</td>
					<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$specialization</td>
					<td style="width:10%;"></td>
				</tr>
				</table>
				<br><br>
				<table>
				<tr>
				<td style="width:10%;"></td>
					<td style="width:30%;font-size:16px;">Clinic/Hospital Name :</td>
					<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$clinic_name </td>
					<td style="width:10%;"></td>
				</tr>
				</table>
				<br><br>
				<table>
				<tr>
				<td style="width:10%;"></td>
					<td style="width:30%;font-size:16px;">Clinic/Hospital Address :</td>
					<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$clinic_address</td>
					<td style="width:10%;"></td>
				</tr>
				</table>
				
				

			
				
			EOD;

			// print a block of text using Write()
			$pdf->writeHTML($txt, true, false, true, false, '');
		
				// Additional information table
			$infoTable = <<<EOD
			<br><br><br>
			<table>
				<tr>
				<td style="width:10%;"></td>
					<td style="width:50%;font-size:15px;">Please note the following important information:</td>
					<td style="width:30%;"></td>
					<td style="width:10%;"></td>
				</tr>
				</table>
				<br><br>
				<table>
				<tr>
					<td style="width:10%;"></td>
					<td style="width:70%;font-size:15px;">Please arrive at the clinic/hospital at least 15 minutes before your scheduled</td>
					<td style="width:10%;"></td>
					<td style="width:10%;"></td>
				</tr>
				<tr>
				<td style="width:10%;"></td>
					<td style="width:70%;font-size:15px;">appointment time to complete any necessary paperwork or registration processes.</td>
					<td style="width:10%;"></td>
					<td style="width:10%;"></td>
				</tr>
				<br>
				<table>
				<tr>
					<td style="width:10%;"></td>
					<td style="width:80%;font-size:15px;">If you need to cancel or reschedule your appointment, kindly inform us at least 24</td>
					<td style="width:;"></td>
					<td style="width:10%;"></td>
				</tr>
				<tr>
				<td style="width:10%;"></td>
					<td style="width:70%;font-size:15px;">hours in advance.</td>
					<td style="width:10%;"></td>
					<td style="width:10%;"></td>
				</tr>
				<br>
				
				<tr>
					<td style="width:10%;"></td>
					<td style="width:80%;font-size:15px;">For any questions or assistance regarding your appointment, please contact our</td>
					<td style="width:;"></td>
					<td style="width:10%;"></td>
				</tr>
				<tr>
				<td style="width:10%;"></td>
					<td style="width:70%;font-size:15px;">AssistHealth team at <strong>9611232519</strong> or <a href="mailto:support@assisthealth.com" style="color:black;text-decoration: none;">support@assisthealth.com.</a></td>
					<td style="width:10%;"></td>
					<td style="width:10%;"></td>
				</tr>

				<br>	
				<tr>
				<td style="width:10%;"></td>
					<td style="width:70%;font-size:15px;">We look forward to helping you with your healthcare needs and ensuring a smooth and beneficial doctor consultation.</td>
					<td style="width:10%;"></td>
					<td style="width:10%;"></td>
				</tr>
				
				<tr>
				
				<br>
				<td style="width:10%;"></td>
					<td style="width:70%;font-size:16px;">Best regards,<br>Team AssistHealth</td>
					<td style="width:10%;"></td>
					<td style="width:10%;"></td>
				</tr>
				</table>
				
			EOD;
		


			// Print the additional information table
			$pdf->writeHTML($infoTable, true, false, true, false, '');

			

			// ---------------------------------------------------------
			ob_clean();
			//Close and output PDF document
			$pdf->Output('AppointmentConfirmation.pdf', 'I');

			echo '<script type="text/javascript">
			window.open("' . base_url('Admin/Appointmentpdf') . '", "_blank");
		</script>';
		}

		// Calender
			// Calander view
			 public  function load()
		     {

		  	$id = $this->session->userdata('user_login_id');
			$appointment_counts = $this->Manager_model->getnavigatorOngoingAppointmentCountsByDate($id);
			$data = array();
		    $j = 1;
			foreach ($appointment_counts as $row) {
			    if ($row->appointment_count > 1) {
			        $data[] = array(
			            'id' => $j,
			            'title' => "Ongoing Appointments : "."  ". $row->appointment_count,
			            'start' => $row->appointment_date,
			            'end' => $row->appointment_date,
			            'className' => 'bg-info',
			        );
			        $j++;
			    }
			    // Include data for all dates, even if there's only one appointment
			    else {
			        $data[] = array(
			            'id' => $j,
			            'title' =>  "Ongoing Appointment : "."  ". $row->appointment_count,
			            'start' => $row->appointment_date,
			            'end' => $row->appointment_date,
			            'className' => 'bg-info',
			        );
			        $j++;
			    }
		       }

		           //New
			     $pending_appointment_counts = $this->Manager_model->getPendingAppointmentCountsByDate($id);
				//$data = array();
			    $j = 1;
				foreach ($pending_appointment_counts as $row) {
				    if ($row->appointment_count > 1) {
				        $data[] = array(
				            'id' => $j,
				            'title' => "Pending Appointments : "."  ". $row->appointment_count,
				            'start' => $row->appointment_date,
				            'end' => $row->appointment_date,
				            'className' => 'bg-warning',
				        );
				        $j++;
				    }
				    // Include data for all dates, even if there's only one appointment
				    else {
				        $data[] = array(
				            'id' => $j,
				            'title' =>  "Pending Appointment : "."  ". $row->appointment_count,
				            'start' => $row->appointment_date,
				            'end' => $row->appointment_date,
				            'className' => 'bg-warning',
				        );
				        $j++;
				    }
			       }

		      echo json_encode($data);
		   
		  }
		  // New user register
		  
		   public function send_mail($name,$email,$number) {


		    // Create the inquiry email
		    $inquiryMail = new PHPMailer(true);
		    ob_start();
		    ?>
		    <!-- Inquiry email HTML content -->
		  <html>
		  <head>
		      <meta charset="UTF-8">
		      <title></title>
		      <style>
		          body {
		              margin: 0;
		              padding: 0;
		              font-family: Arial, sans-serif;
		          }

		          .container {
		              max-width: 600px;
		              margin: 0 auto;
		              padding: 20px;
		              background-color: #F5F8FB;
		          }

		          h1 {
		              font-size: 24px;
		              margin-top: 0;
		          }

		          table {
		              width: 100%;
		          }

		          table td {
		              padding: 5px;
		          }

		          .btn {
		              display: inline-block;
		              padding: 10px 20px;
		              background-color: #2196F3;
		              color: #ffffff;
		              text-decoration: none;
		              border-radius: 2px;
		              font-weight: bold;
		          }

		          .caption {
		              font-size: 12px;
		              color: #616161;
		          }

		          .signature {
		              margin-top: 20px;
		              font-size: 12px;
		          }

		          .logo-image {
		              display: inline-block;
		              vertical-align: middle;
		          }

		          .logo-image img {
		              max-width: 70px;
		              height: auto;
		          }

		          .unsubscribe-link {
		              display: inline-block;
		              margin-right: 10px;
		              text-decoration: none;
		              color: #616161;
		          }
		      </style>
		  </head>
		  <body>
		      <div class="container">
		          <h1>New User Registration</h1>
		            <p>Hello Admin,</p>
		            <p>A new user has registered on our website. Here are the registration details:</p>
		          <table>
		              <tr>
		                  <td><strong>Name</strong></td>
		                  <td><?php if(isset($name)) { echo  $name; } ?></td>
		              </tr>
		              <tr>
		                  <td><strong>Email</strong></td>
		                    <td><?php if(isset($email)) { echo  $email; } ?></td>
		              </tr>
		              <tr>
		                  <td><strong>Phone</strong></td>
		                    <td><?php if(isset($number)) { echo  $number; } ?></td>
		              </tr> 
		               <!-- <tr>
		                  <td><strong>Message</strong></td>
		                    <td><?php if(isset($message)) { echo  $message; } ?></td>
		              </tr> -->
		          </table>

		       <!--    <p style="text-align:center;">
		              <a href="#" class="btn">EXAMPLE BUTTON</a>
		          </p>
		          <p style="text-align:center;">
		              <a href="#" class="unsubscribe-link">Unsubscribe</a>
		              <span>|</span>
		              <a href="#" class="unsubscribe-link">Account Settings</a>
		          </p> -->
		          <!-- <p class="caption">This is a caption text in the main email body.</p> -->

		          <div class="signature">
		              <p>
		              Thank you,<br>
		             AssisHealth,<br>
		              #850,
		              3rd Floor,<br>
		              opposite Coffee Day,<br>
		              RMS Layout, Sahakar Nagar,<br> Bengaluru, Karnataka 560092.</p>
		              </p>
		             <!--  <p>
		                  Support: <a href="mailto:#">info@whello.id</a>
		              </p> -->
		              <!-- <div class="logo-image">
		                  <a href="#" target="_blank">
		                      <img src="https://zavoloklom.github.io/material-design-iconic-font/icons/mstile-70x70.png" alt="logo-alt">
		                  </a>
		              </div> -->
		          </div>
		      </div>
		  </body>
		  </html>
		    <?php
		    $inquiryMessage = ob_get_clean();

		    try {
		        // Configure and send the inquiry email
		        $inquiryMail->isSMTP();
		        $inquiryMail->Host = 'smtp.gmail.com';
		        $inquiryMail->SMTPAuth = true;
		        $inquiryMail->Username = USERNAME;
		        $inquiryMail->Password = PASSWORD;
		        $inquiryMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
		        $inquiryMail->Port = 465;
		        $inquiryMail->setFrom(FROM, FROMNAME);
		        $inquiryMail->addAddress(FROM, FROMNAME);
		        $inquiryMail->isHTML(true);
		        $inquiryMail->Subject = 'New User Registration!!!';
		        $inquiryMail->Body = $inquiryMessage;

		        // Create the thank you email
		        $thankYouMail = new PHPMailer(true);
		        ob_start();
		        ?>
		    <html>
		    <head>
		        <style>
		            /* CSS styles for the email content */
		            body {
		                font-family: Arial, sans-serif;
		              
		            }
		            
		            .container {
		                max-width: 600px;
		                margin: 0 auto;
		                padding: 20px;
		                background-color: #F5F8FB;
		            }
		            
		            h1 {
		                font-size: 24px;
		                color: #333333;
		                margin-bottom: 20px;
		            }
		            
		            p {
		                font-size: 16px;
		                color: #666666;
		                margin-bottom: 10px;
		            }
		            
		            .cta-button {
		                display: inline-block;
		                padding: 10px 20px;
		                background-color: #337ab7;
		                color: #ffffff;
		                text-decoration: none;
		                border-radius: 5px;
		            }
		            
		            .footer {
		/*                text-align: center;*/
		                margin-top: 20px;
		                padding: 10px;
		            }
		            
		            .footer p {
		                font-size: 14px;
		                color: #999999;
		                margin-bottom: 5px;
		            }
		        </style>
		    </head>
		    <body style="background-color: ">
		        <div class="container" style="background-color: #F5F8FB; max-width: 600px; margin: 0 auto; padding: 20px;">
		            <h1>Thank you for registering!</h1>
		            <p>Dear <?php echo $name; ?>,</p>
		            <p>Thank you for registering on our website. We are excited to have you as part of our community.</p>
		            <p>If you have any questions or need further assistance, feel free to contact us <a href="mailto:infoassisthealth@gmail.com">infoassisthealth@gmail.com</a>.</p>
		            <p><a href="<?php echo base_url()?>" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #ffffff; text-decoration: none; border-radius: 5px;">Visit Our Website</a></p>

		              <div class="footer" >
		            <!-- <p>Thank you,</p>
		            <p>Assist Health</p> -->
		            <p>Thank you,<br>
		               AssisHealth,<br>
		                #850,
		                3rd Floor,<br>
		                opposite Coffee Day,<br>
		                RMS Layout, Sahakar Nagar,<br> Bengaluru, Karnataka 560092.</p>
		        </div>
		        </div>
		       
		      
		       
		    </body>
		    </html>
		        <?php
		        $thankYouMessage = ob_get_clean();

		        // Configure and send the thank you email
		        $thankYouMail->isSMTP();
		        $thankYouMail->Host = 'smtp.gmail.com';
		        $thankYouMail->SMTPAuth = true;
		        $thankYouMail->Username = USERNAME;
		        $thankYouMail->Password = PASSWORD;
		        $thankYouMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
		        $thankYouMail->Port = 465;
		        $thankYouMail->setFrom(FROM, FROMNAME);
		        $thankYouMail->addAddress($email, $name);
		        $thankYouMail->isHTML(true);
		        $thankYouMail->Subject = 'Thank you for registering!';
		        $thankYouMail->Body = $thankYouMessage;

		        // Send both emails
		        if ($inquiryMail->send() && $thankYouMail->send()) {
		           // echo json_encode(array('status' => 'success', 'message' => 'Register Successfully!!'));
		        } else {
		           // echo json_encode(array('status' => 'error', 'message' => 'Error in sending emails.'));
		        }
		    } catch (Exception $e) {
		        //echo json_encode(array('status' => 'error', 'message' => "An error occurred. {$e->getMessage()}"));
		    }
		}




		   // ------------------------------ ID CARD ---------------------------------------------------- //
	     public function generate_IdCard()
		{ //IDCARD

		$m_name = base64_decode($this->input->get('m_name'));
		$m_id = base64_decode($this->input->get('m_id'));

		$this->load->library('IDCARD');
        // Create instance of TCPDF
		$pdf = new IDCARD(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);


		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('ID CARD');
		$pdf->SetTitle('ID CARD');
		$pdf->SetSubject('ID CARD');
		//$pdf->SetKeywords('TCPDF, PDF, example, test, codeigniter');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, "", PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set font
		// $pdf->SetFont('times', 'BI', 12);
		  $pdf->SetMargins(10, 10, 10, 0);
		  // Remove footer margin
		$pdf->SetFooterMargin(0);
		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		    // $pdf->SetFont('times', 'BI', 12);

		// Add a page
		$pdf->AddPage();
       //assets\backend_assets\img\id
		$img_file = base_url().'assets/backend_assets/img/id/bg1.png';//bg1.jpg

		$pdf->Image($img_file, 10, 10, 140, 70, '', '', '', false, 300, '', false, false, 0);
		  $pdf->SetMargins(10, 10, 10, 0);
		// HTML content
			$html = '
		<table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin-right:5%">
		    <tr>
		    <br>
		    <td style="width: 48%; "><p style="font-weight: bold; color: #38B6FF;"> &nbsp;&nbsp;ASSISTHEALTH<br><span style="color: white;font-size:12px;background:white">  &nbsp;&nbsp;MEMBERSHIP CARD</span> 
		        <br> &nbsp;&nbsp;<span style="background-color: ; border-radius: 10px;  margin-left: 10px; width:10%"><span style="color:#38B6FF;text-transform: uppercase;">'.$m_name.' &nbsp;&nbsp;&nbsp;</span></span><br>&nbsp;&nbsp;&nbsp;<span style="color: white;background-color: ;border-radius: 10px;  ">ASSISTHEALTH ID:<span style="color: #aa893f;background-color: ;">'.$m_id.'</span></span> </p><p style="font-weight: bold; color: #38B6FF; font-size:12px"> &nbsp;&nbsp;COMPLETE HEALTHCARE SUPPORT,<br>   JUST A CALL AWAY</p>
		           <span style="font-weight: bold; color: black; text-transform: uppercase;background-color: #38B6FF;"> &nbsp;&nbsp;9611232593 / 9611232519</span><br>
		        <span style="color: white; font-size: 10px;"> &nbsp;&nbsp;Valid for registered members only.</span><br>
		        <span style="color: white; font-size: 10px;"> &nbsp;&nbsp;Use this membership card to schedule any AssistHealth services.</span><br>
		        <span style="color: white; font-size: 10px;"> &nbsp;&nbsp;Keep these contact numbers handy for quick access to your  <br> &nbsp;&nbsp;   Navigators.</span>
		                        
		                  
		        </td>
		        <td style="width: 52%; float:right">
		            <table border="0" cellspacing="0" cellpadding="0" width="100%">
		                <tr>
		                   &nbsp;&nbsp; <td><img src="'.base_url().'assets/backend_assets/img/id//logo.png" style="width:100px"/>
		                    </td>
		                </tr>
		                <tr>
		                <br> &nbsp;&nbsp;<td style="color: white; font-size: 12px; font-weight: lighter; float: right; margin:0">
		                        <span style="color: white; font-size: 12px;">CONTACT DETAILS</span><br><br>
		                         <span style="color: white; font-size: 12px;"><a href="tel:919611232569" style="color: white; text-decoration: none;">+91 9611232569</a></span><br>
		                        <span style="color: white; font-size: 12px;"><a href="mailto:infoassisthealth@gmail.com" style="color: white; text-decoration: none;">infoassisthealth@gmail.com</a></span><br>
		                        <span style="color: white; font-size: 12px;"><a href="www.assisthealth.in" style="color: white; text-decoration: none;">www.assisthealth.in</a></span>
		                    </td>
		                </tr>
		            </table>
		        </td>
		    </tr>
		</table>';

		$inputString = $m_name;
         $outputString = str_replace(' ', '_', strtolower($inputString));

		// Write HTML content to the PDF
		$pdf->writeHTML($html, true, false, true, false, '');
         ob_end_clean();
	       ob_clean();
		// Output the PDF to the browser or save it to a file
		$pdf->Output($outputString.'_membership_card.pdf', 'I');
		}

	   // ------------------------------ ID CARD  New---------------------------------------------------- //
public function generate_IdCard1()
{
	$data['m_name'] = base64_decode($this->input->get('m_name'));
		$data['m_id'] = base64_decode($this->input->get('m_id'));

  $this->load->view('Backend/admin/IdCard/memberID',$data);
}
   // ------------------------------ Internal Doctors ---------------------------------------------------- //

   public function Add_InternalDoctor()
   {
	  $this->checkLogin(); // Add this line to check login

     // Retrieve all time slots directly in the controller
	    $query = $this->db->get('time_slots');
	    $timeSlots = $query->result();

	    // Prepare the time slots data to pass to the view
	    $data['timeSlots'] = $timeSlots;
	    $specialities = $this->Doctor_model->getAll_Speciality();
        $data['specialities'] = $specialities;	
		$cities = $this->Doctor_model->getAll_City();
        $data['cities'] = $cities;	
	   $this->load->view('Backend/manager/internal_doctors/add-internal-doctor',$data);
   }
	public function cities()
	{
	    $this->checkLogin(); // Add this line to check login	
		$cities = $this->Doctor_model->getAll_City();
        $data['cities'] = $cities;		
	    $this->load->view('Backend/manager/internal_doctors/cities',$data);
	}
	public function areadetails()
	{
	    $this->checkLogin(); // Add this line to check login	
		$areadetails = $this->Doctor_model->getAll_Areadetails();
		$cities = $this->Doctor_model->getAll_City();
        $data['cities'] = $cities;		
		$data['areadetails'] = $areadetails;		
	    $this->load->view('Backend/manager/internal_doctors/areadetails',$data);
	}
	
	public function Add_Speciality()
	{
	    $this->checkLogin(); // Add this line to check login	
		$specialities = $this->Doctor_model->getAll_Speciality();
        $data['specialities'] = $specialities;		
	    $this->load->view('Backend/manager/internal_doctors/add-speciality',$data);
	}
   public function All_InternalDoctors()
   {
	    $this->checkLogin(); // Add this line to check login
	    $navigators = $this->Doctor_model->getAll_InternalDoctors();
        $data['navigators'] = $navigators;

         // Retrieve all time slots directly in the controller
	    $query = $this->db->get('time_slots');
	    $timeSlots = $query->result();
		$specialities = $this->Doctor_model->getAll_Speciality();
        $data['specialities'] = $specialities;
		$cities = $this->Doctor_model->getAll_City();
        $data['cities'] = $cities;
		
	    // Prepare the time slots data to pass to the view
	    $data['timeSlots'] = $timeSlots;
	 
	   $this->load->view('Backend/manager/internal_doctors/all-internal-doctors',$data);
   }

	 public function Save_internal_doctor()
   {
	   if ($this->session->userdata('user_login_access') != False) {
		   //print_r($_POST);die();
		   $name = $this->input->post('firstname');
		   $gender = $this->input->post('gender');
		   $qualification = $this->input->post('qualification');
		   $speciality = $this->input->post('speciality');
		   $specializedIn = $this->input->post('specializedIn');
		   $experience = $this->input->post('experience');
		   $address = $this->input->post('address');
		   $timing = $this->input->post('timing');
		   $fees = $this->input->post('fees');
		   $number = $this->input->post('number');
		   $hospital = $this->input->post('hospital');

		   $clinic_name = $this->input->post('clinic_name');
		   $clinic_address = $this->input->post('clinic_address');
		   $clinic_timing = $this->input->post('clinic_timing');
		   $clinic_fees = $this->input->post('clinic_fees');


		 // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
		   $this->load->library('form_validation');
		   $this->form_validation->set_error_delimiters();
		   $this->form_validation->set_rules('firstname', 'Name', 'trim|required|max_length[255]|xss_clean');
		  // $this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
		   // Add more validation rules as needed for other fields

		   if ($this->form_validation->run() == FALSE) {
			   echo validation_errors();
			   // Handle validation errors
		   } else {
		   

		  /* if ( $this->Doctor_model->is_number_duplicate_internal_doctors($number)) {
			   
				   echo json_encode(array('status' => 'error', 'message' => 'Number already exists'));
			   
		   } else {*/
			if($_FILES['file_url']['name']){
		   $file_name = $_FILES['file_url']['name'];
		   $fileSize = $_FILES["file_url"]["size"]/1024;
		   $fileType = $_FILES["file_url"]["type"];
		   $new_file_name='';
		   $new_file_name .= $file_name;

		   $config = array(
			   'file_name' => $new_file_name,
			   'upload_path' => "./assets/uploads/internal_doctors",
			   'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
			   'overwrite' => False,
			   'max_size' => "50720000"
		   );
		   //create directory
			 if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
   
		   $this->load->library('Upload', $config);
		   $this->upload->initialize($config);                
		   if (!$this->upload->do_upload('file_url')) {
			   echo $this->upload->display_errors();
			   #redirect("notice/All_notice");
		   }
  
		   else {

			   $path = $this->upload->data();
			   $img_url = $path['file_name'];
			
			   $data = array(
				   'name' => $name,
				   'gender' => $gender,
				   'qualification' => $qualification,
				   'speciality' => $speciality,
				   'specialized_in' => $specializedIn,
				   'experience' => $experience,
				   'address' => $address,
				   'timing' => $timing,
				   'fees' => $fees,
				   'contact_number' => $number,
				   'hospital' => $hospital, 
				   'profile_picture' => $img_url, 
					 
					 //new
				   'clinic_name' => $clinic_name,
				   'clinic_address' => $clinic_address,
				   'clinic_timing' => $clinic_timing,
				   'clinic_fees' => $clinic_fees,
				   'hospital_area' => $this->input->post('hospital_area'),
				   'hospital_city' => $this->input->post('hospital_city'),
				   'clinic_area' => $this->input->post('clinic_area'),
				   'clinic_city' => $this->input->post('clinic_city'),
				   // 'clinic_to_timing' => $this->input->post('clinic_to_timing'),
				   // 'hospital_to_timing' => $this->input->post('hospital_to_timing'),
			   );

			   
		   }
		 }else{

			$data = array(
				   'name' => $name,
				   'gender' => $gender,
				   'qualification' => $qualification,
				   'speciality' => $speciality,
				   'specialized_in' => $specializedIn,
				   'experience' => $experience,
				   'address' => $address,
				   'timing' => $timing,
				   'fees' => $fees,
				   'contact_number' => $number,
				   'hospital' => $hospital,
					//new
				   'clinic_name' => $clinic_name,
				   'clinic_address' => $clinic_address,
				   'clinic_timing' => $clinic_timing,
				   'clinic_fees' => $clinic_fees,
					'hospital_area' => $this->input->post('hospital_area'),
					   'hospital_city' => $this->input->post('hospital_city'),
					   'clinic_area' => $this->input->post('clinic_area'),
					   'clinic_city' => $this->input->post('clinic_city'),
				   //     'clinic_to_timing' => $this->input->post('clinic_to_timing'),
				   // 'hospital_to_timing' => $this->input->post('hospital_to_timing'),
			   );
			  

		 }

		 // print_r($data); die();
			   // Save the data to the manager table using your model function
			   $success = $this->Doctor_model->save_InternalDoctor($data); //Doctor_model

			   if ($success) {
			   
				   //$this->send_mail_manager($name,$email,$number,$password);
				   echo json_encode(array('status' => 'success', 'message' =>'Doctor saved successfully'));
			   } else {
				   echo json_encode(array('status' => 'error', 'message' => 'Failed to save manager'));
			   }
		//}
	   }
	   } else {
		   redirect(base_url(), 'refresh');
	   }
   }
		public function Save_City() {
		if ($this->session->userdata('user_login_access') != False) {
	    	
	        $name = $this->input->post('cityname');
		    $data = array(
				    'cityname' => $name);
	        $this->load->library('form_validation');
	        $this->form_validation->set_error_delimiters();
	        $this->form_validation->set_rules('cityname', 'Name', 'trim|required|max_length[400]|xss_clean');
	        if ($this->form_validation->run() == FALSE) {
	            echo validation_errors();
	        } else {
				$success = $this->Doctor_model->save_City($data); //Doctor_model
				if ($success) {
					echo json_encode(array('status' => 'success', 'message' =>'City saved successfully'));
				} else {
					echo json_encode(array('status' => 'error', 'message' => 'Failed to save city'));
				}
			}
	    } else {
	        redirect(base_url(), 'refresh');
	    }
	}
	public function getCityById() {
	        // Get the ID parameter from the AJAX request
	        $id = $this->input->get('id');
	        $navigator = $this->Doctor_model->get_CityById($id);
        
	        // Prepare the response data as an array 
	       $response = array(
		    'id' => $navigator->id,
		    'name' => $navigator->cityname);
	        
	        // Send the response as JSON
	        echo json_encode($response);
	    }
public function getAll_areasByCityId() {
	$id = $this->input->post('id');
	$navigator = $this->Doctor_model->get_allareasByCityId($id);
	
	// Send the response as JSON
	echo json_encode($navigator);
}
public function update_city(){
	if ($this->session->userdata('user_login_access') != false) {
		$id = $this->input->post('id');
		$name = $this->input->post('cityname');
		$data = array('cityname' => $name);
		$success = $this->Doctor_model->Update_City($data,$id);
		if ($success) {
			$data["id"] = $id;
		    echo json_encode(array('status' => 'success', 'message' => 'City name updated successfully','member'=>$data));
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'Failed to update city name'));
		}
	} else {
		redirect(base_url(), 'refresh');
	}
}
public function Save_Areadetails() {
		if ($this->session->userdata('user_login_access') != False) {
	    	
	        $cityid = $this->input->post('cityid');
			$name = $this->input->post('areaname');
		    $data = array(
				    'cityid' => $cityid,
				    'areaname' => $name);
	        $this->load->library('form_validation');
	        $this->form_validation->set_error_delimiters();
	        $this->form_validation->set_rules('areaname', 'Name', 'trim|required|max_length[400]|xss_clean');
	        if ($this->form_validation->run() == FALSE) {
	            echo validation_errors();
	        } else {
				$success = $this->Doctor_model->save_Areadetails($data); //Doctor_model
				if ($success) {
					echo json_encode(array('status' => 'success', 'message' =>'Area saved successfully'));
				} else {
					echo json_encode(array('status' => 'error', 'message' => 'Failed to save Area'));
				}
			}
	    } else {
	        redirect(base_url(), 'refresh');
	    }
	}
	public function getAreadetailsById() {
	        // Get the ID parameter from the AJAX request
	        $id = $this->input->get('id');
	        $navigator = $this->Doctor_model->get_AreadetailsById($id);
        
	        // Prepare the response data as an array
	       $response = array(
		    'id' => $navigator->id,
		    'cityid' => $navigator->cityid,
		    'areaname' => $navigator->areaname);
	        
	        // Send the response as JSON
	        echo json_encode($response);
	    }
public function update_areadetails(){
	if ($this->session->userdata('user_login_access') != false) {
		$id = $this->input->post('id');
		$name = $this->input->post('areaname');
		$cityid = $this->input->post('cityid');
		$data = array('cityid' => $cityid, 'areaname' => $name);
		$success = $this->Doctor_model->Update_Areadetails($data,$id);
		if ($success) {
			$data["id"] = $id;
		    echo json_encode(array('status' => 'success', 'message' => 'Area updated successfully','member'=>$data));
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'Failed to update city name'));
		}
	} else {
		redirect(base_url(), 'refresh');
	}
}
public function delete_city() {
	 $id  =$this->input->post('id');
	 //update from internal_doctors, clinicarea, hospitalarea 'hospital_city' => '', 'hospital_area'=>''
	/*$data = array('clinic_city' => '', 'clinic_area'=>'');
	$this->db->where('clinic_city', $id);
	$this->db->update('internal_doctors', $data);
	
	$data2 = array('hospital_city' => '', 'hospital_area'=>'');
	$this->db->where('hospital_city', $id);
	$this->db->update('internal_doctors', $data2);
	
	$data3 = array('cityid'=>'');
	$this->db->where('cityid', $id);
	$this->db->update('clinicarea', $data3);
	
	$this->db->where('cityid', $id);
	$this->db->update('hospitalarea', $data3);*/
	
	 // Delete a rec from the "city" table
	 $this->db->where('id', $id);
	 $success =   $this->db->delete('cities');
	
	if ($success) {
		echo json_encode(array('status' => 'success', 'message' =>'Deleted successfully'));
	} else {
		echo json_encode(array('status' => 'error', 'message' => 'Failed to delete data'));
	}
}


public function delete_areadetails() {
	 $id  =$this->input->post('id');
	 //update from internal_doctors, clinicarea 'hospital_city' => '', 'hospital_area'=>''
	$data = array('clinic_area'=>'');
	$this->db->where('clinic_area', $id);
	$this->db->update('internal_doctors', $data);
	$data = array('hospital_area'=>'');
	$this->db->where('hospital_area', $id);
	$this->db->update('internal_doctors', $data);
	// Delete a rec from the "areadetails" table
	 $this->db->where('id', $id);
	 $success =   $this->db->delete('areadetails');
	
	if ($success) {
		echo json_encode(array('status' => 'success', 'message' =>'Deleted successfully'));
	} else {
		echo json_encode(array('status' => 'error', 'message' => 'Failed to delete data'));
	}
}	
	public function Save_speciality() {
		if ($this->session->userdata('user_login_access') != False) {
	    	
	        $name = $this->input->post('specialityname');
		    $data = array(
				    'name' => $name);
	        $this->load->library('form_validation');
	        $this->form_validation->set_error_delimiters();
	        $this->form_validation->set_rules('specialityname', 'Name', 'trim|required|max_length[255]|xss_clean');
	        if ($this->form_validation->run() == FALSE) {
	            echo validation_errors();
	        } else {
				$success = $this->Doctor_model->save_Speciality($data); //Doctor_model
				if ($success) {
					echo json_encode(array('status' => 'success', 'message' =>'Speciality saved successfully'));
				} else {
					echo json_encode(array('status' => 'error', 'message' => 'Failed to save speciality'));
				}
			}
	    } else {
	        redirect(base_url(), 'refresh');
	    }
	}
	 public function delete_speciality() {
		 $id  =$this->input->post('id');
		 //update from internal_doctors
		$data = array('speciality' => '');
		$this->db->where('speciality', $id);
		$this->db->update('internal_doctors', $data);
		
		 // Delete a time slot from the "speciality" table
		 $this->db->where('id', $id);
		 $success =   $this->db->delete('speciality');
		
		if ($success) {
			echo json_encode(array('status' => 'success', 'message' =>'Deleted successfully'));
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'Failed to delete data'));
		}
	}
	
public function getSpecialityById() {
	        // Get the ID parameter from the AJAX request
	        $id = $this->input->get('id');
	        $navigator = $this->Doctor_model->get_SpecialityById($id);
        
	        // Prepare the response data as an array
	       $response = array(
		    'id' => $navigator->id,
		    'name' => $navigator->name);
	        
	        // Send the response as JSON
	        echo json_encode($response);
	    }
public function update_speciality(){
	if ($this->session->userdata('user_login_access') != false) {
		$id = $this->input->post('id');
		$name = $this->input->post('specialityname');
		$data = array('name' => $name);
		$success = $this->Doctor_model->Update_Speciality($data,$id);
		if ($success) {
			$data["id"] = $id;
		    echo json_encode(array('status' => 'success', 'message' => 'Speciality name updated successfully','member'=>$data));
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'Failed to update speciality name'));
		}
	} else {
		redirect(base_url(), 'refresh');
	}
}

		public function Update_internal_doctor()
	   {
		   if ($this->session->userdata('user_login_access') != False) {
			   $id = $this->input->post('id');
				$name = $this->input->post('firstname');
			   $gender = $this->input->post('gender');
			   $qualification = $this->input->post('qualification');
			   $speciality = $this->input->post('speciality');
			   $specializedIn = $this->input->post('specializedIn');
			   $experience = $this->input->post('experience');
			   $address = $this->input->post('address');
			   $timing = $this->input->post('timing');
			   $fees = $this->input->post('fees');
			   $number = $this->input->post('number');
			   $hospital = $this->input->post('hospital');


			   $clinic_name = $this->input->post('clinic_name');
			   $clinic_address = $this->input->post('clinic_address');
			   $clinic_timing = $this->input->post('clinic_timing');
			   $clinic_fees = $this->input->post('clinic_fees');


			   $this->load->library('form_validation');
			   $this->form_validation->set_error_delimiters();
			   $this->form_validation->set_rules('firstname', 'Name', 'trim|required|max_length[255]|xss_clean');
			   //$this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
			   // Add more validation rules as needed for other fields

			   if ($this->form_validation->run() == FALSE) {
				   echo validation_errors();
				   // Handle validation errors
			   } else {
			   
			   //print_r($_FILES['file_url']['name']);die();

				if($_FILES['file_url']['name']){
			   $file_name = $_FILES['file_url']['name'];
			   $fileSize = $_FILES["file_url"]["size"]/1024;
			   $fileType = $_FILES["file_url"]["type"];
			   $new_file_name='';
			   $new_file_name .= $file_name;

			   $config = array(
				   'file_name' => $new_file_name,
				   'upload_path' => "./assets/uploads/internal_doctors",
				   'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
				   'overwrite' => False,
				   'max_size' => "50720000"
			   );
			   //create directory
				 if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	   
			   $this->load->library('Upload', $config);
			   $this->upload->initialize($config);                
			   if (!$this->upload->do_upload('file_url')) {
				   echo $this->upload->display_errors();
				   #redirect("notice/All_notice");
			   }
	  
			   else {

				   $path = $this->upload->data();
				   $img_url = $path['file_name'];
				  
			   $data = array(
				   'name' => $name,
				   'gender' => $gender,
				   'qualification' => $qualification,
				   'speciality' => $speciality,
				   'specialized_in' => $specializedIn,
				   'experience' => $experience,
				   'address' => $address,
				   'timing' => $timing,
				   'fees' => $fees,
				   'contact_number' => $number,
				   'hospital' => $hospital,
				   'profile_picture' => $img_url,  //new
				   'clinic_name' => $clinic_name,
				   'clinic_address' => $clinic_address,
				   'clinic_timing' => $clinic_timing,
				   'clinic_fees' => $clinic_fees,
					'hospital_area' => $this->input->post('hospital_area'),
					   'hospital_city' => $this->input->post('hospital_city'),
					   'clinic_area' => $this->input->post('clinic_area'),
					   'clinic_city' => $this->input->post('clinic_city'),
					   'clinic_to_timing' => $this->input->post('clinic_to_timing'),
				   'hospital_to_timing' => $this->input->post('hospital_to_timing'),
			   );


				   
			   }
			 }else{

				 
			   $data = array(
				   'name' => $name,
				   'gender' => $gender,
				   'qualification' => $qualification,
				   'speciality' => $speciality,
				   'specialized_in' => $specializedIn,
				   'experience' => $experience,
				   'address' => $address,
				   'timing' => $timing,
				   'fees' => $fees,
				   'contact_number' => $number,
				   'hospital' => $hospital,
					//new
				   'clinic_name' => $clinic_name,
				   'clinic_address' => $clinic_address,
				   'clinic_timing' => $clinic_timing,
				   'clinic_fees' => $clinic_fees,
					'hospital_area' => $this->input->post('hospital_area'),
				   'hospital_city' => $this->input->post('hospital_city'),
				   'clinic_area' => $this->input->post('clinic_area'),
				   'clinic_city' => $this->input->post('clinic_city'),
				   'clinic_to_timing' => $this->input->post('clinic_to_timing'),
				   'hospital_to_timing' => $this->input->post('hospital_to_timing'),
				  
			   );


			 }

			 // Save the data to the manager table using your model function
				   $success = $this->Doctor_model->Update_InternalDoctor($data,$id);

				   if ($success) {
					   
						 $data["id"] = $id;
					   echo json_encode(array('status' => 'success', 'message' => 'Doctor updated successfully','member'=>$data));
				   } else {
					   echo json_encode(array('status' => 'error', 'message' => 'Failed to update manager'));
				   }


		   // }
		   }
		   } else {
			   redirect(base_url(), 'refresh');
		   }
	   }
	 //update modal get data
	  public function getInternal_DoctorByID() {
		   // Get the ID parameter from the AJAX request
		   $id = $this->input->get('id');
		   $navigator = $this->Doctor_model->get_InternalDoctorByID($id);

		   // Time slot
		   $time_slot1 = '';
		   $time_slot2 = '';

		   //timing
		   if($navigator->timing){
		   $this->db->where('id', $navigator->timing);
		   $query = $this->db->get('time_slots');
		   $timing_timeSlot = $query->row(); 
		   if($timing_timeSlot){

				$Start_timestamp = strtotime($timing_timeSlot->start_time);
			$Start_formattedTime = date('g:i A', $Start_timestamp); 

			$end_timestamp = strtotime( $timing_timeSlot->end_time);
			$end_formattedTime = date('g:i A', $end_timestamp); 

		   $time_slot1 = $Start_formattedTime.' - '.$end_formattedTime;

		   }
		   
				
			}
		   //clinic_timing
		 if($navigator->clinic_timing){
			$this->db->where('id', $navigator->clinic_timing);
		   $query = $this->db->get('time_slots');
		   $clinic_timing_timeSlot = $query->row();
			if($clinic_timing_timeSlot){
			$clinic_Start_timestamp = strtotime( $clinic_timing_timeSlot->start_time);
			$clinic_Start_formattedTime = date('g:i A', $clinic_Start_timestamp); 

			$clinic_end_timestamp = strtotime( $clinic_timing_timeSlot->end_time);
			$clinic_end_formattedTime = date('g:i A', $clinic_end_timestamp); 

		   $time_slot2 = $clinic_Start_formattedTime.' - '.$clinic_end_formattedTime;
		  }
		  }
			if($navigator->hospital_city){
				$hospital_city = $this->Doctor_model->get_CityById($navigator->hospital_city);
				$navigator->hospital_cityname = $hospital_city->cityname;
			}
	        if($navigator->clinic_city){
				$clinic_city = $this->Doctor_model->get_CityById($navigator->clinic_city);
				$navigator->clinic_cityname = $clinic_city->cityname;
			}
			if($navigator->hospital_area){
				$areaname = $this->Doctor_model->get_AreadetailsById($navigator->hospital_area);
				$navigator->hospital_areaname = $areaname->areaname;
			}
	        if($navigator->clinic_area){
				$clinic_area = $this->Doctor_model->get_AreadetailsById($navigator->clinic_area);
				$navigator->clinic_areaname = $clinic_area->areaname;
			}
			
			if(is_numeric($navigator->speciality)){
				$speciality = $this->Doctor_model->get_SpecialityById($navigator->speciality);
				$navigator->specialityname = $speciality->name;
			} else {
				$navigator->specialityname =$navigator->speciality;
			}
	        
	        
		   
		  
	        // Prepare the response data as an array
	       $response = array(
		    'id' => $navigator->id,
		    'name' => $navigator->name,
		    'gender' => $navigator->gender,
		    'qualification' => $navigator->qualification,
		    'speciality' => $navigator->speciality,
			'specialityname' => $navigator->specialityname,
		    'specialized_in' => $navigator->specialized_in,
		    'experience' => $navigator->experience,
		    'address' => $navigator->address,
		    'timing' => $navigator->timing, // timing 1
		    'time_slot1' => $time_slot1,//$navigator->timing, // timing 1
		    'fees' => $navigator->fees,
		    'contact_number' => $navigator->contact_number,
		    'profile_picture' => $navigator->profile_picture,
		    'hospital' => $navigator->hospital,
		    //'createdOn' => $navigator->createdOn,
		   // 'isActive' => $navigator->isActive,

		     'clinic_name' => $navigator->clinic_name,
		    'clinic_address' => $navigator->clinic_address,
		    'clinic_timing' => $navigator->clinic_timing, // timing 2
		    'time_slot2' => $time_slot2,//$navigator->clinic_timing, // timing 2
		    'clinic_fees' => $navigator->clinic_fees,
		     'hospital_area' => $navigator->hospital_area,
		    'hospital_city' => $navigator->hospital_city,
		    'clinic_area' =>$navigator->clinic_area,
		    'clinic_city' => $navigator->clinic_city,
			'hospital_areaname' => $navigator->hospital_areaname,
		    'hospital_cityname' => $navigator->hospital_cityname,
		    'clinic_areaname' =>$navigator->clinic_areaname,
		    'clinic_cityname' => $navigator->clinic_cityname,
		    // 'hospital_to_timing' => $navigator->hospital_to_timing,
		    // 'clinic_to_timing' => $navigator->clinic_to_timing,
		);
		   
		   // Send the response as JSON
		   echo json_encode($response);
	   }

	   //Doctor delete
		public function delete_internal_doctor(){
		   if($this->session->userdata('user_login_access') != False) { 
			   $id = $this->input->post('id');
			   $result_del = $this->Doctor_model->delete_InternalDoctor($id);//
			 if($result_del){
				   echo json_encode(array('status'=>'success','message'=> 'Deleted Successfully'));
				  
			   }else{
					echo json_encode(array('status'=>'failed','message'=> 'Not deleted'));
				
			   }
			  
			   }
		   else{
			   redirect(base_url() , 'refresh');
		   }       
		}

		//17/12/23
		// New
	   function fetch_data()
	   {
		   //sleep(2);
		   
		   // $name = $this->input->post('name');
		   // $speciality = $this->input->post('speciality');
		   // $timings = $this->input->post('timings');
		   // $fees = $this->input->post('fees');


		   $filters = $this->input->post('filters');



		   $this->load->library("pagination");
		   $config = array();
		   $config["base_url"] = base_url();// "#";
		   //$config["total_rows"] = $this->Property_model->count_all($minimum_price, $maximum_price, $brand, $ram, $storage);
		   //$config["total_rows"] = $this->Doctor_model->count_all($name, $speciality,$timings,$fees);
		   $config["total_rows"] = $this->Doctor_model->count_all($filters);
		   $config["per_page"] = 12;
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
		   
			   //'product_list'			=>	$this->Doctor_model->fetch_data($config["per_page"], $start,$name, $speciality,$timings,$fees)
			   'product_list'			=>	$this->Doctor_model->fetch_data($config["per_page"], $start,$filters)
		   );
		   echo json_encode($output);
	   }



			// ------------------------------ Internal Doctors  END ---------------------------------------------------- //
			// ------------------------------ Time slots  END ---------------------------------------------------- //
		// Time_slots 22/1/24
		   public function Time_slots()
		   {
			   $this->checkLogin(); // Add this line to check login

				 // Retrieve all time slots directly in the controller
			   $query = $this->db->get('time_slots');
			   $timeSlots = $query->result();

			   // Prepare the time slots data to pass to the view
			   $data['timeSlots'] = $timeSlots;
						   
			   $this->load->view('Backend/manager/internal_doctors/time-slots',$data);
		   }
		   
		   // public function add_time_slot() {
		   //     // Handle form submission to add a new time slot
		   //     $data = array(
		   //         'slot' => $this->input->post('slot'),
		   //         'start_time' => $this->input->post('start_time'),
		   //         'end_time' => $this->input->post('end_time')
		   //     );

		   //     // Insert data into the "time_slots" table
		   //    $success =  $this->db->insert('time_slots', $data);

		   //   if ($success) {
				   
		   //         echo json_encode(array('status' => 'success', 'message' =>'Data saved successfully'));
		   //     } else {
		   //         echo json_encode(array('status' => 'error', 'message' => 'Failed to save data'));
		   //     }
		   // }
			 
		   public function add_time_slot() {
			   // Handle form submission to add a new time slot
			   $slot = strtolower($this->input->post('slot'));
			   $start_time = $this->input->post('start_time');
			   $end_time = $this->input->post('end_time');

			   // Check if a time slot with the same slot already exists with isActive set to 1
			   $this->db->where('LOWER(slot)', $slot);
			   $this->db->where('isActive', 1);
			   $existingSlot = $this->db->get('time_slots')->row();

			   if ($existingSlot) {
				   // Slot already exists, return an error
				   echo json_encode(array('status' => 'error', 'message' => 'Slot already exists '));
				   return;
			   }

			   // Check if a time slot with the same start_time and end_time already exists with isActive set to 1
			   $this->db->where('start_time', $start_time);
			   $this->db->where('end_time', $end_time);
			   $this->db->where('isActive', 1);
			   $existingTimeSlot = $this->db->get('time_slots')->row();

			   if ($existingTimeSlot) {
				   // Time slot with the same start_time and end_time already exists, return an error
				   echo json_encode(array('status' => 'error', 'message' => 'Time slot  already exists '));
				   return;
			   }

			   // Slot is available, proceed to insert
			   $data = array(
				   'slot' => $slot,
				   'start_time' => $start_time,
				   'end_time' => $end_time
			   );

			   // Insert data into the "time_slots" table
			   $success = $this->db->insert('time_slots', $data);

			   if ($success) {
				   echo json_encode(array('status' => 'success', 'message' => 'Data saved successfully'));
			   } else {
				   echo json_encode(array('status' => 'error', 'message' => 'Failed to save data'));
			   }
		   }


			   public function update_time_slot() {
			   // Handle form submission to update an existing time slot
			   $id  =$this->input->post('id');
			   $data = array(
				   'slot' => $this->input->post('slot'),
				   'start_time' => $this->input->post('start_time'),
				   'end_time' => $this->input->post('end_time')
			   );

			   // Update data in the "time_slots" table
			   $this->db->where('id', $id);
			   $success =   $this->db->update('time_slots', $data);

			   if ($success) {
				   
				   echo json_encode(array('status' => 'success', 'message' =>'Data updated successfully'));
			   } else {
				   echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
			   }
		   }

		   public function delete_time_slot() {
				 $id  =$this->input->post('id');
			   // Delete a time slot from the "time_slots" table
			   $this->db->where('id', $id);
			   $success =   $this->db->delete('time_slots');

			   if ($success) {
				   
				   echo json_encode(array('status' => 'success', 'message' =>'Deleted successfully'));
			   } else {
				   echo json_encode(array('status' => 'error', 'message' => 'Failed to delete data'));
			   }

			 
		   }
		   public function getTimeSlotByID() {
			   // Get the ID parameter from the AJAX request
			   $id = $this->input->get('id');

			   // Retrieve time slot details directly in the controller
			   $this->db->where('id', $id);
			   $query = $this->db->get('time_slots');
			   $timeSlot = $query->row();

			   // Prepare the response data as an array
			   $response = array(
				   'id' => $timeSlot->id,
				   'slot' => $timeSlot->slot,
				   'start_time' => $timeSlot->start_time,
				   'end_time' => $timeSlot->end_time,
			   );

			   // Send the response as JSON
			   echo json_encode($response);
		   }

			// ------------------------------ Time slots  END ---------------------------------------------------- //
			
//   4/6/2024
// Medical history Document
// Medical history Document
public function add_medical_history_document()
{
	//$this->checkLogin();
	if ($this->session->userdata('user_login_access') != False) {
	
			$id = $this->input->post('id');
			
			 if($_FILES['file_url']['name']){
			$file_name = $_FILES['file_url']['name'];
			$fileSize = $_FILES["file_url"]["size"]/1024;
			$fileType = $_FILES["file_url"]["type"];
			$new_file_name='';
			$new_file_name .= $file_name;

			$config = array(
				'file_name' => $new_file_name,
				'upload_path' => "./assets/uploads/medical_history",
				'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
				'overwrite' => False,
				'max_size' => "50720000"
			);
			//create directory
			  if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	
			$this->load->library('Upload', $config);
			$this->upload->initialize($config);                
			if (!$this->upload->do_upload('file_url')) {
				echo $this->upload->display_errors();
				#redirect("notice/All_notice");
			}

   
			else {

			// 	print_r($_FILES['file_url']['name']);
			// die();

				$path = $this->upload->data();
				$img_url = $path['file_name'];
				$data = array(
				
				'document' => $img_url,
			
			   
			);
			
		 
				   
		//  print_r($data);die();

		  // Save the data to the manager table using your model function
		//  $success = $this->Manager_model->add_medical_history_document($data,$id);// print_r($success);die();
		  $success = $this->Manager_model->UpdateMember($data,$id);

		  if ($success) {
		  
			  echo json_encode(array('status' => 'success', 'message' => 'Data Added successfully'));
		  } else {
			  
			  echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
		  }

			}
		  }
		
		}
	   // }
		 
}  
// ------------------------------ Blog   ---------------------------------------------------- //

public function ViewBlog()
{
	$this->checkLogin(); // Add this line to check login

	  // Retrieve all time slots directly in the controller
	$query = $this->db->get('blog');
	$timeSlots = $query->result();

	// Prepare the time slots data to pass to the view
	$data['timeSlots'] = $timeSlots;
				
	$this->load->view('Backend/manager/blog',$data);
}


  
public function add_Blog() {
   if ($_FILES['thumnail']['name']) {
	   $thumnail_file_name = $_FILES['thumnail']['name'];
	   // Handle file upload and validation here similar to your previous code
	   $file_name = $_FILES['thumnail']['name'];
	   $fileSize = $_FILES["thumnail"]["size"]/1024;
	   $fileType = $_FILES["thumnail"]["type"];
	   $new_file_name='';
	   $new_file_name .= $file_name;

	   $config = array(
		   'file_name' => $new_file_name,
		   'upload_path' => "./assets/uploads/blog/",
		   'allowed_types' => "gif|jpg|png|jpeg|ico",
		   'overwrite' => TRUE,
		   'max_size' => "50720000"
	   );
	   //create directory
		 if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);

	   $this->load->library('Upload', $config);
	   $this->upload->initialize($config);                
	   if (!$this->upload->do_upload('thumnail')) {
		   echo $this->upload->display_errors();
		   #redirect("notice/All_notice");
	   }else {

	   $file_data = $this->upload->data();
	   //$img_url = $file_data['file_name'];     
	   // If the upload is successful, get the file name
	   $thumnail_img_url = $file_data['file_name'];
	 }
   } else {
	
	   // echo json_encode(array('status' => 'error', 'message' => 'Thumbnail image is required.'));

	   $thumnail_img_url = '';
   }
   $contentArray = json_decode($this->input->post('content'), true); // Decode JSON string to array
   $content = implode("", $contentArray); // Combine array elements into a single string
   $data = array(
	   'title' => $this->input->post('title'),
	  // 'content' => $this->input->post('content'),
	  'content' => $content,
	   
	 
   );

   if ($thumnail_img_url) {
	   $data["thumnail"] = $thumnail_img_url;
}
$id = $this->input->post('id');
if($id){
   $this->db->where('id', $id);
   $result =   $this->db->update('blog', $data);
}else{
   //$result = $this->Product_model->insert_product($data);
   $result = $this->db->insert('blog', $data);
}
//    print_r($_POST);

//    if ($result) {
// 	   // Success: Product inserted
// 	   echo json_encode(array('status' => 'success', 'message' => ' Added successfully'));
//    } else {
// 	   // Error: Product not inserted
// 	   echo json_encode(array('status' => 'error', 'message' => ' Not Added'));
//    }
}


	public function update_Blog() {
	   $id = $this->input->post('id');
	   if ($_FILES['thumnail']['name']) {
		   $thumnail_file_name = $_FILES['thumnail']['name'];
		   // Handle file upload and validation here similar to your previous code
		   $file_name = $_FILES['thumnail']['name'];
		   $fileSize = $_FILES["thumnail"]["size"]/1024;
		   $fileType = $_FILES["thumnail"]["type"];
		   $new_file_name='';
		   $new_file_name .= $file_name;

		   $config = array(
			   'file_name' => $new_file_name,
			   'upload_path' => "./assets/uploads/blog/",
			   'allowed_types' => "gif|jpg|png|jpeg|ico",
			   'overwrite' => TRUE,
			   'max_size' => "50720000"
		   );
		   //create directory
			 if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
   
		   $this->load->library('Upload', $config);
		   $this->upload->initialize($config);                
		   if (!$this->upload->do_upload('thumnail')) {
			   echo $this->upload->display_errors();
			   #redirect("notice/All_notice");
		   }else {

		   $file_data = $this->upload->data();
	   
		   $thumnail_img_url = $file_data['file_name'];
		 }
	   } else {
   
		   $thumnail_img_url = '';
	   }

	   $data = array(
		   'title' => $this->input->post('title'),
		   'content' => $this->input->post('content'),
		 
	   );

	   if ($thumnail_img_url) {
		   $data["thumnail"] = $thumnail_img_url;
 }
 $this->db->where('id', $id);
 $result =   $this->db->update('blog', $data);

	   if ($result) {
		   
		   echo json_encode(array('status' => 'success', 'message' => 'Updated successfully'));
	   } else {
		   
		   echo json_encode(array('status' => 'error', 'message' => ' Not Updated'));
	   }
}

public function delete_Blog() {
	  $id  =$this->input->post('id');

	$this->db->where('id', $id);
	$success =   $this->db->delete('blog');

	if ($success) {
		
		echo json_encode(array('status' => 'success', 'message' =>'Deleted successfully'));
	} else {
		echo json_encode(array('status' => 'error', 'message' => 'Failed to delete data'));
	}

  
}
public function getBlog_codeByID() {
	// Get the ID parameter from the AJAX request
	$id = $this->input->get('id');

	// Retrieve time slot details directly in the controller
	$this->db->where('id', $id);
	$query = $this->db->get('blog');
	$timeSlot = $query->row();

	// Prepare the response data as an array
	$response = array(
		'id' => $timeSlot->id,
		'title' => $timeSlot->title,
		'content' => $timeSlot->content,
		
	);

	// Send the response as JSON
	echo json_encode($response);
}
  

 // ------------------------------ blog   END ---------------------------------------------------- //
 // ------------------------------New 3-8-2024 - Sub Profile Upgrade--------------------------------------------------- //
 public function SubProfileupgrade(){
   $this->checkLogin();
   $data['members'] = $this->Manager_model->getAllMemberslist();
   $data['allmembers'] = $this->Manager_model->getAllMembers();
   $this->load->view('Backend/manager/subprofile-upgrade',$data);
 }
 public function getprofilereport()
 {

   $this->checkLogin();
	   $id = $this->input->get('parent_member');
	   $members = $this->Manager_model->getSubprofile($id);


   

	   $i = 1;
	   if($members){
		   foreach($members as $value){
			   if($value->isSubprofile){
				   $p_id = $value->parent_member;
				   $parent_member = $this->Manager_model->getMemberByID($p_id); 
					$email = $parent_member->email;
					$number = $parent_member->number;
				
					}else{
					   $email = $value->email;
					   $number = $value->number;
					}
	 //echo json_encode(array('monthcount'=>count($holidayreport),'month'=>$month,'holdayname'=>$value->holiday_name,));
	  echo "<tr>
				 <td>$i</td>
				 <td>$value->member_id</td>
				 <td>$value->name</td>
				 <td>$email</td>
				 <td>$number</td>
				 <td> <a href='#' class='tblEditBtn' data-bs-toggle='modal'
																   data-bs-target='#staticBackdrop' data-id=' $value->id'>
																   <i class='fa fa-pencil'></i>
															   </a></td>
			   
				
			 </tr>";
			 $i++;
	  }
	   }else{
	   echo "<tr>
				 <td colspan='6' style='text-align:center'>No Data Found</td>
			  
				
			 </tr>";
	   }

	
 }
 public function upgrade_subprofile()
 {
	 //$this->checkLogin();
	 if ($this->session->userdata('user_login_access') != False) {
		  //die();
			 $id = $this->input->post('id');
			 $name = $this->input->post('name');
			 $email = $this->input->post('email');
		   
			 $number = $this->input->post('number');
			
			 $password = $this->input->post('password');
			 $hashed_password = password_hash($password, PASSWORD_DEFAULT);
   
			 $subprofile = $this->input->post('subprofile');
			 $isSubprofile = $this->input->post('isSubprofile');

			 $this->load->library('form_validation');
			 $this->form_validation->set_error_delimiters();
			 $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');
			 if(!$subprofile){
				 $this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
			 }
			
			 // Add more validation rules as needed for other fields

			 if ($this->form_validation->run() == FALSE) {
				 echo validation_errors();
				 // Handle validation errors
			 } else {


			 
			  // Check for duplicate email and number
			 if ($this->User_model->is_email_duplicate_except($email, $id) && $this->User_model->is_number_duplicate_except($number, $id)) {
				 $response = array(
					 'status' => 'error',
					 'message' => 'Email address and number already exist'
				 );
				 echo json_encode($response);
				 return;
			 } elseif ($this->User_model->is_email_duplicate_except($email, $id)) {
				 $response = array(
					 'status' => 'error',
					 'message' => 'Email address already exists'
				 );
				 echo json_encode($response);
				 return;
			 } elseif ($this->User_model->is_number_duplicate_except($number, $id)) {
				 $response = array(
					 'status' => 'error',
					 'message' => 'Number already exists'
				 );
				 echo json_encode($response);
				 return;
			 }

			 

			  if($_FILES['file_url']['name']){
			 $file_name = $_FILES['file_url']['name'];
			 $fileSize = $_FILES["file_url"]["size"]/1024;
			 $fileType = $_FILES["file_url"]["type"];
			 $new_file_name='';
			 $new_file_name .= $file_name;

			 $config = array(
				 'file_name' => $new_file_name,
				 'upload_path' => "./assets/uploads/users_profile",
				 'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
				 'overwrite' => False,
				 'max_size' => "50720000"
			 );
			 //create directory
			   if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	 
			 $this->load->library('Upload', $config);
			 $this->upload->initialize($config);                
			 if (!$this->upload->do_upload('file_url')) {
				 echo $this->upload->display_errors();
				 #redirect("notice/All_notice");
			 }

	
			 else {

				 $path = $this->upload->data();
				 $img_url = $path['file_name'];
				 $data = array(
				 'name' => $name,
				 'email' => $email,
			   
				 'number' => $number,
				'isSubprofile' => '',
							  //'isSubprofile' => $isSubprofile,
				 'parent_member' => '',
		   
				 'profile' => $img_url,
				 'member_status'=>'0'
				
			 );
			if ($password) {
				 $data["password"] = $hashed_password;
			 }
				 
			 }
		   }else{

			   $data = array(
					 'name' => $name,
					 'email' => $email,
					'parent_member' => '',
					 'number' => $number,
					'isSubprofile' => '',
							  //'isSubprofile' => $isSubprofile,
				   
				   'member_status'=>'0'
					 
				 );
			   if ($password) {
					 $data["password"] = $hashed_password;
				 }
		   }
			
		 //  print_r($data);die();

		   // Save the data to the manager table using your model function
				 $success = $this->Manager_model->UpdateMember($data,$id);// print_r($success);die();

				 if ($success) {
					 $data["id"] = $id;
				   //   if($subprofile){
				   // 	  //$p_id = $member->parent_member;
				   // 	  $parent_member = $this->Manager_model->getMemberByID($id); 
				   // 	  $p_member = $this->Manager_model->getMemberByID($parent_member->parent_member); 
				   // 	  $pemail = $p_member->email;
				   // 	  $pnumber = $p_member->number;
				   // 	  $data = array(
				   // 	  'name' => $name,
				   // 	  'email' => $pemail,
				   // 	  'gender' => $gender,
				   // 	  'number' => $pnumber,
				   
				   // 	'member_status'=>'0'
						 
				   //   );
				   //   }
					 echo json_encode(array('status' => 'success', 'message' => 'Data updated successfully','member'=>$data));
				 } else {
					 
					 echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
				 }

		 }
		// }
		 } else {
			 redirect(base_url(), 'refresh');
		 }
 }  
 // ------------------------------New 3-8-2024  Sub Profile Upgrade---------------------------------------------------- //
 
 public function delete_docu() {
	$id  =$this->input->post('id');

	$data = array(
		'document' =>''
	
	   
	);

	// Update data in the "time_slots" table
	$this->db->where('id', $id);
	$success =   $this->db->update('members', $data);
  if ($success) {
	  
	  echo json_encode(array('status' => 'success', 'message' =>'Deleted successfully'));
  } else {
	  echo json_encode(array('status' => 'error', 'message' => 'Failed to delete data'));
  }
}
	  //New Bulk Medical history Document--------------Oct - 6------------------------------------------
	  public function add_bulk_medical_documents()
	  {
		  if ($this->session->userdata('user_login_access') != false) {
			  $member_id = $this->input->post('member_id');
			  //print_r($_FILES['property_img']['name'] );die();
			  // Initialize an empty array to store the file paths
			  $file_paths = array();
	  
			  // Process multiple images
			  foreach ($_FILES['property_img']['name'] as $index => $image_name) {
				  // Handle file uploads for each image
				  if ($_FILES['property_img']['error'][$index] == UPLOAD_ERR_OK) {
					//"./assets/uploads/medical_history",
					  $upload_path = './assets/uploads/medical_history';
					  $file_path = './assets/uploads/medical_history';
					  $tmp_name = $_FILES['property_img']['tmp_name'][$index];
					  $destination = './assets/uploads/medical_history/' . $image_name;
	  
					  // Move the uploaded image to the destination
					  move_uploaded_file($tmp_name, $destination);
	  
					  // Add the file path to the array
					  $file_paths[] =  $image_name;
					//  $file_paths[] = $file_path . $image_name;
				  }
			  }
	  
			  // Insert data into the appropriate table
			  foreach ($file_paths as $file_path) {
				  $insert_data = array(
					  'member_id' => $member_id,
					  'file' => $file_path
				  );
				  
				  $result = $this->db->insert('medical_documents', $insert_data);
			  }
	  
			  // Check the result and respond accordingly
			  if ($result) {
				  echo json_encode(array('status' => 'success', 'message' => "Document Added Successfully"));
			  } else {
				  echo json_encode(array('status' => 'error', 'message' => "Failed to add images"));
			  }
		  } else {
			  redirect(base_url(), 'refresh');
		  }
		 }
		  public function Get_medical_Documents(){
			  if($this->session->userdata('user_login_access') != False) {
			  $id = $this->input->get('id');
			
			 // $getdata = $this->Common_model->Get_medical_Documents($id);
			  $getdata = $result = $this->db->get_where('medical_documents', ['member_id' => $id])->result();

			  if($getdata){
			  $i = 1;
			  foreach($getdata as $value){
			  echo' <tr>
				  <td style="text-align:center" scope="row">'.$i.'</td>
				  <td style="text-align:center">'.$value->file.'</a>
				</td>
				  <td style="text-align:center"><a title="'.$value->file.'" target="_blank" href="'.base_url().'assets/uploads/medical_history/'.$value->file.'" data-id="'.$value->id.'">   <i class="fa fa-file"></i></a>
				</td>
			 
				  <td style="text-align:center"><a title="Delete" class=" deleteImage text-danger" data-id="'.$value->id.'">   <i class=" fa fa-trash-o"></i></a></td>
			  </tr>';
	  
			  $i++; }
			  }
			  }
			 } 
		 public function deleteImage() {
			  $id = $this->input->post('id');
			  // Call the model method to delete the product by ID
			  $result = $this->db->delete('medical_documents', ['id' => $id]);

	  
			  if ($result) {
			  
				  echo json_encode(array('status' => 'success','message' => 'Document deleted successfully'));
			  } else {
			   
				  echo json_encode(array('status' => 'error', 'message' => 'Image deletion failed'));
			  }
		  }
	  //New Bulk Medical history Document
}

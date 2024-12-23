<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    //login
    public function getUserByUsername($username) {
        $this->db->group_start();
         $this->db->where(array('email'=> $username,'isActive'=> 1));
        //$this->db->where('email', $username);
        $this->db->or_where('number', $username);
        $this->db->group_end();
        return $this->db->get('members')->row();
    }
      // public function getUserByUsername($username) {
      //       // Query the user table to retrieve user details by username
      //       $this->db->where('email', $username);
      //       $query = $this->db->get('members');
      //       return $query->row();
      //   }


     public function save_member($data)
    {
        return $this->db->insert('members', $data); // Assuming 'members' is the name of your table
    }

    public function is_email_duplicate($email)
    {
        $this->db->where(array('email'=> $email,'isActive'=>1));
        $query = $this->db->get('members');

        return $query->num_rows() > 0;
    }
    public function is_number_duplicate($number)
    {
        //$this->db->where('number', $number);
        $this->db->where(array('number'=> $number,'isActive'=>1));
        $query = $this->db->get('members');
        return $query->num_rows() > 0;
    }
   
   //update duplicate check
    public function is_email_duplicate_except($email, $id)
    {
        $this->db->select('id');
        $this->db->from('members');
        $this->db->where(array('email'=> $email,'isActive'=>1));
        $this->db->where('id !=', $id);
        $query = $this->db->get();

        return ($query->num_rows() > 0);
    }

    public function is_number_duplicate_except($number, $id)
    {
        $this->db->select('id');
        $this->db->from('members');
        $this->db->where(array('number'=> $number,'isActive'=>1));
        $this->db->where('id !=', $id);
        $query = $this->db->get();

        return ($query->num_rows() > 0);
    }


     public function getUserDetails($Id) {
        $this->db->select('*'); // Specify the fields you want to retrieve excluding password
        $this->db->from('members');
        $this->db->where(array('id'=> $Id,'isActive'=>1));
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    /*Save member data*/
    public function SaveMemberData($data,$id)
    {
        // Update the manager data in the database
        $this->db->where('id', $id);
        $this->db->update('members', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
      }  
        /*Save Appointment data*/
    public function BookAppointmentData($data)
    {
        return $this->db->insert('appointment', $data);
      }
     //check time based duplicate
      // public function getLastAppointmentTime($mid)
      //   {
      //   $this->db->select('created_on'); // Replace 'created_on' with the actual column name in your appointment table that stores the timestamp
      //   $this->db->where('mid', $mid);
      //   $this->db->order_by('created_on', 'desc'); // Replace 'created_on' with the actual column name in your appointment table that stores the timestamp
      //   $this->db->limit(1);
      //   $query = $this->db->get('appointment'); // Replace 'appointment_table' with the actual table name in your database

      //   if ($query->num_rows() > 0) {
      //       $row = $query->row();
      //       return $row->created_on; // Replace 'timestamp_column' with the actual column name in your appointment table that stores the timestamp
      //   }

      //   return null;
      //   }

      public function getLastAppointmentTime($mid)
        {
            $this->db->select('created_on');
            $this->db->where('mid', $mid);
            $this->db->order_by('created_on', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('appointment');

            if ($query->num_rows() > 0) {
                $row = $query->row();
                return $row->created_on;
            } else {
                // Debugging: Output the generated SQL query and any database errors
                echo $this->db->last_query();
                echo $this->db->error();
            }

            return null;
        }



           //Pending members by id
        public function getPendingMembersbyID($id)
        {
            // $this->db->where(array('appointment_status'=>'Ongoing','isActive'=>1,'id'=>$id));
            // $query = $this->db->get('members');
            // return $query->result();
             $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'members.id'=>$id));
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        }    //sub profile
        public function subprofilegetPendingMembersbyID($id)
        {
            $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'members.parent_member'=>$id)); //,'isSubprofile !='=>'Yes'
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        }    
           //ongoing members by id
        public function getOngoingMembersbyID($id)
        {
            // $this->db->where(array('appointment_status'=>'Ongoing','isActive'=>1,'id'=>$id));
            // $query = $this->db->get('members');
            // return $query->result();
             $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Ongoing','appointment.isActive'=>1,'members.isActive'=>1,'members.id'=>$id));
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        } 
        public function subprofile_getOngoingMembersbyID($id)
        {
            // $this->db->where(array('appointment_status'=>'Ongoing','isActive'=>1,'id'=>$id));
            // $query = $this->db->get('members');
            // return $query->result();
             $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Ongoing','appointment.isActive'=>1,'members.isActive'=>1,'members.parent_member'=>$id));
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        } 
        //completed members by id
        public function getcompletedMembersbyID($id)
        {
            // $this->db->where(array('appointment_status'=>'Completed','isActive'=>1,'id'=>$id));
            // $query = $this->db->get('members');
            // return $query->result();
             $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Completed','appointment.isActive'=>1,'members.isActive'=>1,'members.id'=>$id));
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        }
        public function subprofilegetcompletedMembersbyID($id)
        {
         
             $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Completed','appointment.isActive'=>1,'members.isActive'=>1,'members.parent_member'=>$id));
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        }
       //appointments members by id
        public function getAppointmentsMembersbyID($id)
        {
            // $this->db->where(array('appointment_status'=>'Pending','isActive'=>1,'id'=>$id));
            // $query = $this->db->get('appointment');
            // return $query->result();

            $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'members.id'=>$id));
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        }

        /*forget*/

         public function getUserByEmail($email)
        {
            return $this->db->get_where('members', ['email' => $email])->row();
        }

        public function saveResetToken($email, $token)
        {
            $this->db->where('email', $email);
            $this->db->update('members', ['reset_token' => $token]);
        }

        public function isValidResetToken($token)
        {
            return $this->db->where('reset_token', $token)->get('members')->num_rows() === 1;
        }

        public function updatePasswordByToken($token, $password)
        {
            $user = $this->db->where('reset_token', $token)->get('members')->row();

            if ($user) {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $this->db->where('id', $user->id);
                $this->db->update('members', ['password' => $hashed_password, 'reset_token' => null]);
                return true;
            }

            return false;
        }


//-------------------------------------------------Blogs-------------------------------------------------------
	
    // New -----------------------------

    function make_query($sale, $rent,$lease,$city,$area,$property_type)
    {
        $query = "
        SELECT * FROM blog 
        WHERE isActive = '1' 
        ";


     
        return $query;
    }

  //  function fetch_data($limit, $start, $minimum_price, $maximum_price, $brand, $ram, $storage)
    function fetch_data($limit, $start,$sale, $rent,$lease,$city,$area,$property_type)
    {
        //$query = $this->make_query($minimum_price, $maximum_price, $brand, $ram, $storage);
        $query = $this->make_query($sale, $rent,$lease,$city,$area,$property_type);

        $query .= 'ORDER BY date DESC LIMIT '.$start.', ' . $limit;

        $data = $this->db->query($query);

        $output = '';
      //  print_r($query);
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $property)
            {
               

                $timestamp = strtotime($property->date);

                // Format the date
               //$d = date('j F Y', $timestamp);
               $d = date('j', $timestamp);
               $m = date('M', $timestamp);
               $y = date('Y', $timestamp);

               $intro = $property->content;
               $intro_words = explode(' ', $intro);
               $intro_short = implode(' ', array_slice($intro_words, 0, 10));
               $intro_remaining = implode(' ', array_slice($intro_words, 10));

              $output .= '
              <div class="col-md-4">
					<div class="single-blog-post">
						<div class="img-box">
							<img src="'.base_url().'assets/uploads/blog/'.$property->thumnail.'" alt="" style="width:360px;height:270px">
							<div class="overlay">
								<div class="box">
									<div class="content">
										<ul>
											<li><a href="'.base_url().'SingleBlog?I='.$property->id.'"><i class="fa fa-link"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="content-box">
							<div class="date-box">
								<div class="inner">
									<div class="date">
										<b>'.$d.'</b>
										'.$m.'
									</div>
									<div class="comment">
										'.$y.'
									</div>
								</div>
							</div>
							<div class="content">
								 <a href="#"><h3 style="font-size:15px">' . (strlen($property->title) > 50 ? substr($property->title, 0, 50) . '...' : $property->title) . '</h3></a>
                                  <a href="'.base_url().'SingleBlog?I='.$property->id.'" style="cursor: pointer;" class="">View More</a>
								
							</div>
						</div>
					</div>
				</div> ';

                // <p>'.$intro_short.' 
                // <a class="read-more-btn" href="'.base_url().'SingleBlog?I='.$property->id.'" style="cursor: pointer;">Read More</a></p>



            // $output .= '<div class="col-xl-4 col-lg-4 col-md-6">
            //             <div class="project-three__single">
            //                 <div class="project-three__img-box">
            //                     <div class="project-three__img">
            //                         <img  src="'.base_url().'assets/uploads/properties/thumnail/'.$property->thumnail.'" alt="properties" style="max-width:416px;height:277px" alt="">
            //                     </div>
            //                 </div>
            //                 <div class="project-three__content">
            //                     <div class="project-three__title-box">
            //                         <h3 class="project-three__title">  <a href="'.base_url().'SingleProperty?I='.$property->id.'">'.$property->propertyName.'</a></h3>
                                
            //                     </div>
            //                     <div class="project-three__plus">
            //                         <a href="'.base_url().'SingleProperty?I='.$property->id.'"  class="img-popup"><span
            //                                 class="icon-plus"></span></a>
            //                     </div>
            //                 </div>
            //             </div>
            //         </div>';
         
               
            }
            //    <img class="d-block w-100" src="'.base_url().'assets/web/img/p1.jpg" alt="properties">
        }
        else
        {
            $output = '<h3>No Data Found</h3>';
        }
        return $output;
    }

   // function count_all($minimum_price, $maximum_price, $brand, $ram, $storage)
    function count_all($sale, $rent,$lease,$city,$area,$property_type)
    {
        //$query = $this->make_query($minimum_price, $maximum_price, $brand, $ram, $storage);
        $query = $this->make_query($sale, $rent,$lease,$city,$area,$property_type);
        $data = $this->db->query($query);
        return $data->num_rows();
    }

    
    // public function save_transaction($transaction_data) {
    //     return $this->db->insert('transactions', $transaction_data);
    // }
    
    // Transaction
    public function save_payment_details($data) {
        // Check if the payment details already exist to avoid duplicates
        $this->db->where('transaction_id', $data['transaction_id']);
        $existing = $this->db->get('payment_details')->row();

        if (!$existing) {
            // Insert payment details into the database
            $this->db->insert('payment_details', $data);
            return $this->db->insert_id(); // Return the ID of the inserted row
        } else {
            // Optionally, you can update the existing record if needed
            $this->db->where('transaction_id', $data['transaction_id']);
            $this->db->update('payment_details', $data);
            return $existing->id; // Return the ID of the existing record
        }
    }

    public function update_transaction_status($transactionId, $status) {
        $this->db->where('transaction_id', $transactionId);
        $this->db->update('transactions', array('status' => $status));
    }

    public function get_transaction_by_id($transactionId) {
        return $this->db->get_where('transactions', array('transaction_id' => $transactionId))->row();
    }
    // public function save_transaction($data) {
    //     return $this->db->insert('transactions', $data);
    // }
    public function save_transaction($data) {
        // Check if the transaction ID already exists
        $this->db->where('transaction_id', $data['transaction_id']);
        $query = $this->db->get('transactions');
    
        if ($query->num_rows() > 0) {
            // Transaction ID already exists, skip the insertion
            return false; // or return a specific response code/message
        } else {
            // Insert the new transaction
            return $this->db->insert('transactions', $data);
        }
    }
    
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MyUser_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model( "core_model" );
	}
	
	public function index()
	{
		$id = $this->session->userdata('user');
		$user = $this->core_model->get_row_info('user', 'id', $id, '*');
		$user_address = $this->core_model->get_row_info('user_address', 'id_user', $id, '*');
		$data['user'] = array(
			"fullname"		=> $user->fullname,
			"phone_no"		=> $user->phone_no,
			"email"			=> $user->email,
			"address"		=> $user->address,
			"city"			=> $user->city,
			"state"			=> $user->state,
			"id_country"	=> $user->id_country
		);
		if( $user_address != "" ) { 
			$data['user_address'] = array(
				"fullname"		=> $user_address->fullname,
				"phone_no"		=> $user_address->phone_no,
				"email"			=> $user_address->email,
				"address"		=> $user_address->address,
				"city"			=> $user_address->city,
				"state"			=> $user_address->state,
				"id_country"	=> $user_address->id_country
			);
		}
		else $data['user_address'] = "";
		$data['user_menu'] = "";
		$data['country'] = $this->core_model->get_rows('country', '', '', '*', 'name', 'ASC' );
		$this->load->view('header', $data);
		$this->load->view('user/index_view');
		$this->load->view('footer');
	}
	
	public function update()
	{
		if( isset( $_REQUEST )) {
			$id = $this->session->userdata('user');
			extract( $_REQUEST );
			
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			if( isset( $_REQUEST['submit_details'] )) {
				$data['user'] = array(
					"fullname"		=> $fullname,
					"phone_no"		=> $phone_no,
					"email"			=> $email,
					"address"		=> $address,
					"city"			=> $city,
					"state"			=> $state,
					"id_country"	=> $id_country
				);
				
				$this->form_validation->set_rules('fullname', 'Full Name', 'required');
				$this->form_validation->set_rules('phone_no', 'Phone No', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('address', 'Address', 'required');
				$this->form_validation->set_rules('city', 'Upozilla/City Name', 'required');
				$this->form_validation->set_rules('state', 'District/State Name', 'required');
				$this->form_validation->set_rules('id_country', 'Country Name', 'required');
				
				if( $this->form_validation->run() == TRUE ) {
					$this->db->where( "id", $id );
					$this->db->update( "user", $data['user'] );
					$this->session->set_userdata( array( 'massage' => "Personal Information" ));
					redirect("user");
				}
				
				$data['user_menu'] = "";
				$user_address = $this->core_model->get_row_info('user_address', 'id_user', $id, '*');
				if( $user_address != "" ) { 
					$data['user_address'] = array(
						"fullname"		=> $user_address->fullname,
						"phone_no"		=> $user_address->phone_no,
						"email"			=> $user_address->email,
						"address"		=> $user_address->address,
						"city"			=> $user_address->city,
						"state"			=> $user_address->state,
						"id_country"	=> $user_address->id_country
					);
				}
				else $data['user_address'] = "";
			}
			else if( isset( $_REQUEST['submit_address'] )) {
				$data['user_address'] = array(
					"fullname"		=> $fullname,
					"phone_no"		=> $phone_no,
					"email"			=> $email,
					"address"		=> $address,
					"city"			=> $city,
					"state"			=> $state,
					"id_country"	=> $id_country
				);
				
				$this->form_validation->set_rules('fullname', 'Full Name', 'required');
				$this->form_validation->set_rules('phone_no', 'Phone No', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('address', 'Address', 'required');
				$this->form_validation->set_rules('city', 'Upozilla/City Name', 'required');
				$this->form_validation->set_rules('state', 'District/State Name', 'required');
				$this->form_validation->set_rules('id_country', 'Country Name', 'required');
				
				if( $this->form_validation->run() == TRUE ) {
					$check = $this->core_model->get_row_info('user_address', 'id_user', $id, '*');
					if( $check != "" ) {
						$this->db->where( "id", $id );
						$this->db->update( "user_address", $data['user_address'] );
					}
					else {
						$data['user_address']['id_user'] = $id;
						$this->db->insert( "user_address", $data['user_address'] );
					}
					$this->session->set_userdata( array( 'massage' => "Delivery Address" ));
					redirect("user");
				}
				
				$data['user_menu'] = "address";
				$user = $this->core_model->get_row_info('user', 'id', $id, '*');
				$data['user'] = array(
					"fullname"		=> $user->fullname,
					"phone_no"		=> $user->phone_no,
					"email"			=> $user->email,
					"address"		=> $user->address,
					"city"			=> $user->city,
					"state"			=> $user->state,
					"id_country"	=> $user->id_country
				);
				
			}
			else if( isset( $_REQUEST['submit_password'] )) {
				
				$this->form_validation->set_rules('old_password', 'Current Password', 'required|min_length[6]|max_length[12]');
				$this->form_validation->set_rules('new_password', 'New password', 'required|min_length[6]|max_length[12]');
				$this->form_validation->set_rules('retype_password', 'Confirm password', 'required|matches[new_password]');
				
				$user = $this->core_model->get_row_info('user', 'id', $id, '*');
				if( $this->form_validation->run() == TRUE && $user->password == md5( $old_password )) {
					$this->db->where( "id", $id );
					$this->db->update( "user", array( "password" => md5( $new_password )));
					$this->session->set_userdata( array( 'massage' => "Account Password" ));
					redirect("user");
				}
				else if( $user->password != md5( $old_password ) ) $data['error'] = "<p>The Old Password field does not match the user password.</p>";
				
				$user_address = $this->core_model->get_row_info('user_address', 'id_user', $id, '*');
				$data['user'] = array(
					"fullname"		=> $user->fullname,
					"phone_no"		=> $user->phone_no,
					"email"			=> $user->email,
					"address"		=> $user->address,
					"city"			=> $user->city,
					"state"			=> $user->state,
					"id_country"	=> $user->id_country
				);
				if( $user_address != "" ) { 
					$data['user_address'] = array(
						"fullname"		=> $user_address->fullname,
						"phone_no"		=> $user_address->phone_no,
						"email"			=> $user_address->email,
						"address"		=> $user_address->address,
						"city"			=> $user_address->city,
						"state"			=> $user_address->state,
						"id_country"	=> $user_address->id_country
					);
				}
				else $data['user_address'] = "";
				$data['user_menu'] = "password";
			}
			else redirect("user");
			
			
			$data['country'] = $this->core_model->get_rows('country', '', '', '*', 'name', 'ASC' );
			
			$this->load->view('header', $data);
			$this->load->view('user/index_view');
			$this->load->view('footer');
		}
		else redirect("user");
	}
	
	public function signout()
	{
		$this->session->unset_userdata( "user" );
		$this->session->unset_userdata( "email" );
		redirect( "home" );
	}
	
	
}
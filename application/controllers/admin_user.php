<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_user extends MyAdmin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model( "core_model" );
	}

	public function index( $offset = 0 )
	{
		$data['array'] = array();
		$this->db->select( "*" );
		$this->db->from( "user" );
		$query = $this->db->get();
		if( $query->num_rows > 0 )
		{
			$this->load->library('pagination');
			$total_row = $query->num_rows;

			$config['base_url'] = base_url().'/'.$this->router->fetch_class().'/index';
			$config['total_rows'] = $total_row;
			$config['per_page'] = 20;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();

			$this->db->select( "user.*, country.name" );
			$this->db->from( "user" );
			$this->db->join( "country", "country.id = user.id_country", "left" );
			$this->db->limit( $config['per_page'], $offset );
			$query = $this->db->get();
		
			foreach( $query->result() as $row ) $rows[] = $row;
			$data['array'] = $rows;
		}

		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header',$data);
		$this->load->view('admin_user/index_view');
		$this->load->view('admin_footer');
	}

	public function edit($id)
	{
		$this->db->select( "user.*, country.name" );
		$this->db->from( "user" );
		$this->db->join( "country", "country.id = user.id_country", "left" );
		$this->db->where( "user.id", $id );
		$query = $this->db->get();
		if( $query->num_rows > 0 )
		{
			$result = $query->result();
			
			$data['countries'] = "";
			$this->db->select( "name" );
			$this->db->from( "country" );
			$this->db->order_by( "name", "asc" );
			$query = $this->db->get();
			if( $query->num_rows > 0 ) foreach( $query->result() as $row ) $data['countries'][] = $row->name;
			
			if( isset( $_REQUEST['zip_code'] ))
			{
				$data['row'] = array(
					"email"				=> $_REQUEST['email'],
					"password"			=> $_REQUEST['password'] == '' ? $result[0]->password : md5( $_REQUEST['password'] ),
					"fullname"			=> $_REQUEST['fullname'],
					"address"			=> $_REQUEST['address'],
					"phone_no"			=> $_REQUEST['phone_no'],
					"city"				=> $_REQUEST['city'],
					"state"				=> $_REQUEST['state'],
					"country"			=> $_REQUEST['country'],
					"zip_code"			=> $_REQUEST['zip_code'],
					"id"				=> $id,
				);

				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');

				$this->form_validation->set_rules('email', 'Email', 'required');
				if( $_REQUEST['password'] != '' ) $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]');				
				$this->form_validation->set_rules('fullname', 'Full Name', 'required');
				$this->form_validation->set_rules('phone_no', 'Phone Number', 'required|numeric');
				$this->form_validation->set_rules('address', 'Address Details', 'required');
				$this->form_validation->set_rules('city', 'City Name', 'required');
				$this->form_validation->set_rules('state', 'State Name', 'required');
				$this->form_validation->set_rules('country', 'Country Name', 'required');
				$this->form_validation->set_rules('zip_code', 'Zip Code', 'required|numeric');
				
				$check_exits = $result[0]->email == $_REQUEST['email'] ? "" : $this->core_model->get_row_info( "user", "email", $_REQUEST['email'], "id" );
				if( $this->form_validation->run() == FALSE || $check_exits != "" )
				{
					if( $check_exits != '' ) $data['error_message'] = "This E-mail is already registered in our user list. Try by another one.";

					$data['title'] = $this->get_contents->get_title();
					$this->load->view('admin_header',$data);
					$this->load->view('admin_user/editor_view');
					$this->load->view('admin_footer');
				}
				else 
				{
					$this->db->where( "id", $id );
					$this->db->update('user', $data['row']);
					redirect( 'admin_user' );
				}
			}
			else
			{
				$data['row'] = array(
					"email"				=> $result[0]->email,
					"password"			=> $result[0]->password,
					"fullname"			=> $result[0]->fullname,
					"address"			=> $result[0]->address,
					"phone_no"			=> $result[0]->phone_no,
					"city"				=> $result[0]->city,
					"state"				=> $result[0]->state,
					"country"			=> $result[0]->name,
					"zip_code"			=> $result[0]->zip_code,
					"id"				=> $result[0]->id
				);
				
				$data['title'] = $this->get_contents->get_title();
				$this->load->view('admin_header',$data);
				$this->load->view('admin_user/editor_view');
				$this->load->view('admin_footer');
			}
		}
		else redirect( 'admin_user' );
	}	

	public function status( $id = '' )
	{
		if( $id != '' )
		{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('id',$id);
			$query =$this->db->get();			

			if($query->num_rows() > 0)
			{
				$res = $query->result();
				$status = $res[0]->status;
				$data['status'] = $status ? 0 : 1;
				$this->db->where('id', $id);
				$this->db->update('user', $data);
			}
		}
		redirect('admin_user');
	}	

	public function delete( $id )
	{
		$this->db->where( 'id', $id );
		$this->db->delete( 'user' );
		redirect( "admin_user" );
	}	

}
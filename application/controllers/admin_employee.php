<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_employee extends MyAdmin_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	public function index( $offset = 0 )
	{		
		$data['array'] = array();
		$this->db->select( "*" );
		$this->db->from( "employee" );
		$this->db->where( "active !=", 2 );
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
			
			$this->db->select('employee.*, profiles.name_profiles');
			$this->db->from('employee');
			$this->db->join('profiles','employee.id_profiles= profiles.id_profiles','left');
			$this->db->where('employee.active != ', '2');
			$this->db->limit( $config['per_page'], $offset );
			$query = $this->db->get();
			
			foreach( $query->result() as $row ) $rows[$row->id] = $row;
			$data['array'] = $rows;			
		}
		
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header',$data);
		$this->load->view('admin_employee/index_view');
		$this->load->view('admin_footer');
	}
	
	public function add()
	{
		if( isset( $_POST['submit'] ) ) {
			$data = array(
				'firstname'		=> $_POST['firstname'],
				'lastname'		=> $_POST['lastname'],
				'email'			=> $_POST['email'],
				'id_profiles'	=> $_POST['id_profiles']
			);
		}
		if( isset( $_POST['password'] ) && $_POST['password'] != '' )
			$data['password'] = md5( trim( $_POST['password'] ));
		
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('id_profiles', 'Profiles', 'required');
		if(empty($_REQUEST['id'])) $this->form_validation->set_rules('password', 'Password', 'required');
		
		if( isset( $_REQUEST['email'] ))
			$valid = $this->checkExitsemail( $data['email'], ( $_REQUEST['id'] != '' ? $_REQUEST['id'] : 0 ) );
		
		if( $this->form_validation->run() == FALSE || ( isset( $valid ) && $valid == false ))
		{
			if(isset( $_REQUEST['id']))
				$data['id'] = $_REQUEST['id'];
			
			$data['res'] = $this->getProfiles();
			
			if( isset( $_POST['firstname'] ) ) $data['error'] = 1;
			
			if(isset( $_REQUEST['firstname'] ))
				$this->session->set_flashdata('flashError', 'An error occured.');
			
			if( isset( $valid ) && $valid == false )
				$data['error'] = "<p>Email is already exits, try by another email id.</p>";
			
			$data['title'] = $this->get_contents->get_title();
			$this->load->view('admin_header', $data);
			$this->load->view('admin_employee/edit_view');
			$this->load->view('admin_footer');
		}
		else
		{
			$data['update_date'] = time();
			$data['update_by'] = $this->session->userdata( "id_admin" );
			if( empty( $_REQUEST['id'] ))
			{	
				$data['create_date'] = time();
				$data['create_by'] = $this->session->userdata( "id_admin" );
				$this->session->set_flashdata('flashSuccess', 'Insert Successfully');
				$this->db->insert('employee', $data);
			}
			else
			{
				$this->session->set_flashdata('flashSuccess', 'Update Successfully');
				$this->db->where('id', $_REQUEST['id']);
				$this->db->update('employee', $data);
			}
			redirect("admin_employee");
		}
	}
	
	public function edit( $id = '' )
	{
		if( $id != '' )
		{
			$data['id'] = $id;
			$this->db->select('employee.*, profiles.name_profiles');
			$this->db->where('id', $id);
			$this->db->where('employee.active != ', '2');
			$this->db->from('employee');
			$this->db->join('profiles','employee.id_profiles= profiles.id_profiles','left');
			
			$query = $this->db->get();			
			if($query->num_rows() > 0)
			{
				$res = $query->result();
				
				$data['firstname'] = $res[0]->firstname;
				$data['lastname'] =$res[0]->lastname;
				$data['email'] =$res[0]->email;
				$data['id_profiles'] = $res[0]->id_profiles;
			} 	
		}
		
		$data['res'] = $this->getProfiles();
		
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header', $data);
		$this->load->view('admin_employee/edit_view');
		$this->load->view('admin_footer');
	}
	
	public function checkExitsemail( $email, $id = 0 )
	{
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->where('email',$email);
		$query = $this->db->get();
		
		if( $query->num_rows() > 0 ) {
			$res = $query->result();
			if( $id == $res[0]->id ) return true;
			else return false;
		}
		else return true;
	}
	
	public function alter_activation( $id = '' )
	{
		if( $id != '' && $id != 1 )
		{
			$this->db->select('*');
			$this->db->where('id', $id);
			$this->db->from('employee');
			$query = $this->db->get();
			$res = $query->result();
			
			if( $res[0]->id ) {
				$active = $res[0]->active ? 0 : 1;				
				$this->db->where('id', $id);
				$this->db->update( 'employee', array( "active" => $active ) );
			}
		}
		redirect( "admin_employee" );
	}
	
	public function delete( $id = '' )
	{
		if( $id != '' && $id != 1 )
		{
			$this->db->where('id', $id);
			$this->db->update( 'employee', array( "active" => 2 ) );
		}
		redirect( "admin_employee" );
	}
	
	public function getProfiles()
	{
		$this->db->select('*');
		$this->db->from('profiles');
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			foreach ( $query->result() as $row )
			{
				$rows[$row->id_profiles] = $row->name_profiles;
			} 
		}
		return $rows;
	}
	
}

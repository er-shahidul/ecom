<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_subcategory extends MyAdmin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model( "core_model" );	
	}
	
	public function index( $offset = 0 )
	{		
		$data['array'] = array();
		$this->db->select( "*" );
		$this->db->from( "subcategory" );
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
			
			$this->db->select('*');
			$this->db->from('subcategory');
			$this->db->where('active != ', '2');
			$this->db->limit( $config['per_page'], $offset );
			$query = $this->db->get();
			
			foreach( $query->result() as $row ) $rows[] = $row;
			$data['array'] = $rows;	
			$data['category'] = $this->core_model->get_rows_id_name( 'category', 'category_name' );
		}
		
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header',$data);
		$this->load->view('admin_subcategory/index_view');
		$this->load->view('admin_footer');
	}
	
	public function add()
	{
		if( isset( $_POST['subcategory_name'] ) ) {
			$data = array(
				'id_category'				=> $_POST['id_category'],
				'subcategory_name'			=> $_POST['subcategory_name'],
				'subcategory_description'	=> $_POST['subcategory_description']
			);
		}
		
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id_category', 'Category Name', 'required');
		$this->form_validation->set_rules('subcategory_name', 'Subcategory Name', 'required');
		$this->form_validation->set_rules('subcategory_description', 'Subcategory Description', 'required');
		
		if( $this->form_validation->run() == FALSE )
		{
			if(isset( $_REQUEST['id']))
				$data['id'] = $_REQUEST['id'];
			
			if( isset( $_POST['subcategory_name'] ) ) $data['error'] = 1;
			
			if(isset( $_REQUEST['subcategory_name'] ))
				$this->session->set_flashdata('flashError', 'An error occured.');
			
			$data['category'] = $this->core_model->get_rows_id_name( 'category', 'category_name' );
			$data['title'] = $this->get_contents->get_title();
			$this->load->view('admin_header', $data);
			$this->load->view('admin_subcategory/edit_view');
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
				$this->db->insert('subcategory', $data);
			}
			else
			{
				$this->session->set_flashdata('flashSuccess', 'Update Successfully');
				$this->db->where('id', $_REQUEST['id']);
				$this->db->update('subcategory', $data);
			}
			redirect("admin_subcategory");
		}
	}
	
	public function edit( $id = '' )
	{
		$data['category'] = $this->core_model->get_rows_id_name( 'category', 'category_name' );
		if( $id != '' )
		{
			$data['id'] = $id;
			$this->db->select('*');
			$this->db->from('subcategory');
			$this->db->where('id', $id);
			$this->db->where('active != ', '2');
			
			$query = $this->db->get();			
			if($query->num_rows() > 0)
			{
				$res = $query->result();
				
				$data['subcategory_name'] = $res[0]->subcategory_name;
				$data['subcategory_description'] =$res[0]->subcategory_description;
			} 	
		}
		
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header', $data);
		$this->load->view('admin_subcategory/edit_view');
		$this->load->view('admin_footer');
	}
	
	public function alter_activation( $id = '' )
	{
		if( $id != '' && $id != 1 )
		{
			$this->db->select('*');
			$this->db->where('id', $id);
			$this->db->from('subcategory');
			$query = $this->db->get();
			$res = $query->result();
			
			if( $res[0]->id ) {
				$active = $res[0]->active ? 0 : 1;				
				$this->db->where('id', $id);
				$this->db->update( 'subcategory', array( "active" => $active ) );
			}
		}
		redirect( "admin_subcategory" );
	}
	
	public function delete( $id = '' )
	{
		if( $id != '' && $id != 1 )
		{
			$this->db->where('id', $id);
			$this->db->update( 'subcategory', array( "active" => 2 ) );
		}
		redirect( "admin_subcategory" );
	}
	
}

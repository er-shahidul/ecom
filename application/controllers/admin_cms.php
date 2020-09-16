<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin_cms extends MyAdmin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model( "core_model" );
	}	
	
	public function index()
	{
		$data['array'] = array();
		$this->db->select( "*" );
		$this->db->from( "cms" );
		$this->db->where( "status != 2" );
		$query = $this->db->get();
		if( $query->num_rows > 0 )
		{
			foreach( $query->result() as $row ) $rows[] = $row;
			$data['array'] = $rows;
		}
		
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header',$data);
		$this->load->view('admin_cms/index_view');
		$this->load->view('admin_footer');
	}
	
	public function edit($id)
	{
		$this->db->select( "*" );
		$this->db->from( "cms" );
		$this->db->where( "id", $id );
		$this->db->where( "status != 2" );
		$query = $this->db->get();
		if( $query->num_rows > 0 )
		{
			$result = $query->result();
			if( isset( $_REQUEST['title'] ))
			{
				$data['row'] = array( "title" => $_REQUEST['title'], "content" => $_REQUEST['content'], "id" => $id );
				
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
		
				$this->form_validation->set_rules('title', 'Title', 'required');
				$this->form_validation->set_rules('content', 'Content', 'required');
				
				$check_exits = $result[0]->title == $_REQUEST['title'] ? "" : $this->core_model->get_row_info( "cms", "title", $_REQUEST['title'], "id" );
				if( $this->form_validation->run() == FALSE || $check_exits != "" )
				{
					if( $check_exits != '' ) $data['error_message'] = "This cms is already exit in our CMS list. Try by another one.";
					$data['title'] = $this->get_contents->get_title();
					$this->load->view('admin_header',$data);
					$this->load->view('admin_contractor/editor_view');
					$this->load->view('admin_footer');
				}
				else 
				{
					$this->db->where( "id", $id );
					$this->db->update('cms', $data['row']);
					redirect( 'admin_cms' );
				}
			}
			
			else
			{
				$data['row'] = array( "title" => $result[0]->title, "content" => $result[0]->content, "id" => $result[0]->id );
				
				$data['title'] = $this->get_contents->get_title();
				$this->load->view('admin_header',$data);
				$this->load->view('admin_cms/editor_view');
				$this->load->view('admin_footer');
			}
		}
		else redirect( 'admin_cms' );
	}
	
	public function add()
	{
		if( isset( $_REQUEST['title'] ))
		{
			$data['row'] = array( "title" => $_REQUEST['title'], "content" => $_REQUEST['content'] );
			
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
	
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			
			$check_exits = $this->core_model->get_row_info( "cms", "title", $_REQUEST['title'], "id" );
			if( $this->form_validation->run() == FALSE || $check_exits != "" )
			{
				if( $check_exits != '' ) $data['error_message'] = "This cms title is already exit";
			}
			else 
			{
				$this->db->insert('cms', $data['row'] );
				redirect( 'admin_cms' );
			}
		}
		
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header',$data);
		$this->load->view('admin_cms/add_view');
		$this->load->view('admin_footer');
	}
	
	public function status( $id = '' )
	{
		if( $id != '' )
		{		
			$this->db->select('*');
			$this->db->from('cms');
			$this->db->where('id',$id);
			$this->db->where( "status != 2" );
			$query =$this->db->get();
			
			if($query->num_rows() > 0)
			{
				$res = $query->result();
				$status = $res[0]->status;
				$data['status'] = $status ? 0 : 1;
				$this->db->where('id', $id);
				$this->db->update('cms', $data);
			}
		}
		redirect('admin_cms');
	}
	
	public function delete( $id = '' )
	{
		if( $id != '' && $id != 1 )
		{
			$this->db->where('id', $id);
			$this->db->update( 'cms', array( "status" => 2 ) );
		}
		redirect( "admin_cms" );
	}
	
}

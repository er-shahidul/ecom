<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_product extends MyAdmin_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->load->model( "core_model" );
	}
	
	public function index( $offset = 0 )
	{		
		$data['array'] = array();
		$this->db->select( "*" );
		$this->db->from( "product" );
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
			$this->db->from('product');
			$this->db->where('active != ', '2');
			$this->db->limit( $config['per_page'], $offset );
			$query = $this->db->get();
			
			foreach( $query->result() as $row ) $rows[] = $row;
			$data['array'] = $rows;	
			$data['category'] = $this->core_model->get_rows_id_name( 'category', 'category_name' );
			$data['subcategory'] = $this->core_model->get_rows_id_name( 'subcategory', 'subcategory_name' );		
		}
		
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header',$data);
		$this->load->view('admin_product/index_view');
		$this->load->view('admin_footer');
	}
	
	public function add()
	{
		if( isset( $_POST['product_name'] ) ) {
			$data = array(
				'id_category'			=> $_POST['id_category'],
				'id_subcategory'		=> $_POST['id_subcategory'],
				'product_name'			=> $_POST['product_name'],
				'product_description'	=> $_POST['product_description'],
				'product_short'			=> $_POST['product_short'],
				'product_price'			=> $_POST['product_price'],
				'status_new'			=> isset( $_POST['status_new'] ) && $_POST['status_new'] == 1 ? 1 : 0,
				'status_featured'		=> isset( $_POST['status_featured'] ) && $_POST['status_featured'] == 1 ? 1 : 0,
				'status_top'			=> isset( $_POST['status_top'] ) && $_POST['status_top'] == 1 ? 1 : 0
			);
		}
		
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id_category', 'Category Name', 'required');
		$this->form_validation->set_rules('id_subcategory', 'Subcategory Name', 'required');
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		$this->form_validation->set_rules('product_price', 'Product Price', 'required');
		$this->form_validation->set_rules('product_description', 'Product Description', 'required');
		
		if( $this->form_validation->run() == FALSE )
		{
			if(isset( $_REQUEST['id']))
				$data['id'] = $_REQUEST['id'];
			
			if( isset( $_POST['product_name'] ) ) $data['error'] = 1;
			
			if(isset( $_REQUEST['product_name'] ))
				$this->session->set_flashdata('flashError', 'An error occured.');
			
			$data['category'] = $this->core_model->get_rows_id_name( 'category', 'category_name' );
			$data['subcategory'] = $this->core_model->get_rows_id_name( 'subcategory', 'subcategory_name' );
			$data['title'] = $this->get_contents->get_title();
			$this->load->view('admin_header', $data);
			$this->load->view('admin_product/edit_view');
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
				$this->db->insert('product', $data);
				$id = $this->db->insert_id();
			}
			else
			{
				$this->session->set_flashdata('flashSuccess', 'Update Successfully');
				$this->db->where('id', $_REQUEST['id']);
				$this->db->update('product', $data);
				$id = $_REQUEST['id'];
			}
			
			if( isset( $_FILES['phy_path']['name'] ) && $_FILES['phy_path']['name'] != '' )
			{
				$extention = array( 'jpg', 'png', 'gif', 'JPG', 'PNG', 'GIF' );
				$pathinfo = pathinfo( $_FILES['phy_path']['name'] );
				if( array_search( $pathinfo['extension'], $extention ) !== false )
				{
					$img_path = "$id." . $pathinfo['extension'];
					$get_info = $this->core_model->get_row_info( "product", "id", $id, "phy_path" );
					if( isset( $_REQUEST['id'] ) && $_REQUEST['id'] > 0 && file_exists( "assets/product/$get_info" )) unlink( "./assets/product/$get_info" );
					$config['upload_path'] = "./assets/product/";
					$config['allowed_types'] = 'jpg|png|gif|JPG|GIF|PNG';
					$config['file_name'] = $img_path;
					
					$this->load->library('upload', $config);
					$this->upload->do_upload('phy_path');
					
					$this->db->where( 'id', $id );
					$this->db->update('product', array( "phy_path" => $img_path ));
				}
			}
			redirect("admin_product");
		}
	}
	
	public function edit( $id = '' )
	{
		$data['category'] = $this->core_model->get_rows_id_name( 'category', 'category_name' );
		$data['subcategory'] = $this->core_model->get_rows_id_name( 'subcategory', 'subcategory_name' );
		if( $id != '' )
		{
			$data['id'] = $id;
			$this->db->select('*');
			$this->db->from('product');
			$this->db->where('id', $id);
			$this->db->where('active != ', '2');
			
			$query = $this->db->get();			
			if($query->num_rows() > 0)
			{
				$res = $query->result();
				
				$data['id_category'] 			= $res[0]->id_category;
				$data['id_subcategory'] 		= $res[0]->id_subcategory;
				$data['product_name'] 			= $res[0]->product_name;
				$data['product_price'] 			= $res[0]->product_price;
				$data['product_short'] 			= $res[0]->product_short;
				$data['product_description']	= $res[0]->product_description;
				$data['phy_path'] 				= $res[0]->phy_path;
				$data['status_new'] 			= $res[0]->status_new;
				$data['status_featured'] 		= $res[0]->status_featured;
				$data['status_top'] 			= $res[0]->status_top;
			} 	
		}
		
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header', $data);
		$this->load->view('admin_product/edit_view');
		$this->load->view('admin_footer');
	}
	
	public function alter_activation( $id = '' )
	{
		if( $id != '' && $id != 1 )
		{
			$this->db->select('*');
			$this->db->where('id', $id);
			$this->db->from('product');
			$query = $this->db->get();
			$res = $query->result();
			
			if( $res[0]->id ) {
				$active = $res[0]->active ? 0 : 1;				
				$this->db->where('id', $id);
				$this->db->update( 'product', array( "active" => $active ) );
			}
		}
		redirect( "admin_product" );
	}
	
	public function delete( $id = '' )
	{
		if( $id != '' && $id != 1 )
		{
			$this->db->where('id', $id);
			$this->db->update( 'product', array( "active" => 2 ) );
		}
		redirect( "admin_product" );
	}
	
}

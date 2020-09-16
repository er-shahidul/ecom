<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_setting extends MyAdmin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model( "core_model" );
	}

	public function index()
	{
		if( isset( $_REQUEST['submit'] ))
		{
			$row = array(
				"title"				=> $_REQUEST['title'],
				"emails"			=> $_REQUEST['emails'],
				"bkash_mobile"		=> $_REQUEST['bkash_mobile'],
				"bkash_username"	=> $_REQUEST['bkash_username'],
				"bkash_password"	=> $_REQUEST['bkash_password'],
				"bkash_url"			=> $_REQUEST['bkash_url']
			);
			$this->db->where( "id", 1 );
			$this->db->update( "setting", $row );
			
			if( $_FILES['phy_path']['name'] != '' ) {
				$pathinfo = pathinfo($_FILES['phy_path']['name'] );
				unlink( "./assets/images/logo.png" );
				move_uploaded_file( $_FILES["phy_path"]["tmp_name"], "./assets/images/logo.png");
			}

		}
		$data['array'] = array();
		$this->db->select( "*" );
		$this->db->from( "setting" );
		$query = $this->db->get();
		$result = $query->result();
		$data['row'] = array(
			"title"				=> $result[0]->title,
			"emails"			=> $result[0]->emails,
			"bkash_mobile"		=> $result[0]->bkash_mobile,
			"bkash_username"	=> $result[0]->bkash_username,
			"bkash_password"	=> $result[0]->bkash_password,
			"bkash_url"			=> $result[0]->bkash_url
		);
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header',$data);
		$this->load->view('admin_setting/index_view');
		$this->load->view('admin_footer');
	}
	
	public function home_banner( $id = 0 )
	{
		if( isset( $_FILES['file']['name'] ) && $_FILES['file']['name'] != '' ) {
			$pathinfo = pathinfo($_FILES['file']['name']);
			if( isset( $_REQUEST['id'] )) {
				$id =  $_REQUEST['id'];
				$img_path = "$id.". $pathinfo['extension'];
				$this->db->where( "id", $id );
				$this->db->update('setting_banner', array( "title" => $_REQUEST['title'], "url" => $img_path ));
				unlink( "./assets/banner/$img_path" );
				move_uploaded_file( $_FILES["file"]["tmp_name"], "./assets/banner/$img_path");

			}
			else {
				$this->db->insert('setting_banner', array( "title" => $_REQUEST['title'] ));
				$id = $this->db->insert_id();
				$img_path = "$id.". $pathinfo['extension'];
				move_uploaded_file( $_FILES["file"]["tmp_name"], "./assets/banner/$img_path");
				$this->db->where( "id", $id );
				$this->db->update('setting_banner', array( "url" => $img_path ));
			}
			if( $_REQUEST['link'] ) {
				$this->db->where( "id", $id );
				$this->db->update('setting_banner', array( "id_product" => $_REQUEST['link'] ));
			}
			if( $_REQUEST['direct_link'] ) {
				$this->db->where( "id", $id );
				$this->db->update('setting_banner', array( "link" => $_REQUEST['direct_link'] ));
			}
			if( $_REQUEST['status'] != "" ) {
				$this->db->where( "id", $id );
				$this->db->update('setting_banner', array( "status" => $_REQUEST['status'] ));
			}
			redirect( "admin_setting/home_banner" );
		}
		else {
			if( isset( $_REQUEST['id'] )) {
				$this->db->where( "id", $_REQUEST['id'] );
				if( $_REQUEST['title'] ) $this->db->update('setting_banner', array( "title" => $_REQUEST['title'] ));
				$this->db->where( "id", $_REQUEST['id'] );
				if( $_REQUEST['link'] ) $this->db->update('setting_banner', array( "id_product" => $_REQUEST['link'] ));
				$this->db->where( "id", $_REQUEST['id'] );
				if( $_REQUEST['direct_link'] ) $this->db->update('setting_banner', array( "link" => $_REQUEST['direct_link'] ));
				$this->db->where( "id", $_REQUEST['id'] );
				if( $_REQUEST['status'] != "" ) $this->db->update('setting_banner', array( "status" => $_REQUEST['status'] ));
			}
		}
		
		$album = array();
		$this->db->select("id, product_name");
		$this->db->from("product");
		$this->db->order_by( 'product_name', "ASC" );
		$this->db->where( 'active !=', 2 );
		$query = $this->db->get();
		if( $query->num_rows() > 0 )
		{
			foreach( $query->result() as $row ) $product[$row->id] = $row->product_name;
		}
		
		$banner = $this->core_model->get_rows( "setting_banner", "status !=", 2, "*" );
		if( $id > 0 ) $data['item'] = $this->core_model->get_row_info( "setting_banner", "id", $id, "*" );
		if( $id > 0 && $data['item']->status == 2 ) redirect( "admin_setting/home_banner" );
		$data['banner'] = $banner;
		$data['product'] = $product;
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header',$data);
		$this->load->view('admin_setting/home_banner');
		$this->load->view('admin_footer');
	}
	
	public function banner_delete( $id = 0 ){
		if( $id > 0 ) {
			$this->db->where( "id", $id );
			$this->db->update('setting_banner', array( "status" => 2 ));
		}
		redirect( "admin_setting/home_banner" );
	}

}
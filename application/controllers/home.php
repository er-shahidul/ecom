<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model( "core_model" );
	}
	
	public function index($id=0)
	{

		$data['menu_active'] = "home";
		$data['banner'] = $this->core_model->get_rows( "setting_banner", 'status', '1', "*", 'id', 'DESC', 10 );
		$data['release'] = $this->core_model->get_rows( "product", 'status_new', '1', "*", 'id', 'DESC', 20, 'active', 1 );
		$data['featured'] = $this->core_model->get_rows( "product", 'status_featured', '1', "*", 'id', 'DESC', 20, 'active', 1 );
		$data['topitems'] = $this->core_model->get_rows( "product", 'status_top', '1', "*", 'id', 'DESC', 20, 'active', 1 );
		$data['otehritems'] = $this->core_model->get_rows( "product", 'status_new = 0 AND status_featured = 0 AND status_top = ', '0', "*", 'id', 'DESC', 20, 'active', 1 );
		
		$this->load->view('header', $data);
		$this->load->view('home/index_view');
		$this->load->view('footer');
	}
	
	public function content( $type = 'category', $id )
	{
		if( $type == 'category' ) $cid = $id;
		else {
			$data['subcategory'] = $this->core_model->get_row_info( "subcategory", "id", $id, "*" );
			$cid = $data['subcategory']->id_category;
			$data['menu_subactive'] = $data['subcategory']->subcategory_name;
		}
		$data['category'] = $this->core_model->get_row_info( "category", "id", $cid, "*" );
		$data['menu_active'] = $data['category']->category_name;
		$data['all_product'] = $this->core_model->get_rows( "product", "id_$type", $id, "*", 'id', 'desc', '', 'active', 1 );
		$this->load->view('header', $data);
		$this->load->view('home/content_view');
		$this->load->view('footer');
	}
	
	public function product( $id )
	{
		$data['product'] = $this->core_model->get_row_info( "product", "id", $id, "*" );
		$data['related'] = $this->core_model->get_rows( "product", "id != $id AND phy_path != '' AND id_subcategory = ", $data['product']->id_subcategory, "*", "status_featured DESC, status_new DESC, status_top", "DESC", "10" );
		$data['subcategory'] = $this->core_model->get_row_info( "subcategory", "id", $data['product']->id_subcategory, "*" );
		$data['category'] = $this->core_model->get_row_info( "category", "id", $data['product']->id_category, "*" );
		$data['menu_subactive'] = $data['subcategory']->subcategory_name;
		$data['menu_active'] = $data['category']->category_name;
		$this->load->view('header', $data);
		$this->load->view('home/product_view');
		$this->load->view('footer');
	}
	
	public function topitems()
	{
		$data['menu_active'] = "home";
		$data['all_product'] = $this->core_model->get_rows( "product", "status_top", 1, "*", 'id', 'desc', '', 'active', 1 );
		$this->load->view('header', $data);
		$this->load->view('home/content_view');
		$this->load->view('footer');
	}
	
	public function released()
	{
		$data['menu_active'] = "home";
		$data['all_product'] = $this->core_model->get_rows( "product", "status_new", 1, "*", 'id', 'desc', '', 'active', 1 );
		$this->load->view('header', $data);
		$this->load->view('home/content_view');
		$this->load->view('footer');
	}
	
	public function featured()
	{
		$data['menu_active'] = "home";
		$data['all_product'] = $this->core_model->get_rows( "product", "status_featured", 1, "*", 'id', 'desc', '', 'active', 1 );
		$this->load->view('header', $data);
		$this->load->view('home/content_view');
		$this->load->view('footer');
	}
	
	public function others()
	{
		$data['menu_active'] = "home";
		$data['all_product'] = $this->core_model->get_rows( "product", "status_new = 0 AND status_featured = 0 AND status_top = ", 0, "*", 'id', 'desc', '', 'active', 1 );
		$this->load->view('header', $data);
		$this->load->view('home/content_view');
		$this->load->view('footer');
	}
	
	public function cms($id=1)
	{
		$data['cms'] = $this->core_model->get_row_info( "cms", "id", $id, "*" );
		
		$this->load->view('header', $data);
		$this->load->view('home/cms_view');
		$this->load->view('footer');
	}
	
	public function search( $search = "" ) {
		if( $search == "" ) redirect( "home/index" );
		$search = urldecode( $search );
		
		$data['search'] = $search;
		$data['result'] = array();
		
		$this->db->select( "*" );
		$this->db->from( "product" );
		$this->db->where( "product_name LIKE '%$search%'" );
		$this->db->where( "active", 1 );
		$this->db->order_by( "product_name", "ASC" );
		$query = $this->db->get();
		
		if( $query->num_rows() > 0 ) {
			foreach( $query->result() as $row ) $data['result'][$row->id] = $row;
			$data['subcategory'] = $this->core_model->get_rows_id_name( 'subcategory', 'subcategory_name' );
			$data['category'] = $this->core_model->get_rows_id_name( 'category', 'category_name' );
		}
		
		$this->load->view('header', $data);
		$this->load->view('home/search_view');
		$this->load->view('footer');
	}
	
	public function user() {

		$id = $this->session->userdata( "user" );
		$this->session->userdata( "email" );
		if( $id > 0 ) redirect( "user/index" );
		
		if( isset( $_REQUEST['submit'] )) {
			extract( $_REQUEST );
			$check = $this->core_model->get_row_info( "user", "email", $email, "*" );
			if( $submit_type == "login" ) {
				if( $check != "" && $check->password == md5( $password ) ) {
					$this->session->set_userdata( array( "user" => $check->id, "email" => $email ));
					redirect( "user/index" );
				}
				else {
					if( $check == "" ) $data['error'] = "Email Not Exit";
					else $data['error'] = "Email And Password Not Match";
				}
			}
			else if( $submit_type == "reset" ) {
				if( $check != "" && $check->fullname == $name ) {
					$insert = array( "datetime" => time(), "email" => $email, "token" => $this->randomAlphaNum( 10 ));
					$this->db->insert( "password", $insert );
				}
				else {
					if( $check == "" ) $data['error'] = "Email Not Exit";
					else $data['error'] = "Email And Password Not Match";
				}
			}
			else {
				if( $check != "" || $password != $cpassword ) {
					if( $check != "" ) $data['error'] = "Email Already Exit";
					else $data['error'] = "Password Confirmation Not Match";
				}
				else {
					$insert = array( "fullname" => $name, "email" => $email, "password" => md5( $password ));
					$this->db->insert( "user", $insert );
					$insert_id = $this->db->insert_id();
					$this->session->set_userdata( array( "user" => $insert_id, "email" => $email ));
					redirect( "user/index" );
				}
			}
			$data['submit_type'] = $submit_type; 
		}
		
		$data['menu_active'] = "home";
		$this->load->view('header', $data);
		$this->load->view('home/user_view');
		$this->load->view('footer');
	}
	
	public function randomAlphaNum($length)
	{
		$rangeMin = pow(36, 1); 
		$rangeMax = pow(36, $length-1); 
		$base10Rand = mt_rand($rangeMin, $rangeMax); 
		$newRand = base_convert($base10Rand, 10, 36); 
		return $newRand; 
	}
	
	
}
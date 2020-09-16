<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_password extends MyAdmin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model( "core_model" );
	}
	
	public function index( $offset = 0 )
	{
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header',$data);
		$this->load->view('admin_password/index_view');
		$this->load->view('admin_footer');
	}
	
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_payment extends MyAdmin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model( "core_model" );
	}
	
	public function index( $offset = 0 )
	{
		$data['array'] = array();
		$this->db->select( "*" );
		$this->db->from( "payment" );
		$this->db->order_by( 'date_time', 'desc' );
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
			
			$this->db->select( "payment.*, user.fullname, user.email, user.phone_no" );
			$this->db->from( "payment" );
			$this->db->join( "user", "payment.id_user = user.id", "left" );
			$this->db->order_by('payment.date_time', 'desc');
			$this->db->limit( $config['per_page'], $offset );
			$query = $this->db->get();
			
			foreach( $query->result() as $row ) $rows[] = $row;
			$data['array'] = $rows;
			
		}
		
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header',$data);
		$this->load->view('admin_payment/index_view');
		$this->load->view('admin_footer');
	}
	
}
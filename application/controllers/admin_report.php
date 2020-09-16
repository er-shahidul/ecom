<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_report extends MyAdmin_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->load->model( "core_model" );
	}
	
	public function index( $offset = 0 )
	{		
		$data['array'] = array();
		$this->db->select( "*" );
		$this->db->from( "report" );
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
			$this->db->from('report');
			$this->db->limit( $config['per_page'], $offset );
			$query = $this->db->get();
			
			foreach( $query->result() as $row ) $rows[] = $row;
			$data['array'] = $rows;			
		}
		
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header',$data);
		$this->load->view('admin_report/index_view');
		$this->load->view('admin_footer');
	}
	
	public function delivery( $offset = 0 )
	{		
		$info = $rows = array();
		$this->db->select( "*" );
		$this->db->from( "payment" );
		$this->db->where( "delivery", "Home Delivery" );
		$query = $this->db->get();
		if( $query->num_rows > 0 )
		{
			if( $this->uri->segment(4) > 0 ) {
				$this->db->where( "id_payment", $this->uri->segment(4) );
				$this->db->update( "delivery", array( "delivered" => $this->uri->segment(5) ));
				$this->session->set_flashdata('flashSuccess', 'Update Successfully');
				
				if( $this->uri->segment(5) == "Delivered" ) {
					$this->db->where( "id_payment", $this->uri->segment(4) );
					$this->db->update( "sales", array( "sales" => "Sold" ));
					
					$this->db->where( "id", $this->uri->segment(4) );
					$this->db->update( "payment", array( "payment" => "Paid" ));
				}
				
				else if( $this->uri->segment(5) == "Returned" || $this->uri->segment(5) == "Canceled" ) {
					$this->db->where( "id_payment", $this->uri->segment(4) );
					$this->db->update( "sales", array( "sales" => "Canceled" ));
					
					$this->db->where( "id", $this->uri->segment(4) );
					$this->db->update( "payment", array( "payment" => "Denied" ));
				}
			}
			
			$this->load->library('pagination');
			$total_row = $query->num_rows;
		
			$config['base_url'] = base_url().'/'.$this->router->fetch_class().'/index';
			$config['total_rows'] = $total_row;
			$config['per_page'] = 20;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			
			$this->db->select('payment.*, sales.id_product, sales.id_payment as payment_id, delivery.*');
			$this->db->from( "payment" );
			$this->db->join( "sales", "sales.id_payment = payment.id", "left" );
			$this->db->join( "delivery", "delivery.id_payment = payment.id", "left" );
			$this->db->where( "payment.delivery", "Home Delivery" );
			$this->db->limit( $config['per_page'], $offset );
			$query = $this->db->get();
			
			foreach( $query->result() as $row ) {
				$rows[$row->payment_id] = $row;
				$this->db->select( "*" );
				$this->db->from( "product" );
				$this->db->where( "id IN ( $row->id_product )" );
				$result = $this->db->get();
				foreach( $result->result() as $item ) {
					$info[$row->id][] = $item;
				}
			}	
		}
		
		$data['offset'] = $offset;
		$data['array'] = $rows;
		$data['info'] = $info;
		$data['sl'] = $offset * 20;
		
		$data['title'] = $this->get_contents->get_title();
		$data['category'] = $this->core_model->get_rows_id_name( "category", "category_name" );
		$data['subcategory'] = $this->core_model->get_rows_id_name( "subcategory", "subcategory_name" );
		
		$this->load->view('admin_header',$data);
		$this->load->view('admin_report/delivery_view');
		$this->load->view('admin_footer');
	}
	
}

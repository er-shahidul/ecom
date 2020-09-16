<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Get_contents {
	
	public function get_content()
	{
		$CI =& get_instance();
		$CI->load->database();		

		$CI->db->select('*');
		$CI->db->from('cms');
		$CI->db->where('id', 5);
		$query = $CI->db->get();		

		if( $query->num_rows() > 0 )
		{
			$result = $query->result();
			return $result[0]->content;
		}
		else return '';
	}

	public function get_title()
	{
		$CI =& get_instance();
		$CI->load->database();	

		$CI->db->select('title');
		$CI->db->from('setting');
		$CI->db->where('id', 1);
		$query = $CI->db->get();		

		if( $query->num_rows() > 0 )
		{
			$result = $query->result();
			return $result[0]->title;
		}
		else return '';

	}

	public function get_admins()
	{
		$CI =& get_instance();
		$CI->load->database();	

		$CI->db->select('*');
		$CI->db->from('employee');
		$query = $CI->db->get();		

		if( $query->num_rows() > 0 )
		{
			foreach( $query->result() as $row ) $rows[$row->id] = $row->firstname . " " . $row->lastname;
			return $rows;
		}
		else return '';

	}

	public function get_cart_items()
	{
		$CI =& get_instance();
		if( $CI->session->userdata('cart') )
		{
			$cart = $CI->session->userdata('cart');
			$i = 0;
			foreach( $cart as $item ) $i += $item['qty'];
			return $i;
		}
		else return 0;

	}

	public function get_data_items( $table, $field = "", $serach = "", $select = "*", $order_by = "", $order_type = "ASC", $limit = 0, $active = "", $check = "" )
	{
		$CI =& get_instance();
		$CI->load->database();	

		$CI->db->select( "$select" );
		$CI->db->from( "$table" );
		if( $active != "" && $check != "" )$CI->db->where( "$active", "$check" );
		if( $field != "" && $serach != "" ) $CI->db->where( "$field", "$serach" );
		if( $order_by != "" ) $CI->db->order_by( "$order_by", "$order_type" );
		if( $limit > 0 ) $CI->db->limit( $limit );
		$query = $CI->db->get();		

		if( $query->num_rows() > 0 )
		{
			foreach( $query->result() as $row ) $rows[] = $row;
			return $rows;
		}
		else return '';

	}

}


<?php
class Core_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}	
	
	public function get_row_info($table,$filed,$search,$get)
	{
		$this->db->select($get);
		$this->db->from($table);
		$this->db->where($filed, $search);
		$query =$this->db->get();
		if($query->num_rows() > 0)
		{
			$result = $query->result();
			if( $get != '*' ) return $result[0]->$get;
			else return $result[0];
		}
		else return '';
	}	
	
	public function get_rows( $table, $filed = '', $search = '', $get = '*', $order_field = '', $order_by = 'asc', $limit = '', $active = '', $check = '' )
	{
		$this->db->select($get);
		$this->db->from($table);
		if( $active != '' ) $this->db->where( $active, $check);
		if(  $filed != '' && $search != '' ) $this->db->where($filed,$search);
		if( $order_field != '' ) $this->db->order_by($order_field,$order_by);
		if( $limit != '' ) $this->db->limit($limit);
		$query = $this->db->get();
		if( $query->num_rows() > 0 )
		{
			if( $get == '*' ) 
			{
				foreach( $query->result() as $row ) $rows[] = $row;
			}
			else
			{
				foreach( $query->result() as $row ) $rows[] = $row->$get;
			}
			return $rows;
		}
		else return '';
	}
	
	public function get_rows_id_name( $table, $name )
	{
		$this->db->select("id, $name");
		$this->db->from($table);
		$this->db->where( 'active !=', 2 );
		$query = $this->db->get();
		if( $query->num_rows() > 0 )
		{
			foreach( $query->result() as $row ) $rows[$row->id] = $row->$name;
			return $rows;
		}
		else return '';
	}
	
	public function get_rows_by_id_array( $table, $search, $get )
	{
		$this->db->select($get);
		$this->db->from($table);
		$this->db->where( "id IN ( $search )" );
		$this->db->where( 'active', '1');
		$query = $this->db->get();
		if( $query->num_rows() > 0 )
		{
			foreach( $query->result() as $row ) $rows[] = $row->$get;
			return implode( ', ', $rows );
		}
		else return '';
	}
	
	public function get_row_id_by_name( $table, $name )
	{
		$this->db->select("id");
		$this->db->from($table);
		$this->db->where( $table . '_name', $name );
		$this->db->where( 'active !=', 2 );
		$query = $this->db->get();
		if( $query->num_rows() > 0 )
		{
			$result = $query->result();
			return $result[0]->id;
		}
		else {
			$data = array(
				$table. "_name"		=> $name,
				"create_date"		=> time(),
				"create_by"			=> $this->session->userdata( "id_admin" ),
				"update_date"		=> time(),
				"update_by"			=> $this->session->userdata( "id_admin" )
			);
			$this->db->insert( $table, $data);
			return $this->db->insert_id();
		}
	}
	
	public function count_row_no( $table, $filed = '', $search = '', $get = '*', $order_field = '', $order_by = 'asc', $limit = '', $active = '', $check = '', $group_by = '' )
	{
		$this->db->select($get);
		$this->db->from($table);
		if( $active != '' ) $this->db->where( $active, $check);
		if(  $filed != '' && $search != '' ) $this->db->where($filed,$search);
		if( $order_field != '' ) $this->db->order_by($order_field,$order_by);
		if( $group_by != '' ) $this->db->group_by($group_by);
		if( $limit != '' ) $this->db->limit($limit);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
}
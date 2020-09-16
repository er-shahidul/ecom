<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	public function index()
	{			
		if($this->session->userdata('id_admin') !='' )
		{
			redirect('admin/dashboard');
		}
		else {
			if( $this->session->userdata( "massage" ))
			{
				$data['massage'] = $this->session->userdata( "massage" );
				$this->session->unset_userdata( "massage" );
			}
			$data['title'] = $this->get_contents->get_title();
			$this->load->view('admin/login_view',$data);	
		}
	}
	
	public function login_action()
	{		
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->where('email', $_REQUEST['username']);
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		$result = $query->result();
		if( $num_rows > 0 && md5( $_REQUEST['password'] ) == $result[0]->password ){
			$this->session->set_userdata( 'id_admin',$result[0]->id );
			$this->session->set_userdata( 'admin_email', $_REQUEST['username'] );
			$this->session->set_userdata( 'admin_name', $result[0]->firstname . " " . $result[0]->lastname );
			redirect('admin/dashboard');
		}
		else
		{
			$massage = $num_rows > 0 ? "Password doesn't match with email." : "Invalid email address entered.";
			$this->session->set_userdata( array( "massage" => $massage ));
			redirect('admin/index');
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
	
	public function dashboard()
	{			
		if( $this->session->userdata('id_admin') == '' ) redirect('admin');
		$data['title'] = $this->get_contents->get_title();
		$this->load->view('admin_header',$data);
		$this->load->view('admin/dasboard_view');
		$this->load->view('admin_footer');
	}
	
	public function check_items()
	{			
		$this->load->model( "core_model" );
		
		$album = $this->core_model->get_rows_id_name( "album", "album_name" );
		$songs = $this->core_model->get_rows( "song", "", "", "*", "", "", "", "active !=", 2 );
		foreach( $songs as $song ) {
			$album_name = $album[$song->id_album];
			if( $song->phy_path != "" ) {
				if( !file_exists( "assets/song/$song->phy_path" )) {
					$this->db->where( 'id', $song->id );
					$this->db->update('song', array( "phy_path" => "" ));
					echo "<a href='" .base_url() . "admin_song/edit/$song->id' target='_blank'>$song->id. $album_name - $song->song_name - Play File</a><br/>";
				}
			}
			else echo "<a href='" .base_url() . "admin_song/edit/$song->id' target='_blank'>$song->id. $album_name - $song->song_name - Play File</a><br/>";
			if( $song->phy_path2 != "" ) {
				if( !file_exists( "itamsongdownloadfilessotredhere/$song->phy_path2" )) {
					$this->db->where( 'id', $song->id );
					$this->db->update('song', array( "phy_path2" => "" ));
					echo "<a href='" .base_url() . "admin_song/edit/$song->id' target='_blank'>$song->id. $album_name - $song->song_name - Download File</a><br/>";
				}
			}
			else echo "<a href='" .base_url() . "admin_song/edit/$song->id' target='_blank'>$song->id. $album_name - $song->song_name - Download File</a><br/>";
		}
	}
	
}

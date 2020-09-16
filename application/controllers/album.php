<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Album extends My_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model( "core_model" );
	}
	
	public function index( $id = 0, $sid = 0 )

	{	
		if( $id == 0 ) redirect('home');
		$this->db->select('album.*,category.category_name,genre.genre_name');
		$this->db->from('album');
		$this->db->join('category', 'album.id_category = category.id', 'LEFT');
		$this->db->join('genre', 'album.id_genre = genre.id', 'LEFT');
		$this->db->where('album.id',$id);
		$this->db->where('album.active',1);
		$query = $this->db->get();
		if( $query->num_rows() > 0 ){
			$result = $query->result();
			$data['album'] = $result[0];
			
			$data['songlist'] = $this->core_model->get_rows('song','id_album',$id,'*','','','','active','1');
			$data['artist'] = $this->core_model->get_rows_id_name( 'artist', 'artist_name' );
			$data['genre'] = $this->core_model->get_rows_id_name( 'genre', 'genre_name' );
			$data['composer'] = $this->core_model->get_rows_id_name( 'composer', 'composer_name' );
			$data['lyricist'] = $this->core_model->get_rows_id_name( 'lyricist', 'lyricist_name' );
			$data['other_album'] = $this->core_model->get_rows( 'album', 'id_genre', $data['album']->id_genre, '*', 'id', 'DESC', '', 'active', 1 );
			
			if( $sid > 0 ) {
				$segment = false;
				if( $this->uri->segment(5) == "track" ) $segment = true;
				$data['songs'] = $this->core_model->get_rows( "song", ( "id" . ( $segment == false ? "_album" : "" ) ), $sid, "*", '', '', '', 'active', 1 );
				$data['album_phy_path'] = $this->core_model->get_row_info( "album", "id", $data['songs'][0]->id_album, "phy_path" );
				if( isset( $_REQUEST['song_id'] ) && count ( $_REQUEST['song_id'] ) > 0 ) $data['selected_songs'] = $_REQUEST['song_id'];
			}
			else if( $this->uri->segment(6) != "" ) {
				$id_arr = $this->uri->segment(6);
				$id_arr = str_replace( "-", ",", $id_arr );
				$this->db->select( "*" );
				$this->db->from( "song" );
				$this->db->where( "id IN ( $id_arr )" );
				$this->db->where( "active", 1 );
				$query = $this->db->get();
				if( $query->num_rows() > 0 ) {
					foreach( $query->result() as $row ) $data['songs'][] = $row;
					$data['album_phy_path'] = $this->core_model->get_row_info( "album", "id", $data['songs'][0]->id_album, "phy_path" );
				}
			}
			
			$this->load->view('header',$data);
			if(( $sid > 0 || isset( $data['songs'][0] )) && ( $data['album']->type == "Music" || $data['album']->type == "Instrumental" )) $this->load->view('play_view');
			$this->load->view('album/index_view');
			$this->load->view('footer');
		}
	}
	
	public function add_track_to_cart()
	{
		if( $this->uri->segment(4) != "" ) {
			$id_arr = $this->uri->segment(4);
			$id_arr = explode( "-", $id_arr );
			$cart_add = $cart = $this->session->userdata( "cart" );
			if( isset( $cart[0]['delivery'] ) && $cart[0]['delivery'] != "download" ) redirect( "cart" );
			$delivery = "download";
			foreach( $id_arr as $id )
			{
				$set = true;
				if( $cart != '' && count( $cart ) > 0 ) {
					foreach( $cart as $i => $val ) {
						if( $val['type'] == "song" && $val['id'] == $id ) {
							$set = false;
							break;
						}
					}
				}
				if( $id > 0 && $set == true ) {
					$check = $this->core_model->get_row_info( "song", "id", $id, "phy_path2" );
					if( $check != "" ) $cart_add[] = array( "id" => $id, "type" => "song", "qty" => 1,  "delivery" => $delivery );
				}
			}
			$this->session->set_userdata( "cart", $cart_add );
			redirect( "cart" );
		}
		else redirect( "album/index/" . $this->uri->segment(3) );
	}
	
}
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();

	}

}

class MyAdmin_Controller extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_admin'))
		{
			redirect('admin');
		}
	}
	
}

class MyUser_Controller extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user'))
		{
			redirect('home/');
		}

	}

}
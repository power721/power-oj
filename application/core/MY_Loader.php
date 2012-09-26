<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

	public function __construct()
	{
		parent::__construct();
	}

	public function page_view($view, $vars = array(), $return = FALSE)
	{
		parent::view('templates/header', $vars, $return);
        parent::view('templates/menu', $vars, $return);
        parent::view($view, $vars, $return);
        parent::view('templates/footer', $vars, $return);
	}
}

/* End of file Loader.php */
/* Location: ./application/core/MY_Loader.php */
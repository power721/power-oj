<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OJ_Exceptions extends CI_Exceptions {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function access_denied($page = '', $log_error = TRUE)
	{
		$heading = "Access denied";
		$message = "You are not authorized to access this page.";

		// By default we log this, but allow a dev to skip it
		if ($log_error)
		{
			log_message('error', 'Access denied --> '.$page);
		}

		echo $this->show_error($heading, $message, 'access_denied', 403);
		exit;
	}
}

/* End of file OJ_Exceptions.php */
/* Location: ./application/core/OJ_Exceptions.php */
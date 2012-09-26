<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('pagination');
  }
  
  public function index()
  {
    
  }
}

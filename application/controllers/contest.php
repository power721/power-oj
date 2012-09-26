<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contest extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('pagination');
  }
  
  public function recent()
  {
    $json = @file("http://contests.acmicpc.info/contests.json");
    if(empty($json[0]))
    {
      show_error("Can't fetch data from remote server.");
    }
    $contests = json_decode($json[0]);
    
    $data['title'] = 'Recent Contests';
    $data['contests'] = $contests;
    
    $this->load->page_view('contest/recent',$data);
  }
}

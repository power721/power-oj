<?php

class Pages extends CI_Controller
{
  /*public function Pages()
  {
    parent::__construct();
    //$this->load->helper('url');
  }*/
  
  public function view($page = 'home')
  {
    if(!file_exists('application/views/pages/'.$page.'.php'))
    {
      show_404();
    }
    
    $data['title'] = ucfirst($page);
    
    $this->load->view('templates/header',$data);
    $this->load->view('templates/menu',$data);
    $this->load->view('pages/'.$page,$data);
    //$this->output->enable_profiler(true);
    $this->load->view('templates/footer',$data);
  }
}
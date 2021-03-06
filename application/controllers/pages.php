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
      //$_error =& load_class('Exceptions', 'core');
      //$_error->access_denied($page);
      show_404();
    }
    
    $data['title'] = ucfirst($page);
    if($page == 'faq')
      $data['title'] = 'Frequently Asked Questions';
    $this->load->page_view('pages/'.$page,$data);
    //$this->output->enable_profiler(true);
  }

}
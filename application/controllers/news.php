<?php

class News extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('news_model');
  }
  
  public function index()
  {
    $data['news'] = $this->news_model->get_news();
    $data['title'] = 'News Archive';
    
    $this->load->view('templates/header',$data);
    $this->load->view('templates/menu',$data);
    $this->load->view('news/index',$data);
    $this->load->view('templates/footer',$data);
    $this->output->enable_profiler(true);
  }
  
  public function view($slug)
  {
    $data['news_item'] = $this->news_model->get_news($slug);
    
    if (empty($data['news_item']))
    {
      show_404();
    }
    
    $data['title'] = $data['news_item']['title'];
    
    $this->load->view('templates/header',$data);
    $this->load->view('templates/menu',$data);
    $this->load->view('news/view',$data);
    $this->load->view('templates/footer',$data);
    $this->output->enable_profiler(true);
  }
  
  public function create()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');
    
    $data['title'] = 'Create a news item';
    
    $this->form_validation->set_rules('title','title','required');
    $this->form_validation->set_rules('text','text','required');
    
    if($this->form_validation->run() === FALSE)
    {
      $this->load->view('templates/header',$data);
      $this->load->view('templates/menu',$data);
      $this->load->view('news/create',$data);
      $this->load->view('templates/footer',$data);
    }
    else
    {
      $this->news_model->set_news();
      $this->load->view('news/success');
    }
  }
}
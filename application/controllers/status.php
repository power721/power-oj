<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('pagination');
    $this->load->model('status_model');
  }
  
  public function index($offset = '')
  {
    $limit = 20;
    $total = $this->status_model->count_solutions();

    $this->load->helper('date');
    $this->load->library('page');
    $page_config['per_page'] = $limit;   //每页条数
    $page_config['num_links'] = 5;      //当前页前后链接数量
    $page_config['base_url'] = 'status/list';//url
    $page_config['total_rows'] = $total;
    $this->page->initialize($page_config);

    $data['solutions'] = $this->status_model->get_solutions($limit, ($offset - 1) * $limit);
    $data['title'] = 'Status List';
    
    $this->load->page_view('status/list',$data);
    $this->output->enable_profiler(true);
  }
}

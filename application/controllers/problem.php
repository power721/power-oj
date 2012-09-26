<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Problem extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('pagination');
    $this->load->model('problem_model');
  }
  
  public function index($offset = '')
  {
    $limit = 50;
    $total = $this->problem_model->count_problems();
    
    $this->load->library('page');
    $page_config['per_page'] = $limit;   //每页条数
    $page_config['cur_page'] = $offset;
		//$page_config['num_links'] = 5;  //当前页前后链接数量
		$page_config['base_url'] = 'problem/list';//url
		$page_config['total_rows'] = $total;
		$this->page->initialize($page_config);
		
    $data['problems'] = $this->problem_model->get_problems($limit, ($offset-1)*$limit);
    $data['title'] = 'Problems List';
    
    $this->load->page_view('problem/list',$data);
    
    $this->output->enable_profiler(true);
  }
  
  public function view($pid)
  {
    if (empty($pid))
    {
      show_404();
    }
    
    //权限控制？
    $problem = $this->problem_model->get_problem($pid);
    if (empty($problem))
    {
      show_404();
    }
    
    $data['problem'] = $problem;
    $data['title'] = $problem->problem_id.':'.$problem->title;
    
    $this->load->page_view('problem/view',$data);
    $this->output->enable_profiler(true);
    
    $this->problem_model->add_view_count($pid,$problem->view);
  }

  public function status($pid)
  {

  }

  public function submit($pid)
  {
    
  }
}
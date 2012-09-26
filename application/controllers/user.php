<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('pagination');
    $this->load->model('user_model');
  }
  
  public function index($offset = '')
  {
    $limit = 50;
    $total = $this->user_model->count_users();
    
    $this->load->library('page');
    $page_config['per_page'] = $limit;   //每页条数
    $page_config['num_links'] = 5;      //当前页前后链接数量
    $page_config['base_url'] = 'user/list';//url
    $page_config['total_rows'] = $total;
    $this->page->initialize($page_config);

    $data['users'] = $this->user_model->get_users($limit, ($offset - 1) * $limit);
    $data['title'] = 'User List';
    
    $this->load->page_view('user/list',$data);
  }
  
  public function view($uid)
  {
    
  }
  
  
  public function signup()
  {
    
  }
  
  public function login()
  {
    if($this->session->userdata('user'))
    {
      //如果已经登录，返回首页
      redirect(base_url());
    }
    
    $this->load->helper('form');
    $this->load->library('form_validation');
    
    $data['title'] = 'Login';
    
    $this->form_validation->set_rules('name','name','required|trim|callback_authenticate');
    $this->form_validation->set_rules('pass','pass','required|trim');

    if($this->form_validation->run() === FALSE)//验证失败
    {
      sleep(1);
      $this->load->page_view('user/login',$data);
      $this->output->enable_profiler(true);
    }
    else
    {
      //$this->session->set_flashdata('messages', array('You are login successfully.'));
      redirect(base_url());
    }
  }
   
  public function logout()
  {
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('uid');
    //$this->session->set_flashdata('messages', array('You are logout successfully.'));
    $this->user_model->logout();
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function authenticate()
  {
    /*$name = $this->input->post('name',TRUE);
    $user = $this->user_model->user_exists($name);
    if(!$user)
    {
      $this->form_validation->set_message('authenticate','The user is not exists.');
      return FALSE;
    }*/
    $user = $this->user_model->login();
    if($user)
      return TRUE;
    $this->form_validation->set_message('authenticate','Invalid login. Please try again.');
    return FALSE;
  }
}
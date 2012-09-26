<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
  public function User()
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
    
    $this->load->view('templates/header',$data);
    $this->load->view('templates/menu',$data);
    $this->load->view('user/list',$data);
    $this->load->view('templates/footer',$data);
  }
  
  public function view()
  {
    
  }
  
  
  public function register()
  {
    
  }
  
  public function login()
  {
    if($this->session->userdata('user'))
    {
      //$this->session->unset_userdata('user');
      redirect(base_url());
    }
    
    $this->load->helper('form');
    $this->load->library('form_validation');
    
    $data['title'] = 'Login';
    
    $this->form_validation->set_rules('name','name','required');
    $this->form_validation->set_rules('pass','pass','required');
    
    if($this->form_validation->run() === FALSE)
    {
      //验证失败
      $this->load->view('templates/header',$data);
      $this->load->view('templates/menu',$data);
      $this->load->view('user/login',$data);
      $this->load->view('templates/footer',$data);
    }
    else
    {
      $user = $this->user_model->login();
      
      if($user)//登录成功
      {
        $this->session->set_flashdata('messages', array('You are login successfully.'));
        redirect('/');
        echo "Login sucess";
      }
      else//登录失败
      {
        $this->form_validation->set_message('password_check', '用户名或密码不正确');
        echo "Login faild";
      }
    }
  }
   
  public function logout()
  {
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('uid');
    $this->session->set_flashdata('messages', array('You are logout successfully.','test.'));
    redirect($_SERVER['HTTP_REFERER']);
  }
}
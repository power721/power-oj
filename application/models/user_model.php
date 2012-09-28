<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
  private static $user;

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  
  public static function user()
  {
    if(!isset(self::$user))
    {//检查user 对象是否已经存在，如果不存在
      $CI =& get_instance();
      if (!$uid = $CI->session->userdata('uid'))
      {
        return FALSE;
      }
      if (!$u = $this->get_user($uid))
      {
        return FALSE;
      }
      self::$user = $u;//user对象保存到静态变量$user
    }
    return self::$user;
  }

  public function count_users()
  {
    return $this->db->count_all('users');
  }
  
  public function get_users($limit = 50, $offset = 0)
  {
    $this->db->limit($limit,$offset);
    $query = $this->db->get('users');
    return $query->result();
  }
  
  public function get_user($uid)
  {
    $query = $this->db->get_where('users',array('uid' => $uid));
    return $query->row();
  }
  
  public function get_user_by_name($name)
  {
    $query = $this->db->get_where('users',array('name' => $name));
    return $query->row();
  }

  public function user_exists($username)
  {
    $query = $this->db->get_where('users',array('name' => $username));
    return $query->num_rows() !== 0;
  }

  public function login()
  {
    $username = $this->input->post('username',TRUE);
    $password = $this->input->post('password',TRUE);
    
    return $this->login_user($username, $password);
  }
  
  public function logout()
  {
    self::$user = FALSE;
  }

  public function login_user($username, $password)
  {
    $query  = $this->db->get_where('users',array('name' => $username, 'pass' => md5($password)));
    $user   = $query->row();
    if($user)
    {
      $data = array('login' => REQUEST_TIME);
      $this->db->where('uid', $user->uid);
      $this->db->update('users', $data);
      
      $data = array('user'=>$user->name,'uid'=>$user->uid);
      $this->session->set_userdata($data);
      log_message('info', 'User '.$username.' login successed.');
    }
    else
    {
      log_message('info', 'User '.$username.' login failed.');
    }
    self::$user = $user;
    return $user;
  }
  
  public function loginlog()
  {
    
  }

  public function signup()
  {
    $username = $this->input->post('username',TRUE);
    $password = $this->input->post('password',TRUE);
    $email = $this->input->post('email',TRUE);

    if(!$username || !$password || !$email)
    {
      log_message('error', 'user\'s data is incorrect.');
      return FALSE;
    }

    $data = array
    (
      'name' => $username,
      'pass' => md5($password),
      'mail' => $email,
      'create' => REQUEST_TIME,
      //'access' => REQUEST_TIME,
      //'login' => REQUEST_TIME,
    );

    if(!$this->db->insert('users', $data))
    {
      log_message('error', 'Can\'t insert data to db table users.');
      return FALSE;
    }
    return $this->login_user($username, $password);
  }

  public function get_user_problems($uid)
  {
    $this->db->distinct();
    $this->db->select('pid');
    $this->db->order_by('pid');
    $query = $this->db->get_where('solution',array('uid' => $uid,'result' => 0));
    
    return $query->result();
  }
}

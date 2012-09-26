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
  
  public function user_exists($username)
  {
    $query = $this->db->get_where('users',array('name' => $username));
    return $query->row();
  }

  public function login()
  {
    $name = $this->input->post('name',TRUE);
    $pass = $this->input->post('pass',TRUE);
    
    $query  = $this->db->get_where('users',array('name' => $name, 'pass' => md5($pass)));
    $user   = $query->row();
    if($user)
    {
      $data = array('login' => REQUEST_TIME);
      $this->db->where('uid', $user->uid);
      $this->db->update('users', $data);
      
      $data = array('user'=>$user->name,'uid'=>$user->uid);
      $this->session->set_userdata($data);
      //login log?
    }
    else
    {
      //login log
    }
    self::$user = $user;
    return $user;
  }
  
  public function logout()
  {
    self::$user = FALSE;
  }

  public function login_user($name, $pass)
  {
    $query = $this->db->get_where('users',array('name' => $name, 'pass'=>md5($pass)));
    return $query->row();
  }
  
  public function loginlog()
  {
    
  }

  public function signup()
  {

  }
}

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  
  public function count_solutions()
  {
    return $this->db->count_all('solution');
  }
  
  public function get_solutions($limit = 20, $offset = 0)
  {
    $this->db->order_by('sid','desc');
    $this->db->limit($limit,$offset);
    $query = $this->db->get('solution');
    return $query->result();
  }
  
  public function get_solution($sid)
  {
    $query = $this->db->get_where('solution',array('sid' => intval($sid)));
    return $query->row();
  }

  public function get_user_problems($uid)
  {
    $query = $this->db->distinct()->select('pid')->order_by('pid')->get_where('solution',array('uid' => $uid,'result' => 0));
    return $query->result();
  }
}

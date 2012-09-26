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
    return $this->db->count_all('solutions');
  }
  
  public function get_solutions($limit = 20, $offset = 0)
  {
    $this->db->limit($limit,$offset);
    $query = $this->db->get('solutions');
    return $query->result();
  }
  
  public function get_solution($sid)
  {
    $query = $this->db->get_where('solutions',array('sid' => $sid));
    return $query->row();
  }
  
}

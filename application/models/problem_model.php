<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Problem_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  
  public function count_problems()
  {
    return $this->db->count_all('problems');
  }
    
  public function get_problems($limit = 50, $offset = 0)
  {
    $this->db->limit($limit,$offset);
    $query = $this->db->get('problems');
    return $query->result();
  }
  
  public function get_problem($pid = 1000)
  {
    $query = $this->db->get_where('problems',array('problem_id' => intval($pid)));
    return $query->row();
  }
  
  public function get_tags($pid = 1000)
  {
    $query = $this->db->get_where('tag',array('problem_id' => intval($pid)));
    return $query->row();
  }
  
  public function add_view_count($pid = 1000, $views = 0)
  {
    $data = array('view' => intval($views)+1);
    $this->db->where('problem_id', intval($pid));
    $this->db->update('problems', $data); 
  }
}
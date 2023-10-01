<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class My_model extends CI_Model{
	
	public function row($where,$table){
		return $this->db->where($where)->get($table)->row();
	}
	public function insert($data,$table){				
		$this->db->insert($table,$data);			
		return $this->db->insert_id();
		
	}
	public function update($data,$where,$table){
		$this->db->where($where);
		$this->db->update($table, $data);
		
	}
	public function getAll($table){
		return $this->db->get($table)->result();
	}
	public function delete($where,$table){
		
		$this->db->where($where);
		$this->db->delete($table);
	}
}//end class
	
<?php 
	defined('BASEPATH') OR exit('ERROR');
	class Status extends CI_Model{

		public function getStatus(){
			$this->db->select('*');
			$this->db->from('status');
			$this->db->order_by('level','desc');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function setStatus($id,$level){
			$t = date("Y-m-d H:i:s",now());
			$sql = "UPDATE status SET level=".$level." , time='".$t."' WHERE id=".$id;
			$this->db->query($sql);
			echo $sql;
		}

		public function getId($id){
			$this->db->select('*');
			$this->db->from('status');
			$this->db->where('id',$id);
			$query = $this->db->get();
			return $query->result_array();	
		}
	}
?>
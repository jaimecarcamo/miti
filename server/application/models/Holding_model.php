<?php
class Holding_model extends CI_Model{ 
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){
		if(!is_null($id)){
			$this->db->select("h.*");
			$this->db->from('holding h');
			$this->db->where('id_holding', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("h.*");
		$this->db->from('holding h');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}
	private function _setHolding($holding){
		return array(
			'name' => $holding['name']
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($holding){
		$this->db->select("nombre_area, cantidad_area, id_estado_fk, id_tipo_centro");
		$this->db->from('centro_cultivo');
		$this->db->where('nombre_area', $holding['name']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($holding){
		$this->db->set($this->_setArea($holding))->insert('centro_cultivo');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($holding){
		$id = $holding['id'];
		$this->db->set($this->_setArea($holding))->where('id_c_cultivo', $id)->update('centro_cultivo');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_c_cultivo', $id)->delete('centro_cultivo');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
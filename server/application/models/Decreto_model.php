<?php
class Decreto_model extends CI_Model{  
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){
		if(!is_null($id)){
			$this->db->select("d.*");
			$this->db->from('decreto d');
			$this->db->where('id_decreto', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("d.*");
		$this->db->from('decreto d');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}
	private function _setDecreto($decreto){
		return array(
			'name' => $decreto['name']
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($decreto){
		$this->db->select("nombre_area, cantidad_area, id_estado_fk, id_tipo_centro");
		$this->db->from('centro_cultivo');
		$this->db->where('nombre_area', $decreto['name']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($decreto){
		$this->db->set($this->_setArea($decreto))->insert('centro_cultivo');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($decreto){
		$id = $decreto['id'];
		$this->db->set($this->_setArea($decreto))->where('id_c_cultivo', $id)->update('centro_cultivo');
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
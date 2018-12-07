<?php
class Concesion_model extends CI_Model{ 
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){
		if(!is_null($id)){
			$this->db->select("c.*");
			$this->db->from('concesion c');
			$this->db->where('id_concesion', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("c.*");
		$this->db->from('concesion c');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}
	private function _setConcesion($concesion){
		return array(
			'name' => $concesion['name']
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($concesion){
		$this->db->select("nombre_area, cantidad_area, id_estado_fk, id_tipo_centro");
		$this->db->from('centro_cultivo');
		$this->db->where('nombre_area', $concesion['name']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($concesion){
		$this->db->set($this->_setArea($concesion))->insert('centro_cultivo');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($concesion){
		$id = $concesion['id'];
		$this->db->set($this->_setArea($concesion))->where('id_c_cultivo', $id)->update('centro_cultivo');
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
<?php
class Tipoarea_model extends CI_Model{ 
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){
		if(!is_null($id)){
			$this->db->select("ta.*");
			$this->db->from('tipo_area ta');
			$this->db->where('id_tipo_area', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("ta.*");
		$this->db->from('tipo_area ta'); 
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}
	private function _setTcentro($t_area){
		return array(
			'name' => $t_area['name']
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($t_area){
		$this->db->select("nombre_area, cantidad_area, id_estado_fk, id_tipo_centro");
		$this->db->from('centro_cultivo');
		$this->db->where('nombre_area', $t_centro['name']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($t_area){
		$this->db->set($this->_setArea($t_area))->insert('centro_cultivo');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($t_area){
		$id = $t_area['id'];
		$this->db->set($this->_setArea($t_area))->where('id_c_cultivo', $id)->update('centro_cultivo');
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
<?php 
class Persona_model extends CI_Model{ 
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){ 
		if(!is_null($id)){
			$this->db->select("p.*");
			$this->db->from('persona p');
			$this->db->where('id_persona', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("p.*");
		$this->db->from('persona p');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}


	private function _setPersona($persona){
		return array(
			'folio_area' => $persona['folio'],
			'nombre_area' => $persona['nombre'],
			'fecha_inicio' => $persona['fecha_i'],
			'observacion' => $persona['observacion'],
			'id_estado_fk' => $persona['estado'],
			'id_tipo_area_fk' => $persona['tipoarea']
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($persona){
		$this->db->select("nombre");
		$this->db->from('persona');
		$this->db->where('nombre', $persona['nombre']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($persona){
		$this->db->set($this->_setArea($persona))->insert('persona');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($persona){
		$id = $persona['id'];
		$this->db->set($this->_setArea($persona))->where('id_persona', $id)->update('persona');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_persona', $id)->delete('persona');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
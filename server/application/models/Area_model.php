<?php 
class Area_model extends CI_Model{ 
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){ 
		if(!is_null($id)){
			$this->db->select("a.*,e.*,ta.*");
			$this->db->from('area a');
			$this->db->join('estado e', 'a.id_estado_fk=e.id_estado');
			$this->db->join('tipo_area ta', 'a.id_tipo_area_fk=ta.id_tipo_area');
			$this->db->where('id_area', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("a.*,e.*,ta.*");
		$this->db->from('area a');
		$this->db->join('estado e', 'a.id_estado_fk=e.id_estado');
		$this->db->join('tipo_area ta', 'a.id_tipo_area_fk=ta.id_tipo_area');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}


	private function _setArea($area){
		return array(
			'folio_area' => $area['folio'],
			'nombre_area' => $area['nombre'],
			'fecha_inicio' => $area['fecha_i'],
			'observacion' => $area['observacion'],
			'id_estado_fk' => $area['estado'],
			'id_tipo_area_fk' => $area['tipoarea']
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($area){
		$this->db->select("nombre_area");
		$this->db->from('area');
		$this->db->where('nombre_area', $area['nombre']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($area){
		$this->db->set($this->_setArea($area))->insert('area');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($area){
		$id = $area['id'];
		$this->db->set($this->_setArea($area))->where('id_area', $id)->update('area');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_area', $id)->delete('area');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
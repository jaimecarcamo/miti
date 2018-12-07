<?php  
class Embarcacion_model extends CI_Model{ 
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){ 
		if(!is_null($id)){
			$this->db->select("e.*");
			$this->db->from('embarcacion e');
			$this->db->where('id_embarcacion', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("e.*");
		$this->db->from('embarcacion e');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}

	public function getpatente($embarcacion = null){
		if(!is_null($embarcacion)){
			$this->db->select("patente");
			$this->db->from('embarcacion');
			$this->db->where('id_embarcacion', $embarcacion);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		return  null;
	}

	private function _setEmbarcacion($embarcacion){
		return array(
			'folio_area' => $embarcacion['folio'],
			'nombre_area' => $embarcacion['nombre'],
			'fecha_inicio' => $embarcacion['fecha_i'],
			'observacion' => $embarcacion['observacion'],
			'id_estado_fk' => $embarcacion['estado'],
			'id_tipo_area_fk' => $embarcacion['tipoarea']
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($embarcacion){
		$this->db->select("nombre_area");
		$this->db->from('embarcacion');
		$this->db->where('nombre_area', $embarcacion['nombre']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($embarcacion){
		$this->db->set($this->_setArea($embarcacion))->insert('embarcacion');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($embarcacion){
		$id = $embarcacion['id'];
		$this->db->set($this->_setArea($embarcacion))->where('id_embarcacion', $id)->update('embarcacion');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_embarcacion', $id)->delete('embarcacion');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
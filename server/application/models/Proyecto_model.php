<?php
class Proyecto_model extends CI_Model{  
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){ 
		if(!is_null($id)){
			$this->db->select("p.*");
			$this->db->from('proyecto p');
			$this->db->where('id_proyecto', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("p.*");
		$this->db->from('proyecto p');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}

	public function getidsiembra($siembra = null){ 
		if(!is_null($siembra)){
			$this->db->select("nombre_proyecto");
			$this->db->from('proyecto');
			$this->db->where('id_Proyecto', $siembra);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		return  null;
	}

	private function _setCentro($proyecto){
		return array(
			'folio_proyecto' => $proyecto['folio'],
			'nombre_proyecto' => $proyecto['nombre'],
			'fecha_inicio' => $proyecto['fecha_i']
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($proyecto){
		$this->db->select("nombre_proyecto");
		$this->db->from('proyecto');
		$this->db->where('nombre_proyecto', $proyecto['nombre']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($proyecto){
		$this->db->set($this->_setCentro($proyecto))->insert('proyecto');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($proyecto){
		$id = $proyecto['id'];
		$this->db->set($this->_setCentro($proyecto))->where('id_proyecto', $id)->update('proyecto');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_proyecto', $id)->delete('proyecto');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
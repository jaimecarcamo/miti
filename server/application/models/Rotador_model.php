<?php
class Rotador_model extends CI_Model{  
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){ 
		if(!is_null($id)){
			$this->db->select("r.*");
			$this->db->from('rotador r');
			$this->db->where('id_rotador', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("r.*");
		$this->db->from('rotador r');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}

	public function getnrotador($bodega=null){ 
		if(!is_null($bodega)){
			$this->db->where('id_b_producto_fk', $bodega);
			$this->db->from('rotador');
			return $this->db->count_all_results();
			
		}else{
			return false;
		}
		return $this->db->count_all_results('rotador');
	}

	private function _setRotador($rotador){
		return array(
			'folio_rotador' => $rotador['folio'],
			'nombre_rotador' => $rotador['nombre'],
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($rotador){
		$this->db->select("nombre_rotador");
		$this->db->from('rotador');
		$this->db->where('nombre_rotador', $rotador['nombre']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($rotador){
		$this->db->set($this->_setRotador($rotador))->insert('rotador');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($rotador){
		$id = $rotador['id'];
		$this->db->set($this->_setRotador($rotador))->where('id_rotador', $id)->update('rotador');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_rotador', $id)->delete('rotador');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
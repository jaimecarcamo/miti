<?php   
class Muestreo_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){ 
		if(!is_null($id)){
			$this->db->select("m.*,e.id_embarcacion,e.nombre_embarcacion,p.id_persona,p.nombre");
			$this->db->from('muestreo m');
			$this->db->join('embarcacion e', 'm.id_embarcacion_fk=e.id_embarcacion');
			$this->db->join('persona p', 'm.id_persona_fk=p.id_persona');
			$this->db->where('id_muestreo', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("m.*,e.id_embarcacion,e.nombre_embarcacion,p.id_persona,p.nombre");
		$this->db->from('muestreo m');
		$this->db->join('embarcacion e', 'm.id_embarcacion_fk=e.id_embarcacion');
		$this->db->join('persona p', 'm.id_persona_fk=p.id_persona');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}


	public function getstock($centro = null){
		if(!is_null($centro)){
			$this->db->select("cantidad_cuadrante");
			$this->db->from('centro_cultivo');
			$this->db->where('id_centro', $centro);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		return  null;
	}
	//almacena los datos que se van a ocupar de los formularios
	private function _setMuestreo($muestreo){ 
		return array(
			'folio_muestreo' => $muestreo['folio'],
			'fecha' => $muestreo['fecha_i'],
			'hora' => $muestreo['hora'],
			'observacion' => $muestreo['descripcion'],
			'id_embarcacion_fk' => $muestreo['embarcacion'],
			'id_persona_fk' => $muestreo['persona'],
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($centro){
		$this->db->select("nombre_centro");
		$this->db->from('centro_cultivo');
		$this->db->where('id_c_cultivo', $centro['id_c_cultivo_fk']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array(); 
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($muestreo){
		$this->db->set($this->_setMuestreo($muestreo))->insert('muestreo');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($muestreo){
		$id = $muestreo['id'];
		$this->db->set($this->_setMuestreo($muestreo))->where('id_muestreo', $id)->update('muestreo');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_muestreo', $id)->delete('muestreo');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
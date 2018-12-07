<?php    
class Muestra_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){ 
		if(!is_null($id)){
			$this->db->select("m.*, mo.id_muestreo,mo.folio_muestreo,l.id_linea,l.nombre_linea");
			$this->db->from('muestra m');
			$this->db->join('muestreo mo', 'm.id_muestreo_fk=mo.id_muestreo');
			$this->db->join('linea l', 'm.id_linea_fk=l.id_linea');
			$this->db->where('id_muestra', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("m.*, mo.id_muestreo,mo.folio_muestreo,l.id_linea,l.nombre_linea");
		$this->db->from('muestra m');
		$this->db->join('muestreo mo', 'm.id_muestreo_fk=mo.id_muestreo');
		$this->db->join('linea l', 'm.id_linea_fk=l.id_linea');
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
	private function _setMuestra($muestra){ 
		return array(
			'folio_muestreo' => $muestra['folio'],
			'fecha' => $muestra['fecha_i'],
			'hora' => $muestra['hora'],
			'observacion' => $muestra['descripcion'],
			'id_embarcacion_fk' => $muestra['embarcacion'],
			'id_persona_fk' => $muestra['persona'],
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
	public function save($muestra){
		$this->db->set($this->_setMuestra($muestra))->insert('muestra');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($muestra){
		$id = $muestra['id'];
		$this->db->set($this->_setMuestra($muestra))->where('id_muestra', $id)->update('muestra');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_muestra', $id)->delete('muestra');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
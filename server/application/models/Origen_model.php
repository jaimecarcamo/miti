<?php
class Origen_model extends CI_Model{   
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){
		if(!is_null($id)){
			$this->db->select("o.*");
			$this->db->from('origen_semilla o');
			$this->db->where('id_origen', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("o.*");
		$this->db->from('origen_semilla o');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}
	private function _setOrigen($origen){
		return array(
			'folio_o_siembra' => $origen['folio'],
			'fecha_inicio' => $origen['fecha_i'],
			'autorizado' => $origen['autorizado'],
			'emitido' => $origen['emitido'],
			'transporte' => $origen['transporte'],
			'cantidad' => $origen['cantidad'],
			'colector' => $origen['colector'],
			'id_b_siembra_fk' => $origen['bodega'],
			'id_tipo_centro_fk' => $origen['tcentro']
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($origen){
		$this->db->select("folio_o_siembra");
		$this->db->from('orden_siembra');
		$this->db->where('folio_o_siembra', $origen['origen']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($origen){
		$this->db->set($this->_setOrigen($origen))->insert('orden_siembra');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($origen){
		$id = $origen['id'];
		$this->db->set($this->_setOrigen($origen))->where('id_o_siembra', $id)->update('orden_siembra');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_o_siembra', $id)->delete('orden_siembra');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
<?php 
class Ordens_model extends CI_Model{   
	public function __construct(){ 
		parent::__construct();
	}
	public function get($id = null){
		if(!is_null($id)){
			$this->db->select("o.*,b.nombre_b_producto,b.id_b_producto,tc.d_centro");
			$this->db->from('orden_siembra o');
			$this->db->join('bodega_producto b','o.id_b_producto_fk=b.id_b_producto');
			$this->db->join('t_tipo_centro tc','o.id_tipo_centro_fk=tc.id_tipo_centro');
			$this->db->where('id_o_siembra', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("o.*,b.id_b_producto,b.nombre_b_producto,tc.*");
		$this->db->from('orden_siembra o');
		$this->db->join('bodega_producto b','o.id_b_producto_fk=b.id_b_producto');
		$this->db->join('t_tipo_centro tc','o.id_tipo_centro_fk=tc.id_tipo_centro');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}



	private function _setOrdens($ordens){
		return array(
			'folio_o_siembra' => $ordens['folio'],
			'fecha_inicio' => $ordens['fecha_i'],
			'autorizado' => $ordens['autorizado'],
			'emitido' => $ordens['emitido'],
			'transporte' => $ordens['transporte'],
			'cantidad' => $ordens['crear'],
			'colector' => $ordens['colector'],
			'id_b_producto_fk' => $ordens['bodega'],
			'id_tipo_centro_fk' => $ordens['tcentro']
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($ordens){
		$this->db->select("folio_o_siembra");
		$this->db->from('orden_siembra');
		$this->db->where('folio_o_siembra', $ordens['ordens']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($ordens){
		$this->db->set($this->_setOrdens($ordens))->insert('orden_siembra');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($ordens){
		$id = $ordens['id'];
		$this->db->set($this->_setOrdens($ordens))->where('id_o_siembra', $id)->update('orden_siembra');
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
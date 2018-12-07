<?php 
class Bodegap_model extends CI_Model{  
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){
		if(!is_null($id)){
			$this->db->select("b.*,cc.nombre_centro");
			$this->db->from('bodega_producto b');
			$this->db->join('centro_cultivo cc','b.id_c_cultivo_fk=cc.id_c_cultivo');
			$this->db->where('id_b_producto', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("b.*,cc.nombre_centro");
		$this->db->from('bodega_producto b');
		$this->db->join('centro_cultivo cc','b.id_c_cultivo_fk=cc.id_c_cultivo');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}
	private function _setBodegas($bodegas){
		return array(
			'folio_b_producto' => $bodegas['folio'],
			'nombre_b_producto' => $bodegas['nombre'],
			'fecha_inicio' => $bodegas['fecha_i'],
			'observacion' => $bodegas['observacion'],
			'id_c_cultivo_fk' => $bodegas['centro'],
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($bodegas){
		$this->db->select("nombre_b_producto");
		$this->db->from('bodegas');
		$this->db->where('nombre_b_producto', $bodegas['nombre']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($bodegas){
		$this->db->set($this->_setBodegas($bodegas))->insert('bodega_producto');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($bodegas){
		$id = $bodegas['id'];
		$this->db->set($this->_setBodegas($bodegas))->where('id_b_producto', $id)->update('bodega_producto');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_b_producto', $id)->delete('bodega_producto');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
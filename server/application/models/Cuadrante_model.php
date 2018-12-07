<?php 
class Cuadrante_model extends CI_Model{  
	public function __construct(){  
		parent::__construct();
	}
	public function get($id = null){
		if(!is_null($id)){
			$this->db->select("c.id_cuadrante,c.folio_cuadrante,c.nombre_cuadrante, c.cantidad_linea, c.fecha_inicio, c.observacion,c.id_estado_fk,c.unidad_cuadrante,c.id_c_cultivo_fk, e.d_estado, cc.nombre_centro,cc.id_c_cultivo");
			$this->db->from('cuadrante c');
			$this->db->join('estado e', 'c.id_estado_fk=e.id_estado');
			$this->db->join('centro_cultivo cc', 'c.id_c_cultivo_fk=cc.id_c_cultivo');
			$this->db->where('id_cuadrante', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("c.id_cuadrante,c.folio_cuadrante,c.nombre_cuadrante, c.cantidad_linea, c.fecha_inicio, c.observacion,c.id_estado_fk,c.unidad_cuadrante,c.id_c_cultivo_fk, e.d_estado, cc.nombre_centro,cc.id_c_cultivo");
		$this->db->from('cuadrante c');
		$this->db->join('estado e', 'c.id_estado_fk=e.id_estado');
		$this->db->join('centro_cultivo cc', 'c.id_c_cultivo_fk=cc.id_c_cultivo');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}

	public function getidcentro($centro = null){
		if(!is_null($centro)){
			$this->db->select("c.id_cuadrante,c.folio_cuadrante,c.nombre_cuadrante, c.cantidad_linea, c.fecha_inicio, c.observacion,c.id_estado_fk,c.unidad_cuadrante, c.id_c_cultivo_fk, e.d_estado, cc.nombre_centro,cc.id_c_cultivo");
			$this->db->from('cuadrante c');
			$this->db->join('estado e', 'c.id_estado_fk=e.id_estado');
			$this->db->join('centro_cultivo cc', 'c.id_c_cultivo_fk=cc.id_c_cultivo');
			$this->db->where('id_c_cultivo', $centro);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		return  null;
	}
	public function getstock($cuadrante = null){
		if(!is_null($cuadrante)){
			$this->db->select("cantidad_linea");
			$this->db->from('cuadrante');
			$this->db->where('id_cuadrante', $cuadrante);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		return  null;
	}

	private function _setCuadrante($cuadrante){
		return array(
			'folio_cuadrante' => $cuadrante['folio'],
			'nombre_cuadrante' => $cuadrante['nombre'],
			'fecha_inicio' => $cuadrante['fecha_i'],
			'observacion' => $cuadrante['observacion'],
			'unidad_cuadrante' => $cuadrante['crear'],
			'cantidad_linea' => $cuadrante['cantidad'],
			'id_estado_fk' => $cuadrante['estado'],
			'id_c_cultivo_fk' => $cuadrante['centro']
		);
	}

	private function _setCuadrante2($cuadrante){ 
		return array(
			'cantidad_linea' => $cuadrante['saldo'] 
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($cuadrante){
		$this->db->select("nombre_cuadrante");
		$this->db->from('cuadrante');
		$this->db->where('nombre_cuadrante', $cuadrante['nombre']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($cuadrante){
		$this->db->set($this->_setCuadrante($cuadrante))->insert('cuadrante');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id()); 
		}
		return false;
	}

	//actualizar datos por id
	public function update($cuadrante){
		$id = $cuadrante['id'];
		$this->db->set($this->_setCuadrante($cuadrante))->where('id_cuadrante', $id)->update('cuadrante');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//actualiza la cantidad de linea disponible de un cuadrante
	public function update2($cuadrante){
		$id = $cuadrante['cuadrante'];
		$this->db->set($this->_setCuadrante2($cuadrante))->where('id_cuadrante', $id)->update('cuadrante');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_cuadrante', $id)->delete('cuadrante');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
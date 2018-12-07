<?php 
class Linea_model extends CI_Model{    
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){
		if(!is_null($id)){
			$this->db->select("l.id_linea,l.folio_linea,l.nombre_linea,l.unidad_linea,l.cantidad_cuelga, l.fecha_inicio,l.observacion,l.id_estado_fk,l.id_cuadrante_fk, e.d_estado,c.nombre_cuadrante,c.id_c_cultivo_fk,cc.nombre_centro");
			$this->db->from('linea l');
			$this->db->join('estado e', 'l.id_estado_fk=e.id_estado');
			$this->db->join('cuadrante c', 'l.id_cuadrante_fk=c.id_cuadrante');
			$this->db->join('centro_cultivo cc', 'c.id_c_cultivo_fk=cc.id_c_cultivo');
			$this->db->where('id_linea', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("l.id_linea,l.folio_linea,l.nombre_linea,l.unidad_linea,l.cantidad_cuelga, l.fecha_inicio,l.observacion,l.id_estado_fk,l.id_cuadrante_fk, e.d_estado,c.nombre_cuadrante,c.id_c_cultivo_fk,cc.nombre_centro");
		$this->db->from('linea l');
		$this->db->join('estado e', 'l.id_estado_fk=e.id_estado');
		$this->db->join('cuadrante c', 'l.id_cuadrante_fk=c.id_cuadrante');
		$this->db->join('centro_cultivo cc', 'c.id_c_cultivo_fk=cc.id_c_cultivo');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}

	public function getcuadranteid($cuadrante = null){
		if(!is_null($cuadrante)){
			$this->db->select("l.id_linea,l.folio_linea,l.nombre_linea,l.unidad_linea,l.cantidad_cuelga, l.fecha_inicio,l.observacion,l.id_estado_fk,l.id_cuadrante_fk, e.d_estado,c.nombre_cuadrante,c.id_c_cultivo_fk,cc.nombre_centro");
			$this->db->from('linea l');
			$this->db->join('estado e', 'l.id_estado_fk=e.id_estado');
			$this->db->join('cuadrante c', 'l.id_cuadrante_fk=c.id_cuadrante');
			$this->db->join('centro_cultivo cc', 'c.id_c_cultivo_fk=cc.id_c_cultivo');
			$this->db->where('id_cuadrante', $cuadrante);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		return  null;
	} 


	public function getstock($linea = null){
		if(!is_null($linea)){
			$this->db->select("cantidad_cuelga");
			$this->db->from('linea');
			$this->db->where('id_linea', $linea);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		return  null;
	}

	private function _setLinea($linea){
		return array(
			'folio_linea' => $linea['folio'],
			'nombre_linea' => $linea['nombre'],
			'cantidad_cuelga' => $linea['cantidad'],
			'unidad_linea' => $linea['crear'],
			'fecha_inicio' => $linea['fecha_i'],
			'observacion' => $linea['observacion'],
			'id_estado_fk' => $linea['estado'],
			'id_cuadrante_fk' => $linea['cuadrante']
		);
	}
	
	private function _setLinea2($linea){
		return array(
			'cantidad_cuelga' => $linea['saldo'],
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($linea){
		$this->db->select("nombre_cuadrante");
		$this->db->from('linea');
		$this->db->where('nombre_cuadrante', $linea['nombre']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($linea){
		$this->db->set($this->_setLinea($linea))->insert('linea');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($linea){
		$id = $linea['id'];
		$this->db->set($this->_setLinea($linea))->where('id_linea', $id)->update('linea');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	public function update2($linea){
		$id = $linea['linea'];
		$this->db->set($this->_setLinea2($linea))->where('id_linea', $id)->update('linea');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_linea', $id)->delete('linea');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
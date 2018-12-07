<?php 
class Centro_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){ 
		if(!is_null($id)){
			$this->db->select("cc.id_c_cultivo,cc.folio_centro,cc.nombre_centro, cc.fecha_inicio,cc.cantidad_cuadrante, cc.descripcion, cc.id_estado_fk, cc.id_tipo_centro_fk, cc.id_concesion_fk, cc.id_decreto_fk,cc.id_area_fk,e.d_estado,  tc.d_centro, co.nombre_concesion, d.nombre_decreto, a.nombre_area");
			$this->db->from('centro_cultivo cc');
			$this->db->join('estado e', 'cc.id_estado_fk=e.id_estado');
			$this->db->join('t_tipo_centro tc', 'cc.id_tipo_centro_fk=tc.id_tipo_centro');
			$this->db->join('concesion co', 'cc.id_concesion_fk=co.id_concesion');
			$this->db->join('decreto d', 'cc.id_decreto_fk=d.id_decreto');
			$this->db->join('area a', 'cc.id_area_fk=a.id_area');
			$this->db->where('id_c_cultivo', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("cc.id_c_cultivo,cc.folio_centro,cc.nombre_centro, cc.fecha_inicio,cc.cantidad_cuadrante, cc.descripcion, cc.id_estado_fk, cc.id_tipo_centro_fk, cc.id_concesion_fk, cc.id_decreto_fk,cc.id_area_fk,e.d_estado,  tc.d_centro, co.nombre_concesion, d.nombre_decreto, a.nombre_area");
		$this->db->from('centro_cultivo cc');
		$this->db->join('estado e', 'cc.id_estado_fk=e.id_estado');
		$this->db->join('t_tipo_centro tc', 'cc.id_tipo_centro_fk=tc.id_tipo_centro');
		$this->db->join('concesion co', 'cc.id_concesion_fk=co.id_concesion');
		$this->db->join('decreto d', 'cc.id_decreto_fk=d.id_decreto');
		$this->db->join('area a', 'cc.id_area_fk=a.id_area');
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
			$this->db->where('id_c_cultivo', $centro);
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
	private function _setCentro($centro){ 
		return array(
			'folio_centro' => $centro['folio'],
			'nombre_centro' => $centro['nombre'],
			'fecha_inicio' => $centro['fecha_i'],
			'descripcion' => $centro['descripcion'],
			'cantidad_cuadrante' => $centro['cantidad'],
			'id_estado_fk' => $centro['estado'],
			'id_tipo_centro_fk' => $centro['t_centro'],
			'id_concesion_fk' => $centro['concesion'],
			'id_area_fk' => $centro['area'],
			'id_decreto_fk' => $centro['decreto']
		);
	}

	private function _setCentro2($centro){ 
		return array(
			'cantidad_cuadrante' => $centro['saldo']
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
	public function save($centro){
		$this->db->set($this->_setCentro($centro))->insert('centro_cultivo');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($centro){
		$id = $centro['id'];
		$this->db->set($this->_setCentro($centro))->where('id_c_cultivo', $id)->update('centro_cultivo');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	public function update2($centro){ 
		$id = $centro['centro'];
		$this->db->set($this->_setCentro2($centro))->where('id_c_cultivo', $id)->update('centro_cultivo');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_c_cultivo', $id)->delete('centro_cultivo');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
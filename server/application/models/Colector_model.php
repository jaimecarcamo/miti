<?php
class Colector_model extends CI_Model{  
	public function __construct(){ 
		parent::__construct();
	}
	public function get($id = null){ 
		if(!is_null($id)){
			$this->db->select("c.*");
			$this->db->from('colector c');
			$this->db->where('id_colector', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("c.*");
		$this->db->from('colector c');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}

	public function getstock($colector = null){
		if(!is_null($colector)){
			$this->db->select("peso_colector");
			$this->db->from('colector');
			$this->db->where('id_colector', $colector);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		return  null;
	}

	public function getbodega($bodega = null){
		if(!is_null($bodega)){
			$this->db->select("c.*");
			$this->db->from('colector c');
			$this->db->join('bodega_producto b','c.id_b_producto_fk=b.id_b_producto');
			$this->db->where('id_b_producto', $bodega);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		return  null;
	}

	public function gettcolector($bodega=null){ 
		if(!is_null($bodega)){
			$this->db->where('id_b_producto_fk', $bodega);
			$this->db->from('colector');
			return $this->db->count_all_results();
			
		}else{
			return false;
		}
		return $this->db->count_all_results('colector');
	}

	public function getncolector($bodega=null){ 
		if(!is_null($bodega)){
			$this->db->where('id_b_producto_fk', $bodega);
			$this->db->from('colector');
			return $this->db->count_all_results();
			
		}else{
			return false;
		}
		return $this->db->count_all_results('colector');
	}


	public function gettalla($bodega=null){ 
		if(!is_null($bodega)){
			$this->db->select_avg('talla_semilla');
			$this->db->where('id_b_producto_fk',$bodega);
			$query= $this->db->get('colector');
			return $query->row_array();
			
		}else{
			return false;
		}		
		$this->db->select_avg('talla_semilla');
		$query= $this->db->get('colector');
		return $query->row_array();
	}

	public function getprom($bodega=null){
		if(!is_null($bodega)){
			$this->db->select_avg('peso_colector');
			$this->db->where('id_b_producto_fk',$bodega);
			$query= $this->db->get('colector');
			return $query->row_array();
			
		}else{
			return false;
		}	
		$this->db->select_avg('peso_colector');
		$query= $this->db->get('colector');
		return $query->row_array();
	}


	public function getcolectororden($colector = null){
		if(!is_null($colector)){
			$this->db->select("nombre_colector");
			$this->db->from('colector');
			$this->db->where('id_colector', $colector);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		return  null;
	}



	private function _setColector($colector){
		return array(
			'folio_colector' => $colector['folio'],
			'nombre_colector' => $colector['nombre'],
			'peso_colector' => $colector['peso']
		);
	}

	private function _setColector2($colector){ 
		return array(
			'peso_colector' => $colector['saldo'] 
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($colector){
		$this->db->select("nombre_colector");
		$this->db->from('colector');
		$this->db->where('nombre_colector', $colector['nombre']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($colector){
		$this->db->set($this->_setColector($colector))->insert('colector');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($colector){
		$id = $colector['id'];
		$this->db->set($this->_setColector($colector))->where('id_colector', $id)->update('colector');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//actuliza el peso de un colector
	public function update2($colector){
		$id = $colector['colector'];
		$this->db->set($this->_setColector2($colector))->where('id_colector', $id)->update('colector');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_colector', $id)->delete('colector');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
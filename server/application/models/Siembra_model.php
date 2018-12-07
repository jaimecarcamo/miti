<?php  
class Siembra_model extends CI_Model{    
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){
		if(!is_null($id)){
			$this->db->select("ss.*,p.nombre_proyecto,o.id_o_siembra,o.folio_o_siembra,l.nombre_linea,l.id_linea");
			$this->db->from('siembra ss');
			$this->db->join('proyecto p','ss.id_proyecto_fk=p.id_proyecto');
			$this->db->join('orden_siembra o','ss.id_o_siembra_fk=o.id_o_siembra');
			$this->db->join('linea l','ss.id_linea_fk=l.id_linea');
			$this->db->where('id_siembra', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("ss.*,p.nombre_proyecto,o.id_o_siembra,o.folio_o_siembra,l.nombre_linea,l.id_linea");
		$this->db->from('siembra ss');
		$this->db->join('proyecto p','ss.id_proyecto_fk=p.id_proyecto');
		$this->db->join('orden_siembra o','ss.id_o_siembra_fk=o.id_o_siembra');
		$this->db->join('linea l','ss.id_linea_fk=l.id_linea');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}
 	
 	public function getstock($siembra = null){
		if(!is_null($siembra)){
			$this->db->select("unidad_cuelga");
			$this->db->from('siembra');
			$this->db->where('id_siembra', $siembra);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		return  null;
	}

	public function getsiembra($linea = null, $proyecto = null){
		if((!is_null($linea)) && (!is_null($proyecto))){
			$this->db->select("id_siembra,folio_siembra");
			$this->db->from('siembra');
			$this->db->where('id_linea_fk',$linea);
			$this->db->where('id_proyecto_fk',$proyecto);
			$query = $this->db->get();
			if($query->num_rows() >0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		return  null;
	}

	private function _setSiembra($siembra){
		return array(
			'folio_siembra' => $siembra['folio'],
			'id_linea_fk' => $siembra['linea'],
			'fecha_inicio' => $siembra['fecha_i'],
			'bodega_origen' => $siembra['bodega'],
			'unidad_cuelga' => $siembra['crear'],
			'origen' => $siembra['origen'],
			'num_colector' => $siembra['ncolector'],
			'total_colector' => $siembra['tcolector'],
			'num_rotador' => $siembra['nrotador'],
			'talla' => $siembra['talla'],
			'peso_prom' => $siembra['peso'],
			'id_proyecto_fk' => $siembra['proyecto'],
			'id_o_siembra_fk' => $siembra['orden']
		);
	}

	private function _setSiembra2($siembra){ 
		return array(
			'unidad_cuelga' => $siembra['saldo'] 
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($siembra){
		$this->db->select("folio_siembra");
		$this->db->from('siembra');
		$this->db->where('folio_siembra', $siembra['folio']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($siembra){
		$this->db->set($this->_setSiembra($siembra))->insert('siembra');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($siembra){
		$id = $siembra['id'];
		$this->db->set($this->_setSiembra($siembra))->where('id_siembra', $id)->update('siembra');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	public function update2($siembra){
		$id = $siembra['siembra'];
		$this->db->set($this->_setSiembra2($siembra))->where('id_siembra', $id)->update('siembra');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_siembra', $id)->delete('siembra');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
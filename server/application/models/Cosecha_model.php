<?php 
class Cosecha_model extends CI_Model{  
	public function __construct(){
		parent::__construct();
	}
	public function get($id = null){
		if(!is_null($id)){
			$this->db->select("c.*,p1.id_persona,p1.nombre,p2.id_persona,p2.nombre,p3.id_persona,p3.nombre,p4.id_persona,p4.nombre,e.id_embarcacion,e.nombre_embarcacion,s.id_siembra,s.folio_siembra");
			$this->db->from('cosecha c');
			$this->db->join('persona p1','c.responsable_1=p1.id_persona');
			$this->db->join('persona p2','c.responsable_2=p2.id_persona');
			$this->db->join('persona p3','c.responsable_3=p3.id_persona');
			$this->db->join('persona p4','c.responsable_4=p4.id_persona');
			$this->db->join('embarcacion e','c.id_embarcacion_fk=e.id_embarcacion');
			$this->db->join('siembra s','c.id_siembra_fk=s.id_siembra');
			$this->db->where('id_cosecha', $id);
			$query = $this->db->get();
			if($query->num_rows() === 1){
				return $query->row_array();
			}else{
				return false;
			}
		}
		$this->db->select("c.*,p1.id_persona,p1.nombre,p2.id_persona,p2.nombre,p3.id_persona,p3.nombre,p4.id_persona,p4.nombre,e.id_embarcacion,e.nombre_embarcacion,s.id_siembra,s.folio_siembra");
		$this->db->from('cosecha c');
		$this->db->join('persona p1','c.responsable_1=p1.id_persona');
		$this->db->join('persona p2','c.responsable_2=p2.id_persona');
		$this->db->join('persona p3','c.responsable_3=p3.id_persona');
		$this->db->join('persona p4','c.responsable_4=p4.id_persona');
		$this->db->join('embarcacion e','c.id_embarcacion_fk=e.id_embarcacion');
		$this->db->join('siembra s','c.id_siembra_fk=s.id_siembra');
		$query = $this->db->get(); 
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return  null;
	}

	private function _setCosecha($cosecha){
		return array(
			'folio_cosecha' => $cosecha['folio'],
			'fecha_inicio' => $cosecha['fecha_i'],
			'peso_prom' => $cosecha['peso'],
			'cantidad_bins' => $cosecha['bin'],
			'unidad_cuelga' => $cosecha['saldo'],
			'id_embarcacion_fk' => $cosecha['embarcacion'],
			'id_siembra_fk' => $cosecha['siembra'],
			'responsable_1' => $cosecha['res1'],
			'responsable_2' => $cosecha['res2'],
			'responsable_3' => $cosecha['res3'],
			'responsable_4' => $cosecha['res4']
		);
	}

	//busca por nombre escrito en campo de texto
	public function exists($cosecha){
		$this->db->select("folio_c_semilla");
		$this->db->from('cosecha');
		$this->db->where('folio_c_semilla', $cosecha['folio']);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	//guardar datos nuevos
	public function save($cosecha){
		$this->db->set($this->_setCosecha($cosecha))->insert('cosecha');
		if($this->db->affected_rows() === 1){
			return $this->get($this->db->insert_id());
		}
		return false;
	}

	//actualizar datos por id
	public function update($cosecha){
		$id = $cosecha['id'];
		$this->db->set($this->_setCosecha($cosecha))->where('id_cosecha', $id)->update('cosecha');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}

	//borrar fila por id
	public function delete($id){
		$this->db->where('id_cosecha', $id)->delete('cosecha');
		if($this->db->affected_rows() === 1){
			return true;
		}
		return false;
	}
}
<?php
class Biomasa_model extends CI_Model{ 
	public function __construct(){ 
		parent::__construct();
	}
	public function get($fecha = null, $fecha2 = null){ 
		
		if(!is_null($fecha) && !is_null($fecha2)){
			$sql="select m.*,c.id_cuelga,l.nombre_linea,cua.nombre_cuadrante,a.nombre_area,cc.nombre_centro from muestra m
			inner join cuelga c on m.id_cuelga_fk=c.id_cuelga
			inner join linea l on c.id_linea_fk=l.id_linea 
			inner join cuadrante cua on l.id_cuadrante_fk=cua.id_cuadrante
			inner join area a on cua.id_area_fk=a.id_area
			inner join centro_cultivo cc on a.id_c_cultivo_fk=cc.id_c_cultivo
			where fecha BETWEEN '$fecha' and '$fecha2'";
			$query = $this->db->query($sql);
			if($query->num_rows() >0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		return  null;
	}

	public function getbiomasa($fecha3 = null){ 
		
		if(!is_null($fecha3)){
			$this->db->select("m.*,c.id_cuelga,l.nombre_linea,cua.nombre_cuadrante,a.nombre_area,cc.nombre_centro");
			$this->db->from('muestra m');
			$this->db->join('cuelga c', 'm.id_cuelga_fk=c.id_cuelga');
			$this->db->join('linea l', 'c.id_linea_fk=l.id_linea');
			$this->db->join('cuadrante cua', 'l.id_cuadrante_fk=cua.id_cuadrante');
			$this->db->join('area a', 'cua.id_area_fk=a.id_area');
			$this->db->join('centro_cultivo cc', 'a.id_c_cultivo_fk=cc.id_c_cultivo');
			$this->db->where('m.fecha', $fecha3);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		return  null;
	}

	
}
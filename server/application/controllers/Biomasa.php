<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 

require_once APPPATH . '/libraries/REST_Controller.php'; 
require_once APPPATH . '/libraries/Format.php'; 

//echo APPPATH ;
use Restserver\Libraries\REST_Controller;  

class Biomasa extends REST_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('biomasa_model');
		//$this->load->library('session');
	}
	public function fecha_get($fecha,$fecha2){
		$cuelga = $this->biomasa_model->get($fecha,$fecha2);
		if(!is_null($cuelga)){
			$this->response(array('response'=> $cuelga), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function fecha2_get($fecha3){
		$cuelga2 = $this->biomasa_model->getbiomasa($fecha3);
		if(!is_null($cuelga2)){
			$this->response(array('response'=> $cuelga2), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	
}
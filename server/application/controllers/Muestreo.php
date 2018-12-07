<?php    
	defined('BASEPATH') OR exit('No direct script access allowed'); 

require_once APPPATH . '/libraries/REST_Controller.php'; 
require_once APPPATH . '/libraries/Format.php'; 

//echo APPPATH ;
use Restserver\Libraries\REST_Controller;

class Muestreo extends REST_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('centro_model');
		$this->load->model('cuadrante_model');
		$this->load->model('persona_model');
		$this->load->model('embarcacion_model');
		$this->load->model('muestreo_model');
		//$this->load->library('session');
	}
	public function read_get(){
		$muestreo = $this->muestreo_model->get();
		if(!is_null($muestreo)){
			$this->response(array('response'=> $muestreo), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function embarcaciones_get(){
		$embarcaciona = $this->embarcacion_model->get();
		if(!is_null($embarcaciona)){
			$this->response(array('response'=> $embarcaciona), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}


	public function personas_get(){
		$personaa = $this->persona_model->get();
		if(!is_null($personaa)){
			$this->response(array('response'=> $personaa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function cuadrantes_get(){
		$cuadrantea = $this->cuadrante_model->get();
		if(!is_null($cuadrantea)){
			$this->response(array('response'=> $cuadrantea), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function centros_get(){
		$centroa = $this->centro_model->get();
		if(!is_null($centroa)){
			$this->response(array('response'=> $centroa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function add_post(){
		if(!$this->post('muestreo')){
			$this->response(array(null, 400));
		}
		$form   = $this->post('muestreo');
		$newmodel = $this->muestreo_model->save($form);
		if($newmodel){
			$this->response(array('response'=> $newmodel), 200);
		}else{
			$this->response(array('error' => 'No creado'), 404);
		}
	}
	public function update_put(){
		if(!$this->put('muestreo')){
			$this->response(array(null, 400));
		}
		$form   = $this->put('muestreo');
		$change = $this->muestreo_model->update($form);
		if($change){
			$this->response(array('response'=> "OK"), 200);
		}else{
			$this->response(array('error' => 'No actualizado'), 404);
		}
	}
	public function borrar_delete($id){
		if(!is_numeric($id)){
			$this->response(array(null, 400));
		}
		$delete = $this->muestreo_model->delete($id);
		if(!is_null($delete)){
			$this->response(array('response'=> 'Borrado correctamente.'), 200);
		}else{
			$this->response(array('error' => 'No se pudo borrar.'), 404);
		}
	}
}
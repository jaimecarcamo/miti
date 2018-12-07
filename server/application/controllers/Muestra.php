<?php     
	defined('BASEPATH') OR exit('No direct script access allowed'); 

require_once APPPATH . '/libraries/REST_Controller.php'; 
require_once APPPATH . '/libraries/Format.php'; 

//echo APPPATH ;
use Restserver\Libraries\REST_Controller;

class Muestra extends REST_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('centro_model');
		$this->load->model('cuadrante_model');
		$this->load->model('linea_model');
		$this->load->model('muestra_model');
		$this->load->model('muestreo_model');
		//$this->load->library('session');
	}
	public function read_get(){
		$muestra = $this->muestra_model->get();
		if(!is_null($muestra)){
			$this->response(array('response'=> $muestra), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function muestreos_get(){
		$muestreoa = $this->muestreo_model->get();
		if(!is_null($muestreoa)){
			$this->response(array('response'=> $muestreoa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function lineas_get($cuadrante){
		$lineaa = $this->linea_model->getcuadranteid($cuadrante);
		if(!is_null($lineaa)){
			$this->response(array('response'=> $lineaa), 200);
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


	public function cuadrantes_get($centro){
		$cuadrantea = $this->cuadrante_model->getidcentro($centro);
		if(!is_null($cuadrantea)){
			$this->response(array('response'=> $cuadrantea), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function add_post(){
		if(!$this->post('muestra')){
			$this->response(array(null, 400));
		}
		$form   = $this->post('muestra');
		$newmodel = $this->muestra_model->save($form);
		if($newmodel){
			$this->response(array('response'=> $newmodel), 200);
		}else{
			$this->response(array('error' => 'No creado'), 404);
		}
	}
	public function update_put(){
		if(!$this->put('muestra')){
			$this->response(array(null, 400));
		}
		$form   = $this->put('muestra');
		$change = $this->muestra_model->update($form);
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
		$delete = $this->muestra_model->delete($id);
		if(!is_null($delete)){
			$this->response(array('response'=> 'Borrado correctamente.'), 200);
		}else{
			$this->response(array('error' => 'No se pudo borrar.'), 404);
		}
	}
}
<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

require_once APPPATH . '/libraries/REST_Controller.php'; 
require_once APPPATH . '/libraries/Format.php'; 

//echo APPPATH ;
use Restserver\Libraries\REST_Controller;

class Centro extends REST_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('centro_model');
		$this->load->model('concesion_model');
		$this->load->model('decreto_model');
		$this->load->model('estado_model');
		$this->load->model('tcentro_model');
		$this->load->model('area_model');
		//$this->load->library('session');
	}
	public function read_get(){
		$centro = $this->centro_model->get();
		if(!is_null($centro)){
			$this->response(array('response'=> $centro), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function concesiones_get(){
		$concesiona = $this->concesion_model->get();
		if(!is_null($concesiona)){
			$this->response(array('response'=> $concesiona), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function decretos_get(){
		$decretoa = $this->decreto_model->get();
		if(!is_null($decretoa)){
			$this->response(array('response'=> $decretoa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}


	public function tcentros_get(){
		$t_centroa = $this->tcentro_model->get();
		if(!is_null($t_centroa)){
			$this->response(array('response'=> $t_centroa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}


	public function estados_get(){
		$estadoa = $this->estado_model->get();
		if(!is_null($estadoa)){
			$this->response(array('response'=> $estadoa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function areas_get(){
		$areaa = $this->area_model->get();
		if(!is_null($areaa)){
			$this->response(array('response'=> $areaa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function add_post(){
		if(!$this->post('centro')){
			$this->response(array(null, 400));
		}
		$form   = $this->post('centro');
		$newmodel = $this->centro_model->save($form);
		if($newmodel){
			$this->response(array('response'=> $newmodel), 200);
		}else{
			$this->response(array('error' => 'No creado'), 404);
		}
	}


	public function update_put(){
		if(!$this->put('centro')){
			$this->response(array(null, 400));
		}
		$form   = $this->put('centro');
		$change = $this->centro_model->update($form);
		if($change){
			$this->response(array('response'=> "OK"), 200);
		}else{
			$this->response(array('error' => 'No actualizado'), 404);
		}
	}

	public function update2_put(){ 
		if(!$this->put('centro')){
			$this->response(array(null, 400));
		}
		$form   = $this->put('centro');
		$change = $this->centro_model->update2($form);
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
		$delete = $this->centro_model->delete($id);
		if(!is_null($delete)){
			$this->response(array('response'=> 'Borrado correctamente.'), 200);
		}else{
			$this->response(array('error' => 'No se pudo borrar.'), 404);
		}
	}
}
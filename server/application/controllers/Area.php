<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php'; 
require_once APPPATH . '/libraries/Format.php'; 

//echo APPPATH ;
use Restserver\Libraries\REST_Controller;

class Area extends REST_Controller{ 
	public function __construct(){
		parent::__construct();
		$this->load->model('area_model');
		$this->load->model('estado_model');
		$this->load->model('tipoarea_model');
		//$this->load->library('session');
	}

	
	public function estados_get(){
		$estadoa = $this->estado_model->get();
		if(!is_null($estadoa)){
			$this->response(array('response'=> $estadoa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function tipoareas_get(){
		$tipoareaa = $this->tipoarea_model->get();
		if(!is_null($tipoareaa)){
			$this->response(array('response'=> $tipoareaa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	public function read_get(){
		$area = $this->area_model->get();
		if(!is_null($area)){
			$this->response(array('response'=> $area), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	public function add_post(){
		if(!$this->post('area')){
			$this->response(array(null, 400));
		}
		$form   = $this->post('area');
		$newmodel = $this->area_model->save($form);
		if($newmodel){
			$this->response(array('response'=> $newmodel), 200);
		}else{
			$this->response(array('error' => 'No creado'), 404);
		}
	}
	public function update_put(){
		if(!$this->put('area')){
			$this->response(array(null, 400));
		}
		$form   = $this->put('area');
		$change = $this->area_model->update($form);
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
		$delete = $this->area_model->delete($id);
		if(!is_null($delete)){
			$this->response(array('response'=> 'Borrado correctamente.'), 200);
		}else{
			$this->response(array('error' => 'No se pudo borrar.'), 404);
		}
	}
}
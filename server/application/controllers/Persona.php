<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php'; 
require_once APPPATH . '/libraries/Format.php'; 

//echo APPPATH ;
use Restserver\Libraries\REST_Controller;

class Persona extends REST_Controller{ 
	public function __construct(){
		parent::__construct();
		$this->load->model('persona_model');
		//$this->load->library('session');
	}

	
	public function read_get(){
		$persona = $this->persona_model->get();
		if(!is_null($persona)){
			$this->response(array('response'=> $persona), 200);
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
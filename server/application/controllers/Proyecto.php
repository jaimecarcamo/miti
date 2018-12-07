<?php
	defined('BASEPATH') OR exit('No direct script access allowed');  

require_once APPPATH . '/libraries/REST_Controller.php'; 
require_once APPPATH . '/libraries/Format.php'; 

//echo APPPATH ;
use Restserver\Libraries\REST_Controller; 

class Proyecto extends REST_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('proyecto_model');
		//$this->load->library('session');
	}
	public function read_get(){
		$proyecto = $this->proyecto_model->get();
		if(!is_null($proyecto)){
			$this->response(array('response'=> $proyecto), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	
	public function add_post(){
		if(!$this->post('proyecto')){
			$this->response(array(null, 400));
		}
		$form   = $this->post('proyecto');
		$newmodel = $this->proyecto_model->save($form);
		if($newmodel){
			$this->response(array('response'=> $newmodel), 200);
		}else{
			$this->response(array('error' => 'No creado'), 404);
		}
	}
	public function update_put(){
		if(!$this->put('proyecto')){
			$this->response(array(null, 400));
		}
		$form   = $this->put('proyecto');
		$change = $this->proyecto_model->update($form);
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
		$delete = $this->proyecto_model->delete($id);
		if(!is_null($delete)){
			$this->response(array('response'=> 'Borrado correctamente.'), 200);
		}else{
			$this->response(array('error' => 'No se pudo borrar.'), 404);
		}
	}
}
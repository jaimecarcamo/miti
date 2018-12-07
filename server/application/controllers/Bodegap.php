<?php  
	defined('BASEPATH') OR exit('No direct script access allowed'); 

require_once APPPATH . '/libraries/REST_Controller.php'; 
require_once APPPATH . '/libraries/Format.php'; 

//echo APPPATH ;
use Restserver\Libraries\REST_Controller;

class Bodegap extends REST_Controller{ 
	public function __construct(){
		parent::__construct();
		$this->load->model('bodegap_model');
		$this->load->model('centro_model');
		//$this->load->library('session');
	}

	
	public function centros_get(){
		$centroa = $this->centro_model->get();
		if(!is_null($centroa)){
			$this->response(array('response'=> $centroa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	public function read_get(){
		$bodegas = $this->bodegap_model->get();
		if(!is_null($bodegas)){
			$this->response(array('response'=> $bodegas), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	public function add_post(){
		if(!$this->post('bodegas')){
			$this->response(array(null, 400));
		}
		$form   = $this->post('bodegas');
		$newmodel = $this->bodegap_model->save($form);
		if($newmodel){
			$this->response(array('response'=> $newmodel), 200);
		}else{
			$this->response(array('error' => 'No creado'), 404);
		}
	}
	public function update_put(){
		if(!$this->put('bodegas')){
			$this->response(array(null, 400));
		}
		$form   = $this->put('bodegas');
		$change = $this->bodegap_model->update($form);
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
		$delete = $this->bodegap_model->delete($id);
		if(!is_null($delete)){
			$this->response(array('response'=> 'Borrado correctamente.'), 200);
		}else{
			$this->response(array('error' => 'No se pudo borrar.'), 404);
		}
	}
}
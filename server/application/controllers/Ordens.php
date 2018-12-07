<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');  

require_once APPPATH . '/libraries/REST_Controller.php'; 
require_once APPPATH . '/libraries/Format.php'; 

//echo APPPATH ;
use Restserver\Libraries\REST_Controller;

class Ordens extends REST_Controller{ 
	public function __construct(){
		parent::__construct();
		$this->load->model('bodegap_model');
		$this->load->model('tcentro_model');
		$this->load->model('ordens_model');
		$this->load->model('colector_model');
		//$this->load->library('session');
	}
	
	public function bodegas_get(){
		$bodegas = $this->bodegap_model->get();
		if(!is_null($bodegas)){
			$this->response(array('response'=> $bodegas), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	public function colectores_get($bodega){
		$colectora = $this->colector_model->getbodega($bodega);
		if(!is_null($colectora)){
			$this->response(array('response'=> $colectora), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function colectororden_get($colector){
		$colectororden = $this->colector_model->getcolectororden($colector);
		if(!is_null($colectororden)){
			$this->response(array('response'=> $colectororden), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function stock_get($colector){
		$stock = $this->colector_model->getstock($colector);
		if(!is_null($stock)){
			$this->response(array('response'=> $stock), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function tcentros_get(){
		$tcentroa = $this->tcentro_model->get();
		if(!is_null($tcentroa)){
			$this->response(array('response'=> $tcentroa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function read_get(){
		$ordens = $this->ordens_model->get();
		if(!is_null($ordens)){
			$this->response(array('response'=> $ordens), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	public function add_post(){
		if(!$this->post('ordens')){
			$this->response(array(null, 400));
		}
		$form   = $this->post('ordens');
		$newmodel = $this->ordens_model->save($form);
		if($newmodel){
			$this->response(array('response'=> $newmodel), 200);
		}else{
			$this->response(array('error' => 'No creado'), 404);
		}
	}
	public function update_put(){
		if(!$this->put('ordens')){
			$this->response(array(null, 400));
		}
		$form   = $this->put('ordens');
		$change = $this->ordens_model->update($form);
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
		$delete = $this->ordens_model->delete($id);
		if(!is_null($delete)){
			$this->response(array('response'=> 'Borrado correctamente.'), 200);
		}else{
			$this->response(array('error' => 'No se pudo borrar.'), 404);
		}
	}
}
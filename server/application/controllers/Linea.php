<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');  
 
require_once APPPATH . '/libraries/REST_Controller.php'; 
require_once APPPATH . '/libraries/Format.php'; 

//echo APPPATH ;
use Restserver\Libraries\REST_Controller;

class Linea extends REST_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('linea_model');
		$this->load->model('cuadrante_model');
		$this->load->model('estado_model');
		$this->load->model('centro_model');
		//$this->load->library('session');
	}
	public function read_get(){
		$linea = $this->linea_model->get();
		if(!is_null($linea)){
			$this->response(array('response'=> $linea), 200);
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
	public function estados_get(){
		$estadoa = $this->estado_model->get();
		if(!is_null($estadoa)){
			$this->response(array('response'=> $estadoa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	public function stock_get($cuadrante){
		$stock = $this->cuadrante_model->getstock($cuadrante);
		if(!is_null($stock)){
			$this->response(array('response'=> $stock), 200);
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
		if(!$this->post('linea')){
			$this->response(array(null, 400));
		}
		$form   = $this->post('linea');
		$newmodel = $this->linea_model->save($form);
		if($newmodel){
			$this->response(array('response'=> $newmodel), 200);
		}else{
			$this->response(array('error' => 'No creado'), 404);
		}
	}
	public function update_put(){
		if(!$this->put('linea')){
			$this->response(array(null, 400));
		}
		$form   = $this->put('linea');
		$change = $this->linea_model->update($form);
		if($change){
			$this->response(array('response'=> "OK"), 200);
		}else{
			$this->response(array('error' => 'No actualizado'), 404);
		}
	}

	public function update2_put(){
		if(!$this->put('linea')){
			$this->response(array(null, 400));
		}
		$form   = $this->put('linea');
		$change = $this->linea_model->update2($form);
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
		$delete = $this->linea_model->delete($id);
		if(!is_null($delete)){
			$this->response(array('response'=> 'Borrado correctamente.'), 200);
		}else{
			$this->response(array('error' => 'No se pudo borrar.'), 404);
		}
	}
}
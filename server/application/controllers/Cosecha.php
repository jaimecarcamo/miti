<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');  
 
require_once APPPATH . '/libraries/REST_Controller.php'; 
require_once APPPATH . '/libraries/Format.php'; 

//echo APPPATH ;
use Restserver\Libraries\REST_Controller;

class Cosecha extends REST_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('linea_model');
		$this->load->model('cosecha_model');
		$this->load->model('siembra_model');
		$this->load->model('centro_model');
		$this->load->model('proyecto_model');
		$this->load->model('cuadrante_model');
		$this->load->model('embarcacion_model');
		$this->load->model('persona_model');
		//$this->load->library('session');
	}
	public function read_get(){
		$cosecha = $this->cosecha_model->get();
		if(!is_null($cosecha)){
			$this->response(array('response'=> $cosecha), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function stock_get($siembra){
		$stock = $this->siembra_model->getstock($siembra);
		if(!is_null($stock)){
			$this->response(array('response'=> $stock), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function patente_get($embarcacion){
		$patente = $this->embarcacion_model->getpatente($embarcacion);
		if(!is_null($patente)){
			$this->response(array('response'=> $patente), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function siembras_get($linea,$proyecto){
		$siembras = $this->siembra_model->getsiembra($linea,$proyecto);
		if(!is_null($siembras)){
			$this->response(array('response'=> $siembras), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function proyecto_get(){
		$proyectoa = $this->proyecto_model->get();
		if(!is_null($proyectoa)){
			$this->response(array('response'=> $proyectoa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function personas_get(){
		$responsables = $this->persona_model->get();
		if(!is_null($responsables)){
			$this->response(array('response'=> $responsables), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	
	public function embarcaciones_get(){
		$embarcaciones = $this->embarcacion_model->get();
		if(!is_null($embarcaciones)){
			$this->response(array('response'=> $embarcaciones), 200);
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


	public function add_post(){
		if(!$this->post('cosecha')){
			$this->response(array(null, 400));
		}
		$form   = $this->post('cosecha');
		$newmodel = $this->cosecha_model->save($form);
		if($newmodel){
			$this->response(array('response'=> $newmodel), 200);
		}else{
			$this->response(array('error' => 'No creado'), 404);
		}
	}
	public function update_put(){
		if(!$this->put('cosecha')){
			$this->response(array(null, 400));
		}
		$form   = $this->put('cosecha');
		$change = $this->cosecha_model->update($form);
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
		$delete = $this->cosecha_model->delete($id);
		if(!is_null($delete)){
			$this->response(array('response'=> 'Borrado correctamente.'), 200);
		}else{
			$this->response(array('error' => 'No se pudo borrar.'), 404);
		}
	}
}
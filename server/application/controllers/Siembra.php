<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');  
 
require_once APPPATH . '/libraries/REST_Controller.php'; 
require_once APPPATH . '/libraries/Format.php'; 

//echo APPPATH ;
use Restserver\Libraries\REST_Controller;

class Siembra extends REST_Controller{ 
	public function __construct(){
		parent::__construct();
		$this->load->model('siembra_model');
		$this->load->model('centro_model');
		$this->load->model('proyecto_model');
		$this->load->model('ordens_model');
		$this->load->model('linea_model');
		$this->load->model('cuadrante_model');
		$this->load->model('origen_model');
		$this->load->model('bodegap_model');
		$this->load->model('colector_model');
		$this->load->model('rotador_model');
		//$this->load->library('session');
	}

	public function talla_get($bodega){
		$talla=$this->colector_model->gettalla($bodega);
		if(!is_null($talla)){
			$this->response(array('response'=> $talla),200);
		}else{
			$this->response(array('error'=> 'No hay datos'),404);
		}
	}
	public function peso_get($bodega){
		$peso=$this->colector_model->getprom($bodega);
		if(!is_null($peso)){
			$this->response(array('response'=> $peso),200);
		}else{
			$this->response(array('error'=> 'No hay datos'),404);
		}
	}
	public function read_get(){
		$siembra = $this->siembra_model->get();
		if(!is_null($siembra)){
			$this->response(array('response'=> $siembra), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	public function tcolector_get($bodega){
		$tcolector = $this->colector_model->gettcolector($bodega);
		if(!is_null($tcolector)){
			$this->response(array('response'=> $tcolector), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	public function nrotador_get($bodega){
		$nrotador = $this->rotador_model->getnrotador($bodega);
		if(!is_null($nrotador)){
			$this->response(array('response'=> $nrotador), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	public function ncolector_get($bodega){
		$ncolector = $this->colector_model->getncolector($bodega);
		if(!is_null($ncolector)){
			$this->response(array('response'=> $ncolector), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	
	
	public function proyectos_get(){
		$proyectoa = $this->proyecto_model->get();
		if(!is_null($proyectoa)){
			$this->response(array('response'=> $proyectoa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	public function ordenes_get(){
		$ordena = $this->ordens_model->get();
		if(!is_null($ordena)){
			$this->response(array('response'=> $ordena), 200);
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
	public function cuadrantes_get($centro){
		$cuadrantea = $this->cuadrante_model->getidcentro($centro);
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
	
	public function origenes_get(){
		$origena = $this->origen_model->get();
		if(!is_null($origena)){
			$this->response(array('response'=> $origena), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}
	public function bodegas_get(){
		$bodegaa = $this->bodegap_model->get();
		if(!is_null($bodegaa)){
			$this->response(array('response'=> $bodegaa), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404);
		}
	}

	public function stock_get($linea){
		$stock = $this->linea_model->getstock($linea);
		if(!is_null($stock)){
			$this->response(array('response'=> $stock), 200);
		}else{
			$this->response(array('error' => 'No hay datos'), 404); 
		}
	}

	public function add_post(){
		if(!$this->post('siembra')){
			$this->response(array(null, 400));
		}
		$form   = $this->post('siembra');
		$newmodel = $this->siembra_model->save($form);
		if($newmodel){
			$this->response(array('response'=> $newmodel), 200);
		}else{
			$this->response(array('error' => 'No creado'), 404);
		}
	}
	public function update_put(){
		if(!$this->put('siembra')){
			$this->response(array(null, 400));
		}
		$form   = $this->put('siembra');
		$change = $this->siembra_model->update($form);
		if($change){
			$this->response(array('response'=> "OK"), 200);
		}else{
			$this->response(array('error' => 'No actualizado'), 404);
		}
	}

	public function update2_put(){
		if(!$this->put('siembra')){
			$this->response(array(null, 400));
		}
		$form   = $this->put('siembra');
		$change = $this->siembra_model->update2($form);
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
		$delete = $this->siembra_model->delete($id);
		if(!is_null($delete)){
			$this->response(array('response'=> 'Borrado correctamente.'), 200);
		}else{
			$this->response(array('error' => 'No se pudo borrar.'), 404);
		}
	}
}
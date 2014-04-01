<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public final function __construct(){
		parent::__construct();
	}
	
	private final function go($method, $data=array(), $ajax=false){
		$data['title'] = $this->parametro_model->get('system_name');
		
		if(!$ajax){
			$this->load->view('common/header', $data);
		}
		
		$this->load->view($this->router->class.'/'.$method, $data);
		
		if(!$ajax){
			$this->load->view('common/footer', $data);
		}
	}
	
	public final function login(){
		phpinfo();
	}
	
	public function index(){
		$this->go($this->router->method);
	}
}

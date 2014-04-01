<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Security extends CI_Controller {

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
	
	public function login(){
		if($_POST){
			if($this->security_model->login($_POST['email'], $_POST['password'])){
				redirect('/');
			}
		}
		
		$this->go($this->router->method);
	}
	
	public function quit(){
		$this->security_model->quit();
		redirect('/');
	}
}

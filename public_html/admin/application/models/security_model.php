<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Security_model extends CI_Model {

	public final function __construct(){
		parent::__construct();
		$this->checkUserStatus();
	}
	
	public final function checkUserStatus(){
		$security = str_replace('_model', '', basename(__FILE__, '.php'));
		
		if(!$this->session->userdata('USER_LOGGED')){
			if($this->router->class !== $security){
				redirect('/entrar');
			}
		}
	}
	
	public final function login($user, $password){
		try{
			$query = $this->db->get_where('usuario', array(
				'email'		=> $user,
				'senha'		=> $password,
				'status'	=> 1
			));
			
			if($query->num_rows() > 0){
				$data = $query->result();
				
				$this->session->set_userdata('USER_LOGGED', 'TRUE');
				$this->session->set_userdata('USER_ID', $data[0]->id);
				$this->session->set_userdata('USER_GROUP_ID', $data[0]->id_grupo);
				$this->session->set_userdata('USER_NAME', $data[0]->nome);
				$this->session->set_userdata('USER_SLUG', $data[0]->slug);
				$this->session->set_userdata('USER_EMAIL', $data[0]->email);
				
				return true;
			} else {
				throw new Exception("User Not Found!");
			}
		} catch (Exception $e) {
			return false;
		}
	}
	
	public final function quit(){
		try{
			$this->session->sess_destroy();
			
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
}

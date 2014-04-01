<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parametro_model extends CI_Model {

	public $return;
	public $tablename;
	
	public final function __construct(){
		$this->tablename = str_replace('_model', '', basename(__FILE__, '.php'));
		parent::__construct();
	}
	
	private final function __return($query){
		try{
			if($query->num_rows() > 0){
				$return['error']	= false;
				$return['data']		= $query->result();
			} else {
				throw new Exception("No Data!");
			}
		} catch (Exception $e){
			$return['error']	= true;
			$return['code']		= $e->getCode();
			$return['message']	= $e->getMessage();
		}
		
		return $return;
	}
	
	public final function get($slug){
		$data = $this->__return($this->db->get_where($this->tablename, array('slug' => $slug)));
		
		if(!$data['error']){
			return $data['data'][0]->valor;
		} else {
			return $data;
		}
	}
	
	public final function all(){
		return $this->__return($this->db->get($this->tablename));
	}
	
	public final function by($field, $value){
		return $this->__return($this->db->get_where($this->tablename, array($field => $value)));
	}
	
	public final function insert($data){
		try{
			if($this->db->insert($this->tablename, $data)){
				$return['error'] = false;
			} else {
				throw new Exception("Error Inserting Record!");
			}
		} catch (Exception $e){
			$return['error']	= true;
			$return['code']		= $e->getCode();
			$return['message']	= $e->getMessage();
		}
		
		return $return;
	}
	
	public final function update($id, $data){
		try{
			$this->db->where('id', $id);
			
			if($this->db->update($this->tablename, $data)){
				$return['error'] = false;
			} else {
				throw new Exception("Error Updating Record!");
			}
		} catch (Exception $e){
			$return['error']	= true;
			$return['code']		= $e->getCode();
			$return['message']	= $e->getMessage();
		}
		
		return $return;
	}
}

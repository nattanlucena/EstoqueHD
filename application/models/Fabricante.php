<?php

require_once 'Zend/Db/Table/Abstract.php';

class Application_Model_Fabricante extends Zend_Db_Table_Abstract
{
	private $id;
	private $fabricante;
	
	protected $_name = 'fabricante';
	protected $_primary = 'id';
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setFabricante($fabricante){
		$this->fabricante = $fabricante;
	}
	
	public function getFabricante(){
		return $this->fabricante;
	}
	
	
	/* *************** DB functions ******************** */
	
	public function findByID($id){
		
		$select = $this->select()->where('id = ?', $id);
		return $this->fetchRow($select);
	}
}



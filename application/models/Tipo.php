<?php

require_once 'Zend/Db/Table/Abstract.php';

class Application_Model_Tipo extends Zend_Db_Table_Abstract
{
	private $id;
	private $tipo;
	
	protected $_name = 'tipo';
	protected $_primary = 'id';
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	
	public function getTipo(){
		return $this->tipo;
	}
	
	
	/* *************** DB functions ******************** */
	
	public function findByID($id){
	
		$select = $this->select()->where('id = ?', $id);
		return $this->fetchRow($select);
	}


}


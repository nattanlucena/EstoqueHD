<?php

require_once 'Zend/Db/Table/Abstract.php';

class Application_Model_Modelo extends Zend_Db_Table_Abstract
{

	private $id;
	private $modelo;
	private $idFabricante;
	
	protected $_name = 'modelo';
	protected $_primary = 'id';
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setModelo($modelo){
		$this->modelo = $modelo;
	}
	
	public function getModelo(){
		return $this->modelo;
	}
	
	public function getIdfabricante(){
		return $this->idFabricante;
	}
	
	public function setIdfabricante($idFabricante){
		$this->idFabricante = $idFabricante;
	}
	/* *************** DB functions ******************** */
	
	public function findByID($id){
	
		$select = $this->select()->where('id = ?', $id);
		return $this->fetchRow($select);
	}
	
	public function findByIdtipo($id_tipo){
		
		$sqlString = "select * from modelo where idTipo = ?";
		$sql = $this->getAdapter()->query($sqlString, $id_tipo);
		
		return $sql->fetchAll();
	}
}


<?php

require_once 'Zend/Db/Table/Abstract.php';

class Application_Model_Entrada extends Zend_Db_Table_Abstract
{
	private $id;
	private $data;
	private $quantidade;
	private $observacao;
	
	protected $_name = 'entrada';
	protected $_primary = 'id';
	protected $_referenceMap = array(
			'Produto' => array(
					'columns' => array('id'),
					'refTableClass' => 'Produto',
					'refColumns' => array('id')
			)
	);
	
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getData(){
		return $this->data;
	}
	
	public function setData($data){
		$this->data = $data;
	}
	
	public function getQuantidade(){
		return $this->quantidade;
	}
	
	public function setQuantidade($quantidade){
		$this->quantidade = $quantidade;
	}
	
	
	public function getObservacao(){
		return $this->observacao;
	}
	
	public function setObservacao($observacao){
		$this->observacao = $observacao;
	}
	

	/* *************** DB functions ******************** */
}


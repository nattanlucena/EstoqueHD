<?php

require_once 'Zend/Db/Table/Abstract.php';

class Application_Model_Produto extends Zend_Db_Table_Abstract
{
	private $id;
	private $idModelo;
	private $quantidade;
	private $custoTotal;
	private $custoProjetado;
	private $observacao;
	
	protected $_name = 'produto';
	protected $_primary = 'id';
	protected $_referenceMap = array(
			'Modelo' => array(
					'columns' => array('id'),
					'refTableClass' => 'Modelo',
					'refColumns' => array('id')
			)
	);
	
	private function setId($id) {
		$this->id = $id;
	}
	
	private function getId() {
		return $this->id;
	}
	
	
	public function getIdmodelo() {
		return $this->idModelo;
	}
	
	public function setIdmodelo($idModelo) {
		$this->idModelo = $idModelo;
	}
	
	
	public function getQuantidade() {
		return $this->quantidade;
	}
	
	public function setQuantidade($quantidade) {
		$this->quantidade = $quantidade;
	}
	
	
	public function getCustoTotal() {
		return $this->custoTotal;
	}
	
	public function setCustoTotal($custoTotal) {
		$this->custoTotal = $custoTotal;
	}
	
	
	public function getCustoProjetado() {
		return $this->custoProjetado;
	}
	
	public function setCustoProjetado($custoProjetado) {
		$this->custoProjetado = $custoProjetado;
	}
	
	
	public function getObservacao() {
		return $this->observacao;
	}
	
	public function setObservacao($observacao) {
		$this->observacao = $observacao;
	}
	
	
	/* *************** DB functions ******************** */
	
	
	public function listar(){
		
		$sql = "Select DISTINCT p.*, f.fabricante as 'fabricante', m.modelo as 'modelo', t.tipo as 'tipo' FROM
				produto p 
				INNER JOIN fabricante f 
				INNER JOIN modelo m ON f.id = m.id
				INNER JOIN tipo t ON t.id = m.idTipo AND p.idModelo = m.id";
				
		
		$this->getAdapter()->setFetchMode(Zend_Db::FETCH_OBJ);
		$rows = $this->getAdapter()->fetchAll($sql);
		
		return $rows;
	}
	
	public function insert(array $data){
		
		parent::insert($data);
		
	}
}

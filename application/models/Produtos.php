<?php

class Application_Model_Produtos
{
 
	private $id;
	private $idFornecedor;
	private $tipo;
	private $modelo;
	private $quantidade;
	private $custoTotal;
	private $custoProjetado;
	private $observacao;
	
	
	public function __construct(array $options = null) {
		if (is_array ( $options )) {
			$this->setOptions ( $options );
		}
	}
	
	
	private function setId($id) {
		$this->id = $id;
	}
	
	private function getId() {
		return $this->id;
	}
	
	
	private function setIdFornecedor($id) {
		$this->idFornecedor = $id;
	}
	
	private function getIdFornecedor() {
		return $this->idFornecedor;
	}
	
	
	public function getTipo() {
		return $this->tipo;
	}
	
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	
	
	public function getModelo() {
		return $this->modelo;
	}
	
	public function setModelo($modelo) {
		$this->modelo = $modelo;
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
	
	
}

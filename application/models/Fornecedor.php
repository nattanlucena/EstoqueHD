<?php

class Application_Model_Fornecedor
{
	private $id;
	private $nome;
	
	public function __construct(array $options = null) {
		if (is_array ( $options )) {
			$this->setOptions ( $options );
		}
	}

	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function getNome(){
		return $this->none;
	}
}


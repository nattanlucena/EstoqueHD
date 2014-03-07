<?php

class ProdutosController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    	$this->_fabricante = new Application_Model_Fabricante();
    	$this->_produto = new Application_Model_Produto();
    	$this->_tipo = new Application_Model_Tipo();
    	$this->_modelo = new Application_Model_Modelo();
  	
    	$tipos = $this->_tipo->fetchAll();
    	$fabricantes = $this->_fabricante->fetchAll();
    	$modelos = $this->_modelo->fetchAll();
    	
    	$this->view->controllerName = $this->getRequest()->getControllerName();
    	$this->view->moduleName = $this->getRequest()->getModuleName();
    	$this->view->actionName = $this->getRequest()->getActionName();    	
    	$this->view->tipos = $tipos;
    	$this->view->fabricantes = $fabricantes;
    	$this->view->modelos = $modelos;
    }

    public function indexAction()
    {
        // action body
    }

	public function inserirAction(){
		$this->view->messages = $this->_helper->flashMessenger->getMessages();
		
		if( $this->_request->isPost()){
					
			if(isset( $_POST['fab_f']) && $this->getParam('fab_f') != "" ){				

				$fab = array("fabricante" => $this->getParam('fab_f') );
				//recupera o lastinsertid
				$last_f = $this->_fabricante->insert($fab);
				
			}else{
				
				$last_f = $this->getParam('idFabricante');
				
			}
			
			if(isset( $_POST['mod_m']) && $this->getParam('mod_m') != "" ){
				
				$mod = array( 
						"modelo" => $this->getParam('mod_m'),
						"idFabricante" => $last_f,
						"idTipo" => $this->getParam('tipo')
				 );
				//recupera o lastinsertid
				$last_m = $this->_modelo->insert($mod);
				
			}else{
				
				$last_m = $this->getParam('idModelo');
				
			}
	
			$data = array(
				'quantidade' => $this->_request->getParam('quantidade'), 
				'idModelo' => $last_m,
				'custoTotal' => $this->_request->getParam('custoTotal'),
				'custoProjetado' => $this->_request->getParam('custoProjetado'),
				'observacao' => $this->_request->getParam('observacao')
			);
			
			try{
				
				$this->_produto->insert($data);
				$this->_helper->redirector('index', 'index');
				
			}catch(Exception $e){
				echo $e->getMessage();
			}			
		}
	}
	
	public function filterParamValues( $data = array() ){
		
		unset($data['module']);
		unset($data['controller']);
		unset($data['action']);
		
		return $data;
	}
	
	public function carregarmodelosAction(){
		
		if($this->_request->isGet()){
			
			$idTipo = $this->_request->getParam('idTipo');
			
			$modelos = $this->_modelo->findByIdtipo($idTipo);
			
			$select = "";			
			foreach($modelos as $m){
				$select .= "<option value=".$m['id'].">".$m['modelo']."</option>";
			}
			$select .= "<option value='outro'>Outro</option>";
			
			$this->_helper->layout()->disableLayout();
			$this->_helper->viewRenderer->setNoRender(true);
			
			print $select;
		}
	}
}


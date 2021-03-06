<?php

define ( 'DS', DIRECTORY_SEPARATOR );
define ( 'PS', PATH_SEPARATOR );
define ( 'BASEPATH', getcwd () . DS );

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	
	
	protected function _initDoctype(){
		
			$this->bootstrap("view");
			$view = $this->getResource("view");
			$view->doctype("HTML5");
	}
	
	protected function _initSessionNamespaces(){
		
		Zend_Session::start();
		
	}
	
	protected function _initViewHelpers(){
		
		// Registrar Camada de Visualização
		$this->registerPluginResource('view');
		// Inicialização da Camada
		$view = $this->bootstrap('view')->getResource('view');
		
	}
	
	protected function _initErrorDisplay(){
		$frontController = Zend_Controller_Front::getInstance();
		$frontController->throwExceptions(true);
	}
	
	protected function _initAutoload()
	{
		$autoloader = Zend_Loader_Autoloader::getInstance();
		
		return $autoloader;
	}
	
}


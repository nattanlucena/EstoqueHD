<?php

class LoginController extends Zend_Controller_Action
{

    public function init()
    {
        //layout para o login
    	//$this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
    	
    	if ($this->_helper->FlashMessenger->hasMessages()) {
    		$this->view->messages = $this->_helper->flashMessenger->getMessages();
    	}
    	//$this->initView();
    }

    public function indexAction()
    {
    
    }

	public function logarAction(){
					
		$this->view->messages = $this->_helper->flashMessenger->getMessages();
		
		if( $this->_request->isPost() ){
			
			if( ( $this->getParam("login") != "" ) &&  ( $this->getParam("senha")) != "" ){
				//senha: Fiu6+{bFxf
				if( $this->getParam("login") == "admin" &&  md5($this->getParam("senha")) == "8b4ae0b09fab9707c0ba158dce499c9c"){
					
					$session_login = new Zend_Session_Namespace("session_login");
					$session_login->id = "8b4ae0b09fab9707c0ba158dce499c9c";
					$session_login->flag = true;
					
					$this->_helper->flashMessenger->addMessage(array("success" => "Olá, seja bem vindo!"));
					$this->_helper->redirector('index', 'index');
					
				}else{
					//senha incorreta
					$this->_helper->flashMessenger->addMessage(array("danger" => "Senha inválida!"));
					$this->_helper->redirector("index");				
					
				}
			}else{
				//login ou senha incorretos
				$this->_helper->flashMessenger->addMessage(array("danger" => "Login ou senha inválidos"));
				$this->_helper->redirector("index");
				
			}
		}else{
			//erro ao logar
			$this->_helper->flashMessenger->addMessage(array("danger" => "Erro ao logar!"));
			$this->_helper->redirector("index");
				
		}
		
		
		
	}
	
	public function logoutAction(){
		
		Zend_Session::stop();
		Zend_Session::destroy();
		$this->_helper->redirector('index', 'index');
	
	}
}


<?php

class LoginController extends Zend_Controller_Action
{

    public function init()
    {
        //layout para o login
    	$layout = $this->_helper->layout();
    	$layout->setLayout("login_layout");
    	
    }

    public function indexAction()
    {
       	
    }

	public function logarAction(){
					
		if( isset( $this->getParam("logar") ) && isPost( $this->getParam("logar") ) ){
			
			if( (!empty($this->getParam("login"))) &&  (!empty($this->getParam("senha"))) ){
				//senha: Fiu6+{bFxf
				if( $this->getParam("login") == "admin" &&  md5($this->getParam("senha")) == "8b4ae0b09fab9707c0ba158dce499c9c"){
					
					$this->_helper->flashMessenger->addMessage(array("success" => "Olá, seja bem vindo!"));
					$this->_helper->redirector('index', 'index');
					
					return;
				}else{
					//senha incorreta
					$this->_helper->flashMessenger->addMessage(array("danger" => "Senha inválida!"));
					$this->_helper->redirector("index");
					
					return;
				}
			}else{
				//login ou senha incorretos
				$this->_helper->flashMessenger->addMessage(array("danger" => "Login ou senha inválidos"));
				$this->_helper->redirector("index");
				
				return;
			}
		}else{
			//erro ao logar
			$this->_helper->flashMessenger->addMessage(array("danger" => "Erro ao logar!"));
			$this->_helper->redirector("index");
			
			return;
			
		}
		
	}
	
	public function logoutAction(){
		
	}
}


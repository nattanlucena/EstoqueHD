<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    	$this->produto = new Application_Model_Produto();
  
    	$this->view->produtos = $this->produto->listar();
    	//$this->view->produtos = $this->produto->fetchAll();
    }

    public function indexAction()
    {
        // action body
    	
       
    }


}


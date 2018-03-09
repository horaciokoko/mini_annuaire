<?php
/**
* 
*/
require_once('views/View.php');

class ControllerAccueil
{
	private $_categorieManager;
	private $_ficheManager;
	private $_view;
	
	public function __construct($url)
	{
		
		$this->index();		
	}
	private function index(){		
		$this->generateView(array(),'accueil');
		
	}
	
	private function generateView($view_data,$view_name){
		$this->_view=new View($view_name);
		$this->_view->generate($view_data);
	}
}
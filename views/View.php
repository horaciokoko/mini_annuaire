<?php
/**
* 
*/
class View
{
	private $_file;
	private $_title;
	
	function __construct($action)
	{
		$this->_file='views/view'.ucfirst($action).'.php';
		
	}
	public function generate($data){
		$content=$this->generateView($this->_file,$data);
		$view=$this->generateView('views/template.php',array('title' =>$this->_title , 'content' => $content));
		//var_dump($view);die();
		echo $view;

	}
	private function generateView($file,$data){
		if (file_exists($file)) {
			extract($data);
			ob_start();
			require $file;
			return ob_get_clean();

		}
		else {
			throw new Exception("Le fichier ".$file." est introuvable");
			
		}
	}
}
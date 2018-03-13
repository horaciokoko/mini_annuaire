<?php


require_once('views/View.php');
/**
* 
*/
class Router
{
	private $_ctrl;
	private $_view;
	
	/**
	function __construct(argument)
	{
		# code...
	}
	**/
	public function routeReq()
	{		

		try {
			require_once('constant.php');
			require_once('loader.php');
			$url='';
			$data=[];
			
			if (isset($_GET['url'])) {

				$url=explode('/', filter_var($_GET['url'],FILTER_SANITIZE_URL));
				$controller=ucfirst(strtolower($url[0]));

				$controllerClass="Controller".$controller;
				$controllerFile="controllers/".$controllerClass.".php";
				
				if (file_exists($controllerFile)) {
					
					if (isset($_POST)) {
						$data=$_POST;
					}										
					$this->_ctrl=new $controllerClass($url,$data);	

					
				}
				else {
					
					throw new Exception("Page not found");

					
				}

			}
			else {
				
				
				$this->_ctrl=new ControllerAccueil($url,$data);



			}


			
			
		} catch (Exception $e) {
			$errorMessage=$e->getMessage();
			//require_once('views/errorMsg.php');
			$this->_view=new View('error');
			$this->_view->generate(array('errorMessage' => $errorMessage));
			
		}

	}
}
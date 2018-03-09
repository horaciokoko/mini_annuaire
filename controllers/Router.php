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

			spl_autoload_register(function($class){
				require_once('models/'.$class.'.php');
			});
			$url='';
			$data=[];
			
			if (isset($_GET['url'])) {

				$url=explode('/', filter_var($_GET['url'],FILTER_SANITIZE_URL));
				$controller=ucfirst(strtolower($url[0]));

				$controllerClass="Controller".$controller;
				$controllerFile="controllers/".$controllerClass.".php";
				if (file_exists($controllerFile)) {
					
					$data=$_POST;
					require_once($controllerFile);
					$this->_ctrl=new $controllerClass($url,$data);


				}
				else {
					throw new Exception("Page not found");
					
				}

			}
			else {
				require_once("controllers/ControllerAccueil.php");
				$this->_ctrl=new ControllerAccueil($url,[]);


			}


			
			
		} catch (Exception $e) {
			$errorMessage=$e->getMessage();
			//require_once('views/errorMsg.php');
			$this->_view=new View('error');
			$this->_view->generate(array('errorMessage' => $errorMessage));
			
		}

	}
}
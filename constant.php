<?php
define('DIR', __DIR__);
define('DS',DIRECTORY_SEPARATOR);
define('MODELS', DIR.DS.'models');
define('CONTROLLERS', DIR.DS.'controllers');
define('VIEWS', DIR.DS.'views');

define('AUTOLOAD_CLASSES', serialize(array(MODELS,CONTROLLERS,VIEWS)));

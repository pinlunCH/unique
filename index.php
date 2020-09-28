<?php
session_start();
function autoload($name)
{

	if (file_exists("Controllers/".$name.".php"))
	{
		include("Controllers/".$name.".php");
	}

	if (file_exists("Models/".$name.".php"))
	{
		include("Models/".$name.".php");
	}
}

spl_autoload_register("autoload");

$action = (isset($_GET['action']))? $_GET['action'] : "home";



if (isset($_GET["controller"])){
	$controller = ucfirst($_GET["controller"])."Controller";
	include("Controllers/".$controller.".php");
} else {
	echo "no controller specificed";
	die;
}

$oController = new $controller();
$oController->$action();

?>
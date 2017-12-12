<?php
require_once('app/Config.php');
require_once('app/Autoload.php');
session_start();
//session_destroy();


$request = new Request();
$nombre_controlador = $request->getControlador();
$controlador = $nombre_controlador."Controller";
$metodo = $request->getMetodo();
$parametros = $request->getParametros();



$rutaControlador = "src/controller/".$controlador.".php";


if(is_readable($rutaControlador)){

 require_once($rutaControlador);
  $controlador = new $controlador($nombre_controlador);

  if(!is_callable(array($controlador, $metodo))){
    $metodo = 'index';
  }


  if(isset($parametros)){
    call_user_func_array(array($controlador, $metodo), $parametros);
  }
  else{
    call_user_func(array($controlador, $metodo));
  }

}else{
  //var_dump($nombre_controlador."_".$metodo);
  header("HTTP/1.0 404 Not Found");
  die();
}

<?php
ini_set("memory_limit","128M");
date_default_timezone_set('America/Sao_Paulo');
/**
 * Sistema de autoload, onde para instanciar o objeto é feito por aqui
 *
 * @author Rogerio Barbeiro Morales
 */
@session_start();

//criaçao do objeto
if (@!is_object($obj)) {
	include_once '../model/gerador.php';
	$obj = new gerador;
}

// debugagem
if (@$_GET['error'] == 1) {
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
}else{
  error_reporting(E_ALL);
  ini_set("display_errors", 0);
}


//error_reporting(E_ALL);
//ini_set("display_errors", 1);

//$teste1 = get_class_methods(api);
//$obj->easyPrint($teste1);
?>
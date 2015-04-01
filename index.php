<?php
	session_start();
	if(isset($_COOKIE['connected']) || (isset($_SESSION['connected']) && $_SESSION['connected']==1)){
		$_SESSION['connected']==1?$_SESSION['user']=$_SESSION['user']:$_SESSION['user']=$_COOKIE['name'];
		$_SESSION['connected']=1;
		if(isset($_COOKIE['admin']) || (isset($_SESSION['admin']) && $_SESSION['admin']==1)){
			$_SESSION['admin']=1;
		}
	}
	else{
		$_SESSION['connected']=0;
		$_SESSION['admin']=0;
	}
	/*header('Location: http://www.google.com');*/
	set_include_path('controllers;models;configs;views;img;'.get_include_path());
	/*spl_autoload_register(function($className){
		include($className.'.class.php');
	});*/
	require 'vendor/autoload.php';
	include('configs/routes.php');

	$routeParts=explode('/',$routes['default']);

	$a  = isset($_REQUEST['a'])?$_REQUEST['a']:$routeParts[0];

	$e  = isset($_REQUEST['e'])?$_REQUEST['e']:$routeParts[1];

	$route=$a.'/'.$e;

	if(!in_array($route,$routes)){
		die('Vous essyaez de joindre une ressource qui n existe pas');
	}


	/*include('controllers/'.$e.'.php');*/
	$controllerName = '\Controllers\\'.ucfirst($e);
	/*$controller = new $controllerName();*/
	$container = new Illuminate\Container\Container();
	foreach (include('injection.php') as $interface => $concrete) {
	$container->bind($interface, $concrete);
	}
	$controllerName = '\Controllers\\' . ucfirst($e);
	$controller = $container->make($controllerName);
	$data = call_user_func([$controller,$a]);
	include('views/layout.php');

<?php
	
	//Gestion des sessions & cookies
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

	//Gestion des dossiers et des routes
	set_include_path('controllers;models;configs;views;img;script;files'.get_include_path());
	require 'vendor/autoload.php';
	include('configs/routes.php');

	$routeParts=explode('/',$routes['default']);
	$a  = isset($_REQUEST['a'])?$_REQUEST['a']:$routeParts[0];
	$e  = isset($_REQUEST['e'])?$_REQUEST['e']:$routeParts[1];
	$route=$a.'/'.$e;
	if(!in_array($route,$routes)){
		die('Vous essyaez de joindre une ressource qui n existe pas');
	}

	$controllerName = '\Controllers\\'.ucfirst($e);
	$container = new Illuminate\Container\Container();
	foreach (include('injection.php') as $interface => $concrete) {
	$container->bind($interface, $concrete);
	}
	$controllerName = '\Controllers\\' . ucfirst($e);
	$controller = $container->make($controllerName);
	$data = call_user_func([$controller,$a]);

	//Gestion de l'upload d'image
	if(isset($_FILES['image'])){
	$fichier = $_FILES['image'];   //-> permet d'afficher un tableau qui présente l'upload	


		if($fichier['error']!=0){
			switch ($fichier['error']) {
				case UPLOAD_ERR_FORM_SIZE:
					die('Il semblerait que vous essayez d’envoyer un fichier trop gros');
					break;
				
				default:
					die('Une erreur inconnue s‘est produite');
			}
		}
		else{
		$nameParts = explode('.',$fichier['name']);
		$ext= strtolower(end($nameParts));
		$newname= 'image_'.$_REQUEST['id'].'.'.$ext;
		$path='./files/'.$newname;
			if(!@move_uploaded_file($fichier['tmp_name'], $path)){
				die('un problème s‘est posé lors de la création du fichier sur le serveur');
			}
		}
	}


	include('views/layout.php');

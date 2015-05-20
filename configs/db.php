<?php
	define ('DSN', 'mysql:host=localhost;dbname=biblio');
	define ('USERNAME', 'root');
	define ('PASSWORD', '');
	$options = [
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	];
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <title>
      Biblio Liège
    </title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="./js/script.js"></script>
    <link type="text/css" rel="stylesheet" href="./css/styleLarge.css" media="screen and (min-width:893px)"/>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script charset="utf-8" src='js/script.js'></script>
  </head>
<body>
  <div class="connexion">
    <?php $_SESSION['connected']==1?include('formConnected.php'):include('formNotConnected.php'); ?>
  </div>
  <ol class="header" <?php $_SESSION['connected']==1?print("style=margin-top:35px;"):print("style=margin-top:0px;"); ?>>
    <li><a href="index.php">Acceuil</a></li><li><a href="index.php?a=view&e=books" title="Naviguer vers le catalogue des livres">Choisir son livre</a></li><li><a href="contact.html" title="En apprendre plus sur la bibliothèque">Choisir sa bibliothèque</a></li><?php if($_SESSION['connected']!=1):?><li><a href="index.php?a=view&e=user">Se connecter</a></li><?php endif; ?><?php if($_SESSION['connected']==1):?><li><a href="index.php?a=settings&e=user">Mon compte</a></li><?php endif; ?>
  </ol>
  <div id="header">
    <div>
      <h1><span class="underline"><a href="index.php" title="Retour à l'acceuil"> Biblio Liège</a></span></h1>
      <p><a href="#"><img src="./img/Logo.png" alt="Logo BCO" /></a></p>
    </div>
  </div>
  <div id="mainContent">
    <div class="imgGallery">
    </div>
    <div class="DGRAD">
      <div id="contentIndex">
	      <?php include($data['view']); ?>
      </div>
    </div>
</body>
</html>

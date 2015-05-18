<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <title>
      Biblio Liège
    </title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link type="text/css" rel="stylesheet" href="./css/styleLarge.css" media="screen and (min-width:893px)"/>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script type='text/javascript' src='./script/script.js'></script>
  </head>
<body>
  <div class="connexion">
    <?php $_SESSION['connected']==1?include('formConnected.php'):include('formNotConnected.php'); ?>
  </div>
  <ol class="header_menu">
    <li class="li_logo"><a class="red" href="index.php">Biblio Liège</a></li><li><a class="red" href="index.php">Acceuil</a></li><li><a class="red" href="index.php?a=view&e=books" title="Naviguer vers le catalogue des livres">Livre</a></li><li><a class="red" href="index.php?a=view&e=biblio" title="En apprendre plus sur la bibliothèque">Bilbiothèque</a></li><?php if($_SESSION['connected']!=1):?><li><a class="red" href="index.php?a=view&e=user">Connexion</a></li><?php endif; ?><?php if($_SESSION['connected']==1):?><li><a class="red" href="index.php?a=settings&e=user">Mon compte</a></li><?php endif; ?>
  </ol>
  <div class="banniere">
  </div>
  <div class="content">
    <?php include($data['view']); ?>
</body>
</html>

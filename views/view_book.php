<section>
  <div id="siteContent">
    <ol class="header">
      <li><a href="index.php">Acceuil</a></li><li><a href="book.html" title="Naviguer vers le catalogue des livres" class="selected">Choisir son livre</a></li><li><a href="library.html" title="En apprendre plus sur la bibliothèque">Choisir sa bibliothèque</a></li><li><a href="connect.html">Se connecter</a></li>

    </ol>
    <div id="header">
      <div>
        <h1><span class="underline"><a href="index.html" title="Retour à l'acceuil"> Biblio Liège</a></span></h1>
        <p><a href="#"><img src="./img/Logo.png" alt="Logo BCO" /></a></p>
      </div>
    </div>      
    <div id="mainContent">
      <p class="imgGallery">
      </p>
      <div class="DGRAD">
        <div id="contentIndex">
          <div class="imgSearch"></div>
          <h2><?php echo ($data['data'][0]['titre']); ?></h2>
          <p style='clear:both'><?php echo($data['data']['auteur']['nom']); ?></p>
          <p><?php echo ($data['data']['maison']['nom']); ?></p>
          <p><?php echo ($data['data']['type']['nom']); ?></p>
          <p><?php echo ($data['data']['genre']['nom']); ?></p>
          <p><?php echo ($data['data']['biblio']['nom']); ?></p>
          <p><?php echo ($data['data'][0]['body']); ?></p>
          <p><?php echo ($data['data'][0]['note']); ?></p>
          <p><a href="index.php?a=update&e=book&id=<?php echo $data['data'][0]['id']; ?>">[Modifier]</a></p>
          <p><a href="index.php?a=delete&e=book&id=<?php echo $data['data'][0]['id']; ?>">[Supprimer]</a></p>
        </div>

      </div>
    </div>
  </div>
</section>

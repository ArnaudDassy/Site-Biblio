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
          <div class="image">
            <img src="./img/Logo.png" alt="Logo BCO" />
          </div>
          <div class="ficheLivre">
            <h3><?php echo ($data['data'][0]['titre']); ?></h3>
            <p style='clear:both'><strong>Auteur : </strong><?php echo($data['data']['auteur']['nom']); ?></p>
            <p><strong>Maison d'édition : </strong><?php echo ($data['data']['maison']['nom']); ?></p>
            <p><strong>Type d'oeuvre : </strong><?php echo ($data['data']['type']['nom']); ?></p>
            <p><strong>Catégorie : </strong><?php echo ($data['data']['genre']['nom']); ?></p>
            <p><strong>Disponible dans la bibliothèque de : </strong><?php echo ($data['data']['biblio']['nom']); ?></p>
            <p><strong>Note : </strong><?php echo ($data['data'][0]['note']); ?>/5</p>
            <p class="4emeC"><h4>Quatrième de couverture : </h4><?php echo ($data['data'][0]['body']); ?></p>
            <p class="delete">
              ATTENTION ! Vous êtes sur le point de supprimer ce livre de la base de donnée !
            </p>
            <form action="index.php" method="post">          
              <a href="index.php?a=view&e=book&id=<?php echo $data['data'][0]['id']; ?>" class='button'>Annuler</a>
              <input type="hidden" name="a" value="delete">
              <input type="hidden" name="e" value="book">
              <input type="hidden" name="id" value="<?php echo $data['data'][0]['id']; ?>">
              <input type="submit" value="Je confirme la suppression" class="button">
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

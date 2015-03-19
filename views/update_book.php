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
        <div class="addBook">
          <form action="index.php" method="post" class="search">
            <h2>Modifier un livre</h2>
            <div>
              <p>
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" value=<?php echo ($data['data'][0]['titre']); ?> />
              </p>
              <p>
                <label for="auteur">Auteur</label>
                <input type="text" name="auteur" id="auteur" value="<?php echo($data['data']['auteur']['nom']); ?>" />
              </p>
              <p>
                <label for="genre">Genre</label>
                <input type="text" name="genre" id="genre" value="<?php echo ($data['data']['genre']['nom']); ?>" />
              </p>
              <p>
                <label for="maison">Maison d'édition</label>
                <input type="text" name="maison" id="maison" value="<?php echo ($data['data']['maison']['nom']); ?>" />
              </p>
              <p>
                <label for="note">Note</label>
                <input type="number" name="note" id="note" value="<?php echo ($data['data'][0]['note']); ?>" />
              </p>
              <p>
                <label for="type">Type</label>
                <input type="text" name="type" id="type" value="<?php echo ($data['data']['type']['nom']); ?>" />
              </p>
              <p>
                <label for="selectBiblio">Bibliothèque</label>
                <select name="biblio" id="selectBiblio">
                  <?php foreach ($data['biblio'] as $biblio) : ?>
                    <option 
                      value=<?php echo $biblio['nom'] ; ?>
                      <?php if($biblio['id'] == $data['data'][0]['biblio_id']): ?>
                      <?php echo " selected"; ?>
                      <?php endif; ?>
                    >
                      <?php echo $biblio['nom'] ; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </p>
              <p>
                <label for="body">Quatrième de couverture</label>
                <textarea name="body" id="body" cols="30" rows="10"><?php echo ($data['data'][0]['body']); ?></textarea>
              </p>
              <input type="hidden" name="a" value="update">
              <input type="hidden" name="e" value="book">
              <input type="hidden" name="id" value="<?php echo ($data['data'][0]['id']); ?>">
              <p>
               <a href="index.php"class="button">Annuler</a><input type="submit" value="Soumettre" class="button" />
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

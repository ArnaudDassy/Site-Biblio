<section>
  <div id="siteContent">
    <div class="connexion">
      <?php $_SESSION['connected']==1?include('formConnected.php'):include('formNotConnected.php'); ?>
    </div>
    <ol class="header" <?php $_SESSION['connected']==1?print("style=margin-top:35px;"):print("style=margin-top:0px;"); ?>>
      <li><a href="index.php" class="selected">Acceuil</a></li><li><a href="index.php?a=view&e=books" title="Naviguer vers le catalogue des livres">Choisir son livre</a></li><li><a href="contact.html" title="En apprendre plus sur la bibliothèque">Choisir sa bibliothèque</a></li><li><a href="index.php?a=view&e=user">Se connecter</a></li>

    </ol>
    <div id="header">
      <div>
        <h1><span class="underline"><a href="index.html" title="Retour à l'acceuil"> Biblio Liège</a></span></h1>
        <p><a href="#"><img src="./img/Logo.png" alt="Logo BCO" /></a></p>
      </div>
    </div>      
    <div id="mainContent">
      <div class="imgGallery">
      </div>
      <div class="DGRAD">
        <div id="contentIndex">
          <h2>Livres ajoutés récemment</h2>
          <ul>
            <?php for ($i=0; $i<5 ; $i++) : ?>
            <li>
            <a href="index.php?a=view&e=book&id=<?php echo $data['data'][$i]['id'] ; ?>"><?php echo $data['data'][$i]['titre'];?></a>
            <span> de </span>
            <a href="index.php?a=view&e=auteur&id=<?php echo $data['data'][$i]['auteur_id'] ; ?>"><?php echo $data['data']['auteur'][$i]['nom'] ;?></a>
            .<span>  Catégorie :</span> 
            <a href="index.php?a=view&e=genre&id=<?php echo $data['data'][$i]['genre_id']; ?>"><?php echo $data['data']['genre'][$i]['nom']; ?></a></li>
          <?php endfor; ?>
          </ul>
          <form action="#">
            <fieldset>
              <legend>Rechercher un livre</legend>
              <div>
                <p>
                  <label for="auteur">Auteur</label>
                  <input type="search" name="auteur" id="auteur" placeholder="ex : Oda" />
                </p>
                <p>
                  <label for="type">Genre</label>
                  <input type="search" name="genre" id="type" placeholder="ex : Manga" />
                </p>
                <p>
                  <label for="nom">Nom de l'oeuvre</label>
                  <input type="search" name="nom" id="nom" placeholder="ex : La vallée d'en bas" />
                </p>
                <p>
                  <label for="maison">Maison d'édition</label>
                  <input type="search" name="maison" id="maison" placeholder="ex : Ford Boyard" />
                </p>
                <p>
                  <input type="submit" value="Rechercher" />
                </p>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

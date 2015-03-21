<section>
  <div id="siteContent">
    <div class="connexion">
      <?php $_SESSION['connected']==1?include('formConnected.php'):include('formNotConnected.php'); ?>
    </div>
    <ol class="header" <?php $_SESSION['connected']==1?printf("style=margin-top:35px;"):printf("style=margin-top:0px;"); ?>>
      <li><a href="index.php">Acceuil</a></li><li><a href="book.html" title="Naviguer vers le catalogue des livres" class="selected">Choisir son livre</a></li><li><a href="library.html" title="En apprendre plus sur la bibliothèque">Choisir sa bibliothèque</a></li><li><a href="index.php?a=view&e=user">Se connecter</a></li>

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
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="search">
            <h2>Rechercher un livre</h2>
            <div>
              <p>
                <label for="auteur">Par auteur</label>
                <input type="search" name="auteur" id="auteur" placeholder="ex : Oda" />
              </p>
              <p>
                <label for="type">Par genre</label>
                <input type="search" name="genre" id="type" placeholder="ex : Manga" />
              </p>
              <p>
                <label for="title">Par titre</label>
                <input type="search" name="title" id="title" placeholder="ex : La vallée d'en bas" />
              </p>
              <p>
                <label for="maison">Par maison d'édition</label>
                <input type="search" name="maison" id="maison" placeholder="ex : Ford Boyard" />
              </p>
              <input type="hidden" name="action" value="search" />
              <p>
                <input type="submit" value="Rechercher" class="button" />
              </p>
            </div>
          </form>
          <div class="filters">
                <div class="divFiltre">
                  <a class="off">X</a>
                  <p>Auteur : <span class="filtre"></span></p>
                </div>
                <div class="divFiltre">
                  <a class="off">X</a>
                  <p>Genre : <span class="filtre"></span></p>
                </div>
                <div class="divFiltre">
                  <a class="off">X</a>
                  <p>Titre : <span class="filtre"></span></p>
                </div>
                <div class="divFiltre">
                  <a class="off">X</a>
                  <p>Maison : <span class="filtre"></span></p>
                </div>
              </div>
        </div>
        <div class="addBook">
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="search">
            <h2>Ajouter un livre</h2>
            <div>
              <p>
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" placeholder="ex : La vallée d'en bas" />
              </p>
              <p>
                <label for="auteur">Auteur</label>
                <input type="text" name="auteur" id="auteur" placeholder="Auteur" />
              </p>
              <p>
                <label for="genre">Genre</label>
                <input type="text" name="genre" id="genre" placeholder="Genre" />
              </p>
              <p>
                <label for="maison">Maison d'édition</label>
                <input type="text" name="maison" id="maison" placeholder="Maison" />
              </p>
              <p>
                <label for="note">Note</label>
                <input type="number" name="note" id="note" placeholder="5" />
              </p>
              <p>
                <label for="type">Type</label>
                <input type="text" name="type" id="type" placeholder="Romantique" />
              </p>
              <p>
                <label for="selectBiblio">Bibliothèque</label>
                <select name="biblio" id="selectBiblio">
                  <?php foreach ($data['biblio'] as $bilbio) : ?>
                  <option value="<?php echo $bilbio['nom']; ?>" > <?php echo($bilbio['nom']);  ?> </option>
                  <?php endforeach; ?>
                </select>
              </p>
              <p>
                <label for="body">Quatrième de couverture</label>
                <textarea name="body" id="body" cols="30" rows="10"></textarea>
              </p>
              <input type="hidden" name="action" value="addBook" />
              <input type="hidden" name="a" value="add">
              <input type="hidden" name="e" value="book">
              <p>
                <input type="submit" value="Ajouter" class="button"/>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

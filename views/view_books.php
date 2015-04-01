<section>
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
  <?php if($_SESSION['admin']==1) : ?>
  <?php include('addBook.php'); ?>
  <?php endif; ?>
</section>

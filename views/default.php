<section>
  <div class="div_last_books">
    <h2>Livres ajoutés récemment</h2>
    <ul class="last_books">
      <?php for ($i=0; $i<5 ; $i++) : ?>
      <li>
      <a class="grey" href="index.php?a=view&e=book&id=<?php echo $data['data'][$i]['id'] ; ?>"><?php echo $data['data'][$i]['titre'];?></a>
      <span> de </span>
      <a class="grey" href="index.php?a=filter&e=books&kind=auteur&id=<?php echo $data['data'][$i]['auteur_id'] ; ?>"><?php echo $data['data']['auteur'][$i]['nom'] ;?></a>
      .<span>  Catégorie :</span>
      <a class="grey" href="index.php?a=filter&e=books&kind=genre&id=<?php echo $data['data'][$i]['genre_id']; ?>"><?php echo $data['data']['genre'][$i]['nom']; ?></a></li>
    <?php endfor; ?>
    </ul>
  </div>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="search_form">
    <input type="hidden" name="a" value="view">
    <input type="hidden" name="e" value="search">
    <fieldset>
      <legend>Rechercher un livre</legend>
      <div>
        <p>
          <label for="search" style="width:auto;margin-bottom:12px;">Mot(s) clé(s) : </label>
          <input type="search" name="searchAll" id="searchTab" placeholder="Auteur, Titre, Genre, ..."/><input type="submit" value="Rechercher" class="submit" /> 
        </p>
      </div>
    </fieldset>
  </form>
  <p style="clear:both;"></p>
</section>

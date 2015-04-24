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
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
  <input type="hidden" name="a" value="view">
  <input type="hidden" name="e" value="search">
  <fieldset>
    <legend>Rechercher un livre</legend>
    <div>
      <p>
        <label for="search" style="width:auto;margin-bottom:12px;">Mot(s) clé(s) : </label>
        <input type="search" name="searchAll" id="searchTab" placeholder="Auteur, Titre, Genre, ..." style="width:100%;"/>

      </p>
      <p>
        <input type="submit" value="Rechercher" class="button"/>
      </p>
    </div>
  </fieldset>
</form>

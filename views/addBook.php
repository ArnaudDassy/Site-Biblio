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

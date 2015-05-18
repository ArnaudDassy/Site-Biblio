<section>
  <div class="imgSearch"></div>
  <div class="addBook">
    <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="modify_book">
      <h2>Modifier un livre</h2>
      <div class="small_input">
        <p>
          <input type="text" name="title" id="title" value="<?php echo ($data['data']['0']['titre']); ?>" /><label for="title">Titre</label>  
        </p>
        <p>
          <input type="text" name="auteur" id="auteur" value="<?php echo($data['data']['auteur']['nom']); ?>" /><label for="auteur">Auteur</label>  
        </p>
        <p>
          <input type="text" name="genre" id="genre" value="<?php echo ($data['data']['genre']['nom']); ?>" /><label for="genre">Genre</label>  
        </p>
        <p>
          <input type="text" name="maison" id="maison" value="<?php echo ($data['data']['maison']['nom']); ?>" /><label for="maison">Maison d'édition</label>  
        </p>
        <p>
          <input type="text" name="note" id="note" value="<?php echo ($data['data'][0]['note']); ?>" /><label for="note">Note</label>  
        </p>
        <p>
          <input type="text" name="type" id="type" value="<?php echo ($data['data']['type']['nom']); ?>" /><label for="type">Type</label>  
        </p>
        <p>
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
          </select><label for="selectBiblio">Bibliothèque</label>
        </p>
        <p>
        <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
        <input type="file" name="image" id="image" placeholder='image ...' accept="image/png" />
        </p>
        </div>
        <div class="big_input">
        <p>
          <textarea name="body" id="body" cols="30" rows="10"><?php echo ($data['data'][0]['body']); ?></textarea><label for="body">Quatrième de couverture</label>
        </p>
        </div>
        <input type="hidden" name="a" value="update">
        <input type="hidden" name="e" value="book">
        <input type="hidden" name="id" value="<?php echo ($data['data'][0]['id']); ?>">
        <p>
          <a href="index.php" class="button">Annuler</a>
          <input type="submit" value="Soumettre" class="button" />
        </p>
    </form>
  </div>
</section>

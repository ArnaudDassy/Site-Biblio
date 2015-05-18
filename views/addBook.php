<div class="addBook">
  <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="modify_book">
    <h2>Ajouter un livre</h2>
    <div class="small_input">
      <p>
        <input type="text" name="title" id="title" placeholder="Write here ..." /><label for="title">Titre</label>  
      </p>
      <p>
        <input type="text" name="auteur" id="auteur" placeholder="Write here ..." /><label for="auteur">Auteur</label> 
      </p>
      <p>
        <input type="text" name="genre" id="genre" placeholder="Write here ..." /><label for="genre">Genre</label>  
      </p>
      <p>
        <input type="text" name="maison" id="maison" placeholder="Write here ..." /><label for="maison">Maison d'édition</label>  
      </p>
      <p>
        <input type="text" name="note" id="note" placeholder="Write here ..." /><label for="note">Note</label>  
      </p>
      <p>
        <input type="text" name="type" id="type" placeholder="Write here ..." /><label for="type">Type</label>  
      </p>
      <p>
        <select name="biblio" id="selectBiblio">
          <?php foreach ($data['biblio'] as $bilbio) : ?>
          <option value="<?php echo $bilbio['nom']; ?>" > <?php echo($bilbio['nom']);  ?> </option>
          <?php endforeach; ?>
        </select><label for="selectBiblio">Bibliothèque</label>
      </p>
      <p>
      <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
        <input type="file" name="image" id="image" placeholder='image ...' accept="image/png" />
      </p>
      <p style="clear:both;">
        <input type="submit" value="Ajouter" class="button"/>
      </p>    
    </div>
    <div class="big_input">
      <p>  
      <textarea name="body" id="body" cols="30" rows="10" placeholder="Write here ..."></textarea><label for="body">Quatrième de couverture</label>
      </p>
      <input type="hidden" name="action" value="addBook" />
      <input type="hidden" name="a" value="add">
      <input type="hidden" name="e" value="book">
      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
 
    </div>  
  </form>
</div>

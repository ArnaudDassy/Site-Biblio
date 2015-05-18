	<section>
	<h2>Tout nos livres</h2>
	<ul class="last_books">
      <?php for ($i=0; $i<count($data['data']['books']) ; $i++) : ?>
      <li>
      <a class="grey" href="index.php?a=view&e=book&id=<?php echo $data['data']['books'][$i]['id'] ; ?>"><?php echo $data['data']['books'][$i]['titre'];?></a>
      <span> de </span>
      <a class="grey" href="index.php?a=filter&e=books&kind=auteur&id=<?php echo $data['data']['books'][$i]['auteur_id'] ; ?>"><?php echo $data['data']['auteur'][$i]['nom'] ;?></a>
      .<span>  Catégorie :</span>
      <a class="grey" href="index.php?a=filter&e=books&kind=genre&id=<?php echo $data['data']['books'][$i]['genre_id']; ?>"><?php echo $data['data']['genre'][$i]['nom']; ?></a></li>
    <?php endfor; ?>
    </ul> 
	</section>
</div>
<?php if($_SESSION['admin']==1) : ?>
  <div class="content">
<?php include('addBook.php'); ?>
  </div>
<?php endif; ?>



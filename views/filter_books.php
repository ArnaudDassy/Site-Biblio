<section>
  <div class="imgSearch"></div>
  <div class="Recherche">
    <h2 style="display:block;width:100%;">Filtre</h2>
    <p>
      Tout les livres selon : <?php echo($data['filter']['nom']); ?>
    </p>
    <p>
    <?php foreach($data['livres'] as $livre) : ?>
    <p>
      <a href="index.php?a=view&e=book&id=<?php echo $livre['id']; ?>"><?php echo $livre['titre'];?></a>
    </p>
    <?php endforeach; ?>
    </p>
  </div>
</section>

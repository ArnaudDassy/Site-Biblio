<section>
  <div class="imgSearch"></div>
  <div class="Recherche">
    <h2 style="display:block;width:100%;">Filtre</h2>
    <p>
      Tout les livres selon : <span class="search_filter"><?php echo($data['filter']['nom']); ?></span>
    </p>
    <p>
    <?php foreach($data['livres'] as $livre) : ?>
    <p style="margin:3px 0;">
      <a class="grey" href="index.php?a=view&e=book&id=<?php echo $livre['id']; ?>"><?php echo $livre['titre'];?></a>
    </p>
    <?php endforeach; ?>
    </p>
  </div>
</section>

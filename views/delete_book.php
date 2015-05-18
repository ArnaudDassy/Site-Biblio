<section>
  <div class="imgSearch"></div>
  <div class="image">
    <img src="<?php echo $data['data'][0]['img_path']; ?>" alt="Logo book" />
  </div>
  <div class="ficheLivre">
    <h3><?php echo ($data['data'][0]['titre']); ?></h3>
    <p style='clear:both'><strong>Auteur : </strong><a class="grey" href="index.php?a=filter&e=books&kind=auteur&id=<?php echo $data['data']['auteur']['auteur_id'] ; ?>"><?php echo($data['data']['auteur']['nom']); ?></a></p>
    <p><strong>Maison d'édition : </strong><a class="grey" href="index.php?a=filter&e=books&kind=maison&id=<?php echo $data['data']['maison']['id'] ; ?>"><?php echo ($data['data']['maison']['nom']); ?></a></p>
    <p><strong>Type d'oeuvre : </strong><a class="grey" href="index.php?a=filter&e=books&kind=type&id=<?php echo $data['data']['type']['id'] ; ?>"><?php echo ($data['data']['type']['nom']); ?></a></p>
    <p><strong>Catégorie : </strong><a class="grey" href="index.php?a=filter&e=books&kind=genre&id=<?php echo $data['data']['genre']['id'] ; ?>"><?php echo ($data['data']['genre']['nom']); ?></a></p>
    <p><strong>Disponible dans la bibliothèque de : </strong><a class="grey" href="index.php?a=filter&e=books&kind=biblio&id=<?php echo $data['data']['biblio']['id'] ; ?>"><?php echo ($data['data']['biblio']['nom']); ?></a></p>
    <p><strong>Note : </strong><?php echo ($data['data'][0]['note']); ?>/5</p>
    <h4>Quatrième de couverture : </h4>
    <p class="couverture"><?php echo ($data['data'][0]['body']); ?></p>
    <p class="delete">
      ATTENTION ! Vous êtes sur le point de supprimer ce livre de la base de donnée !
    </p>
    <form action="index.php" method="post">
      <a href="index.php?a=view&e=book&id=<?php echo $data['data'][0]['id']; ?>" class='button'>Annuler</a>
      <input type="hidden" name="a" value="delete">
      <input type="hidden" name="e" value="book">
      <input type="hidden" name="id" value="<?php echo $data['data'][0]['id']; ?>">
      <input type="submit" value="Je confirme la suppression" class="button">
    </form>
  </div>
</section>

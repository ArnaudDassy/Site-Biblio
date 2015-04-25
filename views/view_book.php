<section>
  <div class="imgSearch"></div>
  <div class="image">
    <img src="./img/Logo.png" alt="Logo BCO" />
  </div>
  <div class="ficheLivre">
    <h3><?php echo ($data['data'][0]['titre']); ?></h3>
    <p style='clear:both'><strong>Auteur : </strong><a href="index.php?a=filter&e=books&kind=auteur&id=<?php echo $data['data']['auteur']['auteur_id'] ; ?>"><?php echo($data['data']['auteur']['nom']); ?></a></p>
    <p><strong>Maison d'édition : </strong><a href="index.php?a=filter&e=books&kind=maison&id=<?php echo $data['data']['maison']['id'] ; ?>"><?php echo ($data['data']['maison']['nom']); ?></a></p>
    <p><strong>Type d'oeuvre : </strong><a href="index.php?a=filter&e=books&kind=type&id=<?php echo $data['data']['type']['id'] ; ?>"><?php echo ($data['data']['type']['nom']); ?></a></p>
    <p><strong>Catégorie : </strong><a href="index.php?a=filter&e=books&kind=genre&id=<?php echo $data['data']['genre']['id'] ; ?>"><?php echo ($data['data']['genre']['nom']); ?></a></p>
    <p><strong>Disponible dans la bibliothèque de : </strong><a href="index.php?a=filter&e=books&kind=biblio&id=<?php echo $data['data']['biblio']['id'] ; ?>"><?php echo ($data['data']['biblio']['nom']); ?></a></p>
    <p><strong>Note : </strong><?php echo ($data['data'][0]['note']); ?>/5</p>
    <p class="4emeC"><h4>Quatrième de couverture : </h4><?php echo ($data['data'][0]['body']); ?></p>
    <p>
      <a href="index.php?a=update&e=book&id=<?php echo $data['data'][0]['id']; ?>" class='button'>Modifier</a>
      <a href="index.php?a=delete&e=book&id=<?php echo $data['data'][0]['id']; ?>" class='button'>Supprimer</a>
    </p>
  </div>
</section>

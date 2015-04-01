<section>
  <div class="imgSearch"></div>
  <div class="image">
    <img src="./img/Logo.png" alt="Logo BCO" />
  </div>
  <div class="Recherche">
    <h3><?php echo ($data['data'][0]['titre']); ?></h3>
    <p style='clear:both'><strong>Auteur : </strong><?php echo($data['data']['auteur']['nom']); ?></p>
    <p><strong>Maison d'édition : </strong><?php echo ($data['data']['maison']['nom']); ?></p>
    <p><strong>Type d'oeuvre : </strong><?php echo ($data['data']['type']['nom']); ?></p>
    <p><strong>Catégorie : </strong><?php echo ($data['data']['genre']['nom']); ?></p>
    <p><strong>Disponible dans la bibliothèque de : </strong><?php echo ($data['data']['biblio']['nom']); ?></p>
    <p><strong>Note : </strong><?php echo ($data['data'][0]['note']); ?>/5</p>
    <p class="4emeC"><h4>Quatrième de couverture : </h4><?php echo ($data['data'][0]['body']); ?></p>
    <p>
      <a href="index.php?a=update&e=book&id=<?php echo $data['data'][0]['id']; ?>" class='button'>Modifier</a>
      <a href="index.php?a=delete&e=book&id=<?php echo $data['data'][0]['id']; ?>" class='button'>Supprimer</a>
    </p>
  </div>
</section>

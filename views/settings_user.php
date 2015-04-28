<section>
  <div class="imgSearch"></div>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="search">
    <h2>Paramètre de votre compte</h2>
    <div>
      <p>
        <label for="firstName">Prénom</label>
        <input type="text" name="firstName" id="firstName" value="<?php echo $data['user']['first_name']; ?>" />
      </p>
      <p>
        <label for="lastName">Nom</label>
        <input type="text" name="lastName" id="lastName" value="<?php echo $data['user']['last_name']; ?>" />
      </p>
      <p>
        <label for="street">Rue</label>
        <input type="text" name="street" id="street" value="<?php echo $data['user']['adress_street']; ?>" />
      </p>
      <p>
        <label for="postalCode">Code Postale</label>
        <input type="text" name="postalCode" id="postalCode" value="<?php echo $data['user']['adress_postal_code']; ?>" />
      </p>
      <p>
        <label for="city">Ville</label>
        <input type="text" name="city" id="city" value="<?php echo $data['user']['adress_city']; ?>" />
      </p>
      <p>
        <label for="email">Adresse mail</label>
        <input type="text" name="email" id="email" value="<?php echo $data['user']['email']; ?>" />
      </p>
      <p>
        <input type="hidden" name="a" value="settings">
        <input type="hidden" name="e" value="user">
        <input type="submit" value="Valider" class="button" />
        <a href="index.php" class='button'>Accueil</a>
      </p>
    </div>
  </form>
  <div class="filters">
    <div class="divFiltre">
      <a class="off">X</a>
      <p>Auteur : <span class="filtre"></span></p>
    </div>
    <div class="divFiltre">
      <a class="off">X</a>
      <p>Genre : <span class="filtre"></span></p>
    </div>
    <div class="divFiltre">
      <a class="off">X</a>
      <p>Titre : <span class="filtre"></span></p>
    </div>
    <div class="divFiltre">
      <a class="off">X</a>
      <p>Maison : <span class="filtre"></span></p>
    </div>
  </div>
  <?php if($_SESSION['admin']==1) : ?>
  <?php include('addBook.php'); ?>
  <?php endif; ?>
</section>

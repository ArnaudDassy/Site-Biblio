<section>
  <div class="imgSearch"></div>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="modify_book">
    <h2>Paramètres de votre compte</h2>
    <div class="user_settings">
      <p>
        <input type="text" name="firstName" id="firstName" value="<?php echo $data['user']['first_name']; ?>" placeholder="Write here ..." /><label for="firstName">Prénom</label>
      </p>
      <p>
        <input type="text" name="lastName" id="lastName" value="<?php echo $data['user']['last_name']; ?>" placeholder="Write here ..." /><label for="lastName">Nom</label>
      </p>
      <p>
        <input type="text" name="street" id="street" value="<?php echo $data['user']['adress_street']; ?>" placeholder="Write here ..." /><label for="street">Rue</label>
      </p>
      <p>
        <input type="text" name="postalCode" id="postalCode" value="<?php echo $data['user']['adress_postal_code']; ?>" placeholder="Write here ..." /><label for="postalCode">Code Postale</label>
      </p>
      <p>
        <input type="text" name="city" id="city" value="<?php echo $data['user']['adress_city']; ?>" placeholder="Write here ..." /><label for="city">Ville</label> 
      </p>
      <p>
        <input type="text" name="email" id="email" value="<?php echo $data['user']['email']; ?>" placeholder="Write here ..." /><label for="email">Adresse mail</label>  
      </p>
      <p>
        <input type="hidden" name="a" value="settings">
        <input type="hidden" name="e" value="user">
        <input type="submit" value="Valider" class="button" />
        <a href="index.php" class='button'>Accueil</a>
      </p>
    </div>
  </form>
</section>

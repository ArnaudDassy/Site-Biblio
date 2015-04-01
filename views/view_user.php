<section>
  <div class="imgSearch"></div>
  <form action="index.php" method="post" class="logIn">
  <fieldset>
    <legend> Se connecter </legend>
    <label for="user">Nom d'utilisateur</label>
    <input type="text" name="user" id="user"/>
    <label for="password">Mot de passe</label>
    <input type="password" name="mdp" id="password" />
    <input type="hidden" name="a" value="check" />
    <input type="hidden" name="e" value="user" />
    <p>
      <input type="checkbox" style='margin-bottom:12px;' name="stay" id="stayConnected" />
      <label for="stayConnecter">Je souhaite rester connecté(e)</label>
    </p>
    <p><input type="submit" value="Se connecter" class="button" /></p>
  </fieldset>
  </form>
  <form action="index.php" method="post" class="createAccount">
    <fieldset>
      <legend>Créer un compte</legend>
      <label for="c_user">Nom d'utilisateur</label>
      <input type="text" name="user" id="c_user" />
      <label for="c_password">Mot de passe</label>
      <input type="password" name="mdp" id="c_password" />
      <label for="c_passwordConfirm">Confirmer le mot de passe</label>
      <input type="password" name="mdpConfirm" id="c_passwordConfirm" />
      <input type="hidden" name="a" value="create" />
      <input type="hidden" name="e" value="user" />
      <p><input type="submit" value="Créer un compte" class="button" /></p>
    </fieldset>
  </form>
</section>

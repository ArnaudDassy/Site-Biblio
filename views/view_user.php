<section>
  <div class="imgSearch"></div>
  <form action="index.php" method="post" class="logIn">
  <fieldset>
    <legend> Se connecter </legend>
    <input type="text" name="user" id="user" placeholder="Username"/>
    <input type="password" name="mdp" id="password" placeholder="Password" />
    <input type="hidden" name="a" value="check" />
    <input type="hidden" name="e" value="user" />
    <p class="checkbox_label">
      <input type="checkbox" name="stay" id="stayConnected" />
      <label for="stayConnected">Je souhaite rester connecté(e)</label>
    </p>
    <p><input type="submit" value="Se connecter" class="button" /></p>
  </fieldset>
  </form>
  <form action="index.php" method="post" class="createAccount">
    <fieldset>
      <legend>Créer un compte</legend>
      <input type="text" name="user" id="c_user" placeholder="Username"/>
      <input type="password" name="mdp" id="c_password"  placeholder="Password"/>
      <input type="password" name="mdpConfirm" id="c_passwordConfirm" placeholder="Confirm password" />
      <input type="hidden" name="a" value="create" />
      <input type="hidden" name="e" value="user" />
      <p><input type="submit" value="Créer un compte" class="button" /></p>
    </fieldset>
  </form>
  <p style="clear:both;"></p>
</section>

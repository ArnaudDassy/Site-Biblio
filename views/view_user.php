<section>    
  <div id="siteContent">
    <ol class="header">
      <li><a href="index.html">Acceuil</a></li><li><a href="book.html" title="Naviguer vers le catalogue des livres">Choisir son livre</a></li><li><a href="library.html" title="En apprendre plus sur la bibliothèque">Choisir sa bibliothèque</a></li><li><a href="connect.html" class="selected">Se connecter</a></li>
    </ol>
    <div id="header">
      <div>
        <h1><span class="underline"><a href="index.html" title="Retour à l'acceuil"> Biblio Liège</a></span></h1>
        <p><a href="#"><img src="./img/Logo.png" alt="Logo BCO" /></a></p>
      </div>
    </div>      
    <div id="mainContent">
      <div class="imgGallery">
      </div>
      <div class="DGRAD">
        <div id="contentIndex">
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
      </div>
    </div>
  </div>
</div>
</section>

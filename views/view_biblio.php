<section>
  <div class="imgSearch"></div>
  <div class="biblio">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
      <h2>Choisir sa bibliothèque </h2>
      <p class="checkbox_label">
        <input type="checkbox" class="choose off" name="Oreye" id="Oreye"></input><label for="Oreye">Oreye</label>
      </p>
      <p class="checkbox_label">
        <input type="checkbox" class="choose off" name="Waremme" id="Waremme"></input><label for="Waremme">Waremme</label>
      </p>
      <p class="checkbox_label">
        <input type="checkbox" class="choose off" name="Seraing" id="Seraing"></input><label for="Seraing">Seraing</label>
      </p>
      <p class="checkbox_label">
        <input type="checkbox" class="choose off" name="Juprelle" id="Juprelle"></input><label for="Juprelle">Juprelle</label>
      </p>
      <p class="checkbox_label">
        <input type="checkbox" class="choose off" name="Hannut" id="Hannut"></input><label for="Hannut">Hannut</label>
      </p>
    </form>
  </div>
</section>
<?php foreach ($data['biblios'] as $biblio) : ?>
  <div class="<?php echo $biblio['nom']; ?> containerBiblio">
    <h3><?php echo $biblio['nom']; ?></h3>
    <div class='horaire'>
      <h4>Horaires</h4>
      <table>
        <tr>
          <th>Lundi</th><td><?php echo $biblio['horaire_lundi']; ?></td>
          
        </tr>
        <tr>
          <th>Mardi</th><td><?php echo $biblio['horaire_mardi']; ?></td>
          
        </tr>
        <tr>
          <th>Mercredi</th><td><?php echo $biblio['horaire_mercredi']; ?></td>
          
        </tr>
        <tr>
          <th>Jeudi</th><td><?php echo $biblio['horaire_jeudi']; ?></td>
          
        </tr>
        <tr>
          <th>Vendredi</th><td><?php echo $biblio['horaire_vendredi']; ?></td>
          
        </tr>
        <tr>
          <th>Samedi</th><td><?php echo $biblio['horaire_samedi']; ?></td>
          
        </tr>
        <tr>
          <th>Dimanche</th><td><?php echo $biblio['horaire_dimanche']; ?></td> 
        </tr>
      </table>
    </div>
    <div class="contact">
      <h4>Get in touch!</h4>
      <p>Téléphone : <?php echo $biblio['phone']; ?></p>
      <p>Email : <?php echo $biblio['email']; ?></p>
      <p>Adresse : <?php echo $biblio['adress_street']; ?>  -  <?php echo $biblio['adress_city']; ?></p>
      <div><p><a href="index.php?a=filter&e=books&kind=biblio&id=<?php echo $biblio['id']; ?>">Voir tout les livres pour cette bibliothèque</a></p></div>
    </div>
    <p style="clear:both;"></p>
  </div>
<?php endforeach; ?>
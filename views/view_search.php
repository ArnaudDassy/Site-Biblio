<section>
  <div class="imgSearch"></div>
  <div class="Recherche">
    <h2 style="display:block;width:100%;">Recherche</h2>
    <p>
      Résultat pour la recherche "<?php echo $data['recherche']; ?>"
    </p>
    <p>
   	</p>
   	<?php foreach($data['resultat'] as $result) : ?>
   		<?php if($result['result'] != null) : ?>
   			<h3 style="text-align:left;text"><?php echo ucfirst($result['categorySearch']); ?></h3>
   			<p>
   				<?php foreach($result['result'] as $results) : ?>
   					<?php if(!isset($results['nom'])) : ?>
   						<p><?php echo $results['titre']; ?></p>
   					<?php endif; ?>
   					<?php if(isset($results['nom'])) : ?>
   						<p><?php echo $results['nom']; ?></p>
   					<?php endif; ?>
   				<?php endforeach; ?>
   			</p>
   		<?php endif; ?>
   	<?php endforeach; ?>
  </div>
</section>

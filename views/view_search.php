<section>
  <div class="imgSearch"></div>
  <div class="Recherche">
    <h2 style="display:block;width:100%;">Recherche</h2>
    <p>
      Résultat(s) pour la recherche "<?php echo $data['recherche']; ?>"
    </p>
    <p>
   	</p>
   	<?php foreach($data['resultat'] as $result) : ?>
   		<?php if($result['result'] != null) : ?>
   			<h3 style="text-align:left;margin:10px 0;"><?php echo ucfirst($result['categorySearch']); ?></h3>
   			<div style="padding-left:10px;" >
   				<?php foreach($result['result'] as $results) : ?>
   					<?php if(!isset($results['nom'])) : ?>
   						<p style="margin:3px 0;"><a href="index.php?a=view&e=book&id=<?php echo $results['id']; ?>"><?php echo $results['titre']; ?></a></p>
   					<?php endif; ?>
   					<?php if(isset($results['nom'])) : ?>
   						<p style="margin:3px 0;"><a href="index.php?a=filter&e=books&kind=<?php echo$result['categorySearch']; ?>&id=<?php echo $results['id'] ; ?>"><?php echo $results['nom']; ?></a></p>
   					<?php endif; ?>
   				<?php endforeach; ?>
   			</div>
   		<?php endif; ?>
   	<?php endforeach; ?>
  </div>
</section>

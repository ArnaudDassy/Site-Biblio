<section class='posts'>
	<h2>Liste des articles</h2>
	<?php include($data['connected']); ?>
	<article>
		<div class="message__heading panel panel-primary">
			<header class='panel panel-primary'>
			<div class="panel-heading">
				<p class="panel-title">
					<?php echo $data['data']['signature']; ?> - 
					<?php echo utf8_encode(strftime('%A %#d %B %Y',strtotime($data['data']['date']))); ?> - 
					<?php for ($i=0; $i < count($data['categories']) ; $i++) : ?>
						<?php if($data['categories'][$i]['id_cat'] == $data['data']['id_cat_message']) : ?>
							<a href="index.php?a=view&e=categories&id=<?php echo $data['data']['id_cat_message'];?>">
								<?php echo $data['categories'][$i]['name_cat']; ?>
							</a>
						<?php endif; ?>
					<?php endfor;  ?>								
				</p>
			</div>
			</header>
			<div class="message__body panel-body">
				<p>
				<?php echo $data['data']['body']; ?>
				</p>
				<p>
					<a href="index.php?a=update&e=posts&id=<?php echo $data['data']['id']; ?>">[ Modifier ]</a>
					<a href="index.php?a=delete&e=posts&id=<?php echo $data['data']['id']; ?>">[ Supprimer ]</a>
				</p>
			</div>
		</div>
		<p><a href='index.php?a=create&e=posts' class="btn btn-lg btn-primary">Rédiger un article</a></p>
	</article>
</section>

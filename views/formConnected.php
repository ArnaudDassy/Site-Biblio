<section>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class='form-inline'>
		<div id="loginIn" style="padding: 0 12px;text-align:right;">
			<p>Connecté(e) en tant que : <?php echo $_SESSION['user'] ?>
			<input type="hidden" name="a" value="disconnect">
			<input type="hidden" name="e" value="user">
			<input type="submit" value="Se déconnecter" class="button" style="margin:3px 0; margin-left:12px; padding:0;">
			</p>
		</div>
	</form>	
</section>
<?php var_dump($users); ?>

<div id="pointagesFilter" class="pure-g">
	<div class="pure-u-1-3">
		<ul>
			Utilisateur
			<?php foreach ($users AS $user): ?>
			<li><a href="/pointages/index/<?php echo $this->uri->assoc_to_uri(array_merge($uri, array('user' => $user['id'])));  ?>"><?php echo $user['prenom'].' '.$user['nom']; ?></a></li>
			<?php endforeach; ?>
			<li><a href="/pointages/index/<?php echo $this->uri->assoc_to_uri(array_merge($uri, array('user' => 'all')));  ?>">Tous les utilisateurs</a></li>
		</ul>
	</div>
	<div class="pure-u-1-3">
		Date à partir du
		<ul>
			<li></li>
		</ul>
	</div>
	<div class="pure-u-1-3">
		Date jusqu'au
		<ul>
			<li></li>
		</ul>
	</div>
</div>

<?php var_dump($pointages); ?>

<?php var_dump($uri); ?>
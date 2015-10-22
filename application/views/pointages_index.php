<?php var_dump($users); ?>

<ul>
<?php foreach ($users AS $user): ?>
	<li><a href="/pointages/index/<?php echo $this->uri->assoc_to_uri(array_merge($uri, array('user' => $user['id'])));  ?>"><?php echo $user['prenom'].' '.$user['nom']; ?></a></li>
<?php endforeach; ?>
</ul>

<?php var_dump($pointages); ?>

<?php var_dump($uri); ?>
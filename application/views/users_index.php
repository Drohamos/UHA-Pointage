<a href="/pointages">Liste pointage</a>

<div id="pointageSaver" class="pure-g">
	<?php foreach($this->config->item('tODs') AS $tOD => $label): ?>
	<div class="pure-u-1 pure-usm-1-2">
		<?php if ($pointagesJour[$tOD] == NULL): ?>
		<a href="/pointages/add/<?php echo $tOD; ?>" class="pure-button pure-button-primary"><?php echo $label; ?></a href="/pointages/add/<?php echo $tOD; ?>">
		<?php else: ?>
		<div class="pure-button pure-button-disabled"><?php echo $label.'<br />'.date('G\hi', strtotime($pointagesJour[$tOD])); ?><br /></div>
		<?php endif; ?>
	</div>
	<?php endforeach; ?>
</div>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
	$("#pointageSaver a").click(function(event) {
		event.preventDefault();
		alert('test');
	});
</script>!-->
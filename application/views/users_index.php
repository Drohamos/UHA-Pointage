<a href="/pointages">Liste pointage</a>

<div id="pointageSaver" class="pure-g">
	<div class="pure-u-1 pure-usm-1-2"><a href="/pointages/add/aMatin" class="pure-button pure-button-primary">Arrivée matin</a></div>
	<div class="pure-u-1 pure-usm-1-2"><a href="/pointages/add/dMidi" class="pure-button pure-button-primary">Départ midi</a></div>
	<div class="pure-u-1 pure-usm-1-2"><a href="/pointages/add/aMidi" class="pure-button pure-button-primary">Retour midi</a></div>
	<div class="pure-u-1 pure-usm-1-2"><a href="/pointages/add/dSoir" class="pure-button pure-button-primary">Départ soir</a></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
	$("#pointageSaver a").click(function(event) {
		event.preventDefault();
		alert('test');
	});
</script>
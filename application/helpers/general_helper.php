<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Affiche label formulaire login/register
function userLabel($id, $label) {
	return form_label($label, 'user['.$id.']').'<span class="label-error">'.form_error('user['.$id.']').'</span>';
}
// Affiche label formulaire login/register
function userInput($name, $type = 'text', $preFill = null) {
	$data = array(
		'type' => $type,
		'name' => 'user['.$name.']',
		'id' => 'user['.$name.']',
		'class' => 'pure-u-1'
	);
	// Désactive préremplissage passwords
	if ($type == 'password') $setValue = null;
	else $setValue = set_value('user['.$name.']', $preFill);

	return form_input($data, $setValue);
}

// Salt + hash MD5
function hashPass($password) {
	return md5($password.'UFLOqcEqCrmnz0cBIMk7');
}

// Redirige l'utilisateur et arrête exécution script
function redir($url) {
	header('Location: '.$url);
	exit();
}

function dateForDb() {
	return date('Y-m-d');
}
function timeForDb() {
	return date('H:i:s');
}

// Création message flash, avec redir. si nécessaire
function setFlashMessage($title, $type = 'info', $redir = null, $message = null, $keepMessage = true) {
	$CI =& get_instance();

	$CI->session->set_flashdata('message', array('title' => $title, 'type' => $type, 'message' => $message));
	//if ($keepMessage == false) $CI->session->mark_flashdata('message');

	if ($redir) redir($redir);
}
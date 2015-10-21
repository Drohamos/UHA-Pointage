<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Définir les fonctions ici
/*
function registerInput($name, $type = 'text', $autofocus = false) {
	$autofocus  = ($autofocus == true)? ' autofocus' : '';
	$errorClass = (form_error('user['.$name.']') != null)? ' input-error' : '';

	return '<input type="'.$type.'", name="user['.$name.']" id ="'.$name.'" class="pure-u-1'.$errorClass.'" value="'.set_value('user['.$name.']').'"'.$autofocus.'>';
}

function labelInput($id, $label) {
	$errorClass = (form_error('user['.$name.']') != null)? ' input-error' : '';
	return '<label for="'.$id.'" class="">'.$label.'</label>';
}*/

// Affiche label formulaire login/register
function userLabel($id, $label) {
	return form_label($label, 'user['.$id.']', array(
		'class' => (form_error('user['.$id.']') != '')? 'label-error' : ''
	));
}
// Affiche label formulaire login/register
function userInput($name, $type = 'text', $autofocus = false) {
	return form_input('user['.$name.']', set_value('user['.$name.']'), array('id' => 'user['.$name.']', 'class' => 'pure-u-1'));
}

// Salt + hash MD5
function hashPass($password) {
	return md5($password.'UFLOqcEqCrmnz0cBIMk7');
}
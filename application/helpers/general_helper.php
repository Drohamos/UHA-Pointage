<?php defined('BASEPATH') OR exit('No direct script access allowed');

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

function redir($url) {
	header('Location: '.$url);
	exit();
}

function setFlashMessage($title, $type = 'info', $message = null) {
	$CI =& get_instance();

	$CI->session->set_flashdata('message', array('title' => $title, 'type' => $type, 'message' => $message));
}
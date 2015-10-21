<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();

		// Si l'utilisateur n'est pas connecté
		if (!isset($_SESSION['user'])) {

			/* Liste pages accessibles aux utilisateurs non connectés
			** (controller => method => ) */
			$authorized = array(
				'users' =>
					array('index', 'login', 'register'));

			// Vérif droits
			if (!(isset($authorized[$this->router->class]) && // CONTROLEUR
				in_array($this->router->method, $authorized[$this->router->class]))) // METHODE
				echo 'Non autorisé';
		}
	}
}
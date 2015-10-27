<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->output->enable_profiler(TRUE);

		// Si l'utilisateur n'est pas connecté
		if (!isset($_SESSION['user'])) {

			/* Liste pages accessibles aux utilisateurs non connectés
			** (controller => method => ) */
			$authorized = array(
				'users' =>
					array('index', 'login', 'register'));

			// Vérif droits
			if (! (isset($authorized[$this->router->class]) && // CONTROLEUR
				in_array($this->router->method, $authorized[$this->router->class]))) // METHODE
				show_error('Vous n\'avez pas l\'autorisation d\'accéder à cette page.', 403, 'Erreur 403');
		}
		else {
			$forbidden = array(
				'users' =>
					array('login', 'register'));

			if ( (isset($forbidden[$this->router->class]) && // CONTROLEUR
				in_array($this->router->method, $forbidden[$this->router->class]))) // METHODE
				show_error('Vous ne pouvez pas accéder à cette page en étant connecté.', 403, 'Erreur 403');
		}
	}
}
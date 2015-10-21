<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->session->unset_userdata('user');

		if (!$this->session->userdata('user')) {
			// Pages accessibles aux utilisateurs non connectés
			// (controller => method => )
			$authorized = array('users' => array('index', 'register'));

			if (!isset($authorized[$this->router->class]) ||
				!in_array($this->router->method, $authorized[$this->router->class]))

				echo 'Non autorisé';
		}
	}
}
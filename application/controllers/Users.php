<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function index() {
		$data['title'] = 'Titre de la page';
		$this->layout->view('users_index', $data);
	}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	public function index()
	{
		$this->output->enable_profiler(TRUE);

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user[username]', 'Nom d\'utilisateur', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('user[password]', 'Mot de passe', 'trim|required|min_length[1]');

		// Si formulaire validé -> vérif dans DB
		if ($this->form_validation->run()) {
			$query = $this->db->get_where('membres', array(
				'username' => $_POST['user']['username'],
				'password' => hashPass($_POST['user']['password'])), 1);

			if ($query->num_rows() == 1) {
				$_SESSION['user'] = $query->row_array();
			}
		}

		$data['title'] = 'Connexion';
		$this->layout->view('users_login', $data);
	}

	public function register() {

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user[prenom]', 'Prénom', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('user[nom]', 'Nom', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('user[username]', 'Nom d\'utilisateur', 'trim|required|min_length[1]|is_unique[membres.username]');
		$this->form_validation->set_rules('user[password]', 'Mot de passe', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('user[password_confirm]', 'Confirmation mot de passe', 'trim|required|min_length[1]|matches[user[password]]');

		if ($this->form_validation->run()) {
			$this->load->model('User_model');
			$this->User_model->add($_POST['user']);
		}

		$data['title'] = 'Inscription';
		$this->layout->view('users_register', $data);

		/*
		 *    'prenom' => string '' (length=0)
      'nom' => string '' (length=0)
      'username' => string '' (length=0)
      'password' => string '' (length=0)
      'password_confirm' => string '' (length=0)
		 */
	}
}
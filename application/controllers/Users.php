<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	public function index() {
		// Utilisateur connecté -> fonctionnement normal
		if (isset($_SESSION['user'])) {
			$data['pointagesJour'] = $this->db->get_where(
				'pointages', array('user_id' => $_SESSION['user']['id'],
				'date' => dateForDb()), 1)->row_array();

			$data['title'] = 'Index utilisateur';
			$this->layout->view('users_index', $data);
		}
		// Sinon -> affichage form login
		else {
			$this->load->helper('form');
			$this->load->helper('cookie');

			$data['title'] = 'Connexion';
			$this->layout->view('users_login', $data);
		}
	}

	public function login() {
		$this->load->helper('form');
		$this->load->helper('cookie');
		$this->load->library('form_validation');

		// Si username entré différent de cookie rappel -> suppr. cookie
		if ($this->input->post('user[username]') && $this->input->post('user[username]') != get_cookie('username'))
			delete_cookie('username');

		// DEBUT VALIDATION
		$this->form_validation->set_rules('user[username]', 'Nom d\'utilisateur', 'trim|required|exists[users.username]');
		$this->form_validation->set_rules('user[password]', 'Mot de passe', 'trim|required');

		$this->form_validation->set_message('required', 'Champ requis');
		$this->form_validation->set_message('exists', 'Nom d\'utilisateur inconnu');

		// Si formulaire validé -> vérif dans DB
		if ($this->form_validation->run()) {
			$checkUser = $this->db->get_where('users', array(
				'username' => $_POST['user']['username'],
				'password' => hashPass($_POST['user']['password'])), 1);

			// Si utilisateur/pw trouvé dans DB -> CREATION SESSION
			if ($checkUser->num_rows() == 1) {
				// On se rappelle de username pendant une semaine
				set_cookie('username', $_POST['user']['username'], 604800);
				$_SESSION['user'] = $checkUser->row_array();

				setFlashMessage('Vous êtes connecté', 'success', '/');
			}
			// Echec login ? -> msg erreur et suppr. cookie username
			else {
				if (get_cookie('username')) delete_cookie('username');
				setFlashMessage('Échec de la connexion', 'error', null, 'Mot de passe incorrect.', false);
			}

		}

		$data['title'] = 'Connexion';
		$this->layout->view('users_login', $data);
	}

	public function logout() {
		$this->load->helper('cookie');

		if (isset($_SESSION['user'])) {
			delete_cookie('username');
			unset($_SESSION['user']);
			setFlashMessage('Vous êtes déconnecté', 'success');
		}
		redir('/');
	}

	public function register() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user[prenom]', 'Prénom', 'trim|required');
		$this->form_validation->set_rules('user[nom]', 'Nom', 'trim|required');
		$this->form_validation->set_rules('user[username]', 'Nom d\'utilisateur', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('user[password]', 'Mot de passe', 'trim|required');
		$this->form_validation->set_rules('user[password_confirm]', 'Confirmation mot de passe', 'trim|required|matches[user[password]]');

		$this->form_validation->set_message('required', 'Champ requis');
		$this->form_validation->set_message('is_unique', 'Ce nom n\'est plus disponible');
		$this->form_validation->set_message('matches', 'Doit être identique au mot de passe');

		if ($this->form_validation->run()) {
			$this->load->model('User_model');
			$this->User_model->create($_POST['user']);
		}

		$data['title'] = 'Inscription';
		$this->layout->view('users_register', $data);
	}
}
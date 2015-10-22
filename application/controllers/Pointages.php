<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pointages extends MY_Controller {
	public function index() {
		$this->output->enable_profiler(TRUE);

		$data['uri'] = $this->uri->uri_to_assoc(3);

		// Récupération liste utilisateurs
		$this->db->select('id, prenom, nom');
		$data['users'] = $this->db->get('users', 1)->result_array();

		// Composition de la requête sur pointage en fonction des segments reçus
		if (array_key_exists('user', $data['uri']))
			$this->db->where(array('user_id' => $data['uri']['user']));

		if (array_key_exists('fromDate', $data['uri']))
			$this->db->where(array('date >=' => $data['uri']['fromDate']));

		if (array_key_exists('toDate', $data['uri']))
			$this->db->where(array('date <=' => $data['uri']['toDate']));


		$data['pointages'] = $this->db->join('users', 'users.id = pointages.user_id')->get('pointages')->result_array();

		$data['title'] = 'Liste pointage';
		$this->layout->view('pointages_index', $data);
	}

/*
	public function user($id) {
		if ($id) {
			$user = $this->db->get_where('users', array('id' => $id), 1);

			if ($user->num_rows() == 1) {
				$user = $user->row_array();
				$pointages = $this->db->get_where('pointages', array('user_id' => $id))->result_array();

				var_dump($pointages);
			}
			else setFlashMessage('Cet utilisateur n\'existe pas', 'warning', '/');
		}
		else setFlashMessage('Id utilisateur manquant', 'error', '/');

		$data['title'] = 'Pointages - '.$user['prenom'].' '.$user['nom'];
		$this->layout->view('pointages_user', $data);
	}*/
}
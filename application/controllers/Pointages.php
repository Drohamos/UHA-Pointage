<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pointages extends MY_Controller {
	public function index() {
		$this->output->enable_profiler(TRUE);

		$data['uri'] = $this->uri->uri_to_assoc(3);

		// Récupération liste utilisateurs
		$this->db->select('id, prenom, nom');
		$data['users'] = $this->db->get('users')->result_array();

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

	public function add($tOD = NULL, $token = NULL) {
		$this->output->enable_profiler(FALSE);

		// Contrôle du tOD
		if (array_key_exists($tOD, $this->config->item('tODs'))) {
			$this->load->model('Pointage_model');

			if ($this->Pointage_model->addHour($tOD, $_SESSION['user']['id']))
				setFlashMessage('Heure enregistrée', 'success', '/');
			else setFlashMessage('Échec de l\'enregistrement', 'error', '/');
		}
		else setFlashMessage('tOD Invalide', 'warning', '/');
	}
}
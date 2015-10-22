<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pointages extends MY_Controller {
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

		$data['title'] = 'Pointages '.$user['prenom'].' '.$user['nom'];
		$this->layout->view('pointages_user', $data);
	}
}
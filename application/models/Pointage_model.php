<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pointage_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	// tOD déjà vérifié, liste pointages jour courant
	public function addHour($tOD, $userId) {
		$pointagesJour = $this->db->get_where('pointages', array('user_id' => $userId, 'date' => dateForDb()), 1);

		// Jour déjà créé
		if ($pointagesJour->num_rows() == 1) {
			$pointagesJour = $pointagesJour->row();

			// Si ce tOD n'a pas déjà été enregistré
			if ($pointagesJour->$tOD == NULL) {

				// AJOUT HEURE DANS LIGNE
				$this->db->where('id', $pointagesJour->id)->update('pointages', array(
					$tOD => timeForDb()
				));
				return TRUE;
			}
			else return FALSE;
		}
		// Jour pas encore créé
		else {
			// CREATION LIGNE + STOCKAGE HEURE
			$this->db->insert('pointages', array(
				'user_id' => $userId,
				'date' => dateForDb(),
				$tOD => timeForDb()
			));

			return TRUE;
		}
	}
}
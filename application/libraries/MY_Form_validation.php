<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
	function __construct($config = array()) {
		parent::__construct($config);
	}

	// Retourne tableau des erreurs
	public function errors_array() {
		if (count($this->_error_array) === 0)
			return FALSE;
		else
			return $this->_error_array;
	}

	// Vérifie que la valeur EXISTE dans la table donnée
	public function exists($str, $field)
	{
		sscanf($field, '%[^.].%[^.]', $table, $field);
		return isset($this->CI->db)
			? ($this->CI->db->limit(1)->get_where($table, array($field => $str))->num_rows() === 1)
			: FALSE;
	}
}
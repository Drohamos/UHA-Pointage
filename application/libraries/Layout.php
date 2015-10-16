<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Layout {
	private $CI;

	public function __construct() {
		$this->CI =& get_instance();
	}

	public function view($view_name, $params = array(), $layout = 'layout') {
		$view_content = $this->CI->load->view($view_name, $params, TRUE);

		$this->CI->load->view($layout, array('content_for_layout' => $view_content));
	}
}
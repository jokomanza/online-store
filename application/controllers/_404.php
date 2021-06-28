<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _404 extends CI_Controller
{


	public function index()
	{
		return $this->output
			->set_content_type('application/json')
			->set_status_header(404)
			->set_output(json_encode(['error' => array(
				'code' => '404',
				'type' => 'EndPointExeption',
				'user_message' => 'Maaf ada kesalahan, mohon hubungi developer',
				'develoer_message' => 'Sorry, the requested resource does not exist'
			)]));
	}
}

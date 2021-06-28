<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo json_encode(['error' => array(
	'code' => '500',
	'type' => get_class($exception),
	'user_message' => $heading,
	'develoer_message' => $message
)]);
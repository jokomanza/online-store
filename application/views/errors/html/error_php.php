<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo json_encode(['error' => array(
	'code' => '500',
	'type' => 'PHP Error',
	'user_message' => $message,
	'develoer_message' => $filepath . " in line " . $line
)]);
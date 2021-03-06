<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct(); // Construct CI's core so that you can use it
        $this->load->database();
    }

    public function user_get($id)
    {
        if (isset($id)) {
            $query = $this->db->query("SELECT * FROM user WHERE id = $id");

            if ($query->result_array()) {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($query->result_array()));
            } else {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(
                        json_encode(['error' => array(
                            'code' => '404',
                            'type' => 'Unknown',
                            'user_message' => 'Data user tidak ditemukan',
                            'develoer_message' => "user with id $id does not found"
                        )])
                    );
            }
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(406)
                ->set_output(
                    json_encode(['error' => array(
                        'code' => '404',
                        'type' => 'Parameter Exception',
                        'user_message' => 'Maaf ada kesalahan, mohon hubungi developer',
                        'develoer_message' => 'id is required'
                    )])
                );
        }
    }

    public function user_all_get()
    {
        $query = $this->db->query("SELECT * FROM user");

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($query->result_array()));
    }

    public function user_post()
    {
        $data = array(
            'name' => 'User'
        );

        $this->db->insert('user', $data);

        if ($this->db->affected_rows()) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(201)
                ->set_output(json_encode(
                    array(
                        'code' => '201',
                        'message' => 'Data berhasil disimpan'
                    )
                ));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(
                    array(
                        'code' => '200',
                        'message' => 'Data diterima tetapi tidak tersimpan'
                    )
                ));
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Jabatan extends RestController
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('jabatan_model');
    }

    public function index_get()
    {
        $jabatan = $this->jabatan_model->listJabatan();

        if ($jabatan) {
            $this->response([
                'status'    => TRUE,
                'data'      => $jabatan,
                'messages'   => 'success'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => FALSE,
                'messages'   => 'errors'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function show_get()
    {
        $id = $this->get('id');

        $jabatan = $this->jabatan_model->detailJabatan($id);

        if ($jabatan) {
            $this->response([
                'status'    => TRUE,
                'data'      => $jabatan,
                'messages'   => 'success'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => FALSE,
                'messages'   => 'errors'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function store_post()
    {
        $data = [
            'jabatan' => htmlspecialchars($this->post('jabatan')),
            'created_by' => 1
        ];

        if ($this->jabatan_model->storeJabatan($data) > 0) {
            $this->response([
                'status'    => TRUE,
                'messages'   => 'success'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status'    => FALSE,
                'messages'   => 'failed'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function update_put()
    {
        $id = htmlspecialchars($this->put('id'));
        $data = [
            'jabatan' => htmlspecialchars($this->put('jabatan')),
            'created_by' => 1
        ];

        if ($this->jabatan_model->updateJabatan($data, $id) > 0) {
            $this->response([
                'status'    => TRUE,
                'messages'   => 'success'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status'    => FALSE,
                'messages'   => 'failed'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function destroy_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status'    => FALSE,
                'messages'   => 'provide an id'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->jabatan_model->deleteJabatan($id) > 0) {
                $this->response([
                    'status'    => TRUE,
                    'messages'   => 'success.'
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status'    => FALSE,
                    'messages'   => 'id not found'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }
}

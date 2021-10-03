<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Jabatan extends RestController
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //model
        $this->load->model('jabatan_model_api');
    }

    public function listJabatan_get()
    {
        $jabatan = $this->jabatan_model_api->getJabatan();

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
}

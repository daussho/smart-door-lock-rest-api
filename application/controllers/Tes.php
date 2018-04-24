<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {

    public function index1()
    {
        $this->load->helper('url');

        $this->load->view('rest_server');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('M_Potensi'));
        $this->load->model(array('M_Kategori'));
        $this->load->helper(array('url'));
        $this->load->library('statistik_pengunjung');
    }
}
// Untuk API read-only, seperti Api_informasi_publik
class Api_Controller extends MY_Controller
{
    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    protected function log_request()
    {
        $message = 'API Request ' . $this->input->server('REQUEST_URI') . ' dari ' . $this->input->ip_address();
        log_message('error', $message);
    }
}

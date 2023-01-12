<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengunjung extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kategori', 'kategori');
        $this->load->model('M_Wilayah', 'wilayah');
        $this->load->model('M_Potensi', 'potensi');
        $this->load->model('M_KritikSaran', 'kritiksaran');
        $this->load->library('statistik_pengunjung');

        // Counter statistik pengunjung
        $this->statistik_pengunjung->counter_visitor();
    }

    public function index()
    {
        $data['title'] = 'MY LITOUR';
        $data['kategori'] = $this->kategori->tampilData();

        $this->load->view('template/pengunjung/header', $data);
        $this->load->view('pengunjung/index', $data);
        $this->load->view('pengunjung/kritiksaran', $data);
        $this->load->view('template/pengunjung/footer', $data);
    }

    public function kirim_kritik_saran()
    {
        $data['title'] = 'MY LITOUR';
        $this->form_validation->set_rules([
            [
                'field' => 'nama_pengunjung',
                'label' => 'Nama',
                'rules' => 'required|trim',
            ],
            [
                'field' => 'email_pengunjung',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|regex_match[/[^a-zA-Z0-9]/]',
            ],
            [
                'field' => 'kritik_saran',
                'label' => 'Pesan',
                'rules' => 'trim|required',
            ],

        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/pengunjung/header', $data);
            $this->load->view('pengunjung/index', $data);
            $this->load->view('pengunjung/kritiksaran', $data);
            $this->load->view('template/pengunjung/footer', $data);
        } else {
            $data = [
                'id_kritik_saran' => $this->input->post('id_kritik_saran'),
                'email_pengunjung' => $this->input->post('email_pengunjung'),
                'nama_pengunjung' => $this->input->post('nama_pengunjung'),
                'kritik_saran' => $this->input->post('kritik_saran'),
            ];
            $this->db->insert('kritik_saran', $data);
            redirect('pengunjung');
        }
    }
    public function caruban_literasi_hub()
    {
        $data['title'] = 'Caruban Literasi Hub';
        $this->load->model('kategori');
        $data['carubanliterasihub'] = $this->kategori->tampilDataCarubanLiterasiHub()->result();
        $this->load->view('template/pengunjung/header2', $data);
        $this->load->view('pengunjung/list_caruban_literasi_hub', $data);
        $this->load->view('template/pengunjung/footer', $data);
    }

    public function naskah_kuno()
    {
        $data['title'] = 'Naskah Kuno';
        $this->load->model('kategori');
        $data['naskahkuno'] = $this->kategori->tampilDataNaskahKuno()->result();
        $this->load->view('template/pengunjung/header2', $data);
        $this->load->view('pengunjung/list_naskah_kuno', $data);
        $this->load->view('template/pengunjung/footer', $data);
    }

    public function kearifan_lokal()
    {
        $data['title'] = 'Kearifan Lokal';
        $this->load->model('kategori');
        $data['kearifan_lokal'] = $this->kategori->tampilDataKearifanLokal()->result();
        $this->load->view('template/pengunjung/header2', $data);
        $this->load->view('pengunjung/list_kearifan_lokal', $data);
        $this->load->view('template/pengunjung/footer', $data);
    }

    public function potensi360($slug)
    {
        $this->load->model('potensi');
        $potensi360 = $this->potensi->detail_data($slug);
        $data['potensi360'] = $potensi360;
        $this->load->view('pengunjung/kearifanlokal', $data);
    }
    public function detail_caruban_literasi_hub($slug)
    {
        $this->load->model('potensi');
        $data['title'] = 'Detail Caruban Literasi Hub';
        $data['detailclh'] = $this->potensi->detail($slug);

        $this->load->view('template/pengunjung/header2', $data);
        $this->load->view('pengunjung/carubanliterasi', $data);
        $this->load->view('template/pengunjung/footer', $data);
    }
    public function detail_naskah_kuno($slug)
    {
        $this->load->model('potensi');
        $data['title'] = 'Detail Naskah Kuno';
        $data['detailnaskah'] = $this->potensi->detail($slug);

        $this->load->view('template/pengunjung/header2', $data);
        $this->load->view('pengunjung/naskahkuno', $data);
        $this->load->view('template/pengunjung/footer', $data);
    }
}

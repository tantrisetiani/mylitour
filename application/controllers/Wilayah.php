<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Wilayah', 'wilayah');
    }

    public function index()
    {
        $data['title'] = 'Data Wilayah';
        $data['wilayah'] = $this->wilayah->get_data_db();

        $this->load->view('template/admin/header', $data);
        $this->load->view('wilayah/index');
        $this->load->view('template/admin/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Wilayah';
        $data['wilayah'] = $this->wilayah->get_data_db();

        $this->form_validation->set_rules(
            'nama_wilayah',
            'Nama Wilayah',
            'required|is_unique[wilayah.nama_wilayah]|regex_match[/^([a-z ])+$/i]',
            array('required' => 'Nama Wilayah harus diisi', 'regex_match' => 'Karakter yang dimasukkan harus berupa Alphabet', 'is_unique' => 'Nama wilayah sudah ada')
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('wilayah/tambah', $data);
            $this->load->view('template/admin/footer', $data);
        } else {

            $data = array(
             'id_wilayah' => $this->input->post('id_wilayah'),
                'nama_wilayah' => $this->input->post('nama_wilayah')
            );
            $this->wilayah->add_data($data, 'wilayah');
            $this->session->set_flashdata('message', '
                  <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <i class="fas fa-check-circle"></i>
                  Data <strong>Wilayah</strong> berhasil ditambahkan!
                  </div>
                  ');
            redirect('wilayah');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Wilayah';
        $data['wilayah'] = $this->wilayah->getDataById($id);

        $this->form_validation->set_rules(
            'nama_wilayah',
            'Nama Wilayah',
            'required|regex_match[/^([a-z ])+$/i]',
            array('required' => 'Nama wilayah harus diisi', 'regex_match[/^([a-z ])+$/i]' => 'Karakter yang dimasukkan harus berupa Alphabet')
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('wilayah/edit', $data);
            $this->load->view('template/admin/footer');
        } else {
            $nama_wilayah   = $this->input->post('nama_wilayah');

            $data = array(
                'nama_wilayah' => $nama_wilayah
            );

            $this->wilayah->update_data($data, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <i class="fas fa-check-circle"></i>
              Data <strong>Wilayah</strong> berhasil diupdate!
              </div>
              ');
            redirect('wilayah');
        }
    }

    public function hapus($id)
    {
        $where = [
            'id_wilayah' => $id
        ];
        $this->wilayah->delete_data($where);
        $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fas fa-check-circle"></i>
                Data <strong>Wilayah</strong> berhasil dihapus!
                </div>
                ');
        redirect('wilayah');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kategori', 'kategori');
    }

    public function index()
    {
        $data['kategori'] = $this->kategori->tampilData();
        $data['title'] = "Data Kategori";
        $this->load->view('template/admin/header', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('template/admin/footer', $data);
    }
    public function fungsiTambah()
    {

        $jenis_kategori = $this->input->post('jenis_kategori');
        $ArrInsert = array(
            'jenis_kategori' => $jenis_kategori,
        );
        $this->db->insert('kategori', $ArrInsert);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data <strong>Kategori</strong> berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('kategori');
    }

    public function halamanUpdate($id_kategori)
    {
        $data['title'] = 'Edit Data Kategori';
        $where = array('id_kategori' => $id_kategori);
        $this->load->model('M_Kategori');
        $data['kategori'] = $this->M_Kategori->halamanUpdate($where, 'kategori')->result();
        $this->load->view('template/admin/header', $data);
        $this->load->view('kategori/edit', $data);
        $this->load->view('template/admin/footer', $data);
    }

    public function fungsiUpdate()
    {
        $id_kategori = $this->input->post('id_kategori');
        $jenis_kategori = $this->input->post('jenis_kategori');

        $ArrUpdate = array(
            'id_kategori' => $id_kategori,
            'jenis_kategori' => $jenis_kategori,

        );

        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $ArrUpdate);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data <strong>Kategori</strong> berhasil diupdate!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('kategori/index'));
    }


    public function fungsiDelete($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data <strong>Kategori</strong> berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('kategori');
    }
}

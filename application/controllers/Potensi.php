<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Potensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Potensi', 'potensi');
        $this->load->model('M_Kategori', 'kategori');
        $this->load->model('M_Wilayah', 'wilayah');
    }

    public function index()
    {

        $data['title'] = 'Data Potensi';
        $data['kategori'] = $this->kategori->tampilData();
        $data['wilayah'] = $this->wilayah->get_data_db();
        $data['potensi_tampil'] = $this->potensi->get_data_db();

        $this->load->view('template/admin/header', $data);
        $this->load->view('potensi/index', $data);
        $this->load->view('template/admin/footer', $data);
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Data Potensi';
        $data['potensi'] = $this->potensi->get_data_db();
        $data['kategori'] = $this->kategori->tampilData();
        $data['wilayah'] = $this->wilayah->get_data_db();

        $this->form_validation->set_rules('id_kategori', 'Kategori Potensi', 'required');
        $this->form_validation->set_rules('id_wilayah', 'Wilayah Potensi', 'required');
        $this->form_validation->set_rules(
            'nama_potensi',
            'Nama Potensi',
            'required|is_unique[potensi.nama_potensi]',
            array('required' => 'Nama Potensi harus diisi', 'is_unique' => 'Nama Potensi sudah ada')
        );
        $this->form_validation->set_rules(
            'informasi',
            'Informasi Potensi',
            'required',
            array('required' => 'Informasi Potensi harus diisi')
        );
        $this->form_validation->set_rules(
            'tanggal_update',
            'Tanggal Update',
            'required',
            array('required' => 'Tanggal Update harus diisi')
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('potensi/tambah', $data);
            $this->load->view('template/admin/footer', $data);
        } else {
            $id_kategori = $this->input->post('id_kategori');
            $id_wilayah = $this->input->post('id_wilayah');
            $nama_potensi = $this->input->post('nama_potensi');
            $slug = $this->input->post('slug');
            $informasi = $this->input->post('informasi');
            $video_youtube = $this->input->post('video_youtube');
            $tanggal_update = $this->input->post('tanggal_update');
            $referensi = $this->input->post('referensi');
            $foto_potensi = $_FILES['foto_potensi'];
            if ($foto_potensi = '') {
            } else {
                $config['upload_path'] = './assets/img/potensi';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 10048;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto_potensi')) {
                    echo "Upload Gagal";
                    die();
                } else {
                    $foto_potensi = $this->upload->data('file_name');
                }
            }
            $data = array(
                'id_kategori' => $id_kategori,
                'id_wilayah' => $id_wilayah,
                'nama_potensi' => $nama_potensi,
                'slug' => $slug,
                'informasi' => $informasi,
                'video_youtube' => $video_youtube,
                'tanggal_update' => $tanggal_update,
                'referensi' => $referensi,
                'foto_potensi' => $foto_potensi
            );

            $this->potensi->add_data($data, 'potensi');
            $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data <strong>Potensi</strong> berhasil ditambahkan!
        </div>
        ');
            redirect('potensi');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Potensi';

        $data['kategori'] = $this->kategori->tampilData();
        $data['wilayah'] = $this->wilayah->get_data_db();
        $data['potensi'] = $this->potensi->getDataById($id);
        $this->form_validation->set_rules(
            'nama_potensi',
            'Nama Potensi',
            'required',
            array('required' => 'Nama Potensi harus diisi')
        );

        $this->form_validation->set_rules('slug', 'slug', 'required');
        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori Potensi',
            'required'
        );
        $this->form_validation->set_rules(
            'id_wilayah',
            'Wilayah Potensi',
            'required'
        );

        $this->form_validation->set_rules(
            'informasi',
            'Informasi Potensi',
            'required',
            array('required' => 'Informasi Potensi harus diisi')
        );

        $this->form_validation->set_rules(
            'tanggal_update',
            'Tanggal Update',
            'required',
            array('required' => 'Tanggal Update harus diisi')
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('potensi/edit', $data);
            $this->load->view('template/admin/footer');
        } else {
            $this->potensi->update_data($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <i class="fas fa-check-circle"></i>
          Data <strong>Potensi</strong> berhasil diupdate!
          </div>
          ');
            redirect('potensi');
        }
    }

    public function hapus($id)
    {
        $where = [
            'id_potensi' => $id
        ];

        $this->potensi->delete_data($where);
        $this->session->set_flashdata('message', '
      <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <i class="fas fa-check-circle"></i>
      Data <strong>Potensi</strong> berhasil dihapus!
      </div>
      ');
        redirect('potensi');
    }

    public function detail($slug)
    {
        $data['title'] = 'Detail ';
        $this->load->model('potensi');
        $detail = $this->potensi->detail_data($slug);
        $data['detail'] = $detail;
        $this->load->view('template/admin/header', $data);
        $this->load->view('potensi/detail', $data);
        $this->load->view('template/admin/footer', $data);
    }
}

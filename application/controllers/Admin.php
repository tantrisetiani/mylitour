<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin', 'admin'); //load model M_Admin
    }

    public function index()
    {
        $data['title'] = 'Data Admin';
        $data['admin'] = $this->admin->get_data_db(); //memanggil fungsi lihat dari model M_Admin

        $this->load->view('template/admin/header', $data);
        $this->load->view('admin/index');
        $this->load->view('template/admin/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Admin';
        $data['admin'] = $this->admin->get_data_db(); //memanggil fungsi lihat dari model M_Admin

        //membuat form validation
        $this->form_validation->set_rules('kode_admin', 'Kode Admin', 'required');
        $this->form_validation->set_rules(
            'nama_admin',
            'Nama',
            'required|regex_match[/^([a-z ])+$/i]',
            //notifikasi alert error form validation => nama wajib diisi dan karakter yang dimasukkan harus berupa alphabet
            array('required' => 'Nama Admin harus diisi', 'regex_match' => 'Karakter yang dimasukkan harus berupa Alphabet')
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|is_unique[admin.username]|alpha_numeric',
            array('required' => 'Username harus diisi', 'is_unique' => 'Username yang dimasukkan sudah terdaftar', 'alpha_numeric' => 'Karakter yang dimasukkan harus berupa Alphabet atau Angka')
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|is_unique[admin.password]|min_length[6]',
            array('required' => 'Password harus diisi', 'min_length' => 'Panjang password yang dimasukkan adalah minimal 6 karakter')
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('admin/tambah');
            $this->load->view('template/admin/footer', $data);
        } else {
            $foto_admin = $_FILES['foto_admin']['name'];
            if ($foto_admin = '') {
            } else {
                $config['upload_path'] = './assets/img/admin';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto_admin')) {
                    $this->session->set_flashdata('message', '
                              <div class="alert alert-danger" role="alert">
                              <i class="fas fa-exclamation-triangle "></i>
                              Data <strong>Admin</strong> gagal ditambahkan, cek kembali foto yang diupload
                              </div>
                              ');
                    redirect('admin');
                } else {
                    $foto_admin = $this->upload->data('file_name', true);

                    $data = array(
                        'kode_admin' => $this->input->post('kode_admin', true),
                        'nama_admin' => $this->input->post('nama_admin', true),
                        'username' => $this->input->post('username', true),
                        'password' => $this->input->post('password', true),
                        'foto_admin' => $foto_admin
                    );
                }
                $this->admin->add_data($data, 'admin');
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fas fa-check-circle"></i>
                    Data <strong>Admin</strong> berhasil ditambahkan!
                    </div>'
                );
                redirect('admin');
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Admin';
        $data['admin'] = $this->admin->getDataById($id);

        $this->form_validation->set_rules(
            'nama_admin',
            'Nama Admin',
            'required|regex_match[/^([a-z ])+$/i]',
            array('required' => 'Nama admin harus diisi', 'regex_match[/^([a-z ])+$/i]' => 'Karakter yang dimasukkan harus berupa Aplhabet')
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|alpha_numeric',
            array('required' => 'Username harus diisi', 'alpha_numeric' => 'Karakter yang dimasukkan harus berupa Alphabet atau Angka')
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]',
            array('required' => 'Password harus diisi', 'min_length' => 'Panjang password yang dimasukkan adalah minimal 6 karakter')
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('template/admin/footer');
        } else {
            $this->admin->update_data($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <i class="fas fa-check-circle"></i>
              Data <strong>Admin</strong> berhasil diupdate!
              </div>
              ');
            redirect('admin');
        }
    }

    public function hapus($id)
    {
        $where = [
            'id_admin' => $id
        ];
        $data = $this->admin->getDataById($id);
        if ($this->session->userdata('username') == $data['username']) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-window-close"></i>
            Data <strong>Admin</strong> gagal dihapus. Login dengan akun berbeda untuk dapat menghapus data ini!
            </div>');
            redirect('admin');
        } else {
            if (file_exists("./assets/img/admin/" . $data['foto_admin'])) {
                unlink("./assets/img/admin/" . $data['foto_admin']);
            }
            $this->admin->delete_data($where);
            $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fas fa-check-circle"></i>
                Data <strong>Admin</strong> berhasil dihapus!
                </div>
                ');
            redirect('admin');
        }
    }
}

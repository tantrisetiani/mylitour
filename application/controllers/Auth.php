<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Admin', 'admin');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$cek = $this->admin->cekDataAdmin("admin", $where)->num_rows();
		$data_user = $this->admin->cekDataAdmin("admin", $where)->row();
		if ($cek > 0) {
			$data_session = array(
				'username' => $data_user->username,
				'nama_admin' => $data_user->nama_admin,
				'foto_admin' => $data_user->foto_admin,
				'is_login' => TRUE
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('dashboard'));
		} else {
			$this->session->set_flashdata('error', 'Username atau Password salah');
			redirect(base_url('auth'));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" 
        role="alert"> You have been logout!</div>');
		redirect(base_url('auth'));
	}
}

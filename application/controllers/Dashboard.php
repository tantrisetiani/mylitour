<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('is_login') != TRUE) {
			redirect(base_url("dashboard"));
		}
		$this->load->model('M_Admin', 'admin');
		$this->load->model('M_Potensi', 'potensi');
		$this->load->model('M_Kategori', 'kategori');
		$this->load->model('M_Wilayah', 'wilayah');
		$this->load->library('statistik_pengunjung');
		$this->load->helper('statistik_helper');
		$this->load->helper('opensid_helper');
	}


	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['jumlah_admin'] = $this->admin->jumlah_admin();
		$data['jumlah_potensi'] = $this->potensi->jumlah_potensi();
		$data['jumlah_kategori'] = $this->kategori->jumlah_kategori();
		$data['jumlah_wilayah'] = $this->wilayah->jumlah_wilayah();

		$data['hari_ini']   = $this->statistik_pengunjung->get_pengunjung_total('1');
		$data['kemarin']    = $this->statistik_pengunjung->get_pengunjung_total('2');
		$data['minggu_ini'] = $this->statistik_pengunjung->get_pengunjung_total('3');
		$data['bulan_ini']  = $this->statistik_pengunjung->get_pengunjung_total('4');
		$data['tahun_ini']  = $this->statistik_pengunjung->get_pengunjung_total('5');
		$data['jumlah']     = $this->statistik_pengunjung->get_pengunjung_total(null);
		$data['main']       = $this->statistik_pengunjung->get_pengunjung($this->session->id);

		$this->load->view('template/admin/header');
		$this->load->view('dashboard/index', $data);
		$this->load->view('template/admin/footer');
	}
	public function detail($id = null)
	{
		$this->session->set_userdata('id', $id);

		redirect('dashboard');
	}

	public function clear()
	{
		$this->session->unset_userdata('id');

		redirect('dashboard');
	}

	public function cetak()
	{
		$data['aksi']     = 'cetak';
		$data['main']   = $this->statistik_pengunjung->get_pengunjung($this->session->id);
		$this->load->view('dashboard/cetak', $data);
	}
}

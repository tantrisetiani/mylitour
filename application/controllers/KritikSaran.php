<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KritikSaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_KritikSaran', 'kritiksaran');
	}

	public function index()
	{
		$data['kritiksaran'] = $this->kritiksaran->tampilData()->result();
		$data['title'] = "Kritik dan Saran";
		$data['konten'] = "kritiksaran";
		$this->load->view('template/admin/header', $data);
		$this->load->view('kritiksaran/index', $data);
		$this->load->view('template/admin/footer', $data);
	}

	public function fungsiDelete($id_kritik_saran)
	{
		$this->db->where('id_kritik_saran', $id_kritik_saran);
		$this->db->delete('kritik_saran');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data <strong>Kritik dan Saran</strong> berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
		redirect('kritiksaran');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('surat_model', 'sm');
		date_default_timezone_set("Asia/Jakarta");
		error_reporting(0);
	}

	public function index()
	{
		$key = $this->input->get('cari');
		if ($key == null) {
			$data['surat'] = $this->sm->getData(null)->result();
		} else {
			$data['surat'] = $this->sm->cari($key)->result();
		}
		$data['view_name'] = "index";
		$this->load->view('template', $data);
	}

	public function unggah()
	{
		$data['view_name'] = "unggah";
		$this->load->view('template', $data);
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$w = array('id_surat' => $id,);
		$data['surat'] = $this->sm->getData($w)->row();
		$data['view_name'] = "rubah";
		$this->load->view('template', $data);
	}

	public function lihat()
	{
		$id = $this->uri->segment(3);
		$w = array('id_surat' => $id,);
		$data['lihat'] = $this->sm->getData($w)->row();
		$data['view_name'] = "lihat";
		$this->load->view('template', $data);
	}

	public function about()
	{
		$data['view_name'] = "about";
		$this->load->view('template', $data);
	}

	public function tambahData()
	{
		$config['upload_path'] = './file_surat/surat/';
		$config['allowed_types'] = 'pdf';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('surat')) {
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
		} else {
			$data = array(
				'no_surat' => $this->input->post('no'),
				'kategori' => $this->input->post('kategori'),
				'judul' => $this->input->post('judul'),
				'file_surat' => $this->upload->data('file_name'),
				'waktu_input' => date('Y-m-d H:i'),
			);
			$this->sm->insData($data);
			$this->session->set_flashdata('msg', 'Data berhasil ditambahkan !');
			redirect('welcome', 'refresh');
		}
	}

	public function editData()
	{
		$config['upload_path'] = './file_surat/surat/';
		$config['allowed_types'] = 'pdf';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('surat')) {
			$data = array(
				'no_surat' => $this->input->post('no'),
				'kategori' => $this->input->post('kategori'),
				'judul' => $this->input->post('judul'),
				'waktu_input' => date('Y-m-d H:i'),
			);
			$w = array('id_surat' => $this->input->post('idSurat'),);
			$this->sm->updData($data, $w);
			$this->session->set_flashdata('msg', 'Data berhasil diubah !');
			redirect('welcome', 'refresh');
		} else {
			$data = array(
				'no_surat' => $this->input->post('no'),
				'kategori' => $this->input->post('kategori'),
				'judul' => $this->input->post('judul'),
				'file_surat' => $this->upload->data('file_name'),
				'waktu_input' => date('Y-m-d H:i'),
			);
			$w = array('id_surat' => $this->input->post('idSurat'),);
			$this->sm->updData($data, $w);
			$this->session->set_flashdata('msg', 'Data berhasil diubah !');
			redirect('welcome', 'refresh');
		}
	}

	public function hapusData()
	{
		$id = $this->uri->segment(3);
		$w = array('id_surat' => $id,);
		$this->sm->delData($w);
		$this->session->set_flashdata('msg', 'Data berhasil dihapus !');
		redirect('welcome', 'refresh');
	}

	public function download($file)
	{
		force_download('file_surat/surat/' . $file, NULL);
	}
}

<?php
	
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		cek_login();
	}
	public function index()
	{
		// $data['buku'] = $this->M_perpus->getAllData('buku');
		$data['buku'] = $this->db->query("SELECT * FROM buku b, kategori k WHERE b.id_kategori=k.id_kategori")->result_array();
		$data['title'] = "Data Buku";
		$this->load->view('templates_anggota/header',$data);
		$this->load->view('anggota/dashboard');
		$this->load->view('templates_anggota/footer');
	}

	public function detail_buku($id)
	{
		
		$data['detailBuku'] = $this->M_perpus->getById($id)->row_array();
		
		$data['title'] = $data['detailBuku']['judul_buku'];

		$this->load->view('templates_anggota/header',$data);
		$this->load->view('anggota/detail_buku',$data);
		$this->load->view('templates_anggota/footer');
	}

} // akhir class
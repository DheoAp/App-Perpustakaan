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

	public function pinjam_buku($id)
	{
		$data['dataPinjam'] = $this->M_perpus->getById($id)->result_array();
		$data['title'] = "pinjam_buku";
		$this->load->view('templates_anggota/header',$data);
		// $this->load->view('anggota/keranjang_buku');
		$this->load->view('anggota/pinjam_buku');
		$this->load->view('templates_anggota/footer');
	}
	public function aksi_pinjam_buku()
	{
		$data = [
			'id_anggota' => $this->session->userdata('id_anggota'),
			'id_buku' => htmlspecialchars($this->input->post('id_buku',true)),
			'tanggal_pinjam' => htmlspecialchars($this->input->post('tanggal_pinjam',true)),
			'tanggal_kembali' => htmlspecialchars($this->input->post('tanggal_kembali',true)),
			'tanggal_dikembalikan' => '-',
			'total_denda' => '0',
			'status_peminjaman' => '0',
			'status_pengembalian' => '0',
			'keperluan' => htmlspecialchars($this->input->post('keperluan',true)),
		];
		$this->M_perpus->insert_data('keranjang',$data);
		$status =[
			'status_buku' => '0'
		];
		$id_buku = [
			'id_buku' => $data['id_buku']
		];
		$this->M_perpus->update_status_buku('buku',$status,$id_buku);
		$this->session->set_flashdata('pesan','Buku Berhasil di Tambahkan, cek di keranjang.');
		redirect('dashboard');
	}

	public function keranjang()
	{
		// $data['dataPinjam'] = $this->M_perpus->getAllData('keranjang');
		$data['dataPinjam'] = $this->db->query("SELECT * FROM keranjang k, buku b WHERE k.id_buku=b.id_buku")->result_array();
		$data['title'] = "Keranjang";
		$this->load->view('templates_anggota/header',$data);
		$this->load->view('anggota/keranjang_buku');
		$this->load->view('templates_anggota/footer');
	}

		

} // akhir class
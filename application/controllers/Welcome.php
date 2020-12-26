<?php

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() != false) {
			 // jika ada masalah cek, cek username atau password
			 // yang di input sesuai atau tidak dengan username dan password pada tabel admin
			$where = array('username' => $username, 'password' => md5($password));

			$data = $this->M_perpus->edit_data($where,'admin');
			$d = $this->M_perpus->edit_data($where, 'admin')->row();
			$cek = $data->num_rows();

			if ($cek > 0) {
				// jika sesuai kita buat session id dan nama
				// yang mana session id kita simpan id admin yang melakukan login,
				// session nama kita menyimpan nama admin yang login.
				$session = array('id' =>$d->id_admin, 'nama' => $d->nama_admin, 'status' => 'login');
				$this->session->set_userdata($session);
				// setelah di buat sessionnya, selanjutnya mengalihkan halaman ke controller admin.
				redirect(base_url().'admin');
			}else{
				// jika login gagal maka di alihkan ke controller welcome/login
				// sambil mengirim url untuk membuat pesan notifikasi login gagal
				$this->session->set_flashdata('alert','login gagal! Username atau password salah.');
				redirect(base_url());
			}
		}else{
			$this->session->set_flashdata('alert','Anda belum mengisi Username dan Password.');
			$this->load->view('login');
		}

	}

}

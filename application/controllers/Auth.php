<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function login()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run() == false){

      $judul['judul'] = "Silakan Login";
      $this->load->view('templates_login/header',$judul); 
      $this->load->view('login'); 
      $this->load->view('templates_login/footer'); 
    }else{
      $this->_login();
    }
  
  }
  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->M_perpus->($email);

    if($user){
      // Akun sudah terdaftar
      if(password_verify($password,$user['password'])){
        $data = [
          'id_anggota' => $user['id_anggota'],
          'nama_lengkap' => $user['nama_lengkap'],
          'email' => $user['email'],
          'role_id' => $user['role_id']
        ];
        $this->session->set_userdata($data);
        if($user['role_id'] == 1){
          redirect('admin');
        }else{
          redirect('dashboard');
        }
      }else{
        $this->session->set_flashdata('salah_password','Password yang anda masukan salah');
        redirect('auth/login');
      }
    }else{
      // Akun belum terdaftar
      $this->session->set_flashdata('gagal_login','Email belum terdaftar');
      redirect('auth/login');
    }
    
  }


  public function daftar()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[anggota.email]');
    $this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'required|alpha');
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('tempat_lahir', 'Tempat lahir', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required');
    $this->form_validation->set_rules('no_telp', 'Nomer Telp', 'required|numeric');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]|min_length[6]');
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

    if($this->form_validation->run() == false){
      $judul['judul'] = "Buat Akun Anggota";
      $this->load->view('templates_login/header',$judul); 
      $this->load->view('daftar'); 
      $this->load->view('templates_login/footer'); 
    }else{
      $data = [
        'email' => htmlspecialchars($this->input->post('email',true)),
        'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap',true)),
        'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin',true)),
        'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir',true)),
        'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir',true)),
        'no_telp' => htmlspecialchars($this->input->post('no_telp',true)),
        'alamat' => htmlspecialchars($this->input->post('alamat',true)),
        'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
        'role_id' => '2',
        'profile' => 'default.png',
        'tanggal_dibuat' => time()
      ];

      $this->M_perpus->insert_data('anggota',$data);
      $this->session->set_flashdata('daftar','Berhasil di daftarkan.');
      redirect('auth/login');
    }

    
  }

} // akhir class
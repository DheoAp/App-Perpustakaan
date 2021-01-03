<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function login()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run() == false){

      $judul['judul'] = "Silakan Login";
      $judul['title'] = "Selamat Datang";
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

    $user = $this->M_perpus->getByEmail('anggota',$email);

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
          redirect('Admin/dashboard');
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

  public function logout()
  {
    session_destroy();
    redirect('auth/login');
  }

} // akhir class
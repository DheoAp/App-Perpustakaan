<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function login()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run() == false){

      $judul['judul'] = "Silakan Login Sebagai Admin";
      $judul['title'] = "Selamat Datang";
      $this->load->view('templates_login/header',$judul); 
      $this->load->view('admin/login'); 
      $this->load->view('templates_login/footer'); 
    }else{
      $this->_login();
    }
  
  }
  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->M_perpus->getByEmail('admin',$email);

    if($user){
      // Akun sudah terdaftar
      if(password_verify($password,$user['password'])){
        $data = [
          'id_admin' => $user['id_admin'],
          'role_id' => $user['role_id'],
          'email' => $user['email'],
          'nama_admin' => $user['nama_admin']
        ];
        $this->session->set_userdata($data);
        if($user['role_id'] == 1){
          redirect('Admin/dashboard');
        }else{
          redirect('dashboard');
        }
      }else{
        $this->session->set_flashdata('salah_password','Password yang anda masukan salah');
        redirect('admin/auth/login');
      }
    }else{
      // Akun belum terdaftar
      $this->session->set_flashdata('gagal_login','Email belum terdaftar');
      redirect('admin/auth/login');
    }

  }

  public function logout()
  {
    session_destroy();
    redirect('auth/login');
  }

} // akhir class
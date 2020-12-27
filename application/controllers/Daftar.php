<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller{
  public function index()
  {
    $judul['title'] = "Daftar Anggota";
    $this->load->view('daftar',$judul);
  }

} // akhir class
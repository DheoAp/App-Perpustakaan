<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller{
  public function index()
  {
    $this->load->view('daftar');
  }

} // akhir class
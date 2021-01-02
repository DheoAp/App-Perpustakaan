<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title;?> - Aplikasi Perpustakaan</title>
  <link rel="stylesheet" href="<?= base_url().'assets/css/bootstrap.min.css'?>">
  <link rel="stylesheet" href="<?= base_url().'assets/datatable/datatables.css'?>">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand active">Perpustakaan</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('dashboard');?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('dashboard/keranjang');?>">Keranjang Buku</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="<?= base_url();?>admin/peminjaman">Transaksi Peminjaman</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= "Hallo, ".$this->session->userdata('nama_lengkap');?>
          </a>
          <div class="dropdown-menu p-2 bg-dark" aria-labelledby="navbarDropdownMenuLink">
            <a class="nav-link" href="<?= base_url();?>admin/ganti_password">Ganti Password</a>
            <a class="nav-link text-danger" href="<?= base_url('auth/logout');?>">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container-fluid mt-5">
  

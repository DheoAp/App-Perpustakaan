<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Dashboard - SB Admin</title>
	
	<link href="<?= base_url('vendor/style_admin/css/styles.css');?>" rel="stylesheet" />
	<link href="<?= base_url('vendor/style_admin/css/dataTables.bootstrap4.min.css');?>" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
	<a class="navbar-brand" ref="<?= base_url('admin');?>">Perpustakaan</a>
	<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
	   
	<!-- Navbar-->
	<ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
		<li class="nav-item">
			<a class="nav-link d-none d-md-inline-block" href="#"><?= "Hallo, ".$this->session->userdata('nama_admin');?></a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
				<a class="dropdown-item" href="<?= base_url();?>admin/laporan">Laporan</a>
				<a class="dropdown-item" href="<?= base_url();?>admin/ganti_password">Ganti Password</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="<?= base_url('admin/dashboard/logout');?>">Keluar</a>
			</div>
		</li>
	</ul>
	</nav>
	<div id="layoutSidenav">
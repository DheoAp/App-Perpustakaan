<div id="layoutSidenav_content">
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Aplikasi Perpustakaan</h1>
		<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active"> <div class="sb-nav-link-icon mr-1"><i class="fas fa-calendar-alt"></i></div> Tanggal : <?= date("d F Y");?></li>
		</ol>
		<div class="row">
				<div class="col-xl-3 col-md-6">
					<div class="card bg-primary text-white mb-4">
						<div class="card-body">Primary Card</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="#">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-warning text-white mb-4">
						<div class="card-body">Warning Card</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="#">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-success text-white mb-4">
						<div class="card-body">Success Card</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="#">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-danger text-white mb-4">
						<div class="card-body">Danger Card</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="#">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
		</div>
		<hr>
		<?php if( $this->session->flashdata('pesan')): ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('pesan');?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
		<?php endif; ?>
		<!-- Row Data Buku -->
		<div class="row">				
			<div class="col-xl">
				<div class="card mb-4">
					<div class="card-header">
						<i class="fas fa-book mr-1"></i>
						Data Buku | <a href="<?= base_url('admin/tambah_buku');?>">Tambah Data Buku</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Judul Buku</th>
										<th>Pengarang</th>
										<th>Penerbit</th>
										<th>Lokasi</th>
										<th colspan="3" class="text-center">Aksi</th>
									</tr>
								</thead>
								
								<tbody>
									<?php $no=1; foreach( $buku as $b ): ?>
											<tr>
												<td><?= $no++;?></td>
												<td><?= $b->judul_buku;?></td>
												<td><?= $b->pengarang?></td>
												<td><?= $b->penerbit?></td>
												<td><?= $b->lokasi?></td>
												<td><a href="" class="btn btn-sm btn-success"><i class="fa fa-info-circle"></i></a></td> <!-- Detail -->
												<td><a href="" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a></td> <!-- Ubah -->
												<td><a href="<?= base_url('admin/hapus_buku/'.$b->id_buku);?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td> <!-- Hapus -->
											</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Row Data Buku -->
		<hr>
		<!-- Row Data Anggota -->
		<div class="row">
			<div class="col-xl">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-users mr-1"></i>
							Data Anggota | <a href="">Tambah Data Anggota</a>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-hover" id="dataTable2" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Anggota</th>
											<th>Gender</th>
											<th>Alamat</th>
											<th>No. Telp</th>
											<th>Email</th>
											<th colspan="3" class="text-center">Aksi</th>
										</tr>
									</thead>
									
									<tbody>
										<?php $no=1; foreach( $anggota as $a ): ?>
												<tr>
													<td><?= $no++;?></td>
													<td><?= $a->nama_anggota;?></td>
													<td><?= $a->gender;?></td>
													<td><?= $a->alamat;?></td>
													<td><?= $a->no_telp;?></td>
													<td><?= $a->email;?></td>
													<td><a href="" class="btn btn-sm btn-success"><i class="fa fa-info-circle"></i></a></td>
													<td><a href="" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a></td>
													<td><a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
												</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
		</div>
		<hr>
		<!-- End Row Data Anggota -->
		<hr>
		<!-- Row Data Peminjaman -->
		<div class="row">
			<div class="col-xl">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-users mr-1"></i>
							Data Peminjaman Buku
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-hover" id="dataTable2" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Anggota</th>
											<th>Tgl Pinjam</th>
											<th>Tgl Kembali</th>
											<th>Status Pinjam</th>
											<th>Status Kembali</th>
											<th colspan="3" class="text-center">Aksi</th>
										</tr>
									</thead>
									
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
		</div>
		<hr>
		<!-- End Row Data Peminjaman -->
</main>

<footer class="py-4 bg-light mt-auto">
		<div class="container-fluid">
				<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; dheoapriansyah.com <?= date("Y");?></div>
						<div>
								<a href="#">Privacy Policy</a>
								&middot;
								<a href="#">Terms &amp; Conditions</a>
						</div>
				</div>
		</div>
</footer>
</div>  
      
      




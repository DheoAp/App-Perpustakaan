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
      
      




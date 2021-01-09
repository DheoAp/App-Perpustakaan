<div id="layoutSidenav_content">
<main>
  <div class="container-fluid mt-5 mb-2 d-flex justify-content-center">

    <div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="<?= base_url('assets/upload/anggota/'.$detailAnggota['profile']);?>"  class="card-img m-2 img-thumbnail" alt="Gambar tidak ada" style="max-width:100%; max-height: 100%; height: 180px; width: 185px">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title text-center">Data Anggota Perpustakaan</h5>
            <hr>
            <div class="row">
              <div class="col-7">
                <p class="card-text"><b>Nama Anggota :</b> <?= $detailAnggota['nama_lengkap'];?></p>
                <p class="card-text"><b>Jenis Kelamin :</b> <?= $detailAnggota['jenis_kelamin'];?></p>
                <p class="card-text"><b>Tempat,Tanggal Lahir:</b> <?= $detailAnggota['tempat_lahir'];?>, <?= $detailAnggota['tanggal_lahir'];?></p>
              </div>
              <div class="col">
                <p class="card-text"><b>No Telepon :</b> <?= $detailAnggota['no_telp'];?></p>
                <p class="card-text"><b>Alamat :</b> <?= $detailAnggota['alamat'];?></p>
                <p class="card-text"><b>Status :</b> 
                    <?php if( $detailAnggota['role_id'] == "2" ): ?>
                        <span class="badge badge-pill badge-success">Anggota</span>
                    <?php endif; ?>
                </p>
              </div>
            </div>
            <hr>
            <div>
              <p class="card-text"><h6 class="text-muted">Tanggal Bergabung <?= date('d F Y',$detailAnggota['tanggal_dibuat']);?></h6></p>
              <a href="<?= base_url('admin/dashboard/anggota');?>" class="btn btn-sm btn-danger">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>
</div>
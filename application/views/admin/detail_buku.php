<div id="layoutSidenav_content">
<main>
  <div class="container-fluid mt-5 mb-2 d-flex justify-content-center">

    <div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="<?= base_url('assets/upload/'.$detailBuku['gambar']);?>" class="card-img m-3 img-thumbnail" alt="Gambar tidak ada" style="max-width:100%; max-height: 100%; height: 180px; width: 135px">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title text-center"><?= $detailBuku['judul_buku'];?></h5>
            <hr>
            <div class="row">
              <div class="col">
                <p class="card-text"><b>Ketegori :</b> <?= $detailBuku['nama_kategori'];?></p>
                <p class="card-text"><b>Pengarang :</b> <?= $detailBuku['pengarang'];?></p>
                <p class="card-text"><b>penerbit :</b> <?= $detailBuku['penerbit'];?></p>
              </div>
              <div class="col">
                <p class="card-text"><b>Rak Buku :</b> <?= $detailBuku['lokasi'];?></p>
                <p class="card-text"><b>isbn :</b> <?= $detailBuku['isbn'];?></p>
                <p class="card-text"><b>Status Buku :</b> 
                    <?php if( $detailBuku['status_buku'] == "1" ): ?>
                        <span class="badge badge-pill badge-success">Tersedia</span>
                    <?php else: ?>
                      <span class="badge badge-pill badge-secondary">Tidak Tersedia</span>
                    <?php endif; ?>
                </p>
              </div>
            </div>
            <hr>
            <div>
              <p class="card-text"><h6 class="text-muted">Tahun Terbit <?= $detailBuku['thn_terbit'];?></h6></p>
              <a href="<?= base_url('admin/dashboard/buku');?>" class="btn btn-sm btn-danger">Kembali</a>
              <a onclick="return confirm('Yakin ingin di update?');" href="<?= base_url('admin/dashboard/edit_buku/'.$detailBuku['id_buku']);?>" class="btn btn-sm btn-primary">Update</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>
</div>
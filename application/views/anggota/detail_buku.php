<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?= base_url('assets/upload/'.$detailBuku['gambar']);?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $detailBuku['judul_buku'];?></h5>
        <p class="card-text">Pengarang : <?= $detailBuku['pengarang'];?></p>
        <p class="card-text">kategori : <?= $detailBuku['nama_kategori'];?></p>
        <p class="card-text"><small class="text-muted"><h5>Penerbit : <?= $detailBuku['penerbit'];?></h5></small></p>
        <div class="card-footer">
            <?php
                if ($detailBuku['status_buku'] == "0") {
                  echo "<button class='btn btn-sm btn-outline-secondary' disabled>Sudah Di Pinjam</button>";
                }else{
                  echo anchor('dashboard/pinjam_buku/'.$detailBuku['id_buku'],'<button class="btn btn-sm btn-primary">Pinjam</button>');
                }
              ?>
              <a href="<?= base_url('dashboard');?>" class="btn btn-sm btn-danger" >Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>


		
<div class="container">
<div class="row">

  <div class="col-md">
    <?php if( $this->session->flashdata('pesan')): ?>
      <div class="row mt-3">
        <div class="col">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('pesan');?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="row">
      <?php foreach( $buku as $b ): ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100 text-center">
            <a href="#"><img class="card-img-top mt-2 " style="max-width:100%; max-height: 100%; height: 150px; width: 120px" src="<?= base_url('assets/upload/'.$b['gambar']);?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#"><?= $b['judul_buku'];?></a>
              </h4>
              <h4 class="card-text">Penerbit :  <?= $b['penerbit'];?></h4>
              <p class="card-text">Tahun Terbit : <?= $b['thn_terbit'];?></p>
              <p class="card-text">Lokasi :  <?= $b['lokasi'];?></p>
              <p class="card-text">kategori :  <?= $b['nama_kategori'];?></p>
            </div>
            <div class="card-footer">
              <?php
                if ($b['status_buku'] == "0") {
                  echo "<button class='btn btn-sm btn-outline-secondary' disabled>Sudah Di Pinjam</button>";
                }else{
                  echo anchor('dashboard/pinjam_buku/'.$b['id_buku'],'<button class="btn btn-sm btn-primary">Pinjam</button>');
                }
              ?>
              <a href="<?= base_url('dashboard/detail_buku/'.$b['id_buku']);?>" class="btn btn-sm btn-success" >Detail</a>
            </div>
            <div class="card-footer">
              <small class="text-muted">Pengarang : <?= $b['pengarang'];?></small>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>


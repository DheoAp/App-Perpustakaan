<div class="container">
<div class="row">

  <div class="col-md">

    <!-- <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div> -->

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


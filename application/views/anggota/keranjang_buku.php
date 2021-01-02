<div class="container">
  <div class="card mx-auto" style="margin-top: 100px;margin-bottom:200px; width:90%">
    <div class="card-header">
      Buku Anda
    </div>
    <?php if( $this->session->flashdata('pesan')): ?>
      <div class="row mt-4">
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
    <div class="card-body">
      <table class="table table-border table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Pilih</th>
          </tr>
        </thead>
        <tbody>
         <?php $no=1; foreach( $dataPinjam as $p ): ?>
          <td><?= $no++;?></td>
          <td><?= $p['judul_buku'];?></td>
          <td></td>
          <td></td>
          <td></td>
          <td><a href="<?= base_url('dashboard/transaksi_aksi');?>"></a></td>
         <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
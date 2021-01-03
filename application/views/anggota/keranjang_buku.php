<div class="container-fluid">
  <div class="card mx-auto" style="margin-top: 100px;margin-bottom:200px; width:100%">
    <div class="card-header">
    <h5>Terimakasih, berikut buku yang anda pinjam</h5>
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
    <div class="card-body table-responsive">
      <table class="table table-bordered table-striped ">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status Pinjam</th>
            <th>Status Kembali</th>
            <th colspan="2" class="text-center">Pilih</th>
          </tr>
        </thead>
        <tbody>
         <?php $no=1; foreach( $dataPinjam as $p ): ?>
          <tr>
            <td><?= $no++;?></td>
            <td><?= $p['judul_buku'];?></td>
            <td><?= $p['pengarang'];?></td>
            <td><?= $p['tanggal_pinjam'];?></td>
            <td><?= $p['tanggal_kembali'];?></td>
            <td>
              <?php if( $p['status_peminjaman'] == '0' ): ?>
                  <?= '<h6><span class="badge badge-primary">Belum Selesai</span></h6>';?>
              <?php else : ?>
                <?= '<h6><span class="badge badge-success">Sudah Selesai</span></h6>';?>
              <?php endif; ?>
            </td>
            <td>
              <?php if( $p['status_pengembalian'] == '0' ): ?>
                    <?= '<h6><span class="badge badge-primary">Masih di pinjam</span></h6>';?>
              <?php elseif( $p['status_pengembalian'] == '1' ): ?>
                  <?= '<h6><span class="badge badge-success">Belum Kembali</span></h6>';?>
              <?php else: ?>
                  <?= '<h6><span class="badge badge-primary">Sudah Kembali</span></h6>';?>
              <?php endif; ?>
            </td>
            <td><a class="btn btn-sm btn-danger" href="<?= base_url('dashboard/transaksi_aksi');?>">Hapus</a></td>
            <td><a class="btn btn-sm btn-primary" href="<?= base_url('dashboard/transaksi_aksi');?>">Detail</a></td>
          </tr>
         <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="card-footer text-right">
      <a href="<?= base_url('dashboard');?>" class="btn btn-sm btn-primary">Pinjam Lagi</a>
    </div>
  </div>
</div>
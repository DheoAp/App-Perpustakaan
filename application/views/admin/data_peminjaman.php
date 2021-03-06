<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid mt-2 mb-2">
    <?php if( $this->session->flashdata('pesan')): ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('pesan');?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
		<?php endif; ?>
      <div class="card mb-5 mt-4">
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
                  <th>Nama</th>
                  <th>Buku</th>
                  <th>Tgl Pinjam</th>
                  <th>Tgl Kembali</th>
                  <th>Status Pinjam</th>
                  <th>Status Kembali</th>
                  <th>Total Denda</th>
                  <th colspan="3" class="text-center">Aksi</th>
                </tr>
              </thead>
              
              <tbody>
                <?php $no=1; foreach( $peminjaman as $p ): ?>
                    <tr>
                      <td><?= $no++;?></td>
                      <td><?= $p['nama_anggota'];?></td>
                      <td><?= $p['judul_buku'];?></td>
                      <td><?= $p['tanggal_pinjam'];?></td>
                      <td><?= $p['tanggal_kembali'];?></td>
                      <td>
                        <?php if($p['status_peminjaman'] == "0" ): ?>
                            <?= '<h6><span class="badge badge-primary">Belum Selesai</span></h6>';?>
                        <?php else: ?>
                            <?= '<h6><span class="badge badge-success">Sudah Selesai</span></h6>';?>
                        <?php endif; ?>
                      </td>
                      <td>
                      <?php if( $p['status_pengembalian'] == '0' ): ?>
                          <?= '<h6><span class="badge badge-primary">Belum Kembali</span></h6>';?>
                      <?php else: ?>
                          <?= '<h6><span class="badge badge-success">Sudah Kembali</span></h6>';?>
                      <?php endif; ?>
                      </td>
                      <td>Rp. <?= number_format($p['total_denda'],0,',','.')?></td>
                      <td><a href="" class="btn btn-sm btn-success"><i class="fa fa-info-circle"></i></a></td> <!-- info -->
                      <td><a href="<?= base_url('admin/dashboard/buku_kembali/'.$p['id_pinjam']);?>" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a></td> <!-- edit -->
                      <td><a onclick="return confirm('Anda Yakin Ingin Hapus?')" href="<?= base_url('admin/dashboard/hapus_peminjaman/'.$p['id_pinjam']);?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td> <!-- hapus -->
                    </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
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
        <i class="fas fa-book mr-1"></i>
        Data Buku | <a href="<?= base_url('admin/dashboard/tambah_buku');?>">Tambah Data Buku</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Judul Buku</th>
                <th>Status</th>
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
                    <td><?= $b['nama_kategori'];?></td>
                    <td><?= $b['judul_buku'];?></td>
                    <td>
                      <?php if( $b['status_buku'] == 1 ): ?>
                        <?= '<h6><span class="badge badge-primary">Tersedia</span></h6>';?>
                      <?php else: ?>
                        <?= '<h6><span class="badge badge-secondary">Sedang di pinjam</span></h6>';?>
                      <?php endif; ?>
                    </td>
                    <td><?= $b['pengarang'];?></td>
                    <td><?= $b['penerbit'];?></td>
                    <td><?= $b['lokasi'];?></td>
                    <td>
                      <a href="<?= base_url('admin/dashboard/detail_buku/'.$b['id_buku']);?>" class="btn btn-sm btn-success"><i class="fa fa-info-circle"></i></a><!-- Detail -->
                    </td> 
                    <td>
                      <a href="<?= base_url('admin/dashboard/edit_buku/'.$b['id_buku']);?>" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a> <!-- Ubah -->
                    </td> 
                    <td>
                      <a onclick="return confirm('Anda Yakin Ingin Hapus?')" href="<?= base_url('admin/dashboard/hapus_buku/'.$b['id_buku']);?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> <!-- Hapus -->
                    </td>
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
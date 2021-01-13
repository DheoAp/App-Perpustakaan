<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid mt-2 mb-2">
      <div class="card mb-5 mt-5">
        <div class="card-header">
          <i class="fas fa-users mr-1"></i>
          Data Anggota | <a href="">Tambah Data Anggota</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataTable2" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Anggota</th>
                  <th>Gender</th>
                  <th>Alamat</th>
                  <th>No. Telp</th>
                  <th>Email</th>
                  <th colspan="2" class="text-center">Aksi</th>
                </tr>
              </thead>
              
              <tbody>
                <?php $no=1; foreach( $anggota as $a ): ?>
                    <tr>
                      <td><?= $no++;?></td>
                      <td><?= $a['nama_lengkap'];?></td>
                      <td><?= $a['jenis_kelamin'];?></td>
                      <td><?= $a['alamat'];?></td>
                      <td><?= $a['no_telp'];?></td>
                      <td><?= $a['email'];?></td>
                      <td><a href="<?= base_url('admin/dashboard/detail_anggota/'.$a['id_anggota']);?>" class="btn btn-sm btn-success"><i class="fa fa-info-circle"></i></a></td> <!-- Detail -->
                      <td><a href="<?= base_url('admin/dashboard/hapus_anggota/'.$a['id_anggota']);?>" onclick="return confirm('Anda Yakin?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td> <!-- Hapus -->
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
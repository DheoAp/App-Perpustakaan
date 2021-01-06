<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid m-2">
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
                  <th colspan="3" class="text-center">Aksi</th>
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
                      <td><a href="" class="btn btn-sm btn-success"><i class="fa fa-info-circle"></i></a></td>
                      <td><a href="" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a></td>
                      <td><a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
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
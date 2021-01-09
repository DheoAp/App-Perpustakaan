<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid mt-3">

      <div class="card-body">
      <?= form_open_multipart('admin/dashboard/update_buku_aksi'); ?>
        <div class="card">
          <div class="card-header">
            Tambah Buku
          </div>
          <div class="card-body">
            <div class="row">
              <?php foreach( $buku as $b ): ?>
              <!-- Col 1 -->
              <div class="col-md">
                <!-- Kategori -->
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="id_kategori">
                    <option value="<?= $b['nama_kategori'];?>"><?= $b['nama_kategori'];?></option>
                    <?php foreach( $kategori  as $k ): ?>
                    <option value="<?= $k['id_kategori'];?>"><?= $k['nama_kategori'];?></option>
                    <?php endforeach; ?>
                  </select>
                  <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Judul Buku -->
                <div class="form-group">
                  <label for="judul_buku">Judul Buku</label>
                  <input value="<?= $b['judul_buku'];?>" class="form-control" type="text" name="judul_buku" id="judul_buku">
                  <input type="hidden" name="id_buku" value="<?= $b['id_buku'];?>">
                  <input type="hidden" name="id_kategori" value="<?= $b['id_kategori'];?>">
                  <?= form_error('judul_buku', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Pengarang -->
                <div class="form-group">
                  <label for="pengarang">Pengarang</label>
                  <input value="<?= $b['pengarang'];?>" class="form-control" type="text" name="pengarang" id="pengarang">
                  <?= form_error('pengarang', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Penerbit -->
                <div class="form-group">
                  <label for="penerbit">Penerbit</label>
                  <input value="<?= $b['penerbit'];?>" class="form-control" type="text" name="penerbit" id="penerbit">
                  <?= form_error('penerbit', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Tahun Terbit -->
                <div class="form-group">
                  <label for="thn_terbit">Tahun Terbit</label>
                  <input value="<?= $b['thn_terbit'];?>" class="form-control" type="date" name="thn_terbit" id="thn_terbit">
                  <?= form_error('thn_terbit', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

              </div>
              <!-- End Col 1 -->

              <!-- Col 2 -->
              <div class="col-md">
                <!-- ISBN -->
                <div class="form-group">
                  <label for="isbn">ISBN</label>
                  <input value="<?= $b['isbn'];?>" class="form-control" type="text" name="isbn" id="isbn">
                  <?= form_error('isbn', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Jumlah Buku -->
                <div class="form-group">
                  <label for="jumlah_buku">Jumlah Buku</label>
                  <input value="<?= $b['jumlah_buku'];?>" class="form-control" type="text" name="jumlah_buku" id="jumlah_buku">
                  <?= form_error('jumlah_buku', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Lokasi -->
                <div class="form-group">
                <label>Lokasi Buku</label>
                  <select name="lokasi" class="form-control">
                    <option value="<?= $b['lokasi'];?>"><?= $b['lokasi'];?></option>
                    <option value="Rak 1">Rak 1</option>
                    <option value="Rak 2">Rak 2</option>
                    <option value="Rak 3">Rak 3</option>
                  </select>
                  <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Status Buku -->
                <div class="form-group">
                  <label>Status Buku</label>
                  <select name="status_buku" class="form-control">
                    <option value="<?= $b['status_buku'];?>">
                      <?php if( $b['status_buku'] == "1" ): ?>
                          <?= "Tersedia";?>
                      <?php else: ?>
                        <?= "Tidak Tersedia";?>
                      <?php endif; ?>
                    </option>
                    <option value="1">Tersedia</option>
                    <option value="0">Tidak Tersedia</option>
                  </select>
                  <?= form_error('status_buku', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Gambar -->
                <div class="form-group">
              <label for="gambar">Gambar</label>
                 <img src="<?= base_url('assets/upload/'.$b['gambar']);?>" width="30%">
              <input class="form-control" type="file" name="gambar" id="gambar">
            </div>
              </div>        
              <!-- End Col 2 -->
            <?php endforeach; ?>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary" type="submit">Update Buku</button>
            <a href="<?= base_url('admin/dashboard/buku');?>" class="btn btn-danger">Kembali</a>
          </div>
        </div>
        
      <?= form_close();?>
      </div>

    </div>
  </main>
</div>

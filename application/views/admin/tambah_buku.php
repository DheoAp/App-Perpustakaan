<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid mt-3">

      <div class="card-body">
        <?= form_open_multipart('admin/dashboard/tambah_buku_aksi'); ?>
        <div class="card">
          <div class="card-header">
            Tambah Buku
          </div>
          <div class="card-body">
            <div class="row">
              <!-- Col 1 -->
              <div class="col-md">
                <!-- Kategori -->
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="id_kategori">
                    <option disabled selected >-Pilih Kategori-</option>
                    <?php foreach( $kategori  as $k ): ?>
                    <option value="<?= $k['id_kategori'];?>"><?= $k['nama_kategori'];?></option>
                    <?php endforeach; ?>
                  </select>
                  <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Judul Buku -->
                <div class="form-group">
                  <label for="judul_buku">Judul Buku</label>
                  <input class="form-control" type="text" name="judul_buku" id="judul_buku">
                  <?= form_error('judul_buku', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Pengarang -->
                <div class="form-group">
                  <label for="pengarang">Pengarang</label>
                  <input class="form-control" type="text" name="pengarang" id="pengarang">
                  <?= form_error('pengarang', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Penerbit -->
                <div class="form-group">
                  <label for="penerbit">Penerbit</label>
                  <input class="form-control" type="text" name="penerbit" id="penerbit">
                  <?= form_error('penerbit', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Tahun Terbit -->
                <div class="form-group">
                  <label for="thn_terbit">Tahun Terbit</label>
                  <input class="form-control" type="date" name="thn_terbit" id="thn_terbit">
                  <?= form_error('thn_terbit', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

              </div>
              <!-- End Col 1 -->

              <!-- Col 2 -->
              <div class="col-md">
                <!-- ISBN -->
                <div class="form-group">
                  <label for="isbn">ISBN</label>
                  <input class="form-control" type="text" name="isbn" id="isbn">
                  <?= form_error('isbn', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Jumlah Buku -->
                <div class="form-group">
                  <label for="jumlah_buku">Jumlah Buku</label>
                  <input class="form-control" type="text" name="jumlah_buku" id="jumlah_buku">
                  <?= form_error('jumlah_buku', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Lokasi -->
                <div class="form-group">
                <label>Lokasi Buku</label>
                  <select name="lokasi" class="form-control">
                    <option disabled selected>-Pilih-</option>
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
                    <option disabled selected>-Pilih-</option>
                    <option value="1">Tersedia</option>
                    <option value="0">Tidak Tersedia</option>
                  </select>
                  <?= form_error('status_buku', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- Gambar -->
                <div class="form-group">
                  <label for="gambar">Gambar</label>
                  <input class="form-control" type="file" name="gambar" id="gambar">
                </div>
              </div>
              <!-- End Col 2 -->
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary" type="submit">Tambah Buku</button>
            <a href="<?= base_url('admin/dashboard/buku');?>" class="btn btn-danger" type="submit">Kembali</a>
          </div>
        </div>
        
        <?= form_close();?>
      </div>

    </div>
  </main>
</div>

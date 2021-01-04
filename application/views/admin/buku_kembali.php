<div id="layoutSidenav_content">
<main>
  <div class="container-fluid">
    <div class="card mx-auto" style="margin-top: 50px;margin-bottom:200px; width:100%">
      <div class="card-header">
      <h5>Data Buku Kembali</h5>
      </div>

      <div class="card-body table-responsive">
        <form action="<?= base_url('admin/dashboard/buku_kembali_aksi');?>" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="nama_lengkap">Nama Anggota</label>
            <input class="form-control" name="nama_lengkap" value="<?= set_value('nama_lengkap')?>" type="text" id="nama_lengkap">
            <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="id_buku">Nama Buku</label>
            <input class="form-control" name="id_buku" value="<?= set_value('id_buku')?>" type="text" id="id_buku">
            <?= form_error('id_buku', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
              <label for="tanggal_pengembalian">Tanggal Kembali</label>
              <input class="form-control" type="date" name="tanggal_kembali" value="" readonly>
              <?= form_error('tanggal_pengembalian', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
            <input class="form-control" name="tanggal_pengembalian" value="" type="date" id="tanggal_pengembalian">
            <?= form_error('tanggal_pengembalian', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="total_denda">Total denda</label>
            <input class="form-control" type="text" name="tanggal_kembali" value="" readonly>
            <?= form_error('total_denda', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label>Status Peminjaman</label>
            <select name="status_peminjaman" class="form-control">
              <option value="0">Belum Selesai</option>
              <option value="1">Sudah Selesai</option>
            </select>
            <?= form_error('status_peminjaman', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label>Status Pengembalian</label>
            <select name="status_pengembalian" class="form-control">
              <option value="0">Belum kembali</option>
              <option value="1">Sudah kembali</option>
            </select>
            <?= form_error('status_pengembalian', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <button class="btn btn-primary mt-4 mr-2" type="submit">Simpan</button>
          <a href="<?= base_url('admin/dashboard/#peminjaman');?>" class="btn btn-danger mt-4 mr-2" type="submit">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</main>
</div> 
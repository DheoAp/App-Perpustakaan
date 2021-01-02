<div class="container">
  <div class="card" style="margin-top:50px;margin-bottom:150px">
   <div class="card-header">
      Pinjam Buku
   </div>
   <div class="card-body">
    <form action="<?= base_url('dashboard/aksi_pinjam_buku');?>" method="post" enctype="multipart/form-data">
      
      <div class="row">
        <div class="col">
          
          <?php foreach( $dataPinjam as $d ): ?>
            <div class="form-group">
              <label for="judul_buku">Judul Buku</label>
              <input class="form-control"  readonly name="id_buku" value="<?= $d['id_buku'];?>" type="hidden">
              <input class="form-control" readonly name="judul_buku" value="<?= $d['judul_buku'];?>" type="text" id="judul_buku">
              <?= form_error('judul_buku', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            
            <div class="form-group">
              <label for="pengarang">Pengarang</label>
              <input class="form-control" readonly name="pengarang" value="<?= $d['pengarang'];?>" type="text" id="pengarang">
              <?= form_error('pengarang', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            
            <div class="form-group">
              <label for="penerbit">Penerbit</label>
              <input class="form-control" readonly name="penerbit" value="<?= $d['penerbit'];?>" type="text" id="penerbit">
              <?= form_error('penerbit', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            
            <div class="form-group">
              <label for="thn_terbit">Tahun Terbit</label>
              <input class="form-control" readonly name="thn_terbit" value="<?= $d['thn_terbit'];?>" type="text" id="thn_terbit">
              <?= form_error('thn_terbit', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          <?php endforeach; ?>

          <!-- </div>
          <div class="col"> -->
          <?php
            $pinjam            = date("d-m-Y");
            $tujuh_hari        = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
            $kembali           = date("d F Y", $tujuh_hari);
          ?>
          <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input class="form-control" readonly name="tanggal_pinjam" value="<?= date('d F Y');?>" type="text" id="tanggal_pinjam">
            <?= form_error('tanggal_pinjam', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          
          <div class="form-group">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input class="form-control" readonly name="tanggal_kembali" value="<?= $kembali?>" type="text" id="tanggal_kembali">
            <?= form_error('tanggal_kembali', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>

          <div class="form-group">
            <label for="leperluan">Keperluan</label>
            <textarea class="form-control" name="keperluan" id="keperluan" cols="30" rows="4"><?= set_value('keperluan');?></textarea>
            <?= form_error('keperluan', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>

          <div class="form-group">
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url('dashboard');?>" class="btn btn-sm btn-danger">Batal</a>
          </div>

        </div>
      </div>
      
      
    </form>
  </div>
  </div>
</div>
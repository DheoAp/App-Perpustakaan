<div class="page-header mb-5" style="text-align:center;" >
  <h3>Edit Buku</h3>
</div>
<div class="row" style="margin: 50px;">

  <div class="col-md">
    <?php foreach( $buku  as $b ): ?>
    <form action="<?= base_url().'admin/update_buku'?>" method="post" enctype="multipart/form-data">
    <!-- Kategori -->
    <div class="form-group">
      <label>Kategori</label>
      <select class="form-control" name="id_kategori">
          <option value="<?= $b->id_kategori;?>"><?= $b->nama_kategori;?></option>
        <?php foreach( $kategori  as $k ): ?>
          <option value="<?= $k->id_kategori;?>"><?= $k->nama_kategori;?></option>
        <?php endforeach; ?>
      </select>
      <?= form_error('id_kategori');?>
    </div>
    <!-- Judul Buku -->
    <div class="form-group">
      <label for="judul_buku">Judul Buku</label>
      <input type="hidden" name="id" value="<? $b->id_buku;?>">
      <input class="form-control" type="text" name="judul_buku" id="judul_buku" value="<?= $b->judul_buku;?>">
      <?= form_error('judul_buku');?>
    </div>
    <!-- Pengarang -->
    <div class="form-group">
      <label for="pengarang">Pengarang</label>
      <input class="form-control" type="text" name="pengarang" id="pengarang" value="<?= $b->pengarang;?>">
      <?= form_error('pengarang');?>
    </div>
    <!-- Penerbit -->
    <div class="form-group">
      <label for="penerbit">Penerbit</label>
      <input class="form-control" type="text" name="penerbit" id="penerbit" value="<?= $b->penerbit;?>">
      <?= form_error('penerbit');?>
    </div>
    <!-- Tahun Terbit -->
    <div class="form-group">
      <label for="thn_terbit">Tahun Terbit</label>
      <input class="form-control" type="date" name="thn_terbit" id="thn_terbit" value="<?= $b->thn_terbit;?>">
      <?= form_error('thn_terbit');?>
    </div>

  </div>

  <div class="col-md">
    <!-- ISBN -->
    <div class="form-group">
      <label for="isbn">ISBN</label>
      <input class="form-control" type="text" name="isbn" id="isbn" value="<?= $b->isbn;?>">
      <?= form_error('isbn');?>
    </div>
    <!-- Jumlah Buku -->
    <div class="form-group">
      <label for="jumlah_buku">Jumlah Buku</label>
      <input class="form-control" type="text" name="jumlah_buku" id="jumlah_buku" value="<?= $b->jumlah_buku;?>">
      <?= form_error('jumlah_buku');?>
    </div>
    <!-- Lokasi -->
    <div class="form-group">
      <label for="lokasi">Lokasi</label>
      <input class="form-control" class="form-control" type="text" name="lokasi" id="lokasi" value="<?= $b->lokasi;?>">
      <?= form_error('lokasi');?>
    </div>
    <!-- Status Buku -->
    <div class="form-group">
      <label>Status Buku</label>
      <select name="status" class="form-control">
        <option <?php if($b->status_buku == "1"){echo "selected='selected'";} echo $b->status_buku;?> value="1">Tersedia</option>
        <option <?php if($b->status_buku == "0"){echo "selected='selected'";} echo $b->status_buku;?> value="0">Sedang di pinjam</option>
      </select>
      <?= form_error('status');?>
    </div>
    <!-- Gambar -->
    <div class="form-group">
      <label for="gambar">Gambar</label>
      <?php
        if(isset($b->gambar)){
          echo '<input type="hidden" name="old_pict" value="'.$b->gambar.'">';
          echo '<img src="'.base_url().'assets/upload/'.$b->gambar.'" width="30%">';
        }
      ?>
      <input class="form-control" type="file" name="foto" id="gambar">
    </div>
    <div class="form-group">
      <button class="btn btn-primary" type="submit" name="submit">Update Data</button>
    </div> 
    </form>
    <?php endforeach; ?>
  </div>

</div>

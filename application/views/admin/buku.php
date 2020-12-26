<div class="page-header">
  <h3>Data Buku</h3>
</div>
<a rel="stylesheet" href="<?= base_url().'admin/tambah_buku'?>">Tambah Buku Baru</a>
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" id="table-datatable">
    <thead>
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Tahun Penerbit</th>
        <th>ISBN</th>
        <th>Lokasi</th>
        <th>Status</th>
        <th>Pilihan</th>
      </tr>
    </thead>
    <tbody>
      <?php
       $no=1;
       foreach( $buku  as $b ): ?>
       <tr>
         <td><?= $no++;?></td>
         <td><img src="<?= base_url().'/assets/upload/'.$b->gambar?>" width="60" height="80" alt="Gambar tidak tersedia"></td>
         <td><?= $b->judul_buku;?></td>
         <td><?= $b->pengarang;?></td>
         <td><?= $b->penerbit;?></td>
         <td><?= $b->thn_terbit;?></td>
         <td><?= $b->isbn;?></td>
         <td><?= $b->lokasi;?></td>
         <td><?php
           if($b->status_buku == "1"){
             echo "Tersedia";
           }elseif($b->status_buku == "0"){
             echo "Sedang di pinjam";
           }
         ?></td>
         <td nowrap="nowrap">
           <a rel="stylesheet" href="<?= base_url().'admin/edit_buku/'.$b->id_buku;?>">Edit Buku</a> |
           <a rel="stylesheet" href="<?= base_url().'admin/hapus_buku/'.$b->id_buku;?>">Hapus Buku</a>
         </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<br>
<form action="<?= base_url().'auth/daftar'?>" method="post" enctype="multipart/form-data">
  <div class="row">
    
    <div class="col-md">
      <div class="form-group">
        <label for="email">Email</label>
        <input placeholder="Masukan email anda" class="form-control" name="email" value="<?= set_value('email')?>" type="text" id="email">
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>

      <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input placeholder="Masukan nama lengkap anda" class="form-control" name="nama_lengkap" value="<?= set_value('nama_lengkap')?>" type="text" id="nama_lengkap">
        <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>

      <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
          <option disabled selected value="<?= set_value('jenis_kelamin')?>">Pilih Jenis Kelamin</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
        <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>

      <div class="form-group ">
        <label for="tempat_lahir">Tempat / Tanggal Lahir</label>
        <div class="row">
          <div class="col-md">
            <input placeholder="Tempat Lahir" class="form-control" name="tempat_lahir" value="<?= set_value('tempat_lahir')?>" type="text" id="tempat_lahir">
            <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          
          <div class="col-md">
            <input class="form-control" name="tanggal_lahir" value="<?= set_value('tanggal_lahir')?>" type="date" id="tanggal_rental">
            <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>            
      </div>

      <div class="form-group">
        <label for="no_telp">No Telepon</label>
        <input placeholder="Masukan no telepon" class="form-control col-7" name="no_telp" value="<?= set_value('no_telp')?>" type="text" id="no_telp">
        <small id="passwordHelpBlock" class="form-text text-muted">
        Masukan tanpa pemisah (contoh. 0217714718)
        </small>
        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>    
    </div>
    <!-- === -->
    <div class="col-md">  
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea placeholder="Masukan alamat anda" class="form-control" name="alamat" value="<?= set_value('alamat')?>" rows="4"><?= set_value('alamat')?></textarea>
        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>

      <div class="form-group ">
        <div class="row">
          <div class="col-md">
            <label for="password">Buat Password</label>
            <input placeholder="Masukan password" class="form-control" name="password" type="password" id="password">
            <small id="passwordHelpBlock" class="form-text text-muted">
            (Minimal 6 karakter)
            </small>
            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>              
          <div class="col-md">
            <label for="password2">Ulang Password</label>
            <input placeholder="Ulang password" class="form-control" name="password2" type="password" id="password2">
          </div>
        </div>            
      </div>

      <div class="form-group ">
        <div class="row">
          <div class="col-md mt-1">
            <button class="btn btn-primary btn-md btn-block mb-1">Buat Akun</button>
            <span>Punya akun? </span><a href="<?= base_url('');?>" >Silakan login.</a>
          </div>
        </div>            
      </div>
    </div> <!-- End Col -->

  </div>       
</form>
<br>


  
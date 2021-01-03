<br>
<form action="<?= base_url('admin/dashboard/daftar')?>" method="post" enctype="multipart/form-data">
<div class="containter d-flex justify-content-center" >
  <div class="row" style="width: 50%;">

    <div class="col-md">
      <div class="form-group">
        <label for="email">Email</label>
        <input placeholder="Masukan email anda" class="form-control" name="email" value="<?= set_value('email')?>" type="text" id="email">
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>

      <div class="form-group">
        <label for="nama_admin">Nama Lengkap</label>
        <input placeholder="Masukan nama lengkap anda" class="form-control" name="nama_admin" value="<?= set_value('nama_admin')?>" type="text" id="nama_admin">
        <?= form_error('nama_admin', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <!-- === -->
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
</div>
</form>
<br>


  
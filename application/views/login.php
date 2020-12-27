<div class="container">
  <div class="row justify-content-center">
    <?php if( $this->session->flashdata('daftar')): ?>
      <div class="alert alert-success alert-dismissible col-md-5 fade show m-2" role="alert">
        <?= $this->session->flashdata('daftar');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php elseif($this->session->flashdata('cek_login')):?>
      <div class="alert alert-danger alert-dismissible col-md-5 fade show m-2" role="alert">
        <?= $this->session->flashdata('cek_login');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php elseif($this->session->flashdata('gagal_login')):?>
      <div class="alert alert-danger alert-dismissible col-md-5 fade show m-2" role="alert">
        <?= $this->session->flashdata('gagal_login');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php elseif($this->session->flashdata('salah_password')):?>
      <div class="alert alert-warning alert-dismissible col-md-5 fade show m-2" role="alert">
        <?= $this->session->flashdata('salah_password');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
  </div>
</div>


<br>
<form action="<?= base_url().'auth/login'?>" method="post" enctype="multipart/form-data">
<div class="container">
  <div class="row justify-content-center">
    
    <div class="col-md-5">
      <div class="form-group">
        <label for="email">Email</label>
        <input placeholder="Masukan email anda" class="form-control" name="email" value="<?= set_value('email')?>" type="text" id="email">
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>

      <div class="form-group">
      <label for="password">Password</label>
        <input placeholder="Masukan password anda" class="form-control" name="password" type="password" id="password">
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      
      <div class="form-group ">
        <button class="btn btn-primary btn-block mb-2">Masuk</button>
        <span>Belum punya akun? </span><a href="<?= base_url('daftar');?>" >Daftar disini.</a>           
      </div>
    </div>

  </div>
</div> 
</form>
<br>
  

  
<div class="page-header" style="margin-left: 110px ;">
  <h3>Ganti Password</h3>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <?php
        if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "berhasil"){
            echo "<div class='alert alert-success'>Password berhasil di ganti.</div>";
          }
        }
      ?>
      
      <form action="<?= base_url().'admin/ganti_password_act';?>" method="post">      
        <div class="form-group">
          <label for="pass_baru">Password Baru</label><br>
          <input type="password" name="pass_baru" id="pass_baru">
          <?= form_error('pass_baru');?>
        </div>

        <div class="form-group">
          <label for="ulang_pass">Ulangi Password Baru</label><br>
          <input type="password" name="ulang_pass" id="ulang_pass">
          <?= form_error('ulang_pass');?>
        </div>
        
        <div class="form-group">
          <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
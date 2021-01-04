<?php
  class Dashboard extends CI_Controller{
   function __construct()
   {
     parent::__construct();
     //cek login
     cek_login();
   }

  
   public function index()
   {
     // memparsing data yang kita ambil dari database
     $data['peminjaman'] = $this->db->query("select * from peminjaman order by id_pinjam desc limit 10")->result();
    //  $data['peminjaman'] = $this->M_perpus->pinjam('peminjaman')->result();
     $data['anggota'] = $this->db->query("select * from anggota order by id_anggota desc limit 10")->result();
     $data['buku'] = $this->db->query('select * from buku order by id_buku desc limit 10')->result();
     $data['peminjaman'] = $this->db->query('select * from keranjang order by id_anggota desc limit 10')->result();

     $data['peminjaman'] = $this->db->query("SELECT * FROM keranjang p, buku b, anggota a WHERE p.id_buku=b.id_buku And p.id_anggota=a.id_anggota")->result_array();

     $this->load->view('templates_admin/header');
     $this->load->view('templates_admin/sidebar');
     $this->load->view('admin/index',$data);
     $this->load->view('templates_admin/footer');
    
   }

   

   function buku()
   {
     $data['buku'] = $this->M_perpus->get_data('buku')->result();
     $this->load->view('templates/header');
     $this->load->view('admin/buku',$data);
     $this->load->view('templates/footer');
   }  
   public function tambah_buku()
   {
     $data['kategori'] = $this->M_perpus->get_data('kategori')->result();

     $this->load->view('templates_admin/header');
     $this->load->view('templates_admin/sidebar');
     $this->load->view('admin/tambah_buku',$data);
     $this->load->view('templates_admin/footer');
   }
   private function _rules()
   {
    $this->form_validation->set_rules('id_kategori', 'Id Kategori', 'required');
    $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
    $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
    $this->form_validation->set_rules('penerbit', 'penerbit', 'required');
    $this->form_validation->set_rules('thn_terbit', 'Tahun Terbit', 'required');
    $this->form_validation->set_rules('isbn', 'ISBN', 'required');
    $this->form_validation->set_rules('jumlah_buku', 'Jumlah Buku', 'required');
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    $this->form_validation->set_rules('status_buku', 'Status Buku', 'required');
   }
   public function tambah_buku_aksi()
   {
    $this->_rules();

    if($this->form_validation->run() == false){
      $this->tambah_buku();
    }else{
      $data = [
        'id_kategori'       => htmlspecialchars($this->input->post('id_kategori',true)),
        'judul_buku'        => htmlspecialchars($this->input->post('judul_buku',true)),
        'pengarang'         => htmlspecialchars($this->input->post('pengarang', true)),
        'thn_terbit'        => htmlspecialchars($this->input->post('thn_terbit',true)),
        'penerbit'          => htmlspecialchars($this->input->post('penerbit', true)),
        'isbn'              => htmlspecialchars($this->input->post('isbn',true)),
        'jumlah_buku'       => htmlspecialchars($this->input->post('jumlah_buku',true)),
        'lokasi'            => htmlspecialchars($this->input->post('lokasi',true)),
        'gambar'            => $_FILES['gambar']['name'],
        'tgl_input'         => date('Y-m-d'),
        'status_buku'       => htmlspecialchars($this->input->post('status_buku', true))
      ];
      
      if($data['gambar']=''){}else{
        $config['upload_path'] ='./assets/upload';
        $config['allowed_types'] ='jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['filename'] = 'gambar'.time();

        $this->load->library('upload',$config);

        // Jika upload gambar gagal
        if(!$this->upload->do_upload('gambar')){
          echo "Gambar mobil gagal di upload";
        }else{
          $data['gambar'] = $this->upload->data('file_name');
        }
      }
      // Masuk ke database
      $this->M_perpus->insert_data('buku',$data);
      $this->session->set_flashdata('pesan','Buku Berhasil di Tambahkan');
      redirect('admin');
    }
   }


   function edit_buku($id)
   {
     $where = array('id_buku' => $id);
     $data['buku'] = $this->db->query("SELECT * FROM buku B, kategori K WHERE B.id_kategori=K.id_kategori AND B.id_buku ='$id'")->result();
     $data['kategori'] = $this->M_perpus->get_data('kategori')->result();
     // $data['buku'] = $this->M_perpus->get_data('kategori')->result(?);
     $this->load->view('templates/header');
     $this->load->view('admin/edit_buku',$data);
     $this->load->view('templates/footer');
   }

   function update_buku()
   {
    $id = $this->input->post('id');
    $id_kategori = $this->input->post('id_kategori');
    $judul = $this->input->post('judul_buku');
    $pengarang = $this->input->post('pengarang');
    $penerbit = $this->input->post('penerbit');
    $thn_terbit = $this->input->post('thn_terbit');
    $isbn = $this->input->post('isbn');
    $jumlah_buku = $this->input->post('jumlah_buku');
    $lokasi = $this->input->post('lokasi');
    $status = $this->input->post('status');

    $this->form_validation->set_rules('id_kategori','ID Kategori','required');
    $this->form_validation->set_rules('judul_buku','Judul Buku','required|min_length[4]');
    $this->form_validation->set_rules('pengarang','Pengarang','required|min_length[4]');
    $this->form_validation->set_rules('penerbit','Penerbit','required|min_length[4]');
    $this->form_validation->set_rules('thn_terbit','Tahun Terbit','required|min_length[4]');
    $this->form_validation->set_rules('isbn','Nomor ISBN','required|numeric');
    $this->form_validation->set_rules('jumlah_buku','Jumlah Buku','required|numeric');
    $this->form_validation->set_rules('lokasi','Lokasi Buku','required|min_length[4]');
    $this->form_validation->set_rules('status','Status Buku','required');

    if($this->form_validation->run() != false){
        $config['upload_path'] = './assets/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['file_name'] = 'gambar'.time();

        $this->load->library('upload',$config);

        $where = array('id_buku' => $id);
        $data = array(
          'id_kategori' =>$id_kategori,
          'judul_buku' =>$judul,
          'pengarang' =>$pengarang,
          'penerbit' =>$penerbit,
          'thn_terbit' =>$thn_terbit,
          'isbn' =>$isbn,
          'jumlah_buku' =>$jumlah_buku,
          'lokasi' =>$lokasi,
          // 'gambar' =>$image['file_name'],
          'status_buku' =>$status
        );

         if($this->upload->do_upload('foto')){
            //proses upload Gambar
            $image = $this->upload->data();
            unlink('assets/upload/'.$this->input->post('old_pict',TRUE));
            $data['gambar'] = $image['file_name'];

            $this->M_perpus->update_data($data,$where,'buku');
          } else{
            $this->M_perpus->update_data($data,$where,'buku');
          }

        $this->M_perpus->update_data($data,$where,'buku');
        redirect(base_url().'admin/buku');
      } else{
          $where = array('id_buku' =>$id);
          $data['buku'] = $this->db->query("SELECT * FROM buku B, kategori K WHERE B.id_kategori=K.id_kategori AND B.id_buku='$id'")->result();
          $data['kategori'] = $this->M_perpus->get_data('kategori')->result();
          $this->load->view('admin/header');
          $this->load->view('admin/editbuku',$data);
          $this->load->view('admin/footer');
      }
   }

   public function hapus_buku($id)
   {
     $this->M_perpus->hapus_buku('buku',$id);
     $this->session->set_flashdata('pesan','Buku Berhasil di hapus');
     redirect('admin');
   }

   public function data_pinjam()
   {
    $data['buku'] = $this->M_perpus->get_data('buku')->result();
    $this->load->view('templates/header');
    $this->load->view('admin/buku',$data);
    $this->load->view('templates/footer');
   }

   public function buku_kembali()
   {
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/buku_kembali');
    $this->load->view('templates_admin/footer');
   }


   function logout()
   {
     // untuk menghapus semua session
     $this->session->sess_destroy();
     redirect('admin/auth/login');
   }

   function ganti_password()
   {
     $this->load->view('templates/header');
     $this->load->view('admin/ganti_password');
     $this->load->view('templates/footer');
   }

   function ganti_password_act()
   {
     $pass_baru = $this->input->post('pass_baru');
     $ulang_pass = $this->input->post('ulang_pass');

     $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
     $this->form_validation->set_rules('ulang_pass', 'Ulangi Password Baru', 'required');

     if($this->form_validation->run() != false){
        $data = array('password' => md5($pass_baru));
        $w = array('id_admin' => $this->session->userdata('id')); // untuk perintah menampilkan session 'id' admin yang sedang login

        $this->M_perpus->update_data($w,$data,'admin');
        redirect(base_url().'admin/ganti_password?pesan=berhasil');
     }else{
       $this->load->view('templates/header');
       $this->load->view('admin/ganti_password');
       $this->load->view('templates/footer');
     }
   }

  public function daftar()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]');
    $this->form_validation->set_rules('nama_admin', 'Nama lengkap', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]|min_length[6]');
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

    if($this->form_validation->run() == false){
      $judul['judul'] = "Buat Akun Admin";
      $judul['title'] = "Buat Akun Admin";
      $this->load->view('templates_login/header',$judul); 
      $this->load->view('admin/daftar'); 
      $this->load->view('templates_login/footer'); 
    }else{
      $data = [
        'role_id' => '1',
        'nama_admin' => htmlspecialchars($this->input->post('nama_admin',true)),
        'email' => htmlspecialchars($this->input->post('email',true)),
        'foto' => 'default.png',
        'tgl_bergabung' => time(),
        'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT)
      ];

      $this->M_perpus->insert_data('admin',$data);
      $this->session->set_flashdata('daftar','Berhasil di daftarkan.');
      redirect('admin/auth/login');
    }

    
  }

}// akhir class

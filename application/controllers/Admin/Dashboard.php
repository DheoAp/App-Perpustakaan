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
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/index');
    $this->load->view('templates_admin/footer');
  }


  // Function Data Buku
  private function _rules()
  {
    $this->form_validation->set_rules('id_kategori', 'Id Kategori', 'required');
    $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
    $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
    $this->form_validation->set_rules('penerbit', 'penerbit', 'required');
    $this->form_validation->set_rules('thn_terbit', 'Tahun Terbit', 'required');
    $this->form_validation->set_rules('isbn', 'ISBN', 'required|numeric');
    $this->form_validation->set_rules('jumlah_buku', 'Jumlah Buku', 'required|numeric');
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    $this->form_validation->set_rules('status_buku', 'Status Buku', 'required');
  }
  public function buku()
  {
    $data['buku'] = $this->M_perpus->data_buku()->result_array();
    $this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_buku');
    $this->load->view('templates_admin/footer');
  } 
  public function detail_buku($id)
  {
    $data['detailBuku'] = $this->M_perpus->getById($id)->row_array();
    $this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/detail_buku');
    $this->load->view('templates_admin/footer');
  } 
  public function tambah_buku()
  {
    $data['kategori'] = $this->M_perpus->getData('kategori');

    $this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/tambah_buku');
    $this->load->view('templates_admin/footer');
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
          echo "Gambar gagal di upload";
        }else{
          $data['gambar'] = $this->upload->data('file_name');
        }
      }
      // Masuk ke database
      $this->M_perpus->insert_data('buku',$data);
      $this->session->set_flashdata('pesan','Buku Berhasil di Tambahkan');
      redirect('admin/dashboard/buku');
    }
  }
  public function edit_buku($id)
  {
    $where = array('id_buku' => $id);
    $data['buku'] =  $this->M_perpus->getById($id)->result_array();
    $data['kategori'] = $this->M_perpus->getData('kategori');
    $this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/edit_buku');
    $this->load->view('templates_admin/footer');
  }
  public function update_buku_aksi()
  {
    $this->_rules();
    if($this->form_validation->run() == false){
      $this->buku();
    }else{
      $data = [
        'id_buku' => htmlspecialchars($this->input->post('id_buku',true)),
        'id_kategori' => htmlspecialchars($this->input->post('id_kategori',true)),
        'judul_buku' => htmlspecialchars($this->input->post('judul_buku',true)),
        'pengarang' => htmlspecialchars($this->input->post('pengarang',true)),
        'thn_terbit' => htmlspecialchars($this->input->post('thn_terbit',true)),
        'penerbit' => htmlspecialchars($this->input->post('penerbit',true)),
        'isbn' => htmlspecialchars($this->input->post('isbn',true)),
        'jumlah_buku' => htmlspecialchars($this->input->post('jumlah_buku',true)),
        'lokasi' => htmlspecialchars($this->input->post('lokasi',true)),
        'tgl_input' => htmlspecialchars($this->input->post('tgl_input',true)),
        'status_buku' => htmlspecialchars($this->input->post('status_buku',true)),
      ];
      $gambar     = $_FILES['gambar']['name'];
      if($gambar){
        $config ['upload_path'] = './assets/upload';
        $config ['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload',$config);
        
        if($this->upload->do_upload('gambar')){
          $gambar= $this->upload->data('file_name');
          $this->db->set('gambar',$gambar);
        }else{
          echo $this->upload->display_errors();
        }
      } 

      $where = [
        'id_buku' => $data['id_buku']
      ];
      
      $this->M_perpus->update_data('buku',$data,$where);
      $this->session->set_flashdata('pesan','Buku Berhasil di update');
      redirect('admin/dashboard/buku');
    }
  }

  public function hapus_buku($id)
  {
    $where =[
      'id_buku' => $id
    ];

    $this->db->where('id_buku',$id);
    $query = $this->db->get('buku');
    $row = $query->row();
    unlink("./assets/upload/$row->gambar");

    $this->M_perpus->hapus_data('buku',$where);
    $this->session->set_flashdata('pesan','Buku Berhasil di hapus');
    redirect('admin/dashboard/buku');
  }


  // Function Data Anggota
  function anggota()
  {
    $data['anggota'] = $this->M_perpus->getData('anggota');
    $this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_anggota');
    $this->load->view('templates_admin/footer');
  }
  public function detail_anggota($id)
  {
    $idAnggota = [
      'id_anggota' => $id
    ];

    $data['detailAnggota'] = $this->M_perpus->getIdAnggota('anggota',$idAnggota)->row_array();
    $this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/detail_anggota');
    $this->load->view('templates_admin/footer');
  } 
  public function hapus_anggota($id)
  {
    $where =[
      'id_anggota' => $id
    ];

    $this->db->where('id_anggota',$id);
    $query = $this->db->get('anggota');
    $row = $query->row();
    unlink("./assets/upload/$row->gambar");   

    $this->M_perpus->hapus_data('anggota',$where);
    $this->session->set_flashdata('pesan','anggota Berhasil di hapus');
    redirect('admin/dashboard/anggota');
  }


  // Function Data Peminjaman
  public function peminjaman()
  {
    $data['peminjaman'] = $this->M_perpus->data_peminjaman()->result_array();
    $this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_peminjaman');
    $this->load->view('templates_admin/footer');
  } 
  public function buku_kembali($id)
  {
    $where = ['id_pinjam' => $id];
    // $data['buku_kembali'] = $this->db->query("SELECT * FROM peminjaman k, anggota a, buku b WHERE id_pinjam='$id' AND k.id_anggota=a.id_anggota AND k.id_buku=b.id_buku")->result_array();
    $data['buku_kembali'] = $this->M_perpus->data_peminjaman()->result_array();
    $this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/buku_kembali');
    $this->load->view('templates_admin/footer');
  }
  public function buku_kembali_aksi()
  {
    $id                     = $this->input->post('id_pinjam');
    $id_buku                = $this->input->post('id_buku');
    $tanggal_kembali        = $this->input->post('tanggal_kembali');
    $tanggal_dikembalikan   = $this->input->post('tanggal_dikembalikan');
    $status_pengembalian    = $this->input->post('status_pengembalian');
    $status_peminjaman      = $this->input->post('status_peminjaman');
    $status_pengembalian    = $this->input->post('status_pengembalian');
    $rusak                  = $this->input->post('denda_rusak');
    $telat             = 1000;

    $y            = strtotime($tanggal_kembali);
    $x            = strtotime($tanggal_dikembalikan);
    
    if($tanggal_kembali < $tanggal_dikembalikan){
      $selisih      = abs($y - $x)/(60*60*24);
      $denda_telat = $selisih * $telat;
    }else{
      $denda_telat = 0;
    }

    if($rusak == "Rusak"){
      $denda_rusak = 5000;
    }else{
      $denda_rusak = 0;
    }
    $total_denda = $denda_telat + $denda_rusak;
    $data = [
      'tanggal_dikembalikan' => $tanggal_dikembalikan,
      'status_pengembalian' => $status_pengembalian,
      'status_peminjaman' => $status_peminjaman,
      'total_denda' => $total_denda
    ];
    
    $where = [
      'id_pinjam' => $id
    ];
    $this->M_perpus->update_data('peminjaman',$data,$where);
    $this->session->set_flashdata('pesan','Buku berhasil di kembalikan');
    redirect('admin/dashboard/peminjaman');
  }


  // Daftar
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


  // Auth
  public function logout()
  {
    // untuk menghapus semua session
    $this->session->sess_destroy();
    redirect('admin/auth/login');
  }
  public function ganti_password()
  {
    $this->load->view('templates/header');
    $this->load->view('admin/ganti_password');
    $this->load->view('templates/footer');
  }
  public function ganti_password_act()
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

}// akhir class

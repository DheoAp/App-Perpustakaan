<?php 
class M_perpus extends CI_Model{
 
  function insert_data($table,$data)
  {
    return $this->db->insert($table,$data);
  }

  public function getByEmail($email)
  {
   return $this->db->get_where('anggota',['email' => $email])->row_array();
  }

  public function edit_data($where,$table)
  {
   return $this->db->get_where($table,$where); 
  }
  
  public function hapus_buku($table,$id)
  {
    $this->db->delete($table,['id_buku' =>$id]);
    return $this->db->affected_rows();
  }

  public function pinjam($table)
  {
    $this->db->order_by($table,'id_pinjam','DESC')
                      ->limit(10);
  }

  public function get_data($table)
 {
   return $this->db->get($table);
 }
 public function update_data($table,$data,$where)
 {
  //  $this->db->where($where);
   $this->db->update($table,$data,$where);
 }
 public function delete_data($where,$table)
 {
   $this->db->where($where);
   $this->db->delete($table);
 }

}//akhir class

?>
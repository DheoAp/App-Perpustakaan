<?php
  
function cek_login()
{
  $ci = get_instance();
  if(!$ci->session->userdata('email')){
    $ci->session->set_flashdata('cek_login','Login terlebih dahulu!');
    redirect('');
  }
}

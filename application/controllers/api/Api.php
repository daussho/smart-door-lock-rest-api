<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller{

  public function index_get(){
    $rfid = $this->get('rfid');
    $room = $this->get('room');
    $status = "error";

    $nim = $this->cari_nim($rfid, $room);

    if($nim != 0){
      $data = $this->cek_jadwal($nim);
      if ($data['status'] == "ok"){
        $this->insert_history($nim, $room, $data['matkul']);
      }
    }

    date_default_timezone_set("Asia/Jakarta");
    $jam = date("H:i:s");
    $data = ['status' => $data['status']];
    //$data = ['time1' => (strtotime("01:00:00")-strtotime("00:00:00"))];
    $this->set_response($data);
  }

  private function cari_nim($rfid, $room){
    $this->load->database();
    $query = $this->db->query("SELECT nim FROM rfid WHERE rfid = '" . $rfid . "'");
    $hasil = $query->result();
    
    $this->db->close();
    $nim = 0;

    foreach ($hasil as $row){
        $nim = $row->nim;
    }

    return $nim;
  }

  private function cek_jadwal($nim){
    date_default_timezone_set("Asia/Jakarta");
    $data = array('status' => 'error', 'matkul' => '-');;

    $this->load->database();
    $query = $this->db->query("SELECT mengambil.kode_matkul, jadwal.kode_ruangan, jadwal.kode_waktu, waktu.jam, waktu.hari, penggunaan_ruangan.lama_pemakaian FROM mengambil INNER JOIN jadwal ON mengambil.kode_matkul = jadwal.kode_matkul INNER JOIN waktu ON jadwal.kode_waktu = waktu.kode_waktu INNER JOIN penggunaan_ruangan ON jadwal.kode_ruangan = penggunaan_ruangan.kode_ruangan AND jadwal.kode_waktu = penggunaan_ruangan.kode_waktu WHERE nim_mahasiswa = ".$nim);
    $hasil = $query->result();
    
    $this->db->close();

    //$day = date('l');
    $day = "Monday";
    //$now = date("H:i:s");
    $now = strtotime("06:50:00");

    foreach ($hasil as $row){
        //$jadwal = $row->nim;
        if ($day == $row->hari){
          $akhir = strtotime($row->jam) + ($row->lama_pemakaian)*3600;
          if (($akhir-$now) <= (($row->lama_pemakaian)*3600)+(10*60)){
            $data['status'] = "ok";
            $data['matkul'] = $row->kode_matkul;
          }
        }
    }

    return $data;
  }

  private function insert_history($nim, $room, $matkul){
    date_default_timezone_set("Asia/Jakarta");

    $date = date('Y-m-d');
    $time = date('H:i:s');

    $this->load->database();
    $query = $this->db->query("INSERT INTO history (nim_mahasiswa, tanggal, waktu, kode_ruangan, kode_matkul) VALUES (".$nim.", '".$date."', '".$time."', ".$room.", '".$matkul."')");
    //$hasil = $query->result();
  }



}

?>
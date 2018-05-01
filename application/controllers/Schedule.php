<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$this->load->helper('url');
		$this->load->library('session');
		
		if (!isset($_SESSION['id'])){
			redirect('login');
		}

		$id = $_SESSION['id'];
		$this->load->database();
		$query = $this->db->query("SELECT mengambil.kode_matkul, jadwal.kode_ruangan, jadwal.kode_waktu FROM mengambil INNER JOIN jadwal ON mengambil.kode_matkul = jadwal.kode_matkul WHERE nim_mahasiswa = ".$id);
		$this->db->close();

		$data['hasil'] = $query->result();

		$this->load->view('schedule', $data);
	}

}

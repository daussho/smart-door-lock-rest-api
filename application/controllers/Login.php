<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

		$this->load->view('login');
	}

	public function cek(){
		$this->load->library('session');

		$id = $this->input->post('id');
		$pwd = $this->input->post('pwd');
		$hashpwd = hash('sha256', $pwd);
		//$this->load->view('login');

		$this->load->database();
		$query = $this->db->query("SELECT * FROM mahasiswa WHERE nim_mahasiswa = ".$id." AND password LIKE '".$hashpwd."'");
		$hasil = $query->num_rows();
		$this->db->close();
		//echo $hasil;

		$this->load->helper('url');
		if ($hasil == '1'){
			$_SESSION['id'] = $id;
			redirect('home'); 
		} else {
			redirect('login');
		}
	}
}

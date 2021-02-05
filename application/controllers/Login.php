<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{

		$data = array('tittle' => 'PDAM');
		$this->load->view('login.php', $data, FALSE);

		$valid = $this->form_validation;

		$valid->set_rules('username','Username','required',
							array('required' => 'Username Harus Di Isi'));

		$valid->set_rules('password','Password','required',
							array('required' => 'Password Harap Di Isi'));


		if ($valid->run() === FALSE) {
			

		
		}else{

			$insert = $this->input;

			$username = $insert->post('username');
			$password = $insert->post('password');

			$check_login = $this->M_login->login($username,$password);

			if (count($check_login) == 1) {

				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('kode_user', $check_login->kode_user);
				$this->session->set_userdata('nama', $check_login->nama);
				$this->session->set_userdata('level', $check_login->level);

				redirect(base_url('Dashboard'), 'refresh');

			}else{

				$this->session->set_flashdata('sukses', 'Username Atau Password Tidak Cocok');
				redirect(base_url('Login'),'refresh');

			}
		}
	}

	public function logout()
	{

		$this->session->unset_userdata('username');
		// $this->session->set_userdata('password', $password);
		$this->session->unset_userdata('nama');
		//$this->session->unset_userdata('jabatan');

		$this->session->set_flashdata('sukses', 'Anda Berhasil Logout');
		redirect(base_url('Login'), 'refresh');
		
	}

}

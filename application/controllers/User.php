<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
	}

	public function index()
	{
 		$data = array(
				'tittle'      => "Administrator",
				'isi'         => "User/user.php");
 		$data['User']=$this->M_user->getAllData();

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}

	//pembuatan user
	public function FormCreate()
	{	$kode     			= $this->M_user->Kode();
 		$data 				= array(
				'kode'     => $kode,
				'tittle'   => "Administrator",
				'isi'      => "User/user-tambah.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
	}
public function Create()
	{
		$kode_user 		= $this->input->post('kode_user');
		$username    	= $this->input->post('username');
		$password       = $this->input->post('password');
		$nama     		= $this->input->post('nama');
		$level     		= $this->input->post('level');


		$data = array(
			'kode_user' 	   => $kode_user,
			'username'         => $username,
			'password'     	   => $password,
			'nama'      	   => $nama,
			'level'      	   => $level,);

		$this->M_user->Create($data);
		$this->session->set_flashdata('sukses', ' Data Berhasil Di Tambahkan');
		redirect(base_url('User'),'refresh');	
	}

//Edit User
	
public function FormUpdate($kode_user)
	{
		$user = $this->M_user->Detail($kode_user);
		$data = array(
			'user' => $user,
			'tittle' => "Administrator",
			'isi'    => "User/user-edit.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}
		
public function Update()
	{
		$kode_user = $this->input->post('kode_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama     = $this->input->post('nama');
		$level     = $this->input->post('level');
	
		$data = array(
			'kode_user' 	=> $kode_user,
			'username'    => $username,
			'password'     	=> $password,
			'nama'          => $nama,
			'level'          => $level,);

		$this->M_user->Update($data);
		$this->session->set_flashdata('sukses', ' Data Berhasil Di Edit');
		redirect(base_url('User'),'refresh');	
	}

	//delete User
		public function Delete($kode_user)
	{
		$data = array('kode_user' => $kode_user);
		$this->M_user->Delete($data);
		$this->session->flashdata('sukses', 'Data Telah Di Hapus !!!');

		redirect(base_url('User'),'refresh');
	}


//cetak User
			public function Cetak($kode_user)
	{
		// $this->load->library('mpdf');
		$data['cetak'] = $this->M_user->Cetak($kode_user);
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('User/cetak-user',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

}
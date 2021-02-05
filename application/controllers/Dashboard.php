<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kerusakan');
		$this->load->model('M_jadwal');
		$this->load->model('M_perawatan');
		$this->load->model('M_perbaikan');
	}

	public function index()
	{
		$kerusakan 		 = $this->M_kerusakan->Tanggal();
		$jadwal        	 = $this->M_jadwal->Tanggal();
		$nama	   	  	= $this->session->userdata('nama');
		$level	      	= $this->session->userdata('level');
		 if ($this->session->userdata('level') == 'Mekanik'){
		//elseif ($user->level == "Mekanik");
		$nama1 = $this->M_perbaikan->NamaMekanik($nama);
		$nama_mekanik = $nama1->nama_mekanik;
		$perbaikan   = $this->M_perbaikan->Read1($nama_mekanik);
		//print_r($perbaikan); exit();
		$perawatan   = $this->M_perawatan->Read1($nama_mekanik);
 		$data = array(
				'kerusakan' 	=> count($kerusakan),
				'jadwal'        => count($jadwal),
				'perbaikan'     => $perbaikan,
				'perawatan'     => $perawatan,
				'tittle'      	=> "Administrator",
				'isi'         	=> "dashboard.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}else {
		$kerusakan 		 = $this->M_kerusakan->Tanggal();
		$jadwal        	 = $this->M_jadwal->Tanggal();
		$perbaikan 		 = $this->M_perbaikan->MKeterangan()->num_rows();
		$perawatan 		 = $this->M_perawatan->MKeterangan()->num_rows();
 		$data = array(
				'kerusakan' 	=> count($kerusakan),
				'jadwal'        => count($jadwal),
				'perbaikan'     => $perbaikan,
				'perawatan'     => $perawatan,
				'tittle'      	=> "Administrator",
				'isi'         	=> "mdashboard.php");
 		$this->load->view('Layout/layout.php', $data, FALSE);
	}

}
}
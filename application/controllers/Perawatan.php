<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawatan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jadwal');
		$this->load->model('M_part');
		$this->load->model('M_perawatan');
		$this->load->model('M_mekanik');
	}

	public function index()
	{
		$mekanik      = $this->M_mekanik->Read();
		$part         = $this->M_part->Read();
		$jadwal       = $this->M_jadwal->Read();
		$nama	   = $this->session->userdata('nama');
		$level	   = $this->session->userdata('level');
		if ($this->session->userdata('level') == 'Mekanik'){
		// elseif ($user->level == "Mekanik");
		$nama1 = $this->M_perawatan->NamaMekanik($nama);
		$nama_mekanik = $nama1->nama_mekanik;
		$perawatan 	  = $this->M_perawatan->Read1($nama_mekanik);
	//		print_r($perawatan);exit();
 		$data = array(
 				'jadwal'	  => $jadwal,
				'part'  	  => $part,
				'mekanik'	  => $mekanik,
				'perawatan'	  => $perawatan,
				'tittle'      => "Administrator",
				'isi'         => "Perawatan/perawatan.php");
}else {
	$mekanik          = $this->M_mekanik->Read();
		$part         = $this->M_part->Read();
		$jadwal       = $this->M_jadwal->Read();
		$perawatan 	  = $this->M_perawatan->Read();

 		$data = array(
 				'jadwal'	  => $jadwal,
				'part'  	  => $part,
				'mekanik'	  => $mekanik,
				'perawatan'	  => $perawatan,
				'tittle'      => "Administrator",
				'isi'         => "Perawatan/perawatan.php");
}
		$this->load->view('Layout/layout.php', $data, FALSE);	
	}


	public function FormCreate()
	{
		$mekanik      = $this->M_mekanik->Read();
		$part         = $this->M_part->Read();
		$jadwal    	  = $this->M_jadwal->Read();
		$perawatan 	  = $this->M_perawatan->Read();
		$kode         = $this->M_perawatan->Kode();
		$now 		  = date("Y-m-d H:i:s");
		$data = array(
				'mekanik'	  => $mekanik,	
				'part'		  => $part,
				'jadwal'	  => $jadwal,
				'perawatan'	  => $perawatan,
				'kode'	      => $kode,
				'tittle'      => "Administrator",
				'isi'         => "Perawatan/tambah-perawatan.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
	}

	public function Create()
	{
		$nama_mekanik  	  = $this->input->post('nama_mekanik');
		$nama_part   	  = $this->input->post('nama_part');
		$kode_jadwal      = $this->input->post('kode_jadwal');
		$nama_mesin		  = $this->input->post('nama_mesin');
		$kode_perawatan   = $this->input->post('kode_perawatan');
		$jumlah			  = $this->input->post('jumlah');
		$keterangan		  = $this->input->post('keterangan');

		$data = array(
			'kode_perawatan'  			  => $kode_perawatan,
			'nama_mesin'  			  	  => $nama_mesin,
			'kode_jadwal'   			  => $kode_jadwal,
			'nama_part'		  			  => $nama_part,
			'nama_mekanik'				  => $nama_mekanik,	
			'jumlah'		  			  => $jumlah,
			'keterangan'		  		  => $keterangan);

		$this->db->insert('perawatan', $data);

		$this->session->set_flashdata('sukses', ' Data Berhasil Di Tambahkan');
		redirect(base_url('Perawatan'),'refresh');
	}

	public function FormUpdate($kode_perawatan)
	{
		$perawatan 	  = $this->M_perawatan->Detail($kode_perawatan);
		$mekanik      = $this->M_mekanik->Read();
		$part         = $this->M_part->Read();
		$jadwal    	  = $this->M_jadwal->Read();
		$data 		  = array(
			'mekanik'	  => $mekanik,	
			'part'		  => $part,
			'perawatan'	  => $perawatan,
			'jadwal'	  => $jadwal,
			'tittle' 	  => "Administrator",
			'isi'   	  => "Perawatan/edit-perawatan.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}
		
	public function Update()
	{
		$nama_mekanik  	  = $this->input->post('nama_mekanik');
		$nama_part   	  = $this->input->post('nama_part');
		$kode_perawatan   = $this->input->post('kode_perawatan');
		$kode_jadwal   	  = $this->input->post('kode_jadwal');
		$jumlah			  =  $this->input->post('jumlah');
		$keterangan		  = $this->input->post('keterangan');
	
		$data = array(
			'kode_perawatan'  			  => $kode_perawatan,
			'kode_jadwal'   			  => $kode_jadwal,
			'nama_part'		  			  => $nama_part,
			'nama_mekanik'				  => $nama_mekanik,	
			'jumlah'		  			  => $jumlah,
			'keterangan'		  		  => $keterangan);
		$this->M_perawatan->Update($data);
		$this->session->set_flashdata('sukses', ' Data Berhasil Di Edit');
		redirect(base_url('Perawatan'),'refresh');	
	}

	public function Delete($kode_perawatan)
	{
		$data = array('kode_perawatan' => $kode_perawatan);
		$this->M_perawatan->Delete($data);
		$this->session->flashdata('sukses', 'Data Telah Di Hapus !!!');

		redirect(base_url('Perawatan'),'refresh');
	}

	public function Proses($kode_perawatan)
	{	
		$proses = 'proses';
		$now 		 	  = date("Y-m-d H:i:s");
		$data = array(
			'kode_perawatan'     => $kode_perawatan,
			'waktu_perawatan'    => $now,
			'keterangan'         => $proses);
		$this->M_perawatan->Update($data);
		$this->session->flashdata('sukses', 'Data Telah Di UPDATE !!!');

		redirect(base_url('Perawatan'),'refresh');
	}

public function Selesai($kode_perawatan)
	{	
		$selesai = 'selesai';
		$now1 	= date("Y-m-d H:i:s");
		$data = array(
			'kode_perawatan' => $kode_perawatan,
			'waktu_selesai'  => $now1,
			'keterangan' => $selesai);
		$this->M_perawatan->Update($data);
		$this->session->flashdata('sukses', 'Data Telah Di UPDATE !!!');

		redirect(base_url('Perawatan'),'refresh');
	}

	public function Cetak($kode_perawatan)
	{	
		
		$data['cetak']=$this->M_perawatan->Cetak($kode_perawatan)->row_array();		
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Perawatan/cetak-perawatan',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();

	}

	public function Cetak1($kode_perawatan)
	{	
		
		$data['cetak']=$this->M_perawatan->Cetak1($kode_perawatan)->row_array();		
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Perawatan/cetak-perawatan1',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();

	}

}
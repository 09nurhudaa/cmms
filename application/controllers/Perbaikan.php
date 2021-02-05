<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perbaikan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kerusakan');
		$this->load->model('M_part');
		$this->load->model('M_perbaikan');
		$this->load->model('M_mekanik');

	}

	public function index()
	{

		$mekanik      = $this->M_mekanik->Read();
		$part         = $this->M_part->Read();
		$kerusakan    = $this->M_kerusakan->Read();
		$nama	   	  = $this->session->userdata('nama');
		$level	      = $this->session->userdata('level');
		 if ($this->session->userdata('level') == 'Mekanik'){
		//elseif ($user->level == "Mekanik");
		$nama1 = $this->M_perbaikan->NamaMekanik($nama);
		$nama_mekanik = $nama1->nama_mekanik;
		$perbaikan   = $this->M_perbaikan->Read1($nama_mekanik);
 		$data = array(
				'kerusakan'	  => $kerusakan,
				'part'  	  => $part,
				'mekanik'	  => $mekanik,
				'perbaikan'	  => $perbaikan,
				'tittle'      => "Administrator",
				'isi'         => "Perbaikan/perbaikan.php");
} else {
		$mekanik      = $this->M_mekanik->Read();
		$part         = $this->M_part->Read();
		$kerusakan    = $this->M_kerusakan->Read();
		$perbaikan   = $this->M_perbaikan->Read();
 		$data = array(
				'kerusakan'	  => $kerusakan,
				'part'  	  => $part,
				'mekanik'	  => $mekanik,
				'perbaikan'	  => $perbaikan,
				'tittle'      => "Administrator",
				'isi'         => "Perbaikan/perbaikan.php");
}
		$this->load->view('Layout/layout.php', $data, FALSE);	
	}

	public function FormCreate()
	{
		$mekanik      = $this->M_mekanik->Read();
		$part         = $this->M_part->Read();
		$kerusakan    = $this->M_kerusakan->Read();
		$perbaikan 	  = $this->M_perbaikan->Read();
		$kode         = $this->M_perbaikan->Kode();
		$now 		  = date("Y-m-d H:i:s");
		$data = array(
				'mekanik'	  => $mekanik,	
				'part'		  => $part,
				'kerusakan'	  => $kerusakan,
				'perbaikan'	  => $perbaikan,
				'kode'	      => $kode,
				'tittle'      => "Administrator",
				'isi'         => "Perbaikan/tambah-perbaikan.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
	}

	public function Create()
	{
		$nama_part  	  = $this->input->post('nama_part');
		$nama_mekanik  	  = $this->input->post('nama_mekanik');
		$kode_kerusakan   = $this->input->post('kode_kerusakan');
		$kode_perbaikan   = $this->input->post('kode_perbaikan');
		$jumlah			  =  $this->input->post('jumlah');
		$keterangan		  = $this->input->post('keterangan');
		$interfal		  = $this->input->post('interfal');
		$shift		 	  = $this->input->post('shift');
		// $now 		      = date("Y-m-d H:i:s");

		$data = array(
			'kode_perbaikan'  			  => $kode_perbaikan,
			'kode_kerusakan'   			  => $kode_kerusakan,
			'nama_part'		  			  => $nama_part,
			'nama_mekanik'				  => $nama_mekanik,	
			'jumlah'		  			  => $jumlah,
			'interfal'					  => $interfal,
			'shift'				          => $shift,
			// 'waktu_pengerjaan'      	  => $now,
			'keterangan'		  		  => $keterangan);

		// $this->db->insert('perbaikan', $data);
		$this->M_perbaikan->Create($data);

		$this->session->set_flashdata('sukses', ' Data Berhasil Di Tambahkan');
		redirect(base_url('Perbaikan'),'refresh');
	}

public function FormUpdate($kode_perbaikan)
	{
		$perbaikan 	  = $this->M_perbaikan->Detail($kode_perbaikan);
		$mekanik      = $this->M_mekanik->Read();
		$part         = $this->M_part->Read();
		$kerusakan    = $this->M_kerusakan->Read();
		$now 		  = date("Y-m-d H:i:s");
		$now1 		  = date("Y-m-d H:i:s");
		$data = array(
			'mekanik'	  => $mekanik,	
			'part'		  => $part,
			'kerusakan'	  => $kerusakan,
			'perbaikan'	  => $perbaikan,
			'tittle' => "Administrator",
			'isi'    => "Perbaikan/edit-perbaikan.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}
		
public function Update()
	{
		$nama_mekanik  	  = $this->input->post('nama_mekanik');
		$nama_part   	  = $this->input->post('nama_part');
		$kode_kerusakan   = $this->input->post('kode_kerusakan');
		$kode_mesin       = $this->input->post('kode_mesin');
		$nama_mesin       = $this->input->post('nama_mesin');
		$deskripsi   	  = $this->input->post('deskripsi');
		$kode_perbaikan   = $this->input->post('kode_perbaikan');
		$jumlah			  = $this->input->post('jumlah');
		$keterangan		  = $this->input->post('keterangan');
		$interfal		  = $this->input->post('interfal');
		$shift		 	  = $this->input->post('shift');
		$now 		 	  = date("Y-m-d H:i:s");
		$now1 		 	  = date("Y-m-d H:i:s");
		
		$data = array(
			'kode_perbaikan'  			  => $kode_perbaikan,
			'kode_kerusakan'   			  => $kode_kerusakan,
			'kode_mesin'   			  	  => $kode_mesin,
			'nama_mesin'   			      => $nama_mesin,
			'deskripsi'   			      => $deskripsi,
			'nama_part'		  			  => $nama_part,
			'nama_mekanik'				  => $nama_mekanik,	
			'jumlah'		  			  => $jumlah,
			'interfal'		  			  => $interfal,
			'shift'		  			  => $shift,
			'waktu_pengerjaan'      	  => $now,
			'waktu_selesai'				  => $now1,
			'keterangan'		  		  => $keterangan);
		$this->M_perbaikan->Update($data);
		$this->session->set_flashdata('sukses', ' Data Berhasil Di Edit');
		redirect(base_url('Perbaikan'),'refresh');	
	}

//fungsi
		public function Delete($kode_perbaikan)
	{
		$data = array('kode_perbaikan' => $kode_perbaikan);
		$this->M_perbaikan->Delete($data);
		$this->session->flashdata('sukses', 'Data Telah Di Hapus !!!');

		redirect(base_url('Perbaikan'),'refresh');
	}

		public function Proses($kode_perbaikan)
	{	
		$proses = 'proses';
		$now 	 = date("Y-m-d H:i:s");
		$data = array(
			'kode_perbaikan' => $kode_perbaikan,
			'waktu_pengerjaan'    => $now,
			'keterangan' => $proses);
		$this->M_perbaikan->Update($data);
		$this->session->flashdata('sukses', 'Data Telah Di UPDATE !!!');

		redirect(base_url('Perbaikan'),'refresh');
	}

public function Selesai($kode_perbaikan)
	{	
		$selesai = 'selesai';
		$now1 	= date("Y-m-d H:i:s");
		$data = array(
			'kode_perbaikan' => $kode_perbaikan,
			'waktu_selesai'    => $now1,
			'keterangan' => $selesai);
		$this->M_perbaikan->Update($data);
		$this->session->flashdata('sukses', 'Data Telah Di UPDATE !!!');

		redirect(base_url('Perbaikan'),'refresh');
	}

	public function Cetak($kode_perbaikan)
	{	
		
		$data['cetak']=$this->M_perbaikan->Cetak($kode_perbaikan)->row_array();		
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Perbaikan/cetak-perbaikan',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();

	}

	public function Cetak1($kode_perbaikan)
	{	
		
		$data['cetak']=$this->M_perbaikan->Cetak1($kode_perbaikan)->row_array();		
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Perbaikan/cetak1-perbaikan',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();

	}



}
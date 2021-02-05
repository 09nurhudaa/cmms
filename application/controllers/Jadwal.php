<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->model('M_mesin');
			$this->load->model('M_jadwal');
	}

	public function index()
	{
		$Mesin       = $this->M_mesin->Read();  
		$jadwal   	 = $this->M_jadwal->Read();
 		$data = array(
 				'Mesin'  	  => $Mesin,
				'jadwal'	  => $jadwal,
				'tittle'      => "Administrator",
				'isi'         => "Jadwal/jadwal.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
	}

	public function FormCreate()
	{
		$Mesin        = $this->M_mesin->Read();  
		$jadwal    	  = $this->M_jadwal->Read();
		$kode         = $this->M_jadwal->Kode();
		//$now 		  = date("Y-m-d H:i:s");
		
		
		$data = array(
				'Mesin'		  => $Mesin,
				'jadwal'	  => $jadwal,
				'kode'    	  => $kode,
				'tittle'      => "Administrator",
				'isi'         => "Jadwal/tambah-jadwal.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
	}


//create jadwal
	public function Create()
	{
		$kode_mesin   	  = $this->input->post('kode_mesin');
		$kode_jadwal   	  = $this->input->post('kode_jadwal');
		$nama_mesin   	  = $this->input->post('nama_mesin');
		$jenis_perawatan  = $this->input->post('jenis_perawatan');
		$interfal		  = $this->input->post('interfal');
		$shift		 	  = $this->input->post('shift');
		$tanggal     	  = date_format(date_create($this->input->post('tanggal')), 'Y-m-d' );
		$data = array(
			'kode_jadwal'   	=> $kode_jadwal,
			'kode_mesin'  	    => $kode_mesin,
			'nama_mesin'  	    => $nama_mesin,
			'jenis_perawatan'	=> $jenis_perawatan,
			'interfal'			=> $interfal,
			'shift'				=> $shift,
			'tanggal'      	    => $tanggal);

		$this->db->insert('jadwal', $data);
		$this->session->set_flashdata('sukses', ' Data Berhasil Di Tambahkan');
		redirect(base_url('Jadwal'),'refresh');
	}

	//edit jadwal

	public function FormUpdate($kode_jadwal)
	{
		$jadwal = $this->M_jadwal->Detail($kode_jadwal);
		$Mesin  = $this->M_mesin->Read();
		$now			  = date("Y-m-d H:i:s");
		$data = array(
			'jadwal' => $jadwal,
			'Mesin'  => $Mesin,
			'tittle' => "Administrator",
			'isi'    => "Jadwal/edit-jadwal.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}
		
public function Update()
	{
		$kode_jadwal 	  = $this->input->post('kode_jadwal');
		$kode_mesin 	  = $this->input->post('kode_mesin');
		$jenis_perawatan  = $this->input->post('jenis_perawatan');
		$interfal		  = $this->input->post('interfal');
		$shift		 	  = $this->input->post('shift');
		$now			  = date("Y-m-d H:i:s");
	
		$data = array(
			'kode_jadwal' 		=> $kode_jadwal,
			'kode_mesin' 		=> $kode_mesin,
			'jenis_perawatan'	=> $jenis_perawatan,
			'interfal'			=> $interfal,
			'shift'				=> $shift,
			'tanggal'      	    => $now);
 
		$this->M_jadwal->Update($data);
		$this->session->set_flashdata('sukses', ' Data Berhasil Di Edit');
		redirect(base_url('Jadwal'),'refresh');	
	}

		//delete jadwal
		public function Delete($kode_jadwal)
	{
		$data = array('kode_jadwal' => $kode_jadwal);
		$this->M_jadwal->Delete($data);
		$this->session->flashdata('sukses', 'Data Telah Di Hapus !!!');

		redirect(base_url('Jadwal'),'refresh');
	}


//cetak Jadwal
			public function Cetak($kode_jadwal)
	{
		// $this->load->library('mpdf');
		$data['cetak'] = $this->M_jadwal->Cetak($kode_jadwal);
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Jadwal/cetak-jadwal',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function Cetak1($kode_jadwal)
	{
		// $this->load->library('mpdf');
		$data['cetak'] = $this->M_jadwal->Cetak($kode_jadwal);
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Jadwal/cetak-jadwal1',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}



}
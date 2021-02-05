<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerusakan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_mesin');
		$this->load->model('M_kerusakan');
	}

	public function index()
	{
		$Mesin       = $this->M_mesin->Read();  
		$kerusakan   = $this->M_kerusakan->Read();
 		$data = array(
 				'Mesin'  	  => $Mesin,
				'kerusakan'	  => $kerusakan,
				'tittle'      => "Administrator",
				'isi'         => "Kerusakan/kerusakan.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
	}

	public function FormCreate()
	{
		$Mesin        = $this->M_mesin->Read();  
		$kerusakan    = $this->M_kerusakan->Read();
		$kode         = $this->M_kerusakan->Kode();
		// $tanggal 	  = date("Y-m-d H:i:s");
		
		$data = array(
				'Mesin'		  => $Mesin,
				'kerusakan'	  => $kerusakan,
				'kode'        => $kode,
				'tittle'      => "Administrator",
				'isi'         => "Kerusakan/kerusakan-tambah.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
	}

	public function Create()
	{
		$kode_mesin   	  = $this->input->post('kode_mesin');
		$nama_mesin		  = $this->input->post('nama_mesin');
		$deskripsi        = $this->input->post('deskripsi');
		$kode_kerusakan   = $this->input->post('kode_kerusakan');
		$tanggal     	  = date_format(date_create($this->input->post('tanggal')), 'Y-m-d' );
		$jam     	  	  = date_format(date_create($this->input->post('jam')), 'H:i:s a' );
		// $tanggal			  = date("Y-m-d H:i:s");

		$data = array(
			'kode_kerusakan'   => $kode_kerusakan,
			'kode_mesin'  	   => $kode_mesin,
			'nama_mesin'  	   => $nama_mesin,
			'deskripsi'		   => $deskripsi,
			'tanggal'      	   => $tanggal,
			'jam'			   => $jam);

		$this->db->insert('kerusakan', $data);

		$this->session->set_flashdata('sukses', ' Data Berhasil Di Tambahkan');
		redirect(base_url('Kerusakan'),'refresh');
	}

public function FormUpdate($kode_kerusakan)
	{
		$kerusakan 	  = $this->M_kerusakan->Detail($kode_kerusakan);
		$Mesin        = $this->M_mesin->Read();
		$now		  = date("Y-m-d H:i:s");
		$data = array(
			'kerusakan' => $kerusakan,
			'Mesin' 	=> $Mesin,
			'tittle'    => "Administrator",
			'isi'       => "Kerusakan/kerusakan-edit.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}
		
public function Update()
	{
		$kode_kerusakan = $this->input->post('kode_kerusakan');
		$kode_mesin 	= $this->input->post('kode_mesin');
		$nama_mesin 	= $this->input->post('nama_mesin');
		$tahun		 	= $this->input->post('tahun');
		$tipe		 	= $this->input->post('tipe');
		$deskripsi 	    = $this->input->post('deskripsi');
		$now			= date("Y-m-d H:i:s");
	
		$data = array(
			'kode_kerusakan' 	=> $kode_kerusakan,
			'kode_mesin' 		=> $kode_mesin,
			'nama_mesin' 		=> $nama_mesin,
			'tahun' 			=> $tahun,
			'tipe'		    	=> $tipe,
			'tanggal'      	    => $now);
 
		$this->M_kerusakan->Update($data);
		$this->session->set_flashdata('sukses', ' Data Berhasil Di Edit');
		redirect(base_url('Kerusakan'),'refresh');	
	}

	//delete Mesin
		public function Delete($kode_kerusakan)
	{
		$data = array('kode_kerusakan' => $kode_kerusakan);
		$this->M_kerusakan->Delete($data);
		$this->session->flashdata('sukses', 'Data Telah Di Hapus !!!');

		redirect(base_url('Kerusakan'),'refresh');
	}


//cetak Mesin
		public function Cetak($kode_kerusakan)
	{
		$data['cetak'] = $this->M_kerusakan->Cetak($kode_kerusakan);
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Kerusakan/kerusakan-cetak',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

		public function Cetak1($kode_kerusakan)
	{
		$data['cetak'] = $this->M_kerusakan->Cetak($kode_kerusakan);
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Kerusakan/kerusakan-cetak1',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

}
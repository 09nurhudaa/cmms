<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_mesin');
	}

	public function index()
	{
 		$data = array(
				'tittle'      => "Administrator",
				'isi'         => "Mesin/mesin.php");
 		$data['Mesin']=$this->M_mesin->getAllData();

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}
	
//pembuatan mesin
	public function FormCreate()
	{	$kode     			= $this->M_mesin->Kode();
 		$data 				= array(
				'kode'     => $kode,
				'tittle'   => "Administrator",
				'isi'      => "Mesin/tambahmesin.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
	}
public function Create()
	{
		$kode_mesin 	 = $this->input->post('kode_mesin');
		$nama_mesin      = $this->input->post('nama_mesin');
		$tahun       	 = $this->input->post('tahun');
		$tipe     		 = $this->input->post('tipe');

		$data = array(
			'kode_mesin' 	   => $kode_mesin,
			'nama_mesin'       => $nama_mesin,
			'tahun'     	   => $tahun,
			'tipe'      	   => $tipe,);

		$this->M_mesin->Create($data);
		$this->session->set_flashdata('sukses', ' Data Berhasil Di Tambahkan');
		redirect(base_url('Mesin'),'refresh');	
	}

//Edit Mesin
	
public function FormUpdate($kode_mesin)
	{
		$mesin = $this->M_mesin->Detail($kode_mesin);
		$data = array(
			'mesin'  => $mesin,
			'tittle' => "Administrator",
			'isi'    => "Mesin/mesin-edit.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}
		
public function Update()
	{
		$kode_mesin = $this->input->post('kode_mesin');
		$nama_mesin = $this->input->post('nama_mesin');
		$tahun      = $this->input->post('tahun');
		$tipe       = $this->input->post('tipe');
	
		$data = array(
			'kode_mesin' 	=> $kode_mesin,
			'nama_mesin'    => $nama_mesin,
			'tahun'     	=> $tahun,
			'tipe'          => $tipe);

		$this->M_mesin->Update($data);
		$this->session->set_flashdata('sukses', ' Data Berhasil Di Edit');
		redirect(base_url('Mesin'),'refresh');	
	}

	//delete Mesin
		public function Delete($kode_mesin)
	{
		$data = array('kode_mesin' => $kode_mesin);
		$this->M_mesin->Delete($data);
		$this->session->flashdata('sukses', 'Data Telah Di Hapus !!!');

		redirect(base_url('Mesin'),'refresh');
	}


//cetak Mesin
			public function Cetak($kode_mesin)
	{
		// $this->load->library('mpdf');
		$data['cetak'] = $this->M_mesin->Cetak($kode_mesin);
		$mpdf 		   = new \Mpdf\Mpdf();
		$html 		   = $this->load->view('Mesin/cetak-mesin',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}
		
	}
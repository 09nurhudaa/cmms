<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mekanik extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_mekanik');
	}

	public function index()
	{
 		$data = array(
				'tittle'      => "Administrator",
				'isi'         => "Mekanik/mekanik.php");
 		$data['Mekanik']=$this->M_mekanik->getAllData();

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}

//Buat Mekanik
	public function FormCreate()
	{	$kode     			= $this->M_mekanik->Kode();
 		$data 				= array(
				'kode'     => $kode,
				'tittle'   => "Administrator",
				'isi'      => "Mekanik/tambah-mekanik.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
	}

public function Create()
	{
		$kode_mekanik = $this->input->post('kode_mekanik');
		$nama_mekanik = $this->input->post('nama_mekanik');
		$alamat       = $this->input->post('alamat');
		$telepon     = $this->input->post('telepon');

		$data = array(
			'kode_mekanik' 	   => $kode_mekanik,
			'nama_mekanik'       => $nama_mekanik,
			'alamat'     	   => $alamat,
			'telepon'      	   => $telepon,);

		$this->M_mekanik->Create($data);
		$this->session->set_flashdata('sukses', ' Data Berhasil Di Tambahkan');
		redirect(base_url('Mekanik'),'refresh');	
	}

	//Edit Mekeanik
	
public function FormUpdate($kode_mekanik)
	{
		$mekanik = $this->M_mekanik->Detail($kode_mekanik);
		$data = array(
			'mekanik' => $mekanik,
			'tittle' => "Administrator",
			'isi'    => "Mekanik/mekanik-edit.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}
		
public function Update()
	{
		$kode_mekanik = $this->input->post('kode_mekanik');
		$nama_mekanik = $this->input->post('nama_mekanik');
		$alamat     = $this->input->post('alamat');
		$telepon    = $this->input->post('telepon');
	
		$data = array(
			'kode_mekanik' 	  => $kode_mekanik,
			'nama_mekanik'    => $nama_mekanik,
			'alamat'     	  => $alamat,
			'telepon'         => $telepon);

		$this->M_mekanik->Update($data);
		$this->session->set_flashdata('sukses', ' Data Berhasil Di Edit');
		redirect(base_url('Mekanik'),'refresh');	
	}

			public function Delete($kode_mekanik)
	{
		$data = array('kode_mekanik' => $kode_mekanik);
		$this->M_mekanik->Delete($data);
		$this->session->flashdata('sukses', 'Data Telah Di Hapus !!!');

		redirect(base_url('Mekanik'),'refresh');
	}

//cetak mekanik
		public function Cetak($kode_mekanik)
	{
		// $this->load->library('mpdf');
		$data['cetak'] = $this->M_mekanik->Cetak($kode_mekanik);
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Mekanik/cetak-mekanik',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	    public function tes(){
        echo $this->M_mekanik->tesapi();
    }

}
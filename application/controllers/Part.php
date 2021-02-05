<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Part extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_part');
	}

	public function index()
	{
 		$data = array(
				'tittle'      => "Administrator",
				'isi'         => "Part/part.php");
		$data['Part']=$this->M_part->getAllData();

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}

	//pembuatan part
		public function FormCreate()
	{	$kode     			= $this->M_part->Kode();
 		$data 				= array(
				'kode'     => $kode,
				'tittle'   => "Administrator",
				'isi'      => "Part/tambah-part.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
	}

		public function Create()
	{
		$kode_part = $this->input->post('kode_part');
		$nama_part      = $this->input->post('nama_part');

		$data = array(
			'kode_part' 	   => $kode_part,
			'nama_part'       => $nama_part,);

		$this->M_part->Create($data);
		$this->session->set_flashdata('sukses', ' Data Berhasil Di Tambahkan');
		redirect(base_url('Part'),'refresh');	
	}

	//Edit Part
	
public function FormUpdate($kode_part)
	{
		$part = $this->M_part->Detail($kode_part);
		$data = array(
			'part' 	=> $part,
			'tittle' => "Administrator",
			'isi'    => "Part/part-edit.php");

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}
		
public function Update()
	{
		$kode_part = $this->input->post('kode_part');
		$nama_part = $this->input->post('nama_part');
		$data = array(
			'kode_part' 	=> $kode_part,
			'nama_part'    => $nama_part,);

		$this->M_part->Update($data);
		$this->session->set_flashdata('sukses', ' Data Berhasil Di Edit');
		redirect(base_url('Part'),'refresh');	
	}

	public function Delete($kode_part)
	{
		$data = array('kode_part' => $kode_part);
		$this->M_part->Delete($data);
		$this->session->flashdata('sukses', 'Data Telah Di Hapus !!!');

		redirect(base_url('Part'),'refresh');
	}

	//cetak Part
	public function Cetak($kode_part)
	{
		// $this->load->library('mpdf');
		$data['cetak'] = $this->M_part->Cetak($kode_part);
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Part/cetak-part',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kerusakan');
		$this->load->model('M_perbaikan');
		$this->load->model('M_perawatan');
		$this->load->model('M_laporan');
	}

	public function index()
	{
		$nama	   = $this->session->userdata('nama');
		$level	   = $this->session->userdata('level');
		if ($this->session->userdata('level') == 'Mekanik'){
		// elseif ($user->level == "Mekanik");
		$nama1 = $this->M_laporan->NamaMekanik($nama);
		$nama_mekanik = $nama1->nama_mekanik;
		$kerusakan 		 = $this->M_kerusakan->Read();
		$perbaikan 		 = $this->M_perbaikan->Read1($nama_mekanik);
		$perawatan 		 = $this->M_perawatan->Read1($nama_mekanik);
 		$data = array(
				'kerusakan'   => count($kerusakan),
				'perbaikan'   => count($perbaikan),
				'perawatan'   => count($perawatan),
			'tittle' => "Administrator",
			'isi'    => "Laporan/laporan.php");
}else {
		$kerusakan 		 = $this->M_kerusakan->Read();
		$perbaikan 		 = $this->M_perbaikan->Read();
		$perawatan 		 = $this->M_perawatan->Read();
		$data = array(
				'kerusakan'   => count($kerusakan),
				'perbaikan'   => count($perbaikan),
				'perawatan'   => count($perawatan),
			'tittle' => "Administrator",
			'isi'    => "Laporan/laporan.php");

}
		$this->load->view('Layout/layout.php', $data, FALSE);
	}


//Kerusakan
	public function LaporanKerusakan()
	{
		$startdate = $this->input->get('startdate',TRUE);
		$enddate   = $this->input->get('enddate',TRUE);
		$laporan   = $this->M_laporan->ReadLaporanKerusakan();
		$data = array(
			'startdate' => $startdate,
			'enddate' => $enddate,
			'laporan' => $laporan,
			'tittle'  => "Administrator",
			'isi'     => "Laporan/laporan-kerusakan");

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}

	public function GetLaporanKerusakan()
	{

		$startdate = $this->input->get('startdate',TRUE);
		$enddate   = $this->input->get('enddate',TRUE);
		$laporan   = $this->M_laporan->GetLaporanKerusakan($startdate,$enddate);
		$data = array(
			'laporan'		=> $laporan,
			'startdate'		=> $startdate,
			'enddate'		=> $enddate,
			'tittle' => "Administrator",
			'isi'    => "Laporan/laporan-kerusakan");

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}

	public function LaporanKerusakanCetak()
    {
    	$startdate = $this->input->get('startdate',TRUE);
		$enddate = $this->input->get('enddate',TRUE);
		$data['cetak'] = $this->M_laporan->LaporanKerusakanCetak($startdate,$enddate);
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Laporan/laporan-kerusakan-cetak',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }


//perbaikan
	public function LaporanPerbaikan()
	{
		$startdate = $this->input->get('startdate',TRUE);
		$enddate   = $this->input->get('enddate',TRUE);
		$nama	   = $this->session->userdata('nama');
		$level	   = $this->session->userdata('level');
		if ($this->session->userdata('level') == 'Mekanik'){
		// elseif ($user->level == "Mekanik");
		$nama1 = $this->M_laporan->NamaMekanik($nama);
		$nama_mekanik = $nama1->nama_mekanik;
		$laporan   = $this->M_laporan->ReadLaporanPerbaikan($nama_mekanik);
		$data = array(
			'startdate' => $startdate,
			'enddate' 	=> $enddate,
			'laporan' 	=> $laporan,
			'tittle'  	=> "Administrator",
			'isi'     	=> "Laporan/laporan-perbaikan");
		}else {
		$startdate = $this->input->get('startdate',TRUE);
		$enddate   = $this->input->get('enddate',TRUE);
		$laporan   = $this->M_laporan->MReadLaporanPerbaikan();
		}
		$data = array(
			'startdate' => $startdate,
			'enddate' 	=> $enddate,
			'laporan' 	=> $laporan,
			'tittle'  	=> "Administrator",
			'isi'     	=> "Laporan/laporan-perbaikan");

		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}

		public function GetLaporanPerbaikan()
	{

		$nama	   = $this->session->userdata('nama');
		$level	   = $this->session->userdata('level');
		if ($this->session->userdata('level') == 'Mekanik'){
		$nama1 = $this->M_laporan->NamaMekanik($nama);
		$nama_mekanik = $nama1->nama_mekanik;
		$startdate = $this->input->get('startdate',TRUE);
		$enddate   = $this->input->get('enddate',TRUE);
		$laporan   = $this->M_laporan->GetLaporanPerbaikan($startdate,$enddate,$nama_mekanik);
		$data = array(
			'laporan'		=> $laporan,
			'startdate'		=> $startdate,
			'enddate'		=> $enddate,
			'tittle' => "Administrator",
			'isi'    => "Laporan/laporan-perbaikan");
}else {
		$startdate = $this->input->get('startdate',TRUE);
		$enddate   = $this->input->get('enddate',TRUE);
		$laporan   = $this->M_laporan->MGetLaporanPerbaikan($startdate,$enddate);
		$data = array(
			'laporan'		=> $laporan,
			'startdate'		=> $startdate,
			'enddate'		=> $enddate,
			'tittle' => "Administrator",
			'isi'    => "Laporan/laporan-perbaikan");

}
		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}

	public function LaporanPerbaikanCetak()
    {
    	$nama	   = $this->session->userdata('nama');
		$level	   = $this->session->userdata('level');
		if ($this->session->userdata('level') == 'Mekanik'){
		$nama1 = $this->M_laporan->NamaMekanik($nama);
		$nama_mekanik = $nama1->nama_mekanik;
    	$startdate = $this->input->get('startdate',TRUE);
		$enddate = $this->input->get('enddate',TRUE);
		$data['cetak'] = $this->M_laporan->LaporanPerbaikanCetak($startdate,$enddate,$nama_mekanik);
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Laporan/laporan-perbaikan-cetak1',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}else{
		$startdate = $this->input->get('startdate',TRUE);
		$enddate = $this->input->get('enddate',TRUE);
		$data['cetak'] = $this->M_laporan->MLaporanPerbaikanCetak($startdate,$enddate);
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Laporan/laporan-perbaikan-cetak',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}
}

    


//Perawatan
	public function LaporanPerawatan()
	{
		$startdate = $this->input->get('startdate',TRUE);
		$enddate   = $this->input->get('enddate',TRUE);
		$nama	   = $this->session->userdata('nama');
		$level	   = $this->session->userdata('level');
		if ($this->session->userdata('level') == 'Mekanik'){
		// elseif ($user->level == "Mekanik");
		$nama1 = $this->M_laporan->NamaMekanik($nama);
		$kode_mekanik = $nama1->kode_mekanik;
		$laporan   = $this->M_laporan->ReadLaporanPerawatan($kode_mekanik);
		$data = array(
			'startdate' => $startdate,
			'enddate' 	=> $enddate,
			'laporan' 	=> $laporan,
			'tittle'  	=> "Administrator",
			'isi'     	=> "Laporan/laporan-perawatan");
}else {
		$startdate = $this->input->get('startdate',TRUE);
		$enddate   = $this->input->get('enddate',TRUE);
		$laporan   = $this->M_laporan->MReadLaporanPerawatan();
		$data = array(
			'startdate' => $startdate,
			'enddate' 	=> $enddate,
			'laporan' 	=> $laporan,
			'tittle'  	=> "Administrator",
			'isi'     	=> "Laporan/laporan-perawatan");
}
		$this->load->view('Layout/layout.php', $data, FALSE);
		
	}

		public function GetLaporanPerawatan()
	{	
		$nama	   = $this->session->userdata('nama');
		$level	   = $this->session->userdata('level');
		if ($this->session->userdata('level') == 'Mekanik'){
		// elseif ($user->level == "Mekanik");
		$nama1 		  = $this->M_laporan->NamaMekanik($nama);
		$nama_mekanik = $nama1->nama_mekanik;
		$startdate = $this->input->get('startdate',TRUE);
		$enddate   = $this->input->get('enddate',TRUE);
		$laporan   = $this->M_laporan->GetLaporanPerawatan($startdate,$enddate,$nama_mekanik);
		$data = array(
			'laporan'		=> $laporan,
			'startdate'		=> $startdate,
			'enddate'		=> $enddate,
			'tittle' => "Administrator",
			'isi'    => "Laporan/laporan-perawatan");
	}else{
		$startdate = $this->input->get('startdate',TRUE);
		$enddate   = $this->input->get('enddate',TRUE);
		$laporan   = $this->M_laporan->MGetLaporanPerawatan($startdate,$enddate);
		$data = array(
			'laporan'		=> $laporan,
			'startdate'		=> $startdate,
			'enddate'		=> $enddate,
			'tittle' => "Administrator",
			'isi'    => "Laporan/laporan-perawatan");
	}
		$this->load->view('Layout/layout.php', $data, FALSE);
	}
	

	public function LaporanPerawatanCetak()
    {
    	$nama	   = $this->session->userdata('nama');
		$level	   = $this->session->userdata('level');
		if ($this->session->userdata('level') == 'Mekanik'){
		$nama1 = $this->M_laporan->NamaMekanik($nama);
		$nama_mekanik = $nama1->nama_mekanik;
    	$startdate = $this->input->get('startdate',TRUE);
		$enddate = $this->input->get('enddate',TRUE);
		$data['cetak'] = $this->M_laporan->LaporanPerawatanCetak($startdate,$enddate,$nama_mekanik);
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Laporan/laporan-perawatan-cetak1',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }else{
    	$startdate = $this->input->get('startdate',TRUE);
		$enddate = $this->input->get('enddate',TRUE);
		$data['cetak'] = $this->M_laporan->MLaporanPerawatanCetak($startdate,$enddate);
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('Laporan/laporan-perawatan-cetak',$data,TRUE);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }
}

}

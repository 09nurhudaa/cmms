<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


//Kerusakan
	public function ReadLaporanKerusakan()
	{
		$this->db->select('kerusakan.*,kode_kerusakan,kode_mesin,nama_mesin,deskripsi,tanggal');
		$this->db->from('kerusakan');
		$this->db->group_by('kode_kerusakan', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	public function GetLaporanKerusakan($startdate,$enddate)
	{
       	$this->db->select('*');
		$this->db->from('kerusakan');
		$this->db->where('tanggal >=', $startdate);
		$this->db->where('tanggal <=', $enddate);
		$this->db->group_by('kerusakan.kode_kerusakan');
		$query = $this->db->get();
		return $query->result();
	}

	public function LaporanKerusakanCetak($startdate,$enddate)
	{
		$this->db->select('kerusakan.*,kode_kerusakan,kode_mesin,nama_mesin,deskripsi,tanggal');
		$this->db->from('kerusakan');
		$this->db->where('tanggal >=', $startdate);
		$this->db->where('tanggal <=', $enddate);

		$query = $this->db->get();
		return $query->result();
	}

	//Perbaikan
	public function NamaMekanik($nama)
	{
		$this->db->select('*');
		$this->db->from('mekanik');;
		$this->db->where('nama_mekanik', $nama);
		$this->db->group_by('nama_mekanik', 'desc');

		$query = $this->db->get();
		return $query->row();
	}


	public function ReadLaporanPerbaikan($nama_mekanik)
	{
		$this->db->select('*');
		$this->db->from('perbaikan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perbaikan.nama_mekanik', 'left');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = perbaikan.kode_kerusakan', 'left');
		$this->db->join('part', 'part.nama_part = perbaikan.nama_part', 'left');
		$this->db->where('mekanik.nama_mekanik', $nama_mekanik);
		$this->db->group_by('kode_perbaikan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	public function MReadLaporanPerbaikan()
	{
		$this->db->select('*');
		$this->db->from('perbaikan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perbaikan.nama_mekanik', 'left');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = perbaikan.kode_kerusakan', 'left');
		$this->db->join('part', 'part.nama_part = perbaikan.nama_part', 'left');
		$this->db->group_by('kode_perbaikan', 'desc');

		$query = $this->db->get();
		return $query->result();
	}


		public function GetLaporanPerbaikan($startdate,$enddate,$nama_mekanik)
	{
       	$this->db->select('*');
		$this->db->from('perbaikan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perbaikan.nama_mekanik', 'left');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = perbaikan.kode_kerusakan', 'left');
		$this->db->join('part', 'part.nama_part = perbaikan.nama_part', 'left');
		$this->db->where('kerusakan.tanggal >=', $startdate);
		$this->db->where('kerusakan.tanggal <=', $enddate);
		$this->db->where('mekanik.nama_mekanik',$nama_mekanik);
		$this->db->group_by('perbaikan.kode_perbaikan');
		$query = $this->db->get();
		return $query->result();
	}

	public function MGetLaporanPerbaikan($startdate,$enddate)
	{
       	$this->db->select('*');
		$this->db->from('perbaikan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perbaikan.nama_mekanik', 'left');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = perbaikan.kode_kerusakan', 'left');
		$this->db->join('part', 'part.nama_part = perbaikan.nama_part', 'left');
		$this->db->where('kerusakan.tanggal >=', $startdate);
		$this->db->where('kerusakan.tanggal <=', $enddate);
		$this->db->group_by('perbaikan.kode_perbaikan');
		$query = $this->db->get();
		return $query->result();
	}

	public function LaporanPerbaikanCetak($startdate,$enddate,$nama_mekanik)
	{
		$this->db->select('*');
		$this->db->from('perbaikan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perbaikan.nama_mekanik', 'left');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = perbaikan.kode_kerusakan', 'left');
		$this->db->join('part', 'part.nama_part = perbaikan.nama_part', 'left');
		$this->db->where('perbaikan.waktu_selesai >=', $startdate);
		$this->db->where('perbaikan.waktu_selesai <=', $enddate);
		$this->db->group_by('perbaikan.kode_perbaikan');
		$this->db->where('waktu_selesai >=', $startdate);
		$this->db->where('waktu_selesai <=', $enddate);
		$this->db->where('mekanik.nama_mekanik', $nama_mekanik);

		$query = $this->db->get();
		return $query->result();
	}

	public function MLaporanPerbaikanCetak($startdate,$enddate)
	{
		$this->db->select('*');
		$this->db->from('perbaikan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perbaikan.nama_mekanik', 'left');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = perbaikan.kode_kerusakan', 'left');
		$this->db->join('part', 'part.nama_part = perbaikan.nama_part', 'left');
		$this->db->where('kerusakan.tanggal >=', $startdate);
		$this->db->where('kerusakan.tanggal <=', $enddate);
		$this->db->group_by('perbaikan.kode_perbaikan');
		$this->db->where('kerusakan.tanggal >=', $startdate);
		$this->db->where('kerusakan.tanggal <=', $enddate);

		$query = $this->db->get();
		return $query->result();
	}

	//Perawatan
	public function ReadLaporanPerawatan($kode_mekanik)
	{
		$this->db->select('*');
		$this->db->from('perawatan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perawatan.nama_mekanik', 'left');
		$this->db->join('jadwal', 'jadwal.kode_jadwal = perawatan.kode_jadwal', 'left');
		$this->db->join('part', 'part.nama_part = perawatan.nama_part', 'left');
		$this->db->where('mekanik.kode_mekanik', $kode_mekanik);
		$this->db->group_by('perawatan.kode_perawatan');

		$query = $this->db->get();
		return $query->result();
	}

	public function MReadLaporanPerawatan()
	{
		$this->db->select('*');
		$this->db->from('perawatan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perawatan.nama_mekanik', 'left');
		$this->db->join('jadwal', 'jadwal.kode_jadwal = perawatan.kode_jadwal', 'left');
		$this->db->join('part', 'part.nama_part = perawatan.nama_part', 'left');
		$this->db->group_by('perawatan.kode_perawatan');

		$query = $this->db->get();
		return $query->result();
	}

	// 	public function GetLaporanPerawatan($startdate,$enddate,$nama_mekanik)
	// {
 //       	$this->db->select('*');
	// 	$this->db->from('perawatan');
	// 	$this->db->join('mekanik', 'perawatan.nama_mekanik = perawatan.nama_mekanik', 'left');
	// 	$this->db->join('jadwal', 'jadwal.kode_jadwal = perawatan.kode_jadwal', 'left');
	// 	$this->db->join('part', 'part.nama_part = perawatan.nama_part', 'left');
	// 	$this->db->where('waktu_selesai >=', $startdate);
	// 	$this->db->where('waktu_selesai <=', $enddate);
	// 	$this->db->where('mekanik.nama_mekanik', $nama_mekanik);
	// 	$this->db->group_by('perawatan.kode_perawatan');
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	public function GetLaporanPerawatan($startdate,$enddate,$nama_mekanik)
	{
       	$this->db->select('*');
		$this->db->from('perawatan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perawatan.nama_mekanik', 'left');
		$this->db->join('jadwal', 'jadwal.kode_jadwal = perawatan.kode_jadwal', 'left');
		$this->db->join('part', 'part.nama_part = perawatan.nama_part', 'left');
		$this->db->where('jadwal.tanggal >=', $startdate);
		$this->db->where('jadwal.tanggal <=', $enddate);
		$this->db->where('mekanik.nama_mekanik',$nama_mekanik);
		$this->db->group_by('perawatan.kode_perawatan');
		$query = $this->db->get();
		return $query->result();
	}

	public function MGetLaporanPerawatan($startdate,$enddate)
	{
       	$this->db->select('*');
		$this->db->from('perawatan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perawatan.nama_mekanik', 'left');
		$this->db->join('jadwal', 'jadwal.kode_jadwal = perawatan.kode_jadwal', 'left');
		$this->db->join('part', 'part.nama_part = perawatan.nama_part', 'left');
		$this->db->where('jadwal.tanggal >=', $startdate);
		$this->db->where('jadwal.tanggal <=', $enddate);
		$this->db->group_by('perawatan.kode_perawatan');
		$query = $this->db->get();
		return $query->result();
	}

		
		public function MLaporanPerawatanCetak($startdate,$enddate)
	{
		$this->db->select('*');
		$this->db->from('perawatan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perawatan.nama_mekanik', 'left');
		$this->db->join('jadwal', 'jadwal.kode_jadwal = perawatan.kode_jadwal', 'left');
		$this->db->join('part', 'part.nama_part = perawatan.nama_part', 'left');
		$this->db->group_by('perawatan.kode_perawatan');
		$this->db->where('jadwal.tanggal >=', $startdate);
		$this->db->where('jadwal.tanggal <=', $enddate);
		// $this->db->where('mekanik.nama_mekanik', $nama_mekanik);
		$query = $this->db->get();
		return $query->result();
	}

	public function LaporanPerawatanCetak($startdate,$enddate,$nama_mekanik)
	{
		$this->db->select('*');
		$this->db->from('perawatan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perawatan.nama_mekanik', 'left');
		$this->db->join('jadwal', 'jadwal.kode_jadwal = perawatan.kode_jadwal', 'left');
		$this->db->join('part', 'part.nama_part = perawatan.nama_part', 'left');
		$this->db->group_by('perawatan.kode_perawatan');
		$this->db->where('jadwal.tanggal >=', $startdate);
		$this->db->where('jadwal.tanggal <=', $enddate);
		$this->db->where('mekanik.nama_mekanik', $nama_mekanik);
		$query = $this->db->get();
		return $query->result();
	}


}

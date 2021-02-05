<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perawatan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Create($data)
	{
		$this->db->insert('perawatan', $data);
	}

		public function MKeterangan()
	{
		return $this->db->query("SELECT * FROM `perawatan` where keterangan != 'Selesai'");

	}

public function NamaMekanik($nama)
	{
		$this->db->select('*');
		$this->db->from('mekanik');;
		$this->db->where('nama_mekanik', $nama);
		$this->db->order_by('nama_mekanik', 'desc');

		$query = $this->db->get();
		return $query->row();
	}


	public function Read1($nama_mekanik)
	{
		$this->db->select('*');
		$this->db->from('perawatan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perawatan.nama_mekanik', 'left');
		$this->db->join('jadwal', 'jadwal.kode_jadwal = perawatan.kode_jadwal', 'left');
		$this->db->join('part', 'part.nama_part = perawatan.nama_part', 'left');
		$this->db->where('mekanik.nama_mekanik', $nama_mekanik);
		$this->db->group_by('perawatan.kode_perawatan');

		$query = $this->db->get();
		return $query->result();
	}


	public function Read()
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


  public function getAllData(){
        return $this->db->get('perawatan')->result();
    }
	public function Update($data)
	{
		$this->db->where('kode_perawatan', $data['kode_perawatan']);
		$this->db->update('perawatan', $data);
	}

		public function Delete($data)
	{
		$this->db->where('kode_perawatan', $data['kode_perawatan']);
		$this->db->Delete('perawatan', $data);
	}

	//cetak mesin
	public function Cetak($kode_perawatan)
	{
		$this->db->select('*');
		$this->db->from('perawatan');
		$this->db->join('jadwal', 'jadwal.kode_jadwal = perawatan.kode_jadwal');
		$this->db->join('part', 'part.nama_part = perawatan.nama_part');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perawatan.nama_mekanik');
		$this->db->where('kode_perawatan', $kode_perawatan);
		return $query = $this->db->get();
	}

	public function Cetak1($kode_perawatan)
	{
		$this->db->select('*');
		$this->db->from('perawatan');
		$this->db->join('jadwal', 'jadwal.kode_jadwal = perawatan.kode_jadwal');
		// $this->db->join('part', 'part.nama_part = perawatan.nama_part');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perawatan.nama_mekanik');
		$this->db->where('kode_perawatan', $kode_perawatan);
		return $query = $this->db->get();
	}

	public function Kode(){
	   $this->db->select('RIGHT(perawatan.kode_perawatan,2) as kode', FALSE);
	   $this->db->order_by('kode_perawatan','DESC');    
	   $this->db->limit(1);    
	   $query = $this->db->get('perawatan');    
	   if($query->num_rows() <> 0){      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1; 
	   }
	    else{      
		   $kode = 1; 
	   }
		  $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		  $kodejadi = "PR"."0".$kodemax;  //format kode
		  return $kodejadi;  
	  }

		public function Detail($kode_perawatan)
	{
		$this->db->select('*');
		$this->db->from('perawatan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perawatan.nama_mekanik', 'left');
		$this->db->join('jadwal', 'jadwal.kode_jadwal = perawatan.kode_jadwal', 'left');
		$this->db->join('part', 'part.nama_part = perawatan.nama_part', 'left');
		$this->db->where('kode_perawatan', $kode_perawatan);
		$this->db->group_by('perawatan.kode_perawatan');

		$query = $this->db->get();
		return $query->row();
	}

}

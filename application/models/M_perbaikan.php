<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perbaikan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Create($data)
	{
		$this->db->insert('perbaikan', $data);
	}

		public function MKeterangan()
	{
		return $this->db->query("SELECT * FROM `perbaikan` where keterangan != 'Selesai'");

	}

	public function Keterangan()
	{
		//$this->db->where('keterangan','proses','keterangan','belum');
		//return $this->db->get('perbaikan')->result_array();
		return $this->db->query("SELECT * FROM `perbaikan` where kode_mekanik");

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
		$this->db->from('perbaikan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perbaikan.nama_mekanik', 'left');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = perbaikan.kode_kerusakan', 'left');
		$this->db->join('part', 'part.nama_part = perbaikan.nama_part', 'left');
		$this->db->where('mekanik.nama_mekanik', $nama_mekanik);
		$this->db->group_by('perbaikan.kode_perbaikan');
		$query = $this->db->get();
		return $query->result();
	}

	public function Read()
	{
		$this->db->select('*');
		$this->db->from('perbaikan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perbaikan.nama_mekanik', 'left');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = perbaikan.kode_kerusakan', 'left');
		$this->db->join('part', 'part.nama_part = perbaikan.nama_part', 'left');
		$this->db->group_by('perbaikan.kode_perbaikan');
		$query = $this->db->get();
		return $query->result();
	}

  public function getAllData(){
        return $this->db->get('perbaikan')->result();
    }
	public function Update($data)
	{
		$this->db->where('kode_perbaikan', $data['kode_perbaikan']);
		$this->db->update('perbaikan', $data);
	}

		public function Delete($data)
	{
		$this->db->where('kode_perbaikan', $data['kode_perbaikan']);
		$this->db->Delete('perbaikan', $data);
	}


	public function Cetak($kode_perbaikan)
	{
		$this->db->select('*');
		$this->db->from('perbaikan');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = perbaikan.kode_kerusakan');
		$this->db->join('part', 'part.nama_part = perbaikan.nama_part');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perbaikan.nama_mekanik');
		$this->db->where('kode_perbaikan', $kode_perbaikan);
		return $query = $this->db->get();
	}

	public function Cetak1($kode_perbaikan)
	{
		$this->db->select('*');
		$this->db->from('perbaikan');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = perbaikan.kode_kerusakan');
		// $this->db->join('part', 'part.nama_part = perbaikan.nama_part');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perbaikan.nama_mekanik');
		$this->db->where('kode_perbaikan', $kode_perbaikan);
		return $query = $this->db->get();
	}


	public function Kode(){
	   $this->db->select('RIGHT(perbaikan.kode_perbaikan,2) as kode', FALSE);
	   $this->db->order_by('kode_perbaikan','DESC');    
	   $this->db->limit(1);    
	   $query = $this->db->get('perbaikan');    
	   if($query->num_rows() <> 0){      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1; 
	   }
	    else{      
		   $kode = 1; 
	   }
		  $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		  $kodejadi = "PB"."0".$kodemax;  //format kode
		  return $kodejadi;  
	  }

		public function Detail($kode_perbaikan)
	{
		$this->db->select('*');
		$this->db->from('perbaikan');
		$this->db->join('mekanik', 'mekanik.nama_mekanik = perbaikan.nama_mekanik', 'left');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = perbaikan.kode_kerusakan', 'left');
		$this->db->join('part', 'part.nama_part = perbaikan.nama_part', 'left');
		$this->db->where('kode_perbaikan', $kode_perbaikan);
		$this->db->order_by('kode_perbaikan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

}

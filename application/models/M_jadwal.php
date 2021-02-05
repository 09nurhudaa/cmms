<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Create($data)
	{
		$this->db->insert('jadwal', $data);
	}

	public function Tanggal()
	{
		$tanggal = date('Y-m-d');
		$this->db->like('tanggal', $tanggal);
		//$this->db->where('keterangan','belum');
		return $this->db->get('jadwal')->result_array();

	}

	public function Read()
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('mesin', 'mesin.kode_mesin = jadwal.kode_mesin', 'left');
		$this->db->group_by('kode_jadwal', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

  public function getAllData(){
        return $this->db->get('jadwal')->result();
    }
	public function Update($data)
	{
		$this->db->where('kode_jadwal', $data['kode_jadwal']);
		$this->db->update('jadwal', $data);
	}


	public function Detail($kode_jadwal)
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('mesin', 'mesin.kode_mesin = jadwal.kode_mesin');
		$this->db->where('kode_jadwal', $kode_jadwal);
		$this->db->order_by('kode_jadwal', 'desc');

		$query = $this->db->get();
		return $query->row();
	}


		public function Delete($data)
	{
		$this->db->where('kode_jadwal', $data['kode_jadwal']);
		$this->db->Delete('jadwal', $data);
	}

	//cetak mesin
	public function Cetak($kode_jadwal)
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('mesin', 'mesin.kode_mesin = jadwal.kode_mesin');
		$this->db->where('kode_jadwal', $kode_jadwal);
		$this->db->order_by('kode_jadwal', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	public function Kode(){
	   $this->db->select('RIGHT(jadwal.kode_jadwal,2) as kode', FALSE);
	   $this->db->order_by('kode_jadwal','DESC');    
	   $this->db->limit(1);    
	   $query = $this->db->get('jadwal');    
	   if($query->num_rows() <> 0){      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1; 
	   }
	    else{      
		   $kode = 1; 
	   }
		  $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		  $kodejadi = "J"."0".$kodemax;  //format kode
		  return $kodejadi;  
	  }

}

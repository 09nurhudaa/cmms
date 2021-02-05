<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kerusakan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Create($data)
	{
		$this->db->insert('kerusakan', $data);
	}

	public function Tanggal()
	{
		$tanggal = date('Y-m-d');
		$this->db->like('tanggal', $tanggal);
		return $this->db->get('kerusakan')->result_array();

	}

	public function Read()
	{
		$this->db->select('*');
		$this->db->from('kerusakan');
		$this->db->join('mesin', 'mesin.kode_mesin = kerusakan.kode_mesin', 'left');
		$this->db->group_by('kerusakan.kode_kerusakan');

		$query = $this->db->get();
		return $query->result();
	}

  public function getAllData(){
        return $this->db->get('kerusakan')->result();
    }
	public function Update($data)
	{
		$this->db->where('kode_kerusakan', $data['kode_kerusakan']);
		$this->db->update('kerusakan', $data);
	}

		public function Delete($data)
	{
		$this->db->where('kode_kerusakan', $data['kode_kerusakan']);
		$this->db->Delete('kerusakan', $data);
	}

	//cetak mesin
	public function Cetak($kode_kerusakan)
	{
		$this->db->select('*');
		$this->db->from('kerusakan');
		$this->db->join('mesin', 'mesin.kode_mesin = kerusakan.kode_mesin');
		$this->db->where('kode_kerusakan', $kode_kerusakan);
		$this->db->group_by('kerusakan.kode_kerusakan');

		$query = $this->db->get();
		return $query->row();
	}

	public function Kode(){
	   $this->db->select('RIGHT(kerusakan.kode_kerusakan,2) as kode', FALSE);
	   $this->db->order_by('kode_kerusakan','DESC');    
	   $this->db->limit(1);    
	   $query = $this->db->get('kerusakan');    
	   if($query->num_rows() <> 0){      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1; 
	   }
	    else{      
		   $kode = 1; 
	   }
		  $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		  $kodejadi = "KR"."0".$kodemax;  //format kode
		  return $kodejadi;  
	  }

		public function Detail($kode_kerusakan)
	{
		$this->db->select('*');
		$this->db->from('kerusakan');
		$this->db->join('mesin', 'mesin.kode_mesin = kerusakan.kode_mesin');
		$this->db->where('kode_kerusakan', $kode_kerusakan);
		$this->db->order_by('kerusakan.kode_kerusakan');

		$query = $this->db->get();
		return $query->row();
	}

}

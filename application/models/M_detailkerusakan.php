<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detailkerusakan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Read()
	{
		$this->db->select('*');
		$this->db->from('kerusakan');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = kerusakan.kode_kerusakan');
		$this->db->join('mesin', 'mesin.kode_mesin = mesin.kode_mesin');
		$query = $this->db->get();
		return $query->result();
	}

	public function Read1()
	{
		$this->db->select('*');
		$this->db->from('kerusakan');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = kerusakan.kode_kerusakan');
		$this->db->join('mesin', 'mesin.kode_mesin = mesin.kode_mesin');
		$query = $this->db->get();
		return $query->result();
	}

	public function Detail($id_pemeriksaan)
	{
		$this->db->select('*');
		$this->db->from('kerusakan');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = kerusakan.kode_kerusakan');
		$this->db->join('mesin', 'mesin.kode_mesin = mesin.kode_mesin');
		$query = $this->db->get();
		return $query->result();
	}

	public function Detail1()
	{
				$this->db->select('*');
		$this->db->from('kerusakan');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = kerusakan.kode_kerusakan');
		$this->db->join('mesin', 'mesin.kode_mesin = mesin.kode_mesin');
		$query = $this->db->get();
		return $query->result();
	}

	public function Kode(){
	   $this->db->select('RIGHT(tbl_rekammedis.kode_pemeriksaan,2) as kode', FALSE);
	   $this->db->order_by('id_pemeriksaan','DESC');    
	   $this->db->limit(1);    
	   $query = $this->db->get('tbl_rekammedis');    
	   if($query->num_rows() <> 0){      
		       
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1; 
	   }
	    else{      
		   $kode = 1; 
	   }
		  //$tgl=date('dmY');
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);    
		  $kodejadi = "RKM"."0".$kodemax;  //format kode
		  return $kodejadi;  
	  }

	public function Delete($data)
	{
		$this->db->where('id_pemeriksaan', $data['id_pemeriksaan']);
		$this->db->Delete('tbl_rekammedis', $data);
	}

	public function Cetak($id_pemeriksaan)
	{
		$this->db->select('*');
		$this->db->from('kerusakan');
		$this->db->join('kerusakan', 'kerusakan.kode_kerusakan = kerusakan.kode_kerusakan');
		$this->db->join('mesin', 'mesin.kode_mesin = mesin.kode_mesin');
		$query = $this->db->get();
		return $query->result();

		$query = $this->db->get();
		return $query->row();
	}

	public function EditObat($data)
	{
		$this->db->where('id_detail', $data['id_detail']);
		$this->db->update('tbl_detailmedis', $data);
	}

}

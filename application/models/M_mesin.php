<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mesin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Create($data)
	{
		$this->db->insert('mesin', $data);
	}

	public function Read()
	{
		$this->db->select('*');
		$this->db->from('mesin');
		$this->db->order_by('kode_mesin', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	public function Kode(){
	   $this->db->select('RIGHT(mesin.kode_mesin,2) as kode', FALSE);
	   $this->db->order_by('kode_mesin','DESC');    
	   $this->db->limit(1);    
	   $query = $this->db->get('mesin');    
	   if($query->num_rows() <> 0){      
		       
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1; 
	   }
	    else{      
		   $kode = 1; 
	   }
		  $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		  $kodejadi = "M"."0".$kodemax;  //format kode
		  return $kodejadi;  
	  }

	  	public function Detail($kode_mesin)
	{
		$this->db->select('*');
		$this->db->from('mesin');;
		$this->db->where('kode_mesin', $kode_mesin);
		$this->db->order_by('kode_mesin', 'desc');

		$query = $this->db->get();
		return $query->row();
	}


	  public function getAllData(){
        return $this->db->get('mesin')->result();
    }
	public function Update($data)
	{
		$this->db->where('kode_mesin', $data['kode_mesin']);
		$this->db->update('mesin', $data);
	}

		public function Delete($data)
	{
		$this->db->where('kode_mesin', $data['kode_mesin']);
		$this->db->Delete('mesin', $data);
	}

	//cetak mesin
	public function Cetak($kode_mesin)
	{
		$this->db->select('*');
		$this->db->from('mesin');
		$this->db->where('kode_mesin', $kode_mesin);
		$this->db->order_by('kode_mesin', 'desc');

		$query = $this->db->get();
		return $query->row();
	}


}
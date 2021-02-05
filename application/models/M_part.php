<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_part extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Create($data)
	{
		$this->db->insert('part', $data);
	}

	public function Read()
	{
		$this->db->select('*');
		$this->db->from('part');
		$this->db->order_by('kode_part', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	public function Kode(){
	   $this->db->select('RIGHT(part.kode_part,2) as kode', FALSE);
	   $this->db->order_by('kode_part','DESC');    
	   $this->db->limit(1);    
	   $query = $this->db->get('part');    
	   if($query->num_rows() <> 0){      
		       
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1; 
	   }
	    else{      
		   $kode = 1; 
	   }
		  $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		  $kodejadi = "P"."0".$kodemax;  //format kode
		  return $kodejadi;  
	  }

	  public function getAllData()
	  {
        return $this->db->get('part')->result();
    }

      	public function Detail($kode_part)
	{
		$this->db->select('*');
		$this->db->from('part');;
		$this->db->where('kode_part', $kode_part);
		$this->db->order_by('kode_part', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	public function Update($data)
	{
		$this->db->where('kode_part', $data['kode_part']);
		$this->db->update('part', $data);
	}

	public function Delete($data)
	{
		$this->db->where('kode_part', $data['kode_part']);
		$this->db->Delete('part', $data);
	}

		//cetak part
	public function Cetak($kode_part)
	{
		$this->db->select('*');
		$this->db->from('part');
		$this->db->where('kode_part', $kode_part);
		$this->db->order_by('kode_part', 'desc');

		$query = $this->db->get();
		return $query->row();
	}
}
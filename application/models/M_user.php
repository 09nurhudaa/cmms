<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Create($data)
	{
		$this->db->insert('user', $data);
	}

	public function Kode(){
	   $this->db->select('RIGHT(user.kode_user,2) as kode', FALSE);
	   $this->db->order_by('kode_user','DESC');    
	   $this->db->limit(1);    
	   $query = $this->db->get('user');    
	   if($query->num_rows() <> 0){      
		       
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1; 
	   }
	    else{      
		   $kode = 1; 
	   }
		  $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		  $kodejadi = "U"."0".$kodemax;  //format kode
		  return $kodejadi;  
	  }

	  	public function Detail($kode_user)
	{
		$this->db->select('*');
		$this->db->from('user');;
		$this->db->where('kode_user', $kode_user);
		$this->db->order_by('kode_user', 'desc');

		$query = $this->db->get();
		return $query->row();
	}


	  public function getAllData(){
        return $this->db->get('user')->result();
    }
	public function Update($data)
	{
		$this->db->where('kode_user', $data['kode_user']);
		$this->db->update('user', $data);
	}

		public function Delete($data)
	{
		$this->db->where('kode_user', $data['kode_user']);
		$this->db->Delete('user', $data);
	}

	//cetak User
	public function Cetak($kode_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('kode_user', $kode_user);
		$this->db->order_by('kode_user', 'desc');

		$query = $this->db->get();
		return $query->row();
	}


}
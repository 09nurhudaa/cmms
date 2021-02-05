<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mekanik extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Create($data)
	{
		$this->db->insert('mekanik', $data);
	}


	public function Read()
	{
		$this->db->select('*');
		$this->db->from('mekanik');
		$this->db->order_by('kode_mekanik', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	public function Kode(){
	   $this->db->select('RIGHT(mekanik.kode_mekanik,2) as kode', FALSE);
	   $this->db->order_by('kode_mekanik','DESC');    
	   $this->db->limit(1);    
	   $query = $this->db->get('mekanik');    
	   if($query->num_rows() <> 0){      
		       
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1; 
	   }
	    else{      
		   $kode = 1; 
	   }
		  $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		  $kodejadi = "MK"."0".$kodemax;  //format kode
		  return $kodejadi;  
	  }

	  public function getAllData()
	  {
        return $this->db->get('mekanik')->result();
    }

      	public function Detail($kode_mekanik)
	{
		$this->db->select('*');
		$this->db->from('mekanik');;
		$this->db->where('kode_mekanik', $kode_mekanik);
		$this->db->order_by('kode_mekanik', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	public function Update($data)
	{
		$this->db->where('kode_mekanik', $data['kode_mekanik']);
		$this->db->update('mekanik', $data);
	}

		public function Delete($data)
	{
		$this->db->where('kode_mekanik', $data['kode_mekanik']);
		$this->db->Delete('mekanik', $data);
	}

//cetak mekanik
	public function Cetak($kode_mekanik)
	{
		$this->db->select('*');
		$this->db->from('mekanik');
		$this->db->where('kode_mekanik', $kode_mekanik);
		$this->db->order_by('kode_mekanik', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	     public function tesapi()
    {
        $sql ="select * from mekanik";
        $res = $this->db->query($sql);
        $rs = $res->result();
        $data=Array();
        $len =1;
        foreach($rs as $row){
            $data[]=array(
                'id_mekanik'=>$row->id,
                'kode_mekanik'=>$row->kode_mekanik,
                'nama_mekanik'=>$row->nama_mekanik,
                'alamat'=>$row->alamat,
                'telp'=>$row->telepon,
                'rownum' => $len
            );
            $len++;
        }
        return json_encode($data);
    }

}
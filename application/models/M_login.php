<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username' => $username,
						 	   'password' => $password));

		$this->db->order_by('kode_user','DESC');
		$query = $this->db->get();
		return $query->row();
	}

}

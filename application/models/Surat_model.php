<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

	public function getData($w = null)
	{
		if ($w != null) {
			$this->db->where($w);
			return $this->db->get('surat');			
		} else {
			return $this->db->get('surat');			
		}
	}

	public function cari($match)
	{
		$this->db->like('no_surat', $match, 'both'); 
		$this->db->or_like('kategori', $match, 'both');
		$this->db->or_like('judul', $match, 'both');
		$this->db->or_like('file_surat', $match, 'both');
		$this->db->or_like('waktu_input', $match, 'both');
		return $this->db->get('surat');			
	}

	public function insData($data)
	{
		$this->db->insert('surat', $data);
	}

	public function updData($data, $w)
	{
		$this->db->update('surat', $data, $w);		
	}

	public function delData($w)
	{
		$this->db->delete('surat', $w);
	}

}

/* End of file Surat_model.php */

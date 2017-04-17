<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klub_Model extends CI_Model {

	public function getDataKlub()
	{
		$this->db->select('id, nama, logo');
		$query = $this->db->get('klub');
		return $query->result();
	}

	public function getKlub($id)
	{
		$this->db->where('id', $id);	
		$query = $this->db->get('klub',1);
		return $query->result();
	}

	public function insertKlub()
	{
		$object = array('nama' => $this->input->post('nama'),
						'logo' => $this->upload->data('file_name'));
		$this->db->insert('klub', $object);
	}

	public function updateById($idKlub)
	{
		$data = array('nama' => $this->input->post('nama'),
					'logo' => $this->upload->data('file_name'));
		$this->db->where('id', $idKlub);
		$this->db->update('klub', $data);
	}

	public function updateNamaById($idKlub)
	{
		$data = array('nama' => $this->input->post('nama'));
		$this->db->where('id', $idKlub);
		$this->db->update('klub', $data);
	}

	public function deleteById($idKlub)
	{
		$this->db->where('id', $idKlub);
		$this->db->delete('klub');
	}
}

/* End of file Klub_Model.php */
/* Location: ./application/models/Klub_Model.php */
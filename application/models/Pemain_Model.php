<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain_Model extends CI_Model {

	public function getDataPemain($idKlub)
	{
		$this->db->select('pemain.id, pemain.nama, posisi, tanggal_lahir, fk_klub');
		$this->db->where('fk_klub', $idKlub);
		$this->db->join('klub', 'klub.id = pemain.fk_klub', 'left');
		$query = $this->db->get('pemain');
		return $query->result();
	}

	public function getPemain($id)
	{
		$this->db->where('id', $id);	
		$query = $this->db->get('pemain',1);
		return $query->result();
	}

	public function insertPemain($idKlub)
	{
		$object = array('nama' => $this->input->post('nama'),
						'posisi' => $this->input->post('posisi'),
						'tanggal_lahir' => $this->input->post('tanggal_lahir'),
						'fk_klub' => $idKlub);
		$this->db->insert('pemain', $object);
	}

	public function updateById($id)
	{
		$data = array('nama' => $this->input->post('nama'),
					'posisi' => $this->input->post('posisi'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'));
		$this->db->where('id', $id);
		$this->db->update('pemain', $data);
	}

	public function deleteById($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pemain');
	}
}

/* End of file Pemain_Model.php */
/* Location: ./application/models/Pemain_Model.php */
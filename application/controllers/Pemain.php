<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain extends CI_Controller {

	public function index($idKlub)
	{
		$this->load->model('pemain_model');
		$data['pemain_list'] = $this->pemain_model->getDataPemain($idKlub);
		$this->load->view('pemain', $data);
	}

	public function create($idKlub)
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');
		$this->load->model('pemain_model');
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('tambah_pemain_view');
		}
		else
		{
			$this->pemain_model->insertPemain($idKlub);
			$this->load->view('tambah_pemain_sukses');
		}
	}

	public function update($id)
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('pemain_model');
		$data['pemain']=$this->pemain_model->getPemain($id);
		//skeleton code
		if($this->form_validation->run()==FALSE)
		{

		//setelah load data dikirim ke view
			$this->load->view('edit_pemain_view',$data);

		}
		else
		{
			$this->pemain_model->updateById($id);
			$this->load->view('edit_pemain_sukses');	
		}
	}

	public function delete($id)
	{
		$this->load->model('pemain_model');
		$this->pemain_model->deleteById($id);
		$this->load->view('delete_pemain_sukses');
	}
}

/* End of file Pemain.php */
/* Location: ./application/controllers/Pemain.php */
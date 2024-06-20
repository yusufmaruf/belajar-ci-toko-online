<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambarbarang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_gambarbarang');
		$this->load->model('m_barang');
	}
	public function index()
	{
		$data = array(
			'title' => 'Gambar Barang',
			'gambarbarang' => $this->m_gambarbarang->get_all_data(),
			'isi' => 'gambarbarang/vindex',
		);

		$this->load->view('layout/v_wrapper_backend', $data,false);
	}
	
	public function add($id_barang)
	{
		$this->form_validation->set_rules('ket', 'ke', 'required',(['required' => '%s harus diisi']));
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './asset/gambar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size'] = 2000;
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
			$data = array(
				'title' => 'Add Gambar Barang',
				'barang' => $this->m_barang->getData($id_barang),
				'gambar' => $this->m_gambarbarang->get_gambar($id_barang),
				'isi' => 'gambarbarang/vadd',
			);
			$this->load->view('layout/v_wrapper_backend', $data,false);
			}else{
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './asset/gambar/'.$upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_barang' => $id_barang,
					'ket' => $this->input->post('ket'),
					'gambar' => $upload_data['uploads']['file_name']
				);
				$this->m_gambarbarang->add($data);
				$this->session->set_flashdata('pesan', 'Data telah ditambahkan',);
				redirect('gambarbarang/add/'.$id_barang);
			}
		}
		$data = array(
			'title' => 'Add Gambar Barang',
			'barang' => $this->m_barang->getData($id_barang),
			'gambar' => $this->m_gambarbarang->get_gambar($id_barang),
			'isi' => 'gambarbarang/vadd',
		);
		$this->load->view('layout/v_wrapper_backend', $data,false);
	}

	public function delete($id_gambar)
	{
		$gambar= $this->m_gambarbarang->get_data($id_gambar);
		if ($gambar->gambar != "") {
			unlink('./asset/gambar/'.$gambar->gambar);
		}
		$data = array('id_gambar' => $id_gambar);
		
		$this->m_gambarbarang->delete($data);
		$this->session->set_flashdata('pesan', 'Data telah dihapus',);
		redirect('gambarbarang');
	}
}

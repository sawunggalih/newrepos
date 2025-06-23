<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$sql = $this->db->get('m_siswa')->result();
		echo json_encode($sql);
		// var_dump($sql);
		// $this->load->view('welcome_message');.
	}

	public function store(){
		$inputan = array(
			'nama'=>$this->input->post('nama'),
			'alamat'=>$this->input->post('alamat'),
			'telp'=>$this->input->post('telp')
		);

		$simpan = $this->db->insert('m_siswa',$inputan);
 
			if($simpan){
				echo json_encode(array("success" => true, "code" => 200));
			}else{
				echo json_encode(array("success" => false, "code" => 500));
			}		 
		 
	}
	
	public function update(){

		$id = $this->input->post('id');
		$inputan = array(
			'nama'=>$this->input->post('nama'),
			'alamat'=>$this->input->post('alamat'),
			'telp'=>$this->input->post('telp')
		);



		$simpan = $this->db->set($inputan)->where('id',$id)->update('m_siswa');
 
			if($simpan){
				echo json_encode(array("success" => true, "code" => 200));
			}else{
				echo json_encode(array("success" => false, "code" => 500));
			}		 
		 
	}

	public function delete(){

		$id = $this->input->post('id'); 

		$simpan = $this->db->where('id',$id)->delete('m_siswa');
 
			if($simpan){
				echo json_encode(array("success" => true, "code" => 200));
			}else{
				echo json_encode(array("success" => false, "code" => 500));
			}		 
		 
	}
}


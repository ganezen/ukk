<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}
	public function index()
	{
		$this->load->view('login');
    }
    public function proses_login(){
		$user=$this->input->post('username');
		$pass=$this->input->post('password');

		$ceklogin=$this->login_model->login_admin($user,$pass);
		if ($ceklogin) {
			foreach ($ceklogin as $row) {
			$this->session->set_userdata('id_user', $row->id_user);
			$this->session->set_userdata('username', $row->username);
			$this->session->set_userdata('password', $row->password);
			$this->session->set_userdata('nama_user', $row->nama_user);
			$this->session->set_userdata('id_level', $row->id_level);
			redirect('admin/index');
			}
		}else {
			$data['pesan']="Username atau Password tidak sesuai";
			$this->load->view('Login',$data);
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('Login/');
	}
}

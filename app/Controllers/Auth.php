<?php

namespace App\Controllers;
use App\Models\Model_Auth;

class Auth extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->Model_Auth = new Model_Auth();
	}

  public function register()
	{
    $data = array(
      'title' => 'Register',
     );
     return view ('v_register', $data);
	}

	public function save_register()
	{
		if ($this->validate([
				'nama_user' => [
					'label' => 'Nama User',
					'rules' => 'required',
					'errors'	=> [
						'required' => '{field} wajib diisi dan tidak boleh kosong'
					]
				],
				'email' => [
					'label' => 'Email',
					'rules' => 'required',
					'errors'	=> [
						'required' => '{field} wajib diisi dan tidak boleh kosong'
					]
				],
				'no_hp' => [
					'label' => 'Nomor Handphone',
					'rules' => 'required',
					'errors'	=> [
						'required' => '{field} wajib diisi dan tidak boleh kosong'
					]
				],
				'password' => [
					'label' => 'password',
					'rules' => 'required',
					'errors'	=> [
						'required' => '{field} wajib diisi dan tidak boleh kosong'
					]
				],
				'repassword' => [
					'label' => 'ketik kembali password',
					'rules' => 'required|matches[password]',
					'errors'	=> [
						'matches' => '{field} tidak sama'
					]
				]
			])) {
				//jika valid
				$data = array(
					'nama_user' => $this->request->getPost('nama_user'),
					'email' => $this->request->getPost('email'),
					'no_hp' => $this->request->getPost('no_hp'),
					'password' => $this->request->getPost('password'),
					'level' => 3
				 );
				 $this->Model_Auth->save_register($data);
				 session()->setFlashdata('pesan', 'Registrasi Berhasil');
				 return redirect()->to(base_url('Auth/register'));
		}else{
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('Auth/register'));
		}
	}

	public function index()
	{
    $data = array(
      'title' => 'Login',
     );
     return view ('login', $data);
	}

	public function login()
	{
    $data = array(
      'title' => 'Login',
     );
     return view ('login', $data);
	}

	public function cek_login()
	{
		if ($this->validate([
			'email' => [
				'label' => 'E-mail',
				'rules' => 'required',
				'errors'	=> [
					'required' => '{field} wajib diisi dan tidak boleh kosong'
				]
			],
			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors'	=> [
					'required' => '{field} wajib diisi dan tidak boleh kosong'
				]
				],
		])) {
			//jika valid
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$cek = $this->Model_Auth->login($email, $password);
			if ($cek) {
				session()->set('log', true);
				session()->set('nama_user', $cek['nama_user']);
				session()->set('email', $cek['email']);
				session()->set('level', $cek['level']);
				session()->set('foto_user', $cek['foto_user']);
				//login
				return redirect()->to(base_url('beranda'));
			}else{
				//jika datanya tidak cocok
				session()->setFlashdata('pesan', 'Gagal masuk');
				return redirect()->to(base_url('auth/login'));
			}
		} else{
			//jika tidak valid

		}
	}

	public function logout()
	{
		session()->remove('log');
		session()->remove('nama_user');
		session()->remove('level');
		session()->remove('foto_user');
		session()->setFlashdata('pesan', 'Berhasil keluar');
		return redirect()->to(base_url('auth/login'));
	}

}

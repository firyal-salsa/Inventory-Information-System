<?php

namespace App\Controllers;
use App\Models\LaporanStok_model;

class Beranda extends BaseController
{

	public function __construct()
  {
    $this->LaporanStok_model = new LaporanStok_model();
  }

	public function index()
	{
		$data = array(
			'title' => 'Home',
			'grafik' => $this->LaporanStok_model->getLaporanStok(),
			'isi'		=> 'v_home'
		);
		echo view('v_home', $data);
	}


}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Alat extends BaseController
{
	public function __construct()
	{
	}
	public function index()
	{
		$data = array_merge($this->data, [
			'title' 	=> 'Users Page',
			'Alat'		=> $this->alatModel->getAlat()
		]);
		return view('terrafert/alat', $data);
	}
	
	public function save()
	{
		if (!$this->validate(['noDevice' => ['rules' => 'is_unique[devices.no_device]']])) {
			session()->setFlashdata('notif_error', '<b>Gagal Menambahkan Alat</b> Nomor alat sudah dipakai');
			return redirect()->to(base_url('alat'));
		}
		$createAlat = $this->alatModel->saveAlat($this->request->getPost(null, FILTER_UNSAFE_RAW));
		if ($createAlat) {
			session()->setFlashdata('notif_success', '<b>Berhasil Menambahkan Alat</b> ');
			return redirect()->to(base_url('alat'));
		} else {
			session()->setFlashdata('notif_error', '<b>Gagal Menambahkan Alat</b> ');
			return redirect()->to(base_url('alat'));
		}
	}
	public function update()
	{
		$updateAlat = $this->alatModel->updateAlat($this->request->getPost(null, FILTER_UNSAFE_RAW));
		if ($updateAlat) {
			session()->setFlashdata('notif_success', '<b>Berhasil Memperbarui Alat</b> ');
			return redirect()->to(base_url('alat'));
		} else {
			session()->setFlashdata('notif_error', '<b>Gagal Memperbarui Alat</b> ');
			return redirect()->to(base_url('alat'));
		}
	}

	public function delete($id)
	{
		if (!$id) {
			return redirect()->to(base_url('alat'));
		}
		$delete = $this->alatModel->deleteAlat($id);
		if ($delete) {
			session()->setFlashdata('notif_success', '<b>Berhasil Menghapus Data Alat</b> ');
			return redirect()->to(base_url('alat'));
		} else {
			session()->setFlashdata('notif_error', '<b>Gagal Menghapus Data Alat</b> ');
			return redirect()->to(base_url('alat'));
		}
	}
}

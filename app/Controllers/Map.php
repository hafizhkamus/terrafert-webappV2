<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Map extends BaseController
{
	public function __construct()
	{
	}
	public function index()
	{
        $month = array(
            array('name' => 'Januari', 'value' => 1),
            array('name' => 'Febuari', 'value' => 2),
            array('name' => 'Maret', 'value' => 3),
            array('name' => 'April', 'value' => 4),
            array('name' => 'Mei', 'value' => 5),
            array('name' => 'Juni', 'value' => 6),
            array('name' => 'Juli', 'value' => 7),
            array('name' => 'Agustus', 'value' => 8),
            array('name' => 'September', 'value' => 9),
            array('name' => 'Oktober', 'value' => 10),
            array('name' => 'November', 'value' => 11),
            array('name' => 'Desember', 'value' => 12),
            // Add more months as needed
        );

		$data = array_merge($this->data, [
			'title' 	=> 'Users Page',
			'Alat'		=> $this->alatModel->getDevices(),
			'UserRole'	=> $this->userModel->getUserRole(),
            'Month'     => $month
		]);
		return view('terrafert/map', $data);
	}

    public function getDevices() {
        
        // Call a method to fetch "Alat" data filtered by the selected month
        $filteredHistory = $this->alatModel->getDevices();
        
        // Send the filtered data as JSON response
        return json_encode($filteredHistory);
    }
}

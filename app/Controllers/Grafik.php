<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Grafik extends BaseController
{
	public function __construct()
	{
	}
	public function index()
	{
		$data = array_merge($this->data, [
			'title' 	=> 'Users Page',
			'Alat'		=> $this->alatModel->getAlat(),
			'UserRole'	=> $this->userModel->getUserRole()
		]);
		return view('terrafert/grafik', $data);
	}

    public function filters() {
        $category = $this->request->getPost('category');
        $idAlat = $this->request->getPost('id');
        $startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');
        
        // Call a method to fetch "Alat" data filtered by the selected month
        $filteredHistory = $this->alatModel->getGrafikByIdAlat($idAlat, $category, $startDate, $endDate);
        
        // Send the filtered data as JSON response
        return json_encode($filteredHistory);
    }

	
}

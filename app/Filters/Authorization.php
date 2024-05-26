<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\MenuModel;

class Authorization implements FilterInterface
{
	protected $userModel;
	protected $menuModel;
	public function before(RequestInterface $request, $arguments = null)
	{
		$segment 			= $request->uri->getSegment(1);
	}
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}
}

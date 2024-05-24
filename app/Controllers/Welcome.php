<?php

namespace App\Controllers;



class Welcome extends BaseController
{
	public function __construct()
	{
	}

	
	public function index()
	{
		return view('terrafert/landing');
	}

	public function login()
	{
		if (session()->get('isLoggedIn') == TRUE) {
			return redirect()->to(base_url('home'));
		}
		if (!$this->validate(['inputEmail'  => 'required'])) {
			return view('common/login');
		} else {
			$inputEmail 		= $this->request->getVar('inputEmail');
			$inputPassword 		= htmlspecialchars($this->request->getVar('inputPassword', FILTER_UNSAFE_RAW));
			$user 				= $this->userModel->getUser(username: $inputEmail);
			if ($user) {
				$password		= $user['password'];
				$salt = "v4XHriGxTmm3j+3+A/1S6U1ZDyP0hoRqOI99QJ7FaWkXMmDOyANPPUOQHVh/Ii/sLkoQ7ZDrrMFTBk47ukhLyMJaiaX4wZb5XiuDqiPDXo20O15pDkXtuIJY8vcwhlrrOlL+/5SraHUsCjXjokQoF5lo6Dhqhofqzikp1r6FKbJRl3d9R1dvZ5BHC6fkTs92ugdE40drPWHf4Yr45GodEIR8cfW9T7NIKvLNiPt1RrjmpxXDZ+sYG/UaoexgcXXp9zcw84TqMcDuTHGZFliE/Ra6v2TR2BXb+n9Qj83d1BpNMqPydimI/jvU8Gkojxcju9CSYSnz9KQnFzFAEiGENA==";
				$md5 = md5($salt.$inputPassword);
				echo $md5;
				// $verify = verifyPass($inputPassword, $password);
				if ($md5 == $password) {
					session()->set([
						'username'		=> $user['username'],
						'role'			=> $user['role'],
						'isLoggedIn' 	=> TRUE
					]);
					return redirect()->to(base_url('home'));
				} else {
					session()->setFlashdata('notif_error', 'username or password is wrong!');
					return redirect()->to(base_url('login'));
				}
			} else {
				session()->setFlashdata('notif_error', 'username or password is wrong!');
				return redirect()->to(base_url('login'));
			}
		}
	}

	// public function verifyPass($password, $actualpassword){
	// 	$salt = "v4XHriGxTmm3j+3+A/1S6U1ZDyP0hoRqOI99QJ7FaWkXMmDOyANPPUOQHVh/Ii/sLkoQ7ZDrrMFTBk47ukhLyMJaiaX4wZb5XiuDqiPDXo20O15pDkXtuIJY8vcwhlrrOlL+/5SraHUsCjXjokQoF5lo6Dhqhofqzikp1r6FKbJRl3d9R1dvZ5BHC6fkTs92ugdE40drPWHf4Yr45GodEIR8cfW9T7NIKvLNiPt1RrjmpxXDZ+sYG/UaoexgcXXp9zcw84TqMcDuTHGZFliE/Ra6v2TR2BXb+n9Qj83d1BpNMqPydimI/jvU8Gkojxcju9CSYSnz9KQnFzFAEiGENA==";
	// 	$md5 = md5($salt.$password);

	// 	if($md5 == $actualpassword){
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }
	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url('login'));
	}

	public function forbiddenPage()
	{
		$data = array_merge($this->data, [
			'title'         => 'Forbidden Page'
		]);
		return view('common/forbidden', $data);
	}
	public function register()
	{
		return view('common/register');
	}
	public function registration()
	{
		if (!$this->validate([
			'inputEmail' 		=> ['label' => 'Email', 'rules' => 'is_unique[users.username]'],
			'inputPassword' 	=> ['label' => 'Password', 'rules' => 'required'],
			'inputPassword2' 	=> ['label' => 'Password Confirmation', 'rules' => 'matches[inputPassword]'],
		])) {
			$data = array_merge($this->data, [
				'title'         => 'Register Page',
			]);

			session()->setFlashdata('notif_error', $this->validation->getError('inputPassword2') . ' ' . $this->validation->getError('inputEmail'));
			return view('common/register', $data);
		} else {
			$inputFullname 		= htmlspecialchars($this->request->getVar('inputFullname', FILTER_UNSAFE_RAW));
			$inputEmail 		= htmlspecialchars($this->request->getVar('inputEmail', FILTER_UNSAFE_RAW));
			$inputPassword 		= htmlspecialchars($this->request->getVar('inputPassword', FILTER_UNSAFE_RAW));
			$dataUser			= [
				'inputFullname' => $inputFullname,
				'inputUsername' => $inputEmail,
				'inputPassword' => $inputPassword,
				'inputRole' 	=> 1
			];
			$registration		= $this->userModel->createUser($dataUser);
			session()->setFlashdata('notif_success', '<b>Registration Successfully!</b> Please login with your account.');
			return view('common/login');
		}
	}
}

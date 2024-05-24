<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	public function getUser($username = false, $userID = false)
	{
		if ($username) {
			return $this->db->query('SELECT users.*, user_role.role_name
			FROM users
			JOIN user_role ON users.role = user_role.id
			WHERE users.username = ?', $username)->getRowArray();
		}
	}

	public function getAccessMenuCategory($role)
	{
		return $this->db->table('user_menu_category')
			->select('*,user_menu_category.id AS menuCategoryID')
			->join('user_access', 'user_menu_category.id = user_access.menu_category_id')
			->where(['user_access.role_id' => $role])
			->get()->getResultArray();
	}
	public function getAccessMenu($role)
	{
		return $this->db->table('user_menu')
			->join('user_access', 'user_menu.id = user_access.menu_id')
			->where(['user_access.role_id' => $role])
			->get()->getResultArray();
	}

	public function getUserRole($role = false)
	{
		if ($role) {
			return $this->db->table('user_role')
				->where(['id' => $role])
				->get()->getRowArray();
		}

		return $this->db->table('user_role')
			->get()->getResultArray();
	}

	// public function createUser($dataUser)
	// {
	// 	return $this->db->table('users')->insert([
	// 		'fullname'		=> $dataUser['inputFullname'],
	// 		'username' 		=> $dataUser['inputUsername'],
	// 		'password' 		=> password_hash($dataUser['inputPassword'], PASSWORD_DEFAULT),
	// 		'role' 			=> $dataUser['inputRole'],
	// 		'created_at'    => date('Y-m-d h:i:s')
	// 	]);
	// }

	
	public function createUser($dataUser)
	{
		$salt = "v4XHriGxTmm3j+3+A/1S6U1ZDyP0hoRqOI99QJ7FaWkXMmDOyANPPUOQHVh/Ii/sLkoQ7ZDrrMFTBk47ukhLyMJaiaX4wZb5XiuDqiPDXo20O15pDkXtuIJY8vcwhlrrOlL+/5SraHUsCjXjokQoF5lo6Dhqhofqzikp1r6FKbJRl3d9R1dvZ5BHC6fkTs92ugdE40drPWHf4Yr45GodEIR8cfW9T7NIKvLNiPt1RrjmpxXDZ+sYG/UaoexgcXXp9zcw84TqMcDuTHGZFliE/Ra6v2TR2BXb+n9Qj83d1BpNMqPydimI/jvU8Gkojxcju9CSYSnz9KQnFzFAEiGENA==";
		$password = $dataUser['inputPassword'];
		$md5 = md5($salt.$password);
		return $this->db->table('users')->insert([
			'fullname'		=> $dataUser['inputFullname'],
			'username' 		=> $dataUser['inputUsername'],
			'password' 		=> $md5,
			'role' 			=> $dataUser['inputRole'],
			'created_at'    => date('Y-m-d h:i:s')
		]);
	}

	public function updateUser($dataUser)
	{
		if ($dataUser['inputPassword']) {
			$password = password_hash($dataUser['inputPassword'], PASSWORD_DEFAULT);
		} else {
			$user 		= $this->getUser(userID: $dataUser['userID']);
			$password 	= $user['password'];
		}
		return $this->db->table('users')->update([
			'fullname'		=> $dataUser['inputFullname'],
			'username' 		=> $dataUser['inputUsername'],
			'password' 		=> $password,
			'role' 			=> $dataUser['inputRole'],
		], ['id' => $dataUser['userID']]);
	}
	public function deleteUser($userID)
	{
		return $this->db->table('users')->delete(['id' => $userID]);
	}

	public function createRole($dataRole)
	{
		return $this->db->table('user_role')->insert(['role_name' => $dataRole['inputRoleName']]);
	}
	public function updateRole($dataRole)
	{
		return $this->db->table('user_role')->update(['role_name' => $dataRole['inputRoleName']], ['id' => $dataRole['roleID']]);
	}
	public function deleteRole($role)
	{
		return $this->db->table('user_role')->delete(['id' => $role]);
	}
	public function checkUserMenuCategoryAccess($dataAccess)
	{
		return  $this->db->table('user_access')
			->where([
				'role_id' => $dataAccess['roleID'],
				'menu_category_id' => $dataAccess['menuCategoryID']
			])
			->countAllResults();
	}

	public function checkUserAccess($dataAccess)
	{
		return  $this->db->table('user_access')
			->where([
				'role_id' => $dataAccess['roleID'],
				'menu_id' => $dataAccess['menuID']
			])
			->countAllResults();
	}

	public function checkUserSubmenuAccess($dataAccess)
	{
		return  $this->db->table('user_access')
			->where([
				'role_id' => $dataAccess['roleID'],
				'submenu_id' => $dataAccess['submenuID']
			])
			->countAllResults();
	}
	public function insertMenuCategoryPermission($dataAccess)
	{
		return $this->db->table('user_access')->insert(['role_id' => $dataAccess['roleID'], 'menu_category_id' => $dataAccess['menuCategoryID']]);
	}
	public function deleteMenuCategoryPermission($dataAccess)
	{
		return $this->db->table('user_access')->delete(['role_id' => $dataAccess['roleID'], 'menu_category_id' => $dataAccess['menuCategoryID']]);
	}

	public function insertMenuPermission($dataAccess)
	{
		return $this->db->table('user_access')->insert(['role_id' => $dataAccess['roleID'], 'menu_id' => $dataAccess['menuID']]);
	}
	public function deleteMenuPermission($dataAccess)
	{
		return $this->db->table('user_access')->delete(['role_id' => $dataAccess['roleID'], 'menu_id' => $dataAccess['menuID']]);
	}

	public function insertSubmenuPermission($dataAccess)
	{
		return $this->db->table('user_access')->insert(['role_id' => $dataAccess['roleID'], 'submenu_id' => $dataAccess['submenuID']]);
	}
	public function deleteSubmenuPermission($dataAccess)
	{
		return $this->db->table('user_access')->delete(['role_id' => $dataAccess['roleID'], 'submenu_id' => $dataAccess['submenuID']]);
	}
}

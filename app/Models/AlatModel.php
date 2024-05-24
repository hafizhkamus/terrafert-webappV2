<?php

namespace App\Models;

use CodeIgniter\Model;

class AlatModel extends Model
{
	public function getAlat()
	{
        return $this->db->query("select id, no_device, device_name, 
        longitude, latitude, created_at, first_address
        from devices order by id")->getResultArray();
	}

    public function getHistoryAlatByMonth($idAlat, $selectedMonth)
	{

        if ($selectedMonth == "") {
            return $this->db->query("select id, DATE(trx_time) as tanggal, DATE_FORMAT(trx_time,'%k:%i') as waktu,
            humidity, ph, N, P, K from monitors where id_device = ?", $idAlat)->getResultArray();
        } else {
            return $this->db->query("select id, DATE(trx_time) as tanggal, DATE_FORMAT(trx_time,'%k:%i') as waktu,
            humidity, ph, N, P, K from monitors where id_device = ? and MONTH(trx_time) = ?", array($idAlat, $selectedMonth))->getResultArray();
        }
	}

	public function getDevices()
	{
		return $this->db->query("SELECT d.*, m.*
		FROM devices d
		LEFT JOIN (
			SELECT id_device, MAX(trx_time) AS latest_trx_time
			FROM monitors
			GROUP BY id_device
		) latest_m ON d.id = latest_m.id_device
		LEFT JOIN monitors m ON latest_m.id_device = m.id_device AND latest_m.latest_trx_time = m.trx_time")->getResultArray();
	}


	public function getGrafikByIdAlat($idAlat, $category, $startDate, $endDate)
	{

        if ($startDate == "" || $endDate == "") {
            return $this->db->query("SELECT YEAR(trx_time) AS trx_year, WEEK(trx_time) AS trx_week,
				AVG(ph) AS avg_ph,
				AVG(N) AS avg_N,
				AVG(P) AS avg_P,
				AVG(K) AS avg_K,
				AVG(humidity) AS avg_humidity
			FROM 
				monitors
			WHERE 
				id_device = ?
			GROUP BY 
				YEAR(trx_time), WEEK(trx_time)
			ORDER BY 
				trx_year ASC, trx_week ASC", $idAlat)->getResultArray();
        } else {
            return $this->db->query("SELECT YEAR(trx_time) AS trx_year, WEEK(trx_time) AS trx_week,
				AVG(ph) AS avg_ph,
				AVG(N) AS avg_N,
				AVG(P) AS avg_P,
				AVG(K) AS avg_K,
				AVG(humidity) AS avg_humidity
			FROM 
				monitors
			WHERE 
				id_device = ?
				AND trx_time >= ? 
				AND trx_time <= ?
			GROUP BY 
				YEAR(trx_time), WEEK(trx_time)
			ORDER BY 
				trx_year ASC, trx_week ASC", array($idAlat, $startDate, $endDate))->getResultArray();
        }
	}

	public function saveAlat($alat)
	{
		return $this->db->table('devices')->insert([
			'no_device'		=> $alat['noDevice'],
			'device_name' 	=> $alat['deviceName'],
			'first_address' => $alat['location'],
			'latitude' 		=> $alat['latitude'],
			'longitude' 	=> $alat['longitude'],
			'created_at'    => date('Y-m-d h:i:s')
		]);
	}
	public function updateAlat($alat)
	{
		// if ($alat['inputPassword']) {
		// 	$password = password_hash($alat['inputPassword'], PASSWORD_DEFAULT);
		// } else {
		// 	$user 		= $this->getUser(userID: $alat['userID']);
		// 	$password 	= $user['password'];
		// }
		return $this->db->table('devices')->update([
			'device_name'		=> $alat['deviceName'],
			'first_address' 	=> $alat['location'],
			'latitude'			=> $alat['latitude'],
			'longitude'			=> $alat['longitude'],
		], ['id' => $alat['deviceId']]);
	}

	public function deleteAlat($id)
	{
		return $this->db->table('devices')->delete(['id' => $id]);
	}
}

<?php

function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
		redirect ('auth');
	} else {
		$role_id = $ci->session->userdata('role_id');
		$menu = $ci->uri->segment(1);

		$queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
		$menu_id = $queryMenu['id'];

		$userAccess =$ci->db->get_where('user_access_menu', [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		]);

		if ( $userAccess->num_rows() < 1 ) {
			redirect('auth/blocked');
		}
	}
}

function _protect()
{
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
		redirect ('auth');
	}
}

function check_access($role_id, $menu_id)
{
	$ci = get_instance();

	$result = $ci->db->get_where('user_access_menu', [
		'role_id' => $role_id,
		'menu_id' => $menu_id
	]);

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

function check_assignment($user_id, $group_id)
{
	$ci = get_instance();

	$result = $ci->db->get_where('user_to_group', [
		'user_id' => $user_id,
		'group_id' => $group_id
	]);

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

function rupiah($angka)
{

$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
return $hasil_rupiah;

}

function rec_user_log($user_id, $action, $page)
{
	$ci = get_instance();
	$data = [
		'user_id' => $user_id,
		'action' => $action,
		'page' => $page
	];

	return $ci->db->insert('user_log', $data);
}

function tanggal_indo_singkat($tanggal)
{
	$bulan = array (1 =>   'Jan',
				'Feb',
				'Mar',
				'Apr',
				'Mei',
				'Jun',
				'Jul',
				'Agus',
				'Sep',
				'Okt',
				'Nov',
				'Des'
			);
	$split = explode('-', $tanggal);
	return $split[2] . '-' . $bulan[ (int)$split[1] ] . '-' . $split[0];
}

function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

function tanggal_indo_lengkap($tanggal)
{
	$namahari = [
		"Sunday" => "Ahad",
		"Monday" => "Senin",
		"Tuesday" => "Selasa",
		"Wednesday" => "Rabu",
		"Thursday" => "Kamis",
		"Friday" => "Jum'at",
		"Saturday" => "Sabtu"
	];

	$hari = date('l', strtotime($tanggal));

	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $namahari[$hari] .', ' . $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

function nama_bulan($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $bulan[ (int)$split[1] ];
}

function hitung_umur($tanggal_lahir){
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
	if ($birthDate > $today) { 
	   return ("0 tahun");
	}
	$y = $today->diff($birthDate)->y;
	return $y." tahun";
}

function hitung_umur_detail($tanggal_lahir){
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime(date('Y-m-d H:i', time()));
	$hasil = "";
	if ($birthDate > $today) { 
	    exit("0 tahun 0 bulan 0 hari");
	}
	$y = $today->diff($birthDate)->y;
	$m = $today->diff($birthDate)->m;
	$d = $today->diff($birthDate)->d;
	$h = $today->diff($birthDate)->h;
	if($y > 0){
		$hasil .= $y . " tahun ";
	}
	if($m > 0){
		$hasil .= $m . " bulan ";
	}
	if($d > 0){
		$hasil .= $d . " hari ";
	}
	if($h > 0){
		$hasil .= $h . " jam";
	}
	return $hasil;
}

function selisih_waktu($tgl_lama, $tgl_baru){
	$tgl_1 = new DateTime($tgl_lama);
	$tgl_2 = new DateTime($tgl_baru);
	$hasil = "";
	if ($tgl_1 > $tgl_2) { 
	    exit("0 tahun 0 bulan 0 hari");
	}
	$y = $tgl_2->diff($tgl_1)->y;
	$m = $tgl_2->diff($tgl_1)->m;
	$d = $tgl_2->diff($tgl_1)->d;
	$h = $tgl_2->diff($tgl_1)->h;
	if($y > 0){
		$hasil .= $y . " tahun ";
	}
	if($m > 0){
		$hasil .= $m . " bulan ";
	}
	if($d > 0){
		$hasil .= $d . " hari ";
	}
	if($h > 0){
		$hasil .= $h . " jam";
	}
	return $hasil;
}

// function selisih_waktu($tgl_1, $tgl_2) {
// 	$sejam = 60*60;
// 	$sehari = $sejam*24;
// 	$sebulan = $sehari*30;
// 	$setahun = $sehari*365;
// 	$selisih = "";

// 	if ($tgl_1 > $tgl_2) {
// 		$jml_waktu = $tgl_1 - $tgl_2;
// 	} else {
// 		$jml_waktu = $tgl_2 - $tgl_1;
// 	}
// 		$waktu = $jml_waktu/$setahun; // 31.536.000 adalah jumlah detik dalam 1 tahun
// 		$tahun = number_format($waktu,0);
// 		if ($tahun > 0) {
// 			$selisih .= $tahun . " tahun ";
// 		}

// 		$sisa = ($waktu-$tahun);
// 		$jml_detik1 = $sisa*$setahun;
// 		$waktu2 = $jml_detik1/$sebulan;
// 		$bulan = number_format($waktu2,0);
// 		if ($bulan > 0) {
// 			$selisih .= $bulan . " bulan ";
// 		}

// 		$sisa2 = $waktu2-$bulan;
// 		$jml_detik2 = $sisa2*$sebulan;
// 		$waktu3 = $jml_detik2/$sehari;
// 		$hari = number_format($waktu3,0);
// 		if ($hari > 0) {
// 			$selisih .= $hari . " hari ";
// 		}

// 		$sisa3 = $waktu3-$hari;
// 		$jml_detik3 = $sisa3*$sehari;
// 		$waktu4 = $jml_detik3/$sejam;
// 		$jam = number_format($waktu4);
// 		if ($jam > 0) {
// 			$selisih .= $jam . " jam";
// 		}

// 		// $selisih = $jam;

// 	// if ($jml_waktu >= $setahun) {
// 	// 	// code...
// 	// }
// 	return $selisih;
// }

// Daftar warna asli template admin lte 3
// 'blue' => '#007bff',
// 'indigo' => '#6610f2',
// 'purple' => '#6f42c1',
// 'pink' => '#e83e8c',
// 'red' => '#dc3545',
// 'orange' => '#fd7e14',
// 'yellow' => '#ffc107',
// 'green' => '#28a745',
// 'teal' => '#20c997',
// 'cyan' => '#17a2b8',
// 'white' => '#ffffff',
// 'gray' => '#6c757d',
// 'gray-dark' => '#343a40',
// 'primary' => '#007bff',
// 'secondary' => '#6c757d',
// 'success' => '#28a745',
// 'info' => '#17a2b8',
// 'warning' => '#ffc107',
// 'danger' => '#dc3545',
// 'light' => '#f8f9fa',
// 'dark' => '#343a40'

function warna($index){
	$color = [
		'#007bff',
		'#6610f2',
		'#6f42c1',
		'#e83e8c',
		'#dc3545',
		'#fd7e14',
		'#ffc107',
		'#28a745',
		'#20c997',
		'#17a2b8',
		'#ffffff',
		'#6c757d',
		'#343a40',
		'#007bff',
		'#6c757d',
		'#28a745',
		'#17a2b8',
		'#ffc107',
		'#dc3545',
		'#f8f9fa',
		'#3d9970',
		'#343a40'
	];

	return $color[$index];
}

function warnaCss($index){
	$color = [
		'blue',
		'indigo',
		'purple',
		'pink',
		'red',
		'orange',
		'yellow',
		'green',
		'teal',
		'cyan',
		'white',
		'gray',
		'gray-dark',
		'primary',
		'secondary',
		'success',
		'info',
		'warning',
		'danger',
		'light',
		'olive',
		'dark'
	];

	return $color[$index];
}


function warnaChart($index){
	$color = [
		'#20c997', // teal
		'#ffc107', // yellow
		'#17a2b8', // cyan
		'#fd7e14', // orange
		'#007bff', // blue
		'#28a745', // green
		'#e83e8c', // pink
		'#6610f2', // indigo
		'#3d9970' // olive
	];
	
	return $color[$index];
}

function warnaLabel($index){
	$color = [
		'teal',
		'yellow',
		'cyan',
		'orange',
		'blue',
		'green',
		'pink',
		'indigo',
		'olive'
	];

	return $color[$index];
}

function tahun_ajaran() {
	$year1 = date('Y')-1;
	$year2 = date('Y')+1;

	if (number_format(date('m')) < 7) {
		// code...
		return $year1 . "/" . date('Y');
	} else {
		return date('Y') . "/" . $year2;
	}
}

function format_tanggal($date){
	return date('Y-m-d', strtotime($date));
}

function importExcel($file, $sheetname="") {
		
	$file_mimes = array('application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

	if ($file['name'] == "") {

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pilih file untuk diinput!</div>');
		return FALSE;
		
	} elseif (!in_array($file['type'], $file_mimes)) {

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Hanya boleh file Excel!</div>');
		return FALSE;

	} else {

		$arr_file = explode('.', $file['name']);
		$extension = end($arr_file);

		if('csv' == $extension) {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} elseif ('xls' == $extension) {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}

		$spreadsheet = $reader->load($file['tmp_name']);

	if ($sheetname == "") {
		$sheetData = $spreadsheet->getActiveSheet()->toArray();
	} else {
		$sheetData = $spreadsheet->getSheetByName($sheetname)->toArray();
	}


		return $sheetData;

	}

}


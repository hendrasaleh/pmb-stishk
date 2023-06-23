<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		_protect();
	}

	public function dataPendaftar()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();


		$this->db->select('user.id AS user_id, user.email AS email, user.name AS name, user.asal_sekolah, user.date_created, user.is_active AS active, user.reff AS reff, user.gender AS jenis_kelamin, program.kode_program AS program, user.village_id AS desa, data_wilayah_new.nm_wil AS kecamatan, data_kabupaten.nm_wil AS kabupaten, data_provinsi.nm_wil AS provinsi');
		$this->db->from('user');
		// $this->db->join('user_detail', 'user.email = user_detail.email');
		$this->db->join('kelas', 'user.kelas_id = kelas.kelas_id');
		$this->db->join('program', 'kelas.prog_id = program.prog_id');
		$this->db->join('data_wilayah_new', 'user.district_id = data_wilayah_new.id_wil');
		$this->db->join('data_kabupaten', 'user.regency_id = data_kabupaten.id_wil');
		$this->db->join('data_provinsi', 'user.province_id = data_provinsi.id_wil');
		$this->db->where('user.role_id =', 3);
		$this->db->order_by('user.is_active', 'DESC');
		$this->db->order_by('program.kode_program', 'DESC');
		$this->db->order_by('user.name', 'ASC');
		$data['users'] = $this->db->get()->result_array();

		// echo "<pre>";
		// print_r($data['users']);
		// echo "</pre>";
		// die;

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_head = [
				'font' => ['bold' => true], // Set font nya jadi bold
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				]
		];

		$style_col = [
				'font' => ['bold' => true], // Set font nya jadi bold
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				],
				'borders' => [
					'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
					'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
					'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
					'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
				]
		];

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				],
				'borders' => [
					'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
					'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
					'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
					'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
				]
		];

		$sheet->setCellValue('A1', "DATA CALON MAHASISWA STISHK KUNINGAN TAHUN AKADEMIK 2023-2024"); // Set kolom A1 dengan Judul Tabel
	    $sheet->mergeCells('A1:L1'); // Set Merge Cell pada kolom A1 sampai F1 (sesuai kebutuhan)
	    $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
	    $sheet->getStyle('A1')->applyFromArray($style_head);

	    // Buat header tabel nya pada baris ke 3
	    $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
	    $sheet->setCellValue('B3', "NAMA LENGKAP"); // Set kolom B3 dengan tulisan "NAMA LENGKAP"
	    $sheet->setCellValue('C3', "NO HP"); // Set kolom C3 dengan tulisan "NO HP"
	    $sheet->setCellValue('D3', "ASAL SEKOLAH"); // Set kolom C3 dengan tulisan "ASAL SEKOLAH"
	    $sheet->setCellValue('E3', "STATUS"); // Set kolom D3 dengan tulisan "STATUS"
	    $sheet->setCellValue('F3', "REFERENSI"); // Set kolom E3 dengan tulisan "REFERENSI"
	    $sheet->setCellValue('G3', "JENIS KELAMIM"); // Set kolom E3 dengan tulisan "JENIS KELAMIM"
	    $sheet->setCellValue('H3', "PRODI"); // Set kolom E3 dengan tulisan "PRODI"
	    $sheet->setCellValue('I3', "DESA"); // Set kolom E3 dengan tulisan "DESA"
	    $sheet->setCellValue('J3', "KECAMATAN"); // Set kolom E3 dengan tulisan "KECAMATAN"
	    $sheet->setCellValue('K3', "KABUPATEN"); // Set kolom E3 dengan tulisan "KABUPATEN"
	    $sheet->setCellValue('L3', "PROVINSI"); // Set kolom E3 dengan tulisan "PROVINSI"

	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $sheet->getStyle('A3')->applyFromArray($style_col);
	    $sheet->getStyle('B3')->applyFromArray($style_col);
	    $sheet->getStyle('C3')->applyFromArray($style_col);
	    $sheet->getStyle('D3')->applyFromArray($style_col);
	    $sheet->getStyle('E3')->applyFromArray($style_col);
	    $sheet->getStyle('F3')->applyFromArray($style_col);
	    $sheet->getStyle('G3')->applyFromArray($style_col);
	    $sheet->getStyle('H3')->applyFromArray($style_col);
	    $sheet->getStyle('I3')->applyFromArray($style_col);
	    $sheet->getStyle('J3')->applyFromArray($style_col);
	    $sheet->getStyle('K3')->applyFromArray($style_col);
	    $sheet->getStyle('L3')->applyFromArray($style_col);

	    $no = 1;
	    $numrow = 4; // Set baris pertama untuk tabel adalah baris keempat, karena header diset di baris ke 3

	    foreach($data_pegawai as $dp){ // Lakukan looping pada variabel siswa
	    	$sheet->setCellValue('A'.$numrow, $no);
	    	$sheet->setCellValue('B'.$numrow, html_entity_decode($dp['name'], ENT_QUOTES));
	    	$sheet->setCellValue('C'.$numrow, "'62" . $dp['email']);
	    	$sheet->setCellValue('D'.$numrow, $dp['asal_sekolah']);
	    	$sheet->setCellValue('E'.$numrow, $dp['active']);
	    	$sheet->setCellValue('F'.$numrow, $dp['reff']);
	    	$sheet->setCellValue('G'.$numrow, $dp['detail_status_pegawai'] == 1 ? 'Laki-laki' : 'Perempuan');
	    	$sheet->setCellValue('H'.$numrow, $dp['program']);
	    	$sheet->setCellValue('I'.$numrow, $dp['desa']);
	    	$sheet->setCellValue('J'.$numrow, $dp['kecamatan']);
	    	$sheet->setCellValue('K'.$numrow, $dp['kabupaten']);
	    	$sheet->setCellValue('L'.$numrow, $dp['provinsi']);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('H'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('I'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('J'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('K'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('L'.$numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
	    $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $sheet->getColumnDimension('B')->setWidth(40); // Set width kolom B
	    $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
	    $sheet->getColumnDimension('D')->setWidth(40); // Set width kolom D
	    $sheet->getColumnDimension('E')->setWidth(25); // Set width kolom E
	    $sheet->getColumnDimension('F')->setWidth(40); // Set width kolom F
	    $sheet->getColumnDimension('G')->setWidth(25); // Set width kolom G
	    $sheet->getColumnDimension('H')->setWidth(20); // Set width kolom H
	    $sheet->getColumnDimension('I')->setWidth(30); // Set width kolom I
	    $sheet->getColumnDimension('J')->setWidth(30); // Set width kolom J
	    $sheet->getColumnDimension('K')->setWidth(30); // Set width kolom K
	    $sheet->getColumnDimension('L')->setWidth(30); // Set width kolom L
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $sheet->getDefaultRowDimension()->setRowHeight(-1);
	    // Set orientasi kertas jadi LANDSCAPE
	    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
	    // Set judul file excel nya
	    $sheet->setTitle("Data Pendaftar");
	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="Data Pendaftar.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $writer = new Xlsx($spreadsheet);
	    $writer->save('php://output');
	}

	public function struktural($id)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->join('unit', 'pegawai.unit_id = unit.id_unit');
		$this->db->join('divisi', 'pegawai.divisi_id = divisi.id_divisi');
		$this->db->join('amanah', 'pegawai.amanah_id = amanah.id_amanah');
		$this->db->join('status_kepegawaian', 'pegawai.status_pegawai_id = status_kepegawaian.id_status_pegawai');
		$this->db->where('pegawai.amanah_id', $id);
		$this->db->order_by('unit.id_unit', 'ASC');
		$this->db->order_by('divisi.id_divisi', 'ASC');
		$data_pegawai = $this->db->get()->result_array();

		$data_amanah = $this->db->get_where('amanah', ['id_amanah' => $id])->row_array();

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_head = [
				'font' => ['bold' => true], // Set font nya jadi bold
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				]
		];

		$style_col = [
				'font' => ['bold' => true], // Set font nya jadi bold
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				],
				'borders' => [
					'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
					'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
					'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
					'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
				]
		];

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				],
				'borders' => [
					'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
					'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
					'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
					'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
				]
		];

		$sheet->setCellValue('A1', "DATA " . strtoupper($data_amanah['nama_amanah'])); // Set kolom A1 dengan Judul Tabel
	    $sheet->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai F1 (sesuai kebutuhan)
	    $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
	    $sheet->getStyle('A1')->applyFromArray($style_head);

	    // Buat header tabel nya pada baris ke 3
	    $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
	    $sheet->setCellValue('B3', "NAMA"); // Set kolom B3 dengan tulisan "NAMA"
	    $sheet->setCellValue('C3', "AMANAH"); // Set kolom C3 dengan tulisan "AMANAH"
	    $sheet->setCellValue('D3', "UNIT"); // Set kolom D3 dengan tulisan "UNIT"
	    $sheet->setCellValue('E3', "DIVISI"); // Set kolom E3 dengan tulisan "DIVISI"
	    $sheet->setCellValue('F3', "STATUS KEPEGAWAIAN"); // Set kolom E3 dengan tulisan "STATUS KEPEGAWAIAN"

	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $sheet->getStyle('A3')->applyFromArray($style_col);
	    $sheet->getStyle('B3')->applyFromArray($style_col);
	    $sheet->getStyle('C3')->applyFromArray($style_col);
	    $sheet->getStyle('D3')->applyFromArray($style_col);
	    $sheet->getStyle('E3')->applyFromArray($style_col);
	    $sheet->getStyle('F3')->applyFromArray($style_col);

	    $no = 1;
	    $numrow = 4; // Set baris pertama untuk tabel adalah baris keempat, karena header diset di baris ke 3

	    foreach($data_pegawai as $dp){ // Lakukan looping pada variabel siswa
	    	$sheet->setCellValue('A'.$numrow, $no);
	    	$sheet->setCellValue('B'.$numrow, html_entity_decode($dp['nama_lengkap'], ENT_QUOTES));
	    	$sheet->setCellValue('C'.$numrow, html_entity_decode($dp['detail_amanah']));
	    	$sheet->setCellValue('D'.$numrow, $dp['nama_unit']);
	    	$sheet->setCellValue('E'.$numrow, $dp['nama_divisi']);
	    	$sheet->setCellValue('F'.$numrow, $dp['detail_status_pegawai']);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('F'.$numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
	    $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $sheet->getColumnDimension('B')->setWidth(40); // Set width kolom B
	    $sheet->getColumnDimension('C')->setWidth(40); // Set width kolom C
	    $sheet->getColumnDimension('D')->setWidth(30); // Set width kolom D
	    $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E
	    $sheet->getColumnDimension('F')->setWidth(30); // Set width kolom F
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $sheet->getDefaultRowDimension()->setRowHeight(-1);
	    // Set orientasi kertas jadi LANDSCAPE
	    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
	    // Set judul file excel nya
	    $sheet->setTitle("Data " . $data_amanah['nama_amanah']);
	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="Data ' . $data_amanah['nama_amanah'] . '.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $writer = new Xlsx($spreadsheet);
	    $writer->save('php://output');
	}

	public function statusPegawai($id)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->join('unit', 'pegawai.unit_id = unit.id_unit');
		$this->db->join('divisi', 'pegawai.divisi_id = divisi.id_divisi');
		$this->db->join('amanah', 'pegawai.amanah_id = amanah.id_amanah');
		$this->db->join('status_kepegawaian', 'pegawai.status_pegawai_id = status_kepegawaian.id_status_pegawai');
		$this->db->where('pegawai.status_pegawai_id', $id);
		$this->db->order_by('amanah.id_amanah', 'ASC');
		$this->db->order_by('unit.id_unit', 'ASC');
		$this->db->order_by('divisi.id_divisi', 'ASC');
		$data_pegawai = $this->db->get()->result_array();

		$data_status = $this->db->get_where('status_kepegawaian', ['id_status_pegawai' => $id])->row_array();

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_head = [
				'font' => ['bold' => true], // Set font nya jadi bold
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				]
		];

		$style_col = [
				'font' => ['bold' => true], // Set font nya jadi bold
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				],
				'borders' => [
					'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
					'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
					'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
					'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
				]
		];

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				],
				'borders' => [
					'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
					'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
					'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
					'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
				]
		];

		$sheet->setCellValue('A1', "DATA " . strtoupper($data_status['detail_status_pegawai'])); // Set kolom A1 dengan Judul Tabel
	    $sheet->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai F1 (sesuai kebutuhan)
	    $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
	    $sheet->getStyle('A1')->applyFromArray($style_head);

	    // Buat header tabel nya pada baris ke 3
	    $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
	    $sheet->setCellValue('B3', "NAMA"); // Set kolom B3 dengan tulisan "NAMA"
	    $sheet->setCellValue('C3', "AMANAH"); // Set kolom C3 dengan tulisan "AMANAH"
	    $sheet->setCellValue('D3', "STRUKTUR"); // Set kolom C3 dengan tulisan "STRUKTUR"
	    $sheet->setCellValue('E3', "UNIT"); // Set kolom D3 dengan tulisan "UNIT"
	    $sheet->setCellValue('F3', "DIVISI"); // Set kolom E3 dengan tulisan "DIVISI"

	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $sheet->getStyle('A3')->applyFromArray($style_col);
	    $sheet->getStyle('B3')->applyFromArray($style_col);
	    $sheet->getStyle('C3')->applyFromArray($style_col);
	    $sheet->getStyle('D3')->applyFromArray($style_col);
	    $sheet->getStyle('E3')->applyFromArray($style_col);
	    $sheet->getStyle('F3')->applyFromArray($style_col);

	    $no = 1;
	    $numrow = 4; // Set baris pertama untuk tabel adalah baris keempat, karena header diset di baris ke 3

	    foreach($data_pegawai as $dp){ // Lakukan looping pada variabel siswa
	    	$sheet->setCellValue('A'.$numrow, $no);
	    	$sheet->setCellValue('B'.$numrow, html_entity_decode($dp['nama_lengkap'], ENT_QUOTES));
	    	$sheet->setCellValue('C'.$numrow, html_entity_decode($dp['detail_amanah']));
	    	$sheet->setCellValue('D'.$numrow, $dp['nama_amanah']);
	    	$sheet->setCellValue('E'.$numrow, $dp['nama_unit']);
	    	$sheet->setCellValue('F'.$numrow, $dp['nama_divisi']);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('F'.$numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
	    $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $sheet->getColumnDimension('B')->setWidth(40); // Set width kolom B
	    $sheet->getColumnDimension('C')->setWidth(40); // Set width kolom C
	    $sheet->getColumnDimension('D')->setWidth(25); // Set width kolom D
	    $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E
	    $sheet->getColumnDimension('F')->setWidth(30); // Set width kolom F
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $sheet->getDefaultRowDimension()->setRowHeight(-1);
	    // Set orientasi kertas jadi LANDSCAPE
	    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
	    // Set judul file excel nya
	    $sheet->setTitle("Data " . $data_status['detail_status_pegawai']);
	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="Data ' . $data_status['detail_status_pegawai'] . '.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $writer = new Xlsx($spreadsheet);
	    $writer->save('php://output');
	}

	public function pegawaiDivisi($id)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->join('unit', 'pegawai.unit_id = unit.id_unit');
		$this->db->join('divisi', 'pegawai.divisi_id = divisi.id_divisi');
		$this->db->join('amanah', 'pegawai.amanah_id = amanah.id_amanah');
		$this->db->join('status_kepegawaian', 'pegawai.status_pegawai_id = status_kepegawaian.id_status_pegawai');
		$this->db->where('pegawai.divisi_id', $id);
		$this->db->order_by('unit.id_unit', 'ASC');
		$this->db->order_by('amanah.id_amanah', 'ASC');
		$data_pegawai = $this->db->get()->result_array();

		$data_divisi = $this->db->get_where('divisi', ['id_divisi' => $id])->row_array();

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_head = [
				'font' => ['bold' => true], // Set font nya jadi bold
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				]
		];

		$style_col = [
				'font' => ['bold' => true], // Set font nya jadi bold
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				],
				'borders' => [
					'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
					'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
					'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
					'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
				]
		];

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				],
				'borders' => [
					'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
					'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
					'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
					'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
				]
		];

		$sheet->setCellValue('A1', "DATA PEGAWAI DIVISI " . strtoupper($data_divisi['nama_divisi'])); // Set kolom A1 dengan Judul Tabel
	    $sheet->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai F1 (sesuai kebutuhan)
	    $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
	    $sheet->getStyle('A1')->applyFromArray($style_head);

	    // Buat header tabel nya pada baris ke 3
	    $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
	    $sheet->setCellValue('B3', "NAMA"); // Set kolom B3 dengan tulisan "NAMA"
	    $sheet->setCellValue('C3', "AMANAH"); // Set kolom C3 dengan tulisan "AMANAH"
	    $sheet->setCellValue('D3', "STRUKTUR"); // Set kolom C3 dengan tulisan "STRUKTUR"
	    $sheet->setCellValue('E3', "UNIT"); // Set kolom D3 dengan tulisan "UNIT"
	    $sheet->setCellValue('F3', "STATUS KEPEGAWAIAN"); // Set kolom E3 dengan tulisan "DIVISI"

	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $sheet->getStyle('A3')->applyFromArray($style_col);
	    $sheet->getStyle('B3')->applyFromArray($style_col);
	    $sheet->getStyle('C3')->applyFromArray($style_col);
	    $sheet->getStyle('D3')->applyFromArray($style_col);
	    $sheet->getStyle('E3')->applyFromArray($style_col);
	    $sheet->getStyle('F3')->applyFromArray($style_col);

	    $no = 1;
	    $numrow = 4; // Set baris pertama untuk tabel adalah baris keempat, karena header diset di baris ke 3

	    foreach($data_pegawai as $dp){ // Lakukan looping pada variabel siswa
	    	$sheet->setCellValue('A'.$numrow, $no);
	    	$sheet->setCellValue('B'.$numrow, html_entity_decode($dp['nama_lengkap'], ENT_QUOTES));
	    	$sheet->setCellValue('C'.$numrow, html_entity_decode($dp['detail_amanah']));
	    	$sheet->setCellValue('D'.$numrow, $dp['nama_amanah']);
	    	$sheet->setCellValue('E'.$numrow, $dp['nama_unit']);
	    	$sheet->setCellValue('F'.$numrow, $dp['detail_status_pegawai']);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('F'.$numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
	    $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $sheet->getColumnDimension('B')->setWidth(40); // Set width kolom B
	    $sheet->getColumnDimension('C')->setWidth(40); // Set width kolom C
	    $sheet->getColumnDimension('D')->setWidth(25); // Set width kolom D
	    $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E
	    $sheet->getColumnDimension('F')->setWidth(30); // Set width kolom F
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $sheet->getDefaultRowDimension()->setRowHeight(-1);
	    // Set orientasi kertas jadi LANDSCAPE
	    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
	    // Set judul file excel nya
	    $sheet->setTitle("Data Pegawai");
	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="Data Pegawai Divisi ' . $data_divisi['nama_divisi'] . '.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $writer = new Xlsx($spreadsheet);
	    $writer->save('php://output');
	}

	public function pegawaiUnit($id)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->join('unit', 'pegawai.unit_id = unit.id_unit');
		$this->db->join('divisi', 'pegawai.divisi_id = divisi.id_divisi');
		$this->db->join('amanah', 'pegawai.amanah_id = amanah.id_amanah');
		$this->db->join('status_kepegawaian', 'pegawai.status_pegawai_id = status_kepegawaian.id_status_pegawai');
		$this->db->where('pegawai.unit_id', $id);
		$this->db->order_by('amanah.id_amanah', 'ASC');
		$data_pegawai = $this->db->get()->result_array();

		$data_unit = $this->db->get_where('unit', ['id_unit' => $id])->row_array();

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_head = [
				'font' => ['bold' => true], // Set font nya jadi bold
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				]
		];

		$style_col = [
				'font' => ['bold' => true], // Set font nya jadi bold
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				],
				'borders' => [
					'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
					'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
					'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
					'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
				]
		];

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				],
				'borders' => [
					'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
					'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
					'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
					'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
				]
		];

		$sheet->setCellValue('A1', "DATA PEGAWAI UNIT " . strtoupper($data_unit['nama_unit'])); // Set kolom A1 dengan Judul Tabel
	    $sheet->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai F1 (sesuai kebutuhan)
	    $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
	    $sheet->getStyle('A1')->applyFromArray($style_head);

	    // Buat header tabel nya pada baris ke 3
	    $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
	    $sheet->setCellValue('B3', "NAMA"); // Set kolom B3 dengan tulisan "NAMA"
	    $sheet->setCellValue('C3', "AMANAH"); // Set kolom C3 dengan tulisan "AMANAH"
	    $sheet->setCellValue('D3', "STRUKTUR"); // Set kolom C3 dengan tulisan "STRUKTUR"
	    $sheet->setCellValue('E3', "STATUS KEPEGAWAIAN"); // Set kolom E3 dengan tulisan "DIVISI"

	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $sheet->getStyle('A3')->applyFromArray($style_col);
	    $sheet->getStyle('B3')->applyFromArray($style_col);
	    $sheet->getStyle('C3')->applyFromArray($style_col);
	    $sheet->getStyle('D3')->applyFromArray($style_col);
	    $sheet->getStyle('E3')->applyFromArray($style_col);

	    $no = 1;
	    $numrow = 4; // Set baris pertama untuk tabel adalah baris keempat, karena header diset di baris ke 3

	    foreach($data_pegawai as $dp){ // Lakukan looping pada variabel siswa
	    	$sheet->setCellValue('A'.$numrow, $no);
	    	$sheet->setCellValue('B'.$numrow, html_entity_decode($dp['nama_lengkap'], ENT_QUOTES));
	    	$sheet->setCellValue('C'.$numrow, html_entity_decode($dp['detail_amanah']));
	    	$sheet->setCellValue('D'.$numrow, $dp['nama_amanah']);
	    	$sheet->setCellValue('E'.$numrow, $dp['detail_status_pegawai']);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('E'.$numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
	    $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $sheet->getColumnDimension('B')->setWidth(40); // Set width kolom B
	    $sheet->getColumnDimension('C')->setWidth(40); // Set width kolom C
	    $sheet->getColumnDimension('D')->setWidth(25); // Set width kolom D
	    $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $sheet->getDefaultRowDimension()->setRowHeight(-1);
	    // Set orientasi kertas jadi LANDSCAPE
	    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
	    // Set judul file excel nya
	    $sheet->setTitle("Data Pegawai");
	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="Data Pegawai Unit ' . $data_unit['nama_unit'] . '.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $writer = new Xlsx($spreadsheet);
	    $writer->save('php://output');
	}

	public function strukturalDraft($id)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->join('amanah', 'pegawai.amanah_id = amanah.id_amanah');
		$this->db->join('unit', 'pegawai.unit_id = unit.id_unit');
		$this->db->where('pegawai.amanah_id', $id);
		$this->db->order_by('unit.id_unit', 'ASC');
		$data_pegawai = $this->db->get()->result_array();

		$data_amanah = $this->db->get_where('amanah', ['id_amanah' => $id])->row_array();

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_head = [
				'font' => ['bold' => true], // Set font nya jadi bold
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				]
		];

		$style_col = [
				'font' => ['bold' => true], // Set font nya jadi bold
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				],
				'borders' => [
					'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
					'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
					'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
					'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
				]
		];

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				],
				'borders' => [
					'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
					'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
					'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
					'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
				]
		];

		$sheet->setCellValue('A1', "DATA " . strtoupper($data_amanah['nama_amanah'])); // Set kolom A1 dengan Judul Tabel
	    $sheet->mergeCells('A1:D1'); // Set Merge Cell pada kolom A1 sampai F1 (sesuai kebutuhan)
	    $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
	    $sheet->getStyle('A1')->applyFromArray($style_head);

	    // Buat header tabel nya pada baris ke 3
	    $sheet->setCellValue('A3', "NO");
	    $sheet->setCellValue('B3', "NAMA");
	    $sheet->setCellValue('C3', "UNIT");
	    $sheet->setCellValue('D3', "AMANAH");

	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $sheet->getStyle('A3')->applyFromArray($style_col);
	    $sheet->getStyle('B3')->applyFromArray($style_col);
	    $sheet->getStyle('C3')->applyFromArray($style_col);
	    $sheet->getStyle('D3')->applyFromArray($style_col);

	    $no = 1;
	    $numrow = 4; // Set baris pertama untuk tabel adalah baris keempat, karena header diset di baris ke 3

	    foreach($data_pegawai as $dp){ // Lakukan looping pada variabel siswa
	    	$sheet->setCellValue('A'.$numrow, $no);
	    	$sheet->setCellValue('B'.$numrow, html_entity_decode($dp['nama_lengkap'], ENT_QUOTES));
	    	$sheet->setCellValue('C'.$numrow, $dp['nama_unit']);
	    	$sheet->setCellValue('D'.$numrow, html_entity_decode($dp['detail_amanah']));

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
			$sheet->getStyle('D'.$numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
	    $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $sheet->getColumnDimension('B')->setWidth(30); // Set width kolom B
	    $sheet->getColumnDimension('C')->setWidth(30); // Set width kolom C
	    $sheet->getColumnDimension('D')->setWidth(40); // Set width kolom D
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $sheet->getDefaultRowDimension()->setRowHeight(-1);
	    // Set orientasi kertas jadi LANDSCAPE
	    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
	    // Set judul file excel nya
	    $sheet->setTitle("Data " . $data_amanah['nama_amanah']);
	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="Data ' . $data_amanah['nama_amanah'] . '.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $writer = new Xlsx($spreadsheet);
	    $writer->save('php://output');
	}
}


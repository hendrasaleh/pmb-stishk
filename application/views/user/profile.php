
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Beranda</a></li>
              <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
      <div class="row">
        <div class="col-lg-6">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
    </section>
	<!-- <h3 class="form-control"><strong></strong></h3> -->
    <!-- Main content -->
    <section class="content">
		<div class="card">
			<div class="card-header">
				<h5><strong>DATA MAHASISWA</strong></h5>
			</div>
	        <div class="card-body">
	        	<?php if ($user['is_active'] == 0) : ?>
	        	<div class="row">
	        		<div class="card text-dark bg-warning mb-3 col-md-6">
						<div class="card-header">PERINGATAN</div>
						<div class="card-body">
							<h5 class="card-title"><strong>AKUN ANDA BELUM AKTIF</strong></h5>
							<p class="card-text">Untuk melanjutkan proses pendaftaran calon mahasiswa, silakan lakukan pembayaran sejumlah Rp. 150.000,- ke BANK Muamalat, nomor rekening: 1320014633 atas nama STIS Husnul Khotimah</p>
						</div>
					</div>
	        	</div>
	        	<div class="row">
					<div class="col-2">
						<a href="https://api.whatsapp.com/send/?phone=6289509848439&text=Assalamu'alaykum. Saya sudah transfer untuk biaya pendaftaran ke STISHK Kuningan." target="_blank"><button class="btn btn-info btn-block">Saya sudah transfer</button></a>
					</div>
				</div>
	        	<?php else : ?>
	        	<div class="row">
					<div class="card mb-3 col-md-6">
						<div class="row g-0">
							<div class="col-md-4">
								<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title"><?= $user['name']; ?></h5>
									<p class="card-text">
										<?= $user['email']; ?>
										<br>
									</p>
									<p class="card-text">
										<?= strtoupper($user['nama_program']); ?>
										<br>
										<?= $kab['nm_wil'] . ' - ' . strtoupper($prov['nm_wil']); ?>
										<br>
										Status : <?= $user['is_active'] == 1 ? "Aktif" : "Tidak aktif"; ?>
									</p>
									<p class="card-text"><small class="text-muted">Tanggal daftar : <?= tanggal_indo(date('Y-m-d', $user['date_created'])); ?></small></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
	        </div>
	        <div class="card-footer">
	        	<div class="form-group row">
					<div class="col-sm-9">
						<small>Last Modified: <?= tanggal_indo(date('Y-m-d',$detail['date_modified'])) . " " . date('H:m:s', $detail['date_modified']); ?></small>
					</div>
				</div>
	        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
    $("#provinsi").change(function(){

        // variabel dari nilai combo box kendaraan
        var id_provinsi = $("#provinsi").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url : "<?php echo base_url();?>/auth/get_kab",
            method : "POST",
            data : {id_provinsi:id_provinsi},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = "<option value=''>--Pilih Kabupaten--</option>";
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                }
                $('#kabupaten').html(html);

            }
        });
    });

    $("#kabupaten").change(function(){

        // variabel dari nilai combo box kendaraan
        var id_kabupaten = $("#kabupaten").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url : "<?php echo base_url();?>/auth/get_kec",
            method : "POST",
            data : {id_kabupaten:id_kabupaten},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = "<option value=''>--Pilih Kecamatan--</option>";
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                }
                $('#kecamatan').html(html);

            }
        });
    });
    $("#kecamatan").change(function(){

        // variabel dari nilai combo box kendaraan
        var id_kecamatan = $("#kecamatan").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url : "<?php echo base_url();?>/auth/get_desa",
            method : "POST",
            data : {id_kecamatan:id_kecamatan},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = "<option value=''>--Pilih Desa--</option>";
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                }
                $('#desa').html(html);

            }
        });
    });
    $("#j_kelamin").change(function(){

        // variabel dari nilai combo box kendaraan
        var jenis_kelamin = $("#j_kelamin").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url : "<?php echo base_url();?>/auth/get_ketua",
            method : "POST",
            data : {jenis_kelamin:jenis_kelamin},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = "<option value=''>--Pilih Murobbi/ah--</option>";
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].upa_id+'>'+data[i].nama_ketua+'</option>';
                }
                $('#nama_ketua').html(html);

            }
        });
    });
</script>


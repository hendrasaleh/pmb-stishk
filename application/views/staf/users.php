
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-body">
		    <div class="col-lg">

		  		<?= $this->session->flashdata('message'); ?>
          <div class="row">
            <div class="col-sm-6">
              <a href="<?= base_url('export/datapendaftar'); ?>" class="btn btn-info mb-3">Unduh Data Pendaftar</a>
            </div>
          </div>

		  		<table id="example1" class="table table-hover" data-page-length="50">
  				  <thead>
  				    <tr>
  				      <th scope="col">#</th>
  				      <th scope="col">Tanggal</th>
                <th scope="col">Nama</th>
                <th scope="col">L/P</th>
                <th scope="col">No. Handphone</th>
  				      <th scope="col">Alamat Asal</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Referensi</th>
  				      <th scope="col">Status</th>
  				      <th scope="col" style="width: 10%">Action</th>
  				    </tr>
  				  </thead>
  				  <tbody>
  				  	<?php
  				  		$i = 1;
  				  		foreach ($users as $users) :
  				  	?>
  				    <tr>
  				      <th scope="row"><?= $i; ?></th>
                <td><?= date('d-m-Y', $users['date_created']); ?></td>
  				      <td><?= ucwords(strtolower($users['name'])); ?></td>
                <td><?= $users['jenis_kelamin'] == 0 ? "P" : "L"; ?></td>
                <td><?= $users['email']; ?></td>
  				      <td><?= $users['kabupaten']; ?></td>
                <td><?= $users['program'] == 'HK' ? 'HKI' : 'HES'; ?>
                    <?= $users['kip'] == 1 ? " - KIP" : ""; ?>
                </td>
                <td><?= $users['reff']; ?></td>
                <td>
                  <?php if ($users['active'] == 1) : ?>
                    <span class="btn btn-flat btn-xs btn-success"><i class="fa-fw fas fa-check"></i></span>
                  <?php else : ?>
                    <span class="btn btn-flat btn-xs btn-danger"><i class="fa-fw fas fa-times"></i></span>
                  <?php endif; ?>
                </td>
  				      <!-- <td><?= $users['active'] == 1 ? 'Aktif' : 'Tidak aktif'; ?></td> -->
  				      <td>
                    <a href="<?= base_url('staf/viewuser/') . $users['user_id']; ?>" class="btn btn-info btn-xs btn-flat"><i class="fas fa-eye"></i></a>
  				      		<a href="manageuser/<?= $users['user_id']; ?>" class="btn btn-success btn-xs btn-flat"><i class="fas fa-edit"></i></a>
  				      		<a href="javascript:hapusData(<?= $users['user_id']; ?>)" class="btn btn-danger btn-xs btn-flat"><i class="fas fa-trash"></i></a>
  				      </td>
  				    </tr>
  					<?php
  						$i++;
  						endforeach;
  					?>
  				  </tbody>
				  </table>
		  	</div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#userdata').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script language="JavaScript" type="text/javascript">
	function hapusData(id){
		if (confirm("Apakah anda yakin akan menghapus data ini?")){
		  	window.location.href = 'deleteuser/' + id;
		}
	}
</script>

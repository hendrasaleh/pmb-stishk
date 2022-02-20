
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
          <div class="box-header">
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
              <div class="col-sm-12">
                <a class="btn btn-info ml-2 mb-3" href="<?= base_url('staf/tambahkelas/'); ?>">Tambah Kelas</a>
              </div>
            </div>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Fakultas</th>
                  <th>Program Studi</th>
                  <th>Tingkat</th>
                  <th>Pembimbing Akademik</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i= 1;
                  foreach ($kelas as $kls) : 
                ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $kls['nama_rq']; ?></td>
                  <td><?= $kls['nama_program']; ?></td>
                  <td>
                    <?php 
                      switch ($kls['jenis_kelamin']) {
                        case '4':
                          echo "4 (Empat)";
                          break;
                        case '3':
                          echo "3 (Tiga)";
                          break;
                        case '2':
                          echo "2 (Dua)";
                          break;
                        
                        default:
                          echo "1 (Satu)";
                          break;
                      }
                    ?>
                  </td>
                  <td><?= $kls['pengajar']; ?></td>
                  <td>
                    <a href="<?= base_url('staf/editkelas/') . $kls['kelas_id']; ?>" class="badge badge-success">edit</a>
                    <a href="javascript:hapusData(<?= $kls['kelas_id']; ?>)" class="badge badge-danger">delete</a>
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
        window.location.href = 'hapuskelas/' + id;
    }
  }
</script>


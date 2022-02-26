<div class="content-wrapper">
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
    <section class="content">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?= base_url('assets/img/profile/') . $users['image']; ?>" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?= $users['name']; ?></h4>
                                <hr>
                                <p class="text-secondary mb-1"><?= $users['nama_program']; ?></p>
                                <p class="text-muted font-size-sm">
                                    <?= strtoupper($kab['nm_wil']) . ' - ' . strtoupper($prov['nm_wil']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nama Lengkap</h6>
                            </div>
                            <div class="col-sm-5 text-secondary"><?= ucwords(strtolower($users['name'])); ?>
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Agama</h6>
                            </div>
                            <div class="col-sm-2 text-secondary">
                                <?php
                                    switch ($detail['agama']) {
                                        case '1':
                                            echo 'Islam';
                                            break;
                                        case '2':
                                            echo 'Kristen';
                                            break;
                                        case '3':
                                            echo 'Katholik';
                                            break;
                                        case '4':
                                            echo 'Hindu';
                                            break;
                                        case '5':
                                            echo 'Budha';
                                            break;
                                        case '6':
                                            echo 'Konghucu';
                                            break;
                                        case '98':
                                            echo 'Tidak diisi';
                                            break;
                                        
                                        default:
                                            echo 'Lainnya';
                                            break;
                                    }
                                 ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Jenis Kelamin</h6>
                            </div>
                            <div class="col-sm-9 text-secondary"><?= $users['gender'] == 1 ? 'Laki-laki' : 'Perempuan'; ?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">No. Handphone (WA)</h6>
                            </div>
                            <div class="col-sm-9 text-secondary"><?= $users['email']; ?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Tempat dan tanggal lahir</h6>
                            </div>
                            <div class="col-sm-9 text-secondary"><?= $detail['tempat_lahir'] == NULL ? 'Belum diisi' : strtoupper($detail['tempat_lahir']) . ", " . strtoupper(tanggal_indo(date('Y-m-d', $detail['tgl_lahir']))); ?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nama Ibu Kandung</h6>
                            </div>
                            <div class="col-sm-9 text-secondary"><?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?></div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutters-sm">
            <div class="col-sm mb-3">
                <div class="card card-orange card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true"><h6>Alamat</h6></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false"><h6>Orang tua</h6></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false"><h6>Wali</h6></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false"><h6>Kebutuhan khusus</h6></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Kewarganegaraan</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">NIK</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">NISN</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">NPWP</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Jalan</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Dusun</h6>
                                    </div>
                                    <div class="col-sm-6 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                    <div class="col-sm-1">
                                        <h6 class="mb-0">RT</h6>
                                    </div>
                                    <div class="col-sm-1 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                    <div class="col-sm-1">
                                        <h6 class="mb-0">RW</h6>
                                    </div>
                                    <div class="col-sm-1 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Kelurahan/Desa</h6>
                                    </div>
                                    <div class="col-sm-6 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                    <div class="col-sm-1">
                                        <h6 class="mb-0">Kode Pos</h6>
                                    </div>
                                    <div class="col-sm-3 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Kecamatan</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Jenis Tinggal</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Alat Transportasi</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Telepon</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Penerima KPS ?</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h5 class="mb-0"><strong>Ayah</strong></h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">NIK</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">NISN</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">NPWP</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Jalan</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Dusun</h6>
                                    </div>
                                    <div class="col-sm-6 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                    <div class="col-sm-1">
                                        <h6 class="mb-0">RT</h6>
                                    </div>
                                    <div class="col-sm-1 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                    <div class="col-sm-1">
                                        <h6 class="mb-0">RW</h6>
                                    </div>
                                    <div class="col-sm-1 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Kelurahan/Desa</h6>
                                    </div>
                                    <div class="col-sm-6 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                    <div class="col-sm-1">
                                        <h6 class="mb-0">Kode Pos</h6>
                                    </div>
                                    <div class="col-sm-3 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Kecamatan</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Jenis Tinggal</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Alat Transportasi</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Telepon</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Penerima KPS ?</h6>
                                    </div>
                                    <div class="col-sm-10 ">: <?= $detail['nama_ibu'] == NULL ? 'Belum diisi' : $detail['nama_ibu']; ?>
                                    </div>
                                </div>
                                <hr> 
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                                Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                                Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <div class="row gutters-sm">
            <div class="col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                        <small>Web Design</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Website Markup</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>One Page</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Mobile Template</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Backend API</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
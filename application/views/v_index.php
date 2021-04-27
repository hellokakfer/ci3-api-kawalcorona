<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Data Covid-19 Indonesia">
    <meta name="author" content="Kak Fer">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_URL() ?>assets/images/indonesia.png">
    <title>Corona Virus Disease 2019 - Kak Fer</title>
    <!-- Custom CSS -->
    <link href="<?= base_URL() ?>assets/libs/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="<?= base_URL() ?>dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="container">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center justify-content-center">
                        <h3 class="page-title">Corona Virus Disease 2019 (COVID-19)</h3>
                    </div>
                    <div class="col-12 d-flex no-block align-items-center justify-content-center">
                        <small>Update : Real Time</small>
                    </div>
                </div>
                </br>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- Kotak Kotak -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-12 col-md-6">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><?= str_replace(',', '', $indo['0']->positif) ?>
                                    <i class="mdi mdi-database"></i>
                                </h1>
                                <h6 class="text-white">Positif</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-sm-12 col-md-6">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <?php
                                $dirawat    = str_replace(',', '', $indo['0']->positif) - str_replace(',', '', $indo['0']->sembuh) - str_replace(',', '', $indo['0']->meninggal);
                                $p_dirawat  = 100 * $dirawat / str_replace(',', '', $indo['0']->positif);
                                ?>
                                <h1 class="font-light text-white"><?= $dirawat ?>
                                    <i class="mdi mdi-emoticon-neutral"></i>
                                </h1>
                                <h6 class="text-white">Dirawat <?= '( ' . round($p_dirawat, 3) . '% )' ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-sm-12 col-md-6">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><?= str_replace(',', '', $indo['0']->sembuh) ?>
                                    <i class="mdi mdi-emoticon-excited"></i>
                                </h1>
                                <?php
                                $p_sembuh = 100 * str_replace(',', '', $indo['0']->sembuh) / str_replace(',', '', $indo['0']->positif);
                                ?>
                                <h6 class="text-white">Sembuh <?= '( ' . round($p_sembuh, 3) . '% )' ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-sm-12 col-md-6">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><?= str_replace(',', '', $indo['0']->meninggal) ?>
                                    <i class="mdi mdi-emoticon-sad"></i>
                                </h1>
                                <?php
                                $p_meninggal = 100 * str_replace(',', '', $indo['0']->meninggal) / str_replace(',', '', $indo['0']->positif);
                                ?>
                                <h6 class="text-white">Meninggal <?= '( ' . round($p_meninggal, 3) . '% )' ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- Tabel Provinsi -->
                <div class="row">
                    <div class="col col-xs-12">
                        <h4 align="center">Data per Provinsi</h4>
                        <table id="dt_prov" class="table table table-striped table-bordered" width="100%">
                            <thead>
                                <th></th>
                                <th>Nama Provinsi</th>
                                <th>Prositf</th>
                                <th>Dirawat</th>
                                <th>Sembuh</th>
                                <th>Meninggal</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($prov as $a) {
                                    foreach ($a as $p) {
                                        $tmp_dirawat = $p->Kasus_Posi - $p->Kasus_Semb - $p->Kasus_Meni;
                                        echo "<tr>";
                                        echo "<td></td>";
                                        echo "<td>$p->Provinsi</td>";
                                        echo "<td>$p->Kasus_Posi</td>";
                                        echo "<td>$tmp_dirawat</td>";
                                        echo "<td>$p->Kasus_Semb</td>";
                                        echo "<td>$p->Kasus_Meni</td>";
                                        echo "</tr>";
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <!-- Tabel Negara -->
                <div class="row">
                    <div class="col col-xs-12">
                        <h4 align="center">Data per Negara</h4>
                        <table id="dt_global" class="table table table-striped table-bordered" width="100%">
                            <thead>
                                <th></th>
                                <th>Nama Negara</th>
                                <th>Prositf</th>
                                <th>Dirawat</th>
                                <th>Sembuh</th>
                                <th>Meninggal</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($global as $b) {
                                    foreach ($b as $q) {
                                        echo "<tr>";
                                        echo "<td></td>";
                                        echo "<td>$q->Country_Region</td>";
                                        echo "<td>$q->Active</td>";
                                        echo "<td>$q->Confirmed</td>";
                                        echo "<td>$q->Recovered</td>";
                                        echo "<td>$q->Deaths</td>";
                                        echo "</tr>";
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        Dibuat dengan sistem candi (semalam) oleh <a href="http://kakfer.id">kakfer.id</a>.
    </footer>
    <!-- All Jquery -->
    <script src="<?= base_URL() ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_URL() ?>dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="<?= base_URL() ?>dist/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_URL() ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_URL() ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_URL() ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_URL() ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_URL() ?>dist/js/waves.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_URL() ?>dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="<?= base_URL() ?>assets/libs/moment/min/moment.min.js"></script>
    <script src="<?= base_URL() ?>assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <!-- Tabel -->
    <script>
        $(document).ready(function() {
            //Provinsi
            var t = $('#dt_prov').DataTable({
                "responsive": true,
                "scrollX": true,
                "lengthChange": false,
                "searching": true,
                "paging": false,
                "bInfo": false,
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
                "order": [
                    [2, 'desc']
                ]
            });
            t.on('order.dt search.dt', function() {
                t.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
            //Global
            var u = $('#dt_global').DataTable({
                "responsive": true,
                "scrollX": true,
                "lengthChange": false,
                "searching": true,
                "paging": true,
                "bInfo": false,
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
                "order": [
                    [2, 'desc']
                ]
            });
            u.on('order.dt search.dt', function() {
                u.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Grand Noeri Hotel</title>
        <link href="<?= base_url();?>assets/dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">GrandNoeri</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= site_url('login/logout') ;?>">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="<?= site_url('dashboard');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pengunjung
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                             -->
                             <a class="nav-link" href="<?= site_url('pengunjung') ;?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Pengunjung
                            </a>

                            <a class="nav-link" href="<?= site_url('booking') ;?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Booking
                            </a>

                            <a class="nav-link" href="<?= site_url('kamar') ;?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-door-open"></i></div>
                                Kamar
                            </a>

                            <a class="nav-link" href="<?= site_url('type') ;?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Type
                            </a>

                            <a class="nav-link" href="<?= site_url('petugas');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Petugas
                            </a>

                            <a class="nav-link collapsed" href="<?= site_url('pendapatan') ;?>" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Laporan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= site_url('pendapatan') ;?>">Pendapatan</a>
                                    <a class="nav-link" href="<?= site_url('pengunjung') ;?>">Pengunjung</a>
                                    <a class="nav-link" href="<?= site_url('rekap') ;?>">Rekapitulasi</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?= $this->fungsi->user_login()->username;?>
                    </div>
                </nav>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

            <div id="layoutSidenav_content">
                <main>
                    <?php echo $contents ;?>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url();?>assets/src/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url();?>assets/src/assets/demo/chart-area-demo.js"></script>
        <script src="<?= base_url();?>assets/src/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url();?>assets/src/assets/demo/datatables-demo.js"></script>

        <script>
            var flash = $('#flash').data('flash');

            if(flash)
            {
                Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: flash
                })
            }

            $(document).on('click','#btn-hapus', function(e){
                e.preventDefault();
                var link = $(this).attr('href');

                Swal.fire({
                title: 'Apakah anda yakin ?',
                text: "Data yang anda pilih akan dihapus !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = link;        
                    }
                })
            })
        </script>

    </body>
</html>



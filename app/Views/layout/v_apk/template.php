<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title; ?></title>
    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #11009E;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SISURAT</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php
            $session = service('session');

            // Mendapatkan objek Myth\Auth\Authentication\AuthenticationInterface
            $authentication = service('authentication');

            // Model
            $m_menu = new \App\Models\M_menu();
            $m_group = new \App\Models\M_groups();
            $m_userpegawai = new \App\Models\M_userpegawai();
            $m_sub = new \App\Models\M_submenu();
            $m_akses = new \App\Models\M_akses_menu();
            $m_jenissurat = new \App\Models\M_jenis_surat();
            $m_pegawai = new \App\Models\M_pegawai();
            $m_user = new \App\Models\UserModel();

            // Memeriksa apakah pengguna sedang login
            if ($authentication->check()) {
                // Pengguna sedang login
                $user = $authentication->user();
                // Mendapatkan ID pengguna yang sedang login
                $userId = $user->id;

                // Mendapatkan menu dan data lainnya
                $menu = $m_menu->findAll();
                $group = $m_group->findAll();
                $userpegawai = $m_userpegawai->findAll();
                $sub = $m_sub->findAll();
                $aksesmenus = $m_akses->findAll();
                $jenis_surat = $m_jenissurat->findAll();
                $pegawai = $m_pegawai->findAll();

                // Menyimpan data pegawai ke dalam sesi
                $session->set('logged_in.pegawai', $pegawai);

                // Mendapatkan pegawai berdasarkan id pengguna yang sedang login
                $userPegawai = $m_userpegawai->where('id_user', $userId)->first();

                if ($userPegawai) {
                    $pegawaiId = $userPegawai['id_pegawai'];

                    // Mendapatkan data pegawai berdasarkan id
                    $pegawai = $m_pegawai->find($pegawaiId);

                    if ($pegawai) {
                        $nl = $pegawai['nama_lengkap'];
                        $pf = $pegawai['foto'];
                    } else {
                        $nl = '';
                        $pf = '';
                    }
                    // Cek nl dan pf
                    if (empty($nl) || empty($pf)) {
                        redirect()->to('login');
                        return;
                    }

                    // Looping menu
                    foreach ($menu as $m) {
                        $submenus = $m_sub->where('id_menu', $m['id_menu'])->findAll();
                        $allowedAccess = false;

                        // Cek akses menu berdasarkan t_user_pegawai
                        foreach ($submenus as $sm) {
                            $idAuthGroupUserPegawai = $userPegawai['id_auth_group'];
                            $aksesmenu = $m_akses->where('id_auth_group', $idAuthGroupUserPegawai)
                                ->where('id_menu', $m['id_menu'])
                                ->first();

                            if ($aksesmenu) {
                                $allowedAccess = true;
                                break;
                            }
                        }

                        if ($allowedAccess) {
                            if ($title == $m['menu']) {
                                echo '<li class="nav-item active">';
                            } else {
                                echo '<li class="nav-item">';
                            }

                            echo '<a class="nav-link" href="' . base_url($sm['url']) . '">';
                            echo '<i class="fas fa-fw fa-' . $sm['icon'] . '"></i>';
                            echo '<span>' . $m['menu'] . '</span>';
                            echo '<span class="badge float-right badge-danger">3</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                    }
                }
            } else {
                redirect(base_url('login'));
            }

            ?>





            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">





                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $nl ?? '' ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/'); ?><?= $pf ?? ''; ?>" width="50%">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <?PHP if (logged_in()) : ?>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                <?php else : ?>
                                    <a class="dropdown-item" href="<?= base_url('login'); ?>">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Login
                                    </a>
                                <?php endif; ?>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <?= $this->renderSection('content'); ?>


            </div>
            <!-- End of Main Content -->
            <!-- footer -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <b>Created by the internship team at Poltekgo.</b>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="<?= base_url('assets/'); ?>#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Dengan Memilih Ya Anda Akan Keluar Dari Aplikasi</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= base_url('logout'); ?>">Ya</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });



        $('.form-check-input').on('click', function() {
            const id_menu = $(this).data('menu');
            const id_level = $(this).data('level');

            $.ajax({
                url: "<?= base_url('admin/changeaccess'); ?>",
                type: 'post',
                data: {
                    id_menu: id_menu,
                    id_level: id_level
                },
                success: function() {
                    document.location.href = "<?= base_url('supermen'); ?>" + id_level;
                }
            });

        });
    </script>

</body>

</html>
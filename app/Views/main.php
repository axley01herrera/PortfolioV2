<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Axley Herrera | <?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Portfolio" name="description" />
    <meta content="Axley Herrera" name="author" />

    <!-- ICON -->
    <link rel="shortcut icon" href="<?php echo base_url('public/assets/images/app-icon.ico'); ?>">

    <!-- CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('public/assets/libs/jsvectormap/css/jsvectormap.min.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('public/assets/css/bootstrap.min.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('public/assets/css/icons.min.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('public/assets/css/app.min.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('public/assets/libs/jquery-ui/jquery-ui.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('public/assets/libs/select2/css/select2.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('public/assets/libs/sweetalert/sweetalert2.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('public/assets/libs/apexcharts/dist/apexcharts.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('public/assets/css/datatable/dataTables.bootstrap5.min.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('public/assets/libs/glightbox/css/glightbox.min.css'); ?>">

    <!-- JS -->
    <script src="<?php echo base_url('public/assets/libs/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/metismenujs/metismenujs.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/simplebar/simplebar.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/feather-icons/feather.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/jsvectormap/js/jsvectormap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/jsvectormap/maps/world-merc.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/select2/js/select2.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/imask/jquery.inputmask.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/moment/moment.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/sweetalert/sweetalert2.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/customApp.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/apexcharts/dist/apexcharts.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/datatable/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/datatable/dataTables.bootstrap5.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/glightbox/js/glightbox.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/libs/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
</head>

<body style="background-color: #f2f3fe;">
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <div class="navbar-brand-box">
                        <a href="<?php echo base_url('Main/home'); ?>?lang=<?php echo $lang; ?>" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?php echo base_url("public/assets/images/logo-sm.png"); ?>" alt="axley herrera portafolio" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo base_url("public/assets/images/logo-dark.png"); ?>" alt="axley herrera portafolio" height="22">
                            </span>
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>
                <div class="d-flex">
                    <div class="dropdown d-inline-block language-switch">
                        <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            if ($lang == "en") {
                            ?>
                                <img id="header-lang-img" src="<?php echo base_url("public/assets/images/flags/us.jpg"); ?>" alt="english" height="16">
                            <?php
                            } elseif ($lang == "es") {
                            ?>
                                <img id="header-lang-img" src="<?php echo base_url("public/assets/images/flags/spain.jpg"); ?>" alt="spanish" height="16">
                            <?php
                            }
                            ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="<?php echo $route . '?lang=en'; ?>" class="dropdown-item notify-item">
                                <img src="<?php echo base_url('public/assets/images/flags/us.jpg'); ?>" alt="english" class="me-1" height="12">
                                <span class="align-middle">
                                    <?php echo lang("Text.english"); ?>
                                </span>
                            </a>
                            <a href="<?php echo $route . '?lang=es'; ?>" class="dropdown-item notify-item">
                                <img src="<?php echo base_url("public/assets/images/flags/spain.jpg"); ?>" alt="spanish" class="me-1" height="12">
                                <span class="align-middle">
                                    <?php echo lang("Text.spanish"); ?>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="<?php echo base_url('public/assets/images/users/avatar-1.jpg'); ?>" alt="Avatar">
                            <span class="ms-2 d-none d-sm-block user-item-desc">
                                <span class="user-name">Axley Herrera</span>
                                <span class="user-sub-title"><?php echo lang('Text.developer'); ?></span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="p-3">
                                <h6 class="mb-0 text-dark"><?php echo lang('Text.contact_email'); ?></h6>
                                <a href="mailto: dev@axleyherrera.com">dev@axleyherrera.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="vertical-menu">

            <div class="navbar-brand-box">
                <a href="<?php echo base_url('Main/home'); ?>?lang=<?php echo $lang; ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo base_url("public/assets/images/logo-sm.png"); ?>" alt="axley herrera portafolio" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo base_url("public/assets/images/logo-dark.png"); ?>" alt="axley herrera portafolio" height="22">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>


            <div data-simplebar class="sidebar-menu-scroll">
                <div id="sidebar-menu">
                    <ul class="metismenu list-unstyled" id="side-menu">

                        <li class="<?php if ($active == "home") {
                                        echo "mm-active";
                                    } ?>">
                            <a href="<?php echo base_url('Main/home'); ?>?lang=<?php echo $lang; ?>">
                                <i class="icon nav-icon <?php if ($active == "home") {
                                                            echo "active";
                                                        } ?>" data-feather="home"></i>
                                <span class="menu-item">
                                    <?php echo lang("Text.home_page_title"); ?>
                                </span>
                            </a>
                        </li>

                        <li class="<?php if ($active == "contact") {
                                        echo "mm-active";
                                    } ?>">
                            <a href="<?php echo base_url('Main/contact'); ?>?lang=<?php echo $lang; ?>">
                                <i class="icon nav-icon <?php if ($active == "contact") {
                                                            echo "active";
                                                        } ?>" data-feather="edit-3"></i>
                                <span class="menu-item">
                                    <?php echo lang("Text.contact_page_title"); ?>
                                </span>
                            </a>
                        </li>

                        <li class="<?php if ($active == "projects") {
                                        echo "mm-active";
                                    } ?>">
                            <a href="<?php echo base_url('Main/projects'); ?>?lang=<?php echo $lang; ?>">
                                <i class="icon nav-icon <?php if ($active == "projects") {
                                                            echo "active";
                                                        } ?>" data-feather="briefcase"></i>
                                <span class="menu-item">
                                    <?php echo lang("Text.projects_page_title"); ?>
                                </span>
                            </a>
                        </li>

                        <li class="<?php if ($active == "certifications") {
                                        echo "mm-active";
                                    } ?>">
                            <a href="<?php echo base_url('Main/certifications'); ?>?lang=<?php echo $lang; ?>">
                                <i class="icon nav-icon <?php if ($active == "certifications") {
                                                            echo "active";
                                                        } ?>" data-feather="check-circle"></i>
                                <span class="menu-item">
                                    <?php echo lang("Text.cert_page_title"); ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="page-content">
                <?php echo view($page); ?>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('public/assets/js/app.js'); ?>"></script>
</body>

<script>
    function showAlert(icon, title, text) {
        Swal.fire({
            position: 'center',
            icon: icon,
            title: title,
            text: text,
            showConfirmButton: true,
            timer: 5000
        });
    }
</script>

</html>
<!doctype html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Calendify | Responsive Bootstrap 4 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />

    <!-- Google Tag Manager -->

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WNGH9RL');
        window.tag_manager_event = 'dashboard-free-preview';
        window.tag_manager_product = 'Calendify';
    </script>
    <!-- End Google Tag Manager -->

    <link rel="stylesheet" href="../../assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="../../assets/css/backend.css?v=1.0.1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/remixicon/fonts/remixicon.css"> <!-- Fullcalender CSS -->
    <link rel='stylesheet' href='../../assets/vendor/fullcalendar/core/main.css' />
    <link rel='stylesheet' href='../../assets/vendor/fullcalendar/daygrid/main.css' />
    <link rel='stylesheet' href='../../assets/vendor/fullcalendar/timegrid/main.css' />
    <link rel='stylesheet' href='../../assets/vendor/fullcalendar/list/main.css' />
</head>

<body class="fixed-top-navbar top-nav  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper" id="admin-vue">
        <div class="iq-top-navbar">
            <div class="container">
                <div class="iq-navbar-custom">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                            <i class="ri-menu-line wrapper-menu"></i>
                            <a href="index.php" class="header-logo">
                                <!-- <img src="../../assets/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo"> -->
                                Logo
                            </a>
                        </div>
                        <div class="iq-menu-horizontal">
                            <nav class="iq-sidebar-menu">
                                <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                                    <a href="index.php" class="header-logo">
                                        <img src="../../assets/images/image1.jpg" class="avatar-40 img-fluid rounded" alt="user">
                                    </a>
                                    <div class="iq-menu-bt-sidebar">
                                        <i class="las la-bars wrapper-menu"></i>
                                    </div>
                                </div>
                                <ul id="iq-sidebar-toggle" class="iq-menu d-flex">
                                    <li class="">
                                        <a href="index.php" class="">
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="schedule.php" class="">
                                            <span>Appointments</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                                <i class="ri-menu-3-line"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                    <li class="nav-item nav-icon dropdown ml-3 p-5">

                                    </li>
                                    <li class="caption-content">
                                        <a href="#" class="search-toggle dropdown-toggle d-flex align-items-center" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="../../assets/images/<?php echo $_SESSION['profile'] ?>" class="avatar-40 img-fluid rounded" alt="user">
                                            <div class="caption ml-3">
                                                <h6 class="mb-0 line-height"><?php echo $_SESSION['fullname'] ?></h6>
                                            </div>
                                        </a>
                                        <div class="iq-sub-dropdown dropdown-menu user-dropdown" aria-labelledby="dropdownMenuButton3">
                                            <div class="card m-0">
                                                <div class="card-body p-0">
                                                    <div class="py-3">
                                                        <a href="user-profile.php" class="iq-sub-card">
                                                            <div class="media align-items-center">
                                                                <h6>Account Settings</h6>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <a class="right-ic p-3 border-top btn-block position-relative text-center" href="../../assets/vue/logout.php" role="button">
                                                        Logout
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="py-4 border-bottom">
                            <div class="form-title text-center">
                                <h3>Scheduled Appointment</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-block card-stretch">
                                    <div class="card-body">
                                        <div id="calendar1" class="calendar-s"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="date-event" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="popup text-left">
                                <h4 class="mb-3">Add Schedule</h4>
                                <form action="/" id="submit-schedule">
                                    <div class="content create-workform row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="schedule-title">Schedule For</label>
                                                <input class="form-control" placeholder="Enter Title" type="text" name="title" id="schedule-title" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="schedule-start-date">Start Date</label>
                                                <input class="form-control basicFlatpickr date-input" placeholder="2020-06-20" type="text" name="title" id="schedule-start-date" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="schedule-end-date">End Date</label>
                                                <input class="form-control basicFlatpickr date-input" placeholder="2020-06-20" type="text" name="title" id="schedule-end-date" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" type="color" name="title" id="schedule-color" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                                <button class="btn btn-primary mr-4" data-dismiss="modal">Cancel</button>
                                                <button class="btn btn-outline-primary" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="popup text-left" id="popup">
                        <h4 class="mb-3">Add Action</h4>
                        <div class="content create-workform">
                            <div class="form-group">
                                <h6 class="form-label mb-3">Copy Your Link</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly value="calendly.com/rickoshea1234">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i class="las la-link"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h6 class="form-label mb-3">Email Your Link</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly value="calendly.com/rickoshea1234">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon3"><i class="las la-envelope"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h6 class="form-label mb-3">Add to Your Website</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly value="calendly.com/rickoshea1234">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon4"><i class="las la-code"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                    <button type="submit" data-dismiss="modal" class="btn btn-primary mr-4">Cancel</button>
                                    <button type="submit" data-dismiss="modal" class="btn btn-outline-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Wrapper End-->
    <footer class="iq-footer">
        <div class="container-fluid container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="../../backend/privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="../../backend/terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    Copyright 2021 <a href="#">Calendify</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- Backend Bundle JavaScript -->
    <script src="../../assets/js/backend-bundle.min.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="../../assets/js/customizer.js"></script>

    <!-- Fullcalender Javascript -->
    <script src='../../assets/vendor/fullcalendar/core/main.js'></script>
    <script src='../../assets/vendor/fullcalendar/daygrid/main.js'></script>
    <script src='../../assets/vendor/fullcalendar/timegrid/main.js'></script>
    <script src='../../assets/vendor/fullcalendar/list/main.js'></script>
    <script src='../../assets/vendor/fullcalendar/interaction/main.js'></script>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/vue/axios.js"></script>
    <script src="../../assets/vue/app.js"></script>
    <script src="../../assets/vue/admin.js"></script>
</body>

</html>
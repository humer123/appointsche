<!doctype html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Emission</title>
    <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">
</head>

<body class="fixed-top-navbar top-nav" id="customer-vue">
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="wrapper">
        <div class="iq-top-navbar">
            <div class="container">
                <div class="iq-navbar-custom">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                            <i class="ri-menu-line wrapper-menu"></i>
                            <a href="index.php" class="header-logo">
                                <!-- <img src="../assets/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo"> -->
                                Logo
                            </a>
                        </div>
                        <div class="iq-menu-horizontal">
                            <nav class="iq-sidebar-menu">
                                <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                                    <a href="index.php" class="header-logo">
                                        <img src="../assets/images/logo.png" class="img-fluid rounded-normal" alt="logo">
                                    </a>
                                    <div class="iq-menu-bt-sidebar">
                                        <i class="las la-bars wrapper-menu"></i>
                                    </div>
                                </div>
                                <ul id="iq-sidebar-toggle" class="iq-menu d-flex">
                                    <li class="active">
                                        <a href="index.php" class="">
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="">
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
                                            <img src="../assets/images/<?php echo $_SESSION['profile'] ?>" class="avatar-40 img-fluid rounded" alt="user">
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
                                                    <a class="right-ic p-3 border-top btn-block position-relative text-center" href="../assets/vue/logout.php" role="button">
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
            <div class="content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="navbar-breadcrumb">
                                    <h1 class="mb-1">My Dashboard</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8">
                            <ul class="d-flex nav nav-pills mb-4 text-center event-tab" id="event-pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a id="view-btn" class="nav-link active show" data-toggle="pill" href="#event1" data-extra="#search-with-button" role="tab" aria-selected="true">Vehicles Info</a>
                                </li>
                                <li class="nav-item">
                                    <a id="view-schedule" class="nav-link" data-toggle="pill" href="#event2" data-extra="#view-event" role="tab" aria-selected="false">Schedule Card</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-4 tab-extra" id="view-event">
                            <div class="float-md-right mb-4"><a href="#event1" class="btn view-btn">View Event</a></div>
                        </div>
                    </div>
                    <div class="tab-extra active" id="search-with-button">
                        <div class="iq-search-bar d-flex flex-wrap align-items-center search-device mb-4 pr-3">
                            <input class="form-control bg-white border text search-input" type="text" v-model="searchAVehicle" placeholder="Search...">
                        </div>
                        <div class="float-md-right"><a href="#event2" class="btn btn-primary border" data-toggle="modal" data-target="#addVehicle">Add Vehicle</a></div>
                    </div>
                    <!-- Add Vehicle Modal -->
                    <div class="modal fade" id="addVehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Vehicle</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form">
                                        <div class="content create-workform row">
                                            <div class="col-md-12 row">
                                                <div class="form-group col-12">
                                                    <label class="form-label" for="schedule-start-date">Series Number</label>
                                                    <input class="form-control col-12" type="text" v-model="Snumber" required />
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-label" for="schedule-start-date">Model</label>
                                                    <input class="form-control col-12" type="text" v-model="model" required />
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-label" for="schedule-start-date">Year</label>
                                                    <input class="form-control col-12" type="text" v-model="year" required />
                                                </div>
                                                <div class="form-group col-12">
                                                    <label class="form-label" for="schedule-start-date">License Plate Number</label>
                                                    <input class="form-control col-12" type="text" v-model="licPlaNum" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                                    <button class="btn btn-primary mr-4" data-dismiss="modal" id="cancel">Cancel</button>
                                                    <button class="btn btn-outline-primary" type="submit" @click="storeVehicle" onclick="document.getElementById('cancel').click()">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="event-content">
                            <div id="event1" class="tab-pane fade active show" v-if="toShowAllVehicle">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6" v-for="d of searchVehicle">
                                        <div class="card card-block card-stretch card-height">
                                            <div class="card-body rounded event-detail event-detail-danger">
                                                <div class="d-flex align-items-top justify-content-between">
                                                    <div>
                                                        <h4 class="mb-2 mr-4"><span>Series Number: </span><small>{{d.seriesNumber}}</small></h4>
                                                        <p class="mb-2 text-danger font-weight-500 text-uppercase"><span>Model: </span><small>{{d.model}}</small></p>
                                                        <p class="mb-2 text-danger font-weight-500 text-uppercase"><span>Year: </span><small>{{d.year}}</small></p>
                                                        <p class="mb-2 text-danger font-weight-500 text-uppercase"><span>License Plate Number: </span><small>{{d.licPlaNum}}</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="event1" class="tab-pane fade active show" v-else>
                                <div class="row">
                                    <div class="col-12">
                                        There is nothing is here!
                                    </div>
                                </div>
                            </div>
                            <div id="event2" class="tab-pane fade">
                                <div class="schedule-content">
                                    <div id="schedule1" class="tab-pane fade active show">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6" v-for="d of scheduleInACart">
                                                <div class="card card-block card-stretch card-height">
                                                    <div class="card-body rounded event-detail event-detail-info">
                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                            <div>
                                                                <h1 class="text-info">{{d.fullname}}</h1>
                                                                <h5 class="text-info">{{d.email}}</h5>
                                                            </div>
                                                        </div>
                                                        <h6 class="mb-1 fst-normal">OR Number: {{d.orNumber}}</h6>
                                                        <h6 class="mb-1 fst-normal">Wheel: {{d.wheel}}</h6>
                                                        <h6 class="mb-3 fst-normal">Engine Number: {{d.engineNumber}}</h6>
                                                        <p class="mb-2 text-info"><i class="fa fa-clock-o" aria-hidden="true"></i>Appointment Date:<br>{{dateToString(d.appointmentDate)}}</p>
                                                        <p class="mb-0 text-info"><i class="fa fa-car" aria-hidden="true"></i>Series Model: {{d.seriesModel}}</p>
                                                        <p class="mb-0 text-info"><i class="fa fa-car" aria-hidden="true"></i>Year Model: {{d.yearModel}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="selectedVehicle" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form">
                        <div class="content create-workform row">
                            <div class="col-md-12 row">
                                <div class="form-group col-12">
                                    <label class="form-label" for="schedule-start-date">Series Number</label>
                                    <input class="form-control col-12" v-model="updateSnumber" type="text" required />
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="schedule-start-date">Model</label>
                                    <input class="form-control col-12" v-model="updatemodel" type="text" required />
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="schedule-start-date">Year</label>
                                    <input class="form-control col-12" v-model="updateyear" type="text" required />
                                </div>
                                <div class="form-group col-12">
                                    <label class="form-label" for="schedule-start-date">License Plate Number</label>
                                    <input class="form-control col-12" v-model="updatelicPlaNum" type="text" required />
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                    <button class="btn btn-primary mr-4" data-dismiss="modal" id="cancels">Cancel</button>
                                    <button class="btn btn-outline-primary" type="submit" @click="updateVehicle(selectedVehicleId)"  onclick="document.getElementById('cancels').click()">Save</button>
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
                        <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    Copyright 2021 <a href="#">Calendify</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
    <script src="../assets/js/backend-bundle.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/vue/axios.js"></script>
    <script src="../assets/vue/app.js"></script>
    <script src="../assets/vue/customer.js"></script>
</body>

</html>
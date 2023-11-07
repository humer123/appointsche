<!doctype html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>
    <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">
</head>

<body class="fixed-top-navbar" id="customer-vue">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div id="all" v-for="u of users">
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
                                        <li class="">
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
                <div class="container-fluid container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card car-transparent">
                                <div class="card-body p-0">
                                    <div class="profile-image position-relative" style="height: 80vh;">
                                        <img :src="'../assets/images/' + u.profile" class="img-fluid rounded w-100" style="height: 80vh" alt="">
                                    </div>
                                    <div class="profile-overly">
                                        <h3>{{u.fullname}}</h3>
                                        <span>{{u.email}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <h4 class="mb-3">Personal Profile</h4>
                                    <button class="btn btn-md btn-info col-12 mb-3" @click="getUser(u.user_id)" data-toggle="modal" data-target="#updateModal">Update Details</button>
                                    <button class="btn btn-md btn-info col-12" data-toggle="modal" data-target="#changePassword">Change Password</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <span>Contacts</span>
                                    <h6 class="my-1 text-primary">{{u.status == 1 ? 'Active':'Unactive'}}</h6>
                                    <h6 class="my-1 text-primary"><small>{{u.email}}</small></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body text-center">
                                    <span>Registered Vehicle</span>
                                    <h2 class="mb-2 mt-3 text-success">{{registeredVehicle}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Update User Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update User Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form" v-for="u of selectedUser">
                            <div class="content create-workform row">
                                <div class="col-md-12 row">
                                    <div class="form-group col-12">
                                        <label class="form-label" for="schedule-start-date">Profile Picture</label><br> 
                                        <i class="fa fa-camera-retro fa-5x" aria-hidden="true" onclick="document.getElementById('updateProfile').click()"></i>
                                        <input style="visibility: hidden;" type="file" name="profile" id="updateProfile" required />
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="form-label" for="schedule-start-date">Fullname</label>
                                        <input class="form-control col-12" type="text" :value="u.fullname" id="updateFullname" required />
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <button class="btn btn-primary mr-4" data-dismiss="modal" id="cancels">Cancel</button>
                                        <button class="btn btn-outline-primary" type="submit" @click="updateUser(u.user_id)" onclick="document.getElementById('cancels').click()">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Update User Modal -->
        <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <div class="content create-workform row">
                                <div class="col-md-12 row">
                                    <div class="form-group col-12">
                                        <label class="form-label" for="schedule-start-date">Old Password</label>
                                        <input class="form-control col-12" type="password" id="oldPassword" required />
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="form-label" for="schedule-start-date">New Password</label>
                                        <input class="form-control col-12" type="password" id="newPassword" required />
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="form-label" for="schedule-start-date">Retype New Password</label>
                                        <input class="form-control col-12" type="password" id="renewPassword" required />
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <button class="btn btn-primary mr-4" data-dismiss="modal" id="cancels">Cancel</button>
                                        <button class="btn btn-outline-primary" type="submit" @click="changePassword" onclick="document.getElementById('cancels').click()">Update</button>
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
    </div>
    <script src="../assets/js/backend-bundle.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/vue/axios.js"></script>
    <script src="../assets/vue/app.js"></script>
    <script src="../assets/vue/customer.js"></script>
</body>

</html>
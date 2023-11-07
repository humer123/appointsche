<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration Account</title>

    <link rel="stylesheet" href="assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="assets/css/backend.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/remixicon/fonts/remixicon.css">
</head>

<body class=" ">
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>

    <div class="wrapper" id="authentication-vue">
        <section class="login-content">
            <div class="container h-100">
                <div class="row justify-content-center align-items-center height-self-center">
                    <div class="col-md-5 col-sm-12 col-12 align-self-center">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2>Sign Up</h2>
                                <p>Create your emission account.</p>
                                <div class="form">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" v-model="fullname" type="text" required />
                                                <label class="form-label" for="fullname">Full Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" v-model="lastname" type="text" required />
                                                <label class="form-label" for="lastname">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="floating-input form-group">
                                                <input class="form-control" v-model="email" type="text" required />
                                                <label class="form-label" for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" type="password" v-model="password" required />
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" type="password" v-model="confirmPassword" required />
                                                <label class="form-label" for="password1">Confirm Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" @click="register" class="btn btn-primary">Sign Up</button>
                                    <p class="mt-3">
                                        Already have an Account <a href="login.php" class="text-primary">Sign In</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="assets/js/backend-bundle.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/vue/axios.js"></script>
    <script src="assets/vue/app.js"></script>
    <script src="assets/vue/authentication.js"></script>

</body>

</html>
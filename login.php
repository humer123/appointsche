<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Account</title>
    <link rel="stylesheet" href="assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="assets/css/backend.css?v=1.0.1">
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
                                <h2>Log In Account</h2>
                                <p>Login to stay connected.</p>
                                <div class="form">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="floating-input form-group">
                                                <input class="form-control" type="text" v-model="email" id="email" required />
                                                <label class="form-label" for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="floating-input form-group">
                                                <input class="form-control" type="password" v-model="password" id="password" required />
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" @click="login" class="btn btn-primary">Sign In</button>
                                    <p class="mt-3">
                                        Create an Account <a href="register.php" class="text-primary">Sign Up</a>
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
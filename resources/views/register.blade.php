<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Feb 2021 17:19:04 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Register | Nilai University</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="bg-primary bg-soft">
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="text-primary p-4">
                                                <h5 class="text-primary">Welcome Back !</h5>
                                                <p>Sign in to continue</p>
                                            </div>
                                        </div>
                                        <div class="col-5 align-self-end">
                                            <img src="/nilai-university.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">

                                <div class="p-2">
                                    @include('admin.includes.message')
                                    <form action="/register-action" method="POST" class="needs-validation" novalidate action="https://themesbrand.com/skote/layouts/index.html">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="username" placeholder="Enter username" required>
                                            <div class="invalid-feedback">
                                                Please First Name
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" id="username" placeholder="Enter username" required>
                                            <div class="invalid-feedback">
                                                Please Last Name
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Privilege </label>
                                            <select class="form-select" name="user_role">
                                                <option value="Teacher">Teacher</option>
                                                <option value="Student">Student</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please Select Privillage
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">ID</label>
                                            <input type="text" class="form-control" name="email" id="useremail" placeholder="Enter Your ID" required>
                                            <div class="invalid-feedback">
                                                Please Enter Email
                                            </div>
                                        </div>



                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password" required>
                                            <div class="invalid-feedback">
                                                Please Enter Password
                                            </div>
                                        </div>

                                        <div class="mt-4 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                        </div>



                                        <div class="mt-4 text-center">
                                            <p class="mb-0">By registering you agree to the Skote <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            <div>
                                <p>Already have an account ? <a href="/login" class="fw-medium text-primary"> Login</a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> Nilai University. Crafted with <i class="mdi mdi-heart text-danger"></i></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>

        <!-- validation init -->
        <script src="/assets/js/pages/validation.init.js"></script>

        <!-- App js -->
        <script src="/assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Feb 2021 17:19:04 GMT -->
</html>

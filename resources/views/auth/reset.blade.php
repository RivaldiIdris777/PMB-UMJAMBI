<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('') }}favicon.ico" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('') }}rocker_admin/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ asset('') }}rocker_admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css"
        rel="stylesheet" />
    <link href="{{ asset('') }}rocker_admin/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('') }}rocker_admin/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{ asset('') }}rocker_admin/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('') }}rocker_admin/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}rocker_admin/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('') }}rocker_admin/assets/css/app.css" rel="stylesheet">
    <link href="{{ asset('') }}rocker_admin/assets/css/icons.css" rel="stylesheet">
    <title>Send Reset Password - Universitas Muhammadiyah Kota Jambi</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <header class="login-header shadow">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded fixed-top rounded-0 shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('') }}logo_um.png" width="40" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                        aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </header>
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-4">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="{{ asset('') }}logo_pmb.png" width="180" alt="" />
                        </div>
                        <div class="card mt-5 mt-lg-0">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center"> <span>KIRIM RESET PASSWORD</span>
                                        <hr />
                                        @if ($message = Session::get('Success'))
                                        <div
                                            class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-3 p-2">
                                                    <div class="text-white">{{ $message }}</div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            @endif
                                        </div>
                                        <div class="form-body">
                                            <form class="row g-3" method="POST" action="{{ route('reset.send') }}">
                                                @csrf
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Alamat
                                                        Email</label>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="inputEmailAddress" placeholder="Masukkan Email" name="email"
                                                        value="{{ old('email') }}" required autocomplete="email"
                                                        autofocus>
                                                    @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="bx bxs-lock-open"></i>Kirim Reset
                                                            Password</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> <a href="{{ route('login') }}">Kembali Ke
                                                        Login</a>
                                                </div>
                                                <div class="col-md-6 text-end"><a href="{{ route('register') }}">Daftar
                                                        / Register</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
        <footer class="bg-white shadow-sm border-top p-2 text-center fixed-bottom">
            <p class="mb-0">CopyLeft 2023. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="{{ asset('') }}rocker_admin/assets/js/jquery.min.js"></script>
    <script src="{{ asset('') }}rocker_admin/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{ asset('') }}rocker_admin/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{ asset('') }}rocker_admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });

    </script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
</body>

</html>

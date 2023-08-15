<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aktivasi Akun</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!---Custom CSS File--->
    <style>
        /* Import Google font - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            width: 100%;
            background: #009579;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 430px;
            width: 100%;
            background: #fff;
            border-radius: 7px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }

        .container .registration {
            display: none;
        }

        #check:checked~.registration {
            display: block;
        }

        #check:checked~.login {
            display: none;
        }

        #check {
            display: none;
        }

        .container .form {
            padding: 2rem;
        }

        .form header {
            font-size: 2rem;
            font-weight: 500;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form input {
            height: 60px;
            width: 100%;
            padding: 0 15px;
            font-size: 17px;
            margin-bottom: 1.3rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
        }

        .form input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
        }

        .form a {
            font-size: 16px;
            color: #009579;
            text-decoration: none;
        }

        .form a:hover {
            text-decoration: underline;
        }

        .form input.button {
            color: #fff;
            background: #009579;
            font-size: 1.2rem;
            font-weight: 500;
            letter-spacing: 1px;
            margin-top: 1.7rem;
            cursor: pointer;
            transition: 0.4s;
        }

        .form input.button:hover {
            background: #006653;
        }

        .signup {
            font-size: 17px;
            text-align: center;
        }

        .signup label {
            color: #009579;
            cursor: pointer;
        }

        .signup label:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <div class="container">
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
            <?php echo csrf_field(); ?>
        </form>
        <div class="login form">
            <header>Verifikasi Email</header>
            <?php if(session('resent')): ?>
                <script type='text/javascript'>
                    swal({
                        title: "Berhasil",
                        text: "Link aktivasi telah dikirimkan ke email <?php echo e(auth()->user()->email); ?>",
                        type: "success"
                    }).then(function() {
                        event.preventDefault();
                        document.getElementById('logout-form').submit();
                    });
                </script>
            <?php endif; ?>
            Sebelum melanjutkan, periksa email Anda untuk link aktivasi. Setelah Melakukan Aktivasi Silahkan Kembali Ke Halaman Login.
            <a href="<?php echo e(route('login')); ?>" class="button">Kembali Ke Halaman Login</a>
            <!-- <form class="d-inline" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                <?php echo csrf_field(); ?>
                <input type="submit" class="button" value="Kembali Ke Halaman Login">
            </form> -->
        </div>
    </div>
</body>

</html>
<?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/auth/verify.blade.php ENDPATH**/ ?>
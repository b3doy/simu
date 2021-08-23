<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/bootstrap-utilities.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/font-awesome/css/font-awesome.min.css">

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <title>SIMU-1.0</title>

</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand">SIMU-1.0</a>
            <form class="d-flex">
                <a class="navbar-brand nav-link" href="<?= base_url(); ?>/login">Login</a>
            </form>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="jumbotron text-center mt-5" style="width:100%; margin-left:25%;">
                    <img src="<?= base_url(); ?>/public/assets/img/mbz.png" alt="" style="width: 100%;" class="mb-5">
                    <h5>Sistem Informasi - SIMU ver 1.0</h5>
                    <h4>Silahkan Login Untuk Melanjutkan</h4>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>/public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/jquery.maskMoney.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/jquery.mask.min.js"></script>
</body>

</html>
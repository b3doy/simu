<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <!-- MAIN CONTENT-->
            <div class="jumbotron text-center" style="width:100%;">
                <h1>
                    <?php

                    $user = user()->username;

                    date_default_timezone_set("Asia/Jakarta");

                    $b = time();
                    $hour = date("G", $b);

                    if ($hour >= 0 && $hour <= 11) {
                        echo "Selamat Pagi " . $user;
                    } elseif ($hour >= 12 && $hour <= 14) {
                        echo "Selamat Siang " . $user;;
                    } elseif ($hour >= 15 && $hour <= 17) {
                        echo "Selamat Sore " . $user;;
                    } elseif ($hour >= 17 && $hour <= 18) {
                        echo "Selamat Petang " . $user;;
                    } elseif ($hour >= 19 && $hour <= 23) {
                        echo "Selamat Malam " . $user;;
                    }

                    ?>
                </h1>
                <hr>
                <h2 class="mt-5">Selamat Datang di SIMU-1.0</h2>
                <br>
                <h5 class="my-5">Silahkan Pilih Menu Untuk Melanjutkan</h5>
                <br>
                <h6>Semoga Pekerjaan Anda Menyenangkan.</h6>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div style="font-size: 10px; width:50%; margin-left:45%; margin-top:10%">
                        <!-- <p>Copyright © 2020 </p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->

<?= $this->endSection(); ?>
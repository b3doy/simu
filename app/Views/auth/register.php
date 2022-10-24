<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            <div class="card">
                <h2 class="card-header"><?= lang('Auth.register') ?></h2>
                <div class="card-body">

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= base_url('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-group mb-3">
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                            <small class="form-text text-muted">Password harus terdiri dari huruf besar, huruf kecil, dan angka</small>
                        </div>

                        <div class="form-group">
                            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary"><?= lang('Auth.register') ?></button>
                        <a href="<?= base_url('users'); ?>" class="btn btn-secondary">Batal</a>
                    </form>


                    <hr>

                    <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= base_url('/login') ?>"><?= lang('Auth.signIn') ?></a></p>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7 mt-8">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <div class="card">
                        <h2 class="card-header"><?= lang('Auth.forgotPassword') ?></h2>
                        <div class="card-body">

                            <?= view('App\Views\Auth\_message_block') ?>

                            <p><?= lang('Auth.enterEmailForInstructions') ?></p>

                            <form action="<?= url_to('forgot') ?>" method="post">
                                <?= csrf_field() ?>

                                <div class="form-group">
                                    <label for="email"><?= lang('Auth.emailAddress') ?></label>
                                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.email') ?>
                                    </div>
                                </div>

                                <br>

                                <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.sendInstructions') ?></button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
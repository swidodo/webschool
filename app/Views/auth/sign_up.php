<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link href="<?= base_url('css/styles.css');?>" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <!-- Social registration form-->
                                <div class="card my-5">
                                    <div class="card-body p-5 text-center">
                                        <div class="h3 fw-light mb-3">Create an Account</div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body p-5">
                                        <!-- Login form-->
										<?= view('Myth\Auth\Views\_message_block') ?>
										<form role="form" action="<?= url_to('register') ?>" method="post">
                                            <!-- Form Group (email address)-->
                                            <div class="mb-3">
                                                <label class="text-gray-600 small" for="emailExample">Email address</label>
                                                <input class="form-control form-control-solid <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" value="<?= old('email') ?>" type="text" name="email" placeholder="" aria-label="Email Address" aria-describedby="emailExample" autocomplate="off"/>
                                            </div>
                                            <div class="mb-3">
												<label class="form-label"><?=lang('Auth.username')?></label>
												<input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username"  value="<?= old('username') ?>" autocomplate="off">
											</div>
                                            <!-- Form Row-->
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <!-- Form Group (choose password)-->
                                                    <div class="mb-3">
                                                        <label class="text-gray-600 small" for="passwordExample"><?=lang('Auth.password')?></label>
                                                        <input class="form-control form-control-solid <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" type="password" name="password" placeholder="" aria-label="Password" aria-describedby="passwordExample" autocomplate="off"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Form Group (confirm password)-->
                                                    <div class="mb-3">
                                                        <label class="text-gray-600 small" for="confirmPasswordExample"><?=lang('Auth.repeatPassword')?></label>
                                                        <input class="form-control form-control-solid <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" type="password" name="pass_confirm" placeholder="" aria-label="Confirm Password" aria-describedby="confirmPasswordExample"  autocomplate="off"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Form Group (form submission)-->
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="form-check">
                                                    <input class="form-check-input" id="checkTerms" type="checkbox" value="" />
                                                    <label class="form-check-label" for="checkTerms">
                                                        I accept the
                                                        <a href="#!">terms &amp; conditions</a>
                                                        .
                                                    </label>
                                                </div>
                                                <button class="btn btn-primary" type="submit"><?=lang('Auth.register')?></button>
                                            </div>
                                        </form>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body px-5 py-4">
                                        <div class="small text-center">
                                            <p><?=lang('Auth.alreadyRegistered')?> <a href="<?= url_to('login') ?>"><?=lang('Auth.signIn')?></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

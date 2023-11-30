<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="<?= base_url('assets/css/styles.css');?>" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon.png');?>" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color :#cfd8dc">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <!-- Basic login form-->
                                <div class="card shadow-sm border-0 rounded-lg mt-5">
                                    <div class="card-header d-flex justify-content-center"><h3 class="fw-light fw-bold my-4">LOGIN</h3></div>
										<div class="card-body" style="background-color : #F8F8F9;">
											<?= view('Myth\Auth\Views\_message_block') ?>
											<form action="<?= url_to('login') ?>" method="post">
										<?= csrf_field() ?>
										<?php if ($config->validFields === ['email']): ?>
											<div class="form-group">
												<label for="login"><?=lang('Auth.email')?></label>
												<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
													name="login" placeholder="<?=lang('Auth.email')?>">
												<div class="invalid-feedback">
													<?= session('errors.login') ?>
												</div>
											</div>
										<?php else: ?>
											<div class="form-group">
												<label for="login"><?=lang('Auth.emailOrUsername')?></label>
												<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
													name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
												<div class="invalid-feedback">
													<?= session('errors.login') ?>
												</div>
											</div>
										<?php endif; ?>
											<div class="form-group">
												<label for="password"><?=lang('Auth.password')?></label>
												<input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
												<div class="invalid-feedback">
													<?= session('errors.password') ?>
												</div>
											</div>
										<?php if ($config->allowRemembering): ?>
										<div class="form-check">
											<label class="form-check-label">
												<input type="hidden" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
												<?=lang('Auth.rememberMe')?>
											</label>
										</div>
										<?php endif; ?>
										<br>
										<div class="row d-flex justify-content-center">
											<button type="submit" class="btn btn-primary btn-block col-md-5 rounded-pill"><?=lang('Auth.loginAction')?></button>
										</div>
									</form>
									
									</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assetst/js/scripts.js');?>"></script>
    </body>
</html>
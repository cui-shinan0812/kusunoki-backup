<!-- section -->
<div class="section">
    <div class="container">
        <div class="col-md-8">
            <div class="billing-details">
                <div class="section-title">
                    <h4><?php echo e(__('Login'), false); ?></h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login'), false); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right"><?php echo e(__('E-Mail Address'), false); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email'), false); ?>" required autocomplete="email" autofocus>

                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message, false); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Password'), false); ?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="current-password">

                                <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message, false); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : '', false); ?>>

                                    <label class="form-check-label" for="remember">
                                        <?php echo e(__('Remember Me'), false); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="primary-btn">
                                    <?php echo e(__('Login'), false); ?>

                                </button>

                                <?php if(Route::has('password.request')): ?>
                                <a href="<?php echo e(route('password.request'), false); ?>">
                                    <?php echo e(__('Forgot Your Password?'), false); ?>

                                </a>
                                <?php endif; ?>

                            </div>
                            <div class="pull-right">
                            <?php if(Route::has('register')): ?>
                            <button type="submit" class="main-btn">
                                <a href="<?php echo e(route('register'), false); ?>"><?php echo e(__('Register'), false); ?></a>
                            </button>
                            <?php endif; ?>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /var/www/html/kusunoki/resources/views/common/login.blade.php ENDPATH**/ ?>
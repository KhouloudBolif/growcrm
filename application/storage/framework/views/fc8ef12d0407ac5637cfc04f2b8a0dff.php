<div class="splash-image" id="updatePasswordSplash">
    <img src="<?php echo e(url('/')); ?>/public/images/authentication-update-password.png" alt="404 - Not found" />
</div>

<div class="form-group row">
    <div class="col-sm-12">
        <input type="password" class="form-control" id="password" name="password"
            placeholder="<?php echo e(cleanLang(__('lang.password'))); ?>">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-12">
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
            placeholder="<?php echo e(cleanLang(__('lang.confirm_password'))); ?>">
    </div>
</div>

<div class="alert alert-info">
    <h5 class="text-info"><i class="sl-icon-info"></i> <?php echo app('translator')->get('lang.info'); ?></h5><?php echo app('translator')->get('lang.update_tenant_passwod_info'); ?>
</div><?php /**PATH C:\xampp\htdocs\application\resources\views/landlord/customers/modal/update-password.blade.php ENDPATH**/ ?>
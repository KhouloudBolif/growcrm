
<?php $__env->startSection('account-page'); ?>
<div class="account-wrapper">

    <!--PAYPAL JS (note: this needs to preload here, instead of paypla.blade.php)-->
    <?php if($landlord_settings->settings_paypal_status == 'enabled'): ?>
    <?php if($landlord_settings->settings_paypal_mode == 'live'): ?>
    <script
        src="https://www.paypal.com/sdk/js?client-id=<?php echo e($landlord_settings->settings_paypal_live_client_id ?? ''); ?>&vault=true&intent=subscription">
    </script>
    <?php else: ?>
    <script
        src="https://www.paypal.com/sdk/js?client-id=<?php echo e($landlord_settings->settings_paypal_sandbox_client_id ?? ''); ?>&vault=true&intent=subscription">
    </script>
    <?php endif; ?>
    <?php endif; ?>

    <!--RAZORPAY JS (note: this needs to preload here, instead of razorpay.blade.php)-->
    <?php if($landlord_settings->settings_razorpay_status == 'enabled'): ?>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <?php endif; ?>

    <!--GENERAL CHECKOUT JS-->
    <script src="public/js/landlord/frontend/checkout.js?v=<?php echo e(config('system.versioning')); ?>"></script>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4><?php echo app('translator')->get('lang.make_a_payment'); ?></h4>
                    <div class="line m-t-10"></div>
                    <table class="table no-border">
                        <tbody>
                            <!--plan name-->
                            <tr>
                                <td><?php echo app('translator')->get('lang.plan'); ?></td>
                                <td class="font-medium w-30">
                                    <?php echo e($package->package_name); ?></td>
                            </tr>

                            <!--status-->
                            <tr>
                                <td><?php echo app('translator')->get('lang.status'); ?></td>
                                <td class="font-medium"><span
                                        class="label <?php echo e(runtimeSubscriptionStatusColors($subscription->subscription_status)); ?>"><?php echo e(runtimeSubscriptionStatusLang($subscription->subscription_status)); ?></span>
                                </td>
                            </tr>

                            <!--billing cycle-->
                            <tr>
                                <td><?php echo app('translator')->get('lang.billing_cycle'); ?></td>
                                <td class="font-medium w-30 text-ucw">
                                    <?php echo e($subscription->subscription_gateway_billing_cycle); ?></td>
                            </tr>

                            <!--amount-->
                            <tr>
                                <td><?php echo app('translator')->get('lang.amount'); ?></td>
                                <td class="font-medium w-30">
                                    <?php echo e(runtimeMoneyFormatSaaS($subscription->subscription_amount)); ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <!--ONLINE PAYMENTS - INFO-->
                    <?php if($subscription->subscription_payment_method == 'automatic'): ?>
                    <div class="alert alert-info"><?php echo app('translator')->get('lang.payment_required_to_activate_account'); ?></div>
                    <?php endif; ?>

                    <!--MANUAL PAYMENTS - INFO-->
                    <?php if($subscription->subscription_payment_method == 'offline'): ?>
                    <div id="online-payment-form">
                        <div class="alert alert-info">
                            <?php echo _clean($landlord_settings->settings_offline_payments_details); ?>

                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="line"></div>




                    <!--ONLINE PAYMENTS FORMS-->
                    <?php if($subscription->subscription_payment_method == 'automatic'): ?>
                    <div id="online-payment-form">
                        <!--select a payment method-->
                        <div class="div row justify-content-end" id="payment_now_selector_container" data-url=""
                            data-base-url="<?php echo e(url('settings/account/'.$subscription->subscription_uniqueid.'/pay/')); ?>"
                            data-type="form" data-form-id="payment_now_selector_container" data-ajax-type="post"
                            data-loading-target="none">
                            <div class="col-sm-12 col-lg-4">
                                <div class="div-checkout-buttons-selector">
                                    <!--item-->
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <select class="select2-basic form-control" id="payment_now_method_selector"
                                                name="payment_now_method_selector"
                                                data-placeholder="<?php echo app('translator')->get('lang.select_payment_method'); ?>">
                                                <option></option>
                                                <!--stripe-->
                                                <?php if($landlord_settings->settings_stripe_status == 'enabled'): ?>
                                                <option value="stripe">
                                                    <?php echo e($landlord_settings->settings_stripe_display_name); ?>

                                                </option>
                                                <?php endif; ?>
                                                <!--stripe-->
                                                <?php if($landlord_settings->settings_paypal_status == 'enabled'): ?>
                                                <option value="paypal">
                                                    <?php echo e($landlord_settings->settings_paypal_display_name); ?>

                                                </option>
                                                <?php endif; ?>
                                                <!--paystack-->
                                                <?php if($landlord_settings->settings_paystack_status == 'enabled'): ?>
                                                <option value="paystack">
                                                    <?php echo e($landlord_settings->settings_paystack_display_name); ?>

                                                </option>
                                                <?php endif; ?>
                                                <!--razorpay-->
                                                <?php if($landlord_settings->settings_razorpay_status == 'enabled'): ?>
                                                <option value="razorpay">
                                                    <?php echo e($landlord_settings->settings_razorpay_display_name); ?>

                                                </option>
                                                <?php endif; ?>
                                                <!--offline payments (also show it here)-->
                                                <?php if($landlord_settings->settings_offline_payments_status == 'enabled'): ?>
                                                <option value="offline">
                                                    <?php echo e($landlord_settings->settings_offline_payments_display_name); ?>

                                                </option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--dynamic payment buttons-->
                        <div>
                            <div class="div row justify-content-end">
                                <div class="col-sm-12 col-lg-4">
                                    <div class="div-checkout-buttons-container text-right"
                                        id="payment_now_buttons_container">
                                        <!--place holder button-->
                                        <button type="button" class="btn waves-effect waves-light btn-block btn-default"
                                            id="payment_now_placeholder_button" disabled><?php echo app('translator')->get('lang.pay_now'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('account.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\application\resources\views/account/notices/new-payment.blade.php ENDPATH**/ ?>
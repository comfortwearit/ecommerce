

<?php $__env->startSection('content'); ?>

<div class="col-lg-7 mx-auto">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6"><?php echo e(translate('Role Information')); ?></h5>
        </div>
        <form action="<?php echo e(route('roles.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-3 col-from-label" for="name"><?php echo e(translate('Name')); ?></label>
                    <div class="col-md-9">
                        <input type="text" placeholder="<?php echo e(translate('Name')); ?>" id="name" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Permissions')); ?></h5>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-md-2 col-from-label"></label>
                    <div class="col-md-8">
                        <?php if(addon_is_activated('pos_system')): ?>
                          <div class="row">
                              <div class="col-md-10">
                                  <label class="col-from-label"><?php echo e(translate('POS System')); ?></label>
                              </div>
                              <div class="col-md-2">
                                  <label class="aiz-switch aiz-switch-success mb-0">
                                      <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="1">
                                      <span class="slider round"></span>
                                  </label>
                              </div>
                          </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Products')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="2">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('All Orders')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="3">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Inhouse orders')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="4">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Seller Orders')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="5">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Pick-up Point Order')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="6">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <?php if(addon_is_activated('refund_request')): ?>
                          <div class="row">
                              <div class="col-md-10">
                                  <label class="col-from-label"><?php echo e(translate('Refunds')); ?></label>
                              </div>
                              <div class="col-md-2">
                                  <label class="aiz-switch aiz-switch-success mb-0">
                                      <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="7">
                                      <span class="slider round"></span>
                                  </label>
                              </div>
                          </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Customers')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="8">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Sellers')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="9">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Reports')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="10">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Marketing')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="11">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Support')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="12">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Website Setup')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="13">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Setup & Configurations')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="14">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <?php if(addon_is_activated('affiliate_system')): ?>
                          <div class="row">
                              <div class="col-md-10">
                                  <label class="col-from-label"><?php echo e(translate('Affiliate System')); ?></label>
                              </div>
                              <div class="col-md-2">
                                  <label class="aiz-switch aiz-switch-success mb-0">
                                      <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="15">
                                      <span class="slider round"></span>
                                  </label>
                              </div>
                          </div>
                        <?php endif; ?>
                        <?php if(addon_is_activated('offline_payment')): ?>
                          <div class="row">
                              <div class="col-md-10">
                                  <label class="col-from-label"><?php echo e(translate('Offline Payment System')); ?></label>
                              </div>
                              <div class="col-md-2">
                                  <label class="aiz-switch aiz-switch-success mb-0">
                                      <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="16">
                                      <span class="slider round"></span>
                                  </label>
                              </div>
                          </div>
                        <?php endif; ?>
                        <?php if(addon_is_activated('paytm')): ?>
                          <div class="row">
                              <div class="col-md-10">
                                  <label class="col-from-label"><?php echo e(translate('Paytm Payment Gateway')); ?></label>
                              </div>
                              <div class="col-md-2">
                                  <label class="aiz-switch aiz-switch-success mb-0">
                                      <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="17">
                                      <span class="slider round"></span>
                                  </label>
                              </div>
                          </div>
                        <?php endif; ?>
                        <?php if(addon_is_activated('club_point')): ?>
                          <div class="row">
                              <div class="col-md-10">
                                  <label class="col-from-label"><?php echo e(translate('Club Point System')); ?></label>
                              </div>
                              <div class="col-md-2">
                                  <label class="aiz-switch aiz-switch-success mb-0">
                                      <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="18">
                                      <span class="slider round"></span>
                                  </label>
                              </div>
                          </div>
                        <?php endif; ?>
                        <?php if(addon_is_activated('otp_system')): ?>
                          <div class="row">
                              <div class="col-md-10">
                                  <label class="col-from-label"><?php echo e(translate('OTP System')); ?></label>
                              </div>
                              <div class="col-md-2">
                                  <label class="aiz-switch aiz-switch-success mb-0">
                                      <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="19">
                                      <span class="slider round"></span>
                                  </label>
                              </div>
                          </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Staffs')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="20">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Addon Manager')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="21">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Uploaded Files')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="22">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('Blog System')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="23">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label class="col-from-label"><?php echo e(translate('System')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="24">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                </div>
            </div>
        </from>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My Work\Website\public_html\resources\views/backend/staff/staff_roles/create.blade.php ENDPATH**/ ?>
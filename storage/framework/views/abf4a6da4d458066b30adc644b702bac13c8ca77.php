

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('SMS Templates')); ?></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                <?php $__currentLoopData = $sms_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sms_template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="nav-link <?php if($sms_template->id == 1): ?> active <?php endif; ?>" id="v-pills-tab-2" data-toggle="pill" href="#v-pills-<?php echo e($sms_template->id); ?>" role="tab" aria-controls="v-pills-profile" aria-selected="false"><?php echo e(translate(ucwords(str_replace('_', ' ', $sms_template->identifier)))); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <?php $__currentLoopData = $sms_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sms_template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade show <?php if($sms_template->id == 1): ?> active <?php endif; ?>" id="v-pills-<?php echo e($sms_template->id); ?>" role="tabpanel" aria-labelledby="v-pills-tab-1">
                                        <form action="<?php echo e(route('sms-templates.update', $sms_template->id)); ?>" method="POST">
                                            <input name="_method" type="hidden" value="PATCH">
                                            <?php echo csrf_field(); ?>
                                            <?php if($sms_template->identifier != 'phone_number_verification' && $sms_template->identifier != 'password_reset'): ?>
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="col-from-label"><?php echo e(translate('Activation')); ?></label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label class="aiz-switch aiz-switch-success mb-0">
                                                            <input value="1" name="status" type="checkbox" <?php if($sms_template->status == 1): ?>
                                                                checked
                                                            <?php endif; ?>>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"><?php echo e(translate('SMS Body')); ?></label>
                                                <div class="col-md-10">
                                                    <textarea name="body" class="form-control" placeholder="Type.." rows="6" required><?php echo e($sms_template->sms_body); ?></textarea>
                                                    <small class="form-text text-danger"><?php echo e(('**N.B : Do Not Change The Variables Like [[ ____ ]].**')); ?></small>
                                                    <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="form-text text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label"><?php echo e(translate('Template ID')); ?></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="template_id" value="<?php echo e($sms_template->template_id); ?>" class="form-control" placeholder="<?php echo e(translate('Template Id')); ?>">
                                                    <small class="form-text text-danger"><?php echo e(('**N.B : Template ID is Required Only for Fast2SMS DLT Manual**')); ?></small>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 text-right">
                                                <button type="submit" class="btn btn-primary"><?php echo e(translate('Update Settings')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My Work\Website\public_html\resources\views/otp_systems/configurations/sms_templates.blade.php ENDPATH**/ ?>
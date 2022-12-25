

<?php $__env->startSection('content'); ?>

<div class="card">
    <form class="" action="" method="GET">
      <div class="card-header row gutters-5">
        <div class="col text-center text-md-left">
          <h5 class="mb-md-0 h6"><?php echo e(translate('Pickup Point Orders')); ?></h5>
        </div>
        <div class="col-lg-2">
            <div class="form-group mb-0">
                <input type="text" class="aiz-date-range form-control" value="<?php echo e($date); ?>" name="date" placeholder="<?php echo e(translate('Filter by date')); ?>" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group mb-0">
            <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type Order code & hit Enter')); ?>">
          </div>
        </div>
        <div class="col-auto">
          <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary"><?php echo e(translate('Filter')); ?></button>
          </div>
        </div>
      </div>
  </form>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th><?php echo e(translate('Order Code')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Num. of Products')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Customer')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Amount')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Delivery Status')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Payment Method')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Payment Status')); ?></th>
                    <th class="text-right" width="15%"><?php echo e(translate('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $order = \App\Models\Order::find($order_id->id);
                    ?>
                    <?php if($order != null): ?>
                        <tr>
                            <td>
                                <?php echo e(($key+1) + ($orders->currentPage() - 1)*$orders->perPage()); ?>

                            </td>
                            <td>
                                <?php echo e($order->code); ?> <?php if($order->viewed == 0): ?> <span class="badge badge-inline badge-info"><?php echo e(translate('New')); ?></span> <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e(count($order->orderDetails)); ?>

                            </td>
                            <td>
                                <?php if($order->user_id != null): ?>
                                    <?php echo e($order->user->name); ?>

                                <?php else: ?>
                                    Guest (<?php echo e($order->guest_id); ?>)
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e(single_price($order->orderDetails->sum('price') + $order->orderDetails->sum('tax'))); ?>

                            </td>
                            <td>
                                <?php
                                    $status = $order->orderDetails->first()->delivery_status;
                                ?>
                                <?php echo e(translate(ucfirst(str_replace('_', ' ', $status)))); ?>

                            </td>
                            <td>
                                <?php echo e(translate(ucfirst(str_replace('_', ' ', $order->payment_type)))); ?>

                            </td>
                            <td>
                                <span class="badge badge--2 mr-4">
                                    <?php if($order->orderDetails->first()->payment_status == 'paid'): ?>
                                        <i class="bg-green"></i> <?php echo e(translate('Paid')); ?>

                                    <?php else: ?>
                                        <i class="bg-red"></i> <?php echo e(translate('Unpaid')); ?>

                                    <?php endif; ?>
                                </span>
                            </td>
                            <td class="text-right">
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('pick_up_point.order_show', encrypt($order->id))); ?>" title="<?php echo e(translate('View')); ?>">
                                    <i class="las la-eye"></i>
                                </a>
                                <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="<?php echo e(route('invoice.download', $order->id)); ?>" title="<?php echo e(translate('Download Invoice')); ?>">
                                    <i class="las la-download"></i>
                                </a>
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('orders.destroy', $order->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
                                    <i class="las la-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="aiz-pagination">
            <?php echo e($orders->links()); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/comfortwear/web/comfortwearbd.com/public_html/resources/views/backend/sales/pickup_point_orders/index.blade.php ENDPATH**/ ?>
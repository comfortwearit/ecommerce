<div class="aiz-user-sidenav-wrap position-relative z-1 shadow-sm">
    <div class="aiz-user-sidenav rounded overflow-auto c-scrollbar-light pb-5 pb-xl-0">
        <div class="p-4 text-xl-center mb-4 border-bottom bg-primary text-white position-relative">
            <span class="avatar avatar-md mb-3">
                <?php if(Auth::user()->avatar_original != null): ?>
                    <img src="<?php echo e(uploaded_asset(Auth::user()->avatar_original)); ?>" onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/avatar-place.png')); ?>';">
                <?php else: ?>
                    <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>" class="image rounded-circle" onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/avatar-place.png')); ?>';">
                <?php endif; ?>
            </span>
            <h4 class="h5 fs-16 mb-1 fw-600"><?php echo e(Auth::user()->name); ?></h4>
            <?php if(Auth::user()->phone != null): ?>
                <div class="text-truncate opacity-60"><?php echo e(Auth::user()->phone); ?></div>
            <?php else: ?>
                <div class="text-truncate opacity-60"><?php echo e(Auth::user()->email); ?></div>
            <?php endif; ?>
        </div>

        <div class="sidemnenu mb-3">
            <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">

                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('dashboard')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['dashboard'])); ?>">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Dashboard')); ?></span>
                    </a>
                </li>

                <?php if(Auth::user()->user_type == 'delivery_boy'): ?>
                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('assigned-deliveries')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['completed-delivery'])); ?>">
                            <i class="las la-hourglass-half aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                <?php echo e(translate('Assigned Delivery')); ?>

                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('pickup-deliveries')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['completed-delivery'])); ?>">
                            <i class="las la-luggage-cart aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                <?php echo e(translate('Pickup Delivery')); ?>

                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('on-the-way-deliveries')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['completed-delivery'])); ?>">
                            <i class="las la-running aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                <?php echo e(translate('On The Way Delivery')); ?>

                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('completed-deliveries')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['completed-delivery'])); ?>">
                            <i class="las la-check-circle aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                <?php echo e(translate('Completed Delivery')); ?>

                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('pending-deliveries')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['pending-delivery'])); ?>">
                            <i class="las la-clock aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                <?php echo e(translate('Pending Delivery')); ?>

                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('cancelled-deliveries')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['cancelled-delivery'])); ?>">
                            <i class="las la-times-circle aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                <?php echo e(translate('Cancelled Delivery')); ?>

                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('cancel-request-list')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['cancel-request-list'])); ?>">
                            <i class="las la-times-circle aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                <?php echo e(translate('Request Cancelled Delivery')); ?>

                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('total-collection')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['today-collection'])); ?>">
                            <i class="las la-comment-dollar aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                <?php echo e(translate('Total Collections')); ?>

                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('total-earnings')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['total-earnings'])); ?>">
                            <i class="las la-comment-dollar aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                <?php echo e(translate('Total Earnings')); ?>

                            </span>
                        </a>
                    </li>
                <?php else: ?>

                    <?php
                        $delivery_viewed = App\Models\Order::where('user_id', Auth::user()->id)->where('delivery_viewed', 0)->get()->count();
                        $payment_status_viewed = App\Models\Order::where('user_id', Auth::user()->id)->where('payment_status_viewed', 0)->get()->count();
                    ?>
                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('purchase_history.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['purchase_history.index'])); ?>">
                            <i class="las la-file-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Purchase History')); ?></span>
                            <?php if($delivery_viewed > 0 || $payment_status_viewed > 0): ?><span class="badge badge-inline badge-success"><?php echo e(translate('New')); ?></span><?php endif; ?>
                        </a>
                    </li>

                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('digital_purchase_history.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['digital_purchase_history.index'])); ?>">
                            <i class="las la-download aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Downloads')); ?></span>
                        </a>
                    </li>

                    <?php if(addon_is_activated('refund_request')): ?>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('customer_refund_request')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['customer_refund_request'])); ?>">
                                <i class="las la-backward aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Sent Refund Request')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('wishlists.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['wishlists.index'])); ?>">
                            <i class="la la-heart-o aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Wishlist')); ?></span>
                        </a>
                    </li>

                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('compare')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['compare'])); ?>">
                            <i class="la la-refresh aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Compare')); ?></span>
                        </a>
                    </li>

                    <?php if(Auth::user()->user_type == 'seller'): ?>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('seller.products')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['seller.products', 'seller.products.upload', 'seller.products.edit'])); ?>">
                                <i class="lab la-sketch aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Products')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('product_bulk_upload.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['product_bulk_upload.index'])); ?>">
                                <i class="las la-upload aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Product Bulk Upload')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('seller.digitalproducts')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['seller.digitalproducts', 'seller.digitalproducts.upload', 'seller.digitalproducts.edit'])); ?>">
                                <i class="lab la-sketch aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Digital Products')); ?></span>
                            </a>
                        </li>
                        <?php if(addon_is_activated('wholesale') && get_setting('seller_wholesale_product') == 1): ?>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('seller.wholesale_products_list')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['wholesale_product_create.seller','wholesale_product_edit.seller'])); ?>">
                                    <i class="las la-luggage-cart aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Wholesale Products')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('my_uploads.all')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['my_uploads.new'])); ?>">
                                <i class="las la-folder-open aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Uploaded Files')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('seller.coupon.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['my_uploads.new'])); ?>">
                                <i class="las la-bullhorn aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Coupon')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(get_setting('classified_product') == 1): ?>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('customer_products.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['customer_products.index', 'customer_products.create', 'customer_products.edit'])); ?>">
                                <i class="lab la-sketch aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Classified Products')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(addon_is_activated('auction')): ?>
                        <li class="aiz-side-nav-item">
                            <a href="javascript:void(0);" class="aiz-side-nav-link">
                                <i class="las la-gavel aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Auction')); ?></span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <?php if(Auth::user()->user_type == 'seller' && get_setting('seller_auction_product') == 1): ?>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('auction_products.seller.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['auction_products.seller.index','auction_product_create.seller','auction_product_edit.seller','product_bids.seller'])); ?>">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('All Auction Products')); ?></span>
                                        </a>
                                    </li>
                                    <li class="aiz-side-nav-item">
                                        <a href="<?php echo e(route('auction_products_orders.seller')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['auction_products_orders.seller'])); ?>">
                                            <span class="aiz-side-nav-text"><?php echo e(translate('Auction Product Orders')); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('auction_product_bids.index')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Bidded Products')); ?></span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('auction_product.purchase_history')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Purchase History')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(Auth::user()->user_type == 'seller'): ?>
                        <?php if(addon_is_activated('pos_system')): ?>
                            <?php if(\App\Models\BusinessSetting::where('type', 'pos_activation_for_seller')->first() != null && get_setting('pos_activation_for_seller') != 0): ?>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('poin-of-sales.seller_index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['poin-of-sales.seller_index'])); ?>">
                                        <i class="las la-fax aiz-side-nav-icon"></i>
                                        <span class="aiz-side-nav-text"><?php echo e(translate('POS Manager')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('orders.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['orders.index'])); ?>">
                                <i class="las la-money-bill aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Orders')); ?></span>
                            </a>
                        </li>

                        <?php if(addon_is_activated('refund_request')): ?>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('vendor_refund_request')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['vendor_refund_request','reason_show'])); ?>">
                                    <i class="las la-backward aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Received Refund Request')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('reviews.seller')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['reviews.seller'])); ?>">
                                <i class="las la-star-half-alt aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Product Reviews')); ?></span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('shops.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['shops.index'])); ?>">
                                <i class="las la-cog aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Shop Setting')); ?></span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('payments.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['payments.index'])); ?>">
                                <i class="las la-history aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Payment History')); ?></span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('withdraw_requests.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['withdraw_requests.index'])); ?>">
                                <i class="las la-money-bill-wave-alt aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Money Withdraw')); ?></span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('commission-log.index')); ?>" class="aiz-side-nav-link">
                                <i class="las la-file-alt aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Commission History')); ?></span>
                            </a>
                        </li>

                    <?php endif; ?>

                    <?php if(get_setting('conversation_system') == 1): ?>
                        <?php
                            $conversation = \App\Models\Conversation::where('sender_id', Auth::user()->id)->where('sender_viewed', 0)->get();
                        ?>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('conversations.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['conversations.index', 'conversations.show'])); ?>">
                                <i class="las la-comment aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Conversations')); ?></span>
                                <?php if(count($conversation) > 0): ?>
                                    <span class="badge badge-success">(<?php echo e(count($conversation)); ?>)</span>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endif; ?>


                    <?php if(get_setting('wallet_system') == 1): ?>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('wallet.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['wallet.index'])); ?>">
                                <i class="las la-dollar-sign aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('My Wallet')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(addon_is_activated('club_point')): ?>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('earnng_point_for_user')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['earnng_point_for_user'])); ?>">
                                <i class="las la-dollar-sign aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Earning Points')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(addon_is_activated('affiliate_system') && Auth::user()->affiliate_user != null && Auth::user()->affiliate_user->status): ?>
                        <li class="aiz-side-nav-item">
                            <a href="javascript:void(0);" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['affiliate.user.index', 'affiliate.payment_settings'])); ?>">
                                <i class="las la-dollar-sign aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text"><?php echo e(translate('Affiliate')); ?></span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('affiliate.user.index')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Affiliate System')); ?></span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('affiliate.user.payment_history')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Payment History')); ?></span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('affiliate.user.withdraw_request_history')); ?>" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Withdraw request history')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php
                        $support_ticket = DB::table('tickets')
                                    ->where('client_viewed', 0)
                                    ->where('user_id', Auth::user()->id)
                                    ->count();
                    ?>

                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('support_ticket.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['support_ticket.index'])); ?>">
                            <i class="las la-atom aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Support Ticket')); ?></span>
                            <?php if($support_ticket > 0): ?><span class="badge badge-inline badge-success"><?php echo e($support_ticket); ?></span> <?php endif; ?>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('profile')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['profile'])); ?>">
                        <i class="las la-user aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Manage Profile')); ?></span>
                    </a>
                </li>

            </ul>
        </div>
        <?php if(get_setting('vendor_system_activation') == 1 && Auth::user()->user_type == 'customer'): ?>
            <div>
                <a href="<?php echo e(route('shops.create')); ?>" class="btn btn-block btn-soft-primary rounded-0">
                    </i><?php echo e(translate('Be A Seller')); ?>

                </a>
            </div>
        <?php endif; ?>
        <?php if(Auth::user()->user_type == 'seller'): ?>
          <hr>
          <h4 class="h5 fw-600 text-center"><?php echo e(translate('Sold Amount')); ?></h4>
          <?php
              $date = date("Y-m-d");
              $days_ago_30 = date('Y-m-d', strtotime('-30 days', strtotime($date)));
              $days_ago_60 = date('Y-m-d', strtotime('-60 days', strtotime($date)));
          ?>
          <div class="widget-balance pb-3 pt-1">
            <div class="text-center">
                <div class="heading-4 strong-700 mb-4">
                    <?php
                        $orderTotal = \App\Models\Order::where('seller_id', Auth::user()->id)->where("payment_status", 'paid')->where('created_at', '>=', $days_ago_30)->sum('grand_total');
                        //$orderDetails = \App\Models\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', $days_ago_30)->get();
                        //$total = 0;
                        //foreach ($orderDetails as $key => $orderDetail) {
                            //if($orderDetail->order != null && $orderDetail->order != null && $orderDetail->order->payment_status == 'paid'){
                                //$total += $orderDetail->price;
                            //}
                        //}
                    ?>
                    <small class="d-block fs-12 mb-2"><?php echo e(translate('Your sold amount (current month)')); ?></small>
                    <span class="btn btn-primary fw-600 fs-18"><?php echo e(single_price($orderTotal)); ?></span>
                </div>
                <table class="table table-borderless">
                    <tr>
                        <?php
                            $orderTotal = \App\Models\Order::where('seller_id', Auth::user()->id)->where("payment_status", 'paid')->sum('grand_total');
                        ?>
                        <td class="p-1" width="60%">
                            <?php echo e(translate('Total Sold')); ?>:
                        </td>
                        <td class="p-1 fw-600" width="40%">
                            <?php echo e(single_price($orderTotal)); ?>

                        </td>
                    </tr>
                    <tr>
                        <?php
                            $orderTotal = \App\Models\Order::where('seller_id', Auth::user()->id)->where("payment_status", 'paid')->where('created_at', '>=', $days_ago_60)->where('created_at', '<=', $days_ago_30)->sum('grand_total');
                        ?>
                        <td class="p-1" width="60%">
                            <?php echo e(translate('Last Month Sold')); ?>:
                        </td>
                        <td class="p-1 fw-600" width="40%">
                            <?php echo e(single_price($orderTotal)); ?>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <?php endif; ?>

    </div>

    <div class="fixed-bottom d-xl-none bg-white border-top d-flex justify-content-between px-2" style="box-shadow: 0 -5px 10px rgb(0 0 0 / 10%);">
        <a class="btn btn-sm p-2 d-flex align-items-center" href="<?php echo e(route('logout')); ?>">
            <i class="las la-sign-out-alt fs-18 mr-2"></i>
            <span><?php echo e(translate('Logout')); ?></span>
        </a>
        <button class="btn btn-sm p-2 " data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb">
            <i class="las la-times la-2x"></i>
        </button>
    </div>
</div>
<?php /**PATH D:\My Work\Website\public_html\resources\views/frontend/inc/user_side_nav.blade.php ENDPATH**/ ?>
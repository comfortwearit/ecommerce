<?php if(get_setting('topbar_banner') != null): ?>
<div class="position-relative top-banner removable-session z-1035 d-none" data-key="top-banner" data-value="removed">
    <a href="<?php echo e(get_setting('topbar_banner_link')); ?>" class="d-block text-reset">
        <img src="<?php echo e(uploaded_asset(get_setting('topbar_banner'))); ?>" class="w-100 mw-100 h-50px h-lg-auto img-fit">
    </a>
    <button class="btn text-white absolute-top-right set-session" data-key="top-banner" data-value="removed" data-toggle="remove-parent" data-parent=".top-banner">
        <i class="la la-close la-2x"></i>
    </button>
</div>
<?php endif; ?>
<!-- Top Bar -->
<div class="top-navbar bg-white border-bottom border-soft-secondary z-1035">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col">
                <ul class="list-inline d-flex justify-content-between justify-content-lg-start mb-0">
                    <?php if(get_setting('show_language_switcher') == 'on'): ?>
                    <li class="list-inline-item dropdown mr-3" id="lang-change">
                        <?php
                            if(Session::has('locale')){
                                $locale = Session::get('locale', Config::get('app.locale'));
                            }
                            else{
                                $locale = 'en';
                            }
                        ?>
                        <a href="javascript:void(0)" class="dropdown-toggle text-reset py-2" data-toggle="dropdown" data-display="static">
                            <img src="<?php echo e(asset('assets/img/placeholder.jpg')); ?>" data-src="<?php echo e(asset('assets/img/flags/'.$locale.'.png')); ?>" class="mr-2 lazyload" alt="<?php echo e(\App\Models\Language::where('code', $locale)->first()->name); ?>" height="11">
                            <span class="opacity-60"><?php echo e(\App\Models\Language::where('code', $locale)->first()->name); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-left">
                            <?php $__currentLoopData = \App\Models\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="javascript:void(0)" data-flag="<?php echo e($language->code); ?>" class="dropdown-item <?php if($locale == $language): ?> active <?php endif; ?>">
                                        <img src="<?php echo e(asset('assets/img/placeholder.jpg')); ?>" data-src="<?php echo e(asset('assets/img/flags/'.$language->code.'.png')); ?>" class="mr-1 lazyload" alt="<?php echo e($language->name); ?>" height="11">
                                        <span class="language"><?php echo e($language->name); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if(get_setting('show_currency_switcher') == 'on'): ?>
                    <li class="list-inline-item dropdown ml-auto ml-lg-0 mr-0" id="currency-change">
                        <?php
                            if(Session::has('currency_code')){
                                $currency_code = Session::get('currency_code');
                            }
                            else{
                                $currency_code = \App\Models\Currency::findOrFail(get_setting('system_default_currency'))->code;
                            }
                        ?>
                        <a href="javascript:void(0)" class="dropdown-toggle text-reset py-2 opacity-60" data-toggle="dropdown" data-display="static">
                            <?php echo e(\App\Models\Currency::where('code', $currency_code)->first()->name); ?> <?php echo e((\App\Models\Currency::where('code', $currency_code)->first()->symbol)); ?>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                            <?php $__currentLoopData = \App\Models\Currency::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a class="dropdown-item <?php if($currency_code == $currency->code): ?> active <?php endif; ?>" href="javascript:void(0)" data-currency="<?php echo e($currency->code); ?>"><?php echo e($currency->name); ?> (<?php echo e($currency->symbol); ?>)</a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="col-5 text-right d-none d-lg-block">
                <ul class="list-inline mb-0 h-100 d-flex justify-content-end align-items-center">
                    <?php if(get_setting('helpline_number')): ?>
                        <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                            <a href="tel:<?php echo e(get_setting('helpline_number')); ?>" class="text-reset d-inline-block opacity-60 py-2">
                                <i class="la la-phone"></i>
                                <span><?php echo e(translate('Help line')); ?></span>  
                                <span><?php echo e(get_setting('helpline_number')); ?></span>    
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(isAdmin()): ?>
                            <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                                <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-reset d-inline-block opacity-60 py-2"><?php echo e(translate('My Panel')); ?></a>
                            </li>
                        <?php else: ?>

                            <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0 dropdown">
                                <a class="dropdown-toggle no-arrow text-reset" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="">
                                        <span class="position-relative d-inline-block">
                                            <i class="las la-bell fs-18"></i>
                                            <?php if(count(Auth::user()->unreadNotifications) > 0): ?>
                                                <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right"></span>
                                            <?php endif; ?>
                                        </span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg py-0">
                                    <div class="p-3 bg-light border-bottom">
                                        <h6 class="mb-0"><?php echo e(translate('Notifications')); ?></h6>
                                    </div>
                                    <div class="px-3 c-scrollbar-light overflow-auto " style="max-height:300px;">
                                        <ul class="list-group list-group-flush" >
                                            <?php $__empty_1 = true; $__currentLoopData = Auth::user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <li class="list-group-item">
                                                    <?php if($notification->type == 'App\Notifications\OrderNotification'): ?>
                                                        <?php if(Auth::user()->user_type == 'customer'): ?>
                                                        <a href="javascript:void(0)" onclick="show_purchase_history_details(<?php echo e($notification->data['order_id']); ?>)" class="text-reset">
                                                            <span class="ml-2">
                                                                <?php echo e(translate('Order code: ')); ?> <?php echo e($notification->data['order_code']); ?> <?php echo e(translate('has been '. ucfirst(str_replace('_', ' ', $notification->data['status'])))); ?>

                                                            </span>
                                                        </a>
                                                        <?php elseif(Auth::user()->user_type == 'seller'): ?>
                                                            <?php if(Auth::user()->id == $notification->data['user_id']): ?>
                                                                <a href="javascript:void(0)" onclick="show_purchase_history_details(<?php echo e($notification->data['order_id']); ?>)" class="text-reset">
                                                                    <span class="ml-2">
                                                                        <?php echo e(translate('Order code: ')); ?> <?php echo e($notification->data['order_code']); ?> <?php echo e(translate('has been '. ucfirst(str_replace('_', ' ', $notification->data['status'])))); ?>

                                                                    </span>
                                                                </a>
                                                            <?php else: ?>
                                                                <a href="javascript:void(0)" onclick="show_order_details(<?php echo e($notification->data['order_id']); ?>)" class="text-reset">
                                                                    <span class="ml-2">
                                                                        <?php echo e(translate('Order code: ')); ?> <?php echo e($notification->data['order_code']); ?> <?php echo e(translate('has been '. ucfirst(str_replace('_', ' ', $notification->data['status'])))); ?>

                                                                    </span>
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <li class="list-group-item">
                                                    <div class="py-4 text-center fs-16">
                                                        <?php echo e(translate('No notification found')); ?>

                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="text-center border-top">
                                        <a href="<?php echo e(route('all-notifications')); ?>" class="text-reset d-block py-2">
                                            <?php echo e(translate('View All Notifications')); ?>

                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                                <a href="<?php echo e(route('dashboard')); ?>" class="text-reset d-inline-block opacity-60 py-2"><?php echo e(translate('My Panel')); ?></a>
                            </li>
                        <?php endif; ?>
                        <li class="list-inline-item">
                            <a href="<?php echo e(route('logout')); ?>" class="text-reset d-inline-block opacity-60 py-2"><?php echo e(translate('Logout')); ?></a>
                        </li>
                    <?php else: ?>
                        <li class="list-inline-item mr-3 border-right border-left-0 pr-3 pl-0">
                            <a href="<?php echo e(route('user.login')); ?>" class="text-reset d-inline-block opacity-60 py-2"><?php echo e(translate('Login')); ?></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="<?php echo e(route('user.registration')); ?>" class="text-reset d-inline-block opacity-60 py-2"><?php echo e(translate('Registration')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END Top Bar -->
<header class="<?php if(get_setting('header_stikcy') == 'on'): ?> sticky-top <?php endif; ?> z-1020 bg-white border-bottom shadow-sm">
    <div class="position-relative logo-bar-area z-1">
        <div class="container">
            <div class="d-flex align-items-center">

                <div class="col-auto col-xl-3 pl-0 pr-3 d-flex align-items-center">
                    <a class="d-block py-20px mr-3 ml-0" href="<?php echo e(route('home')); ?>">
                        <?php
                            $header_logo = get_setting('header_logo');
                        ?>
                        <?php if($header_logo != null): ?>
                            <img src="<?php echo e(uploaded_asset($header_logo)); ?>" alt="<?php echo e(env('APP_NAME')); ?>" class="mw-100 h-30px h-md-40px" height="40">
                        <?php else: ?>
                            <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="<?php echo e(env('APP_NAME')); ?>" class="mw-100 h-30px h-md-40px" height="40">
                        <?php endif; ?>
                    </a>

                    <?php if(Route::currentRouteName() != 'home'): ?>
                        <div class="d-none d-xl-block align-self-stretch category-menu-icon-box ml-auto mr-0">
                            <div class="h-100 d-flex align-items-center" id="category-menu-icon">
                                <div class="dropdown-toggle navbar-light bg-light h-40px w-50px pl-2 rounded border c-pointer">
                                    <span class="navbar-toggler-icon"></span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="d-lg-none ml-auto mr-0">
                    <a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle" data-target=".front-header-search">
                        <i class="las la-search la-flip-horizontal la-2x"></i>
                    </a>
                </div>

                <div class="flex-grow-1 front-header-search d-flex align-items-center bg-white">
                    <div class="position-relative flex-grow-1">
                        <form action="<?php echo e(route('search')); ?>" method="GET" class="stop-propagation">
                            <div class="d-flex position-relative align-items-center">
                                <div class="d-lg-none" data-toggle="class-toggle" data-target=".front-header-search">
                                    <button class="btn px-2" type="button"><i class="la la-2x la-long-arrow-left"></i></button>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="border-0 border-lg form-control" id="search" name="keyword" <?php if(isset($query)): ?>
                                        value="<?php echo e($query); ?>"
                                    <?php endif; ?> placeholder="<?php echo e(translate('I am shopping for...')); ?>" autocomplete="off">
                                    <div class="input-group-append d-none d-lg-block">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="la la-search la-flip-horizontal fs-18"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100" style="min-height: 200px">
                            <div class="search-preloader absolute-top-center">
                                <div class="dot-loader"><div></div><div></div><div></div></div>
                            </div>
                            <div class="search-nothing d-none p-3 text-center fs-16">

                            </div>
                            <div id="search-content" class="text-left">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-none d-lg-none ml-3 mr-0">
                    <div class="nav-search-box">
                        <a href="#" class="nav-box-link">
                            <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                        </a>
                    </div>
                </div>

                <div class="d-none d-lg-block ml-3 mr-0">
                    <div class="" id="compare">
                        <?php echo $__env->make('frontend.partials.compare', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

                <div class="d-none d-lg-block ml-3 mr-0">
                    <div class="" id="wishlist">
                        <?php echo $__env->make('frontend.partials.wishlist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

                <div class="d-none d-lg-block  align-self-stretch ml-3 mr-0" data-hover="dropdown">
                    <div class="nav-cart-box dropdown h-100" id="cart_items">
                        <?php echo $__env->make('frontend.partials.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

            </div>
        </div>
        <?php if(Route::currentRouteName() != 'home'): ?>
        <div class="hover-category-menu position-absolute w-100 top-100 left-0 right-0 d-none z-3" id="hover-category-menu">
            <div class="container">
                <div class="row gutters-10 position-relative">
                    <div class="col-lg-3 position-static">
                        <?php echo $__env->make('frontend.partials.category_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php if( get_setting('header_menu_labels') !=  null ): ?>
        <div class="bg-white border-top border-gray-200 py-1">
            <div class="container">
                <ul class="list-inline mb-0 pl-0 mobile-hor-swipe text-center">
                    <?php $__currentLoopData = json_decode( get_setting('header_menu_labels'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-inline-item mr-0">
                        <a href="<?php echo e(json_decode( get_setting('header_menu_links'), true)[$key]); ?>" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            <?php echo e(translate($value)); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</header>
<?php /**PATH D:\My Work\Website\public_html\resources\views/frontend/inc/nav.blade.php ENDPATH**/ ?>
<!-- Top bar-->
<div class="top-bar">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 d-md-block d-none">
                <p>
                    Liên hệ: 0978.123123 or lytranuit@gmail.com
                </p>
            </div>
            <ul class="col-xs-4 list-inline d-md-none p-1">
                <li class="list-inline-item">
                    <i class="fa fa-phone">
                    </i>
                    <span class="ml-1">
                        0978.123123
                    </span>
                </li>
            </ul>
            <div class="col-xs-8 col-md-6 text-right login">
                <a class="login-btn" data-target="#login-modal" data-toggle="modal" href="#">
                    <i class="fa fa-sign-in">
                    </i>
                    <span class="d-inline-block">
                        Đăng nhập
                    </span>
                </a>
                <a class="signup-btn" href="customer-register.html">
                    <i class="fa fa-user">
                    </i>
                    <span class="d-inline-block">
                        Đăng kí
                    </span>
                </a>
                <a class="signup-btn" href='{{get_url_seo("index/shopcart")}}'>
                    <i class="fa fa-shopping-cart">
                    </i>
                    <span class="d-inline-block">
                        (1)
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Top bar end-->
<!-- Login Modal-->
<div aria-hidden="true" aria-labelledby="login-modalLabel" class="modal fade" id="login-modal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="login-modalLabel">
                    Customer Login
                </h4>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="customer-orders.html" method="get">
                    <div class="form-group">
                        <input class="form-control" id="email_modal" placeholder="email" type="text">
                        </input>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="password_modal" placeholder="password" type="password">
                        </input>
                    </div>
                    <p class="text-center">
                        <button class="btn btn-template-outlined">
                            <i class="fa fa-sign-in">
                            </i>
                            Log in
                        </button>
                    </p>
                </form>
                <p class="text-center text-muted">
                    Not registered yet?
                </p>
                <p class="text-center text-muted">
                    <a href="customer-register.html">
                        <strong>
                            Register now
                        </strong>
                    </a>
                    ! It is easy and done in 1 minute and gives you access to special discounts and much more!
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Login modal end-->
<header class="nav-holder make-sticky">
    <div class="navbar navbar-expand-lg" id="navbar" role="navigation">
        <div class="container">
            <a class="navbar-brand home" href="<?= base_url(); ?>">
                <img alt="Universal logo" class="d-none d-md-inline-block" src="<?= base_url();?>img/logo.png">
                    <img alt="Universal logo" class="d-inline-block d-md-none" src="<?= base_url();?>img/logo-small.png">
                        <span class="sr-only">
                            Universal - go to homepage
                        </span>
                    </img>
                </img>
            </a>
            <button class="navbar-toggler btn-template-outlined" data-target="#navigation" data-toggle="collapse" type="button">
                <span class="sr-only">
                    Toggle navigation
                </span>
                <i class="fa fa-align-justify">
                </i>
            </button>
            <div class="navbar-collapse collapse" id="navigation">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="javascript: void(0)">
                            Trang chủ
                        </a>
                    </li>
                    <!-- ========== FULL WIDTH MEGAMENU END ==================-->
                    <!-- ========== Contact dropdown ==================-->
                    <li class="nav-item">
                        <a href="javascript: void(0)">
                            Liên hệ
                        </a>
                    </li>
                    <!-- ========== Contact dropdown end ==================-->
                </ul>
            </div>
            <div class="collapse clearfix" id="search">
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input class="form-control" placeholder="Search" type="text">
                            <span class="input-group-btn">
                                <button class="btn btn-template-main" type="submit">
                                    <i class="fa fa-search">
                                    </i>
                                </button>
                            </span>
                        </input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
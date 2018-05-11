<!DOCTYPE html>
<html>
    <head>
        @include("include.head")
    </head>
</html>
<body>
    <div id="all">
        <!-- Navbar Start-->
        <?php echo $widget->
        header(); ?>
        <!-- Navbar End-->
        <section>
            <div class="container text-center">
                <div class="row portfolio-project">
                    <div class="col-sm-12">
                        <div class="project owl-carousel mb-4">
                            <div class="item">
                                <img alt="" class="img-fluid" src="img/main-slider1.jpg" style="height: 300px;"/>
                            </div>
                            <div class="item">
                                <img alt="" class="img-fluid" src="img/main-slider2.jpg" style="height: 300px;"/>
                            </div>
                            <div class="item">
                                <img alt="" class="img-fluid" src="img/main-slider3.jpg" style="height: 300px;"/>
                            </div>
                            <div class="item">
                                <img alt="" class="img-fluid" src="img/main-slider4.jpg" style="height: 300px;"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-white bar">
            <div class="container">
                <div class="heading text-center">
                    <h2>
                        Sản phẩm
                    </h2>
                </div>
                <p class="lead">
                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
                    <a href="blog.html">
                        Check our blog
                    </a>
                </p>
                <div class="row products products-big">
                    <div class="col-md-6">
                        <div class="product">
                            <div class="image">
                                <a href="index/shopdetail">
                                    <img alt="" class="img-fluid image1" src="img/product1.jpg"/>
                                </a>
                            </div>
                            <div class="text">
                                <h3 class="h5">
                                    <a href="shop-detail.html">
                                        Fur coat with very but very very long name
                                    </a>
                                </h3>
                                <p class="price">
                                    $143.00
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product">
                            <div class="image">
                                <a href="index/shopdetail">
                                    <img alt="" class="img-fluid image1" src="img/product2.jpg"/>
                                </a>
                            </div>
                            <div class="text">
                                <h3 class="h5">
                                    <a href="shop-detail.html">
                                        White Blouse Armani
                                    </a>
                                </h3>
                                <p class="price">
                                    <del>
                                        $280
                                    </del>
                                    $143.00
                                </p>
                            </div>
                            <div class="ribbon-holder">
                                <div class="ribbon sale">
                                    SALE
                                </div>
                                <div class="ribbon new">
                                    NEW
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bar bg-gray">
            <div class="container">
                <div class="heading text-center">
                    <h2>
                        Our Clients
                    </h2>
                </div>
                <ul class="list-unstyled owl-carousel customers no-mb">
                    <li class="item">
                        <img alt="" class="img-fluid" src="img/customer-1.png"/>
                    </li>
                    <li class="item">
                        <img alt="" class="img-fluid" src="img/customer-2.png"/>
                    </li>
                    <li class="item">
                        <img alt="" class="img-fluid" src="img/customer-3.png"/>
                    </li>
                    <li class="item">
                        <img alt="" class="img-fluid" src="img/customer-4.png"/>
                    </li>
                    <li class="item">
                        <img alt="" class="img-fluid" src="img/customer-5.png"/>
                    </li>
                    <li class="item">
                        <img alt="" class="img-fluid" src="img/customer-6.png"/>
                    </li>
                </ul>
            </div>
        </section>
        <!-- FOOTER -->
        <?php echo $widget->
        footer(); ?>
    </div>
    <!-- Javascript files-->
    <script src="vendor/jquery/jquery.min.js">
    </script>
    <script src="vendor/popper.js/umd/popper.min.js">
    </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js">
    </script>
    <script src="vendor/jquery.cookie/jquery.cookie.js">
    </script>
    <script src="vendor/waypoints/lib/jquery.waypoints.min.js">
    </script>
    <script src="vendor/jquery.counterup/jquery.counterup.min.js">
    </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js">
    </script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js">
    </script>
    <script src="js/jquery.parallax-1.1.3.js">
    </script>
    <script src="vendor/bootstrap-select/js/bootstrap-select.min.js">
    </script>
    <script src="vendor/jquery.scrollto/jquery.scrollTo.min.js">
    </script>
    <script src="js/front.js">
    </script>
</body>

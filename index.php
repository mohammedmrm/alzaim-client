<?php
include_once("php/_access.php");
access();
include_once("config.php");
?>
<!DOCTYPE html>
<html class=" ">

<style>
.item-content {
   padding: 0 !important;

}
</style>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<?php require_once('head.php'); ?>


<body class="html" <?php echo $config['theme-config']; ?>>
    <div class="preloader-background">
        <div class="preloader-wrapper">
            <div id="preloader"></div>
        </div>
    </div>



    <!-- START navigation -->
    <?php require_once('top-menu.php'); ?>

    </li>
    <li class="copy-spacer"></li>
    <li class="copy-wrap">
        <div class="copyright">&copy; Copyright @ AL-Zaim الزعيم</div>



        </ul>
        <!-- END navigation -->
        <ul id="slide-settings" class="sidenav sidesettings right fixed">
            <li class="menulinks">
                <ul class="collapsible">
                </ul>
            </li>
        </ul>
    </li>
    </ul>







    <div class="carousel carousel-fullscreen carousel-slider about_carousel">
        <div class="carousel-item" href="#one!">
            <div class="item-content">
               <?php echo $config['c_ad1'];?>
            </div>
        </div>
        <div class="carousel-item" href="#two!">
            <div class="item-content">
                <?php echo $config['c_ad2'];?>
            </div>
        </div>
    </div>

    <div class="row primary-bg">

        <div class="divider"></div>
        <div class="spacer"></div>
        <h5 class="center bot-0 sec-tit white-text">احصائيات</h5>
        <p class="center-align white-text">احصائيات بجميع الطلبيات</p>

        <div class="col s4 pad-0">
            <h6 class="center white-text bot-0 light">اليوم</h6>
            <h5 class="white-text center top-0" id="earning-last1"></h5>
            <h5 class="white-text center top-0" id="orders-last1"></h5>
        </div>
        <div class="col s4 pad-0">
            <h6 class="center white-text bot-0 light">اخر اسبوع</h6>
            <h5 class="white-text center top-0" id="earning-last7"></h5>
            <h5 class="white-text center top-0" id="orders-last7"></h5>
        </div>
        <div class="col s4 pad-0">
            <h6 class="center white-text bot-0 light">اخر شهر</h6>
            <h5 class="white-text center top-0" id="earning-last30"></h5>
            <h5 class="white-text center top-0" id="orders-last30"></h5>
        </div>
    </div>
    <!-- <div class="container">
        <div class="section">

            <h5 class="center sec-tit">Our Mission</h5>
            <p class="center-align">Mobile applications often stand in contrast to desktop applications which run on desktop computers, and with web applications which run in mobile web browsers rather than directly on the mobile device.</p>
            <div class="center-align">
                <a href="#!" class="btn btn-rounded">Know More</a>
            </div>
            <div class="spacer-large"></div>

            <div class="divider"></div>
            <div class="spacer"></div>

            <div class="spacer"></div>
            <h5 class="center bot-20 sec-tit">Our Customer's Say</h5>


            <div class="slider slider3 ">
                <ul class="slides transparent testimonials">
                    <li>
                        <p class="center"><i class="mdi mdi-format-quote-open"></i> We are so pleased with the purchase of this product. Zak has tons of components and features to deal with. You can really create anything you like.<i class="mdi mdi-format-quote-close"></i> </p>
                        <div class=" center-align">
                            <div class="row userinfo">
                                <img src="assets/images/user-30.jpg" alt="" class="circle responsive-img">
                                <div class="left-align">
                                    <span class=""><strong>Kai Badger</strong>
                                        <br><span class='small'>CEO, Ink Ltd.</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <p class="center"><i class="mdi mdi-format-quote-open"></i> We highly recommend using Zak for your next project. It is super quality and premium template that you can ask for. Just go for it.<i class="mdi mdi-format-quote-close"></i> </p>
                        <div class=" center-align">
                            <div class="row userinfo">
                                <img src="assets/images/user-17.jpg" alt="" class="circle responsive-img">
                                <div class="left-align">
                                    <span class=""><strong>Lucie Hovey</strong>
                                        <br><span class='small'>Manager, Zed Ind.</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <p class="center"><i class="mdi mdi-format-quote-open"></i> A perfect template to get you going for your next project. A full loaded feature packed template. It is multi purpose and super fast. Thank you for such a wonderful template.<i class="mdi mdi-format-quote-close"></i> </p>
                        <div class=" center-align">
                            <div class="row userinfo">
                                <img src="assets/images/user-8.jpg" alt="" class="circle responsive-img">
                                <div class="left-align">
                                    <span class=""><strong>Denny Veiga</strong>
                                        <br><span class='small'>Sr. Designer</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </div> -->



    <?php include_once('footer.php'); ?>
    <?php include_once('bottom-menu.php'); ?>














    <!-- PWA Service Worker Code -->

    <script type="text/javascript">
        // This is the "Offline copy of pages" service worker

        // Add this below content to your HTML page, or add the js file to your page at the very top to register service worker

        // Check compatibility for the browser we're running this in
        if ("serviceWorker" in navigator) {
            if (navigator.serviceWorker.controller) {
                console.log("[PWA Builder] active service worker found, no need to register");
            } else {
                // Register the service worker
                navigator.serviceWorker
                    .register("pwabuilder-sw.js", {
                        scope: "./"
                    })
                    .then(function(reg) {
                        console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
                    });
            }
        }
    </script>


    <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

    <!-- CORE JS FRAMEWORK - START -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/materialize.js"></script>
    <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- CORE JS FRAMEWORK - END -->


    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <script type="text/javascript">
        $(document).ready(function() {

            $(".carousel-fullscreen.carousel-slider").carousel({
                fullWidth: true,
                indicators: true
            });
            setTimeout(autoplay, 3500);

            function autoplay() {
                $(".carousel").carousel("next");
                setTimeout(autoplay, 3500);
            }

            $(".slider3").slider({
                indicators: false,
                height: 200,
            });

        });
    </script>
    <script src="assets/plugins/fancybox/jquery.fancybox.min.js" type="text/javascript"></script>
    <script type="text/javaScript">
        $("[data-fancybox=images]").fancybox({
  buttons : [ 
    "slideShow",
    "share",
    "zoom",
    "fullScreen",
    "close",
    "thumbs"
  ],
  thumbs : {
    autoStart : false
  }
});
</script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


    <!-- CORE TEMPLATE JS - START -->
    <script src="assets/js/init.js"></script>
    <script src="assets/js/settings.js"></script>

    <script src="assets/js/scripts.js"></script>

    <!-- END CORE TEMPLATE JS - END -->


    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            $('.preloader-background').delay(5).fadeOut('slow');
        });
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('sw.js')
            });
        }

        function static() {
            $.ajax({
                url: "php/_static.php",
                type: "POST",
                data: $("#searchForm").serialize(),
                success: function(res) {
                    console.log(res);
                    $.each(res.last1, function() {
                        if (this.client_price != null) {
                            $("#earning-last1").text(this.client_price);
                        }
                        if (this.orders != null) {
                            $("#orders-last1").append("&nbsp;" + this.orders);
                        }
                    });
                    $.each(res.last7, function() {
                        if (this.client_price != null) {
                            $("#earning-last7").text(this.client_price);
                        }
                        if (this.orders != null) {
                            $("#orders-last7").append("&nbsp;" + this.orders);
                        }
                    });
                    $.each(res.last30, function() {
                        if (this.client_price != null) {
                            $("#earning-last30").text(this.client_price);
                        }
                        if (this.orders != null) {
                            $("#orders-last30").append("&nbsp;" + this.orders);
                        }
                    });
                },
                error: function(e) {
                    console.log(e);
                }
            });
        }
        static();
    </script>
</body>

</html>
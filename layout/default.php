<!DOCTYPE html>
<html lang="<?= $page->lang ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= url('/assets/img/favicon.ico') ?>">

    <title>ODA a full-stack library for build internet services</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= url('/assets/css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= url('/assets/css/ionicons.min.css') ?>" rel="stylesheet">
    <link href="<?= url('/assets/css/style.css') ?>" rel="stylesheet">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?= url('/assets/js/ie10-viewport-bug-workaround.js') ?>"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div id="h">
    <div class="logo">
        <h2 onclick="window.location.href='/ODA/'">ODA</h2>
    </div><!--/logo-->
    <div class="container centered">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>
                    <b><?= $page->getKey('title')?></b>
                </h1>
            </div>
        </div><!--/row-->
    </div><!--/row-->
</div><!--/container-->
</div><!--H-->

<div class="container">
    <div class="row">
        <div class="col-md-12" id="div_summary">
        </div><!--/col-md-12-->
        <div class="col-md-12" id="div_content">
            <?= $page->getContent() ?>
        </div><!--/col-md-12-->
    </div><!--/row-->
</div><!-- /.container -->

<div id="sep" style="margin-top: 70px;">
    <div class="container">
        <div class="row centered">
            <div class="col-md-8 col-md-offset-2">
                <h1>To better cross the bridge of web technology, feel free to contact me!</h1>
                <button class="btn btn-conf btn-clear" onClick="window.open('http://perso-happykiller.rhcloud.com/LFJFR/#?key=odasite')">Request for Information</button>
            </div>
        </div><!--/row-->
    </div><!--/container-->
</div><!--/.sep-->

<div id="f" style="margin-top: 70px;">
    <div class="container">
        <div class="row centered">
            <div class="col-md-8 col-md-offset-2">
                <a href="https://twitter.com/hashtag/FW_ODA?src=hash&lang=fr"><i class="ion-social-twitter"></i></a>
                <a href="https://www.facebook.com/FW_ODA"><i class="ion-social-facebook"></i></a>
            </div><!--/col-md-8-->
        </div>
    </div><!--/container-->
</div><!--/.F-->

<a href="#" class="scrollup">Scroll</a>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= url('/assets/js/jquery.min.js') ?>"></script>
<script src="<?= url('/assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= url('/assets/js/retina-1.1.0.js') ?>"></script>
<script src="<?= url('/assets/js/jquery.hoverdir.js') ?>"></script>
<script src="<?= url('/assets/js/jquery.hoverex.min.js') ?>"></script>
<script src="<?= url('/assets/js/jquery.prettyPhoto.js') ?>"></script>
<script src="<?= url('/assets/js/jquery.isotope.min.js') ?>"></script>
<script src="<?= url('/assets/js/custom.js') ?>"></script>

<script>
    // Portfolio
    (function($) {
        "use strict";
        var $container = $('.portfolio'),
            $items = $container.find('.portfolio-item'),
            portfolioLayout = 'fitRows';

        if( $container.hasClass('portfolio-centered') ) {
            portfolioLayout = 'masonry';
        }

        $container.isotope({
            filter: '*',
            animationEngine: 'best-available',
            layoutMode: portfolioLayout,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            },
            masonry: {
            }
        }, refreshWaypoints());

        function refreshWaypoints() {
            setTimeout(function() {
            }, 1000);
        }

        $('nav.portfolio-filter ul a').on('click', function() {
            var selector = $(this).attr('data-filter');
            $container.isotope({ filter: selector }, refreshWaypoints());
            $('nav.portfolio-filter ul a').removeClass('active');
            $(this).addClass('active');
            return false;
        });

        function getColumnNumber() {
            var winWidth = $(window).width(),
                columnNumber = 1;

            if (winWidth > 1200) {
                columnNumber = 5;
            } else if (winWidth > 950) {
                columnNumber = 4;
            } else if (winWidth > 600) {
                columnNumber = 3;
            } else if (winWidth > 400) {
                columnNumber = 2;
            } else if (winWidth > 250) {
                columnNumber = 1;
            }
            return columnNumber;
        }

        function setColumns() {
            var winWidth = $(window).width(),
                columnNumber = getColumnNumber(),
                itemWidth = Math.floor(winWidth / columnNumber);

            $container.find('.portfolio-item').each(function() {
                $(this).css( {
                    width : itemWidth + 'px'
                });
            });
        }

        function setPortfolio() {
            setColumns();
            $container.isotope('reLayout');
        }

        $container.imagesLoaded(function () {
            setPortfolio();
        });

        $(window).on('resize', function () {
            setPortfolio();
        });
    })(jQuery);
</script>
</body>
</html>

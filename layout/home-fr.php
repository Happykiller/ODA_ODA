<!DOCTYPE html>
<html lang="<?= $page->lang ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= url('/assets/img/favicon.png') ?>">

    <title>ODA est un outil complet pour la création de service internet</title>

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
        <h2>ODA</h2>
      </div><!--/logo-->
      <div class="container centered">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h1>
                <b>Construire facilement et rapidement ses services</b><br><br>
               ODA est un outil complet pour la création de service internet (website, app, service)<br>
            </h1>
            <button class="btn btn-conf btn-clear2" onclick="window.location.href='doc/'">Documentation</button>
            <button class="btn btn-conf btn-clear2" onclick="window.location.href='tuto/'">Tutoriels</button>
            <button class="btn btn-conf btn-clear2" onclick="window.open('https://github.com/Happykiller/ODA_FW_CLIENT')">Github Côté Client</button>
            <button class="btn btn-conf btn-clear2" onclick="window.open('https://github.com/Happykiller/ODA_FW_SERVER')">Github Côté Serveur</button>
          </div>
        </div><!--/row-->

        <h2 class="centered mb">Mon objetif était de créer un outil qui me permet de réaliser tous mes projets, site web, services tiers, application.</h2>

        <div class="row mt">
          <div class="col-sm-4">
            <i class="ion-ios7-monitor-outline"></i>
            <h3>Web Design</h3>
          </div><!--/col-md-4-->

          <div class="col-sm-4">
            <i class="ion-ios7-browsers-outline"></i>
            <h3>Structure client</h3>
          </div><!--/col-md-4-->

          <div class="col-sm-4">
            <i class="ion-ios7-copy-outline"></i>
            <h3>Structure serveur</h3>
          </div><!--/col-md-4-->

        </div><!--/row-->
      </div><!--/container-->
    </div><!--H-->

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <p>Le framework aide à la création de vue, à la navigation. Cela est possible par l'utilisation de tag HTML5 personnalisés interprétés par le côté client du framework (Jquery, JavaScript).</p>
        </div><!--/col-md-6-->
        <div class="col-md-4">
          <p>Le côté client du framework aide à offrir une stucture de projet web, cette structure permet l'implémentation de la gestion des route, templating, et tests. En fournissant une architecture par couche, le côté client intégre dans son design le support des appels REST, mise en cache, mokup, mode offline.</p>
        </div><!--/col-md-6-->
        <div class="col-md-4">
          <p>Le but du côté serveur est de faciliter l'exposition des données par REST. Le framework est orienté pour utiliser le SQL pour produire les données au format JSON. D'autres fonctionalités sont couvertes comme la gestion de base de donnée, les emails, des documents.</p>
        </div><!--/col-md-6-->
      </div><!--/row-->
    </div><!-- /.container -->

    <div class="container mt">
      <div class="row clients centered">
        <div class="col-sm-3">
          <img src="assets/img/client4.png" alt="">
        </div>
        <div class="col-sm-3">
          <img src="assets/img/client5.png" alt="">
        </div>
        <div class="col-sm-3">
          <img src="assets/img/php.png" alt="">
        </div>
        <div class="col-sm-3">
          <img src="assets/img/technologies_mySQL.png" alt="">
        </div>
      </div><!--/row-->
    </div><!--/container-->
    </div><!--/.G-->

    <div class="container mt">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <img src="assets/img/items.png" class="img-responsive" alt="">
        </div>
      </div><!--/row-->
    </div><!--/.container-->

    <div id="g">
      <div class="container">
        <div class="row centered">
          <h2>Voici des exemples de mes dernières réalisations.</h2>
        </div><!--/row-->
      </div><!--/.container-->
    </div>

    <div class="portfolio-centered mt">
      <div class="recentitems portfolio">

        <div class="portfolio-item graphic-design">
            <div class="he-wrap tpl6">
                <img src="assets/img/portfolio/portfolio_01.jpg" class="img-responsive" alt="">
                <div class="he-view">
                    <div class="bg a0" data-animate="fadeIn">
                        <h3 class="a1" data-animate="fadeInDown">Service pour Poker</h3>
                        <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_01.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        <a href="http://perso-happykiller.rhcloud.com/POK/" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-link"></i></a>
                    </div><!-- he bg -->
                </div><!-- he view -->
            </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item graphic-design">
          <div class="he-wrap tpl6">
          <img src="assets/img/portfolio/portfolio_02.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">Service pour CV</h3>
                <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_02.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                <a href="http://perso-happykiller.rhcloud.com/LFJFR/" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-link"></i></a>
               </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item web-design">
          <div class="he-wrap tpl6">
          <img src="assets/img/portfolio/portfolio_03.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">Service de statistique pour le jeux HeartStone</h3>
                <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_03.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                <a href="http://perso-happykiller.rhcloud.com/HOW/" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-link"></i></a>
              </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item graphic-design">
          <div class="he-wrap tpl6">
          <img src="assets/img/portfolio/portfolio_04.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">Service pour gestion panier de Ticket Restaurant</h3>
                <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_04.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                <a href="http://perso-happykiller.rhcloud.com/OTR/" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-link"></i></a>
              </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item graphic-design">
          <div class="he-wrap tpl6">
          <img src="assets/img/portfolio/portfolio_05.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">Tous compatibles en application</h3>
                <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_05.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                <a href="https://play.google.com/store/apps/details?id=com.oda.how&hl=fr" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-link"></i></a>
              </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item books">
          <div class="he-wrap tpl6">
          <img src="assets/img/portfolio/portfolio_09.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">Et plus !</h3>
                <a data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_09.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                <a href="http://perso-happykiller.rhcloud.com/LFJFR/#?key=odasite" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-link"></i></a>
              </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

       </div><!-- portfolio -->
    </div><!-- portfolio container -->

    <div id="sep" style="margin-top: 70px;">
      <div class="container">
        <div class="row centered">
          <div class="col-md-8 col-md-offset-2">
            <h1>Le meilleur moyen de traverser le pond de la technologie du web, et de me contacter !</h1>
            <button class="btn btn-conf btn-clear" onClick="window.open('http://lfjfr.happykiller.net#?key=odasite')">Apprendre à me connaître</button>
          </div>
        </div><!--/row-->
      </div><!--/container-->
    </div><!--/.sep-->

    <div id="f" style="margin-top: 70px;">
      <div class="container">
        <div class="row centered">
          <div class="col-md-8 col-md-offset-2">
            <a href="#" onclick="window.open('https://twitter.com/hashtag/FW_ODA?src=hash')"><i class="ion-social-twitter"></i></a>
            <a href="#" onclick="window.open('https://www.facebook.com/FW_ODA')"><i class="ion-social-facebook"></i></a>
          </div><!--/col-md-8-->
        </div>
      </div><!--/container-->
    </div><!--/.F-->

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

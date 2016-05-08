<!DOCTYPE html>
<html lang="<?= $page->lang ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= url('/assets/img/favicon.png') ?>">

    <title>ODA: <?= $page->getKey('title')?></title>

    <link href="<?= url('/assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= url('/assets/css/ionicons.min.css') ?>" rel="stylesheet">
    <link href="<?= url('/assets/css/style.css') ?>" rel="stylesheet">
</head>

<body>

<div id="h">
    <div class="logo">
        <h2 onclick="window.location.href='../'">ODA</h2>
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
        <div class="col-md-6 text-center">
            <button class="btn btn-conf btn-clear2" onclick="window.location.href='../lib_client/'"><?= $page->getKey('text_lib_client')?> (Javascript)</button>
        </div>
        <div class="col-md-6 text-center">
            <button class="btn btn-conf btn-clear2" onclick="window.location.href='../lib_server/'"><?= $page->getKey('text_lib_server')?> (PHP)</button>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12" id="div_summary">
        </div><!--/col-md-12-->
        <div class="col-md-12" id="div_content">
            <?= $page->getContent() ?>
        </div><!--/col-md-12-->
    </div><!--/row-->
</div><!-- /.container -->

<div id="f" style="margin-top: 70px;">
    <div class="container">
        <div class="row centered">
            <div class="col-md-8 col-md-offset-2">
                <a href="https://twitter.com/hashtag/FW_ODA?src=hash&lang=fr"><i class="ion-social-twitter"></i></a>
                <a href="https://www.facebook.com/FW_ODA"><i class="ion-social-facebook"></i></a>
                <a href="#" onclick="window.open('http://lfjfr.happykiller.net#?key=odasite')"><i class="ion-person"></i></a>
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
<script src="<?= url('/assets/js/jquery.prettyPhoto.js') ?>"></script>
<script src="<?= url('/assets/js/custom.js') ?>"></script>

</body>
</html>

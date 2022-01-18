<?php
// echo 'hello world!<br/>';
// echo $config->web_brand_text.'<br/>';
// foreach ($config as $key => $value) {
//     echo $key .' = '. $value.'<br/>';
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta http-equiv="refresh" content="5"> -->
    <title><?= $config->web_brand_text->val1 ?> - <?= ucwords($nav['active']) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">

    <script type="text/javascript" src="<?= asset('js/materialize.min.js') ?>"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- <script src="https://unpkg.com/vue@3.2.26"></script> -->

    <link rel="apple-touch-icon" sizes="57x57" href="<?= asset('img/icon/apple-icon-57x57.png') ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= asset('img/icon') ?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= asset('img/icon') ?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= asset('img/icon') ?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= asset('img/icon') ?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= asset('img/icon') ?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= asset('img/icon') ?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= asset('img/icon') ?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('img/icon') ?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>

    <!-- <body class="pink lighten-5"> -->
    <?= view('nav', $nav) ?>

    <main>

        <?= view($content['main'], $extra) ?>

        <?= view('footer') ?>

    </main>

    <!--  Scripts-->
    <script type="module" src="<?= asset('js/main.js') ?>"></script>
    <script type="text/javascript">

    </script>
</body>

</html>
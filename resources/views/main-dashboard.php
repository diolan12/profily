<?php

?>
<!DOCTYPE html>
<html lang="en" translate="no">

<head>
    <?php if ($server['client']['refresh']) : ?>
        <meta http-equiv="refresh" content="<?= $server['client']['refresh'] ?>">
    <?php endif ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= ucwords($meta['title']) ?> - <?= getenv('APP_NAME') ?> Dashboard</title>
    <link rel="canonical" href="<?= $meta['canonical'] ?>" />
    <meta name="description" content="<?= substr($meta['description'], 0, 170) ?>" />
    <meta name="keywords" content="<?= implode(', ', $meta['keywords']) ?>" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/treeflex/dist/css/treeflex.css">

    <link rel="stylesheet" href="<?= asset('css/materialize.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
    <style>
        blockquote {
            border-left: 5px solid <?= color($config->color->accent, false, false, true) ?> !important;
        }

        ul.dropdown-content {
            min-width: 300px !important;
        }

        header,
        main,
        footer {
            padding-left: 300px;
        }

        @media only screen and (max-width : 992px) {

            header,
            main,
            footer {
                padding-left: 0;
            }
        }
    </style>

    <script type="text/javascript" src="<?= asset('js/materialize.min.js') ?>"></script>
    <script type="text/javascript" src="<?= asset('js/jquery-2.1.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?= asset('js/chart.min.js') ?>"></script>

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="<?= color($config->color->secondary, false, false, true) ?>">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="<?= color($config->color->secondary, false, false, true) ?>">
</head>

<body class="<?= color($config->color->background) ?>">
    <?php if (getenv('APP_DEBUG')) : ?>
        <script type="text/javascript">
            const extra = <?= json_encode($extra) ?>;
            console.log(extra)
        </script>
    <?php endif; ?>

    <script type="text/javascript" src="<?= asset('js/lib.js') ?>"></script>
    <script type="text/javascript" src="<?= asset('js/mat.js') ?>"></script>
    <script type="text/javascript">
        const app = new App();
    </script>

    <header>
        <?= view('nav-dashboard', $extra) ?>
    </header>
    <div class=" hide-on-med-and-up yellow">
        <p>Kami menyarankan untuk membuka dashboard pada tablet atau desktop</p>
    </div>
    <main>


        <?= view($content['main'], $extra) ?>

        <?= component('pagination', $extra) ?>

    </main>

    <footer class="page-footer <?= color($config->color->primary) ?>">
        <?= view('footer-dashboard', $extra) ?>
    </footer>

    <?= component('fab', $extra) ?>

    <?= component('cookie', $extra) ?>

    <?= component('toast', $extra) ?>

    <script type="text/javascript" src="<?= asset('js/main.js') ?>"></script>
</body>

</html>
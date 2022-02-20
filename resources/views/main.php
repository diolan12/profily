<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= ucwords($meta['title']) ?> - <?= $config->brand->information->val1 ?></title>
    <link rel="canonical" href="<?= $meta['canonical'] ?>" />
    <meta name="description" content="<?= substr($meta['description'], 0, 170) ?>" />
    <meta name="keywords" content="<?= implode(', ', $meta['keywords']) ?>" />

    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/materialize.min.css') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/treeflex/dist/css/treeflex.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <style>
        blockquote {
            border-left: 5px solid <?= color($config->color->accent, false, false, true) ?> !important;
        }
    </style>

    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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

    <?php foreach ($meta['og'] as $ogk => $ogc) : ?>
        <meta property="og:<?= $ogk ?>" content="<?= $ogc ?>">
    <?php endforeach; ?>
</head>

<body>
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
        <?= view('nav', $extra) ?>
    </header>

    <main>

        <?= view($content['main'], $extra) ?>

        <?= component('pagination', $extra) ?>

    </main>

    <footer class="page-footer <?= color($config->color->primary) ?>">
        <?= view('footer', $extra) ?>
    </footer>

    <?= component('fab', $extra) ?>

    <?= component('cookie', $extra) ?>

    <?= component('toast', $extra) ?>

    <script type="text/javascript" src="<?= asset('js/main.js') ?>"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-620b81c9d7ff43cd"></script>

</body>

</html>
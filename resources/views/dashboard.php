<?php
// echo 'hello world!<br/>';
// echo $config->web_brand_text.'<br/>';
// foreach ($config as $key => $value) {
//     echo $key .' = '. $value.'<br/>';
// }
// dd($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= $config->brand_text->val1 ?> - <?= ucwords($nav['active']) ?></title>
    <link rel="canonical" href="<?= $meta['canonical']?>"/>
    <meta name="description" content="<?= substr($meta['description'], 0, 170)?>"/>
    <meta name="keywords" content="<?= implode(', ', $meta['keywords'])?>"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="<?= asset('css/materialize.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">

    <script type="text/javascript" src="<?= asset('js/materialize.min.js') ?>"></script>
    <script type="text/javascript" src="<?= asset('js/jquery-2.1.1.min.js') ?>"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
    <!-- <script src="https://unpkg.com/vue@3.2.26"></script> -->
    <script type="text/javascript" src="<?= asset('js/chart.min.js') ?>"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

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
    <meta name="msapplication-TileColor" content="<?= $config->brand_color_secondary->val3 ?>">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="<?= $config->brand_color_secondary->val3 ?>">
</head>

<body>

    <!-- <body class="pink lighten-5"> -->
    <?= view('nav', $extra) ?>

    <main>

        <?= view($content['main'], $extra) ?>

        <?= view('footer', $extra) ?>
        <canvas id="myChart" width="400" height="300"></canvas>
    </main>

    <!--  Scripts-->
    <script type="text/javascript">
        const extra = <?= json_encode($extra) ?>
    </script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu'],
                datasets: [{
                    label: 'Total visitors',
                    data: [12, 19, 13, 25, 21, 30, 42],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                elements: {
                    line: {
                        tension: 0.30
                    }
                }
            },
            cubicInterpolationMode: 'default'
        });
    </script>
    <script type="module" src="<?= asset('js/main.js') ?>"></script>
</body>

</html>
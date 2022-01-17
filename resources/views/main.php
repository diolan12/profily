<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta http-equiv="refresh" content="5"> -->
    <title>Chintia Coffee - <?= ucwords($nav['active'])?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?= url('assets/css/style.css') ?>">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- <script src="https://unpkg.com/vue@3.2.26"></script> -->
</head>

<body>

    <!-- <body class="pink lighten-5"> -->
    <?= view('nav', $nav)?>

    <main>

    <?= view($content['main'],)?>

        <?= view('footer')?>

    </main>

    <!--  Scripts-->
    <script type="module" src="<?= url('assets/js/main.js') ?>"></script>
    <script type="text/javascript">

    </script>
</body>

</html>
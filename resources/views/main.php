<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta http-equiv="refresh" content="5"> -->
    <title>Chintia Coffee</title>
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

        <footer class="page-footer pink darken-3">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Company Bio</h5>
                        <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Settings</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Link 1</a></li>
                            <li><a class="white-text" href="#!">Link 2</a></li>
                            <li><a class="white-text" href="#!">Link 3</a></li>
                            <li><a class="white-text" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Connect</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Whatsapp</a></li>
                            <li><a class="white-text" href="#!">Facebook</a></li>
                            <li><a class="white-text" href="#!">Link 3</a></li>
                            <li><a class="white-text" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <h6>Made with <i class="material-icons red-text">favorite</i> by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a></h6>

                </div>
            </div>
        </footer>

    </main>

    <!--  Scripts-->
    <script type="module" src="<?= url('assets/js/main.js') ?>"></script>
    <script type="text/javascript">

    </script>
</body>

</html>
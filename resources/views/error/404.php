<!DOCTYPE html>
<html lang="en" translate="no">

<head>
    <meta charset="utf-8">
    <title><?= $content->title ?></title>

    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/materialize.min.css') ?>">
    <script type="text/javascript" src="<?= asset('js/materialize.min.js') ?>"></script>
</head>

<body class="<?= color($config->color['background']) ?>">
    <div class="container font-recursive">
        <br />
        <br />
        <br />
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <div class="card ">
                    <div class="card-content ">
                        <span class="card-title"><?= $content->title ?></span>
                        <p><?= $content->message ?></p>
                        <p>It looks like this was the result of either:</p>
                        <ul class="browser-default">
                            <?php foreach ($content->causes as $cause) : ?>
                                <li><?= $cause ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <p>Please try again later</p>
                    </div>
                    <div class="card-action right-align">
                        <a href="<?= root() ?>" class="<?= color($config->color['accent'], true) ?> waves-effect btn-flat">Take me back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
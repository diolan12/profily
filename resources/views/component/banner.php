<div id="home" class="parallax-container scrollspy">
    <div class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <br><br><br>
                <div class="header center pink-text text-darken-3">
                    <?php if ($config->web->brand_type->val1 == 'logo') : ?>
                        <img src="<?= asset('img/logo-chintia.png'); ?>" class="responsive-img" alt="" />
                    <?php else : ?>
                        <h1 class="header center <?= color($config->color->accent, true) ?>"><?= $config->web->brand_text->val1; ?></h1>
                    <?php endif; ?>
                </div>
                <div class="row center">
                    <h5 class="header col s12 light white-text "><?= $config->web->brand_slogan->val1 ?></h5>
                </div>
                <div class="row center">
                    <a href="<?= $config->connect->connect_whatsapp->val2?>" target="_blank" class="btn-large waves-effect waves-light <?= color($config->color->accent) ?>">Contact Us</a>
                </div>
                <br><br>

            </div>
        </div>
        <div class="parallax"><img src="<?= asset('img/parallax-beans.jpg') ?>" alt="Main Banner"></div>
    </div>
</div>
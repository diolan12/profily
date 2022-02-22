<div id="home" class="parallax-container scrollspy">
    <div class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <br><br><br>
                <div class="header center pink-text text-darken-3">
                    <?php if ($config->web->brand_type->val1 == 'logo') : ?>
                        <img src="<?= asset('img/' . $config->web->brand_logo->val1); ?>" class="responsive-img" alt="Logo Long" />
                    <?php else : ?>
                        <h1 class="header center font-recursive <?= $config->web->style->val1 ?> <?= $config->web->style->val2 ?> "><?= $config->brand->information->val1; ?></h1>
                    <?php endif; ?>
                </div>
                <div class="row center">
                    <h5 class="header col s12 light font-recursive <?= $config->web->style->val1 ?> <?= $config->web->style->val2 ?>"><?= $config->brand->information->val2; ?></h5>
                </div>
                <div class="row center">
                    <a href="<?= $config->web->action->val2 ?>" target="_blank" class="btn-large waves-effect waves-light <?= color($config->color->accent) ?>"><?= $config->web->action->val1 ?></a>
                </div>
                <br><br>

            </div>
        </div>
        <div class="" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: -1;">
            <div class="slider slider-banner">

                <ul class="slides">
                    <?php shuffle($data->commodities);
                    foreach ($data->commodities as $commodity) :  ?>
                        <?php if ($commodity->image != null) : ?>
                            <li>
                                <img src="<?= $commodity->image->file ?>" alt="<?= $commodity->image->title ?>">
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </div>
</div>
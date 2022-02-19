<div id="product" class="scrollspy">
    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light white-text right-align animate">Delivering good quality products</h5>
                    <a href="<?= root('product') ?>" class="waves-effect <?= color($config->color->accent) ?> waves-light btn">Browse More</a>
                </div>
            </div>
        </div>
        <div class="parallax">
            <img src="<?= asset('img/' . $config->parallax->product->val1) ?>" alt="<?= $config->parallax->product->val1 ?>">
        </div>
    </div>

    <div class="container">
        <div class="section">
            <div class="row">

                <?php foreach ($data->commodities as $commodity) : ?>
                    <?php if ($commodity->image != null) : ?>
                        <div class="col s12 m6 l6 xl4">

                            <div class="card medium">
                                <div class="card-image">
                                    <img src="<?= $commodity->image->file ?>" class="materialboxed" data-caption="<?= $commodity->name ?>">
                                </div>
                                <div class="card-content">
                                    <span class="card-title"><?= $commodity->name ?></span>
                                    <p class="light"><?= substr($commodity->description1, 0, 126) ?>...</p>
                                </div>
                                <div class="card-action right-align">
                                    <a class="<?= color($config->color->accent, true) ?>-text" href="<?= root('commodity/' . beauty_to_kebab($commodity->name)) ?>">Browse <?= $commodity->name ?></a>
                                </div>
                            </div>

                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

</div>
<div id="product" class="scrollspy">


    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12 center font-recursive" data-aos="fade-up">
                    <h4>Our Excellent Products</h4>
                    <h5>We Are Ready To Supply The Global Market in Large Quantities
                    </h5>
                </div>
                <?php $delay = 0;
                foreach ($data->commodities as $commodity) : ?>
                    <?php if ($commodity->image != null) : ?>
                        <div class="col s12 m6 l6 xl4" data-aos="fade-up" data-aos-delay="<?= $delay ?>">

                            <div class="card medium">
                                <div class="card-image">
                                    <img src="<?= $commodity->image->file ?>" data-caption="<?= $commodity->name ?>">
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
                <?php $delay += 200;
                endforeach; ?>

                <div class="col s12 font-recursive right-align" data-aos="fade-up">
                    <a href="<?= root('product') ?>" class="waves-effect waves-light btn <?= color($config->color->accent) ?>"><i class="material-icons right">arrow_forward</i>Browse Products</a>

                </div>
            </div>
        </div>
    </div>

</div>
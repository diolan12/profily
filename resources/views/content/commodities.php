<!-- <?= component('banner', $extra) ?> -->

<?= component('commodity-slider', $extra) ?>

<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 center">
                <h4><?= htmlentities($data->commodity->name) ?></h4>
                <blockquote class="left-align"><?= htmlentities($data->commodity->description1) . ' ' . htmlentities($data->commodity->description2) ?></blockquote>
                <p class="left-align">Showing results for <?= $data->commodity->name ?>. <a href="<?= root('product') ?>">Click here</a> to see all products.</p>
            </div>
            <div>
                <?php foreach ($data->products as $product) : ?>
                    <?php if ($product->commodity != null && $product->type != null) : ?>
                        <div class="col s12 m6 l4 xl3">
                            <div class="card medium">
                                <div class="card-image">
                                    <img src="<?= $product->image->file ?>" class="materialboxed" data-caption="<?= $product->name ?>" alt="<?= $product->name ?>">
                                </div>
                                <div class="card-content">
                                    <span class="card-title"><?= $product->name ?></span>
                                    <p><?= $product->description ?></p>
                                </div>
                                <div class="card-action right-align">
                                    <a class="<?= color($config->color->accent, true) ?>-text" href="<?= root('product/' . beauty_to_kebab($product->name)) ?>">Details</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

        </div>

    </div>
</div>
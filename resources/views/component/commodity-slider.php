<div class="slider">
    <ul class="slides">
        <?php foreach ($data->commodities as $commodity) : ?>
            <li>
                <img src="<?= $commodity->image->file ?>" alt="<?= $commodity->image->title ?>">
                <div class="caption <?= random_align() ?>-align">
                    <h3><?= $commodity->name ?></h3>
                    <h5 class="light grey-text text-lighten-3"><?= $commodity->slogan ?></h5>
                    <a href="<?= root('commodity/' . beauty_to_kebab($commodity->name)) ?>" class="waves-effect waves-light btn <?= color($config->color->accent) ?>">browse <?= $commodity->name ?></a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
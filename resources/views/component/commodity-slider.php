<div class="slider">
    <ul class="slides">
        <?php shuffle($data->commodities);
        foreach ($data->commodities as $commodity) :  ?>
            <?php if ($commodity->image != null) : ?>
                <li>
                    <img src="<?= $commodity->image->file ?>" alt="<?= $commodity->image->title ?>">
                    <div class="caption <?= random_align() ?>-align">
                        <h3 class="font-recursive"><?= $commodity->name ?></h3>
                        <h5 class="light font-recursive grey-text text-lighten-3"><?= $commodity->slogan ?></h5>
                        <a href="<?= root('commodity/' . beauty_to_kebab($commodity->name)) ?>" class="waves-effect waves-light btn <?= color($config->color->accent) ?>">browse <?= $commodity->name ?></a>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>
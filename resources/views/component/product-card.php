<div class="col s12 m6 l4">
    <div class="card medium">
        <div class="card-image">
            <img src="<?= $image ?>" class="materialboxed">
        </div>
        <div class="card-content">
            <span class="card-title"><?= $name ?></span>
            <p><?= $description ?></p>
        </div>
        <div class="card-action right-align">
            <a class="<?= $config->color->accent->val1 ?>-text" href="<?= root('product/' . beauty_to_kebab($name)) ?>">Details</a>
        </div>
    </div>
</div>
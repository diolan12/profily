

<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 center">
                <h4>Gallery</h4>
            </div>
            <div>
                <?php foreach ($data->images as $image) : ?>
                    <div class="col s6 m6 l4 xl3">
                        <div class="card small">
                            <div class="card-image">
                                <img src="<?= $image->file ?>" class="materialboxed" data-caption="<?= $image->title ?>" alt="<?= $image->title ?>">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4"><?= $image->title ?></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4"><?= $image->title ?><i class="material-icons right">close</i></span>
                                <p class="light"><?= $image->credit ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </div>
</div>
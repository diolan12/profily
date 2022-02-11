<div id="testimony" class="scrollspy">

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center">
                    <h4>Testimony</h4>
                </div>
                
                <?php foreach ($data->testimonies as $testimony) : ?>
                    <div class="col s6 m4 l3">
                        <div class="card small">
                            <div class="card-content">
                                <span class="card-title grey-text text-darken-4"><?= $testimony->name?></span>
                                <blockquote><strong>&quot; <?= $testimony->quote?> &quot;</strong> <?= $testimony->country?></blockquote>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>
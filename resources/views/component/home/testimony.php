<div id="testimony" class="scrollspy">

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center" data-aos="fade-up">
                    <h4>Testimony</h4>
                </div>
                
                <?php $delay = 0;
                foreach ($data->testimonies as $testimony) : ?>
                    <div class="col s12 m4 l4 xl3" data-aos="fade-left" data-aos-delay="<?= $delay ?>">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title grey-text text-darken-4"><?= $testimony->name?></span>
                                <blockquote><strong>&quot; <?= $testimony->quote?> &quot;</strong> <?= $testimony->country?></blockquote>
                            </div>
                        </div>
                    </div>
                <?php $delay += 200;
            endforeach; ?>

            </div>

        </div>
    </div>
</div>
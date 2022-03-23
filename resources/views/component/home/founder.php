<div id="testimony" class="scrollspy">

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center" data-aos="fade-up">
                    <h4 class="font-recursive">Founder</h4>
                </div>

                <?php $delay = 0;
                foreach ($data->founders as $founder) : ?>

                    <div class="col s12 m4 l3" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                        <div class="card">
                            <img class="responsive-img circle" src="<?= $founder->avatar ?>">
                            <div class="card-content center">
                                <span class="card-title font-recursive"><?= $founder->name ?>
                                </span>
                                <p><?= $founder->position ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4 l3 hide" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                        <div class="card">
                            <div class="card-image">
                                <img src="<?= $founder->avatar ?>">
                                <span class="card-title"><?= $founder->name ?>
                                    <!-- <?= $founder->position ?> -->
                                </span>
                            </div>
                        </div>
                    </div>
                <?php $delay += 100;
                endforeach; ?>

            </div>

        </div>
    </div>
</div>
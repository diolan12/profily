<div id="testimony" class="scrollspy">
    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="col s12 light white-text"></h5>
                </div>
            </div>
        </div>
        <div class="parallax">
            <img src="<?= asset('img/' . $config->parallax->founder->val1) ?>" alt="<?= $config->parallax->product->val1 ?>">
        </div>
    </div>

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center" data-aos="fade-up">
                    <h4>Founder</h4>
                </div>

                <?php $delay = 0;
                foreach ($data->founders as $founder) : ?>
                    <div class="col s12 m4 l3" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                        <div class="card">
                            <div class="card-image">
                                <img src="<?= $founder->avatar ?>">
                                <span class="card-title"><?= $founder->name ?></span>
                            </div>
                        </div>
                    </div>
                <?php $delay += 100;
                endforeach; ?>

            </div>

        </div>
    </div>
</div>
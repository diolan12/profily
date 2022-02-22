<div id="about" class="scrollspy">
    <div class="container">

        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m6 l6 center" data-aos="fade-up" data-aos-delay="50">
                    <h4 class="font-recursive"><?= $config->brand->about->val1 ?></h4>
                    <p class="justify flow-text font-recursive"><?= $config->brand->about->val2 ?></p>
                </div>
                <div class="col s12 m6 float row">
                    <div class="col s12 m12 xl6" data-aos="fade-up" data-aos-delay="150">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title font-recursive"><strong><?= $config->brand->vision->val1 ?></strong></span>
                                <p class="font-recursive"><?= $config->brand->vision->val2 ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 xl6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title font-recursive"><strong><?= $config->brand->mission->val1 ?></strong></span>
                                <p class="font-recursive"><?= $config->brand->mission->val2 ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 center" data-aos="fade-up">
                    <h4 class="font-recursive">Value</h4>
                    <div class="row">

                        <?php $delay = 0;
                        foreach ($config->value as $value) : ?>
                            <div class="col s12 m6 l3" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                                <div class="icon-block card-panel">
                                    <h2 class="center <?= color($config->color->accent, true) ?>-text">
                                        <i class="medium material-icons"><?= $value->val1 ?></i>
                                    </h2>
                                    <h5 class="center font-recursive"><?= $value->val2 ?></h5>

                                    <p class="light font-recursive"><?= $value->val3 ?></p>
                                </div>
                            </div>
                        <?php $delay += 100;
                        endforeach; ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div id="about" class="scrollspy">
    <div class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 center">
                    <h4>About Us</h4>
                    <p class="left-align"><?= $config->brand->about->val1 ?></p>
                </div>
                <div class="col s12 center">
                    <h4>Vision and Mission</h4>
                    <div class="row">
                        <div class="col s12 center">
                            <p class="left-align "><?= $config->brand->vision->val1 ?></p>
                        </div>

                        <?php foreach ($config->mission as $mission) : ?>
                            <div class="col s12 m4">
                                <div class="icon-block">
                                    <h2 class="center <?= color($config->color->accent, true) ?>-text">
                                        <i class="medium material-icons"><?= $mission->val1 ?></i>
                                    </h2>

                                    <p><?= $mission->val2 ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
                <div class="col s12 center">
                    <h4>Value</h4>
                    <div class="row">

                        <?php foreach ($config->value as $value) : ?>
                            <div class="col s6 m3">
                                <div class="icon-block">
                                    <h5 class="center"><?= $value->val1 ?></h5>

                                    <p class="light"><?= $value->val2 ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
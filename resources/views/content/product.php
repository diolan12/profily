<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 center">
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            </div>
            <div class="col s12 center">
                <div class="col s12 m5">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= $data->product->image->file ?>" data-caption="<?= $data->product->name ?>" alt="<?= $data->product->name ?>" class="materialboxed">
                        </div>
                    </div>
                </div>
                <img class="hide col s12 m5 materialboxed responsive-img" src="<?= $data->product->image->file ?>" >
                <h4><?= $data->product->name ?></h4>



                <ul class="left-align">
                    <li>Commodity: <b><?= $data->product->commodity->name ?></b></li>
                    <?php if ($data->product->type != null) : ?>
                        <li>Type: <b class="tooltipped" data-position="bottom" data-tooltip="<?= $data->product->type->description ?>"><?= $data->product->type->name ?></b></li>
                    <?php endif; ?>
                </ul>
                <p class="left-align"><?= $data->product->description ?></p>

                <div class="left-align col s12">
                    <div class="col s12 m6">
                        <h5>Specifications</h5>
                        <ul class="list">
                            <?php
                            foreach ($data->product->specification as $specification) {
                                echo '<li><i class="material-icons small">chevron_right</i><p>' . $specification->value . '</p></li>';
                                if (count($specification->subspecification) != 0) {
                                    echo '<ul class="sub-list">';
                                    foreach ($specification->subspecification as $subspecification) {
                                        echo '<li><i class="material-icons small">arrow_right</i><p>' . $subspecification->value . '</p></li>';
                                    }
                                    echo '</ul>';
                                }
                            }
                            ?>
                        </ul>
                    </div>

                    <?php if ($data->product->commodity->id == 1) : ?>
                        <div class="col s12 m6">
                            <h5>Process</h5>
                            <ul class="list">
                                <?php if ($data->product->type->id == 1) : ?>
                                    <li><i class="material-icons small">chevron_right</i>
                                        <p>Semi wash</p>
                                    </li>
                                    <li><i class="material-icons small">chevron_right</i>
                                        <p>Full wash</p>
                                    </li>
                                    <li><i class="material-icons small">chevron_right</i>
                                        <p>Wine</p>
                                    </li>
                                    <li><i class="material-icons small">chevron_right</i>
                                        <p>Natural</p>
                                    </li>
                                <?php endif; ?>
                                <?php if ($data->product->type->id == 2) : ?>
                                    <li><i class="material-icons small">chevron_right</i>
                                        <p>Semi wash</p>
                                    </li>
                                    <li><i class="material-icons small">chevron_right</i>
                                        <p>Full wash</p>
                                    </li>
                                    <li><i class="material-icons small">chevron_right</i>
                                        <p>Natural</p>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </div>
</div>

<?php if ($data->product->commodity->id == 1) : ?>

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center">
                    <h5>Roasting</h5>
                    <div class="center-align col s12 m8">
                        <img src="<?= asset('img/roast-level.jpg') ?>" alt="Beans roast level" class="responsive-img" />
                    </div>
                    <div class="left-align col s12 m4">
                        <!-- <h5>Robusta:</h5> -->
                        <ul class="list">
                            <li><i class="material-icons small">chevron_right</i>
                                <p>Light</p>
                            </li>
                            <li><i class="material-icons small">chevron_right</i>
                                <p>Medium</p>
                            </li>
                            <li><i class="material-icons small">chevron_right</i>
                                <p>Medium dark</p>
                            </li>
                            <li><i class="material-icons small">chevron_right</i>
                                <p>Dark & more</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php endif; ?>
<div id="testimony" class="scrollspy">
    <!-- <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="col s12 light white-text">Here is what our happy customer says</h5>
                </div>
            </div>
        </div>
        <div class="parallax">
            <img src="https://materializecss.com/templates/parallax-template/background3.jpg" alt="Unsplashed background img 3">
        </div>
    </div> -->

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center">
                    <h4>Founder</h4>
                </div>

                <?php foreach ($data->founders as $founder) : ?>
                    <div class="col s6 m4 l3">
                        <div class="card">
                            <div class="card-image">
                                <img src="<?= $founder->picture->file ?>">
                                <span class="card-title"><?= $founder->name ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>
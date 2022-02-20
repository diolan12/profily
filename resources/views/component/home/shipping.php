<div id="shipping" class="scrollspy">
    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light white-text"></h5>
                </div>
            </div>
        </div>
        <div class="parallax">
            <img src="<?= asset('img/' . $config->parallax->shipping->val1) ?>" alt="<?= $config->parallax->shipping->val1 ?>">
        </div>
    </div>

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center hide-on-small-only" data-aos="fade-up">
                    <h4>Shipping Incoterms</h4>
                    <div class="tf-tree tf-gap-lg">
                        <ul>
                            <li>
                                <span class="tf-nc">Shipping</span>
                                <ul>
                                    <li><span class="tf-nc">Free On Board</span></li>
                                    <li><span class="tf-nc">Cost, Insurance, Freight</span></li>
                                    <li><span class="tf-nc">Domestic Shipping</span></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col s12 center hide-on-med-and-up" data-aos="fade-up">
                    <h4>Shipping Incoterms</h4>
                    <div class="col s12 m6 offset-m3">
                        <p><i class="material-icons left green-text">done</i>Free On Board</p>
                        <p><i class="material-icons left green-text">done</i>Cost, Insurance, Freight</p>
                        <p><i class="material-icons left green-text">done</i>Domestic Shipping</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
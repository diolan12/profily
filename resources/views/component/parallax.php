<?php
if (!isset($text)) {
    $text = 'A modern responsive front-end framework based on Material Design';
}
if (!isset($image)) {
    $image = 'https://materializecss.com/templates/parallax-template/background1.jpg';
}
if (!isset($alt)) {
    $alt = 'Unsplashed background img';
}
?>
<div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row center">
                <h5 class="header col s12 light white-text"><?= $text?></h5>
            </div>
        </div>
    </div>
    <div class="parallax"><img src="<?= $image?>" alt="Unsplashed background img 2"></div>
</div>
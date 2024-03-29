<div class="container">
    <div class="row">
        <div class="col l6 s12">
            <h5 class="white-text font-recursive">Company Bio</h5>
            <p class="white-text font-recursive"><?= $config->brand->about->val2 ?></p>
            <p class="white-text font-recursive"><?= $config->brand->information->val3 ?>, <?= $config->brand->information->val4 ?></p>
        </div>
        <div class="col s5 l3">
            <h5 class="white-text font-recursive">Useful Links</h5>
            <ul>
                <?php if ($user != null) : ?>
                    <li><a href="<?= rootDashboard() ?>" class="white-text">Dashboard</a></li>
                <?php endif; ?>
                <li><a href="<?= root('cookies-policy') ?>" class="white-text">Cookies Policy</a></li>
            </ul>
        </div>
        <div class="col s7 l3">
            <h5 class="white-text font-recursive">Connect</h5>
            <ul>
                <?php foreach ($config->connect as $key => $value) {
                    $href = "";
                    if ($value->val1 == 'email') {
                        $href = "mailto:";
                    }
                    if ($value->val1 == 'phone') {
                        $href = "tel:";
                    }
                    $href .= $value->val2;
                    echo '<li><a class="white-text" href="' . $href . '" target="_blank">' . $value->val3 . '</a></li>';
                } ?>
            </ul>
        </div>
    </div>
</div>
<div class="footer-copyright <?= color($config->color->secondary) ?>">
    <div class="container">
        <h6 class="valign-wrapper hide-on-small-only">Made with <i class="material-icons red-text element-word-spacing"> favorite </i> by <a class="white-text text-lighten-3 element-word-spacing" href="https://www.instagram.com/john.d.egalitarian/" target="_blank"> Dio Lantief</a> designed with <a class="pink-text text-lighten-4 element-word-spacing" href="https://materializecss.com/" target="_blank">Materialize CSS</a></h6>
        <?= $config->brand->information->val2 ?> © <?= date('Y') ?>, All rights reserved.
    </div>
</div>
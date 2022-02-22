<?php
if ($fab->whatsapp == null) {
    $tooltip = 'Chat via Whatsapp';
    $href = $config->connect->connect_whatsapp->val2;
} else {
    $href = $fab->whatsapp->link;
    $tooltip = $fab->whatsapp->tooltip;
}
?>

<div class="fixed-action-btn">
    <a class="btn-floating btn-large <?php if ($fab->pulse) echo 'pulse' ?> <?= color($config->color->accent) ?>">
        <i class="large material-icons">whatsapp</i>
    </a>
    <ul>
        <li><a class="btn-floating yellow darken-2 tooltipped modal-trigger" href="#cookies-policy" data-position="left" data-tooltip="Cookies Policy"><i class="material-icons">gavel</i></a></li>
        <li><a class="btn-floating teal accent-4 tooltipped" href="<?= $href ?>" data-position="left" data-tooltip="<?= $tooltip ?>" target="_blank"><i class="material-icons">whatsapp</i></a></li>
    </ul>
</div>
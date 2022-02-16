<?php if ($pagination != null) : ?>
    <style>
        .pagination li.active {
            background-color: <?= color($config->color->accent, false, false, true) ?> !important;
        }
    </style>
    <?php if ($pagination->total > 1) : ?>
        <div class="row">
            <div class="col s12 center">
                <ul class="pagination">
                    <li class="<?php if ($pagination->current == 1) echo 'disabled';
                                else echo 'waves-effect' ?>">
                        <a <?php if ($pagination->current != 1) echo 'href="' . root($pagination->path) . '"' ?>>
                            <i class="material-icons">chevron_left</i>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $pagination->total; $i++) : ?>
                        <li class="<?php if ($pagination->current == $i) echo 'active';
                                    else echo 'waves-effect'; ?>">
                            <a href="<?= root($pagination->path . '?page=' . $i) ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="<?php if ($pagination->current == $pagination->total) echo 'disabled';
                                else echo 'waves-effect'; ?>">
                        <a <?php if ($pagination->current != $pagination->total) echo 'href="' . root($pagination->path . '?page=' . $pagination->total) . '"'
                            ?>>
                            <i class="material-icons">chevron_right</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
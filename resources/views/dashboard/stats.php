<div class="">
    <?php if ($server['client']['refresh']) : ?>
        <div class="progress">
            <div id="stat_reload" class="determinate <?= color($config->color->accent, false, false)?>" style="width: 0%"></div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col s12 m6">
            <?= component('dashboard.stat-visit-daily', $extra) ?>
        </div>
        <div class="col s12 m6">
            <?= component('dashboard.stat-visit-yearly', $extra) ?>
        </div>
        <div class="col s12">
            <?= component('dashboard.stat-visit-monthly', $extra) ?>
        </div>
        <div class="col s12">
            <?= component('dashboard.stat-view-monthly', $extra) ?>
        </div>
    </div>
    <?php if ($server['client']['refresh']) : ?>
        <script>
            var estimatedSecond = <?= $server['client']['refresh'] ?>;
            var width = 0;
            var delay = 100 * estimatedSecond / 10;
            var runnable = setInterval(function() {
                $('#stat_reload').css('width', width + '%');
                width++;
                if (width > 100) {
                    clearInterval(runnable);
                }
            }, delay);
        </script>
    <?php endif; ?>

</div>
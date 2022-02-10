<div class="">
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
</div>
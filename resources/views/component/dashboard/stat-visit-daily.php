<?php

use Carbon\Carbon;

$lastVisitortodayCount = 0;
if ($data->visitors_today != null) {
    $lastVisitortodayCount = $data->visitors_today->count;
}

$mostViewedProduct = "No data today";
if (count($data->views_today) > 0) {
    $mostViewedProduct = $data->views_today[0]->product->name . " (" . $data->views_today[0]->count . " views)";
}
?>
<div class="card">
    <div class="card-content">
        <span class="card-title">Visitors today</span>
        <h4><?= $lastVisitortodayCount ?> People</h4>
        <p>Server time: <strong><?= Carbon::now()->format('Y-m-d H:i:s T')?></strong></p>
        <p>Last visitor: <strong id="last_visitor_at">No data</strong></p>
        <p>Most viewed product: <strong><?= $mostViewedProduct ?></strong></p>
        <?php if (count($data->views_today) != 0) : ?>
            <ul>
                <?php foreach (array_slice($data->views_today, 0, 5) as $view) : ?>
                    <li>
                        <p>- (<?= $view->count ?> views) <?= $view->product->name ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
<?php if ($data->visitors_today != null) : ?>
    <script>
        var lastVisitAt = <?= utc_to_locale_string(js_utc_date($data->visitors_today->updated_at))?>;
        $('#last_visitor_at').text(lastVisitAt);
    </script>
<?php endif; ?>
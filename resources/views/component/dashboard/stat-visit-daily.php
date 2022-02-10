<?php

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
        <p id="last_visitor_at">Last visitor: No data</p>
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
        $('#last_visitor_at').text('Last visitor: ' + lastVisitAt);
    </script>
<?php endif; ?>
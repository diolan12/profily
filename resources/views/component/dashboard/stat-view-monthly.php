<?php

use Carbon\Carbon;

$datasets = [];
$dayThisMonth = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
$dates = range(1, $dayThisMonth);
$label = [];
foreach ($dates as $key => $value) {
    $date = '';
    if (substr((string)$value, strlen($value) - 1) == '1') {
        if ((string)$value == '11') {
            $date = $value . 'th';
        } else {
            $date = $value . 'st';
        }
    } else if (substr((string)$value, strlen($value) - 1) == '2') {
        $date = $value . 'nd';
    } else if (substr((string)$value, strlen($value) - 1) == '3') {
        $date = $value . 'rd';
    } else {
        $date = $value . 'th';
    }
    $label[$key] = $date;
}

$productsLabel = [];
$products = [];
foreach ($data->views_month as $view) {
    if (!in_array($view->product->name, $productsLabel)) {
        $productsLabel[] = $view->product->name;
        $products[] = [
            'label' => $view->product->name,
            'records' => [$view]
        ];
    } else {
        $productIndex = array_search($view->product->name, $productsLabel);
        $products[$productIndex]['records'][] = $view;
    }
}
foreach ($products as $index => $product) {
    $productData = range(0, count($product['records']) - 1);
    foreach ($product['records'] as $key => $view) {
        $productData[(int) Carbon::parse($view->updated_at, 'UTC')->format('d') - 1] += $view->count;
    }
    $r = rand(0, 255);
    $g = rand(0, 255);
    $b = rand(0, 255);
    $datasets[] = [
        'label' => $product['label'],
        'data' => $productData,
        'hidden' => $index > 2,
        'backgroundColor' => "rgba($r, $g, $b, 1)",
        'borderColor' => "rgba($r, $g, $b, 1)",
        'borderWidth' => 1
    ];
}
?>
<div class="card">
    <div class="card-content">
        <span class="card-title">Products views on <?= Carbon::now('UTC')->monthName ?></span>
        <canvas id="view_month" width="400" height="350"></canvas>
    </div>
</div>
<script>
    const views_month_label = <?= json_encode($label) ?>;
    // console.log(visitors_month_label);

    const elem_view_month = document.getElementById('view_month').getContext('2d');
    const chart_view_month = new Chart(elem_view_month, {
        type: 'line',
        data: {
            labels: views_month_label,
            datasets: <?= json_encode($datasets) ?>
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            },
            elements: {
                line: {
                    tension: 0.30
                }
            }
        },
        cubicInterpolationMode: 'default'
    });
</script>
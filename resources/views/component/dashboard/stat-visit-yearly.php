<?php

use Carbon\Carbon;

$label = array_reduce(range(0, 11), function ($rslt, $m) {
    $rslt[$m] = date('F', mktime(0, 0, 0, $m + 1, 10));
    return $rslt;
});

$visitor_month = [];
foreach ($label as $key => $date) {
    $visitor_month[$key] = 0;
}
$totalThisYear = 0;
foreach ($data->visitors_year as $visitor) {
    // $t = $visitor_month[(int) Carbon::parse($visitor->created_at, 'UTC')->setTimezone('Asia/Jakarta')->format('m') - 1];
    $visitor_month[(int) Carbon::parse($visitor->created_at, 'UTC')->setTimezone('Asia/Jakarta')->format('m') - 1] += $visitor->count;
    $totalThisYear += $visitor->count;
}
?>
<div class="card">
    <div class="card-content">
        <span class="card-title">Total <?= number_format($totalThisYear) ?> visitors in <?= Carbon::now('UTC')->year ?></span>
        <canvas id="visitor_year" width="400" height="300"></canvas>
    </div>
</div>
<script>
    const visitors_year_label = <?= json_encode($label) ?>;
    // console.log(visitors_year_label);

    const visitors_year = <?= json_encode($visitor_month) ?>;
    // console.log(visitors_year);

    const elem_visitor_year = document.getElementById('visitor_year').getContext('2d');
    const chart_visitor_year = new Chart(elem_visitor_year, {
        type: 'line',
        data: {
            labels: visitors_year_label,
            datasets: [{
                label: 'Visitors',
                data: visitors_year,
                backgroundColor: [
                    '<?= color($config->color->accent, false, false, true) ?>'
                ],
                borderColor: [
                    '<?= color($config->color->accent, false, false, true) ?>'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false,
                }
            },
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
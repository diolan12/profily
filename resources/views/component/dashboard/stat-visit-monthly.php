<?php

use Carbon\Carbon;

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

$visitor_month = [];
foreach ($dates as $key => $date) {
    $visitor_month[$key] = 0;
}
$totalThisMonth = 0;
foreach ($data->visitors_month as $visitor) {
    // $m = $visitor_month[(int) Carbon::parse($visitor->updated_at, 'UTC')->setTimezone('Asia/Jakarta')->format('d') - 1];
    $visitor_month[(int) Carbon::parse($visitor->updated_at, 'UTC')->format('d') - 1] += $visitor->count;
    $totalThisMonth += $visitor->count;
}
?>
<div class="card">
    <div class="card-content">
        <span class="card-title">Total <?= number_format($totalThisMonth) ?> visitors in <?= Carbon::now('UTC')->monthName ?></span>
        <canvas id="visitor_month" width="400" height="200"></canvas>
    </div>
</div>
<script>
    const visitors_month_label = <?= json_encode($label) ?>;
    // console.log(visitors_month_label);

    const visitors_month = <?= json_encode($visitor_month) ?>;
    // console.log(visitors_month);

    const elem_visitor_month = document.getElementById('visitor_month').getContext('2d');
    const chart_visitor_month = new Chart(elem_visitor_month, {
        type: 'line',
        data: {
            labels: visitors_month_label,
            datasets: [{
                label: 'Visitors',
                data: visitors_month,
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
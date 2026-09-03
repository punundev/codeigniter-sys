<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Stock Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm border-0 stock-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-muted mb-1">Total Items</p>
                        <h2><?= esc($totalItems) ?></h2>
                    </div>
                    <div class="text-primary">
                        <i class="mdi mdi-package-variant" style="font-size:45px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card shadow-sm border-0 stock-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-muted mb-1">Stock In</p>
                        <h2 class="text-success"><?= esc($stockIn) ?></h2>
                    </div>
                    <div class="text-success">
                        <i class="mdi mdi-arrow-down-bold-circle" style="font-size:45px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card shadow-sm border-0 stock-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-muted mb-1">Stock Out</p>
                        <h2 class="text-danger"><?= esc($stockOut) ?></h2>
                    </div>
                    <div class="text-danger">
                        <i class="mdi mdi-arrow-up-bold-circle" style="font-size:45px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card shadow-sm border-0 stock-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-muted mb-1">Current Avalible</p>
                        <h2 class="text-info"><?= esc($balance) ?></h2>
                    </div>
                    <div class="text-info">
                        <i class="mdi mdi-warehouse" style="font-size:45px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="card-title mb-1">Task Status</h4>
                        <p class="text-muted mb-0">Task status by time period</p>
                    </div>

                    <div style="width: 160px;">
                        <select id="taskPeriod" class="form-control">
                            <option value="day">Daily</option>
                            <option value="week">Weekly</option>
                            <option value="month">Monthly</option>
                            <option value="year">Yearly</option>
                        </select>
                    </div>
                </div>

                <div style="height: 400px;">
                    <canvas id="taskStackedBarChart"></canvas>
                </div>

                <div id="taskChartLoading" class="text-center" style="display:none;">
                    Loading...
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let taskChart = null;

    const periodSelect = document.getElementById('taskPeriod');
    const canvas = document.getElementById('taskStackedBarChart');
    const loading = document.getElementById('taskChartLoading');

    function loadTaskChart() {
        const period = periodSelect.value;
        loading.style.display = 'block';

        fetch(
            "<?= site_url('admin/task/dashboard-chart') ?>" +
            "?period=" +
            encodeURIComponent(period)
        )
        .then(response => {
            if (!response.ok) {
                throw new Error('Unable to load task chart');
            }
            return response.json();
        })
        .then(response => {
            const data = response.data || [];
            const labels = data.map(item => item.period_label);

            const openData = data.map(item => Number(item.open_count));
            const inProgressData = data.map(item => Number(item.in_progress_count));
            const completedData = data.map(item => Number(item.completed_count));
            const pendingData = data.map(item => Number(item.pending_count));

            if (taskChart) {
                taskChart.destroy();
            }

            taskChart = new Chart(
                canvas,
                {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Open',
                                data: openData,
                                backgroundColor: '#4d7cff',
                                borderColor: '#4d7cff',
                                stack: 'status'
                            },
                            {
                                label: 'In Progress',
                                data: inProgressData,
                                backgroundColor: '#8862e0',
                                borderColor: '#8862e0',
                                stack: 'status'
                            },
                            {
                                label: 'Pending',
                                data: pendingData,
                                backgroundColor: '#ff6258',
                                borderColor: '#ff6258',
                                stack: 'status'
                            },
                            {
                                label: 'Completed',
                                data: completedData,
                                backgroundColor: '#00b894',
                                borderColor: '#00b894',
                                stack: 'status'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                stacked: true,
                                grid: {
                                    display: false
                                }
                            },
                            y: {
                                stacked: true,
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                },
                                title: {
                                    display: true,
                                    text: 'Number of Tasks'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'top'
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                                callbacks: {
                                    footer: function (tooltipItems) {
                                        let total = 0;
                                        tooltipItems.forEach(function (item) {
                                            total += Number(item.raw);
                                        });
                                        return 'Total: ' + total;
                                    }
                                }
                            }
                        }
                    }
                }
            );
        })
        .catch(error => {
            console.error('Task chart error:', error);
        })
        .finally(function () {
            loading.style.display = 'none';
        });
    }

    periodSelect.addEventListener('change', function () {
        loadTaskChart();
    });

    loadTaskChart();
});
</script>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Inventory by Manufacturer</h4>
                <p class="card-description">Distribution of inventory by manufacturer</p>
                <div style="height: 450px;">
                    <canvas id="manufacturerPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const manufacturerData = <?= json_encode($manufacturerData ?? []) ?>;
    const labels = manufacturerData.map(item => item.manufacturer);
    const values = manufacturerData.map(item => Number(item.total));

    const ctx = document.getElementById('manufacturerPieChart').getContext('2d');

    const outsideLabelsPlugin = {
        id: 'outsideLabels',
        afterDraw(chart) {
            const { ctx } = chart;
            const dataset = chart.data.datasets[0];
            const meta = chart.getDatasetMeta(0);
            const total = dataset.data.reduce((sum, value) => sum + Number(value), 0);

            meta.data.forEach((arc, index) => {
                const angle = (arc.startAngle + arc.endAngle) / 2;
                const percentage = ((dataset.data[index] / total) * 100).toFixed(0) + '%';
                const insideRadius = arc.innerRadius + (arc.outerRadius - arc.innerRadius) * 0.55;
                const insideX = arc.x + Math.cos(angle) * insideRadius;
                const insideY = arc.y + Math.sin(angle) * insideRadius;

                ctx.save();
                ctx.fillStyle = '#222';
                ctx.font = 'bold 14px Arial';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText(percentage, insideX, insideY);

                const lineStartRadius = arc.outerRadius + 5;
                const lineEndRadius = arc.outerRadius + 35;
                const startX = arc.x + Math.cos(angle) * lineStartRadius;
                const startY = arc.y + Math.sin(angle) * lineStartRadius;
                const endX = arc.x + Math.cos(angle) * lineEndRadius;
                const endY = arc.y + Math.sin(angle) * lineEndRadius;

                ctx.beginPath();
                ctx.moveTo(startX, startY);
                ctx.lineTo(endX, endY);
                ctx.strokeStyle = '#777';
                ctx.lineWidth = 1;
                ctx.stroke();

                const textDistance = 12;
                let textX = endX + (Math.cos(angle) >= 0 ? textDistance : -textDistance);
                let textY = endY;

                ctx.font = '14px Arial';
                ctx.fillStyle = '#222';
                ctx.textBaseline = 'middle';

                if (Math.cos(angle) >= 0) {
                    ctx.textAlign = 'left';
                } else {
                    ctx.textAlign = 'right';
                }

                ctx.fillText(labels[index], textX, textY);
                ctx.restore();
            });
        }
    };

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: values,
                backgroundColor: [
                    '#5B5DB5',
                    '#50BDBB',
                    '#F16F70',
                    '#F5B041',
                    '#8E7CC3',
                    '#7CB342',
                    '#EC407A',
                    '#42A5F5'
                ],
                borderColor: '#ffffff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: true,
                    callbacks: {
                        label: function (context) {
                            const total = context.dataset.data.reduce((sum, value) => sum + Number(value), 0);
                            const value = Number(context.raw);
                            const percentage = ((value / total) * 100).toFixed(1);
                            return context.label + ': ' + value + ' (' + percentage + '%)';
                        }
                    }
                }
            },
            layout: {
                padding: {
                    top: 40,
                    bottom: 40,
                    left: 60,
                    right: 60
                }
            }
        },
        plugins: [outsideLabelsPlugin]
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?= $this->endSection() ?>

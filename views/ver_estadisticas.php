<?php
require_once __DIR__ . '/../php/ObtenerEstadisticas.php';
?>
<link rel="stylesheet" href="./css/ver_estadisticas.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<main class="stats-container">
    <div class="stats-header">
        <h1 class="stats-title">Estadísticas de Gastos</h1>
        <p class="stats-subtitle">Visualiza tus gastos por día de la semana</p>
    </div>

    <div class="stats-summary">
        <div class="summary-card">
            <span class="summary-label">Total Gastado Esta Semana</span>
            <span class="summary-value">$<?php echo number_format($totalGeneral, 2); ?></span>
        </div>
    </div>

    <div class="chart-container">
        <canvas id="gastosChart"></canvas>
    </div>

    <div class="stats-table-container">
        <table class="stats-table">
            <thead>
                <tr>
                    <th>Día</th>
                    <th>N° Gastos</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ordenDias = [2, 3, 4, 5, 6, 7, 1];
                foreach ($ordenDias as $diaNum):
                ?>
                    <tr>
                        <td><?php echo $diasSemana[$diaNum]['nombre']; ?></td>
                        <td class="center"><?php echo $diasSemana[$diaNum]['cantidad']; ?></td>
                        <td class="amount">$<?php echo number_format($diasSemana[$diaNum]['total'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<script>
    const ctx = document.getElementById('gastosChart').getContext('2d');
    const labels = <?php echo json_encode($labelsChart); ?>;
    const datos = <?php echo json_encode($datosChart); ?>;

    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(152, 206, 0, 0.8)');
    gradient.addColorStop(1, 'rgba(152, 206, 0, 0.1)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Gastos (S/.)',
                data: datos,
                backgroundColor: gradient,
                borderColor: '#98CE00',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
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
                    backgroundColor: 'rgba(0, 16, 17, 0.9)',
                    titleColor: '#98CE00',
                    bodyColor: '#FFFFFC',
                    borderColor: '#98CE00',
                    borderWidth: 1,
                    padding: 12,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return '$' + context.parsed.y.toFixed(2);
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(255, 255, 252, 0.1)'
                    },
                    ticks: {
                        color: '#000',
                        callback: function(value) {
                            return 'S/.' + value;
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#000'
                    }
                }
            }
        }
    });
</script>
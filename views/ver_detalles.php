<?php
require_once __DIR__ . '/../php/MostrarDetalles.php';

// Calcular fechas anterior y siguiente
$fechaObj = DateTime::createFromFormat('Y-m-d', $fecha);
$fechaAnterior = (clone $fechaObj)->modify('-1 day')->format('Y-m-d');
$fechaSiguiente = (clone $fechaObj)->modify('+1 day')->format('Y-m-d');
?>
<link rel="stylesheet" href="./css/ver_detalles.css">

<main class="details-container">
    <div class="details-header">
        <h1 class="details-title">Detalles de Gastos</h1>
        <p class="details-date">Viendo gastos del día</p>
    </div>

    <div class="pagination-controls">
        <a href="index.php?vista=ver_detalles&fecha=<?php echo $fechaAnterior; ?>" class="btn-nav-date">
            <img class="pagination-icon" src="../img/fecha-izquierda.png" alt="Anterior">
        </a>
        <span class="current-date-display"><?php echo $fechaObj->format('d/m/Y'); ?></span>
        <a href="index.php?vista=ver_detalles&fecha=<?php echo $fechaSiguiente; ?>" class="btn-nav-date">
            <img class="pagination-icon" src="../img/flecha-derecha.png" alt="Siguiente">
        </a>
    </div>

    <div class="total-summary">
        Total: <span class="total-amount">$<?php echo isset($totalDia) ? number_format($totalDia, 2) : '0.00'; ?></span>
    </div>

    <div class="expenses-table-container">
        <?php if (!empty($detallesGastos)): ?>
            <table class="expenses-table">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Descripción</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $numero = 1; ?>
                    <?php foreach ($detallesGastos as $gasto): ?>
                        <tr>
                            <td class="expense-id-cell"><?php echo $numero++; ?></td>
                            <td class="expense-desc-cell"><?php echo !empty($gasto['descripcion']) ? htmlspecialchars($gasto['descripcion']) : 'Sin descripción'; ?></td>
                            <td class="expense-amount-cell">$<?php echo number_format($gasto['monto'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-expenses">
                <p>No hay gastos registrados para este día.</p>
            </div>
        <?php endif; ?>
    </div>
</main>
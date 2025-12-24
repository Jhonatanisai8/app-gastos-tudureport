<?php
require_once __DIR__ . '/../php/ListarCategorias.php';
?>
<div class="expense-form-container">
    <div class="expense-card">
        <header class="form-header">
            <h2>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
                Nuevo Gasto
            </h2>
        </header>

        <form action="guardar_gasto.php" method="POST">

            <div class="form-group">
                <label class="form-label">Monto del Gasto</label>
                <input type="number" name="monto" class="form-control input-monto" step="0.01" placeholder="0.00" required>
            </div>

            <div class="form-group">
                <label class="form-label">Categoría</label>
                <select name="id_categoria" class="form-control" required>
                    <option value="" disabled selected>Selecciona una categoría</option>
                    <?php
                    foreach ($categorias as $categoria) {
                        echo '<option value="' . $categoria['id'] . '">' . htmlspecialchars($categoria['nombre']) . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Descripción</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Ej: Cena en restaurante" maxlength="255">
                <p class="helper-text">¿En qué gastaste este dinero?</p>
            </div>

            <button type="submit" class="btn-save">
                Guardar Gasto
            </button>
        </form>
    </div>
</div>
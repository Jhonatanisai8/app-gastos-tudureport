  <?php
    require_once __DIR__ . '/../php/MostrarGasto.php';
    $nombreUsuario = $_SESSION['nombre_usuario'];
    $id = $_SESSION['id_usuario'];
    ?>
  <main class="home-container">
      <section class="welcome-card hero-card">
          <div class="decorative-icon">
              <img class="login-header-logo" src="../img/logo.png" alt="">
          </div>

          <h1 class="title">Inicio</h1>

          <h3 class="subtitle">
              Bienvenido de nuevo
              <span class="user-name">
                  <?php echo $nombreUsuario; ?>
              </span>
          </h3>
      </section>

      <section class="welcome-card expense-card">
          <p class="expense-label">Monto que has gastado hoy</p>

          <div class="expense-amount">
              $
              <?php
                if (!empty($gastos)) {
                    echo number_format($gastos[0]['total_diario'], 2);
                } else {
                    echo "0.00";
                }
                ?>
          </div>

          <div style="margin-top: 20px;">
              <a href="index.php?vista=ver_detalles" style="display: inline-flex; align-items: center; gap: 8px; width: 180px; justify-content: center; padding: 10px 20px; background-color: white; color: #2563eb; text-decoration: none; border-radius: 8px; font-weight: 700; font-size: 0.9rem; transition: all 0.2s ease; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                  <img src="./img/home_detalles.png" alt="" style="width: 20px; height: 20px;">
                  Ver detalles
              </a>
          </div>
          <div style="margin-top: 20px;">
              <a href="index.php?vista=ver_estadisticas" style="display: inline-flex; align-items: center; gap: 8px; width: 180px; justify-content: center; padding: 10px 20px; background-color: white; color: #2563eb; text-decoration: none; border-radius: 8px; font-weight: 700; font-size: 0.9rem; transition: all 0.2s ease; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                  <img src="./img/home_estadisticas.png" alt="" style="width: 20px; height: 20px;">
                  Ver Estadisticas
              </a>
          </div>
      </section>
  </main>
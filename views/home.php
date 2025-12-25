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
      </section>
  </main>
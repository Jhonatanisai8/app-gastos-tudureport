                <?php
                $nombreUsuario = $_SESSION['nombre_usuario'];
                $id = $_SESSION['id_usuario'];
                ?>
                <main class="home-container">
                    <div class="welcome-card">
                        <div class="decorative-icon">
                            <img src="../img/icon-home.png" alt="Icono de Home" width="40">
                        </div>
                        <h1 class="title">Inicio</h1>
                        <h3 class="subtitle">
                            Bienvenido de nuevo,
                            <span class="user-name">
                                <?php echo $nombreUsuario . '!' . $id; ?>
                            </span>
                        </h3>
                    </div>
                </main>
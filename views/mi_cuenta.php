<?php require_once __DIR__ . '/../php/MiCuenta.php';
$nombreUsuario = $_SESSION['nombre_usuario'];
$id = $_SESSION['id_usuario']; ?>
<div class="account-section-container">
    <div class="profile-header">
        <div class="avatar-wrapper">
            <div class="avatar-circle"><?= $nombreUsuario[0] ?></div> <a href="editar_perfil.php" class="btn-edit-profile"> <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg> Editar Perfil </a>
        </div>
        <div class="user-info">
            <h2><?= $usuario['nombre'] ?></h2>
            <p><?= $usuario['email'] ?></p>
            <div class="status-badge status-active"> <span style="width: 8px; height: 8px; background: currentColor; border-radius: 50%;"></span> Usuario Activo </div>
        </div>
    </div>
    <div class="account-details">
        <div class="detail-item"> <span class="detail-label">Nombre de Usuario</span> <span class="detail-value"><?= $usuario['nombre'] ?></span> </div>
        <div class="detail-item"> <span class="detail-label">Correo Electrónico</span> <span class="detail-value"><?= $usuario['email'] ?></span> </div>
        <div class="detail-item"> <span class="detail-label">Contraseña</span> <span class="detail-value">**************</span> </div>
        <div class="detail-item"> <span class="detail-label">Estado de la cuenta</span> <span class="detail-value"><?= $usuario['activo'] ? 'Activa' : 'Inactiva' ?></span> </div>
    </div>
</div>
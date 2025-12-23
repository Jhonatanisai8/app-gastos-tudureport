<!-- Contenedor único de Registro -->
<div class="register-card-container">

    <div class="register-card">
        <div class="register-header">
            <svg class="logo-icon" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
            </svg>
            <h2>Crear Cuenta</h2>
            <p>Únete a nuestra plataforma hoy</p>
        </div>

        <form onsubmit="event.preventDefault(); alert('Cuenta creada con éxito');">
            <!-- Nombre Completo -->
            <div class="form-group">
                <label class="form-label">Nombre Completo</label>
                <div class="input-wrapper">
                    <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <input type="text" class="form-input" placeholder="Tu nombre real" required>
                </div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label class="form-label">Correo Electrónico</label>
                <div class="input-wrapper">
                    <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <input type="email" class="form-input" placeholder="ejemplo@correo.com" required>
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label class="form-label">Contraseña</label>
                <div class="input-wrapper">
                    <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <input type="password" class="form-input" placeholder="Mínimo 8 caracteres" required minlength="8">
                </div>
            </div>

            <button type="submit" class="btn-submit">Registrarse</button>
        </form>

        <div class="form-footer">
            ¿Ya tienes cuenta? <a href="/" class="link">Inicia Sesión</a>
        </div>
    </div>
</div>
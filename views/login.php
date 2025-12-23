<div class="login-card-container">
    <div class="login-card">
        <div class="login-header">
            <img class="login-header-logo" src="../img/logo.png" alt="">
            <h2>Bienvenido</h2>
            <p>Ingresa tus datos</p>
        </div>

        <form autocomplete="off" onsubmit="event.preventDefault(); alert('Iniciando sesión...');">
            <div class="form-group">
                <label class="form-label">Nombre de Usuario</label>
                <div class="input-wrapper">
                    <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <input type="text" class="form-input" placeholder="Nombre de usuario" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Contraseña</label>
                <div class="input-wrapper">
                    <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <input type="password" id="passInput" class="form-input" placeholder="••••••••" required>
                    <button type="button" class="toggle-password" onclick="const p = document.getElementById('passInput'); p.type = p.type === 'password' ? 'text' : 'password';">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
                <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit" class="btn-submit">Ingresar</button>
        </form>

        <div class="form-footer">
            ¿No tienes cuenta? <a href="?vista=registro" class="link">Regístrate</a>
        </div>
    </div>
</div>
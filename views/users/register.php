<?php include __DIR__ . '../../layouts/header.php'; ?>

<div class="container">
    <h2>Registrarse</h2>
    <p class="intro-message">Sabemos que estás frustrado. Estamos aquí para ayudarte paso a paso.</p>

    <div class="register-options">
        <a href="/oigotuqueja/public/?action=registerClient" class="register-button client">
            Registrarme como Cliente
        </a>
        <a href="/oigotuqueja/public/?action=registerCompany" class="register-button company">
            Registrarme como Representante
        </a>
    </div>

    <p class="login-link">¿Ya tienes cuenta? <a href="/oigotuqueja/public/?action=login">Inicia sesión aquí</a></p>
</div>


<?php include __DIR__ . '../../layouts/footer.php'; ?>

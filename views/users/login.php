<?php include __DIR__ . '../../layouts/header.php'; ?>

<div class="container">
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Contraseña: <input type="password" name="password" required></label><br>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <p>¿No tienes cuenta? <a href="/oigotuqueja/public/?action=register">Regístrate aquí</a></p>
</div>

<?php include __DIR__ . '../../layouts/footer.php'; ?>
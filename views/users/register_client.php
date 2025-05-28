<?php include __DIR__ . '../../layouts/header.php'; ?>

<div class="container">
    <h2>Registrarse como Cliente</h2>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST" action="/oigotuqueja/public/?action=register">
        <input type="hidden" name="tipo_usuario" value="Cliente">
        <label>Nombre: <input type="text" name="nombre" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Contraseña: <input type="password" name="password" required></label><br>
        <button type="submit">Registrarse</button>
    </form>
    <p><a href="/oigotuqueja/public/?action=register">Volver</a></p>
</div>

<?php include __DIR__ . '../../layouts/footer.php'; ?>